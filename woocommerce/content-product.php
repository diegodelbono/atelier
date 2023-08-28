<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility
if (empty($product) || !$product->is_visible()) {
	return;
}

$id 		= $product->get_id();
$productURL = get_the_post_thumbnail_url($id, 'full');
$gallery 	= get_field('product_gallery');
$layout	 	= get_field('image_type');
?>

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