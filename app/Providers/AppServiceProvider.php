<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Statamic\Statamic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Statamic::vite('app', [
            'resources/js/cp.js',
            'resources/css/cp.css'
        ]);

        $this->updatePHPIniFromConfig();

        app(UrlGenerator::class)->forceScheme('https');
        app(UrlGenerator::class)->forceRootUrl(config('app.asset_url'));
    }

    /**
     * Sets specific PHP ini parameters based on ENV values
     */
    private function updatePHPIniFromConfig(): void
    {
        foreach (config('phpini', []) as $param => $value) {
            ini_set($param, $value);
        }
    }
}
