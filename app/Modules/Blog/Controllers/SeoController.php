<?php

namespace App\Modules\Blog\Controllers;

use App\Modules\Blog\Models\Blog;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{

    public function sitemap()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $blogs = Blog::select('slug', 'updated_at')->get();

        foreach ($blogs as $blog) {
            $xml .= $this->urlTag(
                url('/' . $blog->slug),
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