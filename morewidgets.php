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
    $output .= '<iframe id="csvphpexec"></iframe></form></div>';

    return $output;
}

add_action( 'admin_post_csv_submit', 'write_to_csv' );
add_action( 'admin_post_nopriv_csv_submit', 'write_to_csv' );

function write_to_csv(){
    echo $_POST["csvemail"];
    //if ( empty($_POST) || !wp_verify_nonce($_POST['csv_nonce'],'csv_submit') ) {
      //  echo '<p>You targeted the right function, but sorry, your nonce did not verify.</p>';
      //  die();
    //}
    
    $url = wp_nonce_url('themes.php?page=example','example-theme-options');

    if (false === ($creds = request_filesystem_credentials($url, '', false, false, null) ) ) {
	    return; // stop processing here
    }

    if ( ! WP_Filesystem($creds) ) {
        request_filesystem_credentials($url, '', true, false, null);
        return;
    }

    global $wp_filesystem;

    //$wp_filesystem->put_contents(
       // wp_plugins_dir()."MoreWidgets/csvcontact/csv/example.txt",
      //  'Example',
    //    FS_CHMOD_FILE
    //);

    wp_redirect( "/" );
}

add_action("wp_enqueue_scripts","load_scripts");
function load_scripts(){
    wp_enqueue_style("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css");
   // wp_enqueue_script("jscsvcontact",plugins_url("csvcontact/script.js", __FILE__));

}
