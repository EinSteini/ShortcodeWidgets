<?php
/*
Plugin Name: ShortcodeWidgets
Description: This Plugin adds widgets to your WordPress
Version: Beta 1.0
Author: Nils Steinkamp
*/

require_once("admin_menu.php");
add_action( 'admin_menu','admin_menu' );
add_action( 'admin_init','admin_menu_init');

//-------csvcontact-----------------
require_once("csvcontact/csvcontact.php");
require_once("csvcontact/writeascsv.php");


add_action( 'admin_post_csv_submit', 'write_to_csv' );
add_action( 'admin_post_nopriv_csv_submit', 'write_to_csv' );

add_shortcode("csvcontact", "csvcontact");
//----------------------------------

add_action("wp_enqueue_scripts","load_scripts");
function load_scripts(){
    wp_enqueue_style("csvcss", plugins_url("csvcontact/inputs/style.css", __FILE__));
}
