<?php

namespace App\Providers;

use App\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{

    protected $subdomainBlacklist = [
        'admin',
        'schedule',
        'standings',
    ];

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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return void
     */
    public function boot(Request $request) {
        $app_domain_name = config('domain.name');

        $app_domain_parts = explode('.', $app_domain_name);

        $host_parts = explode('.', $request->getHost());

        if (count($host_parts) > count($app_domain_parts)) {
            $subdomain = array_first($host_parts);
        }

        if (empty($subdomain)) {
            $path = $request->path();

            if (!empty($path)) {
                $path_parts = explode('/', $path);

                if (count($path_parts) > 0) {
                    $subdomain = array_first($path_parts);
                }
            }
        }

        if (!empty($subdomain) && !in_array($subdomain, $this->subdomainBlacklist)) {
            $association = Association::where('subdomain', $subdomain)->first();

            if (!empty($association)) {
                View::share('association', $association);
            }
            else {

            }
        }
    }
}
