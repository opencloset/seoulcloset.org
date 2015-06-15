<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

  <?php do_action('get_header'); ?>
  <?php get_template_part('templates/header'); ?>

  <?php include roots_template_path(); ?>

  <?php get_template_part('templates/footer'); ?>  

</body>
</html>