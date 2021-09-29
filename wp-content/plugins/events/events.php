<?php
/*
Plugin Name: Events
Description: Ceci est mon premier plugin événementiel
Author: HNE Saiqe
Version: 1.0
*/
// Add post type 'events'

function events_init() {
	$args = array(
		'labels' => array(
		'name' => __('Events'),
		'singular_name' => __('Event'),
		),
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'rewrite' => array("slug" => "events"), 
		'supports' => array('thumbnail', 'editor', 'title', 'excerpt', 'custom-fields', 'page-attributes')
		
	);

	register_post_type('events', $args);
}

add_action('init', 'events_init');

/****************************************************************************/

// Ajout meta box date

function add_event_date_meta_box() {

	function event_date($post) {
		wp_nonce_field(basename(__FILE__), "event-date-nonce");

		$date = get_post_meta($post->ID,'event_date', true);

		if (empty($date)) $date = the_date();
			echo '<input type="date" name="event_date" value="'.$date.'" />';
	}
	add_meta_box ('event_date_meta_boxes', 'Date', 'event_date', 'events', 'side', 'high');
}

add_action('add_meta_boxes', 'add_event_date_meta_box');

/****************************************************************************/

// Update meta on event post save

function events_post_save_meta($post_id) {
	if(isset($_POST['event_date']) && $_POST['event_date'] !== "") {
		    update_post_meta($post_id, 'event_date', $_POST['event_date']);
	    }
    }
    
    add_action('save_post', 'events_post_save_meta');

/****************************************************************************/

// Add event post type to home and main query

function add_event_post_type($query) {
	if (is_home() && $query->is_main_query()) {
		$query->set('post_type', array('post', 'events'));
		return $query;
	}
}

function show_event_date() {
	ob_start();
	$date = get_post_meta(get_the_ID(), 'event_date', true);
	echo "<date>$date</date>";
	return ob_get_clean();
}

add_shortcode('show_event_date', 'show_event_date');