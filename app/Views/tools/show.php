<?php
/**
 * Tool Detail Page View - Redesigned for Asymmetrical Beauty
 * 
 * @package DGLab\Views\Tools
 */

use DGLab\Tools\EpubFontChanger\EpubFontChanger;

$isEpubTool = $tool instanceof EpubFontChanger;
?>
<!-- Tool Header -->
<section class="tw-pt-48 tw-pb-32 tw-bg-slate-900 tw-text-white tw-relative tw-overflow-hidden">
    <!-- Animated Blob -->
    <div class="tw-bg-blur-blob" style="top: -20%; right: -10%; background: radial-gradient(circle, rgba(79, 70, 229, 0.2) 0%, transparent 70%);"></div>

    <div class="container tw-relative tw-z-10">
        <div class="lg:tw-broken-grid tw-items-center">
            <div class="tw-col-span-12 lg:tw-col-span-8">
                <div class="tw-flex tw-items-center tw-gap-4 tw-mb-8">
                    <span class="tw-px-6 tw-py-2 tw-bg-indigo-600/30 tw-backdrop-blur-md tw-border tw-border-indigo-500/30 tw-rounded-full tw-text-xs tw-font-bold tw-uppercase tw-tracking-widest">
                        <?php echo htmlspecialchars($tool->getCategory()); ?>
                    </span>
                </div>
                <h1 class="tw-text-7xl tw-font-bold tw-mb-6"><?php echo htmlspecialchars($tool->getName()); ?></h1>
                <p class="tw-text-2xl tw-opacity-70 tw-max-w-2xl tw-leading-relaxed">
                    <?php echo htmlspecialchars($tool->getDescription()); ?>
                </p>
            </div>
            <div class="tw-col-span-12 lg:tw-col-span-4 tw-flex lg:tw-justify-end tw-mt-12 lg:tw-mt-0">
                <div class="tw-w-32 tw-h-32 tw-bg-indigo-600 tw-rounded-[2.5rem] tw-flex tw-items-center tw-justify-center tw-text-5xl tw-shadow-2xl">
                    <i class="fas <?php echo $tool->getIcon(); ?>"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Interface -->
<section class="tw-py-32 tw-bg-slate-50">
    <div class="container">
        <div class="lg:tw-broken-grid tw-gap-16">
            <!-- Upload Section -->
            <div class="tw-col-span-12 lg:tw-col-span-7">
                <div class="tw-glass-card tw-p-12 tw-rounded-[3rem] tw-bg-white">
                    <h2 class="tw-text-3xl tw-font-bold tw-mb-12 tw-flex tw-items-center tw-gap-4">
                        <span class="tw-w-10 tw-h-10 tw-bg-indigo-100 tw-text-indigo-600 tw-rounded-xl tw-flex tw-items-center tw-justify-center">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </span>
                        Upload File
                    </h2>

                    <div class="upload-zone tw-border-2 tw-border-dashed tw-border-slate-200 tw-rounded-[2rem] tw-p-20 tw-text-center hover:tw-border-indigo-600 tw-transition-colors tw-cursor-pointer" id="upload-zone">
                        <input type="file" id="file-input" class="tw-hidden"
                               accept="<?php echo implode(',', $tool->getSupportedTypes()); ?>"
                               data-max-size="<?php echo $tool->getMaxFileSize(); ?>">
                        <div class="upload-zone-content">
                            <i class="fas fa-file-upload tw-text-6xl tw-text-slate-300 tw-mb-8"></i>
                            <p class="tw-text-2xl tw-font-bold tw-text-slate-900 tw-mb-4">
                                Drag & drop your file here
                            </p>
                            <p class="tw-text-slate-500">
                                or click to browse (Max <?php echo number_format($tool->getMaxFileSize() / 1024 / 1024, 0); ?> MB)
                            </p>
                        </div>
                    </div>

                    <!-- Upload Progress -->
                    <div class="tw-mt-12 tw-hidden" id="upload-progress">
                        <div class="tw-w-full tw-h-3 tw-bg-slate-100 tw-rounded-full tw-overflow-hidden">
                            <div class="tw-h-full tw-bg-indigo-600 tw-transition-all" id="progress-fill" style="width: 0%"></div>
                        </div>
                        <p class="tw-text-center tw-mt-4 tw-font-bold tw-text-indigo-600" id="progress-text">0%</p>
                    </div>

                    <!-- File Info -->
                    <div class="tw-mt-12 tw-p-8 tw-bg-slate-50 tw-rounded-2xl tw-flex tw-items-center tw-gap-6 tw-hidden" id="file-info">
                        <div class="tw-w-16 tw-h-16 tw-bg-white tw-rounded-xl tw-flex tw-items-center tw-justify-center tw-text-2xl tw-text-indigo-600">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="tw-flex-1 tw-min-w-0">
                            <p class="tw-font-bold tw-text-slate-900 tw-truncate tw-text-lg" id="file-name"></p>
                            <p class="tw-text-slate-500" id="file-size"></p>
                        </div>
                        <button type="button" class="tw-w-12 tw-h-12 tw-bg-red-50 tw-text-red-600 tw-rounded-xl hover:tw-bg-red-600 hover:tw-text-white tw-transition-colors" id="remove-file">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Options Section -->
            <div class="tw-col-span-12 lg:tw-col-span-5">
                <div class="tw-glass-card tw-p-12 tw-rounded-[3rem] tw-bg-slate-900 tw-text-white tw-sticky tw-top-32">
                    <h2 class="tw-text-3xl tw-font-bold tw-mb-12 tw-flex tw-items-center tw-gap-4">
                        <span class="tw-w-10 tw-h-10 tw-bg-white/10 tw-text-indigo-400 tw-rounded-xl tw-flex tw-items-center tw-justify-center">
                            <i class="fas fa-cog"></i>
                        </span>
                        Configure
                    </h2>
                    
                    <form id="tool-options-form" class="tw-space-y-10">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                        <input type="hidden" name="upload_id" id="upload-id">

                        <?php foreach ($tool->getConfigSchema() as $key => $config): ?>
                            <div class="tw-space-y-4" data-conditional="<?php echo htmlspecialchars(json_encode($config['conditional'] ?? null)); ?>">
                                <label for="<?php echo $key; ?>" class="tw-block tw-text-sm tw-font-bold tw-uppercase tw-tracking-widest tw-text-slate-400">
                                    <?php echo htmlspecialchars($config['label']); ?>
                                    <?php if ($config['required'] ?? false): ?>
                                        <span class="tw-text-red-500">*</span>
                                    <?php endif; ?>
                                </label>
                                
                                <?php switch ($config['type']):
                                    case 'select': ?>
                                        <select name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                                class="tw-w-full tw-bg-white/5 tw-border tw-border-white/10 tw-rounded-2xl tw-p-5 tw-text-white focus:tw-border-indigo-500 focus:tw-outline-none"
                                                <?php echo ($config['required'] ?? false) ? 'required aria-required="true"' : ''; ?>>
                                            <?php foreach ($config['options'] as $value => $label): ?>
                                                <option value="<?php echo $value; ?>" class="tw-bg-slate-900"
                                                        <?php echo ($config['default'] ?? '') === $value ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($label); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php break; ?>

                                    <?php case 'boolean': ?>
                                        <label class="tw-inline-flex tw-items-center tw-cursor-pointer tw-gap-4">
                                            <input type="checkbox" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="tw-sr-only peer"
                                                   <?php echo ($config['default'] ?? false) ? 'checked' : ''; ?>
                                                   value="1">
                                            <div class="tw-w-14 tw-h-8 tw-bg-white/10 tw-rounded-full peer-checked:tw-bg-indigo-600 tw-relative tw-transition-colors after:tw-content-[''] after:tw-absolute after:tw-top-1 after:tw-left-1 after:tw-w-6 after:tw-h-6 after:tw-bg-white after:tw-rounded-full after:tw-transition-transform peer-checked:after:tw-translate-x-6"></div>
                                            <span class="tw-text-lg"><?php echo htmlspecialchars($config['description'] ?? ''); ?></span>
                                        </label>
                                    <?php break; ?>

                                    <?php case 'number': ?>
                                        <input type="number" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                               class="tw-w-full tw-bg-white/5 tw-border tw-border-white/10 tw-rounded-2xl tw-p-5 tw-text-white focus:tw-border-indigo-500 focus:tw-outline-none"
                                               value="<?php echo $config['default'] ?? ''; ?>"
                                               min="<?php echo $config['min'] ?? ''; ?>"
                                               max="<?php echo $config['max'] ?? ''; ?>"
                                               step="<?php echo $config['step'] ?? '1'; ?>"
                                               <?php echo ($config['required'] ?? false) ? 'required aria-required="true"' : ''; ?>>
                                    <?php break; ?>

                                    <?php default: ?>
                                        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
                                               class="tw-w-full tw-bg-white/5 tw-border tw-border-white/10 tw-rounded-2xl tw-p-5 tw-text-white focus:tw-border-indigo-500 focus:tw-outline-none"
                                               value="<?php echo htmlspecialchars($config['default'] ?? ''); ?>"
                                               <?php echo ($config['required'] ?? false) ? 'required aria-required="true"' : ''; ?>>
                                <?php endswitch; ?>
                            </div>
                        <?php endforeach; ?>

                        <!-- Submit Button -->
                        <button type="submit" class="tw-w-full tw-bg-indigo-600 tw-text-white tw-py-6 tw-rounded-2xl tw-text-xl tw-font-bold hover:tw-bg-indigo-500 tw-transition-colors disabled:tw-opacity-50 disabled:tw-cursor-not-allowed" id="process-btn" disabled>
                            <i class="fas fa-magic tw-mr-3"></i>
                            Process Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Results Section -->
        <div class="tw-mt-32 tw-hidden" id="tool-results">
            <div class="tw-glass-card tw-p-16 tw-rounded-[4rem] tw-bg-indigo-600 tw-text-white tw-text-center">
                <h2 class="tw-text-5xl tw-font-bold tw-mb-8">Processing Complete!</h2>
                <p class="tw-text-2xl tw-text-indigo-100 tw-mb-12" id="result-filename"></p>
                
                <div class="tw-flex tw-flex-wrap tw-justify-center tw-gap-6">
                    <a href="#" class="tw-bg-white tw-text-indigo-600 tw-px-12 tw-py-6 tw-rounded-2xl tw-text-xl tw-font-bold hover:tw-scale-105 tw-transition-transform" id="download-btn" download>
                        <i class="fas fa-download tw-mr-3"></i>
                        Download File
                    </a>
                    <button type="button" class="tw-bg-indigo-500 tw-text-white tw-px-12 tw-py-6 tw-rounded-2xl tw-text-xl tw-font-bold hover:tw-bg-indigo-400 tw-transition-colors" id="process-another">
                        <i class="fas fa-redo tw-mr-3"></i>
                        Start Over
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Info Details -->
<section class="tw-py-48 tw-bg-white">
    <div class="container">
        <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-16">
            <div class="tw-space-y-8">
                <h3 class="tw-text-2xl tw-font-bold tw-flex tw-items-center tw-gap-3">
                    <i class="fas fa-check-circle tw-text-indigo-600"></i>
                    Format Support
                </h3>
                <div class="tw-flex tw-flex-wrap tw-gap-3">
                    <?php foreach ($tool->getSupportedTypes() as $type): ?>
                        <span class="tw-px-6 tw-py-3 tw-bg-slate-50 tw-text-slate-600 tw-rounded-full tw-font-bold tw-text-sm"><?php echo htmlspecialchars($type); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="tw-space-y-8">
                <h3 class="tw-text-2xl tw-font-bold tw-flex tw-items-center tw-gap-3">
                    <i class="fas fa-database tw-text-indigo-600"></i>
                    Upload Specs
                </h3>
                <div class="tw-space-y-4">
                    <div class="tw-flex tw-justify-between tw-pb-4 tw-border-b tw-border-slate-100">
                        <span class="tw-text-slate-500">Max Size</span>
                        <span class="tw-font-bold"><?php echo number_format($tool->getMaxFileSize() / 1024 / 1024, 0); ?> MB</span>
                    </div>
                    <?php if ($tool->supportsChunking()): ?>
                        <div class="tw-flex tw-items-center tw-gap-2 tw-text-indigo-600">
                            <i class="fas fa-bolt"></i>
                            <span class="tw-font-bold">Optimized for large files</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="tw-space-y-8">
                <h3 class="tw-text-2xl tw-font-bold tw-flex tw-items-center tw-gap-3">
                    <i class="fas fa-lock tw-text-indigo-600"></i>
                    Privacy Protocol
                </h3>
                <p class="tw-text-slate-500 tw-leading-relaxed">
                    Encryption in transit, automated deletion upon completion, and zero-logs policy.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
window.toolConfig = {
    id: '<?php echo $tool->getId(); ?>',
    supportsChunking: <?php echo $tool->supportsChunking() ? 'true' : 'false'; ?>,
    maxFileSize: <?php echo $tool->getMaxFileSize(); ?>,
    acceptedTypes: <?php echo json_encode($tool->getSupportedTypes()); ?>,
    apiUrl: '<?php echo $base_url; ?>/tool/<?php echo $tool->getId(); ?>/process'
};
</script>
