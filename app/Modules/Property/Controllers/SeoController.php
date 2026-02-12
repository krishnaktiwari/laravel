<?php

namespace App\Modules\Property\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Master\Models\MasterLocationModel;
use App\Modules\Property\Models\PropertyModel;

class SeoController extends Controller
{
    // ✅ ROBOTS.TXT
    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n\n";

        $content .= "# Sitemap\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200)
            ->header("Content-Type", "text/plain");
    }

    // ✅ SITEMAP.XML
    public function sitemap()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // ✅ 1. Homepage
        $xml .= $this->buildUrlEntry(url('/'), now(), "daily", "1.0");

        // ✅ 2. Core Static Pages
        $staticPages = [
            [ "url" => "/about-us", "priority" => "0.6", "changefreq" => "yearly" ],
            [ "url" => "/contact-us", "priority" => "0.7", "changefreq" => "yearly" ],
            [ "url" => "/privacy-policy", "priority" => "0.3", "changefreq" => "yearly" ],
            [ "url" => "/terms-conditions", "priority" => "0.3", "changefreq" => "yearly" ],
        ];

        foreach ($staticPages as $page) {
            $xml .= $this->buildUrlEntry(
                url($page["url"]),
                now(),
                $page["changefreq"],
                $page["priority"]
            );
        }

        // ✅ 3. Main Property Listing Pages (High SEO)
        $listingPages = [
            [ "slug" => "properties", "priority" => "0.95" ],
            [ "slug" => "rent", "priority" => "0.90" ],
            [ "slug" => "buy", "priority" => "0.90" ],
            [ "slug" => "sell", "priority" => "0.85" ],
            [ "slug" => "commercial", "priority" => "0.80" ],
            [ "slug" => "new-projects", "priority" => "0.85" ],
        ];

        foreach ($listingPages as $page) {
            $xml .= $this->buildUrlEntry(
                url("/" . $page["slug"]),
                now(),
                "daily",
                $page["priority"]
            );
        }

        // ✅ 4. Dynamic Location Based Pages (Best Local SEO)
        $locations = MasterLocationModel::all();

        foreach ($locations as $location) {

            $citySlug = strtolower(
                str_replace(" ", "-", $location->city . "-" . $location->state)
            );

            // ✅ City Main Page
            $xml .= $this->buildUrlEntry(
                url("/properties/" . $citySlug),
                $location->updated_at ?? now(),
                "weekly",
                "0.85"
            );

            // ✅ Rent + Buy Pages City-wise
            $xml .= $this->buildUrlEntry(
                url("/rent/" . $citySlug),
                $location->updated_at ?? now(),
                "weekly",
                "0.80"
            );

            $xml .= $this->buildUrlEntry(
                url("/buy/" . $citySlug),
                $location->updated_at ?? now(),
                "weekly",
                "0.80"
            );
        }

        // ✅ 5. Dynamic Property Detail Pages (Most Important)
        $properties = PropertyModel::latest()->limit(500)->get();

        foreach ($properties as $property) {

            $xml .= $this->buildUrlEntry(
                url("/property/" . $property->slug),
                $property->updated_at ?? now(),
                "weekly",
                "0.95"
            );
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header("Content-Type", "application/xml");
    }

    // ✅ Helper Function
    private function buildUrlEntry($loc, $lastmod, $changefreq, $priority)
    {
        return "
        <url>
            <loc>" . htmlspecialchars($loc) . "</loc>
            <lastmod>" . date('Y-m-d', strtotime($lastmod)) . "</lastmod>
            <changefreq>$changefreq</changefreq>
            <priority>$priority</priority>
        </url>";
    }
}
