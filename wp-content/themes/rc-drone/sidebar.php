<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RC Drone
 */
?>

<div class="sidebar-area">
  <?php if ( ! dynamic_sidebar( 'rc-drone-sidebar' ) ) : ?>
    <div role="complementary" aria-label="sidebar1" id="Search" class="sidebar-widget">
      <h4 class="title" ><?php esc_html_e( 'Search', 'rc-drone' ); ?></h4>
      <?php get_search_form(); ?>
    </div>
    <div role="complementary" aria-label="sidebar2" id="archives" class="sidebar-widget">
      <h4 class="title" ><?php esc_html_e( 'Archives', 'rc-drone' ); ?></h4>
      <ul>
          <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
      </ul>
    </div>
    <div role="complementary" aria-label="sidebar3" id="meta" class="sidebar-widget">
      <h4 class="title"><?php esc_html_e( 'Meta', 'rc-drone' ); ?></h4>
      <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <?php wp_meta(); ?>
      </ul>
    </div>
    <div role="complementary" aria-label="sidebar4" id="tag-cloud" class="sidebar-widget">
      <h4 class="title" ><?php esc_html_e( 'Tag Cloud', 'rc-drone' ); ?></h4>
      <?php wp_tag_cloud(); ?>
    </div>
  <?php endif; // end sidebar widget area ?>
</div>