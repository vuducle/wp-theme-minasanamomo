<!-- Desktop Nav -->
<div class="d-none d-lg-block" id="we-like-kpop">
    <nav class="navbar navbar-expand-lg bg-light " id="julia_nguyen">
        <div class="row container m-auto">


            <div class="col-lg-2">
                <a class="navbar-brand" href="/">
                    <?php
                    if (function_exists("the_custom_logo")) {
                        $customLogoId = get_theme_mod("custom_logo");
                        $logo = wp_get_attachment_image_src($customLogoId);
                    }
                    ?>
                    <img class="julia-nguyen-brand" src="<?php echo $logo[0]; ?>"
                        alt="<?php echo get_bloginfo("name"); ?>" class="">
                </a>
            </div>

            <div class="col-lg-7">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    wp_nav_menu(
                        array(
                            "menu" => "main-menu",
                            "container" => "",
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker(),
                            "theme_location" => "main-menu",
                            "items_wrap" => '<ul id="" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s navbar-nav mr-auto">%3$s</ul>'
                        )
                    );
                    ?>



                </div>
            </div>
    </nav>
</div>
<!-- Mobil Nav -->
<div class="d-lg-none">
    <nav class="navbar navbar-expand-lg bg-light " id="linda_nguyen">
        <div class="container-fluid">


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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                wp_nav_menu(
                    array(
                        "menu" => "main-menu",
                        "container" => "",
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'depth' => 2,
                        'walker' => new bootstrap_5_wp_nav_menu_walker(),
                        "theme_location" => "main-menu",
                        "items_wrap" => '<ul id="" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s navbar-nav mr-auto">%3$s</ul>'
                    )
                );
                ?>



            </div>
    </nav>
</div>
<header class="relative-header">
    <?php dynamic_sidebar('sidebar-1'); ?>
</header>