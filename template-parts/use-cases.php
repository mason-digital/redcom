<section id="success-stories" role="complementary">
	
	<div class="container">
		
		<? // THE BUTTON FILTERS ?>
		<div class="filters buttons">
			
			<!--
			<div class="button-group">
				<div class="label">Search:</div><input type="text" id="quicksearch" placeholder="SEARCH" />
			</div>
			-->
			
			<div class="success-stories-market button-group filter-button-group" data-filter-group="market">
				<div class="label">Market:</div>
				<div class="flex-buttons">
					<button class="button is-checked" data-filter="*">All</button>
					<?php
					$terms1 = get_terms( 'success_markets' );
					if ( ! empty( $terms1 ) && ! is_wp_error( $terms1 ) ){
					    foreach ( $terms1 as $term1 ) {
					        echo '<button class="button" data-filter=".' . $term1->slug . '">' . $term1->name . '</button>';
					    }
					}	
					?>
				</div>
			</div>
						
		</div>
		
		<? // THE SELECT FILTERS (MOBILE) ?>
		<div class="filters selects row">
				
			<div class="success-stories-market select-group col-md-4 col-lg-3">
				<div class="label">Market:</div>
				<select class="filters-select">
					<option value="*">All Markets</option>
				<?php
				$terms2 = get_terms( 'success_markets' );
				if ( ! empty( $terms2 ) && ! is_wp_error( $terms2 ) ){
				    foreach ( $terms2 as $term2 ) {
				        echo '<option value=".' . $term2->slug . '">' . $term2->name . '</option>';
				    }
				}	
				?>
				</select>
			</div>	
			
		</div>
		
		<? // THE GRID ?>
		
		<div class="row grid">
			
		<?php
			$args = array (
		        'post_type' => 'use_cases',
		        'meta_query' => array(
				    'relation' => 'OR',
					    array(
							'key' => 'featured_post',
							'compare' => '==',
							'value' => '1'
						),
					    array(
							'key' => 'featured_post',
							'compare' => '==',
							'value' => '0'
						)
				    ),
				'orderby'  => array( 'meta_value' => 'DESC', 'date' => 'DESC' ),
		        'posts_per_page' => -1
		    );
		
		    $use_cases = new WP_Query( $args );
		
		    if ( $use_cases->have_posts() ): ?>
		    
		        <?php while ( $use_cases->have_posts() ): ?>
		        <?php $use_cases->the_post(); ?>
		        <?php $use_case = get_field('success_story'); ?>
		        
		        <?php $term_list1 = wp_get_post_terms($post->ID, 'success_markets', array("fields" => "slugs")); ?>
			    	
		        <div class="col-12 col-md-6 col-lg-4 col-xl-3 grid-item <?php echo $term_list1[0]; ?>">
			        
			        <a class="grid-link fadeIn" href="<?php the_permalink(); ?>" aria-label="<?php echo the_title(); ?>" data-scroll>
				        	
				        	<?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium'); ?>
						    <div class="image" style="background-image: <?php if ($use_case['hero_image']): ?>url(<?php echo $use_case['hero_image']['url']; ?>)<?php else: ?>url('/wp-content/uploads/2018/11/REDCOM_placeholder-logo.png');<?php endif; ?>"></div>
				        	<div class="meta"><?php echo $term_list1[0]; ?></div>
				        	<h3 class="title"><?php the_title(); ?></h3>
				        	<p class="summary"><?php echo $use_case['summary']; ?></p>
			        		 
			       </a>
			        	    	
		    	</div>
		    	
		    	<?php endwhile; ?>
		    <?php endif; ?>
		    <?php wp_reset_postdata(); ?>
 	    
 	    </div>
		
	</div>
		
</section>