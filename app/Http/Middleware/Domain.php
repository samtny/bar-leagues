<?php

namespace App\Http\Middleware;

use App\Association;
use Closure;

class Domain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$subdomain = request('subdomain');

        //\URL::defaults(['subdomain' => $subdomain]);

        //if (!empty($subdomain)) {
          /*  $association = Association::where(['subdomain' => $subdomain])->first();

            \URL::defaults(['association' => $association]);
        }
*/
        return $next($request);
    }
}
