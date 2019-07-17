<?php
	
	remove_action('wp_head', 'wp_generator');
	function redcom_remove_version() {
	return '';
	}
	add_filter('the_generator', 'redcom_remove_version');