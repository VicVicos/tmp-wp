<?php
if (!empty($_SERVER['DOCUMENT_ROOT'])) {
    add_action('init', 'start_session', 1);
}
function start_session () {
    if (!session_id()) {
        session_cache_limiter('private_no_expire');
        session_start();
    }

    add_action('wp_logout', 'end_session');
    add_action('wp_login', 'end_session');
    add_action('end_session_action', 'end_session');
}

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

function view_counter() {
    $product_id = get_the_ID();
    $meta_key = 'view_counter';
    $view_counter = get_post_custom_values($meta_key, $product_id);

    if (!empty($_SESSION['views_products'])) {
        $views_products = json_decode($_SESSION['views_products']);
    } else {
        $views_products = new stdClass();
    }

    if (empty($views_products->$product_id)) {
        $views_products->$product_id = true;
        if (empty($view_counter)) {
            $counter = 0;
        } else {
            $counter = (int)$view_counter[0];
        }
        $counter += 1;

        $res = update_post_meta($product_id, $meta_key, (string)$counter);
    }

    $_SESSION['views_products'] = json_encode($views_products);
}
add_action('woocommerce_before_single_product', 'view_counter');

function print_meta_data() {
    $meta_key_view = 'view_counter';
    $meta_key_last_purchase = 'last_purchase';
    $product_id = get_the_ID();

    $view_counter = get_post_custom_values($meta_key_view, $product_id);
    $last_purchase = get_post_custom_values($meta_key_last_purchase, $product_id);
    
    if (!empty($view_counter[0])) {
        echo "<span class=\"posted_in " . $meta_key_view . "\">" . _("Views") . ": " . $view_counter[0] . "</span>";
    }

    if (!empty($last_purchase)) {
        echo "<span class=\"posted_in " . $meta_key_view . "\">" . _("Last Purchase") . ": " . $last_purchase[0] . "</span>";
    }
}
add_action('woocommerce_product_meta_end', 'print_meta_data');

function last_purchase_update($order_id) {
    $meta_key = 'last_purchase';
    $order = wc_get_order( $order_id );
    $items = $order->get_items();

    foreach ( $items as $item ) {
        $product_id = $item->get_product_id();
        date_default_timezone_set('Europe/Moscow');
        update_post_meta($product_id, $meta_key, date('Y-m-d H:i:s'));
    }
}
add_action('woocommerce_before_thankyou', 'last_purchase_update', 10, 1);