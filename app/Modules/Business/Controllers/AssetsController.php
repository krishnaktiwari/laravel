<?php

namespace App\Modules\Business\Controllers;
use App\Http\Controllers\Controller;
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
    /**
     * Generate user avatar with initials
     */
    public function avatar(Request $request, $name)
    {
        $size = (int) ($request->query('size', 100));
        if ($size < 50)
            $size = 50;
        if ($size > 400)
            $size = 400;

        $initials = $this->getInitials($name);
        $bgColor = $request->query('color', $this->stringToColor($name));
        $fontSize = $size * 0.4;

        $svg = <<<SVG
<svg width="$size" height="$size" xmlns="http://www.w3.org/2000/svg">
    <rect width="$size" height="$size" fill="$bgColor"/>
    <text x="50%" y="50%" font-size="$fontSize" fill="white" 
          text-anchor="middle" dominant-baseline="central" 
          font-family="Arial, sans-serif" font-weight="bold">$initials</text>
</svg>
SVG;

        return response($svg)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Cache-Control', 'public, max-age=3600');
    }

    /**
     * Generate placeholder image
     */
    public function placeholder(Request $request, $width = 300, $height = null)
    {
        $height = $height ?? $width;
        $bgColor = $request->query('bg', '#cccccc');
        $textColor = $request->query('text', '#666666');
        $text = $request->query('label', "{$width}x{$height}");

        $svg = <<<SVG
<svg width="$width" height="$height" xmlns="http://www.w3.org/2000/svg">
    <rect width="$width" height="$height" fill="$bgColor"/>
    <text x="50%" y="50%" font-size="20" fill="$textColor" 
          text-anchor="middle" dominant-baseline="central" 
          font-family="Arial, sans-serif">$text</text>
</svg>
SVG;

        return response($svg)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Cache-Control', 'public, max-age=86400');
    }

    /**
     * Generate icon (circle, square, etc)
     */
    public function icon(Request $request, $type = 'circle')
    {
        $size = (int) ($request->query('size', 50));
        $color = $request->query('color', '#3490dc');

        if ($size < 10)
            $size = 10;
        if ($size > 200)
            $size = 200;

        $shape = match ($type) {
            'circle' => "<circle cx='" . ($size / 2) . "' cy='" . ($size / 2) . "' r='" . ($size / 2) . "' fill='$color'/>",
            'square' => "<rect width='$size' height='$size' fill='$color'/>",
            'triangle' => "<polygon points='" . ($size / 2) . ",0 $size,$size 0,$size' fill='$color'/>",
            default => "<circle cx='" . ($size / 2) . "' cy='" . ($size / 2) . "' r='" . ($size / 2) . "' fill='$color'/>"
        };

        $svg = <<<SVG
<svg width="$size" height="$size" xmlns="http://www.w3.org/2000/svg">
    $shape
</svg>
SVG;

        return response($svg)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Cache-Control', 'public, max-age=86400');
    }

    /**
     * Generate pattern/background
     */
    public function pattern(Request $request)
    {
        $size = 200;
        $gridSize = 10;
        $cellSize = $size / $gridSize;
        $color = $request->query('color', '#000000');

        $cells = '';
        for ($i = 0; $i < $gridSize; $i++) {
            for ($j = 0; $j < $gridSize; $j++) {
                if (rand(0, 1)) {
                    $x = $i * $cellSize;
                    $y = $j * $cellSize;
                    $cells .= sprintf(
                        '<rect x="%d" y="%d" width="%d" height="%d" fill="%s"/>',
                        $x,
                        $y,
                        $cellSize,
                        $cellSize,
                        $color
                    );
                }
            }
        }

        $svg = <<<SVG
<svg width="$size" height="$size" xmlns="http://www.w3.org/2000/svg">
    <rect width="$size" height="$size" fill="white"/>
    $cells
</svg>
SVG;

        return response($svg)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Cache-Control', 'public, max-age=3600');
    }

    /**
     * Helper: Get initials from name
     */
    private function getInitials($name)
    {
        $name = urldecode($name);
        $words = explode(' ', $name);
        $initials = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }
        }

        return substr($initials, 0, 2);
    }

    /**
     * Helper: Generate color from string
     */
    private function stringToColor($string)
    {
        $hash = md5($string);
        return '#' . substr($hash, 0, 6);
    }
}
