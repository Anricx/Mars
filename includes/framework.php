<?php
/**
 * @package    mars.includes
 *
 * @copyright   Copyright (C) 2013 - 2014 ChinaRoad, Inc. All rights reserved.
 */

defined('_MEXEC') or die;

//
// Mars system checks.
//
if (!file_exists(MPATH_CONFIGURATION . '/configuration.php')) {
    echo 'No configuration file found and no installation code available. Exiting...';
    exit();
}

// Pre-Load configuration.
require_once MPATH_CONFIGURATION . '/configuration.php';

// System configuration.
$config = new MConfig();

// Set the error_reporting
switch ($config->error_reporting) {
	case 'default':
	case '-1':
	    break;

	case 'none':
	case '0':
	    error_reporting(0);
	    break;

	case 'simple':
	    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	    ini_set('display_errors', 1);
	    break;

	case 'maximum':
	    error_reporting(E_ALL);
	    ini_set('display_errors', 1);
	    break;

	case 'development':
	    error_reporting(-1);
	    ini_set('display_errors', 1);
	    break;

	default:
	    error_reporting($config->error_reporting);
	    ini_set('display_errors', 1);
	    break;
}

define('MDEBUG', $config->debug);
define('MDEFAULT_PAGE', $config->default_page);

unset($config);

//
// Mars framework loading.
//