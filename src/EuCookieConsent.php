<?php

namespace the42coders\EuCookieConsent;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

class EuCookieConsent
{

    /**
     * hasSettingsCookie returns if the user have set a Cookie to determine if he already accepted your Cookie Consent
     *
     * @return bool
     */
    public function hasSettingsCookie(): bool
    {
        return empty($this->getSettingsCookie()) ? false : true;
    }

    /**
     * getSettingsCookie reads the Cookie and decode and return it.
     *
     * @return mixed
     */
    private function getSettingsCookie()
    {
        return json_decode($_COOKIE[config('eu-cookie-consent.cookie_name')] ?? '');
    }

    /**
     * getUserCookieSetting checks if a specific Cookie was accepted by the User.
     *
     * @param string $cookieName
     * @return bool
     */
    private function getUserCookieSetting(string $cookieName): bool
    {
        $settings = $this->getSettingsCookie();

        if (empty($settings)) {
            return false;
        }

        return isset($settings->{$cookieName}) && $settings->{$cookieName} == '1' ? true : false;
    }

    /**
     * canIUse returns you if the User give you a specific permission
     *
     * @param $cookie (key of the cookies in the config)
     * @return bool
     */
    public function canIUse($cookie): bool
    {
        return $this->getUserCookieSetting($cookie) ?? false;
    }

    /**
     * returns a specific Cookie from the Config
     *
     * @param string $cookieName
     * @return mixed|null
     */
    private function getCookie(string $cookieName)
    {
        $config = config('eu-cookie-consent.cookies');

        foreach ($config['categories'] as $category) {
            if (isset($category['cookies'][$cookieName])) {
                return $category['cookies'][$cookieName];
            }
        }

        return null;
    }

    /**
     * getPopup returns the Html of the Popup.
     *
     * @return View|string
     */
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

    /**
     * getHtml returns the specified value from a key as defined in destination from the cookies (or a specific cookie)
     *
     * Can be used to load some Scripts only if the user accepted to use them.
     *
     * @param $destination
     * @param null $cookieName
     * @return mixed|string
     */
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
}
