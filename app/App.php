<?php
/**
 * Created by PhpStorm.
 * User: abdullah
 * Date: 11/6/15
 * Time: 10:59 PM
 */

namespace App;

use SiteScrapper\RequestHandler;
use SiteScrapper\SiteScrapper;
use SiteScrapper\View;

class App
{
    public $View;
    public $SiteScrapper;

    public function __construct()
    {
        $this->SiteScrapper = new SiteScrapper();
        $this->SiteScrapper->craigslistJobs();
    }

    public function set($args)
    {
        $this->View = new View();
        $this->View->setViewVars($args);
    }

}