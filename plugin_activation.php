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
            'placeholder_name' => 'Your name',
            'placeholder_surname' => 'Your surname',
            'placeholder_email' => 'Your email adress',
            'placeholder_message' => 'Your message',
            'csv_time' => 'Time',
            'csv_name' => 'Name',
            'csv_surname' => 'Surname',
            'csv_email' => 'Email',
            'csv_message' => 'Message'
        ));
    }
?>