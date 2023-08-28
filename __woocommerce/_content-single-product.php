<?php
/**
 * The template for displaying product content in the product-single.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-single.php.
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

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php

	$type           = get_field('image_type');

	$description 	= get_field('description');
	$details 		= get_field('details');
	$illustration 	= get_field('illustration');

	$spec 			= get_field('spec_sheet');
	$wiring 		= get_field('wiring');

	?>

	<div class="product-single">

		<div class="row product-single__info">
			<?php the_title( '<h1 class="product-single__title entry-title">', '</h1>' ); ?>

			<div class="product-single__details">

				<div class="product-single__price">
					<?php
						/**
						 * Hook: Woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

						//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 90 );
						add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 90 );
						do_action( 'woocommerce_single_product_summary' );
					?>
				</div>

				<div class="product-single__content">
					<?php echo $description; ?>
				</div>

				<?php echo $details; ?>

				<?php if($spec || $wiring){ ?>

					<ul class="product-single__content--spec">

						<?php if($spec){ ?>
							<li class="product-single__content--spec--download">
								<a class="download" href="<?php echo $spec; ?>" target="_blank">
									SPEC SHEET
								</a>
							</li>
						<?php } ?>

						<?php if($wiring){ ?>
							<li class="product-single__content--spec--download">
								<a class="download" href="<?php echo $wiring; ?>" target="_blank">
									WIRING
								</a>
							</li>
						<?php } ?>

					</ul>

					<?php } ?>

					<?php if( !empty($illustration) ): ?>
					<div class="product-single__illustration">
						<img class="product-single__illustration--img" src="<?php echo $illustration['url']; ?>" alt="<?php echo $illustration['alt']; ?>" />
					</div>
				<?php endif; ?>

			</div>	

		</div>	

		<div class="product-single__thumb type--<?php echo $type; ?>">
			<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>

	</div>	

	<div class="product-single__gallery" data-aos="fade-up" data-aos-duration="2000">
		<!--<div id="owl__gallery" class="owl-carousel owl-theme ">-->
			<div class="js-gallery">
				<?php $gallery = get_field( 'product_gallery' ); ?>
				<?php if ( $gallery ) : ?>
					<?php foreach ( $gallery as $image ) : ?>
						<div class="item">
							<img class="product-single__image" src="<?= $image['url']; ?>" alt="Atelier de Troupe - <?php the_title(); ?>">
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		<!--</div>-->
	</div>	

	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

		do_action( 'woocommerce_before_single_product_summary' );

		?>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 10 );
		do_action( 'woocommerce_after_single_product_summary' );  // Breaks single product page
    ?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>


<?php

$slideActive = get_field('slide_product_active');
$slideProduct = get_field('slide_product');

if($slideActive == 'enable'): ?>

    <a href="<?php echo $slideProduct['slide_link']; ?>" target="_blank">
        <div class="product-single__thelook" style="background-image: url('<?php echo $slideProduct['slide_image']['url']; ?>')">
            <div class="product-single__thelook--title">
                <h3><?php echo $slideProduct['slide_title']; ?></h3>
            </div>
        </div>
    </a>

<?php endif; ?>