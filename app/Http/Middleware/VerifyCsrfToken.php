<?php namespace Cfair\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{

    /**
     *  CSRF protection in laravel5 is always active with the implementation of Middleware
     *  I have to turn it off because Laravel banned my API post request.
     */

        private $openRoutes = [
            'api/messages'
        ];

    /**
     * @param \Illuminate\Http\Request $request
     * @param callable                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach($this->openRoutes as $route)
        {
            if ($request->is($route))
            {
                return $next($request);
            }
        }

        with( new LaravelsVerifyCsrfToken)->handle();
    }

}
