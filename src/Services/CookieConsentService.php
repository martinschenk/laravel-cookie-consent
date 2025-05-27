<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent\Services;

/**
 * Cookie Consent Service.
 *
 * Provides configuration for the cookie consent component.
 */
class CookieConsentService
{
    /**
     * Get JavaScript configuration for the cookie consent component.
     *
     * Retrieves and returns the configuration from the cookie-consent config file.
     *
     * @return array<string, mixed> Configuration array for JavaScript
     */
    public function getJsConfig(): array
    {
        return [
            'googleAnalyticsId' => config('cookie-consent.google_analytics_id'),
            'cookieNames' => config('cookie-consent.cookie_names'),
            'cookieLifetime' => config('cookie-consent.cookie_lifetime'),
            'categories' => config('cookie-consent.categories'),
        ];
    }
}
