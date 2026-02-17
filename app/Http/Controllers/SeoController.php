<?php

namespace App\Http\Controllers;

use App\Models\MasterLocation;

class SeoController extends Controller
{
    // ─── robots.txt ───────────────────────────────────────────────────────────

    public function robots()
    {
        $content  = "User-agent: *\n";
        $content .= "Allow: /\n\n";

        // Block AI training crawlers
        $aiCrawlers = [
            'GPTBot', 'ChatGPT-User', 'CCBot', 'anthropic-ai',
            'Claude-Web', 'Omgilibot', 'FacebookBot', 'Diffbot',
            'Bytespider', 'ImagesiftBot', 'cohere-ai',
        ];
        foreach ($aiCrawlers as $bot) {
            $content .= "User-agent: {$bot}\n";
            $content .= "Disallow: /\n\n";
        }

        $content .= "Sitemap: " . url('/sitemap.xml')    . "\n";
        $content .= "Sitemap: " . url('/ai-sitemap.xml') . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }

    // ─── sitemap index ────────────────────────────────────────────────────────

    public function sitemap()
    {
        $xml  = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $sitemaps = [
            ['loc' => url('/sitemap-pages.xml'),         'lastmod' => now()],
            ['loc' => 'https://blog.sarva.one/sitemap.xml', 'lastmod' => now()],
            ['loc' => 'https://jobs.sarva.one/sitemap.xml', 'lastmod' => now()],
            ['loc' => 'https://property.sarva.one/sitemap.xml', 'lastmod' => now()],
            ['loc' => 'https://business.sarva.one/sitemap.xml', 'lastmod' => now()],
        ];

        foreach ($sitemaps as $sitemap) {
            $xml .= '<sitemap>'
                  . '<loc>' . $sitemap['loc'] . '</loc>'
                  . '<lastmod>' . $sitemap['lastmod']->toAtomString() . '</lastmod>'
                  . '</sitemap>';
        }

        $xml .= '</sitemapindex>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    // ─── sitemap-pages.xml ────────────────────────────────────────────────────

    public function sitemap_pages()
    {
        $xml  = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $staticPages = [
            route('home'),
            route('about-us'),
            route('contact-us'),
            route('privacy-policy'),
            route('terms-of-service'),
        ];

        foreach ($staticPages as $url) {
            $xml .= $this->urlTag($url, now(), 'weekly', '0.8');
        }

        $locations = MasterLocation::all();
        // TODO: add location URLs when routes are defined
        // foreach ($locations as $location) {
        //     $xml .= $this->urlTag(route('location', $location->slug), now(), 'weekly', '0.6');
        // }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    // ─── ai-sitemap.xml ───────────────────────────────────────────────────────
    // Machine-readable sitemap specifically for LLM / AI crawlers.
    // Uses the extended <xhtml:link> namespace so crawlers can discover
    // all language variants, and adds <news:news> for freshness signals.

    public function aiSitemap()
    {
        $xml  = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset '
              . 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" '
              . 'xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        $pages = [
            ['url' => route('home'),            'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => route('about-us'),         'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('contact-us'),       'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('privacy-policy'),   'priority' => '0.5', 'changefreq' => 'yearly'],
            ['url' => route('terms-of-service'), 'priority' => '0.5', 'changefreq' => 'yearly'],
        ];

        foreach ($pages as $page) {
            $xml .= $this->urlTag($page['url'], now(), $page['changefreq'], $page['priority']);
        }

        // Append location pages for AI discovery
        $locations = MasterLocation::all();
        foreach ($locations as $location) {
            // Uncomment when location routes exist:
            // $xml .= $this->urlTag(route('location', $location->slug), $location->updated_at, 'weekly', '0.7');
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    // ─── llms.txt ─────────────────────────────────────────────────────────────
    // Emerging standard (llmstxt.org) that tells AI assistants about your site.
    // Served at /llms.txt  (add route: Route::get('/llms.txt', [SeoController::class, 'llms']))

    public function llms()
    {
        $appName = config('app.name', 'Sarva');
        $baseUrl = url('/');

        $content = "# {$appName}\n\n";
        $content .= "> " . config('app.description', 'Your trusted platform for discovering and comparing local services across India.') . "\n\n";

        $content .= "## Pages\n\n";
        $content .= "- [Home]({$baseUrl}): Main landing page\n";
        $content .= "- [About Us](" . route('about-us') . "): Company information and mission\n";
        $content .= "- [Contact Us](" . route('contact-us') . "): Get in touch with our team\n";
        $content .= "- [Privacy Policy](" . route('privacy-policy') . "): How we handle your data\n";
        $content .= "- [Terms of Service](" . route('terms-of-service') . "): Usage terms and conditions\n\n";

        $content .= "## Optional\n\n";
        $content .= "- [Blog](https://blog.sarva.one): Articles, guides, and insights\n";
        $content .= "- [Sitemap]({$baseUrl}sitemap.xml): Full site index\n";
        $content .= "- [AI Sitemap]({$baseUrl}ai-sitemap.xml): AI-optimised site index\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    // ─── llms-full.txt ────────────────────────────────────────────────────────
    // Extended version with richer context for AI agents/assistants.
    // Served at /llms-full.txt

    public function llmsFull()
    {
        $appName = config('app.name', 'Sarva');
        $baseUrl = url('/');

        $content = "# {$appName} — Full AI Context\n\n";
        $content .= "> " . config('app.description', 'Your trusted platform for discovering and comparing local services across India.') . "\n\n";

        $content .= "## About\n\n";
        $content .= config('app.ai_about', "We connect users with verified local service providers across India. "
            . "Our platform covers thousands of cities and towns, offering transparent listings, "
            . "reviews, and direct contact options.") . "\n\n";

        $content .= "## Key Capabilities\n\n";
        $content .= "- Discover local businesses and services by category and location\n";
        $content .= "- Compare providers with ratings, reviews, and pricing\n";
        $content .= "- Verified listings with contact details\n";
        $content .= "- Coverage across " . MasterLocation::count() . "+ locations\n\n";

        $content .= "## Pages\n\n";
        $content .= "- [Home]({$baseUrl})\n";
        $content .= "- [About Us](" . route('about-us') . ")\n";
        $content .= "- [Contact Us](" . route('contact-us') . ")\n";
        $content .= "- [Privacy Policy](" . route('privacy-policy') . ")\n";
        $content .= "- [Terms of Service](" . route('terms-of-service') . ")\n\n";

        $content .= "## Locations\n\n";
        $locations = MasterLocation::select('name', 'slug')->take(50)->get();
        foreach ($locations as $location) {
            // $content .= "- [{$location->name}](" . route('location', $location->slug) . ")\n";
            $content .= "- {$location->name}\n";
        }

        $content .= "\n## External\n\n";
        $content .= "- [Blog](https://blog.sarva.one)\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    // ─── ads.txt ──────────────────────────────────────────────────────────────
    // IAB ads.txt — authorises programmatic ad sellers for your domain.
    // Add your actual publisher IDs below.
    // Served at /ads.txt  (Route::get('/ads.txt', [SeoController::class, 'adsTxt']))

    public function adsTxt()
    {
        // Format: <SSP domain>, <publisher ID>, <relationship>, [certification ID]
        $lines = [
            '# ads.txt — authorised digital sellers for ' . parse_url(url('/'), PHP_URL_HOST),
            '# Generated: ' . now()->toDateString(),
            '# See https://iabtechlab.com/ads-txt for specification',
            '',

            // ── Google ──────────────────────────────────────────────────────
            // Replace ca-pub-XXXXXXXXXXXXXXXX with your actual AdSense publisher ID
            'google.com, ca-pub-XXXXXXXXXXXXXXXX, DIRECT, f08c47fec0942fa0',

            // ── Other networks — add / remove as needed ──────────────────────
            // 'media.net, XXXXXXX, DIRECT',
            // 'appnexus.com, XXXXX, DIRECT, f5ab79cb980f11d1',
            // 'openx.com, XXXXXXX, RESELLER, 6a698e965b86f595',
            // 'rubiconproject.com, XXXXX, RESELLER, 0bfd66d529a55807',
        ];

        return response(implode("\n", $lines) . "\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    // ─── app-ads.txt ──────────────────────────────────────────────────────────
    // Same as ads.txt but for mobile app inventory.
    // Served at /app-ads.txt

    public function appAdsTxt()
    {
        $lines = [
            '# app-ads.txt — authorised digital sellers (app inventory)',
            '# Generated: ' . now()->toDateString(),
            '',
            // 'google.com, ca-app-pub-XXXXXXXXXXXXXXXX, DIRECT, f08c47fec0942fa0',
        ];

        return response(implode("\n", $lines) . "\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    // ─── humans.txt ───────────────────────────────────────────────────────────
    // humanstxt.org — optional but a nice touch.

    public function humansTxt()
    {
        $content  = "/* TEAM */\n";
        $content .= "Site: " . config('app.name') . "\n";
        $content .= "Contact: " . config('mail.from.address', 'hello@sarva.one') . "\n";
        $content .= "Location: India\n\n";

        $content .= "/* THANKS */\n";
        $content .= "Laravel, Tailwind CSS, and the open-source community\n\n";

        $content .= "/* SITE */\n";
        $content .= "Last update: " . now()->toDateString() . "\n";
        $content .= "Standards: HTML5, CSS3\n";
        $content .= "Components: Laravel " . app()->version() . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    // ─── security.txt ─────────────────────────────────────────────────────────
    // RFC 9116 — tells researchers how to report vulnerabilities.
    // Served at /.well-known/security.txt

    public function securityTxt()
    {
        $content  = "Contact: mailto:security@sarva.one\n";
        $content .= "Expires: " . now()->addYear()->toAtomString() . "\n";
        $content .= "Preferred-Languages: en\n";
        $content .= "Canonical: " . url('/.well-known/security.txt') . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    private function urlTag($url, $lastmod, $changefreq, $priority)
    {
        return '<url>'
            . '<loc>' . htmlspecialchars($url, ENT_XML1) . '</loc>'
            . '<lastmod>' . $lastmod->toAtomString() . '</lastmod>'
            . '<changefreq>' . $changefreq . '</changefreq>'
            . '<priority>' . $priority . '</priority>'
            . '</url>';
    }
}