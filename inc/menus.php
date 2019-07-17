<?php
	
	function redcom_setup()
	{
	    register_nav_menus(array(
	        'main-menu' => __('Main Menu', 'redcom')
	    ));
	}
	add_action('after_setup_theme', 'redcom_setup');