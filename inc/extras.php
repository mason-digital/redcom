<?php
	
	$layoutID=1;
	
	function acf_layout_in_content( $content ) {
				
		$layouts = [];
	 
	    if( have_rows('page_content') && in_the_loop() ):
		
		    while ( have_rows('page_content') ) : the_row();
		    	
		    	$layoutID++;
		    	
				$layout = get_row_layout();
    			
    			set_query_var( 'layoutID', $layoutID ); ?>
    			
    			<section id="<?php echo $layout; ?>_<?php echo $layoutID; ?>" class="content-section content-type-<?php echo $layout; ?>">
    		
    				<?php get_template_part('template-parts/page-content/layout', $layout ); ?>
    			
    			</section>
		    			
    			<?php 
		
		    endwhile;
		
		endif;
			    
	    return $content;
	}
	
	add_filter( 'the_content', 'acf_layout_in_content' );


	
// Move YOAST box to bottom of page
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


// Add ACF "Options" page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


// Register Menus
register_nav_menus( array(  
	'footer-menu' => __( 'Footer Menu', 'redcom' ),
	'footer-bottom' => __( 'Footer Bottom Menu', 'redcom' ),
	'portals-menu' => __( 'Portals Menu', 'redcom' )
) );


// Remove Rev Slider Meta box from pages
function remove_revslider_metabox($post_type)
{
    add_action('do_meta_boxes', function () use ($post_type) {
        remove_meta_box('mymetabox_revslider_0', $post_type, 'normal');
    });
}
add_action('registered_post_type', 'remove_revslider_metabox');


// Wrap Div around embeded videos
add_filter( 'embed_oembed_html', 'tdd_oembed_filter', 10, 4 ) ; 
function tdd_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="embed-container">'.$html.'</div>';
    return $return;
}


// Pagination
function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
// Numbered Pagination
if ( !function_exists( 'redcom_pagination' ) ) {
	
	function redcom_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}



/*
Checks for a yoast primary category, if it exists move the category to the first position in the $categories array.
*/
function yoast_primary_cat_as_first_cat($categories) {
    
    // Check if yoast exists and get the primary category
    if ($categories && class_exists('WPSEO_Primary_Term') ) {

        // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
        $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
        $term = get_term( $wpseo_primary_term );
    
        // If no error is returned, get primary yoast term 
        $primary_cat_term_id = (!is_wp_error($term)) ? $term->term_id : null;

        // Loop all categories
        if($primary_cat_term_id !== null) {
            foreach ($categories as $i => $category) {

                // Move the primary category to the top of the array
                if($category->term_id === $primary_cat_term_id) {

                    $out = array_splice($categories, $i, 1);
                    array_splice($categories, 0, 0, $out);

                    break;
                }
            }
        }
    } 
    
    return $categories;
}
add_filter( 'get_the_categories', 'yoast_primary_cat_as_first_cat' );

	
	