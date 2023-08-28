<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		home.php
	File source:    wp-content/themes/catorce/home.php
	Author: 		Diego Delbono
	Version: 		1.0
    Template name:  Home
*/

?>

<?php get_header(); ?>

<?php $video = get_field('video'); ?>

<main class="main">   
    
    <?php if($video): ?>
        <video class="video" autoplay loop muted playsinline>
            <source src="<?php echo $video['url']; ?>" type="video/mp4">
        </video>
    <?php else: ?>
        <?php include('slide.php') ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
