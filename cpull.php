<?php
   /*
   Plugin Name: Cpull Creator
   Plugin URI: http://test.com
   Description: a plugin 
   Version: 1.2
   Author: Mr. Awesome
   Author URI: http://mrtotallyawesome.com
   License: GPL2
   */

// Delete table when deactivate
defined( 'ABSPATH' ) or die();
function cpull_on_activation(){
   global $wpdb;
   
   $charset_collate = $wpdb->get_charset_collate();
   $table_name = $wpdb->prefix . "cquiz"; 
   $sql = "CREATE TABLE $table_name (
     id mediumint(9) NOT NULL AUTO_INCREMENT,
     time datetime DEFAULT '0000-00-00 00:00:00',
     title tinytext NOT NULL,
     content tinytext,
     id_category mediumint(9),   
     comfort mediumint(2),
     performance mediumint(2) ,
     fuel_fconomy mediumint(2) ,     
     interior_design mediumint(2),
     exterior_styling mediumint(2) ,

     overall  mediumint(2),
     total_votes mediumint(9),

     PRIMARY KEY  (id)
   ) $charset_collate;";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
    
}

function cpull_on_deactivation(){
    global $wpdb;
    $table_name = $wpdb->prefix . "cquiz"; 
    $sql = "DROP TABLE IF EXISTS $table_name";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query($sql);
}
function cpull_on_uninstall(){
    global $wpdb;
    $table_name = $wpdb->prefix . "cquiz"; 
    $sql = "DROP TABLE IF EXISTS $table_name";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query($sql);
}

register_activation_hook(__FILE__, 'cpull_on_activation');
register_deactivation_hook(__FILE__, 'cpull_on_deactivation');
register_uninstall_hook(__FILE__, 'cpull_on_uninstall');


function cpull_setup_menu(){
        add_menu_page( 'cpull', 'Quiz', 'manage_options', 'cpull_main_init','cpull_main_init');
        add_submenu_page('cpull_main_init', 'All quiz', 'All quiz', 'manage_options','cpull_all_quiz', 'cpull_all_quiz');
}
function cpull_main_init(){

        include('admin/newquiz.php');
}
function cpull_all_quiz(){

        include('admin/allquiz.php');
}
add_action('admin_menu', 'cpull_setup_menu');


function front_main() {
  include('public/main.php');
}
add_shortcode('grand_titre', 'front_main');