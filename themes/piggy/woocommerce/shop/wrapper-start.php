<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$template = get_option('template');

switch( $template ) {
	case 'twentyeleven' :
		echo '<div class="navi in_con"><div class="navi1">';
		break;
	case 'twentytwelve' :
		echo '<div class="navi in_con"><div class="navi1 pro_page">';
		break;
	case 'twentythirteen' :
		echo '<div class="navi in_con"><div class="navi1">';
		break;
	default :
		echo '<div class="navi in_con"><div class="navi1">';
		break;
}