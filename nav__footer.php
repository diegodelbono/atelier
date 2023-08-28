<nav class="nav--footer">
    <?php
        if (has_nav_menu('footer-menu', 'catorce')) {
            wp_nav_menu(array(
                    'container'       => 'section',
                    'fallback_cb'     =>  false,
                    'theme_location'  => 'footer-menu')
            );
        };
    ?>
</nav>
