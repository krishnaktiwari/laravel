<?php

namespace App\Modules\Property\Controllers;

use App\Modules\Property\Models\Property;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{

    public function sitemap()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $propertys = Property::select('slug', 'updated_at')->get();

        foreach ($propertys as $property) {
            $xml .= $this->urlTag(
                url('/' . $property->slug),
                $property->updated_at,
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