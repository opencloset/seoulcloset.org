<?php
/*
Plugin Name: UFOfactory Functions
Plugin URI: http://ufofactory.org/
Description: UFOfactory 플러그인과 테마가 함께 사용하는 함수들입니다.
Author: UFOfactory
Author URI: http://ufofactory.org/
Version: 0.1.0
Text Domain: ufofactory
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
################################################################################
define('UFOFACTORY_VERSION', '0.1.0');
define('UFOFACTORY_PLUGIN_URL', plugin_dir_url(__FILE__));
################################################################################
include_once dirname(__FILE__).'/lib/geocoder.php';
include_once dirname(__FILE__).'/lib/string.php';
################################################################################
?>