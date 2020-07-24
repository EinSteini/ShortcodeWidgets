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

    $option = get_option('csvcontact');
    foreach($content_array as $k => $v){
       switch($v){
            case 'email'; 
                $output .= str_replace(
                    array(
                        'label_email',
                        'placeholder_email'
                    ),
                    array(
                        $option['label_email'],
                        $option['placeholder_email']
                    ),
                    file_get_contents('inputs/email.html', true)
                );
                break;
            case 'message';
                $output .= str_replace(
                    array(
                        'label_message',
                        'placeholder_message'
                    ),
                    array(
                        $option['label_message'],
                        $option['placeholder_message']
                    ),
                    file_get_contents('inputs/message.html', true)
                );
                break;
            case 'name';
                $output .= str_replace(
                    array(
                        'label_name',
                        'placeholder_name',
                        'label_surname',
                        'placeholder_surname'
                    ),
                    array(
                        $option['label_name'],
                        $option['placeholder_name'],
                        $option['label_surname'],
                        $option['placeholder_surname']
                    ),
                    file_get_contents('inputs/name.html', true)
                );
                break;

        }
    }
    $output .= str_replace('text_button', $option['text_button'], file_get_contents('inputs/submit.html', true));
    $output .= '</form></div>';

    return $output;
}
?>