<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent\Tests\Feature;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use MartinSchenk\CookieConsent\Services\CookieConsentService;
use MartinSchenk\CookieConsent\Tests\TestCase;

/**
 * Test the ServiceProvider registration and functionality
 */
class ServiceProviderTest extends TestCase
{
    /**
     * Test that the config file is properly loaded
     */
    public function testConfigIsLoaded(): void
    {
        // Assert
        $this->assertTrue(Config::has('cookie-consent'));
        $this->assertTrue(Config::has('cookie-consent.google_analytics_id'));
        $this->assertTrue(Config::has('cookie-consent.cookie_names'));
        $this->assertTrue(Config::has('cookie-consent.cookie_lifetime'));
        $this->assertTrue(Config::has('cookie-consent.categories'));
    }
    
    /**
     * Test that the views are properly loaded
     */
    public function testViewsAreLoaded(): void
    {
        // Assert
        $this->assertTrue(View::exists('cookie-consent::components.cookie-consent'));
        $this->assertTrue(View::exists('cookie-consent::components.settings-link'));
    }
    
    /**
     * Test that translations are properly loaded
     */
    public function testTranslationsAreLoaded(): void
    {
        // Act & Assert
        $this->assertEquals('We Value Your Privacy', __('cookie-consent::cookie-consent.banner_title'));
        $this->assertEquals('Cookie Settings', __('cookie-consent::cookie-consent.settings'));
        $this->assertEquals('Accept All', __('cookie-consent::cookie-consent.accept_all'));
    }
    
    /**
     * Test that the CookieConsentService is properly registered as a singleton
     */
    public function testServiceIsRegisteredAsSingleton(): void
    {
        // Act
        $service1 = $this->app->make(CookieConsentService::class);
        $service2 = $this->app->make(CookieConsentService::class);
        
        // Assert
        $this->assertInstanceOf(CookieConsentService::class, $service1);
        $this->assertSame($service1, $service2); // Same instance due to singleton
    }
}
