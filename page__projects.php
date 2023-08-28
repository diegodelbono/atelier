<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		home.php
	File source:    wp-content/themes/catorce/home.php
	Author: 		Diego Delbono
	Version: 		1.0
    Template name:  Projects
*/

?>

<?php get_header(); ?>

<main class="main">

    <section class="projects">
        <div class="container">            

            <?php if( have_rows('projects') ): ?>
                <?php while( have_rows('projects') ): the_row(); 

                    $layout = get_row_layout('layout_type'); 

                    $landscape__image = get_sub_field('image'); 
                    $landscape__title = get_sub_field('project_title');

                    $portrait__image =           get_sub_field('portrait_image'); 
                    $portrait__image_second =    get_sub_field('portrait_image_second'); 
                    $portrait__title =           get_sub_field('project_title');                        
                    $portrait__title_second =    get_sub_field('project_title_second'); ?>

                    <?php if ($layout == "landscape_layout") : ?>

                        <div class="projects__list">
                            <div class="projects__item" data-aos="fade-up" data-aos-duration="2000">
                                <img src="<?php echo $landscape__image['url']; ?>" />
                                <h2><?php echo $landscape__title; ?></h2>
                            </div>                            
                        </div>

                    <?php elseif ($layout == "portrait_layout") : ?>

                        <div class="projects__list">

                            <div class="projects__item" data-aos="fade-up" data-aos-duration="2000">
                                <img src="<?php echo $portrait__image['url']; ?>" />
                                <h2><?php echo $portrait__title; ?></h2>
                            </div>  
                            
                            <div class="projects__item" data-aos="fade-up" data-aos-duration="2000">
                                <img src="<?php echo $portrait__image_second['url']; ?>" />
                                <h2><?php echo $portrait__title_second; ?></h2>
                            </div>
                        
                        </div>

                    <?php endif; ?>
                    
                <?php endwhile; ?>
            <?php endif; ?>   
            
        </div>
    </section>

</main>

    

<?php get_footer(); ?>
