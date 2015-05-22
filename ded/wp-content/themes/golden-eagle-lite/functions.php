<?php

include_once get_template_directory() . '/functions/goldeneagle-functions.php';
$functions_path = get_template_directory() . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces (options,framework, seo)
/* These files build out the theme specific options and associated functions. */
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings
require_once ($functions_path . 'dynamic-image.php');
require_once ($functions_path . 'themes-page.php');

/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */

function goldeneagle_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('goldeneagle-ddsmoothmenu', get_stylesheet_directory_uri() . '/js/ddsmoothmenu.js', array('jquery'));
        wp_enqueue_script('goldeneagle-slider', get_stylesheet_directory_uri() . '/js/slides.min.jquery.js', array('jquery'));
        wp_enqueue_script('goldeneagle-tipsy', get_stylesheet_directory_uri() . '/js/jquery.tipsy.js', array('jquery'));
        wp_enqueue_script('goldeneagle-validate', get_stylesheet_directory_uri() . '/js/jquery.validate.min.js', array('jquery'));
        wp_enqueue_script('goldeneagle-effect', get_stylesheet_directory_uri() . '/js/frontend-effect.js', array('jquery'));
        wp_enqueue_script('goldeneagle-mobilemenu', get_stylesheet_directory_uri() . '/js/mobilemenu.js', array('jquery'));
        wp_enqueue_script('goldeneagle-custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'));
        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}

add_action('wp_enqueue_scripts', 'goldeneagle_wp_enqueue_scripts');

//get theme option value
function goldeneagle_get_option($name) {
    $options = get_option('goldeneagle_options');
    if (isset($options[$name]))
        return $options[$name];
}

//update theme option value
function goldeneagle_update_option($name, $value) {
    $options = get_option('goldeneagle_options');
    $options[$name] = $value;
    return update_option('goldeneagle_options', $options);
}

//delete theme option value
function goldeneagle_delete_option($name) {
    $options = get_option('goldeneagle_options');
    unset($options[$name]);
    return update_option('goldeneagle_options', $options);
}

//Add plugin notification 
require_once(get_template_directory() . '/functions/plugin-activation.php');
require_once(get_template_directory() . '/functions/inkthemes-plugin-notify.php');
add_action('tgmpa_register', 'inkthemes_plugins_notify');