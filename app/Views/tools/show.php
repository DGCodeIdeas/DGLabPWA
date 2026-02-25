<?php
/**
 * Tool Detail Page View
 * 
 * @package DGLab\Views\Tools
 */

use DGLab\Tools\EpubFontChanger\EpubFontChanger;

$isEpubTool = $tool instanceof EpubFontChanger;
?>
<!-- Tool Header -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-700 py-12 lg:py-16 text-white">
    <div class="container">
        <div class="row align-items-center g-6">
            <div class="col-auto">
                <div class="bg-white/20 p-4 rounded-3xl shadow-inner d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                    <i class="fas <?php echo $tool->getIcon(); ?> fs-1 text-white"></i>
                </div>
            </div>
            <div class="col">
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item text-white/70"><a href="<?php echo $base_url; ?>/tools" class="text-white/70 text-decoration-none hover:text-white transition-colors">Tools</a></li>
                        <li class="breadcrumb-item text-white active fw-medium" aria-current="page"><?php echo htmlspecialchars($tool->getCategory()); ?></li>
                    </ol>
                </nav>
                <h1 class="display-5 fw-bold mb-2"><?php echo htmlspecialchars($tool->getName()); ?></h1>
                <p class="fs-5 opacity-90 mb-0 max-w-2xl"><?php echo htmlspecialchars($tool->getDescription()); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Tool Interface -->
<section class="py-12 lg:py-16 bg-gray-50">
    <div class="container">
        <div class="row g-8">
            <!-- Upload Section -->
            <div class="col-lg-6">
                <div class="bg-white p-6 p-md-8 rounded-3xl border shadow-sm h-100">
                    <h2 class="h4 fw-bold text-gray-900 mb-6 d-flex align-items-center gap-2">
                        <i class="fas fa-cloud-upload-alt text-indigo-600"></i>
                        1. Upload File
                    </h2>

                    <div class="position-relative cursor-pointer transition-all hover:bg-gray-50 border-2 border-dashed border-gray-300 rounded-3xl p-10 text-center mb-4" id="upload-zone">
                        <input type="file" id="file-input" class="position-absolute top-0 start-0 w-100 h-100 opacity-0 cursor-pointer"
                               accept="<?php echo implode(',', $tool->getSupportedTypes()); ?>"
                               data-max-size="<?php echo $tool->getMaxFileSize(); ?>">
                        <div class="upload-zone-content">
                            <div class="bg-gray-100 text-gray-400 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-cloud-upload-alt fs-3"></i>
                            </div>
                            <p class="fs-5 text-gray-900 mb-1 fw-semibold">
                                Click to upload or drag and drop
                            </p>
                            <p class="text-gray-500 mb-0">
                                <?php echo implode(', ', $tool->getSupportedTypes()); ?>
                                (Max <?php echo number_format($tool->getMaxFileSize() / 1024 / 1024, 0); ?> MB)
                            </p>
                        </div>
                    </div>

                    <!-- Upload Progress -->
                    <div class="mb-4" id="upload-progress" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-sm fw-bold text-indigo-600">Uploading...</span>
                            <span class="text-sm text-gray-500" id="progress-text">0%</span>
                        </div>
                        <div class="progress" style="height: 10px; border-radius: 10px;">
                            <div class="progress-bar bg-indigo-600 rounded-pill" role="progressbar" id="progress-fill" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <!-- File Info -->
                    <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-4 d-flex align-items-center gap-4" id="file-info" style="display: none;">
                        <div class="bg-indigo-600 text-white rounded-xl d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fas fa-file fs-5"></i>
                        </div>
                        <div class="flex-grow-1 min-w-0">
                            <p class="text-gray-900 fw-bold mb-0 text-truncate" id="file-name"></p>
                            <p class="text-indigo-600 text-xs mb-0" id="file-size"></p>
                        </div>
                        <button type="button" class="btn btn-light btn-sm rounded-circle p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 transition-colors border-0" id="remove-file" title="Remove file" aria-label="Remove file">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Options Section -->
            <div class="col-lg-6">
                <div class="bg-white p-6 p-md-8 rounded-3xl border shadow-sm h-100">
                    <h2 class="h4 fw-bold text-gray-900 mb-6 d-flex align-items-center gap-2">
                        <i class="fas fa-cog text-indigo-600"></i>
                        2. Tool Options
                    </h2>
                    
                    <form id="tool-options-form">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                        <input type="hidden" name="upload_id" id="upload-id">

                        <div class="space-y-6">
                            <?php foreach ($tool->getConfigSchema() as $key => $config): ?>
                                <div class="form-group mb-4" data-conditional="<?php echo htmlspecialchars(json_encode($config['conditional'] ?? null)); ?>">
                                    <label for="<?php echo $key; ?>" class="form-label fw-bold text-gray-700 mb-2 d-block">
                                        <?php echo htmlspecialchars($config['label']); ?>
                                        <?php if ($config['required'] ?? false): ?>
                                            <span class="text-red-500">*</span>
                                        <?php endif; ?>
                                    </label>

                                    <?php if (isset($config['description'])): ?>
                                        <p class="text-sm text-gray-500 mb-2"><?php echo htmlspecialchars($config['description']); ?></p>
                                    <?php endif; ?>

                                    <?php switch ($config['type']):
                                        case 'select': ?>
                                            <select name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                    class="form-select rounded-xl py-2.5 shadow-sm border-gray-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all"
                                                    <?php echo ($config['required'] ?? false) ? 'required aria-required="true"' : ''; ?>>
                                                <?php foreach ($config['options'] as $value => $label): ?>
                                                    <option value="<?php echo $value; ?>"
                                                            <?php echo ($config['default'] ?? '') === $value ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($label); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php break; ?>

                                        <?php case 'boolean': ?>
                                            <div class="form-check form-switch fs-5">
                                                <input class="form-check-input cursor-pointer" type="checkbox" role="switch" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                       <?php echo ($config['default'] ?? false) ? 'checked' : ''; ?>
                                                       value="1">
                                                <label class="form-check-label text-base text-gray-600" for="<?php echo $key; ?>"><?php echo htmlspecialchars($config['label']); ?></label>
                                            </div>
                                        <?php break; ?>

                                        <?php case 'number': ?>
                                            <input type="number" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                   class="form-control rounded-xl py-2.5 shadow-sm border-gray-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all"
                                                   value="<?php echo $config['default'] ?? ''; ?>"
                                                   min="<?php echo $config['min'] ?? ''; ?>"
                                                   max="<?php echo $config['max'] ?? ''; ?>"
                                                   step="<?php echo $config['step'] ?? '1'; ?>"
                                                   <?php echo ($config['required'] ?? false) ? 'required aria-required="true"' : ''; ?>>
                                        <?php break; ?>

                                        <?php case 'file': ?>
                                            <input type="file" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                   class="form-control rounded-xl py-2.5 shadow-sm border-gray-300"
                                                   accept="<?php echo $config['accept'] ?? ''; ?>">
                                        <?php break; ?>

                                        <?php default: ?>
                                            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                   class="form-control rounded-xl py-2.5 shadow-sm border-gray-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all"
                                                   value="<?php echo htmlspecialchars($config['default'] ?? ''); ?>"
                                                   <?php echo ($config['required'] ?? false) ? 'required aria-required="true"' : ''; ?>>
                                    <?php endswitch; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-8 pt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill py-3 btn-gradient border-0 fw-bold shadow-lg d-flex align-items-center justify-content-center gap-2" id="process-btn" disabled aria-label="Process File">
                                <i class="fas fa-cog"></i>
                                <span>Process File</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Results Section -->
        <div class="mt-8 transition-all" id="tool-results" style="display: none;">
            <div class="bg-emerald-50 border border-emerald-100 p-8 rounded-3xl shadow-sm">
                <div class="row align-items-center g-6">
                    <div class="col-auto">
                        <div class="bg-emerald-600 text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                            <i class="fas fa-check fs-3"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="h4 fw-bold text-emerald-900 mb-1">Processing Complete!</h2>
                        <p class="text-emerald-700 mb-0" id="result-filename"></p>
                        <p class="text-xs text-emerald-600 mt-1 opacity-80" id="result-details"></p>
                    </div>
                    <div class="col-lg-auto">
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#" class="btn btn-emerald-600 text-white px-8 rounded-pill fw-bold shadow-md hover:scale-105 transition-transform text-decoration-none d-flex align-items-center gap-2" id="download-btn" download style="background-color: #059669;" aria-label="Download Result">
                                <i class="fas fa-download"></i>
                                <span>Download Result</span>
                            </a>
                            <button type="button" class="btn btn-outline-emerald px-6 rounded-pill d-flex align-items-center gap-2 transition-all hover:bg-emerald-100" id="process-another" aria-label="Process Another">
                                <i class="fas fa-redo"></i>
                                <span>Process Another</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Info -->
<section class="py-16 bg-white border-top">
    <div class="container">
        <div class="row g-8">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex gap-3">
                    <div class="text-indigo-600 fs-4">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div>
                        <h3 class="h5 fw-bold text-gray-900 mb-3">Supported Formats</h3>
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ($tool->getSupportedTypes() as $type): ?>
                                <span class="badge bg-gray-100 text-gray-600 px-3 py-2 rounded-lg fw-medium"><?php echo htmlspecialchars($type); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="d-flex gap-3">
                    <div class="text-indigo-600 fs-4">
                        <i class="fas fa-hdd"></i>
                    </div>
                    <div>
                        <h3 class="h5 fw-bold text-gray-900 mb-3">File Limits</h3>
                        <p class="text-gray-600 mb-2">Maximum file size: <strong><?php echo number_format($tool->getMaxFileSize() / 1024 / 1024, 0); ?> MB</strong></p>
                        <?php if ($tool->supportsChunking()): ?>
                            <div class="d-flex align-items-center gap-2 text-emerald-600 fw-medium">
                                <i class="fas fa-check-circle"></i>
                                <span>Supports large file uploads</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="d-flex gap-3">
                    <div class="text-indigo-600 fs-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <h3 class="h5 fw-bold text-gray-900 mb-3">Privacy & Security</h3>
                        <p class="text-gray-600 mb-0">Your files are processed securely in memory or temporary storage and are <strong>automatically deleted</strong> immediately after processing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Tool-specific JavaScript
window.toolConfig = {
    id: '<?php echo $tool->getId(); ?>',
    supportsChunking: <?php echo $tool->supportsChunking() ? 'true' : 'false'; ?>,
    maxFileSize: <?php echo $tool->getMaxFileSize(); ?>,
    acceptedTypes: <?php echo json_encode($tool->getSupportedTypes()); ?>,
    apiUrl: '<?php echo $base_url; ?>/tool/<?php echo $tool->getId(); ?>/process'
};
</script>
