<?php get_header(); ?>

<section id="content" role="main">
	
	<div class="page-top"></div>
	
	<div class="container">	
	
		<div class="team-info">
			<?php $featured_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
			<img class="team-photo" src="<?php echo $featured_img_url ?>" alt="<?php the_title() ?>">
			<div class="team-bio">
				<?php $term_list = wp_get_post_terms($post->ID, 'team_group', array("fields" => "all")); 
				foreach($term_list as $term_single) {
				    $group = $term_single->name; 
				} ?>
				<p class="meta"><?php echo $group ?> Team</p>
				<?php the_field('team_bio'); ?>
				<div class="team-links">
					<?php if(get_field('team_email') ): ?>
						<a class="button" href="mailto:<?php the_field('team_email'); ?>" aria-label="Email"><span class="fas fa-envelope"></span>Email</a>
					<?php endif; ?>
					<?php if(get_field('team_linkedin') ): ?>
						<a class="button" href="<?php the_field('team_linkedin'); ?>" aria-label="LinkedIn Profile" target="_blank" rel="noopener"><span class="fab fa-linkedin"></span>LinkedIn</a>
					<?php endif; ?>
					<?php if(get_field('team_phone') ): ?>
						<a class="button phone-button" href="tel:+<?php the_field('team_phone'); ?>" aria-label="Phone"><span class="fas fa-phone"></span>Phone</a>
						<div class="phone-desktop"><span class="fas fa-phone"></span><?php the_field('team_phone'); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div class="team-related">
			
			<h2 class="section-title">Related Media</h2>
			
			<div class="row">
			
			<?php 

			$posts = get_field('related_media');
			
			if( $posts ): ?>
			    
			    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			        <?php setup_postdata($post); ?>
			        <div class="col-md-4">
				        
				        <a class="related-link" href="<?php the_permalink(); ?>">
				        <div class="team-related-wrapper">
			            
				            <?php $success_story = get_field('success_story'); ?>
							<?php $event = get_field('event_info'); ?>
							<?php $blog = get_field('post_content'); ?>
							<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
								
							<?php if ($success_story['hero_image']): ?>
								<div class="image" style="background-image:url(<?php echo $success_story['hero_image']['sizes']['medium'] ?>)"></div>
								
							<?php elseif ($event['hero_image']): ?>
								<div class="image" style="background-image:url(<?php echo $event['hero_image']['sizes']['medium'] ?>)"></div>
							
							<?php elseif ( has_post_thumbnail() ) : ?>
								<div class="image" style="background-image: url(<?php echo $featured_img_url ?>)"></div>
								
							<?php endif; ?>
							
							<?php 
							$post_type = get_post_type( get_the_ID() ); 
							$obj = get_post_type_object($post_type); 
							$term_list = wp_get_post_terms(get_the_ID(), 'knowledge_type', array("fields" => "slugs")); ?>
							<div class="post-type">
								<?php echo ($term_list ? $term_list[0] : $obj->labels->singular_name); ?>
							</div>
							
							<p class="title"><?php the_title(); ?></p>
						
				        </div>
				        </a>
			            
			            
			        </div>
			    <?php endforeach; ?>
			    
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
			
			</div>
			
		</div>
		
		<div class="team-related events">
		
		<?php 	
			$today = date( 'Ymd' );
			$events = get_posts(array(
			'post_type' => 'events',
			'posts_per_page' => -1,
			'meta_key' => 'event_start_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'team_members',
					'value' => '"' . get_the_ID() . '"',
					'compare' => 'LIKE'
				),
				array(
		            'meta_key' => 'event_end_date',
		            'value' => $today,
		            'compare' => '>',
		            'type' => 'DATE'
		        )
			)
			
		));

		if( $events ): ?>
		
		<h2 class="section-title">See <?php the_title(); ?> at these upcoming events:</h2>
		
		<div class="events-list row">
			<?php foreach( $events as $post ): setup_postdata($post); ?>
	
				<div class="col-md-4">
					
					<div class="grid-item-wrapper fadeIn" data-scroll> 
				        
				        <div class="event">
				            
				            <?php $event = get_field('event_info'); ?> 
				            <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');  ?>
				            <?php if($featured_img_url): ?>
				            	<!--<div class="event-logo"><img src="<?php echo $featured_img_url; ?>" /></div>-->
				            	<div class="event-logo" style="background-image: url(<?php echo $featured_img_url; ?>)"></div>
							<?php endif; ?>
							
				            <h3 class="event-name"><?php the_title(); ?></h3>
				            <p class="event-date"><?php echo $event['event_date'] ?></p>
				            <p class="event-location"><?php echo $event['event_location'] ?></p>
			                <!--<p class="event-summary"><?php echo $event['event_summary'] ?></p>-->
			                <a class="button" href="<?php the_permalink(); ?>" aria-label="REDCOM Event - <?php the_title(); ?>">Learn More</a>
			                
			            </div>
				        		 
				    </div>		
		
				</div>
			<?php endforeach; wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>

		</div>
			
			
			
			
			
		<?php	
			
			/*
$events = get_field('related_events');
		if( $events ): ?>
		
		<div class="team-related events">
			
			<h2 class="section-title"><?php the_field('related_events_title'); ?></h2>
			
			<div class="row">
			    
			    <?php foreach( $events as $post): // variable must be called $post (IMPORTANT) ?>
			        <?php setup_postdata($post); ?>
			        
			        <?php $end = get_field('event_end_date'); ?>
			        <?php $today = date('Ymd'); ?>
			        
			        <?php if($today < $end): ?>
			        
				        <div class="col-md-4">
					        
					        <a class="related-link" href="<?php the_permalink(); ?>">
					        <div class="team-related-wrapper">
				            
								<?php $event = get_field('event_info'); ?>
								<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
									
															
								<?php if ($event['hero_image']): ?>
									<div class="image" style="background-image:url(<?php echo $event['hero_image']['sizes']['medium'] ?>)"></div>
								
								<?php elseif ( has_post_thumbnail() ) : ?>
									<div class="image" style="background-image: url(<?php echo $featured_img_url ?>)"></div>
									
								<?php endif; ?>
								
								<?php 
								$post_type = get_post_type( get_the_ID() ); 
								$obj = get_post_type_object($post_type); 
								$term_list = wp_get_post_terms(get_the_ID(), 'knowledge_type', array("fields" => "slugs")); ?>
								<div class="post-type">
									<?php echo ($term_list ? $term_list[0] : $obj->labels->singular_name); ?>
								</div>
								
								<p class="title"><?php the_title(); ?></p>
								<p class="event-date"><?php echo $event['event_date'] ?></p>
								<p class="event-location"><?php echo $event['event_location'] ?></p>
								
								Today: <?php echo $today ?><br>
								End Date: <?php echo $end ?>
							
					        </div>
					        </a>  
				            
				        </div>
			        
			        <?php endif; ?>
			        
			    <?php endforeach; ?>
			    
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			
			</div>
			
		</div>
		<?php endif;
*/ ?>
    
	</div>
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>