<?php  

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		footer.php
	File source:    wp-content/themes/catorce/footer.php
	Author: 		Diego Delbono
	Version: 		1.0
*/
 
?>

<?php 
	$address 	= get_field('address', 'option');
	$email 		= get_field('contact_email', 'option');
	$phone 		= get_field('phone_number', 'option');
?>

    <footer class="footer">
        <div class="footer__container container">
            <!--  -->
            <?php include('nav__footer.php') ?> 
            <div class="footer__copy">
                <!-- <p> ATELIER DE TROUPE, INC. </p> -->
                <div>© Atelier De Trope, Inc. 2023</div>
                <a href="#">Terms + Conditions</a>
            </div>    
        </div>    
    </footer>    

    <?php wp_footer(); ?>

    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

    <!-- Plugins: owl -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins/owl/owl.carousel.min.js"></script>

    <!-- Plugins: owl -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins/slick/slick.min.js"></script>    

    <!-- Plugin: AOS --> 
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/metodos15062023.js" type="text/javascript"></script>

</body>
</html>
