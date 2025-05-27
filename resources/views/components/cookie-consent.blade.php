@php
// Get the CookieConsentService and its configuration
$cookieConsentService = app(\MartinSchenk\CookieConsent\Services\CookieConsentService::class);
$jsConfig = $cookieConsentService->getJsConfig();
@endphp

<!-- Cookie Consent System -->
<div 
    x-data="cookieConsent()" 
    x-init="init()"
    x-cloak
>
    <!-- Cookie Banner (simple banner with 3 buttons) -->
    <div 
        x-show="showModal" 
        x-transition
        class="fixed inset-0 z-50 bg-black/60 flex items-center justify-center"
    >
        <div class="bg-white rounded-lg p-6 shadow-xl max-w-lg w-full m-4">
            <div class="flex flex-col gap-4">
                <div>
                    <h3 class="text-lg font-semibold mb-1">{{ __('cookie-consent::cookie-consent.banner_title') }}</h3>
                    <p class="text-gray-700 text-sm">{{ __('cookie-consent::cookie-consent.banner_description') }}</p>
                </div>
                <div class="flex flex-wrap gap-2 justify-end">
                    <button 
                        @click="acceptAll()" 
                        class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md text-sm transition"
                    >{{ __('cookie-consent::cookie-consent.accept_all') }}</button>
                    <button 
                        @click="declineAll()" 
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm transition"
                    >{{ __('cookie-consent::cookie-consent.reject_all') }}</button>
                    <button 
                        @click="showSettings()" 
                        class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-800 px-4 py-2 rounded-md text-sm transition"
                    >{{ __('cookie-consent::cookie-consent.settings') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cookie Settings Menu (Modal) -->
    <div 
        x-show="showSettingsModal" 
        x-transition
        class="fixed inset-0 z-50 bg-black/60 flex items-center justify-center overflow-y-auto"
    >
        <div class="bg-white rounded-lg max-w-xl w-full m-4 shadow-xl p-6 relative">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button
                        @click="cancelSettings()"
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
                                            class="sr-only peer"
                                            x-model="consent.analytics"
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
                                            class="sr-only peer"
                                            x-model="consent.preferences"
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
                            @click="saveSettings()" 
                            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md text-sm transition"
                        >{{ __('cookie-consent::cookie-consent.save_settings') }}</button>
                    </div>
            </div>
        </div>
    </div>
</div>

@once
<script>
// Global variables for cookie consent communication
window.CookieConsentGlobals = {
    showSettingsModal: false
};

// Global function to open cookie settings
window.openCookieSettings = function() {
    // Set global variable and trigger custom event
    window.CookieConsentGlobals.showSettingsModal = true;
    document.dispatchEvent(new CustomEvent('open-cookie-settings'));
};

function cookieConsent() {
    return {
        showModal: false,
        showSettingsModal: false,
        consent: {
            analytics: false,
            preferences: false,
        },

        init() {
            // Listen for custom event to open settings
            document.addEventListener('open-cookie-settings', () => {
                this.showModal = false;
                this.showSettingsModal = true;
            });
            
            // Check if settings are already saved
            const saved = localStorage.getItem('cookieConsent');
            if (!saved) {
                this.showModal = true;
            } else {
                this.consent = JSON.parse(saved);
                this.applyConsent();
            }
            
            // Check if settings should be opened via footer link
            if (window.CookieConsentGlobals && window.CookieConsentGlobals.showSettingsModal) {
                this.showSettings();
                window.CookieConsentGlobals.showSettingsModal = false;
            }
        },

        acceptAll() {
            this.consent.analytics = true;
            this.consent.preferences = true;
            this.storeConsent();
            this.applyConsent();
            this.showModal = false;
        },

        declineAll() {
            this.consent.analytics = false;
            this.consent.preferences = false;
            this.storeConsent();
            this.applyConsent();
            this.showModal = false;
        },

        showSettings() {
            this.showModal = false;
            this.showSettingsModal = true;
        },

        cancelSettings() {
            this.showSettingsModal = false;
            this.showModal = true;
        },

        saveSettings() {
            this.storeConsent();
            this.applyConsent();
            this.showSettingsModal = false;
        },

        storeConsent() {
            localStorage.setItem('cookieConsent', JSON.stringify(this.consent));
        },

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
        },

        // --- Load Google Analytics dynamically ---
        loadGoogleAnalytics() {
            if (document.getElementById('ga-script')) return;

            // Use configurable GA ID from config
            const gaId = "{{ $jsConfig['googleAnalyticsId'] ?? 'G-XXXXXXXXXX' }}";
            
            // Skip if no GA ID is configured
            if (!gaId || gaId === 'G-XXXXXXXXXX') {
                console.warn('Google Analytics ID not configured');
                return;
            }

            const s = document.createElement('script');
            s.src = `https://www.googletagmanager.com/gtag/js?id=${gaId}`;
            s.async = true;
            s.id = "ga-script";
            document.head.appendChild(s);

            window.dataLayer = window.dataLayer || [];
            window.gtag = function () { dataLayer.push(arguments); };
            gtag('js', new Date());
            gtag('config', gaId);
        },

        // --- Remove Google Analytics cookies ---
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
        },

        // --- Delete cookie (generic) ---
        deleteCookie(name) {
            document.cookie = `${name}=; Max-Age=0; path=/; domain=.${window.location.hostname}; SameSite=Lax`;
            document.cookie = `${name}=; Max-Age=0; path=/; SameSite=Lax`;
        },

        // --- Set locale cookie ---
        setLocaleCookie(value) {
            document.cookie = `locale=${value}; path=/; max-age=31536000; SameSite=Lax`;
        },

        // --- Get locale from HTML tag ---
        getLocale() {
            return document.documentElement.lang || 'en';
        }
    };
}
</script>
@endonce
