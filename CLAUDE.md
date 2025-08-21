# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 11/12 package that provides a lightweight, GDPR-compliant cookie consent system with minimal dependencies. The package is designed to work without external JavaScript frameworks like Livewire or Inertia, using only Alpine.js (included with Laravel 11/12) and vanilla JavaScript.

## Commands

### Testing
```bash
# Run all tests
vendor/bin/phpunit

# Run tests with coverage
vendor/bin/phpunit --coverage-html coverage

# Run specific test file
vendor/bin/phpunit tests/Unit/CookieConsentServiceTest.php
```

### Code Quality
```bash
# Format code with Laravel Pint
vendor/bin/pint

# Check code formatting without applying changes
vendor/bin/pint --test
```

### Package Development
```bash
# Install dependencies
composer install

# Publish package assets (when testing in a Laravel app)
php artisan vendor:publish --provider="MartinSchenk\CookieConsent\CookieConsentServiceProvider"

# Publish specific assets
php artisan vendor:publish --provider="MartinSchenk\CookieConsent\CookieConsentServiceProvider" --tag="cookie-consent-config"
php artisan vendor:publish --provider="MartinSchenk\CookieConsent\CookieConsentServiceProvider" --tag="cookie-consent-views"
php artisan vendor:publish --provider="MartinSchenk\CookieConsent\CookieConsentServiceProvider" --tag="cookie-consent-lang"
```

## Architecture

### Package Structure
The package follows Laravel package conventions with a service provider-based architecture:

- **Service Provider** (`src/CookieConsentServiceProvider.php`): Registers services, loads views/translations, and handles publishing
- **Service Layer** (`src/Services/CookieConsentService.php`): Provides configuration data to components
- **View Components** (`src/View/Components/`): Blade components for rendering the consent UI
- **Configuration** (`config/cookie-consent.php`): Centralized configuration for Google Analytics ID, cookie names, and categories
- **Resources**: Views (Blade templates) and translations (language files) for multilingual support

### Key Components

1. **Cookie Consent Modal**: Alpine.js-powered modal system that appears on first visit
2. **Settings Modal**: Detailed cookie category management interface
3. **JavaScript Integration**: Dynamic Google Analytics loading/unloading based on consent
4. **Locale Management**: Automatic language detection and cookie-based persistence

### Cookie Categories
- **Essential**: Always enabled, required for basic functionality
- **Analytics**: Controls Google Analytics tracking (dynamically loads/removes GA scripts)
- **Preferences**: Manages locale/language preferences cookie

### Data Flow
1. Service provider registers the CookieConsentService singleton
2. Blade components receive configuration from the service
3. Alpine.js manages UI state and user interactions
4. Consent choices stored in localStorage (not cookies)
5. Google Analytics scripts dynamically injected/removed based on consent

## Testing Strategy

Tests use Orchestra Testbench for package testing in isolation:

- **Unit Tests** (`tests/Unit/`): Test service logic and configuration
- **Feature Tests** (`tests/Feature/`): Test service provider registration and Blade component rendering
- **Test Configuration**: Uses in-memory SQLite and mock configuration values

## Development Guidelines

### Code Style
- Follow PSR-12 standards (enforced by Laravel Pint)
- Use strict types declaration in all PHP files
- Include PHPDoc blocks for classes and methods
- Type hints for all method parameters and return types

### Blade Components
- Components use `x-cookie-consent::` namespace
- Views can be published and customized by users
- Use Tailwind CSS classes (users expected to have Tailwind installed)

### JavaScript/Alpine.js
- All JavaScript logic contained within Alpine.js components
- No external JS dependencies beyond Alpine.js
- Use vanilla JavaScript for cookie manipulation and script injection

### Translations
- Support for en, de, es, zh_CN locales
- Language files follow Laravel translation conventions
- Automatic locale detection from HTML lang attribute

## Important Configuration

### Google Analytics Integration
- GA tracking ID configured in `config/cookie-consent.php`
- Scripts only loaded after explicit user consent
- Automatic cleanup of GA cookies when consent revoked

### Cookie Settings
- Consent stored in localStorage (key: `cookieConsent`)
- Locale cookie only set with preferences consent
- Cookie lifetime configurable (default: 1 year)