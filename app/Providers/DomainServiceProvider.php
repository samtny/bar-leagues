<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @var \Request $request.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $subdomain = $request->subdomain;


    }
}
