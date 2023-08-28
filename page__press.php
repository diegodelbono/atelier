<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		home.php
	File source:    wp-content/themes/catorce/home.php
	Author: 		Diego Delbono
	Version: 		1.0
    Template name:  Press
*/

?>

<?php get_header(); ?>

<main class="main">

    <section class="press">
        <div class="container">

            <h1><?php the_title(); ?></h1>
            <div class="press__list" >               

                <?php if( have_rows('press_articles') ): ?>
                    <?php while( have_rows('press_articles') ): the_row(); 
                        
                        $press__img = get_sub_field('article_cover'); 
                        $press__link = get_sub_field('pdf_download'); ?>

                        <div class="press__item" data-aos="fade-up" data-aos-duration="2000">
                            <a href="<?php echo $press__link['url']; ?>">
                                <img src="<?php echo $press__img['url']; ?>" />
                                <h2><?php the_sub_field('title'); ?></h2>
                                <h3><?php the_sub_field('date'); ?></h3>
                            </a>                            
                        </div>                           
                        
                    <?php endwhile; ?>
                <?php endif; ?>               

            </div>    
        </div>
    </section>

</main>

    

<?php get_footer(); ?>
