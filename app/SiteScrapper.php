<?php

/**
 * Created by PhpStorm.
 * User: abdullah
 * Date: 11/4/15
 * Time: 11:10 PM
 */

namespace SiteScrapper;
use DOMDocument;
use DOMXPath;

class SiteScrapper
{

    public function __construct()
    {

    }

    public static function getContent($area, $category, $search)
    {
        $HTMLPage = file_get_contents('http://'. $area .'.craigslist.org/search/'. $category .'?sort=rel&query='. $search .'');
        return $HTMLPage;
    }

    public static function craigslistJobs()
    {

        if ( !isset($_POST) && !isset($_POST['area']) && !isset($_POST['category']) && !isset($_POST['search']) ) {
            return [];
        }

        $area = $_POST['area'];
        $category = $_POST['category'];
        $search = $_POST['search'];

        $baseURL = 'http://'. $area . '.craigslist.org/';
        $dom = self::getContent($area, $category, $search);


        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($dom);
        libxml_use_internal_errors(false);

        $xpath = new DOMXPath($doc);
        $rows = $xpath->query('//*[@id="searchform"]//*[@class="row"]//*[@class="pl"]');

        $links = [];
        foreach( $rows as $row ) {

            // Time
            $time = $row->getElementsByTagName('time')->item(0);
            $datetime = date('m/d/Y H:i:s', strtotime($time->getAttribute('datetime')));

            // Anchor
            $anchor = $row->getElementsByTagName('a')->item(0);
            $href = $anchor->getAttribute('href');

            // customize HREF
            if ( !strstr($href, 'craigslist.org') ) {
                $href = $baseURL . $href;
            }
            $anchor_text = $anchor->nodeValue;

            // Project link
            $links[] = ['datetime' => $datetime, 'text' => $anchor_text, 'href' => $href];
        }
        return $links;
    }
}