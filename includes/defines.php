<?php
/**
 * @subpackage  mars.includes
 *
 * @copyright   Copyright (C) 2013 - 2014 ChinaRoad, Inc. All rights reserved.
 */
defined('_MEXEC') or die;
    
/**
 * Mars! Application define.
 */
//Global definitions.
//Mars framework path definitions.
$parts = explode(DIRECTORY_SEPARATOR, MPATH_BASE);

//Defines.
define('MPATH_ROOT',          implode(DIRECTORY_SEPARATOR, $parts));
define('MPATH_SITE',          MPATH_ROOT);
define('MPATH_CONFIGURATION', MPATH_ROOT);
define('MPATH_LIBRARIES',     MPATH_ROOT . '/libraries');
define('MPATH_MODULES',       MPATH_ROOT . '/modules');
define('MPATH_CACHE',         MPATH_ROOT . '/cache');