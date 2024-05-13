<?php
	the_posts_pagination( array(
		'prev_text' => esc_html__( 'Previous page', 'rc-drone' ),
		'next_text' => esc_html__( 'Next page', 'rc-drone' ),
	) );