<div class="container blog">
	<h3 class="grid-title fadeIn" data-scroll><?php the_sub_field('section_title') ?></h3>
	<div class="row grid">
	
	<?php
    $blog = new WP_Query( array(
        'post_type' => 'post',
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
     
    if( $blog->have_posts() ) { ?>
    	<div class="blog">
	    	<?php while ( $blog->have_posts() ) { $blog->the_post(); ?>
    		<?php $img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
	    		<div class="col-md-4 grid-item">
		            <div class="grid-item-wrapper slideInUp" data-scroll> 
			            <div class="feat-img" style="background-image: url(<?php echo $img_url; ?>)"></div>
			            <div class="content">
				            <p class="date"><?php the_date(); ?></p>
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