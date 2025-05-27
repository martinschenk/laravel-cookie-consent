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
        // Setup components namespace
        Blade::componentNamespace('MartinSchenk\\CookieConsent\\View\\Components', 'cookie-consent');
        
        // Render the component
        $view = $this->blade('<x-cookie-consent::cookie-consent />');
        
        // Assert the rendered view contains expected elements
        $view->assertSeeText('cookie-consent', false);
        $view->assertSeeText('googleAnalyticsId', false);
        $view->assertSeeText('init()', false);
        $view->assertSeeText('showModal', false);
    }
    
    /**
     * Test that the settings-link component renders correctly
     */
    public function testSettingsLinkComponentRenders(): void
    {
        // Setup components namespace
        Blade::componentNamespace('MartinSchenk\\CookieConsent\\View\\Components', 'cookie-consent');
        
        // Render the component
        $view = $this->blade('<x-cookie-consent::settings-link class="test-class" />');
        
        // Assert the rendered view contains expected elements
        $view->assertSeeText('window.openCookieSettings()', false);
        $view->assertSeeText('class="cookie-settings-link test-class"', false);
    }
    
    /**
     * Helper to test Blade components
     *
     * @param string $template The blade template to render
     * @return \Illuminate\Testing\TestView The rendered view for assertions
     */
    protected function blade(string $template): \Illuminate\Testing\TestView
    {
        $tempDirectory = sys_get_temp_dir();
        
        // Ensure view paths are set
        if (! $this->app['view']->exists('cookie-consent::components.cookie-consent')) {
            $this->app['view']->addNamespace('cookie-consent', __DIR__ . '/../../resources/views');
        }
        
        $this->app['config']->set('view.paths', array_merge(
            $this->app['config']->get('view.paths', []),
            [$tempDirectory]
        ));
        
        // Generate a unique view file
        $viewFile = $tempDirectory . '/'.sha1($template).'.blade.php';
        file_put_contents($viewFile, $template);
        
        return $this->view(basename($viewFile, '.blade.php'));
    }
}
