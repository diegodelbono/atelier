<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		home.php
	File source:    wp-content/themes/catorce/home.php
	Author: 		Diego Delbono
	Version: 		1.0
    Template name:  Journal
*/

?>

<?php get_header(); ?>

<main class="main">

    <section class="slide slide--journal" data-aos="fade-in" data-aos-duration="2000">
        <div class="container">

            <?php if( have_rows('slider') ): ?>
                <div id="owl__slide" class="owl-carousel owl-theme">
                <?php while( have_rows('slider') ): the_row(); ?>

                    <?php
                        $slider__image = get_sub_field('slider_image');   
                        $slider__title = get_sub_field('title');                                                            
                        $slider__link  = get_sub_field('url_link'); 
                    ?>
                    
                    <div class="slide__item">
                        <h2><?php echo $slider__title; ?></h2>
                        <img src="<?php echo $slider__image['url']; ?>" />
                    </div>

                <?php endwhile; ?>		
                </div>				
            <?php endif; ?>		

        </div>	
    </section>

    <section class="journal">
        <div class="container">


            <div class="journal__list">
            
                <?php

                    $numPosts   = 50;
                    $feedURL    = "http://atelierdetroupe.tumblr.com/api/read/?num=$numPosts";
                    $xml        = simplexml_load_file($feedURL);
                    $counter    = 1;

                    foreach($xml->posts->post as $post){
                    $posts = (string) $post->{'photo-caption'};
                    $img = (string) $post->{'photo-url'};
                        echo "<div class='journal__item' data-aos='fade-up' data-aos-duration='2000'>".'<img src="' . $img . '" />'."</div>";
                        $counter++;

                        if($counter >= 10){
                            $counter    = 1;
                        }
                    }

                ?>

            </div>



        </div>
    </section>

</main>

    

<?php get_footer(); ?>
