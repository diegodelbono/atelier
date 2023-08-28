<!-- <div class="i-nav js-open-nav ">
    <span></span>
    <span></span>
</div> -->

<nav class="nav">
    <?php
        if (has_nav_menu('header-menu', 'catorce')) {
            wp_nav_menu(array(
                'container'       => 'section',
                'fallback_cb'     =>  false,
                'theme_location'  => 'header-menu')
            );
        };
    ?>
</nav>
