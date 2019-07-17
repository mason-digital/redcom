<?php
	
	add_action('wp_enqueue_scripts', 'redcom_styles');
	function redcom_styles()
	{
	    //wp_enqueue_style('name', get_template_directory_uri().'/css/name.css', false, '1.0', 'all' );
        //wp_enqueue_style('name');
       
		// Bootstrap CSS
        wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', false, '4.1.3', 'all' );
        wp_enqueue_style('bootstrap');
        
        // Fancybox CSS
        wp_register_style('fancybox', get_template_directory_uri().'/css/jquery.fancybox.min.css', false, '3.3.5', 'all' );
        wp_enqueue_style('fancybox');

        
        // Slick CSS
        wp_register_style('slick', get_template_directory_uri().'/css/slick.css', false, '1.8.1', 'all' );
        wp_enqueue_style('slick');
        
        // Slick Theme CSS
        wp_register_style('slick-theme', get_template_directory_uri().'/css/slick-theme.css', false, '1.8.1', 'all' );
        wp_enqueue_style('slick-theme');
        
        // Main Compiled Style Sheet
        wp_register_style('style', get_template_directory_uri().'/css/style.css', false, time(), 'all' );
        wp_enqueue_style('style');
	}
	
	add_action('wp_enqueue_scripts', 'redcom_load_scripts');
	function redcom_load_scripts()
	{
		wp_enqueue_script( 'jquery' );
		//Uncomment below to use a custom version of jQuery
		/*
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri().'/js/jquery-1.12.4.min.js', false, '1.12.4', true);
		wp_enqueue_script('jquery');
		*/
		
		// Parallax JS
		wp_register_script('parallax', get_template_directory_uri().'/js/parallax.min.js', false, '1.5.0', true);
	    wp_enqueue_script('parallax');
		
		// Isotope JS
		wp_register_script('isotope', get_template_directory_uri().'/js/isotope.min.js', false, '4.1.3', true);
	    wp_enqueue_script('isotope');
		
		// Bootstrap JS
		wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', false, '4.1.3', true);
	    wp_enqueue_script('bootstrap');
	    
	    // Fancybox JS
		wp_register_script('fancybox', get_template_directory_uri().'/js/jquery.fancybox.min.js', false, '3.3.5', true);
	    wp_enqueue_script('fancybox');
	    
	    // Slick JS
		wp_register_script('slick', get_template_directory_uri().'/js/slick.min.js', false, '1.8.1', true);
	    wp_enqueue_script('slick');
		
		// ScrollTrigger JS
		wp_register_script('scrollTrigger', get_template_directory_uri().'/js/scrollTrigger.js', false, '1.0', true);
	    wp_enqueue_script('scrollTrigger');
	    
	    // Cookie JS
		wp_register_script('cookieJS', get_template_directory_uri().'/js/jquery.cookie.js', false, '1.4.1', true);
	    wp_enqueue_script('cookieJS');

				
		// Custom Script
	    wp_register_script('custom', get_template_directory_uri().'/js/script.js', time(), '1.3.9', true);
	    wp_enqueue_script('custom');
	
	 }