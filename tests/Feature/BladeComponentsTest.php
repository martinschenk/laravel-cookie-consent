<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent\Tests\Feature;

use Illuminate\Support\Facades\Blade;
use MartinSchenk\CookieConsent\Tests\TestCase;

/**
 * Test the cookie consent Blade components
 */
class BladeComponentsTest extends TestCase
{
    /**
     * Test that the cookie-consent component renders correctly
     */
    public function testCookieConsentComponentRenders(): void
    {
        // Use View facade to render the component directly
        $view = \Illuminate\Support\Facades\View::make('cookie-consent::components.cookie-consent')->render();
        
        // Assert the rendered view contains expected elements (vanilla JS version)
        $this->assertStringContainsString('cookie-consent', $view);
        $this->assertStringContainsString('googleAnalyticsId', $view);
        $this->assertStringContainsString('CookieConsentManager', $view);
        $this->assertStringContainsString('addEventListener', $view);
    }
    
    /**
     * Test that the settings-link component renders correctly
     */
    public function testSettingsLinkComponentRenders(): void
    {
        // Create the component instance
        $component = new \MartinSchenk\CookieConsent\View\Components\SettingsLink();
        
        // Get the component view
        $view = $component->render();
        
        // Render the view with attributes
        $rendered = \Illuminate\Support\Facades\View::make($view->name(), [
            'attributes' => new \Illuminate\View\ComponentAttributeBag(['class' => 'test-class'])
        ])->render();
        
        // Assert the rendered view contains expected elements
        $this->assertStringContainsString('window.openCookieSettings()', $rendered);
        $this->assertStringContainsString('cookie-settings-link', $rendered);
    }
}
