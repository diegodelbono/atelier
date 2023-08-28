<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$related = get_field('related_products');

    if( $related ): ?>

		<section class="related">

			<h2>Related Products</h2>

			<ul class="products columns-3">

				<?php foreach( $related as $p ): // variable must NOT be called $post (IMPORTANT) ?>

					<?php
						$productURL = get_the_post_thumbnail_url($p->ID, 'full');
						$gallery    = get_field( 'product_gallery', $p->ID);
						$layout     = get_field('image_type', $p->ID);

						$product = wc_get_product($p->ID);
						$url     = get_permalink( $p->ID );
						$status  = get_post_status($p->ID );                               
					?>

					<?php if($status == 'publish') { ?>
						
						<?php if ($layout == 'portrait') { ?>
							<li <?php post_class('layout--portrait'); ?>>
							<?php } else if ($layout == 'landscape') { ?>
							<li <?php post_class('layout--landscape'); ?>>
							<?php } else { ?>
							<li <?php post_class('layout--portrait'); ?>>
							<?php } ?>

							<div class="product__item" data-aos="fade-up" data-aos-duration="2000">

								<div class="product__thumb">
									<a href="<?php the_permalink(); ?>">

										<div class="thumb thumb--show">
											<?php the_post_thumbnail() ?>
										</div>

										<div class="thumb thumb--hover">
											<?php $gallery = get_field('product_gallery');
											$i = 1;
											foreach ($gallery as $gallery__item) :
												if ($i == 1) : ?>
													<img class="product-single__image" src="<?= $gallery__item['url']; ?>" alt="Atelier de Troupe - <?php the_title(); ?>">
												<?php endif;
												break; ?>
											<?php endforeach; ?>
										</div>

									</a>
								</div>

								<div class="product__caption">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<!-- <span class="product__caption--price"><?php do_action('woocommerce_after_shop_loop_item_title'); ?></span> -->

								</div>


							</div>

							</li>

					<?php } ?>
					
				<?php endforeach; ?>
			</ul>


		</section>	

    <?php endif; ?>