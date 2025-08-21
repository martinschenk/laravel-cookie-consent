@php
// Get the CookieConsentService and its configuration
$cookieConsentService = app(\MartinSchenk\CookieConsent\Services\CookieConsentService::class);
$jsConfig = $cookieConsentService->getJsConfig();
@endphp

<!-- Cookie Consent System -->
<div id="cookie-consent-container" style="display: none;">
    <!-- Cookie Banner (simple banner with 3 buttons) -->
    <div 
        id="cookie-consent-modal"
        class="cookie-modal fixed inset-0 z-50 bg-black/60 flex items-center justify-center"
        style="display: none;"
    >
        <div class="bg-white rounded-lg p-6 shadow-xl max-w-lg w-full m-4">
            <div class="flex flex-col gap-4">
                <div>
                    <h3 class="text-lg font-semibold mb-1">{{ __('cookie-consent::cookie-consent.banner_title') }}</h3>
                    <p class="text-gray-700 text-sm">{{ __('cookie-consent::cookie-consent.banner_description') }}</p>
                </div>
                <div class="flex flex-wrap gap-2 justify-end">
                    <button 
                        id="cookie-accept-all"
                        class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md text-sm transition"
                    >{{ __('cookie-consent::cookie-consent.accept_all') }}</button>
                    <button 
                        id="cookie-decline-all"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm transition"
                    >{{ __('cookie-consent::cookie-consent.reject_all') }}</button>
                    <button 
                        id="cookie-show-settings"
                        class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-800 px-4 py-2 rounded-md text-sm transition"
                    >{{ __('cookie-consent::cookie-consent.settings') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cookie Settings Menu (Modal) -->
    <div 
        id="cookie-settings-modal"
        class="cookie-modal fixed inset-0 z-50 bg-black/60 flex items-center justify-center overflow-y-auto"
        style="display: none;"
    >
        <div class="bg-white rounded-lg max-w-xl w-full m-4 shadow-xl p-6 relative">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button
                        id="cookie-settings-close"
                        type="button"
                        class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none"
                    >
                        <span class="sr-only">{{ __('cookie-consent::cookie-consent.close') }}</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <h3 class="text-xl font-bold text-center mb-4 bg-gradient-to-r from-pink-500 via-purple-400 to-teal-400 text-transparent bg-clip-text">{{ __('cookie-consent::cookie-consent.banner_title') }}</h3>
                    
                    <div class="space-y-4 mt-6">
                        <!-- Analytics Cookies -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold">{{ __('cookie-consent::cookie-consent.analytics_title') }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">{{ __('cookie-consent::cookie-consent.analytics_description') }}</p>
                                </div>
                                <div class="ml-4">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input 
                                            type="checkbox" 
                                            id="cookie-analytics" 
                                            class="sr-only peer cookie-consent-checkbox"
                                            data-category="analytics"
                                        >
                                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-pink-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Preference Cookies -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold">{{ __('cookie-consent::cookie-consent.preferences_title') }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">{{ __('cookie-consent::cookie-consent.preferences_description') }}</p>
                                </div>
                                <div class="ml-4">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input 
                                            type="checkbox" 
                                            id="cookie-preferences" 
                                            class="sr-only peer cookie-consent-checkbox"
                                            data-category="preferences"
                                        >
                                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-pink-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Essential Cookies -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold">{{ __('cookie-consent::cookie-consent.essential_title') }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">{{ __('cookie-consent::cookie-consent.essential_description') }}</p>
                                </div>
                                <div class="ml-4">
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded">
                                        {{ __('cookie-consent::cookie-consent.active') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end">
                        <button 
                            id="cookie-save-settings"
                            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md text-sm transition"
                        >{{ __('cookie-consent::cookie-consent.save_settings') }}</button>
                    </div>
            </div>
        </div>
    </div>
</div>

@once
<style>
/* Prevent flash of unstyled content */
#cookie-consent-container {
    display: block !important;
}

/* Smooth transitions for modals */
.cookie-modal {
    transition: opacity 0.3s ease-in-out;
}

.cookie-modal.fade-in {
    animation: fadeIn 0.3s ease-in-out;
}

.cookie-modal.fade-out {
    animation: fadeOut 0.3s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}
</style>

<script>
(function() {
    'use strict';
    
    // Cookie Consent Manager Class
    class CookieConsentManager {
        constructor(config) {
            this.config = config;
            this.consent = {
                analytics: false,
                preferences: false
            };
            
            // Cache DOM elements
            this.elements = {
                container: document.getElementById('cookie-consent-container'),
                modal: document.getElementById('cookie-consent-modal'),
                settingsModal: document.getElementById('cookie-settings-modal'),
                acceptAllBtn: document.getElementById('cookie-accept-all'),
                declineAllBtn: document.getElementById('cookie-decline-all'),
                showSettingsBtn: document.getElementById('cookie-show-settings'),
                saveSettingsBtn: document.getElementById('cookie-save-settings'),
                closeSettingsBtn: document.getElementById('cookie-settings-close'),
                analyticsCheckbox: document.getElementById('cookie-analytics'),
                preferencesCheckbox: document.getElementById('cookie-preferences')
            };
            
            this.init();
        }
        
        init() {
            // Bind event listeners
            this.bindEvents();
            
            // Check if consent is already saved
            const saved = localStorage.getItem('cookieConsent');
            const cookieSaved = this.getCookie('cookieConsent');
            
            // Show modal if either localStorage OR cookie is missing
            if (!saved || !cookieSaved) {
                this.showModal();
                // Clear any inconsistent state
                if (saved && !cookieSaved) {
                    localStorage.removeItem('cookieConsent');
                }
            } else {
                this.consent = JSON.parse(saved);
                this.updateCheckboxes();
                this.applyConsent();
            }
            
            // Listen for custom event to open settings from footer links
            document.addEventListener('open-cookie-settings', () => {
                this.hideModal();
                this.showSettingsModal();
            });
        }
        
        bindEvents() {
            // Button events
            this.elements.acceptAllBtn.addEventListener('click', () => this.acceptAll());
            this.elements.declineAllBtn.addEventListener('click', () => this.declineAll());
            this.elements.showSettingsBtn.addEventListener('click', () => this.showSettings());
            this.elements.saveSettingsBtn.addEventListener('click', () => this.saveSettings());
            this.elements.closeSettingsBtn.addEventListener('click', () => this.cancelSettings());
            
            // Checkbox events for two-way binding
            this.elements.analyticsCheckbox.addEventListener('change', (e) => {
                this.consent.analytics = e.target.checked;
            });
            
            this.elements.preferencesCheckbox.addEventListener('change', (e) => {
                this.consent.preferences = e.target.checked;
            });
        }
        
        showModal() {
            this.elements.modal.style.display = 'flex';
            this.elements.modal.classList.add('fade-in');
        }
        
        hideModal() {
            this.elements.modal.classList.add('fade-out');
            setTimeout(() => {
                this.elements.modal.style.display = 'none';
                this.elements.modal.classList.remove('fade-out');
            }, 300);
        }
        
        showSettingsModal() {
            this.elements.settingsModal.style.display = 'flex';
            this.elements.settingsModal.classList.add('fade-in');
            this.updateCheckboxes();
        }
        
        hideSettingsModal() {
            this.elements.settingsModal.classList.add('fade-out');
            setTimeout(() => {
                this.elements.settingsModal.style.display = 'none';
                this.elements.settingsModal.classList.remove('fade-out');
            }, 300);
        }
        
        updateCheckboxes() {
            this.elements.analyticsCheckbox.checked = this.consent.analytics;
            this.elements.preferencesCheckbox.checked = this.consent.preferences;
        }
        
        acceptAll() {
            this.consent.analytics = true;
            this.consent.preferences = true;
            this.storeConsent();
            this.applyConsent();
            this.hideModal();
        }
        
        declineAll() {
            this.consent.analytics = false;
            this.consent.preferences = false;
            this.storeConsent();
            this.applyConsent();
            this.hideModal();
        }
        
        showSettings() {
            this.hideModal();
            this.showSettingsModal();
        }
        
        cancelSettings() {
            this.hideSettingsModal();
            this.showModal();
        }
        
        saveSettings() {
            this.storeConsent();
            this.applyConsent();
            this.hideSettingsModal();
        }
        
        storeConsent() {
            // Store in localStorage
            localStorage.setItem('cookieConsent', JSON.stringify(this.consent));
            
            // Also store as an actual cookie with 1 year expiration
            const consentJSON = JSON.stringify(this.consent);
            const expiryDate = new Date();
            expiryDate.setFullYear(expiryDate.getFullYear() + 1);
            document.cookie = `cookieConsent=${encodeURIComponent(consentJSON)}; expires=${expiryDate.toUTCString()}; path=/; SameSite=Lax`;
        }
        
        applyConsent() {
            if (this.consent.analytics) {
                this.loadGoogleAnalytics();
            } else {
                this.removeGoogleAnalytics();
            }
            
            if (this.consent.preferences) {
                this.setLocaleCookie(this.getLocale());
            } else {
                this.deleteCookie('locale');
            }
        }
        
        loadGoogleAnalytics() {
            if (document.getElementById('ga-script')) return;
            
            const gaId = this.config.googleAnalyticsId;
            
            // Skip if no GA ID is configured
            if (!gaId || gaId === 'G-XXXXXXXXXX' || gaId === '') {
                console.warn('Google Analytics ID not configured');
                return;
            }
            
            const s = document.createElement('script');
            s.src = `https://www.googletagmanager.com/gtag/js?id=${gaId}`;
            s.async = true;
            s.id = 'ga-script';
            document.head.appendChild(s);
            
            window.dataLayer = window.dataLayer || [];
            window.gtag = function() { dataLayer.push(arguments); };
            gtag('js', new Date());
            gtag('config', gaId);
        }
        
        removeGoogleAnalytics() {
            const knownPrefixes = ['_ga', '_gid', '_gat', '__ga', '__gads'];
            
            document.cookie.split(';').forEach(cookie => {
                const name = cookie.trim().split('=')[0];
                if (knownPrefixes.some(prefix => name.startsWith(prefix))) {
                    this.deleteCookie(name);
                }
            });
            
            const script = document.getElementById('ga-script');
            if (script) script.remove();
        }
        
        deleteCookie(name) {
            document.cookie = `${name}=; Max-Age=0; path=/; domain=.${window.location.hostname}; SameSite=Lax`;
            document.cookie = `${name}=; Max-Age=0; path=/; SameSite=Lax`;
        }
        
        setLocaleCookie(value) {
            document.cookie = `locale=${value}; path=/; max-age=31536000; SameSite=Lax`;
        }
        
        getLocale() {
            return document.documentElement.lang || 'en';
        }
        
        getCookie(name) {
            const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? match[2] : null;
        }
    }
    
    // Global function to open cookie settings (for footer links)
    window.openCookieSettings = function() {
        document.dispatchEvent(new CustomEvent('open-cookie-settings'));
    };
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            new CookieConsentManager(@json($jsConfig));
        });
    } else {
        new CookieConsentManager(@json($jsConfig));
    }
})();
</script>
@endonce