<?php

register_nav_menus( array(
	'footer_menu' => 'Footer Menu'
) );

//register custome post
add_action ('init', 'create_post_type');

function create_post_type() {

register_post_type('homopost',
		array(
			'labels' => array(
				'name' => __('Home post'),
				'singular_name' => __('Home post')
			),
			'public' => true,
			'has_rewrite' => true,
			'rewrite' => array('slug' => 'homopost'),
			'supports' => array('title')
		)
	);
	



register_sidebar( array(

		'name' => __( 'Footer Social', 'twentytwelve' ),

		'id' => 'footer_social',

		'description' => __( 'Footer Social', 'twentytwelve' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );

}
	
	
//contain Limit

function content($num) {

$theContent = get_the_content();

$output = preg_replace('/<img[^>]+./','', $theContent);

$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );

$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );

$limit = $num+1;

$content = explode(' ', $output, $limit);

array_pop($content);

$content = implode(" ",$content)."...";

echo $content;

}
	
	
	// allow VND for WooCommerce
add_filter( 'woocommerce_paypal_supported_currencies', 'enable_custom_currency' );
function enable_custom_currency($currency_array) {
	$currency_array[] = 'VND';
	return $currency_array;
}