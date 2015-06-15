<?php
################################################################################
add_action('add_meta_boxes', 'ufofactory_map_add_place_meta_box');
add_action('save_post', 'ufofactory_map_save_place_meta');
################################################################################
if(is_admin()) {  
  wp_enqueue_script('ufofactory-map', UFOFACTORY_MAP_PLUGIN_URL.'/javascripts/ufofactory-map.js'); 
}
################################################################################

$prefix = 'custom_';
$place_custom_fields = array(
  array(
    'label' => __('썸네일'),
    'desc'  => '',
    'id'    => $prefix.'thumb',
    'type'  => 'image',
  ),
  array(
    'label' => __('주소'),
    'desc'  => '',
    'id'    => $prefix.'address',
    'type'  => 'text',
  ),
  array(
    'label' => __('인터뷰'),
    'desc'  => '',
    'id'    => $prefix.'interview',
    'type'  => 'text',
  ),
  array(
    'label' => __('기증결과'),
    'desc'  => '',
    'id'    => $prefix.'result',
    'type'  => 'text',
  ),
  array(
    'label' => __('위도'),
    'desc'  => '',
    'id'    => $prefix.'lat',
    'type'  => 'text',
  ),
  array(
    'label' => __('경도'),
    'desc'  => '',
    'id'    => $prefix.'lng',
    'type'  => 'text',
  ),
);

function ufofactory_map_add_place_meta_box() {
  add_meta_box(
    'custom_meta_box',
    __('추가정보'),
    'ufofactory_map_add_place_meta_fields',
    'Place',
    'normal',
    'high'
  );
}

function ufofactory_map_add_place_meta_fields() {
  global $place_custom_fields, $post;
  echo "<input type='hidden' name='custom_meta_box_nonce' value='".wp_create_nonce(basename(__FILE__))."'>";
  echo "<table class='form-table'>";
  foreach($place_custom_fields as $field) {
    $meta = get_post_meta($post->ID, $field['id'], true);
    echo "<tr>";
    echo "<th><label for='{$field['id']}'>{$field['label']}</th>";
    echo "<td>";
    switch($field['type']) {
      // text
      case 'text':
        echo "<input type='text' name='{$field['id']}' id='{$field['id']}' value='{$meta}' size='60'>";
        if (!empty($field['desc'])) echo "<br><span class='description'>{$field['desc']}</span>";
        break;
      // image  
      case 'image':  
        $image = get_template_directory_uri().'/images/image.png';
        echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
        if ($meta) { $image = wp_get_attachment_image_src($meta, 'medium'); $image = $image[0]; }
        echo "<input name='{$field['id']}' type='hidden' class='custom_upload_image' value='{$meta}'>";
        echo "<img src='{$image}' class='custom_preview_image' alt='' style='max-height:50px'><br>";
        echo "<input class='custom_upload_image_button button' type='button' value='Choose Image'>";
        echo "<small> <a href='#' class='custom_clear_image_button'>Remove Image</a></small>";
        if (!empty($field['desc'])) echo "<br clear='all'><span class='description'>{$field['desc']}</span>";
      break;
    }
    echo "</td>";
    echo "<tr/>";
  }
  echo "</table>";
}

function ufofactory_map_save_place_meta($post_id) {
  global $place_custom_fields;
  
  if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }
  
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) return $post_id;
  } elseif (!current_user_can('edit_post', $post_id)) {
    return $post_id; 
  }
  
  foreach($place_custom_fields as $field) {
    $old = get_post_meta($post_id, $field['id'], true);
    $new = $_POST[$field['id']];
    if ($new && $new != $old) {
      update_post_meta($post_id, $field['id'], $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $field['id'], $old);
    }
  }
  
  if (!empty($_POST['custom_address'])) {
    $address = urlencode($_POST['custom_address']);
    $location = ufofactory_geocode($address);
    if (!empty($location)) {
      update_post_meta($post_id, 'custom_lat', $location->lat);
      update_post_meta($post_id, 'custom_lng', $location->lng);
    }
  }
}
?>