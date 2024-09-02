<?php
//define the core paths
//Define them as absolute peths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
//(\ for windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'Basketball');
defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'include');

// load config file first 
require_once(LIB_PATH.DS."config.php");
//load basic functions next so that everything after can use them
require_once(LIB_PATH.DS."functions.php");
//later here where we are going to put our class session
require_once(LIB_PATH.DS."session.php");

require_once(LIB_PATH.DS."user.php");
require_once(LIB_PATH.DS."usertype.php");
//Load Core objects
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."teams.php");
require_once(LIB_PATH.DS."category.php");
require_once(LIB_PATH.DS."result.php");
require_once(LIB_PATH.DS."schedule.php");
require_once(LIB_PATH.DS."singleschedule.php");
require_once(LIB_PATH.DS."tournament.php");
require_once(LIB_PATH.DS."venue.php");
require_once(LIB_PATH.DS."autocode.php");
//load database-related classes


?>