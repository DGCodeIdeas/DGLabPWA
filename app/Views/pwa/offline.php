<?php
/**
 * Offline Page View
 */
?>
<div class="container tw-py-20 tw-text-center">
    <div class="tw-max-w-md tw-mx-auto">
        <div class="tw-mb-8">
            <i class="fas fa-wifi-slash tw-text-6xl tw-text-gray-300"></i>
        </div>
        <h1 class="tw-text-3xl tw-font-bold tw-mb-4">You are Offline</h1>
        <p class="tw-text-gray-600 tw-mb-8">
            It looks like you don't have an active internet connection.
            Some features may be limited, but you can still access previously
            cached tools and documentation.
        </p>
        <div class="tw-flex tw-flex-col tw-gap-4">
            <button onclick="window.location.reload()" class="btn btn-primary btn-lg">
                <i class="fas fa-sync-alt"></i>
                Try Again
            </button>
            <a href="/" class="btn btn-outline">
                <i class="fas fa-home"></i>
                Back to Home
            </a>
        </div>
    </div>
</div>
