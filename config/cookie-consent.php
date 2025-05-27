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
    'google_analytics_id' => '',  // Set your Google Analytics ID here (e.g. 'G-XXXXXXXXXX')
    
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
    'cookie_lifetime' => 31536000,  // 1 year in seconds
    
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
        'analytics' => false,      // Optional, for Google Analytics
        'preferences' => false,  // Optional, for locale/language
    ],
];
