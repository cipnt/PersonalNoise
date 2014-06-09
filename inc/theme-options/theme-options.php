<?php
/**
 * personalnoise Theme Options
 *
 * @package personalnoise
 * @since personalnoise 1.0
 */

/**
 * Register the form setting for our personalnoise_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, personalnoise_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are complete, properly
 * formatted, and safe.
 *
 * We also use this function to add our theme option if it doesn't already exist.
 *
 * @since personalnoise 1.0
 */
function personalnoise_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === personalnoise_get_theme_options() )
		add_option( 'personalnoise_theme_options', personalnoise_get_default_theme_options() );

	register_setting(
		'personalnoise_options', // Options group, see settings_fields() call in personalnoise_theme_options_render_page()
		'personalnoise_theme_options', // Database option, see personalnoise_get_theme_options()
		'personalnoise_theme_options_validate' // The sanitization callback, see personalnoise_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see personalnoise_theme_options_add_page()
	);

	// Register our individual settings fields
	add_settings_field(
		'show_rss_link', // Unique identifier for the field for this section
		__( 'RSS Link', 'personalnoise' ), // Setting field label
		'personalnoise_settings_field_checkbox', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see personalnoise_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);

	add_settings_field( 'twitter_url', __( 'Twitter Link', 'personalnoise' ), 'personalnoise_twitter_text_input', 'theme_options', 'general' );
	add_settings_field( 'facebook_url', __( 'Facebook Link', 'personalnoise' ), 'personalnoise_facebook_text_input', 'theme_options', 'general' );
	add_settings_field( 'google_url', __( 'Google Plus Link', 'personalnoise' ), 'personalnoise_google_text_input', 'theme_options', 'general' );
	add_settings_field( 'vimeo_url', __( 'Vimeo Link', 'personalnoise' ), 'personalnoise_vimeo_text_input', 'theme_options', 'general' );
	add_settings_field( 'youtube_url', __( 'YouTube Link', 'personalnoise' ), 'personalnoise_youtube_text_input', 'theme_options', 'general' );
	add_settings_field( 'linkedin_url', __( 'LinkedIn Link', 'personalnoise' ), 'personalnoise_linkedin_text_input', 'theme_options', 'general' );
	add_settings_field( 'flickr_url', __( 'Flickr Link', 'personalnoise' ), 'personalnoise_flickr_text_input', 'theme_options', 'general' );
}
add_action( 'admin_init', 'personalnoise_theme_options_init' );

/**
 * Change the capability required to save the 'personalnoise_options' options group.
 *
 * @see personalnoise_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see personalnoise_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function personalnoise_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_personalnoise_options', 'personalnoise_option_page_capability' );

/**
 * Add our theme options page to the admin menu, including some help documentation.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since personalnoise 1.0
 */
function personalnoise_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'personalnoise' ), // Name of page
		__( 'Theme Options', 'personalnoise' ), // Label in menu
		'edit_theme_options', // Capability required
		'theme_options', // Menu slug, used to uniquely identify the page
		'personalnoise_theme_options_render_page' // Function that renders the options page
	);

	if ( ! $theme_page )
		return;
}
add_action( 'admin_menu', 'personalnoise_theme_options_add_page' );

/**
 * Returns the default options for personalnoise.
 *
 * @since personalnoise 1.0
 */
function personalnoise_get_default_theme_options() {
	$default_theme_options = array(
		'show_rss_link'	=> 'off',
		'twitter_url'	=> 'http://www.twitter.com/',
		'facebook_url'	=> 'http://www.facebook.com/',
		'google_url'	=> 'http://plus.google.com/',
		'vimeo_url'		=> 'http://www.vimeo.com/',
		'youtube_url'	=> 'http://www.youtube.com/',
		'linkedin_url'	=> 'http://www.linkedin.com/',
		'flickr_url'	=> 'http://www.flickr.com/'
	);

	return apply_filters( 'personalnoise_default_theme_options', $default_theme_options );
}

/**
 * Returns the options array for personalnoise.
 *
 * @since personalnoise 1.0
 */
function personalnoise_get_theme_options() {
	return get_option( 'personalnoise_theme_options', personalnoise_get_default_theme_options() );
}

/**
 * Renders the checkbox setting field.
 */
function personalnoise_settings_field_checkbox() {
	$options = personalnoise_get_theme_options();
	?>
	<label for="show-rss-link">
		<input type="checkbox" name="personalnoise_theme_options[show_rss_link]" id="show-rss-link" <?php checked( 'on', $options['show_rss_link'] ); ?> />
		<?php _e( 'Show RSS Link in the header', 'personalnoise' );  ?>
	</label>
	<?php
}

/**
 * Renders the input setting fields.
 */
function personalnoise_twitter_text_input() {
	$options = personalnoise_get_theme_options();
	?>
	<div>
		<input type="text" name="personalnoise_theme_options[twitter_url]" id="twitter_url" value="<?php echo esc_attr( $options['twitter_url'] ); ?>" />
		<label class="description" for="twitter_url"><?php _e( 'Enter your Twitter URL', 'personalnoise' ); ?></label>
	</div>
	<?php
}

function personalnoise_facebook_text_input() {
	$options = personalnoise_get_theme_options();
	?>
	<div>
		<input type="text" name="personalnoise_theme_options[facebook_url]" id="facebook_url" value="<?php echo esc_attr( $options['facebook_url'] ); ?>" />
		<label class="description" for="facebook_url"><?php _e( 'Enter your Facebook URL', 'personalnoise' ); ?></label>
	</div>
	<?php
}

function personalnoise_google_text_input() {
	$options = personalnoise_get_theme_options();
	?>
	<div>
		<input type="text" name="personalnoise_theme_options[google_url]" id="google_url" value="<?php echo esc_attr( $options['google_url'] ); ?>" />
		<label class="description" for="google_url"><?php _e( 'Enter your Google+ URL', 'personalnoise' ); ?></label>
	</div>
	<?php
}

function personalnoise_vimeo_text_input() {
	$options = personalnoise_get_theme_options();
	?>
	<div>
		<input type="text" name="personalnoise_theme_options[vimeo_url]" id="vimeo_url" value="<?php echo esc_attr( $options['vimeo_url'] ); ?>" />
		<label class="description" for="vimeo_url"><?php _e( 'Enter your Vimeo URL', 'personalnoise' ); ?></label>
	</div>
	<?php
}

function personalnoise_youtube_text_input() {
	$options = personalnoise_get_theme_options();
	?>
	<div>
		<input type="text" name="personalnoise_theme_options[youtube_url]" id="youtube_url" value="<?php echo esc_attr( $options['youtube_url'] ); ?>" />
		<label class="description" for="youtube_url"><?php _e( 'Enter your YouTube URL', 'personalnoise' ); ?></label>
	</div>
	<?php
}

function personalnoise_linkedin_text_input() {
	$options = personalnoise_get_theme_options();
	?>
	<div>
		<input type="text" name="personalnoise_theme_options[linkedin_url]" id="linkedin_url" value="<?php echo esc_attr( $options['linkedin_url'] ); ?>" />
		<label class="description" for="linkedin_url"><?php _e( 'Enter your LinkedIn URL', 'personalnoise' ); ?></label>
	</div>
	<?php
}

function personalnoise_flickr_text_input() {
	$options = personalnoise_get_theme_options();
	?>
	<div>
		<input type="text" name="personalnoise_theme_options[flickr_url]" id="flickr_url" value="<?php echo esc_attr( $options['flickr_url'] ); ?>" />
		<label class="description" for="flickr_url"><?php _e( 'Enter your Flickr URL', 'personalnoise' ); ?></label>
	</div>
	<?php
}

/**
 * Returns the options array for personalnoise.
 *
 * @since personalnoise 1.0
 */
function personalnoise_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', 'personalnoise' ), wp_get_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'personalnoise_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see personalnoise_theme_options_init()
 *
 * @since personalnoise 1.0
 */
function personalnoise_theme_options_validate( $input ) {
	$output = $defaults = personalnoise_get_default_theme_options();

	// The checkbox should either be on or off
	if ( ! isset( $input['show_rss_link'] ) )
		$input['show_rss_link'] = 'off';
		$output['show_rss_link'] = ( $input['show_rss_link'] == 'on' ? 'on' : 'off' );

	// The text input must be safe text with no HTML tags and encode the URL
	if ( isset( $input['twitter_url'] ) ) :
		$output['twitter_url'] = esc_url_raw( $input['twitter_url'] );
	endif;

	if ( isset( $input['facebook_url'] ) ) :
		$output['facebook_url'] = esc_url_raw( $input['facebook_url'] );
	endif;

	if ( isset( $input['google_url'] ) ) :
		$output['google_url'] = esc_url_raw( $input['google_url'] );
	endif;

	if ( isset( $input['vimeo_url'] ) ) :
		$output['vimeo_url'] = esc_url_raw( $input['vimeo_url'] );
	endif;

	if ( isset( $input['youtube_url'] ) ) :
		$output['youtube_url'] = esc_url_raw( $input['youtube_url'] );
	endif;

	if ( isset( $input['linkedin_url'] ) ) :
		$output['linkedin_url'] = esc_url_raw( $input['linkedin_url'] );
	endif;

	if ( isset( $input['flickr_url'] ) ) :
		$output['flickr_url'] = esc_url_raw( $input['flickr_url'] );
	endif;

	return apply_filters( 'personalnoise_theme_options_validate', $output, $input, $defaults );
}