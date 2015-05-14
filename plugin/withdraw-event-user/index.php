<?php /**
 * Plugin Name: Withdraw Event User
 * Plugin URI: http://www.letsnurture.com
 * Description: The plugin to add reviews with images 
 * Version: 1.0
 * Author: letsnurture
 * Author URI: http://www.letsnurture.com
 * License: GPL2
 */

add_action( 'admin_menu', 'register_withdraw_event_user' );

function register_withdraw_event_user(){
    add_menu_page( 'Withdraw Event', 'Withdraw Event', 'manage_options', 'withdraw-event-user/withdraw-event-user.php', '', '', 95 );
}
