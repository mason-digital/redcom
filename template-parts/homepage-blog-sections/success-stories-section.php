<div class="container success-stories">
	<h3 class="grid-title fadeIn" data-scroll><?php the_sub_field('section_title') ?></h3>
	<div class="row grid">
	
	<?php
    $stories = new WP_Query( array(
        'post_type' => 'success_stories',
        'post_status' => 'publish',
        'meta_query' => array(
		    'relation' => 'OR',
		    array(
				'key' => 'featured_post',
				'compare' => '=',
				'value' => '1'
			),
		    array(
				'key' => 'featured_post',
				'compare' => '=',
				'value' => '0'
			)
		),
		'orderby'  => array( 'meta_value' => 'DESC', 'date' => 'DESC' ),
	    'posts_per_page' => 3,
	    //'offset' => 1		 
    ));
     
    if( $stories->have_posts() ) { ?>
    	<div class="blog">
	    	<?php while ( $stories->have_posts() ) { $stories->the_post(); ?>
	    	
    		<?php $img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
    		<?php $success_story = get_field('success_story'); ?>
    		<?php $term = wp_get_post_terms($post->ID, 'success_markets', array("fields" => "names")); ?>
    		
	    		<div class="col-md-4 grid-item">
		            <div class="grid-item-wrapper slideInUp" data-scroll> 
			            <div class="feat-img" style="background-image: <?php if ($success_story['hero_image']): ?>url(<?php echo $success_story['hero_image']['url']; ?>)<?php else: ?>url('/wp-content/uploads/2018/11/REDCOM_placeholder-logo.png');<?php endif; ?>"></div>
			            <div class="content">
				            <div class="meta"><?php echo $term[0]; ?></div>
				            <p class="title"><?php the_title(); ?></p>
				            <a class="button" href="<?php the_permalink(); ?>">Read More</a>
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