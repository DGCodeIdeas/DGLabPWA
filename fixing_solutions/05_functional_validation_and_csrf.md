# Solution: Functional Validation and CSRF Issues

## Issue 1: EPUB Validation Failure
### Analysis
The "Only EPUB files are supported" error occurs because the `EpubFontChanger::validate()` method checks the file extension of the `$inputPath` parameter.

```php
// EpubFontChanger.php
$extension = strtolower(pathinfo($inputPath, PATHINFO_EXTENSION));
if ($extension !== 'epub') {
    $errors[] = 'Invalid file type. Only EPUB files are supported.';
}
```

When a file is uploaded directly (not via chunked upload), PHP stores it in a temporary location like `/tmp/phpXXXXXX`, which **lacks the .epub extension**. This causes the validation to fail even for valid EPUB files.

### Step-by-Step Fix
Update `ToolController::process()` to pass the original filename or ensure the temporary file has the correct extension before validation.

Alternatively, modify the validator to use the actual MIME type or a passed filename:

```php
// app/Controllers/ToolController.php

// Before calling $tool->validate, if it's a direct upload:
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $inputPath = $file['tmp_name'];
    $originalName = $file['name'];

    // Better: validate based on original name or move to a path with extension
    $targetPath = $inputPath . '.' . pathinfo($originalName, PATHINFO_EXTENSION);
    move_uploaded_file($inputPath, $targetPath);
    $inputPath = $targetPath;
}
```

## Issue 2: Upload Initialization 403 Forbidden
### Analysis
The `POST /upload/init` endpoint returns a **403 Forbidden**. This is almost certainly due to **CSRF (Cross-Site Request Forgery) protection** failing.

1. **Token Mismatch**: The CSRF token sent in the headers/body does not match the one stored in the session.
2. **Session Persistence**: On some shared hosting (like InfinityFree), sessions might be lost if the `session_save_path` is not writable or if the domain/cookie configuration is incorrect.

### Step-by-Step Fix

#### 1. Verify CSRF Integration
Ensure the frontend is correctly capturing the token from `<meta name="csrf-token">` and sending it in the `X-CSRF-TOKEN` header.

#### 2. Robust Session Configuration
In `config/config.php`, ensure session settings are compatible with shared hosting:

```php
// config/config.php
'session' => [
    'cookie_lifetime' => 86400,
    'cookie_path'     => '/',
    'cookie_domain'   => '', // Leave empty for current domain
    'cookie_secure'   => true,
    'cookie_httponly' => true,
    'cookie_samesite' => 'Lax',
],
```

#### 3. Exempt API routes (if applicable)
If `/api/v1/` routes are intended for third-party use, they should be exempted from CSRF in `app/Core/Controller.php` and use API Keys instead.

```php
// app/Core/Controller.php
protected function validateCsrfToken(): bool
{
    // Skip for API routes
    if (strpos($_SERVER['REQUEST_URI'], '/api/') === 0) {
        return true;
    }
    // ... existing logic
}
```
