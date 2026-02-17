<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function logo(Request $request)
    {
        // Get size from query param (default 50)
        $size = (int) ($request->query('size', 50));

        // Limit size for safety
        if ($size < 20)
            $size = 20;
        if ($size > 300)
            $size = 300;

        $baseSkin = '#ff382f';
        $baseDark = '#05255f';

        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="$size" height="$size"
     viewBox="0 0 120 120">
    <defs>
        <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="$baseSkin"/>
            <stop offset="100%" stop-color="$baseDark"/>
        </linearGradient>
    </defs>
    <g>
        <circle cx="60" cy="60" r="50" fill="url(#grad)">
            <animateTransform attributeName="transform" type="rotate"
                from="0 60 60" to="360 60 60" dur="1.5s" repeatCount="indefinite"/>
        </circle>
    </g>
    <g>
        <circle cx="60" cy="60" r="37.5" fill="#ffffff">
            <animateTransform attributeName="transform" type="rotate"
                from="360 60 60" to="0 60 60" dur="1.2s" repeatCount="indefinite"/>
        </circle>
    </g>
    <g>
        <circle cx="60" cy="60" r="25" fill="url(#grad)">
            <animateTransform attributeName="transform" type="rotate"
                from="0 60 60" to="360 60 60" dur="1s" repeatCount="indefinite"/>
        </circle>
    </g>
</svg>
SVG;

        return response($svg)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Cache-Control', 'public, max-age=86400');
    }

}