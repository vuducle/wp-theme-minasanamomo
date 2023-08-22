<?php
require_once(__DIR__ . '/classes/Bootstrap_5_Nav.php');

// register a new menu
register_nav_menu('main-menu', 'Main menu');

function themeSupport()
{
    add_theme_support("title-tag");
    add_theme_support("custom-logo");
    add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "themeSupport");


// function WP_Menus() {
//     $locations = array(        
//         "primary" => "Desktop",
//         "footer" => "Footer Menu"
//     );
//     register_nav_menus($locations);
// }

// add_action("init", "WP_Menus");

function AddLinkAtts($atts)
{
    $atts["class"] = "nav-link";
    return $atts;
}

// add_action( "nav_menu_link_attributes", "AddLinkAtts");

function RegisterStyles()
{
    $version = wp_get_theme()->get("Version");
    // Add styles from root folder aka Readme
    wp_enqueue_style(
        "linda-nguyen",
        get_template_directory_uri() . "/style.css",
        array(
            "linda-nguyen-bootstrap"
        ),
        $version,
        "all"
    );
    // Adds styles from assets
    wp_enqueue_style(
        "linda-nguyen-bootstrap",
        get_template_directory_uri() . "/assets/css/bootstrap.min.css",
        array(),
        "5.2",
        "all"
    );

    wp_enqueue_style(
        "custom",
        get_template_directory_uri() . "/assets/css/custom.css",
        array(),
        "0.1-mina-sana-momo",
        "all"
    );
}
add_action("wp_enqueue_scripts", "RegisterStyles");

function RegisterScripts()
{
    // Load Bootstrap
    wp_enqueue_script(
        "bootstrap-5.2",
        get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js",
        array(),
        "5.2",
        true
    );
    // Custom JS
    wp_enqueue_script(
        "gigachad",
        get_template_directory_uri() . "/assets/js/main.js",
        array(),
        "1.0",
        true
    );
}

add_action("wp_enqueue_scripts", "RegisterScripts");

function widgetSidebar()
{
    register_sidebar(
        array(
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        )
    );
}

add_action('widgets_init', 'widgetSidebar');

function widgetInfoFooter()
{
    register_sidebar(
        array(
            'name' => 'Infobar Footer',
            'id' => 'sidebar-2',
            'description' => 'Add informations like locations, phonenumber etc.',
            'before_title' => 'Infobar Footer',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        )
    );
}
add_action('widgets_init', 'widgetInfoFooter');
