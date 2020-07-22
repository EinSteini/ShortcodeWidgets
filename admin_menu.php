<?php

function admin_menu(){
    add_menu_page( 'Shortcode Widgets', 'Shortcode Widgets', 'manage_options', 'shortcode_widgets', 'admin_menu_page', 'dashicons-hammer', 69);
}

function admin_menu_page(){
    ?>
    <h1>Welcome to Shortcode Widgets!</h1>
    <p>On this page you can change the options for all widgets of this plugin</p>
    
    <form action='options.php' type='post'>

    <?php
        settings_field( 'csvcontact_settings' );
        do_settings_sections('shortcode_widgets');
        submit_button();
    ?>

    </form>

    <?php
}

function admin_menu_init(){
    register_setting( 'csvcontact_settings', 'send_email' );

    add_settings_section('general', 'General Settings', 'general_callback', 'shortcode_widgets');
    add_settings_field( 'general_settings','','general_callback','shortcode_widgets','general' );
}

function general_callback(){
    
}

?>