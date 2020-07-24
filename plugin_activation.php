<?php
    //default values are declared by activating the plugin
    function activation(){
        add_option( 'csvcontact', array(
            'email_adress_to_send_to' => get_option( 'admin_email', ''),
            'label_name' => 'Name',
            'label_surname' => 'Surname',
            'label_email' => 'Email',
            'label_message' => 'Message',
            'placeholder_name' => 'Your name',
            'placeholder_surname' => 'Your surname',
            'placeholder_email' => 'Your email adress',
            'placeholder_message' => 'Your message',
            'text_button' => 'Submit' 
        ));
    }
?>