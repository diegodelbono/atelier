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
<div class="container">

    <video class="video" autoplay loop muted playsinline>
        <source src="<?php echo $video['url']; ?>" type="video/mp4">
    </video>
</div>
<?php else: ?>
    <?php include('slide.php') ?>
<?php endif; ?>
 

    <section class="section">
        <div class="section__container container">
            
            <div class="grid-product">            

                <!-- Block - item -->                
                <?php if( have_rows('home_layout') ): ?>
                    <?php while( have_rows('home_layout') ): the_row(); ?>

                        <?php if( have_rows('articles') ): ?>
                            <?php while( have_rows('articles') ): the_row(); ?>
                                
                                <?php 
                                    $article__text  = get_sub_field('title'); 
                                    $article__link  = get_sub_field('links'); 
                                    $article__grid  = get_sub_field('layout');
                                    $article__align = get_sub_field('align'); 
                                    $article__img   = get_sub_field('primary_image'); 
                                    $article__hover = get_sub_field('secondary_image');
                                ?>

                                <a href="<?php echo $article__link; ?>" class="product-article" data-aos="fade-up" data-aos-duration="2000">
                                    <div class="product-article__figure <?php echo ($article__grid == 'vertical') ? "product-article__figure--vertical" : "product-article__figure--horizontal" ?>">
                                        <div class="figure-hover">
                                            <div class="figure-hover__primary">
                                                <img src="<?php echo $article__img['url']; ?>" />
                                            </div>
                                            <div class="figure-hover__secondary">
                                                <img src="<?php echo $article__hover['url']; ?>" />
                                            </div> 
                                        </div>       
                                    </div>    
                                    <div class="product-article__caption <?php echo ($article__align == 'left') ? "text-left" : "text-right" ?>">
                                        <h2><?php echo $article__text; ?></h2>
                                    </div>
                                </a>

                            <?php endwhile; ?>
                        <?php endif; ?>                           
                            
                    <?php endwhile; ?>
                <?php endif; ?> 

            </div>

        </div>
    </div>    

    <section class="section section-instagram">
        <div class="container">    
            <div class="section-instagram__list">

                <?php

                    $numPosts   = 3;
                    $feedURL    = "http://atelierdetroupe.tumblr.com/api/read/?num=$numPosts";
                    $xml        = simplexml_load_file($feedURL);
                    $counter    = 1;

                    foreach($xml->posts->post as $post){
                    $posts = (string) $post->{'photo-caption'};
                    $img = (string) $post->{'photo-url'};
                        echo "<div class='section-instagram__item' data-aos='fade-up' data-aos-duration='2000'>".'<img src="' . $img . '" />'."</div>";
                        $counter++;

                        if($counter >= 10){
                            $counter    = 1;
                        }
                    }

                ?>

            </div>

            <a href="https://www.instagram.com/atelierdetroupe/" target="_blank" class="section-instagram__link">View Instragram</a>
        </div>    
    </section>

</main>

    

<?php get_footer(); ?>
