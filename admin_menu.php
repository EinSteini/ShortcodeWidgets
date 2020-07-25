<?php
add_action( 'admin_menu', 'shortcode_widgets_add_admin_menu' );
add_action( 'admin_init', 'shortcode_widgets_settings_init' );


function shortcode_widgets_add_admin_menu(  ) { 

	add_menu_page( 'Shortcode Widgets', 'Shortcode Widgets', 'manage_options', 'shortcode_widgets', 'shortcode_widgets_options_page','dashicons-hammer' );

}


function shortcode_widgets_settings_init(  ) { 

	register_setting( 'csvcontact', 'csvcontact' );

	add_settings_section(
		'shortcode_widgets_csvcontact_general', 
		__( 'General', 'Shortcode_Widgets' ), 
		'csvcontact_general_callback', 
		'csvcontact'
	);

	add_settings_field( 
		'email_adress_to_send_to', 
		__( 'Email Adress', 'Shortcode_Widgets' ), 
		'email_adress_to_send_to_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_general' 
	);

		
	add_settings_field( 
		'text_button', 
		__( 'Text of the Submit Button', 'Shortcode_Widgets' ), 
		'text_button_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_general' 
	);

	add_settings_field( 
		'timezone', 
		__( 'Timezone from GMT', 'Shortcode_Widgets' ), 
		'timezone_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_general' 
    );

	add_settings_section(
		'shortcode_widgets_csvcontact_labels', 
		__( 'Labels', 'Shortcode_Widgets' ), 
		'csvcontact_labels_callback', 
		'csvcontact'
	);

	add_settings_field( 
		'label_name', 
		__( 'Label for "Name"', 'Shortcode_Widgets' ), 
		'label_name_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels' 
	);

	add_settings_field( 
		'label_surname', 
		__( 'Label for "Surname"', 'Shortcode_Widgets' ), 
		'label_surname_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_field( 
		'label_email', 
		__( 'Label for "Email"', 'Shortcode_Widgets' ), 
		'label_email_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_field( 
		'label_message', 
		__( 'Label for "Message"', 'Shortcode_Widgets' ), 
		'label_message_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_section(
		'shortcode_widgets_csvcontact_placeholders', 
		__( 'Placeholders', 'Shortcode_Widgets' ), 
		'csvcontact_placeholders_callback', 
		'csvcontact'
	);

	add_settings_field( 
		'placeholder_name', 
		__( 'Placeholder for "Name"', 'Shortcode_Widgets' ), 
		'placeholder_name_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_placeholders' 
	);

	add_settings_field( 
		'placeholder_surname', 
		__( 'Placeholder for "Surname"', 'Shortcode_Widgets' ), 
		'placeholder_surname_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_placeholders' 
    );
    
    add_settings_field( 
		'placeholder_email', 
		__( 'Placeholder for "Email"', 'Shortcode_Widgets' ), 
		'placeholder_email_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_placeholders' 
    );
    
    add_settings_field( 
		'placeholder_message', 
		__( 'Placeholder for "Message"', 'Shortcode_Widgets' ), 
		'placeholder_message_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_placeholders' 
	);

	add_settings_section(
		'shortcode_widgets_csvcontact_csv', 
		__( 'CSV File Settings', 'Shortcode_Widgets' ), 
		'csvcontact_csv_callback', 
		'csvcontact'
	);

    add_settings_field( 
		'csv_time', 
		__( 'Title for "Time"', 'Shortcode_Widgets' ), 
		'csv_time_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_name', 
		__( 'Title for "Name"', 'Shortcode_Widgets' ), 
		'csv_name_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_surname', 
		__( 'Title for "Surname"', 'Shortcode_Widgets' ), 
		'csv_surname_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_email', 
		__( 'Title for "Email"', 'Shortcode_Widgets' ), 
		'csv_email_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_message', 
		__( 'Title for "Message"', 'Shortcode_Widgets' ), 
		'csv_message_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);
}

function email_adress_to_send_to_render(  ) { 

	$options = get_option( 'csvcontact');
	?>
    <input type='email' name='csvcontact[email_adress_to_send_to]' value='<?php echo $options['email_adress_to_send_to']; ?>' aria-describedby='adress_help'>
    <small id="adress_help">Enter here the email adress you want the csv files to be sent to</small>
	<?php

}

function text_button_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[text_button]' value='<?php echo $options['text_button']; ?>'>
	<?php

}

function timezone_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	GMT (+/-) <input type='number' name='csvcontact[timezone]' value='<?php echo $options['timezone']; ?>'>
	<?php

}


function label_name_render(  ) { 

	$options = get_option( 'csvcontact');
	?>
	<input type='text' name='csvcontact[label_name]' value='<?php echo $options['label_name']; ?>'>
	<?php

}


function label_surname_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_surname]' value='<?php echo $options['label_surname']; ?>'>
	<?php

}


function label_email_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_email]' value='<?php echo $options['label_email']; ?>'>
	<?php

}


function label_message_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_message]' value='<?php echo $options['label_message']; ?>'>
	<?php

}


function placeholder_name_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_name]' value='<?php echo $options['placeholder_name']; ?>'>
	<?php

}


function placeholder_surname_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_surname]' value='<?php echo $options['placeholder_surname']; ?>'>
	<?php
}

function placeholder_email_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_email]' value='<?php echo $options['placeholder_email']; ?>'>
	<?php

}

function placeholder_message_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_message]' value='<?php echo $options['placeholder_message']; ?>'>
	<?php

}

function csv_time_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_time]' value='<?php echo $options['csv_time']; ?>'>
	<?php

}

function csv_name_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_name]' value='<?php echo $options['csv_name']; ?>'>
	<?php

}

function csv_surname_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_surname]' value='<?php echo $options['csv_surname']; ?>'>
	<?php

}
function csv_email_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_email]' value='<?php echo $options['csv_email']; ?>'>
	<?php

}
function csv_message_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_message]' value='<?php echo $options['csv_message']; ?>'>
	<?php

}


function csvcontact_general_callback(  ) { 
	echo __( 'Change the settings for the CSVContact Widget', 'Shortcode_Widgets' );
}

function csvcontact_labels_callback(){
	echo __( 'Change the labels of the form', 'Shortcode_Widgest');
}

function csvcontact_placeholders_callback(){
	echo __( 'Change the placeholders of the form', 'Shortcode_Widgest');
}
function csvcontact_csv_callback(){
	echo __( 'Change the settings of the csv file. Note that the changes will only apply as soon as the next month occurs.', 'Shortcode_Widgest');
}

function shortcode_widgets_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h1>Shortcode Widgets</h1> <hr>
			<h2>CSVContact</h2>

			<?php
			settings_fields( 'csvcontact' );
			do_settings_sections( 'csvcontact' );
			submit_button();
			?>

		</form>
		<?php

}
