<!-- header class="banner" role="banner">
  <div class="container">
    <a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    <nav class="nav-main" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </nav>
  </div>
</header -->

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
		<link href="http://fonts.googleapis.com/earlyaccess/nanumgothic.css" type="text/css" rel="stylesheet">
			<a class="brand" href="<?php echo home_url(); ?>/"><img src="/assets/img/logo.png" alt="logo"></a>
      <div class="nav-collapse collapse">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'inline pull-right'));
          endif;
        ?>
      </div><!-- nav-collapse -->
		</div> <!-- end. container -->
	</div> <!-- end. navbar-inner -->
</div> <!-- end. navbar navbar-inverse navbar-fixed-top"-->