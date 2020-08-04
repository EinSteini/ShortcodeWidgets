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
	
	add_settings_field( 
		'redirect_page', 
		__( 'Redirect Page after submit', 'Shortcode_Widgets' ), 
		'redirect_page_render', 
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

	add_settings_field( 
		'label_adress', 
		__( 'Label for "Adress"', 'Shortcode_Widgets' ), 
		'label_adress_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_field( 
		'label_beds', 
		__( 'Label for "Beds"', 'Shortcode_Widgets' ), 
		'label_beds_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_field( 
		'label_company', 
		__( 'Label for "Company"', 'Shortcode_Widgets' ), 
		'label_company_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_field( 
		'label_arrival', 
		__( 'Label for "Arrival"', 'Shortcode_Widgets' ), 
		'label_arrival_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_field( 
		'label_departure', 
		__( 'Label for "Departure"', 'Shortcode_Widgets' ), 
		'label_departure_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_field( 
		'label_sector', 
		__( 'Label for "Sector"', 'Shortcode_Widgets' ), 
		'label_sector_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_labels'
	);

	add_settings_field( 
		'label_telephone', 
		__( 'Label for "Telephone"', 'Shortcode_Widgets' ), 
		'label_telephone_render', 
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

	add_settings_field( 
		'placeholder_adress', 
		__( 'Placeholder for "Adress"', 'Shortcode_Widgets' ), 
		'placeholder_adress_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_placeholders' 
	);
	
	add_settings_field( 
		'placeholder_beds', 
		__( 'Placeholder for "Beds"', 'Shortcode_Widgets' ), 
		'placeholder_beds_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_placeholders' 
	);

	add_settings_field( 
		'placeholder_company', 
		__( 'Placeholder for "Company"', 'Shortcode_Widgets' ), 
		'placeholder_company_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_placeholders' 
	);

	add_settings_field( 
		'placeholder_sector', 
		__( 'Placeholder for "Sector"', 'Shortcode_Widgets' ), 
		'placeholder_sector_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_placeholders' 
	);

	add_settings_field( 
		'placeholder_telephone', 
		__( 'Placeholder for "Telephone"', 'Shortcode_Widgets' ), 
		'placeholder_telephone_render', 
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
		'csv_company', 
		__( 'Title for "Company"', 'Shortcode_Widgets' ), 
		'csv_company_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_adress', 
		__( 'Title for "Adress"', 'Shortcode_Widgets' ), 
		'csv_adress_render', 
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
		'csv_telephone', 
		__( 'Title for "Telephone"', 'Shortcode_Widgets' ), 
		'csv_telephone_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_sector', 
		__( 'Title for "Sector"', 'Shortcode_Widgets' ), 
		'csv_sector_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_arrival', 
		__( 'Title for "Arrival"', 'Shortcode_Widgets' ), 
		'csv_arrival_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_departure', 
		__( 'Title for "Departure"', 'Shortcode_Widgets' ), 
		'csv_departure_render', 
		'csvcontact', 
		'shortcode_widgets_csvcontact_csv' 
	);

	add_settings_field( 
		'csv_beds', 
		__( 'Title for "Beds"', 'Shortcode_Widgets' ), 
		'csv_beds_render', 
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

function redirect_page_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[redirect_page]' value='<?php echo $options['redirect_page']; ?>' aria-describedby='description_redirect'>
	<small name='description_redirect'>The page the user will be redirected to after submitting the form. Please only enter sub-directories (e.g. example.com/example -> /example).</small>
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

function label_adress_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_adress]' value='<?php echo $options['label_adress']; ?>'>
	<?php

}

function label_beds_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_beds]' value='<?php echo $options['label_beds']; ?>'>
	<?php

}

function label_company_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_company]' value='<?php echo $options['label_company']; ?>'>
	<?php

}

function label_arrival_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_arrival]' value='<?php echo $options['label_arrival']; ?>'>
	<?php

}

function label_departure_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_departure]' value='<?php echo $options['label_departure']; ?>'>
	<?php

}

function label_sector_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_sector]' value='<?php echo $options['label_sector']; ?>'>
	<?php

}

function label_telephone_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[label_telephone]' value='<?php echo $options['label_telephone']; ?>'>
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

function placeholder_adress_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_adress]' value='<?php echo $options['placeholder_adress']; ?>'>
	<?php

}

function placeholder_beds_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_beds]' value='<?php echo $options['placeholder_beds']; ?>'>
	<?php

}

function placeholder_company_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_company]' value='<?php echo $options['placeholder_company']; ?>'>
	<?php

}

function placeholder_sector_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_sector]' value='<?php echo $options['placeholder_sector']; ?>'>
	<?php

}

function placeholder_telephone_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[placeholder_telephone]' value='<?php echo $options['placeholder_telephone']; ?>'>
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
function csv_adress_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_adress]' value='<?php echo $options['csv_adress']; ?>'>
	<?php

}
function csv_beds_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_beds]' value='<?php echo $options['csv_beds']; ?>'>
	<?php

}
function csv_company_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_company]' value='<?php echo $options['csv_company']; ?>'>
	<?php

}
function csv_arrival_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_arrival]' value='<?php echo $options['csv_arrival']; ?>'>
	<?php

}
function csv_departure_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_departure]' value='<?php echo $options['csv_departure']; ?>'>
	<?php

}
function csv_sector_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_sector]' value='<?php echo $options['csv_sector']; ?>'>
	<?php

}
function csv_telephone_render(  ) { 

	$options = get_option( 'csvcontact' );
	?>
	<input type='text' name='csvcontact[csv_telephone]' value='<?php echo $options['csv_telephone']; ?>'>
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
