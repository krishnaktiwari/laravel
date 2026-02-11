<?php

namespace App\Modules\Kshititech\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeoController extends Controller
{

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";

        $content .= "\n";
        $content .= "# Sitemap\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }

    public function sitemap()
    {
        // Start XML document
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Add homepage
        $xml .= $this->buildUrlEntry(url('/'), now(), 'daily', '1.0');

        // Add static pages
        $staticPages = [
            ['url' => '/about-us', 'priority' => '0.8'],
            ['url' => '/contact-us', 'priority' => '0.8'],
            ['url' => '/services', 'priority' => '0.8'],
            ['url' => '/portfolio', 'priority' => '0.7'],
            ['url' => '/blog', 'priority' => '0.7'],
            ['url' => '/careers', 'priority' => '0.6'],
            ['url' => '/privacy-policy', 'priority' => '0.5'],
            ['url' => '/terms-conditions', 'priority' => '0.5'],

        ];

        foreach ($staticPages as $page) {
            $xml .= $this->buildUrlEntry(
                url($page['url']),
                now(),
                'weekly',
                $page['priority']
            );
        }

        // Close XML document
        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    private function buildUrlEntry($loc, $lastmod, $changefreq = 'weekly', $priority = '0.5')
    {
        $xml = '<url>';
        $xml .= '<loc>' . htmlspecialchars($loc) . '</loc>';
        $xml .= '<lastmod>' . date('Y-m-d', strtotime($lastmod)) . '</lastmod>';
        $xml .= '<changefreq>' . $changefreq . '</changefreq>';
        $xml .= '<priority>' . $priority . '</priority>';
        $xml .= '</url>';

        return $xml;
    }
}
