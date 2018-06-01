<?php
// THE HEADER.PHP FILE
// MAY 2018 AIRWAVE CONSULTING
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<?php bloginfo('charset'); ?>" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


  <?php
  // wordpress header script
  wp_head();
  ?>

  <!-- stylesheet, favicon, etc -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700|Playfair+Display:400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quattrocento:400,700" rel="stylesheet">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/png"/>
</head>
<body>

<header id="page_header" class="wrap">
  <h1 class="site_title"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg">Lucas Lower<span>217-454-8240&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:lucas@lucaslower.com">lucas@lucaslower.com</a></span></h1>
</header>

<nav class="wrap" id="primary">
  <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
</nav>

<section id="page" class="wrap">