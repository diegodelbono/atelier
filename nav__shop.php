<nav class="nav-shop">
    <div class="nav-shop__container">
        <div class="nav-shop__item">
            <span class="i i--search js-open-search">Search</span>
            <?php include('searchform.php') ?> 
        </div>
        <!-- <div class="nav-shop__item">
            <a href="<?php echo home_url('/'); ?>/basket" title="View your shopping basket">
                <span class="i i--cart">Cart</span>
            </a>
        </div> -->
        <div class="nav-shop__item">
            <a href="<?php echo home_url('/'); ?>/my-account" title="View your profile">
                <span class="i i--user">User</span> 
            </a>
        </div>
    </div>
</nav>