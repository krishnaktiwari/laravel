<?php

namespace App\Http\Controllers;

use App\Modules\Master\Models\MasterLocationModel;

class SeoController extends Controller {

    public function robots() {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";

        $content .= "\n";
        $content .= "# Sitemap\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200)
                        ->header('Content-Type', 'text/plain');
    }

    public function sitemap() {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // ✅ 1. Homepage (Highest SEO Value)
        $xml .= $this->buildUrlEntry(
                url('/'),
                now(),
                "daily",
                "1.0"
        );

        // ✅ 2. Static Pages with SEO Best Priority + Frequency
        $staticPages = [
            [
                "url" => "/about-us",
                "priority" => "0.7",
                "changefreq" => "yearly"
            ],
            [
                "url" => "/contact-us",
                "priority" => "0.8",
                "changefreq" => "yearly"
            ],
            [
                "url" => "/portfolio",
                "priority" => "0.75",
                "changefreq" => "monthly"
            ],
            [
                "url" => "/careers",
                "priority" => "0.6",
                "changefreq" => "monthly"
            ],
            [
                "url" => "/blog",
                "priority" => "0.7",
                "changefreq" => "weekly"
            ],
            [
                "url" => "/privacy-policy",
                "priority" => "0.3",
                "changefreq" => "yearly"
            ],
            [
                "url" => "/terms-conditions",
                "priority" => "0.3",
                "changefreq" => "yearly"
            ],
        ];

        foreach ($staticPages as $page) {
            $xml .= $this->buildUrlEntry(
                    url($page["url"]),
                    now(),
                    $page["changefreq"],
                    $page["priority"]
            );
        }

        // ✅ 3. Services List (SEO Core Pages)
        $services = [
            [
                "slug" => "web-design-development",
                "priority" => "0.90"
            ],
            [
                "slug" => "mobile-app-development",
                "priority" => "0.90"
            ],
            [
                "slug" => "enterprise-software-solutions",
                "priority" => "0.95"
            ],
            [
                "slug" => "digital-marketing-services",
                "priority" => "0.88"
            ],
            [
                "slug" => "technology-consulting",
                "priority" => "0.85"
            ],
        ];

        // ✅ Main Service Pages (Without Location)
        foreach ($services as $service) {
            $xml .= $this->buildUrlEntry(
                    url("/services/" . $service["slug"]),
                    now(),
                    "weekly",
                    $service["priority"]
            );
        }

        // ✅ 4. Dynamic Location Based Service Pages (Best Local SEO)
        $locations = MasterLocationModel::all();

        foreach ($locations as $location) {

            // SEO Friendly City Slug
            $citySlug = strtolower(
                    str_replace(" ", "-", $location->city . "-" . $location->state)
            );

            foreach ($services as $service) {

                $xml .= $this->buildUrlEntry(
                        url("/services/" . $service["slug"] . "/" . $citySlug),
                        // ✅ Use DB updated_at if exists, else now()
                        $location->updated_at ?? now(),
                        // ✅ Google Loves Weekly Updates for Local Pages
                        "weekly",
                        // ✅ Best Priority for Location Pages
                        "0.80"
                );
            }
        }

        $xml .= '</urlset>';

        return response($xml, 200)
                        ->header("Content-Type", "application/xml");
    }

    private function buildUrlEntry($loc, $lastmod, $changefreq, $priority) {
        return "
    <url>
        <loc>" . htmlspecialchars($loc) . "</loc>
        <lastmod>" . date('Y-m-d', strtotime($lastmod)) . "</lastmod>
        <changefreq>$changefreq</changefreq>
        <priority>$priority</priority>
    </url>";
    }
}
