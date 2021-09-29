<?php
/*
Plugin Name: Réservation
Description: Optimum Plugin
Author: HNE Saiqe
Version: 1.0
Author URI: http://mon-siteweb.com/
*/
// First step: Create the database

function reservation_database() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'reservations';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		first_name varchar(55) NOT NULL,
		last_name varchar(55) NOT NULL,
		phone VARCHAR(20) NOT NULL,
		age mediumint(6) NOT NULL,
		cours VARCHAR(100) NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	add_option('reservation_db_version', '1.0');
}

register_activation_hook(__FILE__, 'reservation_database');

// Second step: Create default data

// function reservation_default_data() {
// 	global $wpdb;
	
// 	$table_name = $wpdb->prefix . 'reservations';
	
// 	$wpdb->insert( 
// 		$table_name,
// 		array( 
// 			'first_name' => 'Saiqe',
// 			'last_name' => 'Hne',
// 			'phone' => '988776',
// 			'age' => '12',
// 			// 'cours' => '',

// 		) 
// 	);
// }

// register_activation_hook(__FILE__, 'reservation_default_data');

// Third step: Add plugin to admin

function add_plugin_to_admin() {
	function reservation_content() {
		echo "<h1>Reservations</h1>";
		echo "<div style='margin-right:20px'>";

		if(class_exists('WP_List_Table')) {
			require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
			require_once(plugin_dir_path( __FILE__ ) . 'reservation-list-table.php');
			$reservationListTable = new ReservationListTable();
			$reservationListTable -> prepare_items();
			$reservationListTable -> display();
		} else {
			echo "WP_List_Table n'est pas disponible.";
		}
		
		echo "</div>";
	}

	add_menu_page('Reservations', 'Reservations', 'manage_options', 'reservation-plugin', 'reservation_content');
}

add_action('admin_menu', 'add_plugin_to_admin');

// Fourth step: Create the form

function reservation_form() {
	ob_start();

	if (isset($_POST['reservations'])) {
		$first_name = sanitize_text_field($_POST["first_name"]);
		$last_name = sanitize_text_field($_POST["last_name"]);
		$phone = sanitize_text_field($_POST["phone"]);
		$age = esc_textarea($_POST["age"]);
		$cours = sanitize_text_field($_POST["cours-id"]);

		if ($first_name != '' && $last_name != '' && $phone  != '' && $age  != '' && $cours  != '') {
			global $wpdb;

			$table_name = $wpdb->prefix . 'reservations';
	
			$wpdb->insert( 
				$table_name,
				array( 
					'first_name' => $first_name,
					'last_name' => $last_name,
					'phone' => $phone,
					'age' => $age,
					'cours' => $cours,
				) 
			);

			echo "<h4>Merci! Vous êtes inscrit à ce cours.</h4>";
		}
	}
// var_dump($_GET);
	echo "<form class='col-8 mx-auto' method='POST'>";
	echo "<h5> <strong>Inscription au:</strong> ".get_the_title()." </h5>";
	echo"<div class='input-group mb-3'>";
	echo"<span class='input-group-text'>Prénom</span>";
	echo"<input class='form-control' type='text' name='first_name' placeholder='Prénom' required>";
	echo"</div>";
	echo"<div class='input-group mb-3'>";
	echo "<input class='form-control'  type='text' name='last_name' placeholder='Nom de famille' required>";
	echo"<span class='input-group-text'>Nom</span>";
	echo"</div>";
	echo"<div class='input-group mb-3'>";
	echo"<span class='input-group-text'>Téléphone</span>";
	echo "<input class='form-control'  type='tel' name='phone' placeholder='' required>";
	echo"</div>";
	echo"<div class='input-group mb-3'>";
	echo "<input class='form-control'  name='age' placeholder='Âge' required>";
	echo"<span class='input-group-text'>Âge</span>";
	echo"</div>";
	echo "<input class='form-control'  type='hidden' name='cours-id' value='" .get_the_title(). "' required>";
	echo "<button class='btn btn-light' type='submit' name='reservations' value='Envoyez'>Envoyez</button>";
	echo "</form>";
	// var_dump(get_the_title());
	// var_dump($_POST);
	return ob_get_clean();
}
// var_dump($_GET);
add_shortcode('reservations', 'reservation_form');