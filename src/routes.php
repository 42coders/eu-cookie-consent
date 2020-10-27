<?php

Route::post(config('eu-cookie-consent.route'), [\the42coders\EuCookieConsent\Http\Controllers\EuCookieConsentController::class, 'saveCookie']);
