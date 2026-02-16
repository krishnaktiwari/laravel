<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\MasterLocation;
class SeoController extends Controller
{
    public function robots()
    {
        $content = "User-agent: *\nAllow: /\n\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";
        $content .= "Sitemap: " . url('/ai-sitemap.xml') . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }

    public function sitemap()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        $staticPages = [
            route('home'),
            route('about-us'),
            route('contact-us'),
            route('portfolio'),
            route('careers'),
            route('privacy-policy'),
            route('terms-of-service'),

        ];
        foreach ($staticPages as $url) {
            $xml .= $this->urlTag($url, now(), 'weekly', '0.8');
        }


        $locations = MasterLocation::all();

        foreach ($locations as $location) {

            $slug = strtolower(str_replace(' ', '-', $location->city . '-' . $location->state));

            $xml .= $this->urlTag(
                route('services.web-designing-development.show', $slug),
                $location->updated_at ?? now(),
                'weekly',
                '0.9'
            );
            $xml .= $this->urlTag(
                route('services.mobile-app-development.show', $slug),
                $location->updated_at ?? now(),
                'weekly',
                '0.9'
            );
            $xml .= $this->urlTag(
                route('services.enterprise-software-solutions.show', $slug),
                $location->updated_at ?? now(),
                'weekly',
                '0.9'
            );
            $xml .= $this->urlTag(
                route('services.digital-marketing.show', $slug),
                $location->updated_at ?? now(),
                'weekly',
                '0.9'
            );
            $xml .= $this->urlTag(
                route('services.technology-consulting.show', $slug),
                $location->updated_at ?? now(),
                'weekly',
                '0.9'
            );
        }



        $blogs = Blog::select('slug', 'updated_at')->get();

        foreach ($blogs as $blog) {
            $xml .= $this->urlTag(
                route('blog.show', $blog->slug),
                $blog->updated_at,
                'weekly',
                '0.9'
            );
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
    private function urlTag($url, $lastmod, $changefreq, $priority)
    {
        return '<url>'
            . '<loc>' . $url . '</loc>'
            . '<lastmod>' . $lastmod->toAtomString() . '</lastmod>'
            . '<changefreq>' . $changefreq . '</changefreq>'
            . '<priority>' . $priority . '</priority>'
            . '</url>';
    }
}