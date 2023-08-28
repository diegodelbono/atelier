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
            <div class="footer__item">
                <p><?php echo $address; ?></p>                
                <p><?php echo $phone; ?> <br /><?php echo $email; ?></p>
            </div>
            <div class="footer__item footer__item--secondary">
                <?php include('nav__footer.php') ?> 
                <?php include('social.php') ?> 
            </div>
            <div class="footer__item footer__item--full">
                <div class="newsletter">
					<div class="newsletter__content">
						<span class="newsletter__title">NEWSLETTER</span>
						<form id="subForm" class="js-cm-form" action="https://www.createsend.com/t/subscribeerror?description=" method="post" data-id="30FEA77E7D0A9B8D7616376B90063231FC9FF46BE62C99984D00E0DBD981F6774F529CD163730B25B62BCFD2334276C997EA57FFB927621B2819E8CB6F51C382">
						  	<input id="fieldEmail" class="js-cm-email-input newsletter__input" name="cm-fjhmj-fjhmj" type="email" required />
							<button class="js-cm-submit-button button-secondary" type="submit">SIGN UP</button>
						</form>
						<script type="text/javascript" src="https://js.createsend1.com/javascript/copypastesubscribeformlogic.js"></script>

					</div>
				</div>
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
