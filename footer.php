<footer class="bg-light py-4">
    <div class="row container m-auto d-lg-flex align-items-lg-center">
        <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a class="navbar-brand" href="/">
                <?php
                if (function_exists("the_custom_logo")) {
                    $customLogoId = get_theme_mod("custom_logo");
                    $logo = wp_get_attachment_image_src($customLogoId);
                }
                ?>
                <img class="julia-nguyen-brand" src="<?php echo $logo[0]; ?>" alt="<?php echo get_bloginfo("name"); ?>"
                    class="">
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-2 mb-lg-0">
            <?php dynamic_sidebar('sidebar-2'); ?>
        </div>
        <div class="col-12 col-lg-4">
            <?php
            wp_nav_menu(
                array(
                    "menu" => "footer-menu",
                    "container" => "",
                    'menu_class' => '',
                    'fallback_cb' => '__return_false',
                    'depth' => 2,
                    'walker' => new bootstrap_5_wp_nav_menu_walker(),
                    "theme_location" => "footer-menu",
                    "items_wrap" => '<ul id="" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s navbar-nav mr-auto">%3$s</ul>'
                )
            );
            ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>

</body>

</html>