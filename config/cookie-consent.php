<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Analytics ID
    |--------------------------------------------------------------------------
    |
    | Your Google Analytics tracking ID.
    |
    */
    'google_analytics_id' => env('GOOGLE_ANALYTICS_ID', ''),
    
    /*
    |--------------------------------------------------------------------------
    | Cookie Names
    |--------------------------------------------------------------------------
    |
    | Names of cookies used by the consent system.
    |
    */
    'cookie_names' => [
        'consent' => 'cookieConsent',
        'locale' => 'locale',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Cookie Lifetime
    |--------------------------------------------------------------------------
    |
    | Cookie lifetime in seconds (default: 1 year).
    |
    */
    'cookie_lifetime' => env('COOKIE_CONSENT_COOKIE_LIFETIME', 31536000),
    
    /*
    |--------------------------------------------------------------------------
    | Cookie Categories
    |--------------------------------------------------------------------------
    |
    | Define which cookie categories are enabled by default.
    | Essential cookies are always required and cannot be disabled.
    | Analytics and preferences cookies can be toggled by the user.
    |
    */
    'categories' => [
        'essential' => true,                                        // Always required
        'analytics' => env('COOKIE_CONSENT_ANALYTICS', false),      // Optional, for Google Analytics
        'preferences' => env('COOKIE_CONSENT_PREFERENCES', false),  // Optional, for locale/language
    ],
];
