<?php
/**
 * @subpackage  modules.mod_demo
 *
 * @copyright   Copyright (C) 2013 - 2014 ChinaRoad, Inc. All rights reserved.
 */

require_once MPATH_LIBRARIES . '/log4php/Logger.php';

Logger::configure(dirname(__FILE__) . '/log4php.properties');

$logger = Logger::getRootLogger();
$logger->debug("Hello World!");

function fun ($method, $params) {
    var_dump($method);
    var_dump($params);
}