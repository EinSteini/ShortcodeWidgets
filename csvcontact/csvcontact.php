<?php
function csvcontact( $attr ){

    $attributes = shortcode_atts(
        array(
            'content' => '',
        ),
        $attr
    );

    $output = file_get_contents('inputs/formstart.html', true);

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
    $output .= file_get_contents("inputs/submit.html", true);
    $output .= '</form></div>';

    return $output;
}
?>