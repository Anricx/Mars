<?php
/**
 * @subpackage  mars
 *
 * @copyright   Copyright (C) 2013 - 2014 ChinaRoad, Inc. All rights reserved.
 */
/**
 * Constant that is checked in included files to prevent direct access.
 * define() is used in the installation folder rather than "const" to not error for PHP 5.2 and lower
 */
define('_MEXEC', 1);

if (!defined('__DIR__')) {
    define('__DIR__', dirname(__FILE__));
}

if (file_exists(__DIR__ . '/defines.php')) {
    include_once __DIR__ . '/defines.php';
}

if (!defined('_MDEFINES')) {
    define('MPATH_BASE', __DIR__);
    require_once MPATH_BASE . '/includes/defines.php';
}

// Instantiate framework...
require_once MPATH_BASE . '/includes/framework.php';

// Instantiate the application.
require_once MPATH_BASE . '/includes/application.php';
$app = new Application();

// prepare...
if (!isset($_SERVER['PATH_INFO']) || empty($_SERVER['PATH_INFO']) || '/' === $_SERVER['PATH_INFO']) {
    Header('HTTP/1.1 303 See Other'); 
    Header('Location: ' . MDEFAULT_PAGE);
    exit();
}
$dir = $_SERVER ['PATH_INFO'];
$paths = array_filter ( explode ( '/', $dir, 3 ) );
$paths = array_values ( $paths );
if (count($paths) != 2) {
    $app->return_error(400, 'Bad Request');
    exit();
}
$module = $paths[0];
$path = $paths[1];
$method = strtoupper ( $_SERVER ['REQUEST_METHOD'] );
$params = $_REQUEST;

// Dispatch the application.
$app->dispatch($method, $module, $path, $params);
