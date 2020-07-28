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
            case 'adress';
                $output .= str_replace(
                    array(
                        'label_adress',
                        'placeholder_adress'
                    ),
                    array(
                        $option['label_adress'],
                        $option['placeholder_adress']
                    ),
                    file_get_contents('inputs/adress.html', true)
                );
                break;
            case 'beds';
                $output .= str_replace(
                    array(
                        'label_beds',
                        'placeholder_beds'
                    ),
                    array(
                        $option['label_beds'],
                        $option['placeholder_beds']
                    ),
                    file_get_contents('inputs/beds.html', true)
                );
                break;
            case 'company';
                $output .= str_replace(
                    array(
                        'label_company',
                        'placeholder_company'
                    ),
                    array(
                        $option['label_company'],
                        $option['placeholder_company']
                    ),
                    file_get_contents('inputs/company.html', true)
                );
                break;
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
            case 'period';
                $output .= str_replace(
                    array(
                        'label_arrival',
                        'label_departure'
                    ),
                    array(
                        $option['label_arrival'],
                        $option['label_departure']
                    ),
                    file_get_contents('inputs/period.html', true)
                );
                break;
            case 'sector';
                $output .= str_replace(
                    array(
                        'label_sector',
                        'placeholder_sector'
                    ),
                    array(
                        $option['label_sector'],
                        $option['placeholder_sector']
                    ),
                    file_get_contents('inputs/sector.html', true)
                );
                break;
            case 'telephone';
                $output .= str_replace(
                    array(
                        'label_telephone',
                        'placeholder_telephone'
                    ),
                    array(
                        $option['label_telephone'],
                        $option['placeholder_telephone']
                    ),
                    file_get_contents('inputs/telephone.html', true)
                );
                break;
        }
    }
    $output .= str_replace('text_button', $option['text_button'], file_get_contents('inputs/submit.html', true));
    $output .= '</form></div>';

    return $output;
}
?>