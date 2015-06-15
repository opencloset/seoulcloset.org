<?php
function ufofactory_excerpt( $length ){
	if(!$length ){
		$length  = 1000;
	}
	$gte = get_the_excerpt();
	if($gte){
		echo ufofactory_text_cut(str_replace(PHP_EOL, '<br />', $gte), $length);
	} else {
		$content = strip_tags(get_the_content(), '<br>');
		$content = preg_replace('/\[mayor_talk_button mt_no=\d?\]/', '', $content);
		echo ufofactory_text_cut($content, $length);
	}
}

function ufofactory_text_cut($str, $len, $poststr="...") {
	if (mb_strlen($str) <= $len) {
		return $str;
	} else {
		return mb_substr($str, 0, $len, 'UTF-8') . $poststr;
	}
}

// Get all image urls from an html document
/*
function get_all_img_urls($data) {
    $images = array();
    preg_match_all('/(img|src)\=(\"|\')[^\"\'\>]+/i', $data, $media);
    unset($data);
    $data=preg_replace('/(img|src)(\"|\'|\=\"|\=\')(.*)/i',"$3",$media[0]);
    foreach($data as $url) {
    	$info = pathinfo($url);
    	if (isset($info['extension'])) {
    		if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') ||
    		($info['extension'] == 'gif') || ($info['extension'] == 'png'))
    		array_push($images, $url);
    	}
    }
    return $images;
}
*/

/*
 * Generate a thumbnail from an image url and return it's url
 *
 * @param string $img_url absolute url
 * @param int $width
 * @param int $height (optional)
 * @param boolean $cut (optional)
 */
/*
function generate_thumb($img_url, $width, $height, $cut = true) {  
    $default_upload_dir = "wp-content";
    $upload_dir = get_option("upload_path");
    
    // cut the url
    if (strpos($img_url, $default_upload_dir)) {
        $img = substr($img_url, strpos($img_url, $default_upload_dir));
    }
    else {
        $img = substr($img_url, strpos($img_url, $upload_dir));  
    }
    // resize the image
    $thumb = image_resize($img,$width,$height,$cut);
    
    if (is_string($thumb)) {
        $thumb_ = site_url() . '/' .  $thumb; 
    }
    else {
        $thumb_ = site_url() . '/' . $img;
    }

    return $thumb_;
}
*/
?>