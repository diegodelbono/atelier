<?php  

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		comments.php
	File source:    wp-content/themes/catorce/comments.php
	Author: 		Diego Delbono
	Version: 		1.0
*/
 
?>

<section id="comments">
<?php if ( have_comments() ) : ?>
	<div class="listComments">
		<h2><?php comments_number('Sin comentarios', 'Un comentario', '%Comentarios' ); // valores para indicar cantidad de comentarios?></h2>
		<ul><?php wp_list_comments(); // Listado de comentarios ?></ul>	
	</div>
<?php endif; ?>
		
	
	<div id="formComments">
		
		<?php if (comments_open()) : ?>
		
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			
			<fieldset>
				
				<legend><?php comment_form_title( 'Escriba un comentario', 'Escriba un comentario %s' ); ?></legend>
				<?php cancel_comment_reply_link("Borrar comentario"); ?>
			
				<div class="row groupLabel">
					<div class="large-12 medium-12 small-12 columns">
						<label for="author">Nombre <?php if ($req) echo "(required)"; ?></label>
					</div>	
					<div class="large-12 medium-12 small-12 columns">
						<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />				
					</div>	
				</div>
			
				<div class="row groupLabel">
					<div class="large-12 medium-12 small-12 columns">
						<label for="email">Correo <?php if ($req) echo "(required)"; ?></label>
					</div>	
					<div class="large-12 medium-12 small-12 columns">
						<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					</div>				
				</div>
			
				<div class="row groupLabel">
					<div class="large-12 medium-12 small-12 columns">
						<label>Comentario</label>
					</div>	
					<div class="large-12 medium-12 small-12 columns">
						<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
					</div>				
				</div>
				
				<div class="row groupLabel">
					<div class="large-12 medium-12 small-12 columns">
						<input name="submit" type="submit" id="submit" tabindex="5" value="Enviar comentario" class="button" />
						<?php comment_id_fields(); ?>
					</div>
				</div>
			
				<?php do_action('comment_form', $post->ID); ?>
				
			</fieldset>	
				
		</form>
		
		<?php endif; // If registration required and not logged in ?>
	</div>
	
</section>	
