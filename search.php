<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		search.php
	File source:    wp-content/themes/catorce/search.php
	Author: 		Diego Delbono
	Version: 		1.0
*/

?>

<?php
	$title 	= get_the_title();
	$keys = explode(" ",$s);
	$title 	= preg_replace('/('.implode('|', $keys) .')/iu',
		'<strong class="search-excerpt">\0</strong>',
		$title);


	function search_excerpt_highlight() {
		$excerpt = get_the_excerpt();
		$keys = implode('|', explode(' ', get_search_query()));
		$excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);
		/*echo '<p>' . $excerpt . '</p>';*/
	}

?>

<?php get_header(); ?>


    <main class="main">
        <div class="main__container container">

            <h3>Search result: <strong><?php echo esc_html( get_search_query() ); ?></strong></h3>

            <ul class="products">
                <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

                <?php

                    $ID = get_the_ID();

                    $productURL = get_the_post_thumbnail_url($ID, 'full');
                    $gallery    = get_field( 'product_gallery', $ID);
                    $layout     = get_field('image_type', $ID);

                    $product = wc_get_product($ID);
                    $url     = get_permalink( $ID );
                    $status  = get_post_status($ID );                               
                ?>


                <?php if ($layout == 'portrait'){ ?>
                    <li <?php post_class('product layout--portrait'); ?> >
                <?php } else if($layout == 'landscape') { ?>
                    <li <?php post_class('product layout--landscape'); ?> >
                <?php } else { ?>
                    <li <?php post_class('product layout--portrait'); ?> >
                <?php } ?>


                <div class="product__item" data-aos="fade-up" data-aos-duration="2000">

                    <div class="product__thumb">
                        <a href="<?php the_permalink(); ?>">

                            <div class="thumb thumb--show">
                                <img data-src="<?php echo $productURL; ?>" src="<?php echo $productURL; ?>" data-id="<?php echo $loop->post->ID; ?>">
                            </div>

                            <div class="thumb thumb--hover">
                                <?php $gallery = get_field( 'product_gallery' ); $i = 1;
                                    foreach( $gallery as $gallery__item ) :
                                        if ($i == 1)  : ?>
                                            <img class="product-single__image" src="<?= $gallery__item['url']; ?>" alt="Atelier de Troupe - <?php the_title(); ?>">
                                        <?php endif; break; ?>
                                <?php endforeach; ?>

                            </div>

                        </a>
                    </div>

                    <div class="product__caption">

                        <h2 class="product__caption--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>			
                        <span class="product__caption--price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></span>

                    </div>


                    </div>
  
                    </li>
                <?php endwhile;?>
            </ul>
            <?php else:	?>
                <h2>No hay resultados</h2>
            <?php endif; ?>

        </div>
    </main>


<?php get_footer(); ?>
