<?php

namespace WBCR\Antispam\Page;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Страница журнала ошибок
 *
 * Не поддерживает режим работы с мультисаймами.
 *
 * @author        Alexander Kovalev <alex.kovalevv@gmail.com>, Github: https://github.com/alexkovalevv
 * @copyright (c) 2019 Webraftic Ltd
 * @version       1.0
 */
class Logs extends \Wbcr_FactoryClearfy217_PageBase {

	/**
	 * {@inheritdoc}
	 */
	public $id = 'logs';

	/**
	 * {@inheritdoc}
	 */
	public $page_menu_dashicon = 'dashicons-admin-tools';

	/**
	 * {@inheritdoc}
	 */
	public $type = 'page';

	/**
	 * Logs constructor.
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 *
	 * @param \Wbcr_Factory425_Plugin $plugin
	 */
	public function __construct( \Wbcr_Factory425_Plugin $plugin ) {

		$this->menu_title                  = __( 'Error Log', 'anti-spam' );
		$this->page_menu_short_description = __( 'Plugin debug report', 'anti-spam' );

		parent::__construct( $plugin );
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function assets( $scripts, $styles ) {
		parent::assets( $scripts, $styles );

		$this->styles->add( WANTISPAM_PLUGIN_URL . '/includes/logger/assets/css/base.css' );
		$this->scripts->add( WANTISPAM_PLUGIN_URL . '/includes/logger/assets/js/base.js' );
	}

	/**
	 * {@inheritdoc}
	 */
	public function showPageContent() {
		require_once( WANTISPAM_PLUGIN_DIR . '/includes/logger/class-logger-reader.php' );
		?>
        <div class="wbcr-factory-page-group-header">
            <strong><?php _e( 'Error Log', 'anti-spam' ) ?></strong>
            <p>
				<?php _e( 'In this section, you can track image optimization errors. Sending this log to us, will help in solving possible optimization issues.', 'anti-spam' ) ?>
            </p>
        </div>
        <div class="wbcr-factory-page-group-body">
            <div class="btn-group">
                <a href="<?php echo wp_nonce_url( $this->getPageUrl() . 'action=export' ) ?>"
                   class="btn btn-default"><?php _e( 'Export Debug Information', 'anti-spam' ) ?></a>
                <a href="#"
                   data-working="<?php echo esc_attr__( 'Working...', 'anti-spam' ) ?>"
                   data-nonce="<?php echo wp_create_nonce( 'wlogger_clean_logs' ) ?>"
                   class="btn btn-default js-wlogger-export-debug-report"><?php echo sprintf( __( 'Clean-up Logs (<span id="js-wlogger-size">%s</span>)', 'anti-spam' ), $this->get_log_size_formatted() ) ?></a>
            </div>
            <div class="wlogger-viewer" id="js-wlogger-viewer">
				<?php echo \WBCR\Logger\Reader::prettify() ?>
            </div>
        </div>
		<?php
	}

	/**
	 * Processing log export action in form of ZIP archive.
	 *
	 * @since  6.0
	 */
	public function exportAction() {
		require_once( WANTISPAM_PLUGIN_DIR . '/includes/logger/class-logger-export.php' );
		$export = new \WBCR\Logger\Export();

		if ( $export->prepare() ) {
			$export->download( true );
		}
	}

	/**
	 * Get log size formatted.
	 *
	 * @since  6.0
	 * @return false|string
	 */
	private function get_log_size_formatted() {

		try {
			return size_format( \WBCR\Logger\Writter::get_total_size() );
		} catch( \Exception $exception ) {
			\WBCR\Logger\Writter::error( sprintf( 'Failed to get total log size as exception was thrown: %s', $exception->getMessage() ) );
		}

		return '';
	}
}
