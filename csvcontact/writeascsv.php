<?php
    function write_to_csv(){

        $option = get_option( 'csvcontact' );
        $date = getdate(time()+$option['timezone']*3600);

        $titlearray = array(
            $option['csv_time'],
            $option['csv_name'],
            $option['csv_surname'],
            $option['csv_company'],
            $option['csv_adress'],
            $option['csv_email'],
            $option['csv_telephone'],
            $option['csv_sector'],
            $option['csv_arrival'],
            $option['csv_departure'],
            $option['csv_beds'],
            $option['csv_message']
            
        );
    
        $csvarray = array(
            $date["mday"].".".$date["mon"].".".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"],
            str_replace(";","",htmlspecialchars($_POST["csvname"])),
            str_replace(";","",htmlspecialchars($_POST["csvsurname"])),
            str_replace(";","",htmlspecialchars($_POST["csvcompany"])),
            str_replace(";","",htmlspecialchars($_POST["csvadress"])),
            str_replace(";","",htmlspecialchars($_POST["csvemail"])),
            str_replace(";","",htmlspecialchars($_POST["csvtelephone"])),
            str_replace(";","",htmlspecialchars($_POST["csvsector"])),
            str_replace(";","",htmlspecialchars($_POST["csvarrival"])),
            str_replace(";","",htmlspecialchars($_POST["csvdeparture"])),
            str_replace(";","",htmlspecialchars($_POST["csvbeds"])),
            str_replace(";","",htmlspecialchars($_POST["csvmessage"]))
        );

        $file = plugin_dir_path( __FILE__ ).'csv/'.$date['year'].'_'.$date['mon'].'_'.$date['mday'].'.csv';

        if(!(file_exists($file))){

            $pathsold = array();
            $filesold = glob(plugin_dir_path( __FILE__ ).'csv/*.csv');
            foreach($filesold as $filesoldname){
                if(is_file($filesoldname)){
                    array_push($pathsold, $filesoldname);
                    rename($filesoldname, str_replace('csv/', 'csv/old/', $filesoldname));
                }   
            }

            $subject = 'CSVContact ';
            foreach($pathsold as $filename){
                $subject .= str_replace(array(plugin_dir_path( __FILE__ ).'csv/','.csv'),'',$filename);
                $subject .= ' ';
            }

            $mail = wp_mail($option['email_adress_to_send_to'], $subject, 'Here is the file from the last day the form was submitted.',"",str_replace('csv/','csv/old/',$pathsold));

            $open = fopen($file, "a");
            fputcsv($open, $titlearray);

        }else{
            $open = fopen($file, "a");
        }

        if(!$open){
            wp_mail(
                $option['email_adress_to_send_to'],
                "Error while trying to write file by Plugin ShortcodeWidgets", 
                "Your CSVContact form couldn't write the submitted data to the server. Please check if your user has writing permissions on this directory or contact your hoster"
            );
            wp_redirect( $option['redirect_page'] );
            die();
        }
    
        fputcsv($open, $csvarray);
        fclose($open);

        wp_redirect( $option['redirect_page'] );
        die();
    }
?>