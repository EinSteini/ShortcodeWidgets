<?php
    function write_to_csv(){

        $option = get_option( 'csvcontact' );
        $date = getdate(time()+$option['timezone']*3600);
    
        $csvarray = array(
            $date["mday"].".".$date["mon"].".".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"],
            str_replace(";","",htmlspecialchars($_POST["csvname"])),
            str_replace(";","",htmlspecialchars($_POST["csvsurname"])),
            str_replace(";","",htmlspecialchars($_POST["csvemail"])),
            str_replace(";","",htmlspecialchars($_POST["csvmessage"]))
        );

        $file = plugin_dir_path( __FILE__ ).'csv/'.$date['year'].'_'.$date['mon'].'.csv';

        if($date["mon"] == 1){
            $fileold = plugin_dir_path( __FILE__ ).'csv/'.strval(intval($date['year'])-1).'_12.csv';
            $filenameold = strval(intval($date['year'])-1).'_12';
        }else{
            $fileold = plugin_dir_path( __FILE__ ).'csv/'.$date['year'].'_'.strval(intval($date['mon'])-1).'.csv';
            $filenameold = $date['year'].'_'.strval(intval($date['mon'])-1);
        }
        
        if(!(file_exists($file))){
            copy(plugin_dir_path(__FILE__)."csv/sample.csv",$file);
            $mail = wp_mail($option['email_adress_to_send_to'], "CSVContact ".$filenameold,"Here is your CSVContact-Form for ".$filenameold,"",array($file)) ;
        }

        $open = fopen($file, "a");
    
        if(!$open){
            wp_mail(
                $option['email_adress_to_send_to'],
                "Error while trying to write file by Plugin ShortcodeWidgets", 
                "Your CSVContact form couldn't write the submitted data to the server. Please check if your user has writing permissions on this directory or contact your hoster"
            );
            wp_redirect( '/' );
            die();
        }
    
        fputcsv($open, $csvarray);
        fclose($open);

        wp_redirect( "/" );
        die();
    }
?>