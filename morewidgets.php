<?php
/*
Plugin Name: ShortcodeWidgets
Description: This Plugin adds widgets to your WordPress
Version: Beta 1.0
Author: Nils Steinkamp
*/

//-------csvcontact-----------------
require_once("csvcontact/csvcontact.php");
require_once("csvcontact/writeascsv.php");

add_shortcode("csvcontact", "csvcontact");

add_action( 'admin_post_csv_submit', 'write_to_csv' );
add_action( 'admin_post_nopriv_csv_submit', 'write_to_csv' );
//----------------------------------

add_action("wp_enqueue_scripts","load_scripts");
function load_scripts(){
    wp_enqueue_style("csvcss", plugins_url("csvcontact/inputs/style.css", __FILE__));
    //wp_enqueue_style("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css");
   // wp_enqueue_script("jscsvcontact",plugins_url("csvcontact/script.js", __FILE__));

}
