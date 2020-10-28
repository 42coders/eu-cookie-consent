<?php

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
    'popup_style' => '',

    /*
     * Define classes the popup should use.
     */
    'popup_classes' => 'eu-popup',

    /*
     * If you want to have an Accept all Button for the users
     */
    'acceptAllButton' => 'true',

    /*
     * Cookies
     */
    'cookies' => [
        //Defines the translation Key for the saveButton
        'saveButton' => 'Save',
        //Optional: Defines the translation Key for the PopupTitle
        'title' => 'PopupTitle',
        //Optional: Defines the translation Key for the PopupDescription
        'description' => 'PopupDescription',
        //To make the popup easier to consume for the user you can organize your Cookies in categories.
        'categories' => [
            //The key defines the translation key in the translations for this category.
            'essential' => [
                //Optional: The description defines the key in the translations for the category description
                'description' => 'essential_description',
                //In this array you can define all the Cookies you want to request form the User
                'cookies' => [
                    //The key defines the key in the translations and is used to access the Cookie specific information
                    'session' => [
                        //Optional: you can set forced to make it impossible for the user to not accept this cookie.
                        'forced' => 'true',
                        //Optional: The description defines the key in the translations
                        //'description' => 'key in translation File'
                    ],
                    'xsrf-token' => [
                        'forced' => 'true',
                    ],
                ],
            ],
        ],
    ],

];
