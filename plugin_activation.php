<?php
    //default values are declared by activating the plugin
    function activation(){
        add_option( 'csvcontact', array(
            'email_adress_to_send_to' => get_option( 'admin_email', ''),
            'text_button' => 'Submit',
            'timezone' => 2,
            'label_name' => 'Name',
            'label_surname' => 'Surname',
            'label_email' => 'Email',
            'label_message' => 'Message',
            'label_adress' => 'Adress',
            'label_beds' => 'Number of beds',
            'label_company' => 'Company',
            'label_arrival' => 'Arrival',
            'label_departure' => 'Departure',
            'label_sector' => 'Sector',
            'label_telephone' => 'Telephone',
            'placeholder_name' => 'Your name',
            'placeholder_surname' => 'Your surname',
            'placeholder_email' => 'Your email adress',
            'placeholder_message' => 'Your message',
            'placeholder_adress' => 'Street, Town',
            'placeholder_beds' => 'Number of beds you want',
            'placeholer_company' => 'Your company',
            'placeholder_sector' => 'The sector of your company',
            'placeholder_telephone' => 'e.g. 0123456789',
            'csv_time' => 'Time',
            'csv_name' => 'Name',
            'csv_surname' => 'Surname',
            'csv_company' => 'Company',
            'csv_adress' => 'Adress',
            'csv_email' => 'Email',
            'csv_telephone' => 'Telephone',
            'csv_sector' => 'Sector',
            'csv_arrival' => 'Arrival',
            'csv_departure' => 'Departure',
            'csv_beds' => 'Beds',
            'csv_message' => 'Message'
        ));
    }
?>