<?php
/**
 * Novel to Manga Script Converter - Tool View
 * 
 * Extended view for the NovelToManga tool with AI provider selection,
 * API key management, and advanced options.
 * 
 * @package DGLab\Views\Tools
 */

use DGLab\Tools\NovelToManga\NovelToManga;

$isNovelToManga = $tool instanceof NovelToManga;
$userId = session_id() ?? 'guest_' . uniqid();

// Check for stored API keys
$hasOpenAiKey = $isNovelToManga && $tool->hasApiKey($userId, 'openai');
$hasClaudeKey = $isNovelToManga && $tool->hasApiKey($userId, 'claude');
$hasGeminiKey = $isNovelToManga && $tool->hasApiKey($userId, 'gemini');
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
            <!-- Left Column: Upload & Info -->
            <div class="col-lg-5">
                <!-- Upload Panel -->
                <div class="bg-white p-6 p-md-8 rounded-3xl border shadow-sm mb-8">
                    <h2 class="h4 fw-bold text-gray-900 mb-6 d-flex align-items-center gap-2">
                        <i class="fas fa-cloud-upload-alt text-indigo-600"></i>
                        1. Upload Novel (EPUB)
                    </h2>

                    <div class="position-relative cursor-pointer transition-all hover:bg-gray-50 border-2 border-dashed border-gray-300 rounded-3xl p-10 text-center mb-4" id="upload-zone">
                        <input type="file" id="file-input" class="position-absolute top-0 start-0 w-100 h-100 opacity-0 cursor-pointer"
                               accept="<?php echo implode(',', $tool->getSupportedTypes()); ?>"
                               data-max-size="<?php echo $tool->getMaxFileSize(); ?>">
                        <div class="upload-zone-content">
                            <div class="bg-gray-100 text-gray-400 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-book fs-3"></i>
                            </div>
                            <p class="fs-5 text-gray-900 mb-1 fw-semibold">Click to upload novel</p>
                            <p class="text-gray-500 mb-0 text-sm">EPUB files only (Max <?php echo number_format($tool->getMaxFileSize() / 1024 / 1024, 0); ?> MB)</p>
                        </div>
                    </div>

                    <!-- Upload Progress -->
                    <div class="mb-4" id="upload-progress" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-sm fw-bold text-indigo-600">Uploading...</span>
                            <span class="text-sm text-gray-500" id="progress-text">0%</span>
                        </div>
                        <div class="progress" style="height: 10px; border-radius: 10px;">
                            <div class="progress-bar bg-indigo-600 rounded-pill" role="progressbar" id="progress-fill" style="width: 0%"></div>
                        </div>
                    </div>

                    <!-- File Info -->
                    <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-4 d-flex align-items-center gap-4" id="file-info" style="display: none;">
                        <div class="bg-indigo-600 text-white rounded-xl d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fas fa-file-alt fs-5"></i>
                        </div>
                        <div class="flex-grow-1 min-w-0">
                            <p class="text-gray-900 fw-bold mb-0 text-truncate" id="file-name"></p>
                            <p class="text-indigo-600 text-xs mb-0" id="file-size"></p>
                        </div>
                        <button type="button" class="btn btn-light btn-sm rounded-circle p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 transition-colors border-0" id="remove-file" aria-label="Remove file">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <!-- AI Info Card -->
                <div class="bg-gradient-to-br from-indigo-600 to-purple-600 text-white p-6 p-md-8 rounded-3xl shadow-lg">
                    <h3 class="h5 fw-bold mb-4 d-flex align-items-center gap-2">
                        <i class="fas fa-robot"></i>
                        AI Processing
                    </h3>
                    <p class="opacity-90 mb-6 text-sm leading-relaxed">Your novel will be processed using AI to convert it into a structured manga script format.</p>
                    <ul class="list-unstyled space-y-3 mb-0">
                        <li class="d-flex align-items-center gap-3 text-sm">
                            <i class="fas fa-check-circle text-emerald-400"></i>
                            <span>Contextual chunking for optimal results</span>
                        </li>
                        <li class="d-flex align-items-center gap-3 text-sm">
                            <i class="fas fa-check-circle text-emerald-400"></i>
                            <span>Character dialogue extraction</span>
                        </li>
                        <li class="d-flex align-items-center gap-3 text-sm">
                            <i class="fas fa-check-circle text-emerald-400"></i>
                            <span>Scene descriptions and panel layouts</span>
                        </li>
                        <li class="d-flex align-items-center gap-3 text-sm">
                            <i class="fas fa-check-circle text-emerald-400"></i>
                            <span>Preserves chapter structure</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Right Column: Options & Process -->
            <div class="col-lg-7">
                <div class="bg-white p-6 p-md-8 rounded-3xl border shadow-sm">
                    <h2 class="h4 fw-bold text-gray-900 mb-6 d-flex align-items-center gap-2">
                        <i class="fas fa-cog text-indigo-600"></i>
                        2. Conversion Options
                    </h2>
                    
                    <form id="tool-options-form">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                        <input type="hidden" name="upload_id" id="upload-id">
                        
                        <div class="row g-6">
                            <!-- AI Provider -->
                            <div class="col-md-6">
                                <label for="ai_provider" class="form-label fw-bold text-gray-700 mb-2">
                                    <i class="fas fa-brain me-1 text-indigo-500"></i> AI Provider
                                </label>
                                <select name="ai_provider" id="ai_provider" class="form-select rounded-xl py-2.5 shadow-sm border-gray-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all" required aria-required="true">
                                    <option value="openai" selected>OpenAI GPT</option>
                                    <option value="claude">Anthropic Claude</option>
                                    <option value="gemini">Google Gemini</option>
                                </select>
                                <div id="provider-badge" class="mt-2 text-xs"></div>
                            </div>

                            <!-- AI Model -->
                            <div class="col-md-6">
                                <label for="ai_model" class="form-label fw-bold text-gray-700 mb-2">
                                    <i class="fas fa-microchip me-1 text-indigo-500"></i> AI Model
                                </label>
                                <select name="ai_model" id="ai_model" class="form-select rounded-xl py-2.5 shadow-sm border-gray-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all" required aria-required="true">
                                    <optgroup label="OpenAI Models" data-provider="openai">
                                        <option value="gpt-4o-mini" selected>GPT-4o Mini (Fast, Free)</option>
                                        <option value="gpt-4o">GPT-4o (Best Quality)</option>
                                    </optgroup>
                                    <optgroup label="Claude Models" data-provider="claude">
                                        <option value="claude-3-opus">Claude 3 Opus (Best Quality)</option>
                                        <option value="claude-3-sonnet">Claude 3 Sonnet (Balanced)</option>
                                        <option value="claude-3-haiku">Claude 3 Haiku (Fast)</option>
                                    </optgroup>
                                    <optgroup label="Gemini Models" data-provider="gemini">
                                        <option value="gemini-1.5-pro">Gemini 1.5 Pro (Best Quality)</option>
                                        <option value="gemini-1.5-flash">Gemini 1.5 Flash (Fast)</option>
                                    </optgroup>
                                </select>
                            </div>
                            
                            <!-- Content Mode -->
                            <div class="col-md-6">
                                <label for="content_mode" class="form-label fw-bold text-gray-700 mb-2">
                                    <i class="fas fa-shield-alt me-1 text-indigo-500"></i> Content Mode
                                </label>
                                <select name="content_mode" id="content_mode" class="form-select rounded-xl py-2.5 shadow-sm border-gray-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-100 transition-all" required aria-required="true">
                                    <option value="censored" selected>Censored (Safe)</option>
                                    <option value="uncensored">Uncensored (Mature)</option>
                                </select>
                                <div id="content-warning" class="mt-2 p-2 bg-amber-50 text-amber-700 rounded-lg text-xs border border-amber-100 d-none">
                                    <i class="fas fa-exclamation-triangle me-1"></i> Uncensored mode may produce mature content.
                                </div>
                            </div>

                            <!-- Chunk Size -->
                            <div class="col-md-6">
                                <label for="chunk_size" class="form-label fw-bold text-gray-700 mb-2">
                                    <i class="fas fa-cut me-1 text-indigo-500"></i> Chunk Size
                                </label>
                                <select name="chunk_size" id="chunk_size" class="form-select rounded-xl py-2.5 shadow-sm border-gray-300" required aria-required="true">
                                    <option value="2000">2,000 tokens (Fastest)</option>
                                    <option value="4000" selected>4,000 tokens (Balanced)</option>
                                    <option value="8000">8,000 tokens (Best Context)</option>
                                </select>
                            </div>

                            <!-- API Key Section -->
                            <div class="col-12">
                                <div class="p-4 bg-gray-50 border rounded-2xl">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input cursor-pointer" type="checkbox" role="switch" name="use_custom_key" id="use_custom_key" value="1">
                                        <label class="form-check-label text-gray-700 fw-bold" for="use_custom_key">Use my own API key</label>
                                    </div>

                                    <div id="custom-key-container" class="d-none">
                                        <div class="input-group mb-3">
                                            <input type="password" name="custom_api_key" id="custom_api_key" class="form-control rounded-s-xl py-2.5 border-gray-300 focus:border-indigo-600" placeholder="Enter your API key">
                                            <button type="button" class="btn btn-outline-secondary rounded-e-xl" id="toggle-key-visibility" aria-label="Toggle API key visibility">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex gap-2 mb-3">
                                            <button type="button" class="btn btn-indigo-600 text-white btn-sm rounded-pill px-4" id="save-key-btn" style="background-color: #4f46e5;">Save Key</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-4 d-none" id="delete-key-btn">Remove Saved Key</button>
                                        </div>
                                        <div id="key-status" class="text-xs mb-2 fw-medium"></div>
                                        <p class="text-xs text-gray-500 mb-0"><i class="fas fa-lock me-1"></i> Your key is encrypted and stored securely.</p>
                                    </div>

                                    <div id="stored-keys-info" class="mt-3 pt-3 border-top d-none"></div>
                                </div>
                            </div>

                            <!-- Toggles -->
                            <div class="col-12">
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="preserve_chapters" id="preserve_chapters" value="1" checked>
                                            <label class="form-check-label text-sm text-gray-600" for="preserve_chapters">Preserve Chapters</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="include_descriptions" id="include_descriptions" value="1" checked>
                                            <label class="form-check-label text-sm text-gray-600" for="include_descriptions">Include Scene Descriptions</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="mt-8 pt-6 border-top">
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill py-3 btn-gradient border-0 fw-bold shadow-lg d-flex align-items-center justify-content-center gap-2" id="process-btn" disabled aria-label="Convert to Manga Script">
                                <i class="fas fa-magic"></i>
                                <span>Convert to Manga Script</span>
                            </button>
                            <div class="mt-4 p-3 bg-blue-50 border border-blue-100 rounded-xl text-xs text-blue-700 d-flex gap-2">
                                <i class="fas fa-info-circle mt-0.5"></i>
                                <span>Processing may take 1-5 minutes depending on novel length.</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Progress Panel -->
        <div id="progress-panel" class="mt-12 d-none">
            <div class="bg-white p-8 rounded-3xl border shadow-sm">
                <div class="text-center mb-8">
                    <div class="spinner-border text-indigo-600 mb-4" role="status"></div>
                    <h3 class="h4 fw-bold text-gray-900">Converting Novel...</h3>
                    <p id="progress-stage" class="text-gray-500">Initializing...</p>
                </div>
                
                <div class="px-md-10 mb-10">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-sm fw-bold text-indigo-600">Total Progress</span>
                        <span class="text-sm text-gray-500" id="conversion-progress-text">0%</span>
                    </div>
                    <div class="progress" style="height: 12px; border-radius: 12px;">
                        <div class="progress-bar bg-gradient-to-r from-indigo-600 to-purple-600 rounded-pill" role="progressbar" id="conversion-progress-fill" style="width: 0%"></div>
                    </div>
                </div>
                
                <div class="row g-4 text-center" id="progress-steps">
                    <div class="col" data-step="extract">
                        <div class="step-icon mx-auto mb-2 bg-gray-100 text-gray-400 rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;"><i class="fas fa-file-archive"></i></div>
                        <span class="text-xs fw-bold text-uppercase tracking-tighter d-block">Extract</span>
                    </div>
                    <div class="col" data-step="parse">
                        <div class="step-icon mx-auto mb-2 bg-gray-100 text-gray-400 rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;"><i class="fas fa-file-alt"></i></div>
                        <span class="text-xs fw-bold text-uppercase tracking-tighter d-block">Parse</span>
                    </div>
                    <div class="col" data-step="chunk">
                        <div class="step-icon mx-auto mb-2 bg-gray-100 text-gray-400 rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;"><i class="fas fa-cut"></i></div>
                        <span class="text-xs fw-bold text-uppercase tracking-tighter d-block">Segment</span>
                    </div>
                    <div class="col" data-step="ai">
                        <div class="step-icon mx-auto mb-2 bg-gray-100 text-gray-400 rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;"><i class="fas fa-robot"></i></div>
                        <span class="text-xs fw-bold text-uppercase tracking-tighter d-block">AI</span>
                    </div>
                    <div class="col" data-step="format">
                        <div class="step-icon mx-auto mb-2 bg-gray-100 text-gray-400 rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;"><i class="fas fa-paint-brush"></i></div>
                        <span class="text-xs fw-bold text-uppercase tracking-tighter d-block">Format</span>
                    </div>
                    <div class="col" data-step="create">
                        <div class="step-icon mx-auto mb-2 bg-gray-100 text-gray-400 rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;"><i class="fas fa-book"></i></div>
                        <span class="text-xs fw-bold text-uppercase tracking-tighter d-block">Finish</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Section -->
        <div id="tool-results" class="mt-12 d-none">
            <div class="bg-emerald-50 border border-emerald-100 p-8 rounded-3xl shadow-sm">
                <div class="row align-items-center g-6">
                    <div class="col-auto">
                        <div class="bg-emerald-600 text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;"><i class="fas fa-check fs-3"></i></div>
                    </div>
                    <div class="col">
                        <h2 class="h4 fw-bold text-emerald-900 mb-1">Conversion Complete!</h2>
                        <p id="result-filename" class="text-emerald-700 mb-0"></p>
                        <div id="result-stats" class="text-xs text-emerald-600 mt-2 d-flex gap-3"></div>
                    </div>
                    <div class="col-lg-auto">
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#" class="btn btn-emerald-600 text-white px-8 rounded-pill fw-bold shadow-md hover:scale-105 transition-transform text-decoration-none d-flex align-items-center gap-2" id="download-btn" download style="background-color: #059669;" aria-label="Download Script">
                                <i class="fas fa-download"></i>
                                <span>Download Script</span>
                            </a>
                            <button type="button" class="btn btn-outline-emerald px-6 rounded-pill d-flex align-items-center gap-2 transition-all hover:bg-emerald-100" id="process-another" aria-label="Convert Another">
                                <i class="fas fa-redo"></i>
                                <span>Convert Another</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Tool-specific configuration
window.toolConfig = {
    id: '<?php echo $tool->getId(); ?>',
    supportsChunking: <?php echo $tool->supportsChunking() ? 'true' : 'false'; ?>,
    maxFileSize: <?php echo $tool->getMaxFileSize(); ?>,
    acceptedTypes: <?php echo json_encode($tool->getSupportedTypes()); ?>,
    apiUrl: '<?php echo $base_url; ?>/tool/<?php echo $tool->getId(); ?>/process',
    apiKeyUrl: '<?php echo $base_url; ?>/api/v1/novel-to-manga/apikey',
    hasStoredKeys: {
        openai: <?php echo $hasOpenAiKey ? 'true' : 'false'; ?>,
        claude: <?php echo $hasClaudeKey ? 'true' : 'false'; ?>,
        gemini: <?php echo $hasGeminiKey ? 'true' : 'false'; ?>
    }
};

// Model availability by provider
const modelsByProvider = {
    openai: ['gpt-4o-mini', 'gpt-4o'],
    claude: ['claude-3-opus', 'claude-3-sonnet', 'claude-3-haiku'],
    gemini: ['gemini-1.5-pro', 'gemini-1.5-flash']
};

// Provider info
const providerInfo = {
    openai: { badge: '<span class="badge bg-emerald-100 text-emerald-700">Free Tier Available</span>', hasFree: true },
    claude: { badge: '<span class="badge bg-amber-100 text-amber-700">API Key Required</span>', hasFree: false },
    gemini: { badge: '<span class="badge bg-amber-100 text-amber-700">API Key Required</span>', hasFree: false }
};

$(document).ready(function() {
    // AI Provider change handler
    $('#ai_provider').on('change', function() {
        const provider = $(this).val();
        updateModelOptions(provider);
        updateProviderBadge(provider);
        updateApiKeyUI(provider);
    });
    
    // Content mode change handler
    $('#content_mode').on('change', function() {
        const mode = $(this).val();
        if (mode === 'uncensored') {
            $('#content-warning').removeClass('d-none');
        } else {
            $('#content-warning').addClass('d-none');
        }
    });
    
    // Custom API key toggle
    $('#use_custom_key').on('change', function() {
        if ($(this).is(':checked')) {
            $('#custom-key-container').removeClass('d-none');
            checkStoredKey();
        } else {
            $('#custom-key-container').addClass('d-none');
        }
    });
    
    // Toggle key visibility
    $('#toggle-key-visibility').on('click', function() {
        const input = $('#custom_api_key');
        const icon = $(this).find('i');
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
    
    // Save API key
    $('#save-key-btn').on('click', function() {
        const provider = $('#ai_provider').val();
        const apiKey = $('#custom_api_key').val().trim();
        if (!apiKey) { showKeyStatus('Please enter an API key', 'text-red-600'); return; }
        
        $.ajax({
            url: window.toolConfig.apiKeyUrl,
            method: 'POST',
            data: { provider: provider, api_key: apiKey, csrf_token: $('input[name="csrf_token"]').val() },
            success: function(response) {
                if (response.success) {
                    showKeyStatus('API key saved successfully!', 'text-emerald-600');
                    window.toolConfig.hasStoredKeys[provider] = true;
                    updateStoredKeysUI();
                    $('#delete-key-btn').removeClass('d-none');
                } else {
                    showKeyStatus(response.message || 'Failed to save key', 'text-red-600');
                }
            },
            error: function(xhr) { showKeyStatus(xhr.responseJSON?.message || 'Failed to save key', 'text-red-600'); }
        });
    });
    
    // Delete API key
    $('#delete-key-btn').on('click', function() {
        const provider = $('#ai_provider').val();
        if (!confirm('Are you sure you want to remove your saved API key for ' + provider + '?')) return;
        $.ajax({
            url: window.toolConfig.apiKeyUrl,
            method: 'DELETE',
            data: { provider: provider, csrf_token: $('input[name="csrf_token"]').val() },
            success: function(response) {
                if (response.success) {
                    showKeyStatus('API key removed successfully!', 'text-emerald-600');
                    window.toolConfig.hasStoredKeys[provider] = false;
                    updateStoredKeysUI();
                    $('#delete-key-btn').addClass('d-none');
                    $('#custom_api_key').val('');
                } else {
                    showKeyStatus(response.message || 'Failed to remove key', 'text-red-600');
                }
            }
        });
    });
    
    function updateModelOptions(provider) {
        const $modelSelect = $('#ai_model');
        $modelSelect.find('optgroup').hide().filter('[data-provider="' + provider + '"]').show();
        const availableModels = modelsByProvider[provider] || [];
        if (availableModels.length > 0) $modelSelect.val(availableModels[0]);
    }
    
    function updateProviderBadge(provider) {
        $('#provider-badge').html(providerInfo[provider]?.badge || '');
    }
    
    function updateApiKeyUI(provider) {
        const hasStoredKey = window.toolConfig.hasStoredKeys[provider];
        if (hasStoredKey) {
            $('#delete-key-btn').removeClass('d-none');
            showKeyStatus('You have a saved key for ' + provider, 'text-blue-600');
        } else {
            $('#delete-key-btn').addClass('d-none');
            $('#key-status').empty();
        }
    }
    
    function checkStoredKey() {
        const provider = $('#ai_provider').val();
        if (window.toolConfig.hasStoredKeys[provider]) {
            $('#delete-key-btn').removeClass('d-none');
            showKeyStatus('Using saved key for ' + provider, 'text-blue-600');
        }
    }
    
    function showKeyStatus(message, cls) {
        $('#key-status').removeClass('text-emerald-600 text-red-600 text-blue-600').addClass(cls).text(message);
    }
    
    function updateStoredKeysUI() {
        const keys = [];
        Object.keys(window.toolConfig.hasStoredKeys).forEach(p => {
            if (window.toolConfig.hasStoredKeys[p]) keys.push(p.charAt(0).toUpperCase() + p.slice(1));
        });
        const $info = $('#stored-keys-info');
        if (keys.length > 0) {
            $info.removeClass('d-none').html('<p class="text-xs fw-bold text-gray-700 mb-2">Saved Keys:</p><div class="d-flex flex-wrap gap-2">' +
                keys.map(k => '<span class="badge bg-indigo-50 text-indigo-600">' + k + '</span>').join('') + '</div>');
        } else {
            $info.addClass('d-none').empty();
        }
    }
    
    // Process form
    $('#tool-options-form').on('submit', function(e) {
        e.preventDefault();
        const uploadId = $('#upload-id').val();
        if (!uploadId) { alert('Please upload a file first'); return; }
        
        $('#progress-panel').removeClass('d-none');
        $('#tool-results').addClass('d-none');
        $('#process-btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Converting...');
        
        $.ajax({
            url: window.toolConfig.apiUrl,
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    updateProgressSteps('complete');
                    showResults(response.data);
                } else {
                    showError(response.message || 'Conversion failed');
                }
            }
        });
        pollProgress();
    });
    
    function pollProgress() {
        const jobId = $('#upload-id').val();
        if (!jobId) return;
        const checkProgress = function() {
            $.ajax({
                url: '<?php echo $base_url; ?>/tool/' + window.toolConfig.id + '/progress/' + jobId,
                method: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        updateProgressDisplay(response.data);
                        if (response.data.status === 'processing') setTimeout(checkProgress, 1000);
                    }
                }
            });
        };
        checkProgress();
    }
    
    function updateProgressDisplay(data) {
        const progress = data.progress || 0;
        $('#conversion-progress-fill').css('width', progress + '%');
        $('#conversion-progress-text').text(progress + '%');
        if (data.message) $('#progress-stage').text(data.message);
        updateProgressSteps(data.stage);
    }
    
    function updateProgressSteps(currentStage) {
        const steps = ['extract', 'parse', 'chunk', 'ai', 'format', 'create'];
        const stageIndex = steps.indexOf(currentStage);
        steps.forEach((step, index) => {
            const $step = $('.col[data-step="' + step + '"]');
            const $icon = $step.find('.step-icon');
            $icon.removeClass('bg-indigo-600 text-white bg-emerald-600 bg-gray-100 text-gray-400');
            $step.removeClass('text-indigo-600 text-emerald-600');
            
            if (index < stageIndex || currentStage === 'complete') {
                $icon.addClass('bg-emerald-600 text-white');
                $step.addClass('text-emerald-600');
            } else if (index === stageIndex) {
                $icon.addClass('bg-indigo-600 text-white');
                $step.addClass('text-indigo-600');
            } else {
                $icon.addClass('bg-gray-100 text-gray-400');
            }
        });
    }
    
    function showResults(data) {
        $('#progress-panel').addClass('d-none');
        $('#tool-results').removeClass('d-none');
        $('#process-btn').prop('disabled', false).html('<i class="fas fa-magic"></i> Convert to Manga Script');
        $('#result-filename').text(data.output_filename);
        $('#result-stats').html('<span><i class="fas fa-cut"></i> ' + (data.chunks_processed || 0) + ' chunks</span>' +
            '<span><i class="fas fa-clock"></i> ' + (data.processing_time || 0) + 's</span>');
        $('#download-btn').attr('href', data.download_url);
    }
    
    function showError(message) {
        $('#progress-panel').addClass('d-none');
        $('#process-btn').prop('disabled', false).html('<i class="fas fa-magic"></i> Convert to Manga Script');
        alert('Error: ' + message);
    }

    // Initialize UI
    updateModelOptions($('#ai_provider').val());
    updateProviderBadge($('#ai_provider').val());
    updateStoredKeysUI();

    $('#process-another').on('click', function() {
        location.reload();
    });
});
</script>

<style>
/* Additional specific styles */
.bg-gradient-to-br { background: linear-gradient(135deg, var(--tw-gradient-from), var(--tw-gradient-to)); }
.from-indigo-600 { --tw-gradient-from: #4f46e5; }
.to-purple-600 { --tw-gradient-to: #9333ea; }
.rounded-3xl { border-radius: 1.5rem; }
.rounded-2xl { border-radius: 1rem; }
.rounded-xl { border-radius: 0.75rem; }
.space-y-3 > :not([hidden]) ~ :not([hidden]) { margin-top: 0.75rem; }
.space-y-4 > :not([hidden]) ~ :not([hidden]) { margin-top: 1rem; }
.space-y-6 > :not([hidden]) ~ :not([hidden]) { margin-top: 1.5rem; }
</style>
