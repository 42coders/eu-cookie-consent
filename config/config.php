<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    /*
     * Use this setting to enable the cookie consent dialog.
     */
    'enabled' => env('COOKIE_CONSENT_ENABLED', true),

    /*
     * The name of the cookie in which we store if the user
     * has agreed to accept the conditions.
     */
    'cookie_name' => 'laravel_eu_cookie_consent',

    /*
     * Set the cookie duration in minutes.  Default is 365 * 24 * 60 = 1 Year.
     */
    'cookie_lifetime' => 365 * 24 * 60,

    /*
     * Multilanguage support
     *
     * If enabled the title, description, the category keys and the cookie keys are defining the key from the translation files.
     */
    'multilanguage_support' => true,

    /*
     * Save Cookies Route
     */
    'route' => '/saveTheCookie',

    /*
     * Define the style of the Popup
     */
    'popup_style' => '
        position:absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        padding: 20px;
        z-index: 4242;
        flex-wrap: wrap;
        background-color: white;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.75);
        margin: 20px;
        border-radius: 20px;
        ',

    /*
     * Define classes the popup should use.
     */
    'popup_classes' => '',

    /*
     * Cookies
     */
    'cookies' => [
        'saveButton' => 'Save',
        'title' => 'PopupTitle',
        'description' => 'PopupDescription',
        'categories' => [
            'essential' => [
                'description' => 'essential_description',
                'cookies' => [
                    'session' => [
                        'forced' => 'true',
                    ],
                    'xsrf-token' => [
                        'forced' => 'true',
                    ],
                ],
            ],
        ],
    ],

];
