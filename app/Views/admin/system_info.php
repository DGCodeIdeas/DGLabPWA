<div class="container py-12">
    <div class="row mb-8 align-items-center">
        <div class="col">
            <h1 class="display-6 fw-bold text-gray-900 mb-2">System Information</h1>
            <p class="text-gray-600 mb-0">Environment details for the <?php echo APP_NAME; ?> platform.</p>
        </div>
        <div class="col-auto">
            <form action="/admin/clear-cache" method="POST" class="d-inline">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                <button type="submit" class="btn btn-warning rounded-pill px-4 d-flex align-items-center gap-2 shadow-sm border-0" aria-label="Clear Cache">
                    <i class="fas fa-trash-alt"></i>
                    <span>Clear Cache</span>
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-3xl border shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-gray-50 border-bottom">
                    <tr>
                        <th class="ps-6 py-4 text-xs fw-bold text-gray-500 text-uppercase tracking-wider">Parameter</th>
                        <th class="py-4 text-xs fw-bold text-gray-500 text-uppercase tracking-wider">Value</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    <tr>
                        <td class="ps-6 py-4 fw-bold text-gray-700">Application Name</td>
                        <td class="py-4 text-gray-600"><?php echo htmlspecialchars($info['app_name']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-6 py-4 fw-bold text-gray-700">Application Version</td>
                        <td class="py-4"><span class="badge bg-indigo-100 text-indigo-600 rounded-pill px-3 py-2"><?php echo htmlspecialchars($info['app_version']); ?></span></td>
                    </tr>
                    <tr>
                        <td class="ps-6 py-4 fw-bold text-gray-700">PHP Version</td>
                        <td class="py-4 text-gray-600"><?php echo htmlspecialchars($info['php_version']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-6 py-4 fw-bold text-gray-700">Server Software</td>
                        <td class="py-4 text-gray-600"><?php echo htmlspecialchars($info['server']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-6 py-4 fw-bold text-gray-700">Upload Max Filesize</td>
                        <td class="py-4 text-gray-600"><?php echo htmlspecialchars($info['upload_max']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-6 py-4 fw-bold text-gray-700">Post Max Size</td>
                        <td class="py-4 text-gray-600"><?php echo htmlspecialchars($info['post_max']); ?></td>
                    </tr>
                    <tr>
                        <td class="ps-6 py-4 fw-bold text-gray-700">Memory Limit</td>
                        <td class="py-4 text-gray-600"><?php echo htmlspecialchars($info['memory_limit']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
