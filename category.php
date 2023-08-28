<?php  

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		category.php
	File source:    wp-content/themes/catorce/category.php
	Author: 		Diego Delbono
	Version: 		1.0
*/
 
?>

<?php get_header(); ?>

no estamos aca

<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
    <?php single_cat_title(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>
    <?php the_post_thumbnail(''); ?>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
