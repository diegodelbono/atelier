<nav class="nav__header">    
    <?php
        if (has_nav_menu('header-menu', 'catorce')) {
            wp_nav_menu(array(
                    'container'       => 'section',
                    'fallback_cb'     =>  false,
                    'theme_location'  => 'header-menu',
                    'depth'           => 1
                )
            );
        };
    ?>
</nav>
