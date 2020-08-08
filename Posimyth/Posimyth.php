<?php 
/**
*Plugin Name: Posimyth
*Description: This is just an test plugin
*Author: Devang Vachheta
*version: 1.0
**/

error_reporting(0);
defined('ABSPATH') || die("Hey, You can't access this file!");
define("Posimyth_URL", plugins_url());
define("Posimyth_PATH", plugin_dir_path(__FILE__));	
define("PLUGIN_VERSION","1.0.0");


class Posimyth{
    public function __construct(){
        add_action('admin_menu','admin_menu1');
        function admin_menu1(){
            add_menu_page('Posimyth','Posimyth','manage_options','admin-menu','plugin_page','dashicons-smiley',200);    
            add_submenu_page('admin-menu','Posimyth','Posimyth','manage_options','admin-menu','plugin_page');
        }
        add_action('admin_enqueue_scripts','admin_style');

        $this->admin_style();
    }
        function admin_style(){
            wp_enqueue_style("cpl_style_1",Posimyth_URL."/Posimyth/admin/css/bootstrap.min.css",'',PLUGIN_VERSION);
            wp_enqueue_script("cpl_script",Posimyth_URL."/Posimyth/admin/js/bootstrap.min.js",array('jquery'),PLUGIN_VERSION,true);
                wp_localize_script( 'cpl_script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
                wp_enqueue_script( 'jquery' );
                wp_enqueue_script("cpl_script_1",Posimyth_URL."/Posimyth/admin/js/script.js",array('jquery'),PLUGIN_VERSION,true);
        }
}
$Posimyth = new Posimyth();

function plugin_page(){
    include_once Posimyth_PATH."/admin/admin.php";
}

function Posimyth_activator() {
	include_once Posimyth_PATH."/includes/Posimyth-activator.php";
	Posimyth_Activator_plugin::activate();
}
register_activation_hook( __FILE__, 'Posimyth_activator' );

function Posimyth_deactivator() {
	include_once Posimyth_PATH."/includes/Posimyth-deactivator.php";
	Posimyth_Deactivator_plugin::deactivate();
}
register_deactivation_hook( __FILE__, 'Posimyth_deactivator' );

function ajax_file() {
	include_once Posimyth_PATH."/includes/Posimth-ajax.php";
}
ajax_file();