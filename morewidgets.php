<?php
/*
Plugin Name: ShortcodeWidgets
Description: This Plugin adds widgets to your WordPress
Version: Alpha 1.1
Author: Nils Steinkamp
*/

add_shortcode("csvcontact", "csvcontact");

function csvcontact( $attr ){

    $attributes = shortcode_atts(
        array(
            'content' => '',
        ),
        $attr
    );

    $output = '<div id="maindiv"><form>';

    //Check if attribute is given
    if(!isset($attr["content"])){
        return '<h3>error: crucial attribute "content" not given</h3>';
    }
    //Get array from input
    $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $attributes['content'], FILTER_SANITIZE_STRING ) );
    $content_array = explode(',', $no_whitespaces);

    foreach($content_array as $k => $v){
       switch($v){
            case 'email'; 
                $output .= file_get_contents("inputs/email.html", true);break;
            case 'name';
                $output .= file_get_contents("inputs/name.html", true);break;

        }
    }
    
    $output .= '</form></div>';

    return $output;
}

add_action("wp_enqueue_scripts","load_css");
function load_css(){
    wp_enqueue_style("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css");
}