<?php
/**
 * @subpackage  mars.includes
 *
 * @copyright   Copyright (C) 2013 - 2014 ChinaRoad, Inc. All rights reserved.
 */
defined('_MEXEC') or die;

/**
 * Mars! Application class
 *
 * Provide many supporting API functions
 */
final class Application {

    /**
     * Dispatch the application request to module.
     *
     * @param   string
     */
    public function dispatch($method, $module, $path = '', $params = array()) {
        // load modules
        $module_path = MPATH_MODULES . '/mod_' . $module . '/mod_' . $module . '.php';
        if (!file_exists($module_path)){
            $this->_return_error(404, 'Module Not Found', 'The requested Module ' . $module . ' not found on this server.');
            exit ();
        }
        require_once $module_path;
        
        $function = str_replace('/', '_', $path);
        // check function
        if (!function_exists($function)) {
            $this->return_error(404, 'Not Found', 'The requested Function ' . $function . ' not found on this server.');
            exit ();
        }
        // call function 
        if (call_user_func($function, $method, $params) === false) {
            $this->return_error(500, 'Internal Server Error', 'The requested Function ' . $function . ' call failed!');
            exit ();
        }
    }
    
    public function return_error($code, $title, $desc = null) {
        header('HTTP/1.1 ' . $code . ' '. $title);
        echo 
        '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">',
        '<html><head>',
        '<title>' , $code , ' ' , $title , '</title>',
        '</head><body>',
        '<h1>', $title , '</h1>';
        if (isset($desc)) echo '<p>' . $desc . ' </p>';
        echo '</body></html>';
    }
    
}