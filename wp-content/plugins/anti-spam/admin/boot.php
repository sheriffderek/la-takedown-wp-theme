<?php
/**
 * Admin boot
 *
 * @author        Alexander Kovalev <alex.kovalevv@gmail.com>, Github: https://github.com/alexkovalevv
 * @copyright     Webcraftic 22.10.2019
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*add_action('wantispam/factory/clearfy/check_license_success', function($action, $license_key){
	if('activate' === $action || 'sync' === $action) {

	}
});*/

/**
 * Виджет отзывов
 *
 * @param string $page_url
 * @param string $plugin_name
 *
 * @return string
 */
add_filter( 'wbcr_factory_pages_425_imppage_rating_widget_url', function ( $page_url, $plugin_name ) {
	if ( $plugin_name == \WBCR\Antispam\Plugin::app()->getPluginName() ) {
		return 'https://wordpress.org/support/plugin/anti-spam/reviews/';
	}

	return $page_url;
}, 10, 2 );

/**
 * Print admin notice: "Would you like to send them for spam checking?"
 *
 * If user clicked button "Yes, do it", plugin will exec action,
 * that put all unapproved comments to spam check queue.
 */
add_action( 'wbcr/factory/admin_notices', function ( $notices, $plugin_name ) {
	if ( $plugin_name != \WBCR\Antispam\Plugin::app()->getPluginName() ) {
		return $notices;
	}
	$review_link = "https://wordpress.org/support/plugin/anti-spam/reviews/";
	$notice_text = sprintf( __( 'Hey, You\'ve using Anti-spam – that\'s awesome! Could you please do me a BIG favor and give it a 5-star rating on WordPress? Just to help us spread the word and boost our motivation! <a href="%s" target="_blank" rel="noopener">Review</a>', "anti-spam" ), $review_link );

	$notices[] = [
		'id'              => 'wantispam_give_me_review',
		'type'            => 'success',
		'where'           => [
			'edit-comments',
			'plugins',
			'themes',
			'dashboard',
			'edit',
			'settings'
		],
		'dismissible'     => true,
		'dismiss_expires' => 0,
		'text'            => '<p><strong>Anti-spam:</strong><br>' . $notice_text . '</p>'
	];

	return $notices;
}, 10, 2 );

/**
 * Удаляем лишние виджеты из правого сайдбара в интерфейсе плагина
 *
 * - Виджет с премиум рекламой
 * - Виджет с рейтингом
 * - Виджет с маркерами информации
 */
add_filter( 'wbcr/factory/pages/impressive/widgets', function ( $widgets, $position, $plugin ) {
	if ( \WBCR\Antispam\Plugin::app()->getPluginName() == $plugin->getPluginName() && 'right' == $position ) {
		unset( $widgets['business_suggetion'] );
		unset( $widgets['rating_widget'] );
		unset( $widgets['info_widget'] );

		if ( ! \WBCR\Antispam\Plugin::app()->premium->is_activate() ) {
			$widgets['premium_suggetion'] = wantispam_get_sidebar_premium_widget();
		}
	}

	return $widgets;
}, 20, 3 );

/**
 * Changes plugin title in plugin interface header
 */
add_filter( 'wbcr/factory/pages/impressive/plugin_title', function ( $title, $plugin_name ) {
	if ( \WBCR\Antispam\Plugin::app()->getPluginName() == $plugin_name ) {
		return __( 'Anti-spam', 'realforce' );
	}

	return $title;
}, 20, 2 );

/**
 * Инициализации метабоксов и страницы "о плагине".
 *
 * Этот хук реализует условную логику, при которой пользователь переодически будет
 * видет страницу "О плагине", а конкретно при активации и обновлении плагина.
 */
/*add_action( 'admin_init', function () {
	if ( ! current_user_can( 'manage_option' ) ) {
		return;
	}

	$plugin = \WBCR\Antispam\Plugin::app();

	// If the user has updated the plugin or activated it for the first time,
	// you need to show the page "What's new?"
	//-------------------------
	$about_page_viewed = $plugin->request->get( 'wantispam_about_page_viewed', null );

	if ( is_null( $about_page_viewed ) ) {
		if ( wantispam_is_need_show_about_page() ) {
			try {
				$redirect_url = $plugin->getPluginPageUrl( 'about', [ 'wantispam_about_page_viewed' => 1 ] );

				if ( $redirect_url ) {
					wp_safe_redirect( $redirect_url );
					die();
				}
			} catch( Exception $e ) {
			}
		}
	} else {
		if ( wantispam_is_need_show_about_page() ) {
			if ( $plugin->isNetworkAdmin() ) {
				delete_site_option( $plugin->getOptionName( 'what_is_new_64' ) );
			} else {
				delete_option( $plugin->getOptionName( 'what_is_new_64' ) );
			}
		}
	}
} );*/

