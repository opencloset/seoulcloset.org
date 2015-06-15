<style>
  .map_info { margin-bottom:30px; }
  .map .mapview { margin-bottom:40px; height:0; }
  .map .info_house, .map .info_dress { margin-bottom:2em; }
  .map .number { text-align:center; font-weight:bold; }
  .map .number span { display:inline-block; width:146px; height:146px; background:url(/assets/img/bg_number.png); font-size:7em; line-height:140px; letter-spacing:0px; font-weight:bold; }
  .map .info_house .house { width:32px; height:32px; display:inline-block; background:#FFF url(/assets/img/icon_house.png); background-position-y:-32px; margin:0 5px 5px 0; }
  .map .info_house .house.active { width:32px; height:32px; display:inline-block; background:#F8CE08 url(/assets/img/icon_house.png); }
  .map .info_dress .dress.first { width:104px; height:137px; display:inline-block; background:url(/assets/img/icon_dress_first.png); margin:0; }
  .map .info_dress .dress { width:67px; height:137px; display:inline-block; background:url(/assets/img/icon_dress_off.png); margin-left:-37px;  }
  .map .info_dress .dress.active { width:67px; height:137px; display:inline-block; background:url(/assets/img/icon_dress_on.png); }
</style>

<div class="map_info">
	<img src="/assets/img/map_text.png" alt="map_text"/>
</div>
<div class="map">
	<div class="wrapp">
		<div class="container">
			
			<div class="mapview">
				<?php $house_count = get_option('gbs_all_house_count'); ?>
				<?php echo do_shortcode("[ufofactory_map size='20']"); ?>
			</div>
			
			<hr style='margin-bottom:50px;'>
			
			<div class="row info_house">
				<div class="span3 number">
				  <span><?php echo sprintf("%02d", $house_count) ?></span><br>
					가구가<br>옷장정리를 받았습니다
				</div>
				
				<div class="span9 icon">
				  <?php for($i=0; $i<72; $i++): ?>
				    <span class='house <?php if ($i < $house_count) echo 'active' ?>'></span>
				  <?php endfor ?>
				</div>
			</div> <!-- end. row-fluid -->
			
			<div class="row info_dress">
				<div class="span3 number">
				  <?php $dress_count = get_option('gbs_all_dress_count'); ?>
					<span><?php echo sprintf("%02d", $dress_count) ?></span><br>
  				벌의 정장이<br>기증되었습니다 
				</div>
				<div class="span9">
				  <span class="dress first"></span>
				  <?php for($i=0; $i<17; $i++): ?>
				    <span class='dress <?php if ($i < $dress_count/20 - 1.45) echo 'active' ?>'></span>
				  <?php endfor; ?>
				</div>
			</div> <!-- end. row-fluid -->
									
		</div> <!-- end. container -->
	</div> <!-- end. wrapp -->
</div> <!-- end. map -->
