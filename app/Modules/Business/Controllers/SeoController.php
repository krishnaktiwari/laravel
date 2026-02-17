<?php

namespace App\Modules\Business\Controllers;

use App\Modules\Business\Models\Business;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{

    public function sitemap()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $businesss = Business::select('slug', 'updated_at')->get();

        foreach ($businesss as $business) {
            $xml .= $this->urlTag(
                url('/' . $business->slug),
                $business->updated_at,
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