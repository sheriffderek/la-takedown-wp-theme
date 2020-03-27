<?php

namespace WBCR\Antispam;

/**
 * Activator for the Antispam
 *
 * @author        Alexander Kovalev <alex.kovalevv@gmail.com>, Github: https://github.com/alexkovalevv
 * @copyright (c) 26.10.2019, Webcraftic
 * @see           Wbcr_Factory425_Activator
 * @version       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Activation extends \Wbcr_Factory425_Activator {

	/**
	 * Runs activation actions.
	 *
	 * @since  6.0
	 */
	public function activate() {

		$plugin_version_in_db   = $this->get_plugin_version_in_db();
		$current_plugin_version = $this->plugin->getPluginVersion();

		$tab         = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
		$log_message = "Plugin starts activation [START].\r\n";
		$log_message .= "{$tab}-Plugin Version in DB: {$plugin_version_in_db}\r\n";
		$log_message .= "{$tab}-Current Plugin Version: {$current_plugin_version}";

		\WBCR\Logger\Writter::info( $log_message );

		if ( $this->plugin->isNetworkAdmin() ) {
			update_site_option( $this->plugin->getOptionName( 'what_is_new_64' ), 1 );
		} else {
			update_option( $this->plugin->getOptionName( 'what_is_new_64' ), 1 );
		}

		\WBCR\Logger\Writter::info( "Plugin has been activated [END]!" );
	}

	/**
	 * Get previous plugin version
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  6.0
	 * @return number
	 */
	public function get_plugin_version_in_db() {
		if ( \WBCR\Antispam\Plugin::app()->isNetworkActive() ) {
			return get_site_option( \WBCR\Antispam\Plugin::app()->getOptionName( 'plugin_version' ), 0 );
		}

		return get_option( \WBCR\Antispam\Plugin::app()->getOptionName( 'plugin_version' ), 0 );
	}


	/**
	 * Run deactivation actions.
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  6.0
	 */
	public function deactivate() {
		\WBCR\Logger\Writter::info( "Plugin starts deactivate [START]." );
		\WBCR\Logger\Writter::info( "Plugin has been deactivated [END]!" );
	}
}
