<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		home.php
	File source:    wp-content/themes/catorce/home.php
	Author: 		Diego Delbono
	Version: 		1.0
    Template name:  Shop the Look
*/

?>

<?php get_header(); ?>

<main class="main">

    
        <div class="container">            

            <?php if( have_rows('look') ): ?>
                <?php while( have_rows('look') ): the_row(); 

                    $feature__image = get_sub_field('feature_image');
                    $image__mapping = get_sub_field('image_mapping');

                    
                    ?>

                    <div class="look" data-aos="fade-up" data-aos-duration="2000">                    

                        <img src="<?php echo $feature__image['url']; ?>" />

                        <?php foreach( $image__mapping as $maplocation ) { ?>

                        
                            <?php

                                $coords      = explode( ',', $maplocation['product_location'] );
                                $left        = $coords[0];
                                $top         = $coords[1];

                                $productID   = $maplocation['product_link'][0];
                                $lookproduct = wc_get_product($productID);
                                $title       = $lookproduct->get_title();
                                $price       = $lookproduct->get_price();
                                $url         = get_permalink($productID); 
                            ?>


                            <div class="look__product" style="left: <?php echo $left; ?>; top:<?php echo $top; ?>;">
                                <div class="look__product--cross js-product-cross i i--cross"></div>
                                <div class="look__product--inner js-product-inner" style="display: none;">
                                    <h3><?php echo $title; ?></h3>
                                    <p><?php echo $price; ?></p>
                                    <a href="<?php echo $url; ?>">SHOP</a>
                                </div>
                            </div>

                        <?php } ?>            
                    
                    </div>
                        
                    
                <?php endwhile; ?>
            <?php endif; ?>   
            
        
    </section>

</main>

    

<?php get_footer(); ?>
