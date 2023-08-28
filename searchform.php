<?php

if ( !defined('ABSPATH')) exit;

/*
	Theme Name:		atelierdetroupe
	File theme:		searchForm.php
	File source:    wp-content/themes/catorce/searchForm.php
	Author: 		Diego Delbono
	Version: 		1.0
*/

?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<div class="search js-search">
		<div class="search__content">
			<input class="search__input" type="text" placeholder="Search" value="<?php the_search_query(); ?>" name="s" id="searching" />
			<!--<button class="btn" type="submit" id="searchsubmit">Buscar</button>-->
			<!--<div class="js-close-search close-nav"><i class="i i--close"></i></div>-->
		</div>
	</div>
</form>