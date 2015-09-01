<?php
/**
 * Plugin Name: zFavicon Header
 * Plugin URI: http://zsprawl.com/iOS
 * Description: This plugin allows you to add the proper meta tags generated at a site like <a href="http://realfavicongenerator.net/" target="_new">http://realfavicongenerator.net/</a> to support the standard favicons, as well as icons for iPhones, iPads, Android Devices, Windows 8 devices, and more!
 * Version: 1.0.0
 * Author: Stephen "zSprawl" Russell
 * Author URI: http://zsprawl.com
 * License: GPL2
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 
add_action('wp_head', 'favicon_header');
add_action('admin_menu', 'favicon_header_menu');
add_action( 'admin_init', 'favicon_header_settings' );

function favicon_header() {
	echo "\n<!-- Favicon Header by zSprawl -->\n";
	echo get_option('html_code');
	echo "\n\n";
}

function favicon_header_menu() {
	add_menu_page('zFavicon Header Settings', 'zFavicon', 'administrator', 'favicon-header-settings', 'favicon_header_settings_page', 'dashicons-admin-generic');
}

function favicon_header_settings() {
	register_setting( 'favicon-header-settings-group', 'html_code' );
}

function favicon_header_settings_page() {
	?>
	<div class="wrap">
	<h2><?php _e( 'Favicon Header Settings Page', 'favicon-header' ) ?></h2>

	<p><b><?php _e( 'Directions', 'favicon-header' ) ?>:</b> <?php _e( 'Use a site like <a href="http://realfavicongenerator.net/" target="_new">RealFaviconGenerator.net</a> to create a bundle of icons and header code. Transfer your images to the root folder of your website. Lastly return here to copy and paste your meta and link header tags in the box below.', 'favicon-header' ) ?></p>
	
	<form method="post" action="options.php">
		<?php settings_fields( 'favicon-header-settings-group' ); ?>
		<?php do_settings_sections( 'favicon-header-settings-group' ); ?>
		<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php _e( 'Header Code', 'favicon-header' ) ?>:</th>
			<td><textarea rows=25 cols=120 wrap=off name="html_code"><?php echo esc_attr( get_option('html_code') ); ?></textarea></td>
			</tr>
		</table>
		
		<?php submit_button(); ?>

	</form>
	</div>
	<?php
}
?>