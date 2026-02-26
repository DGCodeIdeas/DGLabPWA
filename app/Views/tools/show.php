<?php
/**
 * Tool Detail Page View - Bootstrap 5 Overhaul
 * 
 * @package DGLab\Views\Tools
 */

use DGLab\Tools\EpubFontChanger\EpubFontChanger;

$isEpubTool = $tool instanceof EpubFontChanger;
?>
<!-- Tool Header -->
<section class="py-5 bg-dark text-white position-relative overflow-hidden">
    <div class="tw-bg-blur-blob position-absolute" style="top: -20%; right: -10%; background: radial-gradient(circle, rgba(79, 70, 229, 0.2) 0%, transparent 70%);"></div>

    <div class="container py-5 position-relative z-1">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <span class="badge bg-primary px-3 py-2 rounded-pill text-uppercase tracking-widest fw-bold x-small">
                        <?php echo htmlspecialchars($tool->getCategory()); ?>
                    </span>
                </div>
                <h1 class="display-3 fw-bold mb-3"><?php echo htmlspecialchars($tool->getName()); ?></h1>
                <p class="lead opacity-75 fs-4 mb-0">
                    <?php echo htmlspecialchars($tool->getDescription()); ?>
                </p>
            </div>
            <div class="col-lg-4 d-none d-lg-flex justify-content-end">
                <div class="bg-primary rounded-5 d-flex align-items-center justify-content-center shadow-lg tw-animate-float" style="width: 8rem; height: 8rem;">
                    <i class="fas <?php echo $tool->getIcon(); ?> text-white display-4" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Interface -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Upload Section -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="h4 fw-bold mb-4 d-flex align-items-center">
                            <span class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 2.5rem; height: 2.5rem;">
                                <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                            </span>
                            Upload File
                        </h2>

                        <div class="upload-zone border-2 border-dashed rounded-4 p-5 text-center cursor-pointer mb-4" id="upload-zone" tabindex="0" role="button" aria-label="Upload File">
                            <input type="file" id="file-input" class="d-none"
                                   accept="<?php echo implode(',', $tool->getSupportedTypes()); ?>"
                                   data-max-size="<?php echo $tool->getMaxFileSize(); ?>">
                            <div class="upload-zone-content">
                                <i class="fas fa-file-upload text-muted mb-3" aria-hidden="true"></i>
                                <h3 class="h5 fw-bold text-dark mb-2">Drag & drop your file here</h3>
                                <p class="text-muted small mb-0">
                                    or click to browse (Max <?php echo number_format($tool->getMaxFileSize() / 1024 / 1024, 0); ?> MB)
                                </p>
                            </div>
                        </div>

                        <!-- Upload Progress -->
                        <div class="mt-4 d-none" id="upload-progress">
                            <div class="progress rounded-pill mb-2" style="height: 0.6rem;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" id="progress-fill" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-center small fw-bold text-primary mb-0" id="progress-text">0%</p>
                        </div>

                        <!-- File Info -->
                        <div class="mt-4 p-3 bg-light rounded-3 d-flex align-items-center gap-3 d-none" id="file-info">
                            <div class="bg-white rounded-3 d-flex align-items-center justify-content-center text-primary fs-4 shadow-sm" style="width: 3.5rem; height: 3.5rem;">
                                <i class="fas fa-file" aria-hidden="true"></i>
                            </div>
                            <div class="flex-grow-1 min-width-0">
                                <p class="fw-bold text-dark mb-0 text-truncate fs-6" id="file-name"></p>
                                <p class="text-muted x-small mb-0" id="file-size"></p>
                            </div>
                            <button type="button" class="btn btn-outline-danger btn-sm rounded-3 px-3" id="remove-file" aria-label="Remove File">
                                <i class="fas fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Options Section -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden sticky-top" style="top: 6rem;">
                    <div class="card-header bg-dark text-white p-4 border-0">
                        <h2 class="h4 fw-bold mb-0 d-flex align-items-center">
                            <span class="bg-primary rounded-3 d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 2.5rem; height: 2.5rem;">
                                <i class="fas fa-cog text-white" aria-hidden="true"></i>
                            </span>
                            Configure
                        </h2>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <form id="tool-options-form">
                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                            <input type="hidden" name="upload_id" id="upload-id">

                            <div class="vstack gap-4">
                                <?php foreach ($tool->getConfigSchema() as $key => $config): ?>
                                    <div data-conditional="<?php echo htmlspecialchars(json_encode($config['conditional'] ?? null)); ?>">
                                        <label for="<?php echo $key; ?>" class="form-label fw-bold text-uppercase tracking-widest text-muted x-small">
                                            <?php echo htmlspecialchars($config['label']); ?>
                                            <?php if ($config['required'] ?? false): ?>
                                                <span class="text-danger">*</span>
                                            <?php endif; ?>
                                        </label>

                                        <?php switch ($config['type']):
                                            case 'select': ?>
                                                <select name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                        class="form-select border-light-subtle rounded-3 p-3 shadow-sm focus-ring"
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
                                                <div class="form-check form-switch p-0 d-flex align-items-center gap-3">
                                                    <div class="position-relative">
                                                        <input type="checkbox" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="form-check-input ms-0 mt-0 shadow-sm"
                                                               <?php echo ($config['default'] ?? false) ? 'checked' : ''; ?>
                                                               value="1" style="width: 3rem; height: 1.5rem; cursor: pointer;">
                                                    </div>
                                                    <label class="form-check-label fw-medium text-dark cursor-pointer" for="<?php echo $key; ?>">
                                                        <?php echo htmlspecialchars($config['description'] ?? ''); ?>
                                                    </label>
                                                </div>
                                            <?php break; ?>

                                            <?php case 'number': ?>
                                                <input type="number" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                       class="form-control border-light-subtle rounded-3 p-3 shadow-sm focus-ring"
                                                       value="<?php echo $config['default'] ?? ''; ?>"
                                                       min="<?php echo $config['min'] ?? ''; ?>"
                                                       max="<?php echo $config['max'] ?? ''; ?>"
                                                       step="<?php echo $config['step'] ?? '1'; ?>"
                                                       <?php echo ($config['required'] ?? false) ? 'required aria-required="true"' : ''; ?>>
                                            <?php break; ?>

                                            <?php default: ?>
                                                <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                       class="form-control border-light-subtle rounded-3 p-3 shadow-sm focus-ring"
                                                       value="<?php echo htmlspecialchars($config['default'] ?? ''); ?>"
                                                       <?php echo ($config['required'] ?? false) ? 'required aria-required="true"' : ''; ?>>
                                        <?php endswitch; ?>
                                    </div>
                                <?php endforeach; ?>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 py-3 fw-bold shadow-sm d-flex align-items-center justify-content-center mt-2" id="process-btn" disabled>
                                    <i class="fas fa-magic me-2" aria-hidden="true"></i>
                                    Process Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Results Section -->
        <div class="mt-5 d-none" id="tool-results">
            <div class="card bg-primary bg-gradient border-0 rounded-5 p-5 text-center text-white shadow-lg overflow-hidden position-relative">
                <div class="position-absolute top-0 end-0 w-25 h-100 bg-white opacity-10 rounded-circle translate-middle"></div>
                
                <div class="position-relative z-1">
                    <h2 class="display-5 fw-bold mb-3">Processing Complete!</h2>
                    <p class="lead mb-5 opacity-75" id="result-filename"></p>

                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#" class="btn btn-light btn-lg rounded-3 px-5 py-3 fw-bold text-primary shadow" id="download-btn" download>
                            <i class="fas fa-download me-2" aria-hidden="true"></i> Download File
                        </a>
                        <button type="button" class="btn btn-primary-light border border-white border-opacity-25 btn-lg rounded-3 px-5 py-3 fw-bold" id="process-another">
                            <i class="fas fa-redo me-2" aria-hidden="true"></i> Start Over
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Info Details -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white me-3" style="width: 2.5rem; height: 2.5rem;">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-0">Format Support</h3>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($tool->getSupportedTypes() as $type): ?>
                        <span class="badge rounded-pill bg-light text-dark border px-3 py-2 fw-medium"><?php echo htmlspecialchars($type); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white me-3" style="width: 2.5rem; height: 2.5rem;">
                        <i class="fas fa-database" aria-hidden="true"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-0">Upload Specs</h3>
                </div>
                <ul class="list-unstyled mb-0">
                    <li class="d-flex justify-content-between pb-2 border-bottom mb-2">
                        <span class="text-muted">Max Size</span>
                        <span class="fw-bold"><?php echo number_format($tool->getMaxFileSize() / 1024 / 1024, 0); ?> MB</span>
                    </li>
                    <?php if ($tool->supportsChunking()): ?>
                        <li class="text-primary fw-bold small">
                            <i class="fas fa-bolt me-1" aria-hidden="true"></i> Optimized for large files
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            
            <div class="col-md-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white me-3" style="width: 2.5rem; height: 2.5rem;">
                        <i class="fas fa-lock" aria-hidden="true"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-0">Privacy Protocol</h3>
                </div>
                <p class="text-muted small mb-0">
                    Your files are handled with extreme care: encryption in transit, zero-logs policy, and automated deletion upon task completion.
                </p>
            </div>
        </div>
    </div>
</section>

<style>
.x-small {
    font-size: 0.7rem;
}
.btn-primary-light {
    background: rgba(255,255,255,0.1);
    color: white;
}
.btn-primary-light:hover {
    background: rgba(255,255,255,0.2);
    color: white;
}
.cursor-pointer {
    cursor: pointer;
}
.focus-ring:focus {
    box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
    border-color: #4f46e5;
}
</style>

<script>
window.toolConfig = {
    id: '<?php echo $tool->getId(); ?>',
    supportsChunking: <?php echo $tool->supportsChunking() ? 'true' : 'false'; ?>,
    maxFileSize: <?php echo $tool->getMaxFileSize(); ?>,
    acceptedTypes: <?php echo json_encode($tool->getSupportedTypes()); ?>,
    apiUrl: '<?php echo $base_url; ?>/tool/<?php echo $tool->getId(); ?>/process'
};
</script>
