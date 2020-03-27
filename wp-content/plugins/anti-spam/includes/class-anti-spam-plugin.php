<?php

namespace WBCR\Antispam;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Transliteration core class
 *
 * @author        Alexander Kovalev <alex.kovalevv@gmail.com>, Github: https://github.com/alexkovalevv
 * @copyright (c) 20.10.2019, Webcraftic
 */
class Plugin extends \Wbcr_Factory425_Plugin {

	/**
	 * Number of comments that will be sent for verification
	 *
	 * @since 6.2
	 */
	const COUNT_TO_CHECK = 30;

	/**
	 * @see self::app()
	 * @var \Wbcr_Factory425_Plugin
	 */
	private static $app;

	/**
	 * @since  6.0
	 * @var array
	 */
	private $plugin_data;

	/**
	 * Конструктор
	 *
	 * Применяет конструктор родительского класса и записывает экземпляр текущего класса в свойство $app.
	 * Подробнее о свойстве $app см. self::app()
	 *
	 * @since  6.0
	 *
	 * @param string $plugin_path
	 * @param array  $data
	 *
	 * @throws \Exception
	 */
	public function __construct( $plugin_path, $data ) {
		parent::__construct( $plugin_path, $data );

		self::$app         = $this;
		$this->plugin_data = $data;

		$this->global_scripts();

		if ( is_admin() ) {
			$this->admin_scripts();
		}
	}

	/**
	 * Статический метод для быстрого доступа к интерфейсу плагина.
	 *
	 * Позволяет разработчику глобально получить доступ к экземпляру класса плагина в любом месте
	 * плагина, но при этом разработчик не может вносить изменения в основной класс плагина.
	 *
	 * Используется для получения настроек плагина, информации о плагине, для доступа к вспомогательным
	 * классам.
	 *
	 * @since  6.0
	 * @return \Wbcr_Factory425_Plugin|\WBCR\Antispam\Plugin
	 */
	public static function app() {
		return self::$app;
	}

	/**
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  6.0
	 */
	protected function init_activation() {
		include_once( WANTISPAM_PLUGIN_DIR . '/admin/class-activation.php' );
		self::app()->registerActivation( "\WBCR\Antispam\Activation" );
	}

	/**
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  6.0
	 * @throws \Exception
	 */
	private function register_pages() {
		if ( ! defined( 'WANTISPAMP_PLUGIN_ACTIVE' ) ) {
			self::app()->registerPage( '\WBCR\Antispam\Page\Settings', WANTISPAM_PLUGIN_DIR . '/admin/pages/class-pages-settings.php' );
		}

		self::app()->registerPage( '\WBCR\Antispam\Page\License', WANTISPAM_PLUGIN_DIR . '/admin/pages/class-pages-license.php' );
		self::app()->registerPage( '\WBCR\Antispam\Page\Logs', WANTISPAM_PLUGIN_DIR . '/admin/pages/class-pages-logs.php' );

		if ( ! $this->premium->is_activate() ) {
			self::app()->registerPage( '\WBCR\Antispam\Page\About', WANTISPAM_PLUGIN_DIR . '/admin/pages/class-pages-about.php' );
		}
	}

	/**
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  6.0
	 * @throws \Exception
	 */
	private function admin_scripts() {
		require_once( WANTISPAM_PLUGIN_DIR . '/admin/boot.php' );

		$this->init_activation();

		add_action( 'plugins_loaded', function () {
			$this->register_pages();
		}, 30 );

		if ( ! wp_doing_ajax() || ! isset( $_REQUEST['action'] ) ) {
			return;
		}

		switch ( $_REQUEST['action'] ) {

			case 'wlogger-logs-cleanup':
				require_once( WANTISPAM_PLUGIN_DIR . '/admin/ajax/logs.php' );
				break;
		}
	}

	/**
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  6.0
	 */
	private function global_scripts() {
		require_once( WANTISPAM_PLUGIN_DIR . '/includes/logger/class-logger-writter.php' );
		require_once( WANTISPAM_PLUGIN_DIR . '/includes/class-protector.php' );

		new \WBCR\Logger\Writter();
	}
}

