## 2026-02-23 - [Path Traversal and Insecure CSRF]
**Vulnerability:** Path traversal in `ChunkedUpload.php` due to unvalidated `uploadId` parameter and insecure CSRF "security theater" in `ApiController.php`.
**Learning:** The application used `bin2hex(random_bytes(16))` for `uploadId`, but failed to verify that user-provided IDs matched this format before using them in filesystem paths. Additionally, some controllers implemented a weak CSRF check (`!empty($token)`) instead of using the base framework's robust validation.
**Prevention:** Always validate identifiers used in filesystem paths against a strict regex (e.g., `[a-f0-9]{32}`). Consistently use centralized security helpers like `$this->requireCsrfToken()` from the base controller.

## 2026-03-02 - [Robust Path Traversal Prevention]
**Vulnerability:** Path traversal and sibling directory access in `AssetController.php` due to weak prefix validation.
**Learning:** Using `strpos($realPath, $root) === 0` is insufficient for prefix validation if sibling directories share a prefix (e.g., `/var/www/assets` and `/var/www/assets_backup`). An attacker could potentially access sibling directories if the application only checks the prefix.
**Prevention:** Always append a directory separator to the root path when performing a prefix check: `strpos($realPath, $root . DIRECTORY_SEPARATOR) === 0`. Additionally, perform early sanitization (removing null bytes) and block sensitive extensions explicitly.
