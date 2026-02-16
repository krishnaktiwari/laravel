<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = str_replace('www.', '', $request->getHost());

        $defaultConfig = config('domain.default');
        $domains = config('domain.domains');


        $domainConfig = $domains[$host] ?? [];

        $finalConfig = array_merge($defaultConfig, $domainConfig);

        foreach ($finalConfig as $key => $value) {
            config()->set("app.$key", $value);
        }

        return $next($request);
    }
}
