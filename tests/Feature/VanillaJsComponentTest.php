<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent\Tests\Feature;

use MartinSchenk\CookieConsent\Tests\TestCase;
use Illuminate\Support\Facades\View;

class VanillaJsComponentTest extends TestCase
{
    /**
     * Test that the component renders without Alpine.js directives.
     *
     * @return void
     */
    public function test_component_does_not_contain_alpine_directives(): void
    {
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert no Alpine.js directives are present
        $this->assertStringNotContainsString('x-data', $view);
        $this->assertStringNotContainsString('x-init', $view);
        $this->assertStringNotContainsString('x-show', $view);
        $this->assertStringNotContainsString('x-model', $view);
        $this->assertStringNotContainsString('@click', $view);
        $this->assertStringNotContainsString('x-cloak', $view);
        $this->assertStringNotContainsString('x-transition', $view);
    }
    
    /**
     * Test that the component contains vanilla JavaScript class.
     *
     * @return void
     */
    public function test_component_contains_vanilla_js_class(): void
    {
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert vanilla JS class and initialization are present
        $this->assertStringContainsString('class CookieConsentManager', $view);
        $this->assertStringContainsString('new CookieConsentManager', $view);
        $this->assertStringContainsString('addEventListener', $view);
        $this->assertStringContainsString('getElementById', $view);
    }
    
    /**
     * Test that all required DOM elements have IDs for vanilla JS.
     *
     * @return void
     */
    public function test_required_dom_elements_have_ids(): void
    {
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert all required element IDs are present
        $requiredIds = [
            'cookie-consent-container',
            'cookie-consent-modal',
            'cookie-settings-modal',
            'cookie-accept-all',
            'cookie-decline-all',
            'cookie-show-settings',
            'cookie-save-settings',
            'cookie-settings-close',
            'cookie-analytics',
            'cookie-preferences'
        ];
        
        foreach ($requiredIds as $id) {
            $this->assertStringContainsString('id="' . $id . '"', $view);
        }
    }
    
    /**
     * Test that CSS for transitions is included.
     *
     * @return void
     */
    public function test_css_transitions_are_included(): void
    {
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert CSS animations are present
        $this->assertStringContainsString('@keyframes fadeIn', $view);
        $this->assertStringContainsString('@keyframes fadeOut', $view);
        $this->assertStringContainsString('.cookie-modal', $view);
        $this->assertStringContainsString('.fade-in', $view);
        $this->assertStringContainsString('.fade-out', $view);
    }
    
    /**
     * Test that global openCookieSettings function is defined.
     *
     * @return void
     */
    public function test_global_open_settings_function_exists(): void
    {
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert global function is defined
        $this->assertStringContainsString('window.openCookieSettings', $view);
        $this->assertStringContainsString('open-cookie-settings', $view);
    }
    
    /**
     * Test that configuration is properly injected into JavaScript.
     *
     * @return void
     */
    public function test_configuration_is_injected(): void
    {
        // Set test configuration
        config(['cookie-consent.google_analytics_id' => 'G-TEST123']);
        
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert configuration is passed to JavaScript (it's rendered as JSON)
        $this->assertStringContainsString('googleAnalyticsId', $view);
        $this->assertStringContainsString('G-TEST123', $view);
        $this->assertStringContainsString('cookieNames', $view);
        $this->assertStringContainsString('cookieLifetime', $view);
    }
    
    /**
     * Test that consent storage methods are present.
     *
     * @return void
     */
    public function test_consent_storage_methods_exist(): void
    {
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert storage methods are defined
        $this->assertStringContainsString('localStorage.getItem', $view);
        $this->assertStringContainsString('localStorage.setItem', $view);
        $this->assertStringContainsString('document.cookie', $view);
        $this->assertStringContainsString('getCookie', $view);
    }
    
    /**
     * Test that Google Analytics methods are present.
     *
     * @return void
     */
    public function test_google_analytics_methods_exist(): void
    {
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert GA methods are defined
        $this->assertStringContainsString('loadGoogleAnalytics', $view);
        $this->assertStringContainsString('removeGoogleAnalytics', $view);
        $this->assertStringContainsString('googletagmanager.com/gtag', $view);
    }
    
    /**
     * Test that event listeners are properly bound.
     *
     * @return void
     */
    public function test_event_listeners_are_bound(): void
    {
        $view = View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert event binding methods
        $this->assertStringContainsString('bindEvents', $view);
        $this->assertStringContainsString('addEventListener(\'click\'', $view);
        $this->assertStringContainsString('addEventListener(\'change\'', $view);
        $this->assertStringContainsString('addEventListener(\'open-cookie-settings\'', $view);
    }
    
    /**
     * Test component renders without errors.
     *
     * @return void
     */
    public function test_component_renders_without_errors(): void
    {
        $this->expectNotToPerformAssertions();
        
        // This will throw an exception if there's an error
        View::make('cookie-consent::components.cookie-consent')->render();
    }
}