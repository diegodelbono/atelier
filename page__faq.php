<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		home.php
	File source:    wp-content/themes/catorce/home.php
	Author: 		Diego Delbono
	Version: 		1.0
    Template name:  Faq
*/

?>

<?php get_header(); ?>

<main class="main">

    <div class="accordion">                
        <div class="container">

            <?php if( have_rows('section') ): ?>
                <?php while( have_rows('section') ): the_row(); 
                    
                    $accordion__title = get_sub_field('section_title'); 
                    $accordion__text  = get_sub_field('paragraph_text'); ?>

                    <div class="accordion__item" id="<?php echo $accordion__title; ?>">
                        <div class="accordion__header">
                            <h2><?php echo $accordion__title; ?></h2>
                        </div>
                        <div class="accordion__content">
                            <p><?php echo $accordion__text; ?></p>

                            <div class="accordion-sm"> 
                                <?php if( have_rows('sub_accordion') ): ?>
                                    <?php while( have_rows('sub_accordion') ): the_row(); 

                                        $subAccordion__title = get_sub_field('sub_accordion_title'); 
                                        $subAccordion__text  = get_sub_field('sub_accordion_content'); ?>

                                        <div class="accordion-sm__item">
                                            <div class="accordion-sm__header">
                                                <h3><?php echo $subAccordion__title; ?></h3>
                                            </div>
                                            <div class="accordion-sm__content">
                                                <p><?php echo $subAccordion__text; ?></p>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                <?php endif; ?> 
                            </div>    
                        </div> 
                    </div>                              
                    
                <?php endwhile; ?>
            <?php endif; ?>               

        </div>    
    </div>

</main>

<?php get_footer(); ?>
