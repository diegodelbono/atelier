<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		page.php
	File source:    wp-content/themes/catorce/page.php
	Author: 		Diego Delbono
	Version: 		1.0
*/

?>

<?php get_header(); ?>

<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

    <main class="main">
        <div class="main__header container">
            <!--<h1>< ?php the_title(); ?></h1>-->
        </div>
        <div class="main__content container">
            <?php the_content(); ?>
        </div>
    </main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
