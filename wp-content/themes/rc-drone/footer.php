<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RC Drone
 */

?>

<footer class="footer-side">
  <div class="footer-widget">
    <div class="container">
      <?php if ( is_active_sidebar( 'footer1-sidebar' ) || is_active_sidebar( 'footer2- sidebar' ) || is_active_sidebar( 'footer3-sidebar' ) || is_active_sidebar( 'footer4-sidebar' ) ) : ?>
      <?php $rc_drone_count = 0;
        if ( is_active_sidebar('footer1-sidebar') ) : $rc_drone_count++; endif; 
        if ( is_active_sidebar('footer2-sidebar') ) : $rc_drone_count++; endif; 
        if ( is_active_sidebar('footer3-sidebar') ) : $rc_drone_count++; endif; 
        if ( is_active_sidebar('footer4-sidebar') ) : $rc_drone_count++; endif;
        $rc_drone_row = 'col-lg-'. 12/$rc_drone_count .' col-md-'. 12/$rc_drone_count .' col-sm-12';
      ?>
      <div class="row pt-2">
          <?php if ( is_active_sidebar('footer1-sidebar') ) : ?>
              <div class="footer-area <?php echo $rc_drone_row ?>">
                  <?php dynamic_sidebar('footer1-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer2-sidebar') ) : ?>
              <div class="footer-area <?php echo $rc_drone_row ?>">
                  <?php dynamic_sidebar('footer2-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer3-sidebar') ) : ?>
              <div class="footer-area <?php echo $rc_drone_row ?>">
                  <?php dynamic_sidebar('footer3-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer4-sidebar') ) : ?>
              <div class="footer-area <?php echo $rc_drone_row ?>">
                  <?php dynamic_sidebar('footer4-sidebar'); ?>
              </div>
          <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="row pt-2">
        <div class="col-lg-6 col-md-6 align-self-center">
          <p class="mb-0 py-3 text-center text-md-start">
            <?php
              if (!get_theme_mod('rc_drone_footer_text') ) { ?>   
                  <?php esc_html_e('RC Drone WordPress Theme','rc-drone'); ?>
            <?php } else {
                echo esc_html(get_theme_mod('rc_drone_footer_text'));
              }
            ?>
            <?php if ( get_theme_mod('rc_drone_copyright_enable', true) == true ) : ?>
            <?php
              /* translators: %s: WP Elemento */
              printf( esc_html__( ' By %s', 'rc-drone' ), 'WP Elemento' ); ?>
            <?php endif; ?>
          </p>
        </div>
        <div class="col-lg-6 col-md-6 align-self-center text-center text-md-end">
          <?php if ( get_theme_mod('rc_drone_copyright_enable', true) == true ) : ?>
            <a href="<?php echo esc_url(__('https://wordpress.org','rc-drone') ); ?>" rel="generator"><?php  /* translators: %s: WordPress */ printf( esc_html__( 'Proudly powered by %s', 'rc-drone' ), 'WordPress' ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div> 
  <?php if ( get_theme_mod('rc_drone_scroll_enable_setting')) : ?>
    <div class="scroll-up">
      <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
    </div>
  <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>