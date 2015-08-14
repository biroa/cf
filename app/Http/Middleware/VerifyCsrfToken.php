<?php namespace Cfair\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends BaseVerifier {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->isReading($request) || $this->tokensMatch($request) || $this->excludedRoutes($request)) {
            return $this->addCookieToResponse($request, $next($request));
        }

        throw new TokenMismatchException;
    }

    /**
     * Check if the url path is excluded form CSRF verification or not
     *
     * @param $request \Illuminate\Http\Request  $request
     *
     * @return bool
     */
    protected function excludedRoutes($request)
    {
        $routes = [
            'api/',
        ];

        foreach ($routes as $route) {
            if (starts_with($request->path(), $route)) {
                return true;
            }


        }
        return false;
    }
}