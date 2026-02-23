# GitHub Actions Deployment Guide

This project is configured to automatically deploy to InfinityFree using GitHub Actions.

## Setup Instructions

To enable automatic deployment, you need to add the following Secrets to your GitHub repository:

1. Go to your repository on GitHub.
2. Click on **Settings** > **Secrets and variables** > **Actions**.
3. Click on **New repository secret** for each of the following:

### FTP Credentials
- `FTP_SERVER`: The FTP hostname (e.g., `ftpupload.net`)
- `FTP_USERNAME`: Your FTP username (e.g., `if0_41195651`)
- `FTP_PASSWORD`: Your FTP password

### Database Credentials
- `DB_HOST`: Your MySQL host (e.g., `sql100.infinityfree.com`)
- `DB_NAME`: Your database name (e.g., `if0_41195651_dglab`)
- `DB_USER`: Your database username (e.g., `if0_41195651`)
- `DB_PASS`: Your database password

## Deployment Process

### 1. Automatic Deployment
Every push to the `DGLab` branch will trigger a deployment to the `/htdocs` folder. The deployment process will:
- Generate a `config/config.php` file using your secrets.
- Sync all repository files to the server.
- **Delete** any files on the server that are NOT in the repository (except for an `old/` directory).

### 2. Manual Archive ("Move to old/")
If you want to preserve the current content of your server before your first deployment:

1. Go to the **Actions** tab in GitHub.
2. Select the **Archive Server Content** workflow.
3. Click **Run workflow**.
4. Once it completes successfully, your old files will be in `/htdocs/old/`.
5. You can then push your code or run the **FTP Deploy** workflow manually.

*Note: Due to FTP limitations on shared hosting, if you have thousands of files, the archive script might time out. In such cases, we recommend moving files manually using the InfinityFree Online File Manager.*

## Files Excluded from Deployment
- `.git/` and `.github/`
- `docs/`
- `config/config.example.php`
- Documentation files (`Readme.md`, `LICENSE`, etc.)
- The `old/` directory on the server is preserved.
