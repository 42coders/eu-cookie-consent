<?php

namespace the42coders\EuCookieConsent\Tests;

use Orchestra\Testbench\TestCase;
use the42coders\EuCookieConsent\EuCookieConsentServiceProvider;

class EuCookieConsentTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [EuCookieConsentServiceProvider::class];
    }

    /** @test */
    public function eu_cookie_is_not_set()
    {
        $this->assertTrue(false);
    }

    /** @test */
    public function eu_cookie_is_set()
    {
        $this->assertTrue(false);
    }

    /** @test */
    public function show_eu_cookie_config()
    {
        $this->assertTrue(false);
    }
}
