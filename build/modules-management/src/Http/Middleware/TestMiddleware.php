<?php namespace App\Build\ModulesManagement\Http\Middleware;

use \Closure;

class TestMiddleware
{
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  array|string $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$params)
    {
        /**
         * Put some logic here
        */

        return $next($request);
    }
}
