<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use MartinSchenk\CookieConsent\Services\CookieConsentService;

class CookieConsentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cookie-consent.php', 'cookie-consent'
        );
        
        $this->app->singleton(CookieConsentService::class, function ($app) {
            return new CookieConsentService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Load views and translations
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cookie-consent');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'cookie-consent');
        
        // Register Blade components
        Blade::componentNamespace('MartinSchenk\CookieConsent\View\Components', 'cookie-consent');
        
        // Publish configurations
        $this->publishes([
            __DIR__.'/../config/cookie-consent.php' => config_path('cookie-consent.php'),
        ], 'cookie-consent-config');
        
        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/cookie-consent'),
        ], 'cookie-consent-views');
        
        // Publish translations
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/cookie-consent'),
        ], 'cookie-consent-lang');
    }
}
