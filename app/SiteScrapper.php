<?php

/**
 * Created by PhpStorm.
 * User: abdullah
 * Date: 11/4/15
 * Time: 11:10 PM
 */

namespace SiteScrapper;

use App\App;
use DOMDocument;
use DOMXPath;

class SiteScrapper extends App
{
    public function __construct()
    {
        $this->request = new RequestHandler();
        return $this;
    }

    public function getContent($area, $category, $search)
    {
        $HTMLPage = file_get_contents($area . 'search/'. $category .'?sort=rel&query='. urlencode($search) .'');
        return $HTMLPage;
    }

    public function craigslistJobs()
    {
        $area = '';
        $category = 'jjj';
        $search = '';
        $craiglistJobs = [];

        if ( !empty($this->request->data) ) {
            $area = $this->request->data['area'];
            $category = $this->request->data['category'];
            $search = $this->request->data['search'];

            $baseURL = $area;
            $dom = self::getContent($area, $category, $search);


            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($dom);
            libxml_use_internal_errors(false);

            $xpath = new DOMXPath($doc);
            $rows = $xpath->query('//*[@id="searchform"]//*[@class="row"]//*[@class="pl"]');

            foreach( $rows as $row ) {

                // Time
                $time = $row->getElementsByTagName('time')->item(0);
                $datetime = date('D, d M Y H:i:s', strtotime($time->getAttribute('datetime')));

                // Anchor
                $anchor = $row->getElementsByTagName('a')->item(0);
                $href = $anchor->getAttribute('href');

                // customize HREF
                if ( !strstr($href, 'craigslist.org') ) {
                    $href = $baseURL . rtrim($href, '/');
                }
                $anchor_text = $anchor->nodeValue;

                // Project link
                $craiglistJobs[] = ['datetime' => $datetime, 'text' => $anchor_text, 'href' => $href];
            }
        }

        $this->set(compact('area', 'category', 'search', 'craiglistJobs'));
    }
}