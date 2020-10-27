<?php

namespace the42coders\EuCookieConsent;

use Illuminate\Support\Facades\Facade;

/**
 * @see \42coders\EuCookieConsent\Skeleton\SkeletonClass
 */
class EuCookieConsentFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'eu-cookie-consent';
    }
}
