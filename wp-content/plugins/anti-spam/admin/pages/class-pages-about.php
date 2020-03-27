<?php

namespace WBCR\Antispam\Page;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The file contains a short help info.
 *
 * @author        Alexander Kovalev <alex.kovalevv@gmail.com>, Github: https://github.com/alexkovalevv
 * @copyright (c) 2019 Webraftic Ltd
 * @version       1.0
 */
class About extends \Wbcr_FactoryClearfy217_PageBase {

	/**
	 * {@inheritdoc}
	 */
	public $id = 'about';

	/**
	 * {@inheritdoc}
	 */
	public $page_menu_dashicon = 'dashicons-star-filled';

	/**
	 * {@inheritdoc}
	 */
	public $type = 'page';

	/**
	 * {@inheritdoc}
	 */
	public $show_right_sidebar_in_options = false;

	/**
	 * {@inheritdoc}
	 */
	public $page_menu_position = 0;


	/**
	 * Logs constructor.
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 *
	 * @param \Wbcr_Factory425_Plugin $plugin
	 */
	public function __construct( \Wbcr_Factory425_Plugin $plugin ) {
		$this->plugin = $plugin;

		$this->menu_title                  = __( 'Premium', 'anti-spam' );
		$this->page_menu_short_description = sprintf( __( 'What is new in %s?', 'anti-spam' ), $this->plugin->getPluginVersion() );

		parent::__construct( $plugin );

		add_action( 'admin_footer', [ $this, 'print_confirmation_modal_tpl' ] );
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since 6.5.2
	 * @return void
	 */
	public function assets( $scripts, $styles ) {
		parent::assets( $scripts, $styles );

		$this->styles->add( WANTISPAM_PLUGIN_URL . '/admin/assets/css/about-premium.css' );

		if ( ! $this->plugin->premium->is_activate() ) {
			$this->styles->add( WANTISPAM_PLUGIN_URL . '/admin/assets/css/libs/sweetalert2.css' );
			$this->styles->add( WANTISPAM_PLUGIN_URL . '/admin/assets/css/sweetalert-custom.css' );

			$this->scripts->add( WANTISPAM_PLUGIN_URL . '/admin/assets/js/libs/sweetalert3.min.js' );
			$this->scripts->add( WANTISPAM_PLUGIN_URL . '/admin/assets/js/trial-popup.js' );
		}
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since 6.5.2
	 * @return void
	 */
	public function print_confirmation_modal_tpl() {
		if ( isset( $_GET['page'] ) && $this->getResultId() === $_GET['page'] ) {
			$terms_url   = "https://anti-spam.space/terms-of-use/";
			$privacy_url = "https://anti-spam.space/privacy/";

			?>
            <script type="text/html" id="wantispam-tmpl-confirmation-modal">
                <h2 class="swal2-title">
					<?php _e( 'Confirmation', 'anti-spam' ) ?>
                </h2>
                <div class="wantispam-swal-content">
                    <ul class="wantispam-list-infos">
                        <li>
							<?php _e( 'We are using some personal data, like admin\'s e-mail', 'anti-spam' ) ?>
                        </li>
                        <li>
							<?php printf( __( 'By agreeing to the trial, you confirm that you have read <a href="%s" target="_blank" rel="noreferrer noopener">Terms of Service</a> and the
           					 <a href="%s" target="_blank" rel="noreferrer noopener">Privacy Policy (GDPR compilant)</a>', 'anti-spam' ), $terms_url, $privacy_url ) ?>
                        </li>
                    </ul>
                </div>
            </script>
			<?php
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function showPageContent() {
		$activate_trial_url = wp_nonce_url( $this->plugin->getPluginPageUrl( 'license', [
			'action' => 'activate-trial'
		] ), 'activate_trial' );

		?>
        <div class="wrap about-wrap full-width-layout wantispam-about-premium">
        <!-- News Title !-->
        <h1 class="wantispam-about-premium__title">Meet with <?php echo $this->plugin->getPluginTitle() ?>
            Pro in <?php echo $this->plugin->getPluginVersion() ?></h1>
        <!-- News Subtext !-->
        <div class="about-text">
            Thanks for upgrading! Many new features and improvements are available that you will enjoy.
        </div>
        <!-- Latest News !-->
        <div class="headline">
            <div class="is-fullwidth has-3-columns wantispam-about-premium__columns">
                <div class="col wantispam-about-premium__column">
                    <span class="dashicons dashicons-chart-line"></span>
                    <h3>Statistic widget</h3>
                    <p>The statistics widget on the dashboard page will provide you with statistics on the number of
                        blocked spam.</p>
                </div>
                <div class="col wantispam-about-premium__column">
                    <span class="dashicons dashicons-shield"></span>
                    <h3>Protect forms</h3>
                    <p>Allows you to protect contact and comment forms. At the moment, we support the Contact form 7
                        plugin and Wordpress native comments.</p>
                </div>
                <div class="col wantispam-about-premium__column">
                    <span class="dashicons dashicons-sos"></span>
                    <h3>Perfect support</h3>
                    <p>We provide the best support for premium users.</p>
                </div>
            </div>
            <p class="introduction">
                A new way of checking comments and registrations for spam. Once you install the plugin, all messages
                pass a three-step verification:
            </p>
            <ul>
                <li>match with the constantly updated spam base;</li>
                <li>check by a neural network;</li>
                <li>filter comments posted on a website before the plugin installation.</li>
            </ul>
            <p>Besides, now you have a handy control panel with various settings and analytics section. The result of
                our work is a great plugin that protects your site from spam much better! Check how it works. If you
                like it, don’t forget to post a review – that motivates us the best!</p>
            <div class="wantispam-about-premium__activate-trial">
                <a href="" data-url="<?php echo esc_url( $activate_trial_url ) ?>" id="js-wantispam-activate-trial-button" class="button button-default button-hero wantispam-about-premium__activate-trial-button"><?php _e( 'Try all premium features now, activate 30 days trial', 'anti-spam' ); ?></a>
                <p>The free trial edition (no credit card) contains all of the features included in the paid-for
                    version of the product.</p>
            </div>
        </div>
        <div class="feature-section one-col">
            <div class="col">
                <h2 class="wantispam-about-premium__title wantispam-about-premium__title--h2">Useful features scheduled
                    for future releases</h2>
            </div>
        </div>
        <div class="feature-section one-col">
            <div class="col">
                <ul>
                    <li>An additional level of checking comments on the base of stop words;</li>
                    <li>Additional integrations:
                        <p>popular plugins for generating forms; membership plugins, plugins
                            that add registration forms; elementor builders, beaver, composer; woocommerce; bbPress; the
                            subscription forms protection from popular services (for example, Mailchimp).
                        </p>
                    </li>
                    <li>Block or allow comments from specific countries.</li>
                    <li>Allow comments in a certain language only.</li>
                    <li>
                        Manual sorting of comments mistakenly marked as spam.
                        <p>(If a user clicked Spam (that it is not spam), display a pop-up window offering to remove the
                            user from the blacklist. In that case, the messages from this user won’t be considered as
                            spam anymore. It’s a sort of a training model helping the user to avoid manual operations
                            when his client mistakenly ended up being in the blacklist.)</p>
                    </li>
                    <li>Remove all links from comments.</li>
                    <li>Admin notifications to control the correct plugin performance.</li>
                    <li>The spam list auto clean after a certain period.</li>
                </ul>
            </div>
        </div>
		<?php
	}

}
