<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Standard Sitemap (Search Engines)
    |--------------------------------------------------------------------------
    */
    public function sitemap(): Response
    {
        $urls = $this->baseUrls();

        return response(
            $this->buildXml($urls),
            200,
            ['Content-Type' => 'application/xml']
        );
    }

    /*
    |--------------------------------------------------------------------------
    | AI Optimized Sitemap
    |--------------------------------------------------------------------------
    */
    public function aiSitemap(): Response
    {
        $urls = $this->baseUrls();

        // AI sitemap gets higher priority
        foreach ($urls as &$url) {
            $url['priority'] = '1.0';
        }

        return response(
            $this->buildXml($urls),
            200,
            ['Content-Type' => 'application/xml']
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Robots.txt
    |--------------------------------------------------------------------------
    */
    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n\n";

        // AI / LLM Crawlers
        $content .= "User-agent: GPTBot\nAllow: /\n\n";
        $content .= "User-agent: Google-Extended\nAllow: /\n\n";
        $content .= "User-agent: ClaudeBot\nAllow: /\n\n";

        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";
        $content .= "Sitemap: " . url('/ai-sitemap.xml');

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }

    /*
    |--------------------------------------------------------------------------
    | llms.txt (AI Discovery File)
    |--------------------------------------------------------------------------
    */
    public function llms(): Response
    {
        $content = "# LLM Access Policy\n";
        $content .= "User-agent: GPTBot\nAllow: /\n\n";
        $content .= "User-agent: Google-Extended\nAllow: /\n\n";
        $content .= "User-agent: ClaudeBot\nAllow: /\n\n";

        $content .= "# AI Sitemap\n";
        $content .= "Sitemap: " . url('/ai-sitemap.xml');

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }

    /*
    |--------------------------------------------------------------------------
    | Generate Base URLs (Static + Blog)
    |--------------------------------------------------------------------------
    */
    private function baseUrls(): array
    {
        $urls = [];

        $routes = [
            'home.index',
            'home.about',
            'home.contact',
            'services.index',
        ];

        foreach ($routes as $route) {
            if (\Route::has($route)) {
                $urls[] = [
                    'loc' => route($route),
                    'lastmod' => now()->toAtomString(),
                    'priority' => '0.8',
                ];
            }
        }

        // Blog
        if (class_exists(Blog::class) && \Route::has('blog.show')) {
            $blogs = Blog::latest()->get();

            foreach ($blogs as $blog) {
                $urls[] = [
                    'loc' => route('blog.show', $blog->slug),
                    'lastmod' => optional($blog->updated_at)->toAtomString(),
                    'priority' => '0.7',
                ];
            }
        }

        return $urls;
    }

    /*
    |--------------------------------------------------------------------------
    | XML Builder
    |--------------------------------------------------------------------------
    */
    private function buildXml(array $urls): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($url['loc'], ENT_XML1, 'UTF-8') . '</loc>';
            $xml .= '<lastmod>' . $url['lastmod'] . '</lastmod>';
            $xml .= '<priority>' . $url['priority'] . '</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
