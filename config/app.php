<?php
/**
 * Created by PhpStorm.
 * User: abdullah
 * Date: 11/4/15
 * Time: 11:11 PM
 */
define('DOC_ROOT', dirname(__DIR__));
define('APP', DOC_ROOT);
define('APP_PATH', DOC_ROOT . '/app');
define('TMP', DOC_ROOT . '/tmp');
define('ASSETS', DOC_ROOT . '/assets');
define('TEMPLATE', DOC_ROOT . '/template');
define('ASSETS_PATH', 'assets');
define('ELEMENTS', TEMPLATE . '/elements');
return [
    'JS' => ASSETS_PATH . '/js/',
    'CSS' => ASSETS_PATH . '/css/',
    'elements' => ELEMENTS
];