<?php

namespace the42coders\EuCookieConsent\Tests;

use the42coders\EuCookieConsent\EuCookieConsentServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            EuCookieConsentServiceProvider::class,
        ];
    }

    public function skipOnTravis()
    {
        if (! empty(getenv('TRAVIS_BUILD_ID'))) {
            $this->markTestSkipped('Skipping because this test does not run properly on Travis');
        }
    }
}
