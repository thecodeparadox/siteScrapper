<?php
/**
 * Created by PhpStorm.
 * User: abdullah
 * Date: 11/4/15
 * Time: 11:12 PM
 */
$GLOBALS['APP'] = require_once 'app.php';
require_once APP_PATH . '/App.php';
require_once APP_PATH . '/RequestHandler.php';
require_once APP_PATH . '/SiteScrapper.php';
require_once APP_PATH . '/View.php';

new \App\App();