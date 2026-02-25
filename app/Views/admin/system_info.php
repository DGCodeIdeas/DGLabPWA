<div class="container py-5">
    <div class="row mb-4">
        <div class="col">
            <h1 class="h2">System Information</h1>
            <p class="text-muted">Environment details for the DGLab PWA platform.</p>
        </div>
        <div class="col-auto">
            <form action="/admin/clear-cache" method="POST" class="d-inline">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-trash-alt me-2"></i> Clear Cache
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Parameter</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 fw-bold">Application Name</td>
                        <td><?php echo htmlspecialchars($info['app_name']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold">Application Version</td>
                        <td><span class="badge bg-primary"><?php echo htmlspecialchars($info['app_version']); ?></span></td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold">PHP Version</td>
                        <td><?php echo htmlspecialchars($info['php_version']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold">Server Software</td>
                        <td><?php echo htmlspecialchars($info['server']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold">Upload Max Filesize</td>
                        <td><?php echo htmlspecialchars($info['upload_max']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold">Post Max Size</td>
                        <td><?php echo htmlspecialchars($info['post_max']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold">Memory Limit</td>
                        <td><?php echo htmlspecialchars($info['memory_limit']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
