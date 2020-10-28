<?php

namespace the42coders\EuCookieConsent\Tests;

use the42coders\EuCookieConsent\EuCookieConsentServiceProvider;

class BaseTest extends TestCase
{
    public function testIfThePhpUnitRuns()
    {
        $this->assertTrue(true);
    }

    public function testIfTheServiceProviderBoots()
    {
        $serviceProvider = new EuCookieConsentServiceProvider(app());
        $serviceProvider->boot();

        $this->assertInstanceOf(EuCookieConsentServiceProvider::class, $serviceProvider);
    }
}
