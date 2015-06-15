<?php
################################################################################
add_shortcode("ufofactory_map", "ufofactory_map_shortcode");
################################################################################
//Google Maps Shortcode
function ufofactory_map_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
      "width" => '640',
      "height" => '540',
      "src" => '',
      "size" => 100
    ), $atts));
    
    $places = get_posts(array('posts_per_page'=> $size, 'post_type'=>'place'));
    ob_start(); ?>
      <style>
        .info-wiindow-inner {  }
      </style>
      <div id="map_canvas" style="width:100%; height:<?php echo $height ?>px"></div>
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBnUY5sPY5Sm7UUhE5niboCe2m7gL6TrlI&sensor=false"></script>
      <script type="text/javascript">
        var mapOptions = {
          center: new google.maps.LatLng(33.377, 126.513),
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var places = [
        <?php
          foreach($places as $place) {
            $place_meta = get_post_meta($place->ID);
            $place_logo_id = get_post_meta($place->ID, 'custom_logo', true);
            $place_logo = (!empty($place_logo_id)) ? wp_get_attachment_image($place_logo_id, 'thumbnail') : '';
            echo "{ 'thumb':'{$place_thumb}', 'title':'{$place->post_title}', 'address':'{$place_meta['custom_address'][0]}', 'interview':'{$place_meta['custom_interview'][0]}', 'result':'{$place_meta['custom_result'][0]}', 'lat':'{$place_meta['custom_lat'][0]}', 'lng':'{$place_meta['custom_lng'][0]}' },";
          }
        ?>
        ];
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        var bounds = new google.maps.LatLngBounds();
        var infoWindow = new google.maps.InfoWindow();

        for (var i in places) {
          var place = places[i];
          var marker = new google.maps.Marker({
            map: map,
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng(place['lat'], place['lng']),
            title: place['title'],
            info: "<div class='info-window-inner'>"+place['thumb']+"<p>"+place['title']+"<br>"+place['interview']+"<br>"+place['result']+"</p></div>",
          });
          bounds.extend(marker.position);
          google.maps.event.addListener(marker, 'click', function(event) {
            console.log(this);
            infoWindow.setContent(this.info);
            infoWindow.open(map, this);
          });
        }
        map.fitBounds(bounds);
      </script>
    <?php
    $str = ob_get_contents();
    ob_end_clean();
   return $str;
}
?>