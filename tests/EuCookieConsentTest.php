<?php

namespace the42coders\EuCookieConsent\Tests;

use Orchestra\Testbench\TestCase;
use the42coders\EuCookieConsent\EuCookieConsent;
use the42coders\EuCookieConsent\EuCookieConsentServiceProvider;


class EuCookieConsentTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [EuCookieConsentServiceProvider::class];
    }

    /** @test */
    public function can_I_Use_for_not_set_cookie_returns_false()
    {
        $canIUse = EuCookieConsent::canIUse('not_defined');
        $this->assertFalse($canIUse);
    }

    /** @test */
    public function getPopup_returns_html_if_cookie_is_not_set()
    {
        $popup = EuCookieConsent::getPopup();
        $this->assertNotEmpty($popup);
    }

    /** @test */
    public function getPopup_returns_empty_string_if_cookie_is_not_set()
    {
        $html = EuCookieConsent::getHTML('header');
        $this->assertEmpty($html);
    }


}
