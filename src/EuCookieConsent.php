<?php

namespace the42coders\EuCookieConsent;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

class EuCookieConsent
{
    public static function hasSettingsCookie()
    {
        return empty(self::getSettingsCookie()) ? false : true;
    }

    public static function getSettingsCookie()
    {
        return json_decode($_COOKIE[config('eu-cookie-consent.cookie_name')] ?? '');
    }

    public static function getUserCookieSetting(string $cookieName)
    {
        $settings = json_decode($_COOKIE[config('eu-cookie-consent.cookie_name')] ?? '');

        if (empty($settings)) {
            return false;
        }

        return isset($settings->{$cookieName}) && $settings->{$cookieName} == '1' ? true : false;
    }

    public static function canIUse($cookie)
    {
        return self::getUserCookieSetting($cookie) ?? false;
    }

    public function getCookie(string $cookieName)
    {
        $config = config('eu-cookie-consent.cookies');

        foreach ($config['categories'] as $category) {
            if (isset($category['cookies'][$cookieName])) {
                return $category['cookies'][$cookieName];
            }
        }

        return null;
    }

    public function getPopup()
    {
        if(!empty($_COOKIE[config('eu-cookie-consent.cookie_name')])){
            return '';
        }

        $config = config('eu-cookie-consent.cookies');
        $multiLanguageSupport = config('eu-cookie-consent.multilanguage_support');
        return view('eu-cookie-consent::popup', [
            'config' => $config,
            'multiLanguageSupport' => $multiLanguageSupport,
        ]);
    }

    public function getCookieHtml(string $cookieName)
    {
        $cookie = $this->getCookie($cookieName);
        return $cookie ?? $cookie['html'] ?? '';
    }

    public function getHtml($destination, $cookieName = null)
    {
        $settings = $this->getSettingsCookie();

        if (empty($settings)) {
            return '';
        }

        if ($cookieName !== null) {
            if (!$settings[$cookieName]) {
                return '';
            }

            $cookie = $this->getCookie($cookieName);
            if ($cookie['destination'] == $destination) {
                return $cookie['html'] ?? '';
            }
        }

        $config = config('eu-cookie-consent.cookies');

        $html = '';

        foreach ($config['categories'] as $category) {
            if(isset($category['cookies'])) {
                foreach ($category['cookies'] as $key => $cookie) {
                    if (isset($settings->{$key}) && $settings->{$key} && isset($cookie[$destination])) {
                        $html .= $cookie[$destination] ?? '';
                    }
                }
            }
        }

        return $html;

    }

    public function getEuCookieConsentPopup()
    {
        $config = config('eu-cookie-consent.cookies');

        return view('eu-cookie-consent::popup', [
            'config' => $config,
        ]);
    }
}
