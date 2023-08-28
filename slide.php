<section class="slide" data-aos="fade-in" data-aos-duration="2000">
	

	<?php if( have_rows('carrusel') ): ?>			
		<div id="owl__slide" class="owl-carousel owl-theme">
			<?php while( have_rows('carrusel') ): the_row(); ?>

				<div class="slide__container">

					<?php //the_field('iframe'); ?>

					<?php if( have_rows('carrusel_item') ): ?>
						<?php while( have_rows('carrusel_item') ): the_row(); ?>

							<?php
								$carrusel_image = get_sub_field('carrusel_image');                        
								$carrusel_link  = get_sub_field('carrusel_link'); 
								$carrusel_video = get_sub_field('carrusel_video');
							?>						
							
							<a class="slide__link" href="<?php echo $carrusel_link; ?>">

								<?php if ($carrusel_video) : ?>
									<video class="slide__video js-video"  autoplay loop muted>
										<source src="<?php echo $carrusel_video['url']; ?>" type="video/mp4">								
									</video>	
								<?php endif; ?>	
								<img src="<?php echo $carrusel_image['url']; ?>" />

							</a>

						<?php endwhile; ?>						
					<?php endif; ?>	

				</div>
				
			<?php endwhile; ?>		
		</div> 	          
	<?php endif; ?>		

	
</section>
