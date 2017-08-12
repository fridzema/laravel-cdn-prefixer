<?php

namespace Fridzema\CdnPrefixer;

use Illuminate\Support\ServiceProvider;

class CdnPrefixerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
        __DIR__.'/../config/cdn-prefixer.php' => config_path('cdn-prefixer.php'),
        ], 'config');

        require_once __DIR__.'/../Helpers/CdnPrefixerHelper.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
