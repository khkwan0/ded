<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();

	// Turning Page Hierarchy On or Off
	$options[] = array(
		'name' 		=> __( 'Page Hierarchy', 'pilotfish' ),
		'desc' 		=> __( 'Add Child Page links to Pages', 'pilotfish' ),
		'id' 			=> 'pilotfish_add_ph',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Replace Featured Image
	$options[] = array(
		'name' 	=> __( 'Featured Image', 'pilotfish' ),
		'desc' 	=> __( 'Replace Landing Page Featured Image Bavarian Forest', 'pilotfish' ),
		'id' 		=> 'pilotfish_featured_image_url',
		'type' 	=> 'upload'
	);

	// Favicon activate option
	$options[] = array(
		'name' 		=> __( 'Activate favicon', 'pilotfish' ),
		'desc' 		=> __( 'Check to activate favicon. Upload fav icon from below option', 'pilotfish' ),
		'id' 			=> 'pilotfish_activate_favicon',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Fav icon upload option
	$options[] = array(
		'name' 	=> __( 'Upload favicon', 'pilotfish' ),
		'desc' 	=> __( 'Upload favicon for your site', 'pilotfish' ),
		'id' 		=> 'pilotfish_favicon',
		'type' 	=> 'upload'
	);

	return $options;
}