<?php
function mytheme_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('post_list', get_template_directory_uri() . '/css/post_list.css');

    wp_enqueue_style('query_loop', get_template_directory_uri() . '/css/query_loop.css');
    wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css');
    wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css');
}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');
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