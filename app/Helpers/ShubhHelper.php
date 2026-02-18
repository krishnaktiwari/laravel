<?php

if (!function_exists('sitemap_url_tag')) {
    function sitemap_url_tag($url, $lastmod, $changefreq = 'weekly', $priority = '0.9')
    {
        return '<url>'
            . '<loc>' . $url . '</loc>'
            . '<lastmod>' . $lastmod->toAtomString() . '</lastmod>'
            . '<changefreq>' . $changefreq . '</changefreq>'
            . '<priority>' . $priority . '</priority>'
            . '</url>';
    }
}
