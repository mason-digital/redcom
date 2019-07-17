<section id="knowledge-center" role="complementary">
	
	<div class="container">
		
		<?php
		$args = array(
		'post_type' 		=> 'knowledge_center',
		'post_status' 		=> 'publish',
		'posts_per_page' 	=> -1,
		'order'             => 'ASC'
		);
		
		$knowledge_base = new WP_Query( $args );
		if( $knowledge_base->have_posts() ) :
		?>
		
		<div class="filters search">
			<div class="button-group">
				<div class="label">Search:</div><input type="text" id="quicksearch" placeholder="SEARCH" />
			</div>
		</div>
		
		<? // THE BUTTON FILTERS ?>
		<div class="filters buttons">
			
			<div class="knowledge-type button-group filter-button-group" data-filter-group="type">
				<div class="label">Type:</div>
				<div class="flex-buttons">
					<button class="button is-checked" data-filter="*">All</button>
					<?php
					$terms1 = get_terms( 'knowledge_type' );
					if ( ! empty( $terms1 ) && ! is_wp_error( $terms1 ) ){
					    foreach ( $terms1 as $term1 ) {
					        echo '<button class="button" data-filter=".' . $term1->slug . '">' . $term1->name . '</button>';
					    }
					}	
					?>
				</div>
			</div>
			
			<div class="knowledge-market button-group filter-button-group" data-filter-group="market">
				<div class="label">Market:</div>
				<div class="flex-buttons">
					<button class="button is-checked" data-filter="*">All</button>
					<?php
					$terms2 = get_terms( 'knowledge_market' );
					if ( ! empty( $terms2 ) && ! is_wp_error( $terms2 ) ){
					    foreach ( $terms2 as $term2 ) {
					        echo '<button class="button" data-filter=".' . $term2->slug . '">' . $term2->name . '</button>';
					    }
					}	
					?>
				</div>
			</div>
			
			<div class="knowledge-language button-group filter-button-group" data-filter-group="language">
				<div class="label">Language:</div>
				<div class="flex-buttons">
					<button class="button is-checked" data-filter="*">All</button>
					<?php
					$terms3 = get_terms( 'knowledge_language' );
					if ( ! empty( $terms3 ) && ! is_wp_error( $terms3 ) ){
					    foreach ( $terms3 as $term3 ) {
					        echo '<button class="button" data-filter=".' . $term3->slug . '">' . $term3->name . '</button>';
					    }
					}	
					?>
				</div>
			</div>
			
		</div>	
		
		<? // THE SELECT FILTERS (MOBILE) ?>
		<div class="filters selects row">
			<div class="button-group">
				<div class="label filter">Filter:</div>
			</div>
		
			<div class="knowledge-type select-group col-md-4 col-lg-3">
				<div class="label">Type:</div>
				<select class="filters-select">
					<option value="*">All Types</option>
				<?php
				$terms4 = get_terms( 'knowledge_type' );
				if ( ! empty( $terms4 ) && ! is_wp_error( $terms4 ) ){
				    foreach ( $terms4 as $term4 ) {
				        echo '<option class="option-style" value=".' . $term4->slug . '">' . $term4->name . '</option>';
				    }
				}	
				?>
				</select>
			</div>
				
			<div class="knowledge-market select-group col-md-4 col-lg-3">
				<div class="label">Market:</div>
				<select class="filters-select">
					<option value="*">All Markets</option>
				<?php
				$terms5 = get_terms( 'knowledge_market' );
				if ( ! empty( $terms5 ) && ! is_wp_error( $terms5 ) ){
				    foreach ( $terms5 as $term5 ) {
				        echo '<option value=".' . $term5->slug . '">' . $term5->name . '</option>';
				    }
				}	
				?>
				</select>
			</div>
			
			<div class="knowledge-market select-group col-md-4 col-lg-3">
				<div class="label">Language:</div>
				<select class="filters-select">
					<option value="*">All Languages</option>
				<?php
				$terms6 = get_terms( 'knowledge_language' );
				if ( ! empty( $terms6 ) && ! is_wp_error( $terms6 ) ){
				    foreach ( $terms6 as $term6 ) {
				        echo '<option value=".' . $term6->slug . '">' . $term6->name . '</option>';
				    }
				}	
				?>
				</select>
			</div>	
			
		</div>
		
		<? // THE GRID ?>
		<div class="row grid">
			<?php
			  while( $knowledge_base->have_posts() ) :
			    $knowledge_base->the_post();
			    
			    $file = get_field('pdf');
			    $term_list1 = wp_get_post_terms($post->ID, 'knowledge_type', array("fields" => "slugs"));
			    $term_list2 = wp_get_post_terms($post->ID, 'knowledge_market', array("fields" => "slugs"));
			    $term_list3 = wp_get_post_terms($post->ID, 'knowledge_language', array("fields" => "slugs"));
			    ?>
			    	
				        <div class="col-12 col-md-4 col-lg-3 grid-item <?php echo $term_list1[0]; ?> <?php echo $term_list2[0]; ?> <?php echo $term_list3[0]; ?>">
					        <a class="grid-link" href="<?php the_permalink(); ?>" aria-label="<?php echo the_title(); ?>">
						        <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium'); ?>
						        <div class="image" style="background-image: <?php if (has_post_thumbnail( $post->ID ) ): ?>url(<?php echo $featured_img_url; ?>)<?php else: ?>url('/wp-content/uploads/2018/10/pdf-placeholder.jpg');<?php endif; ?>"></div>
						        <div class="meta">
						        	<div class="type"><?php echo $term_list1[0]; ?></div>
									<div class="market"><?php echo $term_list2[0]; ?></div>
									<!-- <div class="language"><?php echo $term_list3[0]; ?></div> -->
						        </div>
						        <h3 class="title"><?php the_title(); ?></h3>
						        <p class="summary"><?php the_field('summary'); ?></p>	
					        </a>		    	
				    	</div>
			    	 
			    <?php
			  endwhile;
			  wp_reset_postdata();
			?>
		</div>
		
	
	<?php endif; ?>
		
	</div>
		
</section>