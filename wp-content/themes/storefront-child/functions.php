<?php
function theme_scripts() {
    //wp_enqueue_script('jquery');
    wp_enqueue_script('storefront-child-scripts-js', get_child_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function get_child_template_directory_uri($template = "storefront-child") {
    $template = str_replace( '%2F', '/', rawurlencode( $template ) );
    $theme_root_uri = get_theme_root_uri( $template );
    return "$theme_root_uri/$template";
}