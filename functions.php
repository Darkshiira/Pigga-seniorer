<?php
function mytheme_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('hanna-style', get_template_directory_uri() . '/hannas-style.css');

    wp_enqueue_style('tess-style', get_template_directory_uri() . '/tess-style.css');
    wp_enqueue_style('aras-style', get_template_directory_uri() . '/aras-style.css');
    wp_enqueue_style('june-style', get_template_directory_uri() . '/june-style.css');
}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

function custom_post_type()
{
    $labels = array(
        'name' => _x('Pricelist', 'post type general name'),
        'singular_name' => _x('Price Item', 'post type singular name'),
        'add_new' => __('Add New', 'book'),
        'add_new_item' => __('Add New Price Item'),
        'edit_item' => __('Edit Price Item'),
        'new_item' => __('New Price Item'),
        'all_items' => __('All Price Items'),
        'view_item' => __('View Price Item'),
        'search_items' => __('Search Price Item'),
        'not_found' => __('No Price Item found'),
        'not_found_in_trash' => __('No Price Item found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Pricelist'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array('title', 'custom-fields')
    );

    register_post_type('custom_post', $args);
}

add_action('init', 'custom_post_type');

?>

<?php
function theme_register_widget_areas()
{
    register_sidebar(
        array(
            'name' => 'Homepage Sidebar',
            'id' => 'homepage-sidebar',
            'description' => 'Add widgets here for the homepage.',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}

add_action('widgets_init', 'theme_register_widget_areas');
?>

<?php
function theme_register_menus()
{
    register_nav_menus(
        array(
            'primary' => 'Primary Menu',
            'footer' => 'Footer Menu',
        )
    );
}

add_action('init', 'theme_register_menus');

?>
<?php 

function theme_footer_contact_customizer_settings($wp_customize) {
    $wp_customize->add_section('footer_contact_section', array(
        'title'    => __('Footer Contact Info', 'textdomain'),
        'priority' => 120,
    ));

    $contact_settings = array(
        'footer_address_setting' => 'Default Address',
        'footer_email_setting'   => 'support@example.com',
        'footer_phone_setting'   => '+(012)345-6789',
        'footer_time_setting'    => 'Mon to Fri 8:00-5:00'
    );

    foreach ($contact_settings as $key => $default) {
        $wp_customize->add_setting($key, array(
            'default'   => $default,
            'transport' => 'refresh',
        ));
        $label = ucwords(str_replace(array("footer_", "_setting"), "", $key));
        $wp_customize->add_control($key, array(
            'label'    => $label,
            'section'  => 'footer_contact_section',
            'type'     => 'text'
        ));
    }
}

add_action('customize_register', 'theme_footer_contact_customizer_settings');

class Custom_Pricelist_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'custom_pricelist_widget',
            'Custom Pricelist Widget',
            array('description' => 'Displays the custom pricelist table.')
        );
    }

    public function widget($args, $instance) {
        
        include(get_template_directory() . '/template-parts/pricelist.php');
        
    }
}

function register_custom_pricelist_widget() {
    register_widget('Custom_Pricelist_Widget');
}
add_action('widgets_init', 'register_custom_pricelist_widget');

function custom_theme_customize_register($wp_customize) {
    // Add a section for custom image
    $wp_customize->add_section('custom_image_section', array(
        'title' => 'Custom Image',
        'priority' => 30,
    ));

    // Add a setting for the custom image
    $wp_customize->add_setting('custom_image_setting', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Add a control to upload/select the custom image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_setting', array(
        'label' => 'Upload/Select Custom Image',
        'section' => 'custom_image_section',
        'settings' => 'custom_image_setting',
    )));
}
add_action('customize_register', 'custom_theme_customize_register');



?>