<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/index">Home</a>
        </li>
        <!-- <li>
            <a href="http://localhost:6060/page.php">Stream-chat</a>
        </li> -->
        <li>
            <a href="http://develop-php-blog.zkzhe.test">Blog</a>
        </li>
        <li class="btn-login">

            <?php if (isset($_SESSION['user_first_name'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php elseif (isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>