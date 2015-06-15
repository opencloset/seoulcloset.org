<style>
  .story_sub_info {
  	height: 160px;
  	background-image: url(/assets/img/story_background.png);
  	background-repeat: repeat-x;
  	text-align: center;
  	padding-top: 40px;
  }
  
  body.single .content a { color:#f8ce08; }
  body.single .content article .entry-title, body.single article time { color:#f8ce08; }
  body.single .content article .entry-content { padding:2em 0; }
  body.single .content article footer { background:none; }
  body.single .content article .meta { color:#c1c1c1; }
  body.single .content aside { color:#f8ce08; }
  body.single .content aside .widget { margin-bottom:2em; }
  body.single .content aside ul { }
  body.single .content aside a { color:#000; }
</style>
<div class="story_sub_info">
	<img src="/assets/img/story_info_text.png"/>
</div>

<div class="wrap container" role="document">
  <div class="content row">

    <div class="main <?php echo roots_main_class(); ?>" role="main">
      <hr class='dot'>
      <?php get_template_part('templates/content', 'single'); ?>
    </div><!-- /.main -->
    <?php if (roots_display_sidebar()) : ?>
    <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
      <hr class='dot'>
      <?php include roots_sidebar_path(); ?>
    </aside><!-- /.sidebar -->
    <?php endif; ?>
  </div><!-- /.content -->
</div><!-- /.wrap -->