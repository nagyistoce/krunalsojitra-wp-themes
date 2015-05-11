<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div class="slide" id="content-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="content-box" id="cust-scrl">
            <h1 class="entry-title"><?php _e( 'It’s looking like you may have taken a wrong turn.', 'twentytwelve' ); ?></h1>
            <div class="entry-content">
				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'twentytwelve' ); ?></p>
			</div>
        </div>
	</div>	

<?php get_footer(); ?>