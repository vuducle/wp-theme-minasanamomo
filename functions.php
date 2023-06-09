<?php
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
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
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        ),
        array(
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );
}

add_action('widgets_init', 'widgetSidebar');

function widgetInfoFooter()
{
    register_sidebar(
        array(
            'before_title' => 'Infobar Footer',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        ),
        array(
            'name' => 'Infobar Footer',
            'id' => 'sidebar-2',
            'description' => 'Add informations like locations, phonenumber etc.'
        )
    );
}
add_action('widgets_init', 'widgetInfoFooter');
