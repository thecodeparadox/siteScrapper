<?php
/**
 * Created by PhpStorm.
 * User: abdullah
 * Date: 11/6/15
 * Time: 10:41 PM
 */

namespace SiteScrapper;

use App\App;

class View extends App
{
    private $js = [
        'jquery-1.11.3.min', 'bootstrap.min', 'chosen.jquery.min', 'site'
    ];

    private $css = [
        'bootstrap.min', 'font-awesome.min', 'chosen.min', 'site'
    ];

    public $title = 'Craiglist Scrapping';

    public function __construct()
    {
        $this->View = $this;
    }

    public function setViewVars($args)
    {
        foreach($args as $name => $value) $this->{$name} = $value;
        $this->render();
    }

    public function loadLocationURLs()
    {
        return file_get_contents(TMP . '/locations.craiglist.txt');
    }

    public function loadCategories()
    {
        return file_get_contents(TMP . '/categories.txt');
    }

    public function fetch($type)
    {
        $response = '';
        switch($type) {
            case 'script':
                foreach($this->js as $js) {
                    $src = $GLOBALS['APP']['JS'] . str_replace('\.js$', '', $js) . '.js';
                    $response .= '<script type="text/javascript" src="'. $src .'"></script>';
                }
                break;

            case 'content':
                break;

            case 'css':
                foreach($this->css as $css) {
                    $href = $GLOBALS['APP']['CSS'] . str_replace('\.css$', '', $css) . '.css';
                    $response .= '<link href="'. $href .'" rel="stylesheet"/>';
                }
                break;

            case 'title':
                $response = '<title>' . $this->title . '</title>';
                break;
        }
        return $response;
    }

    public function title($title)
    {
        if( !empty($title) ) $this->title = $title;
    }

    public function element($name)
    {
        $element_path = ELEMENTS . '/' . $name. '.php';
        if ( file_exists($element_path) ) {
            return require_once $element_path;
        }
        return new \Exception('No Element found named: ' . $name);
    }

    private function render()
    {
        require_once TEMPLATE . '/layout.php';
    }

}