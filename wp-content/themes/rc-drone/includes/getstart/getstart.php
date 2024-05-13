<?php
//about theme info
add_action( 'admin_menu', 'rc_drone_gettingstarted' );
function rc_drone_gettingstarted() {
	add_theme_page( esc_html__('RC Drone', 'rc-drone'), esc_html__('RC Drone', 'rc-drone'), 'edit_theme_options', 'rc_drone_about', 'rc_drone_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function rc_drone_admin_theme_style() {
	wp_enqueue_style('rc-drone-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('rc-drone-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'rc_drone_admin_theme_style');

// Changelog
if ( ! defined( 'RC_DRONE_CHANGELOG_URL' ) ) {
    define( 'RC_DRONE_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function rc_drone_changelog_screen() {	
	global $wp_filesystem;
	$rc_drone_changelog_file = apply_filters( 'rc_drone_changelog_file', RC_DRONE_CHANGELOG_URL );
	if ( $rc_drone_changelog_file && is_readable( $rc_drone_changelog_file ) ) {
		WP_Filesystem();
		$rc_drone_changelog = $wp_filesystem->get_contents( $rc_drone_changelog_file );
		$rc_drone_changelog_list = rc_drone_parse_changelog( $rc_drone_changelog );
		echo wp_kses_post( $rc_drone_changelog_list );
	}
}

function rc_drone_parse_changelog( $rc_drone_content ) {
	$rc_drone_content = explode ( '== ', $rc_drone_content );
	$rc_drone_changelog_isolated = '';
	foreach ( $rc_drone_content as $key => $rc_drone_value ) {
		if (strpos( $rc_drone_value, 'Changelog ==') === 0) {
	    	$rc_drone_changelog_isolated = str_replace( 'Changelog ==', '', $rc_drone_value );
	    }
	}
	$rc_drone_changelog_array = explode( '= ', $rc_drone_changelog_isolated );
	unset( $rc_drone_changelog_array[0] );
	$rc_drone_changelog = '<div class="changelog">';
	foreach ( $rc_drone_changelog_array as $rc_drone_value) {
		$rc_drone_value = preg_replace( '/\n+/', '</span><span>', $rc_drone_value );
		$rc_drone_value = '<div class="block"><span class="heading">= ' . $rc_drone_value . '</span></div><hr>';
		$rc_drone_changelog .= str_replace( '<span></span>', '', $rc_drone_value );
	}
	$rc_drone_changelog .= '</div>';
	return wp_kses_post( $rc_drone_changelog );
}

//guidline for about theme
function rc_drone_mostrar_guide() { 
	//custom function about theme customizer
	$rc_drone_return = add_query_arg( array()) ;
	$rc_drone_theme = wp_get_theme( 'rc-drone' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'RC Drone', 'rc-drone' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'rc-drone' ); ?>: <?php echo esc_html($rc_drone_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="rc_drone_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'rc-drone' ); ?></button>
				<button class="tablinks" onclick="rc_drone_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'rc-drone' ); ?></button>
				<button class="tablinks" onclick="rc_drone_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'rc-drone' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$rc_drone_plugin_ins = RC_Drone_Plugin_Activation_WPElemento_Importer::get_instance();
					$rc_drone_actions = $rc_drone_plugin_ins->rc_drone_recommended_actions;
					?>
					<div class="rc-drone-recommended-plugins ">
							<div class="rc-drone-action-list">
								<?php if ($rc_drone_actions): foreach ($rc_drone_actions as $rc_drone_key => $rc_drone_actionValue): ?>
										<div class="rc-drone-action" id="<?php echo esc_attr($rc_drone_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($rc_drone_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($rc_drone_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($rc_drone_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'rc-drone'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'rc-drone'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'rc-drone'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'rc-drone'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'rc-drone'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'rc-drone'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'rc-drone'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'rc-drone'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( RC_DRONE_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'rc-drone'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'rc-drone'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'rc-drone'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( RC_DRONE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'rc-drone'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'rc-drone'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'rc-drone'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( RC_DRONE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'rc-drone'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'rc-drone' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','rc-drone'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','rc-drone'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','rc-drone'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','rc-drone'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php rc_drone_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'rc-drone'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('RC Drone WordPress Theme', 'rc-drone'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( RC_DRONE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'rc-drone'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( RC_DRONE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'rc-drone'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( RC_DRONE_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'rc-drone'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'rc-drone'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'rc-drone' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'rc-drone' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'rc-drone' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'rc-drone' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'rc-drone' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'rc-drone' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'rc-drone'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( RC_DRONE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'rc-drone'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'rc-drone' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>