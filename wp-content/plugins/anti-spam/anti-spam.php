<?php
/*
Plugin Name: Anti-Spam
Plugin URI: http://wordpress.org/plugins/anti-spam/
Description: No spam in comments. No captcha.
Version: 6.5.4
Author: CreativeMotion
Text Domain: anti-spam
Author URI: https://cm-wp.com/
License: GPLv3
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Developers who contributions in the development plugin:
 *
 * Alexander Kovalev
 * ---------------------------------------------------------------------------------
 * Full plugin development.
 *
 * Email:         alex.kovalevv@gmail.com
 * Personal card: https://alexkovalevv.github.io
 * Personal repo: https://github.com/alexkovalevv
 * ---------------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * CHECK REQUIREMENTS
 * Check compatibility with php and wp version of the user's site. As well as checking
 * compatibility with other plugins from Webcraftic.
 * -----------------------------------------------------------------------------
 */

require_once( dirname( __FILE__ ) . '/libs/factory/core/includes/class-factory-requirements.php' );

// @formatter:off
$cm_antspam_plugin_info = array(
	'prefix'               => 'wantispam_',
	'plugin_name'          => 'wantispam',
	'plugin_title'         => __( 'Anti-Spam', 'anti-spam' ),

	// PLUGIN SUPPORT
	'support_details'      => array(
		'url'       => 'https://anti-spam.space',
		'pages_map' => array(
			'support' => 'support',           // {site}/support
			'docs'    => 'docs'               // {site}/docs
		)
	),

	// PLUGIN PREMIUM SETTINGS
	'has_premium'          => true,
	'license_settings'     => array(
		'provider'         => 'freemius',
		'slug'             => 'antispam-premium',
		'plugin_id'        => '5079',
		'public_key'       => 'pk_98a99846a14067246257d4f43c04a',
		//'plugin_id'          => '4865',
		//'public_key'         => 'pk_05cbde6c0f9c96814c3b3cbff2259',
		'price'            => 15,
		'has_updates'      => true,
		'updates_settings' => array(
			'maybe_rollback'    => true,
			'rollback_settings' => array(
				'prev_stable_version' => '0.0.0'
			)
		)
	),

	// PLUGIN ADVERTS
	'render_adverts'       => true,
	'adverts_settings'     => array(
		'dashboard_widget' => true, // show dashboard widget (default: false)
		'right_sidebar'    => true, // show adverts sidebar (default: false)
		'notice'           => true, // show notice message (default: false)
	),

	// FRAMEWORK MODULES
	'load_factory_modules' => array(
		array( 'libs/factory/bootstrap', 'factory_bootstrap_426', 'admin' ),
		array( 'libs/factory/forms', 'factory_forms_423', 'admin' ),
		array( 'libs/factory/pages', 'factory_pages_425', 'admin' ),
		array( 'libs/factory/clearfy', 'factory_clearfy_217', 'all' ),
		array( 'libs/factory/freemius', 'factory_freemius_113', 'all' ),
		array( 'libs/factory/feedback', 'factory_feedback_102', 'admin' )
	)
);

$cm_antspam_compatibility = new Wbcr_Factory425_Requirements( __FILE__, array_merge( $cm_antspam_plugin_info, array(
	'plugin_already_activate'          => defined( 'WANTISPAM_PLUGIN_ACTIVE' ),
	'required_php_version'             => '5.4',
	'required_wp_version'              => '4.2.0',
	'required_clearfy_check_component' => false
) ) );

/**
 * If the plugin is compatible, then it will continue its work, otherwise it will be stopped,
 * and the user will throw a warning.
 */
if ( ! $cm_antspam_compatibility->check() ) {
	return;
}

/**
 * -----------------------------------------------------------------------------
 * CONSTANTS
 * Install frequently used constants and constants for debugging, which will be
 * removed after compiling the plugin.
 * -----------------------------------------------------------------------------
 */

// This plugin is activated
define( 'WANTISPAM_PLUGIN_ACTIVE', true );
define( 'WANTISPAM_PLUGIN_VERSION', $cm_antspam_compatibility->get_plugin_version() );
define( 'WANTISPAM_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'WANTISPAM_PLUGIN_BASE', plugin_basename( __FILE__ ) );
define( 'WANTISPAM_PLUGIN_URL', plugins_url( null, __FILE__ ) );



/**
 * -----------------------------------------------------------------------------
 * PLUGIN INIT
 * -----------------------------------------------------------------------------
 */

require_once( WANTISPAM_PLUGIN_DIR . '/libs/factory/core/boot.php' );
require_once( WANTISPAM_PLUGIN_DIR . '/includes/functions.php' );
require_once( WANTISPAM_PLUGIN_DIR . '/includes/class-anti-spam-plugin.php' );

try {
	new \WBCR\Antispam\Plugin( __FILE__, array_merge( $cm_antspam_plugin_info, array(
		'plugin_version'     => WANTISPAM_PLUGIN_VERSION,
		'plugin_text_domain' => $cm_antspam_compatibility->get_text_domain(),
	) ) );
} catch( Exception $e ) {
	// Plugin wasn't initialized due to an error
	define( 'WANTISPAM_PLUGIN_THROW_ERROR', true );

	$cm_antspam_plugin_error_func = function () use ( $e ) {
		$error = sprintf( "The %s plugin has stopped. <b>Error:</b> %s Code: %s", 'CreativeMotion Antispam', $e->getMessage(), $e->getCode() );
		echo '<div class="notice notice-error"><p>' . $error . '</p></div>';
	};

	add_action( 'admin_notices', $cm_antspam_plugin_error_func );
	add_action( 'network_admin_notices', $cm_antspam_plugin_error_func );
}
// @formatter:on
