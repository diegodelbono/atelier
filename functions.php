<?php  

if ( !defined('ABSPATH')) exit;

/*
    Theme Name:     atelierdetroupe
    File theme:     functions.php
    File source:    wp-content/themes/catorce/functions.php
    Author:         Diego Delbono
    Version:        1.0
*/


/*  remove action
    ------------------------------------------- */
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/*  Favicon
    ------------------------------------------- */
    function blog_favicon() {
        echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
    }
    
    add_action('wp_head', 'blog_favicon');


/*  Styles
    ------------------------------------------- */
    function atelierdetroupe_styles() {
        // Reemplaza 'nombre-estilo' con un nombre único para tu hoja de estilo.
        wp_enqueue_style('atelierdetroupe-styles', get_stylesheet_directory_uri() . '/css/app-21062023.css');
    }
    
    add_action('wp_enqueue_scripts', 'atelierdetroupe_styles');
    
 
/*  Nav
    ------------------------------------------- */
    register_nav_menus(array(
        'header-menu'   => __('Header Menu', 'template'),
        'footer-menu'   => __('Footer Menu', 'template'),
    ));

/*  Resultado de busqueda - quitar cat y page
    ------------------------------------------- */
    function SearchFilter($query) {
        if ($query->is_search) {
            //$query->set('post__not_in', array(437,18)); // Suscripcion y contacto
            //$query->set('cat', '-41'); // Revista papel
        }
        return $query;
    }
    add_filter('pre_get_posts','SearchFilter');

/*  Widget
    ------------------------------------------- */
    function widgets_init() {
        // Widget
        /*register_sidebar(array(
            'name' => __('Video', 'Catorce'),
            'before_widget' => '<div class="video__content">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
            'id' => 'video'
        )); */
    }

    add_action('widgets_init', 'widgets_init');


/*  Thumbnails
    ------------------------------------------- */
    //add_theme_support('post-thumbnails');
    //add_image_size('article', 500, 700, true);
    //add_image_size('article-big', 1300, 850, true);

/*  Remove Styles
------------------------------------------- */
    add_action('wp_enqueue_scripts', 'remove_styles', 100);
    function remove_styles() {
        wp_dequeue_style( 'selectWoo' );
        wp_dequeue_style( 'woocommerce_frontend_styles' );
        wp_dequeue_style( 'woocommerce-general');
        wp_dequeue_style( 'woocommerce-layout' );
        wp_dequeue_style( 'woocommerce-smallscreen' );
        wp_dequeue_style( 'woocommerce_fancybox_styles' );
        wp_dequeue_style( 'woocommerce_chosen_styles' );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
        wp_dequeue_style( 'woocommerce-inline' );
        wp_dequeue_style( 'select2' );
    }

/*  Remove Inputs
    ------------------------------------------- */
    add_filter( 'woocommerce_checkout_fields' , 'remove_inputs' );
    function remove_inputs( $fields ) {
        //unset($fields['billing']['billing_postcode']);
        unset($fields['billing']['billing_company']);
        //unset($fields['billing']['billing_country']);
        //unset($fields['billing']['billing_address_2']);
        return $fields;
    }

    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(); 
    }



    
/*  WooCommerce Change price format from range to "From:"
    -------------------------------------------------------- */
    function iconic_variable_price_format( $price, $product ) {

        $prefix = sprintf('%s ', __('From', 'iconic'));

        $min_price_regular = $product->get_variation_regular_price( 'min', true );
        $min_price_sale    = $product->get_variation_sale_price( 'min', true );
        $max_price = $product->get_variation_price( 'max', true );
        $min_price = $product->get_variation_price( 'min', true );

        $price = ( $min_price_sale == $min_price_regular ) ?
            wc_price( $min_price_regular ) :
            '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';

        return ( $min_price == $max_price ) ?
            $price :
            sprintf('%s%s', $prefix, $price);

    }

    add_filter( 'woocommerce_variable_sale_price_html', 'iconic_variable_price_format', 10, 2 );
    add_filter( 'woocommerce_variable_price_html', 'iconic_variable_price_format', 10, 2 );


/*  WooCommerce Change price format from range to "From:"
    -------------------------------------------------------- */

    add_action( 'inquirer-product', 'dcwd_copy_variation_info_js' );





    function dcwd_copy_variation_info_js() {


        global $product, $post;

        // Set HERE your Contact Form 7 shortcode:
        // ." ".

        $product_title = $post->post_title;



        $contact_generate_shortcode = '[contact-form-7 id="18274" title="Product:'. $product_title .'"]';
        // $contact_generate_shortcode = '[contact-form-7 id="18274" title="Product:"]';
        $contact_form_shortcode = $contact_generate_shortcode;
       // echo $contact_form_shortcode;

        // compatibility with WC +3
        $product_id = method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id;
        

        // The email subject for the "Subject Field"
        $email_subject = __( 'Enquire about', 'woocommerce' ) . ' ' . $product_title;

        foreach($product->get_available_variations() as $variation){
            $variation_id = $variation['variation_id'];
            foreach($variation['attributes'] as $key => $value){
                $key = ucfirst( str_replace( 'attribute_pa_', '', $key ) );
                $variations_attributes[$variation_id][$key] = $value;
            }
        }
        // Just for testing the output of $variations_attributes
        // echo '<pre>'; print_r( $variations_attributes ); echo '</pre>';


        ## CSS INJECTED RULES ## (You can also remve this and add the CSS to the style.css file of your theme
        ?>
       

        <?php


        // Displaying the title for the form (optional)
        echo '<div class="enquiry-form">' . do_shortcode( $contact_form_shortcode ) . '</div>';
        

        if ( !is_product() ) {
            return;
        }
        $product = wc_get_product( get_the_ID() ); 
        if ( ! 'variable' == $product->get_type() ) {
            return;
        }
    ?>
    <script>
    jQuery( document ).ready( function( $ ) {

        console.log("014");
      var $variations_form_select = '.variations_form select';

      
        $('.product_name').val('<?php echo $product_title; ?>');   

console.log('--->",<?php echo $product_title; ?>');
        // $('.button--border').click(function(){
        //     console.log("toco");


        // });

        

        
       //$('.product_details').val( 'Productsssss <?php echo $product_title; ?> (ID <?php echo $product_id; ?>): ' + 'Variants ' + $text);
      
      var copyVariationsToInput = function() {
          variations_values = [];
          $( $variations_form_select + ' option:selected' ).each( function() {
              variations_values.push( $( this ).text() );
          });
         var $text = variations_values.join( ', ' );
         $('.product_details').val( 'Product <?php echo $product_title; ?> (ID <?php echo $product_id; ?>): ' + 'Variants ' + $text);
      }


     
      jQuery('body').on('found_variation', function(){
        //$('.product_details').val('<?php echo $product_title; ?>');
        copyVariationsToInput()
      });
    }); 
    </script>
    <?php
    }


    