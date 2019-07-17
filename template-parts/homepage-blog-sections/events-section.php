<div class="container events">
	<h3 class="grid-title fadeIn" data-scroll><?php the_sub_field('section_title') ?></h3>
	<div class="row grid">
	
	<?php
		
	$today = date( 'Ymd' );
    $events = new WP_Query( array(
        'post_type' => 'events',
        'posts_per_page' => 3,
        'meta_key' => 'event_start_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
	        array(
	            'meta_key' => 'event_end_date',
	            'value' => $today,
	            'compare' => '>',
	            'type' => 'DATE',
	        )
		),	 
    ));
     
    if( $events->have_posts() ) { ?>
    	<div class="blog">
	    	<?php while ( $events->have_posts() ) { $events->the_post(); ?>
	    	
    		<?php $img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
    		<?php $event = get_field('event_info'); ?>
    		<?php $term1 = wp_get_post_terms($post->ID, 'event_regions', array("fields" => "names")); ?>
		    <?php $term2 = wp_get_post_terms($post->ID, 'events_markets', array("fields" => "names")); ?>
    		
	    		<div class="col-md-4 grid-item">
		            <div class="grid-item-wrapper slideInUp" data-scroll> 
			            <div class="feat-img event" style="background-image: url(<?php echo $img_url; ?>)"></div>
			            <div class="content">
				            <div class="meta"><?php echo $term2[0]; ?></div>
				            <p class="title event"><?php the_title(); ?></p>
				            <p class="date event"><?php echo $event['event_date'] ?></p>
				            <p class="location event"><?php echo $event['event_location'] ?></p>
				            <a class="button" href="<?php the_permalink(); ?>">Learn More</a>
			            </div>
		            </div>
	    		</div>
			<?php } ?>
		</div>
    <?php }
    else {} 
    wp_reset_postdata();
	?>	
	
	</div>
</div>