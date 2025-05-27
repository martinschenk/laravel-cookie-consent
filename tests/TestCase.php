<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use MartinSchenk\CookieConsent\CookieConsentServiceProvider;
use Orchestra\Testbench\Concerns\CreatesApplication;

/**
 * Base TestCase for all tests.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app): array
    {
        return [
            CookieConsentServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function defineEnvironment($app): void
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        
        // Set cookie consent config for testing
        $app['config']->set('cookie-consent.google_analytics_id', 'G-TEST123456');
        $app['config']->set('cookie-consent.cookie_names.consent', 'testCookieConsent');
        $app['config']->set('cookie-consent.cookie_names.locale', 'testLocale');
        $app['config']->set('cookie-consent.cookie_lifetime', 30000);
        $app['config']->set('cookie-consent.categories.analytics', true);
        $app['config']->set('cookie-consent.categories.preferences', true);
    }
}
