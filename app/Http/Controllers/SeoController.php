<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SeoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | robots.txt (Google + AI Crawlers)
    |--------------------------------------------------------------------------
    */
    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n\n";

        // AI Crawlers (LLM Bots)
        $content .= "User-agent: GPTBot\n";
        $content .= "Allow: /\n\n";

        $content .= "User-agent: ClaudeBot\n";
        $content .= "Allow: /\n\n";

        $content .= "User-agent: PerplexityBot\n";
        $content .= "Allow: /\n\n";

        $content .= "User-agent: Google-Extended\n";
        $content .= "Allow: /\n\n";

        // Sitemap Location
        $content .= "Sitemap: " . url("/sitemap.xml") . "\n";

        return response($content, 200)
            ->header("Content-Type", "text/plain");
    }

    /*
    |--------------------------------------------------------------------------
    | sitemap.xml (SEO + AI Indexing)
    |--------------------------------------------------------------------------
    */
    public function sitemap()
    {
        $pages = [
            [
                "loc" => url("/"),
                "priority" => "1.0",
                "changefreq" => "daily"
            ],
            [
                "loc" => url("/about"),
                "priority" => "0.8",
                "changefreq" => "monthly"
            ],
            [
                "loc" => url("/contact"),
                "priority" => "0.7",
                "changefreq" => "monthly"
            ],
            [
                "loc" => url("/privacy-policy"),
                "priority" => "0.5",
                "changefreq" => "yearly"
            ],
            [
                "loc" => url("/terms-conditions"),
                "priority" => "0.5",
                "changefreq" => "yearly"
            ],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($pages as $page) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$page['loc']}</loc>\n";
            $xml .= "    <lastmod>" . now()->toAtomString() . "</lastmod>\n";
            $xml .= "    <changefreq>{$page['changefreq']}</changefreq>\n";
            $xml .= "    <priority>{$page['priority']}</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= "</urlset>";

        return response($xml, 200)
            ->header("Content-Type", "application/xml");
    }

    /*
    |--------------------------------------------------------------------------
    | llms.txt (AI SEO Discovery Standard - 2026)
    |--------------------------------------------------------------------------
    */
    public function llms()
    {
        $content = "# llms.txt - AI Content Discovery File\n\n";
        $content .= "site: " . url('/') . "\n";
        $content .= "purpose: Allow AI systems to understand and cite this website.\n\n";

        $content .= "## Allowed Pages\n";
        $content .= "- Home Page: " . url("/") . "\n";
        $content .= "- About Us: " . url("/about") . "\n";
        $content .= "- Contact Us: " . url("/contact") . "\n";
        $content .= "- Privacy Policy: " . url("/privacy-policy") . "\n";
        $content .= "- Terms & Conditions: " . url("/terms-conditions") . "\n\n";

        $content .= "## Sitemap\n";
        $content .= url("/sitemap.xml") . "\n\n";

        $content .= "## Contact\n";
        $content .= "email: info@" . parse_url(url('/'), PHP_URL_HOST) . "\n";

        return response($content, 200)
            ->header("Content-Type", "text/plain");
    }
}
