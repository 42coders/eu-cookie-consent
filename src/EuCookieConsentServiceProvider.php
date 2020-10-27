<?php

namespace the42coders\EuCookieConsent;

use Illuminate\Support\ServiceProvider;

class EuCookieConsentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'eu-cookie-consent');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'eu-cookie-consent');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('eu-cookie-consent.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/eu-cookie-consent'),
            ], 'views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/eu-cookie-consent'),
            ], 'assets');*/

            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/eu-cookie-consent'),
            ], 'lang');

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'eu-cookie-consent');

        // Register the main class to use with the facade
        $this->app->singleton('eu-cookie-consent', function () {
            return new EuCookieConsent;
        });
    }
}
