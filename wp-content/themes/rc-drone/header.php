<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RC Drone
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>
<?php if(get_theme_mod('rc_drone_preloader_hide', false )){ ?>
	<div class="loader">
		<div class="preloader">
			<div class="diamond">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
<?php } ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rc-drone' ); ?></a>

<header id="site-navigation" class="header py-4 <?php if( get_theme_mod( 'rc_drone_sticky_header','on') != '') { ?>sticky-header<?php } else { ?>close-sticky <?php } ?>">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-3 col-md-3 align-self-center text-center">
				<div class="logo text-center text-md-start mb-3 mb-md-0">
					<div class="logo-image">
						<?php the_custom_logo(); ?>
					</div>
					<div class="logo-content">
						<?php
							if ( get_theme_mod('rc_drone_display_header_title', true) == true ) :
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
								echo esc_attr(get_bloginfo('name'));
								echo '</a>';
							endif;
							if ( get_theme_mod('rc_drone_display_header_text', false) == true ) :
								echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
							endif;
						?>
					</div>
				</div>
			</div>
			<div class="col-xl-7 col-lg-6 col-md-6 align-self-center text-center text-lg-end">
				<button class="menu-toggle my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
					<span aria-hidden="true"><?php esc_html_e( 'Menu', 'rc-drone' ); ?></span>
				</button>
				<nav id="main-menu" class="close-panal">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'main-menu',
							'container' => 'false'
						));
					?>
					<button class="close-menu my-2 p-2" type="button">
						<span aria-hidden="true"><i class="fa fa-times"></i></span>
					</button>
				</nav>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 align-self-center text-center text-lg-end py-2">
				<?php if ( get_theme_mod('rc_drone_search_enable', 'on' ) == true ) : ?>
					<div class="search-cont d-inline-block border-end">
						<button type="button" class="search-cont-button"><i class="fas fa-search"></i></button>
					</div>
					<div class="outer-search">
						<div class="inner-search">
							<?php get_search_form(); ?>
						</div>
						<button type="button" class="closepop search-cont-button-close" >X</button>
					</div>
				<?php endif; ?>
				<?php if ( get_theme_mod('rc_drone_header_button_url')) : ?>
					<div class="compare-btn my-2 d-inline-block border-end pe-1">
						<a href="<?php echo esc_url( get_theme_mod('rc_drone_header_button_url' ) ); ?>"><i class="fa-solid fa-code-compare"></i></a>
					</div>
				<?php endif; ?>	
				<?php if ( get_theme_mod('rc_drone_cart_box_enable', 'on' ) == true ) : ?>
					<?php if ( class_exists( 'woocommerce' ) ) {?>
						<div class="header-cart border-end d-inline-block">
							<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','rc-drone' ); ?>"><i class="fas fa-shopping-bag me-1"></i></a>
						</div>
					<?php }?>
				<?php endif; ?>
				<?php if ( get_theme_mod('rc_drone_login_enable', 'on' ) == true ) : ?>
					<div class="my-account me-2 d-inline-block">
						<?php if(class_exists('woocommerce')){ ?>
							<?php if ( is_user_logged_in() ) { ?>
								<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','rc-drone'); ?>"><i class="fas fa-user"></i></a>
							<?php }
							else { ?>
								<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','rc-drone'); ?>"><i class="fas fa-user"></i></a>
							<?php } ?>
						<?php }?>
							</div>
				<?php endif; ?>	
			</div>
		</div>
	</div>
</header>
