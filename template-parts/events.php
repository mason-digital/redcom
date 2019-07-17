<section id="events" role="complementary">
	
	<div class="container">
		
		<? // THE BUTTON FILTERS ?>
		<div class="filters buttons">
			
			<!--
			<div class="button-group">
				<div class="label">Search:</div><input type="text" id="quicksearch" placeholder="SEARCH" />
			</div>
			-->
			
			<div class="success-stories-market button-group filter-button-group" data-filter-group="region">
				<div class="label">Region:</div>
				<div class="flex-buttons">
					<button class="button is-checked" data-filter="*">All</button>
					<?php
					$terms1 = get_terms( 'event_regions' );
					if ( ! empty( $terms1 ) && ! is_wp_error( $terms1 ) ){
					    foreach ( $terms1 as $term1 ) {
					        echo '<button class="button" data-filter=".' . $term1->slug . '">' . $term1->name . '</button>';
					    }
					}	
					?>
				</div>
			</div>
			
			<div class="success-stories-market button-group filter-button-group" data-filter-group="market">
				<div class="label">Market:</div>
				<div class="flex-buttons">
					<button class="button is-checked" data-filter="*">All</button>
					<?php
					$terms2 = get_terms( 'events_markets' );
					if ( ! empty( $terms2 ) && ! is_wp_error( $terms2 ) ){
					    foreach ( $terms2 as $term2 ) {
					        echo '<button class="button" data-filter=".' . $term2->slug . '">' . $term2->name . '</button>';
					    }
					}	
					?>
				</div>
			</div>
						
		</div>
		
		<? // THE SELECT FILTERS (MOBILE) ?>
		<div class="filters selects row">
				
			<div class="success-stories-market select-group col-md-4 col-lg-3">
				<div class="label">Region:</div>
				<select class="filters-select">
					<option value="*">All Regions</option>
				<?php
				$terms3 = get_terms( 'event_regions' );
				if ( ! empty( $terms3 ) && ! is_wp_error( $terms3 ) ){
				    foreach ( $terms3 as $term3 ) {
				        echo '<option value=".' . $term3->slug . '">' . $term3->name . '</option>';
				    }
				}	
				?>
				</select>
			</div>	
			
			<div class="success-stories-market select-group col-md-4 col-lg-3">
				<div class="label">Market:</div>
				<select class="filters-select">
					<option value="*">All Markets</option>
				<?php
				$terms4 = get_terms( 'events_markets' );
				if ( ! empty( $terms4 ) && ! is_wp_error( $terms4 ) ){
				    foreach ( $terms4 as $term4 ) {
				        echo '<option value=".' . $term4->slug . '">' . $term4->name . '</option>';
				    }
				}	
				?>
				</select>
			</div>	
			
		</div>
		
		
		<? // THE GRID ?>
		
		<div class="events-box">
			<h2 class="title">Upcoming Events</h2>
		
			<div class="row grid">
				
			<?php
				$today = date( 'Ymd' );
				$args = array (
			        'post_type' => 'events',
			        'posts_per_page' => -1,
			        'meta_key' => 'event_start_date',
		            'orderby' => 'meta_value_num',
		            'order' => 'ASC',
			        'meta_query' => array(
				        array(
				            'meta_key' => 'event_end_date',
				            'value' => $today,
				            'compare' => '>',
				            'type' => 'DATE'
				        )
				    )
			    );
			
			    $events = new WP_Query( $args );
			
			    if ( $events->have_posts() ): ?>
			    
			        <?php while ( $events->have_posts() ): ?>
			        <?php $events->the_post(); ?>
			        
			        <?php $term_list1 = wp_get_post_terms($post->ID, 'event_regions', array("fields" => "slugs")); ?>
			        <?php $term_list2 = wp_get_post_terms($post->ID, 'events_markets', array("fields" => "slugs")); ?>
			        
			        <?php $event = get_field('event_info'); ?>
				    	
			        <div class="col-12 col-md-6 grid-item <?php echo $term_list1[0]; ?> <?php echo $term_list2[0]; ?>">
				        
				        <div class="grid-item-wrapper"> 
				        
				        	<div class="event">
				            
				            <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');  ?>
				            <?php if($featured_img_url): ?>
				            	<!--<div class="event-logo"><img src="<?php echo $featured_img_url; ?>" /></div>-->
				            	<div class="event-logo" style="background-image: url(<?php echo $featured_img_url; ?>)"></div>
							<?php endif; ?>
							
				            <h3 class="event-name"><?php the_title(); ?></h3>
				            <p class="event-date"><?php echo $event['event_date'] ?></p>
				            <p class="event-location"><?php echo $event['event_location'] ?></p>
			                <p class="event-summary"><?php echo $event['event_summary'] ?></p>
			                <a class="button" href="<?php the_permalink(); ?>" aria-label="REDCOM Event - <?php the_title(); ?>">Learn More</a>
			                
			            </div>
				        		 
				        </div>		    	
			    	</div>
			    	
			    	<?php endwhile; ?>
			    <?php endif; ?>
			    <?php wp_reset_postdata(); ?>
	 	    
	 	    </div>
		
		</div>
		
	</div>
		
</section>