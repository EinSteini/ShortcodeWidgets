<?php
/*
Plugin Name: ShortcodeWidgets
Description: This Plugin adds widgets to your WordPress
Version: Alpha 0.1.2
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

    $output = file_get_contents('csvcontact/formstart.php', true);

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
                $output .= file_get_contents("csvcontact/inputs/email.html", true);break;
            case 'name';
                $output .= file_get_contents("csvcontact/inputs/name.html", true);break;

        }
    }
    $output .= file_get_contents("csvcontact/inputs/submit.html", true);
    $output .= '</form></div>';

    return $output;
}

add_action( 'admin_post_csv_submit', 'write_to_csv' );
add_action( 'admin_post_nopriv_csv_submit', 'write_to_csv' );

function write_to_csv(){

    $date = getdate();

    $csvarray = array(
        $date["mday"].".".$date["mon"].".".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"],
        $_POST["csvname"],
        $_POST["csvsurname"],
        $_POST["csvemail"]
    );

    $file = plugin_dir_path( __FILE__ ).'csvcontact/csv/'.$date['year'].'_'.$date['mon'].'.csv';
    $open = fopen($file, "a");

    if(!$open){
        echo "File couldn't be opened to write. Maybe missing permissions?";
        sleep(2);
        wp_redirect( '/' );
    }

    fputcsv($open, $csvarray);
    fclose($open);
    //wp_redirect( "/" );
    die();
}

add_action("wp_enqueue_scripts","load_scripts");
function load_scripts(){
    wp_enqueue_style("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css");
   // wp_enqueue_script("jscsvcontact",plugins_url("csvcontact/script.js", __FILE__));

}
