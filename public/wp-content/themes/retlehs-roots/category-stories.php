<style>
  .story_info {
  	height: 160px;
  	background-image: url(/assets/img/story_background.png);
  	background-repeat: repeat-x;
  	text-align: center;
  	padding-top: 40px;
  }
  
  .story .wrapp .container .span3 img.attachment-thumbnail {
  	max-width:220px; 
  	width: expression(this.width > 220 ? 220: true); 
  	height: 220px;
  } 
  
  .story .box_container .box { background-color:#f8ce08; }
  .story .box_container .span3, 
  .story .box_container .span6 { position: relative; margin-bottom:20px; font-size:12px; font-weight: normal; }
  .story .box_container .photo_left { margin-bottom:20px; }
  .story .box_container img.attachment-thumbnail { filter: gray; /* IE6-9 */ -webkit-filter: grayscale(100%); }

  .story .box_container .span6 .interview { position:absolute; right:0; top:0; width:140px; height:140px; overflow:hidden; text-align:center; padding:40px 40px; }
  .story .box_container .span6 .interview p { font-size:16px; font-weight:bold; margin-top:10px; }
  .story .box_container .span6 img.attachment-thumbnail { width:210px; height:200px; margin:10px; }
  .story .box_container .span6 a { color:#000; text-decoration:none; }
  
  .story .box_container .span3 .location { 
    position: absolute; top:0; left:0;
  	background-image: url(/assets/img/story_icon.png) no-repeat;
    padding-top:30%;color:#fff; font-weight: bold; font-size: 18px; text-align: center; 
    opacity:0;filter:alpha(opacity=0);
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
    background: rgb(248,206,8);
    background: rgba(248,206,8,0.6);
    width:140px; height:160px; overflow:hidden; text-align:center; padding:30px 40px; 
  }
  .story .box_container .span3 .location p { font-size:16px; font-weight:bold; margin-top:10px; line-height:1.2; }
  .story .box_container .span3 img.attachment-thumbnail { width:100%;}
  .story .box_container .span3 a { color:#fff; text-decoration:none; }
  .story .box_container .span3.box:hover .location { -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter:alpha(opacity=100); -moz-opacity:1; -khtml-opacity:1; opacity:1; }    

  .story .box_container .span6 .location { display: none; }
  .story .box_container .span3 .interview { display: none; }
  
</style>
<div class="story_info">
	<img src="/assets/img/story_info_text.png"/>
</div>
<div class="wrap container" role="document">
  <div class="content">
    <div class="main <?php echo roots_main_class(); ?>" role="main">      
		  <div class="story">
				<div class="wrapp">
					<div class="container" style='margin-left:-10px;'>
            <div class="row box_container">
              <?php 
              $grids = array(
                'span6 left photo_left', 'span3', 
                'span3 offset3 left', 'span3', 'span3', 
                'span3 left', 'span3 left', 'span6 photo_left', 
                'span6 left photo_right', 'span3', 'span3',
              );
              $count = 0;
              
							while (have_posts()) : the_post(); ?>
                <div class="box <?php echo $grids[$count%sizeof($grids)] ?>">
                  <?php the_post_thumbnail('thumbnail') ?>
                  <div class='interview'>
                    <a href='<?php the_permalink(); ?>'>
                      <img src="/assets/img/icon_hanger.png">
                      <p><?php the_field("interview");  ?></p>
                      <span>READ MORE</span>
                    </a>
                  </div>
                  <div class='location'>
                    <a href='<?php the_permalink(); ?>'>
                      <img src="/assets/img/icon_magnifier.png">
                      <p><?php the_field('location'); ?></p>
                      <span>READ MORE</span>
                    </a>
                  </div>
                </div>
              <?php $count++; endwhile; ?>
            </div>

            
            <?php if ($wp_query->max_num_pages > 1) : wp_pagenavi();?>
              <!--
<nav class="post-nav">
                <ul class="pager">
                  <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
                  <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
                </ul>
              </nav>
-->
            <?php endif; ?>
            				
					</div> <!-- container -->
				</div> <!-- wrapp -->
			</div> <!-- story -->
    </div><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->