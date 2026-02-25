# DGLab PWA - Digital Lab Web Tools Platform

[![License](https://img.shields.io/badge/License-Apache_2.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)
[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-777bb4.svg)](https://www.php.net/)
[![Deployment](https://github.com/DGCodeIdeas/DGLabPWA/actions/workflows/deploy.yml/badge.svg?branch=DGLab)](https://github.com/DGCodeIdeas/DGLabPWA/actions/workflows/deploy.yml)
[![PWA](https://img.shields.io/badge/PWA-Ready-orange.svg)](https://web.dev/progressive-web-apps/)

**DGLab PWA** is a modern, extensible web application platform built on PHP 8+ designed for processing files, e-books, and more. It offers a seamless Progressive Web App (PWA) experience, making powerful digital tools accessible from any device, even offline.

## 📖 Table of Contents

- [🚀 Key Features](#-key-features)
- [🛠️ Technology Stack](#️-technology-stack)
- [📥 Quick Start (Users)](#-quick-start-users)
- [🚢 Deployment (Developers)](#-deployment-developers)
- [🏗️ Architecture Overview](#️-architecture-overview)
- [🔧 Extending the Tool System](#-extending-the-tool-system)
- [📡 API Reference](#-api-reference)
- [📝 Historical Fixes & Evolution](#-historical-fixes--evolution)
- [🗺️ Roadmap](#️-roadmap)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)

---

## 🚀 Key Features

-   **📱 Progressive Web App**: Installable on mobile and desktop with offline support and fast loading.
-   **🛠️ Extensible Tool System**: A modular architecture that allows for easy addition of new file processing tools (e.g., EPUB Font Changer).
-   **📁 Chunked File Uploads**: Efficiently handle large files (up to 100MB+) with resumable, chunked uploads that bypass server limits.
-   **🎨 Dynamic Asset Bundling**: Runtime SCSS compilation and JavaScript minification without needing Node.js or npm on the server.
-   **🏗️ Custom MVC Framework**: A lightweight, high-performance PHP framework tailored for shared hosting environments like InfinityFree.
-   **🔒 Secure by Design**: Built-in CSRF protection, input sanitization, and secure file handling.

---

## 🛠️ Technology Stack

-   **Backend**: PHP 8.0+, MySQL 5.7+ / MariaDB 10.3+
-   **Frontend**: jQuery 3.7, SCSS, Font Awesome 6
-   **Architecture**: Modular MVC with a custom Routing system
-   **Deployment**: GitHub Actions with Automated FTP Sync

---

## 📥 Quick Start (Users)

### Prerequisites
- A web server with PHP 8.0+ and MySQL support.
- Apache with `mod_rewrite` enabled.

### Installation
1.  **Clone the repo**:
    ```bash
    git clone https://github.com/DGCodeIdeas/DGLabPWA.git
    ```
2.  **Configure**:
    - Copy `config/config.example.php` to `config/config.php`.
    - Edit `config/config.php` with your database credentials.
3.  **Permissions**:
    - Ensure the `storage/` directory and its subdirectories are writable (`chmod 755`).
4.  **Database**:
    - Create a MySQL database and the application will handle the rest.

For detailed instructions, see the [Deployment Guide](docs/DEPLOYMENT.md).

---

## 🚢 Deployment (Developers)

This project is optimized for deployment on **InfinityFree** and other shared hosting providers.

### Automatic Deployment via GitHub Actions
We use GitHub Actions to sync code to the server automatically.
1.  Set up repository secrets: `FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD`, `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`.
2.  Push to the `DGLab` branch.

See [GitHub Actions Guide](docs/GITHUB_ACTIONS.md) for more details.

---

## 🏗️ Architecture Overview

The platform follows a clean MVC pattern:

-   `app/Core/`: The engine of the framework (Router, Database, AssetBundler).
-   `app/Controllers/`: Request handlers.
-   `app/Models/`: Data logic and database interaction.
-   `app/Views/`: UI templates using PHP.
-   `app/Tools/`: Modular implementations for specific functionalities.
-   `public/`: The only web-accessible directory (entry point).
-   `storage/`: Writable directory for cache, uploads, and logs.

---

## 🔧 Extending the Tool System

Adding a new tool is as simple as implementing the `ToolInterface` in `app/Tools/`.

1.  Create a new directory in `app/Tools/[YourToolName]`.
2.  Create a class implementing `DGLab\Tools\Interfaces\ToolInterface`.
3.  The `ToolRegistry` will automatically discover and register your tool.

Refer to the [Detailed Documentation](docs/README.md#creating-custom-tools) for a step-by-step guide.

---

## 📡 API Reference

DGLab PWA provides a RESTful API for integration:

- `GET /api/v1/status`: Check system health.
- `GET /api/v1/tools`: List all available tools.
- `POST /api/v1/process/{toolId}`: Process a file using a specific tool.

See the [API Section in Documentation](docs/README.md#api-reference) for more endpoints and examples.

---

## 📝 Historical Fixes & Evolution

The project has undergone significant improvements to ensure reliability on shared hosting. You can find detailed logs of critical fixes in the `fixing_solutions/` directory:
-   [Asset Routing & Compilation](fixing_solutions/01_asset_routing_and_compilation.md)
-   [Admin Controller Restoration](fixing_solutions/02_admin_controller_restoration.md)
-   [Tool Category Views](fixing_solutions/03_tool_category_view.md)
-   [PWA & Root Asset Resolution](fixing_solutions/04_pwa_and_root_assets.md)
-   [Validation & CSRF Hardening](fixing_solutions/05_functional_validation_and_csrf.md)

---

## 🗺️ Roadmap

-   [ ] **Enhanced Admin Dashboard**: Real-time server monitoring and log viewer.
-   [ ] **Additional Tools**: Support for PDF conversion and Image optimization.
-   [ ] **API Authentication**: JWT-based security for external integrations.
-   [ ] **Internationalization**: Full multi-language support (i18n).
-   [ ] **Unit Testing**: Increased test coverage for core framework components.

---

## 🤝 Contributing

We welcome contributions! To contribute:

1.  **Fork** the repository.
2.  **Create a branch** for your feature or bug fix (`git checkout -b feature/amazing-feature`).
3.  **Commit your changes** following the project's coding style.
4.  **Push to the branch** (`git push origin feature/amazing-feature`).
5.  **Open a Pull Request**.

For new tools, please follow the [Tool Implementation Guide](docs/README.md#creating-custom-tools).

---

## 📄 License

This project is licensed under the **Apache License 2.0** - see the [LICENSE](LICENSE) file for details.

---

Built with ❤️ by the **DGLab Team**.
