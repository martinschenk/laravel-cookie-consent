<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent\Tests\Unit;

use MartinSchenk\CookieConsent\Services\CookieConsentService;
use MartinSchenk\CookieConsent\Tests\TestCase;

/**
 * CookieConsentService Unit Tests
 */
class CookieConsentServiceTest extends TestCase
{
    /**
     * @var CookieConsentService
     */
    private CookieConsentService $service;

    /**
     * Set up the test
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new CookieConsentService();
    }

    /**
     * Test that getJsConfig returns the expected configuration
     */
    public function testGetJsConfigReturnsCorrectConfiguration(): void
    {
        // Act
        $config = $this->service->getJsConfig();

        // Assert
        $this->assertIsArray($config);
        $this->assertArrayHasKey('googleAnalyticsId', $config);
        $this->assertArrayHasKey('cookieNames', $config);
        $this->assertArrayHasKey('cookieLifetime', $config);
        $this->assertArrayHasKey('categories', $config);
        
        // Test specific values from our test configuration
        $this->assertEquals('G-TEST123456', $config['googleAnalyticsId']);
        $this->assertEquals('testCookieConsent', $config['cookieNames']['consent']);
        $this->assertEquals('testLocale', $config['cookieNames']['locale']);
        $this->assertEquals(30000, $config['cookieLifetime']);
        $this->assertTrue($config['categories']['analytics']);
        $this->assertTrue($config['categories']['preferences']);
        $this->assertTrue($config['categories']['essential']); // Essential is always true
    }
}
