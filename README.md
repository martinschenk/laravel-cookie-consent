# Laravel Cookie Consent

**A lightweight, GDPR-compliant cookie consent system with minimal dependencies for Laravel 11**

> Perfect for Laravel applications that need a simple, effective, and legally compliant cookie consent solution without the bloat of external JavaScript frameworks.

[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE.md)
[![Minimal Dependencies](https://img.shields.io/badge/Dependencies-Minimal-green.svg)](composer.json)

## ✨ Highlights

- **Zero external dependencies** - No Livewire, no Filament, no JS frameworks
- **Alpine.js & Vanilla JS** - Uses Alpine.js that comes with Laravel
- **GDPR-compliant** - Legally sound implementation with opt-in for all cookie types
- **Multilingual** - German, English, Spanish and Chinese included
- **Google Analytics Integration** - Dynamic loading and removal of GA scripts
- **Locale Cookie Management** - Stores language preferences only with consent
- **Blade Components** - Easy integration into existing Laravel applications
- **Tailwind CSS** - Elegant, customizable design (optional)
- **Mobile-First** - Fully responsive for all devices

## 🚀 Installation

```bash
composer require martin-schenk/laravel-cookie-consent
php artisan vendor:publish --provider="MartinSchenk\CookieConsent\CookieConsentServiceProvider"
```

## 🔧 Configuration

After publishing the package assets, you can configure the cookie consent system in `config/cookie-consent.php`:

```php
// config/cookie-consent.php
return [
    'google_analytics_id' => env('GOOGLE_ANALYTICS_ID', ''),
    
    'cookie_names' => [
        'consent' => 'cookieConsent',
        'locale' => 'locale',
    ],
    
    'cookie_lifetime' => 31536000, // 1 year in seconds
    
    'categories' => [
        'essential' => true,  // Always required
        'analytics' => false, // Optional
        'preferences' => false, // Optional
    ],
];
```

Add these settings to your `.env` file:

```env
# Cookie Consent Configuration
COOKIE_CONSENT_ENABLED=true

# Google Analytics ID
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXX

# Cookie Settings (optional)
COOKIE_CONSENT_ANALYTICS=false
COOKIE_CONSENT_PREFERENCES=true
COOKIE_CONSENT_COOKIE_LIFETIME=31536000
```

## 📊 Usage

Include the cookie consent component in your main layout file:

```php
<!-- In your layout file -->
<x-cookie-consent::cookie-consent />
```

## 🔗 Adding a Cookie Settings Link to Your Footer

An important feature is the ability to reopen the cookie settings menu at any time. Here are different implementation options:

### Option 1: Direct JavaScript Call

```html
<a href="javascript:void(0);" onclick="window.openCookieSettings()" class="text-gray-400 hover:text-teal-400">
    Cookie Settings
</a>
```

### Option 2: For Complex Layouts (e.g., in a Vue or React component)

```javascript
// Trigger the cookie settings event
document.dispatchEvent(new CustomEvent('open-cookie-settings'));
```

### Option 3: Use as a Blade Component

```php
// In any of your Blade files:
<x-cookie-consent::settings-link class="text-gray-400 hover:text-teal-400" />
```

### Practical Example: Typical Footer Implementation

```php
<!-- Footer with legal links -->
<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a>
            <a href="{{ route('imprint') }}" class="text-gray-300 hover:text-white">Imprint</a>
            <a href="{{ route('privacy') }}" class="text-gray-300 hover:text-white">Privacy Policy</a>
            
            <!-- Cookie Settings Link -->
            <a href="javascript:void(0);" 
               onclick="window.openCookieSettings()" 
               class="text-gray-300 hover:text-white">
                Cookie Settings
            </a>
        </div>
    </div>
</footer>
```

## 🌐 Supported Languages

This package comes with translations for:

- English (en)
- German (de)
- Spanish (es)
- Chinese (Simplified) (zh_CN)

You can publish the language files to customize them:

```bash
php artisan vendor:publish --provider="MartinSchenk\CookieConsent\CookieConsentServiceProvider" --tag="cookie-consent-lang"
```

## 🎨 Customizing Appearance

The cookie consent component uses Tailwind CSS by default. You can publish the views to customize the appearance:

```bash
php artisan vendor:publish --provider="MartinSchenk\CookieConsent\CookieConsentServiceProvider" --tag="cookie-consent-views"
```

## 🔒 How It Works

1. The package adds a cookie consent banner to your site
2. Users can accept all, reject all, or customize their preferences
3. Settings are saved in localStorage
4. Google Analytics is loaded dynamically only when user consents
5. Locale cookies are stored only with user consent
6. The settings can be reopened at any time via the footer link

## 🔍 Keywords

Laravel cookie consent, GDPR cookie banner, Laravel 11 cookie solution, cookie consent manager, Laravel GDPR compliance, cookie opt-in system, Alpine.js cookie consent, privacy cookie banner, EU cookie law Laravel, cookie consent popup, minimal cookie notice, lightweight cookie consent, Laravel cookie management, cookie consent without JavaScript frameworks

## 👥 Contributing

**Contributions are highly welcome and appreciated!**

This project is open for contributions, and we would love for you to help make it better. Whether you want to fix a bug, add a new feature, improve the documentation, or just give feedback, your help is welcome.

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for detailed guidelines on how to contribute to this project.

### 🌱 Good First Issues

Looking for something to work on? Issues labeled with [`good first issue`](https://github.com/martin-schenk/laravel-cookie-consent/labels/good%20first%20issue) are a great way to start contributing.

### 🗺️ Roadmap

I am planning to add the following features in future releases:

- Support for additional cookie categories
- More styling options and themes
- Additional analytics services integration
- Cookie expiration management
- Support for older and newerLaravel versions

Feel free to pick up any of these tasks or suggest new ones!

## 📝 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
