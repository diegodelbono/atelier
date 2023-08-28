<?php  

/*
    Theme Name:     Catorce
    File theme:     header.php
    File source:    wp-content/themes/catorce/header.php
    Author:         Diego Delbono
    Version:        1.0
*/
 
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    
    <title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { echo ' &raquo; '; } ?><?php bloginfo('name'); ?></title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/ATdeT__favicon.png" type="image/png">
    <link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Plugin: OWL -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins/owl/owl.theme.default.min.css">

    <!-- Plugin: slick -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins/slick/slick-theme.scss">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins/slick/slick.scss">

    <!-- Plugin: AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/app-21062023.css"> -->

    <?php wp_head(); ?>	
	
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-RCGQ5SMXCY"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-RCGQ5SMXCY');
	</script>
 
</head>

<body <?php body_class(); ?>>    

<header class="header">
    <?php include('logo.php') ?> 
</header>

<?php include('nav__header.php') ?>  