<?php
    
// define core paths
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'Applications'.DS.'MAMP'.DS.'htdocs'.DS.'photo_gallery'.DS.'photo_gallery');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'inc');

// load config first
require_once(LIB_PATH.DS.'config.php');

// load basic functions
require_once(LIB_PATH.DS.'functions.php');

// load core objects
require_once(LIB_PATH.DS.'Session.php');
require_once(LIB_PATH.DS.'Database.php');
require_once(LIB_PATH.DS.'Database_object.php');
require_once(LIB_PATH.DS.'Pagination.php');

// load database-related classes
require_once(LIB_PATH.DS.'User.php');
require_once(LIB_PATH.DS.'Photograph.php');
require_once(LIB_PATH.DS.'Comment.php');

?>
