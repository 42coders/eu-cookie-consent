<?php


namespace the42coders\EuCookieConsent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use the42coders\EuCookieConsent\EuCookieConsent;

class EuCookieConsentController extends Controller
{
    public function saveCookie(Request $request)
    {
        $cookie = Cookie::make(
            config('eu-cookie-consent.cookie_name'),
            json_encode($request->all()),
            config('eu-cookie-consent.cookie_lifetime'));

        return redirect()->back()->withCookie($cookie);
    }

    public function getUpdatePopup(Request $request)
    {
        return EuCookieConsent::getPopup(true);
    }
}
