<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoadDomainConfig
{
    public function handle(Request $request, Closure $next): Response
    {
        $host = str_replace('www.', '', $request->getHost());

        $defaultConfig = config('domains.default');
        $domains = config('domains.domains');

        $domainConfig = $domains[$host] ?? [];

        // Merge default + domain config
        $finalConfig = array_merge($defaultConfig, $domainConfig);

        foreach ($finalConfig as $key => $value) {
            config()->set("app.$key", $value);
        }

        return $next($request);
    }
}
