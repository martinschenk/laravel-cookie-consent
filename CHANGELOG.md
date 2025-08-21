# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.2.0] - 2025-08-21

### Added
- Laravel 12 support - package now supports both Laravel 11 and 12
- Updated composer dependencies to support Laravel 12

### Changed
- Updated composer.json to accept Laravel framework ^11.0|^12.0
- Updated documentation to reflect Laravel 11 and 12 compatibility

## [0.1.1] - 2025-05-27

### Fixed
- Improved cookie consent persistence by implementing dual storage (localStorage + cookies)
- Fixed issue where cookie banner wouldn't reappear after cookies were cleared
- Corrected modal behavior in saveSettings() method

## [0.1] - 2025-05-27

### Added
- Initial version of the Laravel Cookie Consent plugin
- GDPR-compliant cookie consent dialogs with opt-in for all cookie types
- Multilingual support (German, English, Spanish, and Chinese)
- Dynamic Google Analytics integration
- Cookie management for language preferences
- Blade components for easy integration into existing Laravel applications
- Tailwind CSS styling (optionally customizable)
- Mobile-first responsive design
- Various options for cookie settings links in the footer
- Configuration file with customizable options
- Comprehensive documentation in README

### Technical Features
- No external JS framework dependencies
- Uses Alpine.js and vanilla JavaScript
- Support for Laravel 11 and 12
- Service provider for easy integration
- Flexible configuration via .env file
- Fully test-covered components and services
