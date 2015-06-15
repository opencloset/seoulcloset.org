<?php
/*
Plugin Name: UFOfactory Map for SeoulCloset
Plugin URI: http://ufofactory.org/
Description: 서울시민 열린옷장을 위해 UFOfactory가 만든 지도 플러그인입니다.
Author: UFOfactory
Author URI: http://ufofactory.org/
Version: 0.1.0.seoulcloset
Text Domain: ufofactory-mapping
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
################################################################################
define('UFOFACTORY_MAP_VERSION', '0.1.0');
define('UFOFACTORY_MAP_PLUGIN_URL', plugin_dir_url(__FILE__));
################################################################################
add_action('init', 'ufofactory_map_post_type_place');
################################################################################
include_once dirname(__FILE__) . '/admin.php';
include_once dirname(__FILE__) . '/shortcodes.php';
################################################################################
function ufofactory_map_post_type_place() {
  register_post_type(
    'place', 
    array(
      'labels'=>array(
        'name'=>__('장소'),
        'singular_name'=>__('장소'),
        'add_new'=>'장소 추가',
        'menu_name'=>__('지도'),
      ),
      'public'=>true,
      'supports'=>array('title', 'thumbnail')
    )
  );
}
?>