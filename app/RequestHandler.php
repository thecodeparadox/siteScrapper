<?php

namespace SiteScrapper;

class RequestHandler
{
    public $data;

    public function __construct()
    {
        $this->data = $this->dispatchRequest();
        return $this;
    }

    private function dispatchRequest()
    {
        $data = [];
        if ( isset($_POST) && !empty($_POST) ) {
            $data = $_POST;
        }
        return $data;
    }
}