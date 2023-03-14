<?php

namespace RedJasmine\AddressAdmin;

use Illuminate\Support\ServiceProvider;

class AddressAdminServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
         $this->loadTranslationsFrom(__DIR__.'/../lang', 'red-jasmine.address');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'red-jasmine');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/../routes/admin/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/address-admin.php', 'address-admin');

        // Register the service the package provides.
        $this->app->singleton('address-admin', function ($app) {
            return new AddressAdmin;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['address-admin'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/address-admin.php' => config_path('address-admin.php'),
        ], 'address-admin.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/red-jasmine'),
        ], 'address-admin.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/red-jasmine'),
        ], 'address-admin.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/red-jasmine'),
        ], 'address-admin.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
