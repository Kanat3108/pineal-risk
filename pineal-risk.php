<?php
/*
Plugin Name: Pineal risk
Plugin URI: 
Description: risk plugin 
Version: 1.9
Author: Kanat Konyrbayev

*/


// Check for updates
require 'plugin-update-checker/plugin-update-checker.php';

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Kanat3108/pineal-risk/',
	__FILE__,
	'pineal-risk'
);
$myUpdateChecker->setBranch('master');



// Installing plugin, create database
function pineal_risk_install(){
	global $wpdb;

	$table_name = $wpdb->prefix . 'pineal_risk';

	if($wpdb->get_var("SHOW TABLES LIKE $table_name") != $table_name){
		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
		`id_risk` int(11) NOT NULL AUTO_INCREMENT,
		`code_risk` varchar(40) NOT NULL, 
		`text_risk` text(500) NOT NULL,
		`font_risk` varchar(40) NOT NULL,
		`bg_risk` varchar(40) NOT NULL,
		PRIMARY KEY(`id_risk`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

		$wpdb->query($sql);
	}
}

// Uninstall plugin
function pineal_risk_delete(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'pineal_risk';
	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);

	delete_option('risk_on_page');
}

// Delete plugin
function pineal_risk_uninstall(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'pineal_risk';
	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);
	delete_option('risk_on_page');
}

// Hooks
register_activation_hook( __FILE__, 'pineal_risk_install');
register_deactivation_hook( __FILE__, 'pineal_risk_uninstall');
register_uninstall_hook(__FILE__, 'pineal_risk_delete');


// Add to admin menu
function riskes_admin_menu(){
add_menu_page('Pineal Risk Warn', 'Pineal Risk Warn', 8, 'pineal_riskes', 'pineal_riskes_editor');
}
add_action('admin_menu', 'riskes_admin_menu');

// Router
function pineal_riskes_editor(){
	switch ($_GET['c']) {
		case 'add':
			$action = 'add';
			break;
		case 'edit':
			$action = 'edit';
			break;
		default:
			$action = 'all';
			break;
	}
	include_once("includes/$action.php");
}

// Include CSS files
function risk_function() {
	wp_register_style( 'risk-style-1', '/wp-content/plugins/pineal-risk/includes/css/risk-style-1.css' );
	wp_enqueue_style( 'risk-style-1' );
    include_once("includes/intro.php");
}
add_action( 'wp_footer', 'risk_function');



function js_init() {
    wp_enqueue_script( 'scripts-js', plugins_url( 'includes/js/scripts.js', __FILE__ ),false, true );
}

add_action('wp_enqueue_scripts','js_init');


// Include JS files
add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
function wptuts_add_color_picker( $hook ) {
 	if( is_admin() ) { 
     
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', plugins_url( 'includes/js/custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    }
}





