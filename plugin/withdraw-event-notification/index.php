<?php /**
 * Plugin Name: Withdraw Event notification
 * Plugin URI: http://www.letsnurture.com
 * Description: The plugin to add reviews with images 
 * Version: 1.0
 * Author: letsnurture
 * Author URI: http://www.letsnurture.com
 * License: GPL2
 */

add_action( 'admin_menu', 'register_withdraw_event_notification' );

function register_withdraw_event_notification(){
    add_menu_page( 'Event notification', 'Event notification', 'manage_options', 'withdraw-event-notification/withdraw-event-notification.php', '', '', 85 );
}


