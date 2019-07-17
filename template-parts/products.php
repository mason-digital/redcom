<section id="products-page" role="complementary">
	
	<div class="container">
		
		<? // THE BUTTON FILTERS ?>
		<div class="filters buttons">
			
			<!--
			<div class="button-group">
				<div class="label">Search:</div><input type="text" id="quicksearch" placeholder="SEARCH" />
			</div>
			-->
			
			<div class="knowledge-type button-group filter-button-group" data-filter-group="type">
				<div class="label">Type:</div>
				<div class="flex-buttons">
					<button class="button is-checked" data-filter="*">All</button>
					<?php
					$terms1 = get_terms( 'product_cats' );
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
					$terms2 = get_terms( 'product_market' );
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
		
			<div class="knowledge-type select-group col-md-4 col-lg-3">
				<div class="label">Type:</div>
				<select class="filters-select">
					<option value="*">All Types</option>
				<?php
				$terms3 = get_terms( 'product_cats' );
				if ( ! empty( $terms3 ) && ! is_wp_error( $terms3 ) ){
				    foreach ( $terms3 as $term3 ) {
				        echo '<option value=".' . $term3->slug . '">' . $term3->name . '</option>';
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
				$terms4 = get_terms( 'product_market' );
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
		
		<?php if( have_rows('products') ): ?>
		
		<div class="row grid">
			
			<?php while ( have_rows('products') ) : the_row(); ?>
			
				<?php $market1 = get_sub_field('product_market_1'); ?>
				<?php $market2 = get_sub_field('product_market_2'); ?>
				<?php $prod_type = get_sub_field('product_type'); ?>
			    	
		        <div class="col-12 col-md-6 col-lg-4 col-xl-3 grid-item <?php echo $market1->slug; ?> <?php echo $market2->slug; ?> <?php echo $prod_type->slug; ?>">
			        
			        <div class="grid-item-wrapper fadeIn" data-scroll> 
			        
			        	<div class="product-info">
					        <?php $image = get_sub_field('product_image'); $size = 'medium'; $img = $image['sizes'][ $size ]; ?>
					        <div class="image" style="background-image: url(<?php echo $img ?>)"></div>
					        
				 	    	<div class="meta"><?php echo $prod_type->name; ?></div>
				 	    	
				 	    	<div class="title"><?php the_sub_field('product_name'); ?></div>
				 	    	<div class="summary"><?php the_sub_field('product_summary'); ?></div>
				        </div>
				        
			 	    	<div class="prodcut-links">
				 	    	<div class="details-text">View Product details for...</div>
				 	    	
				 	    	
				 	    	<?php if(get_sub_field('product_link_1')): ?>
				 	    		<?php $market1_name = $market1->name ?>
				 	    		<?php if($market1_name == 'General'): ?>
				 	    			<a class="button first" href="<?php the_sub_field('product_link_1'); ?>">View Product Details</a>
				 	    		<?php else: ?>
				 	    			<a class="button first" href="<?php the_sub_field('product_link_1'); ?>"><?php echo $market1_name ?></a>
				 	    		<?php endif; ?>
				 	    	<?php endif; ?>
				 	    	
				 	    	
				 	    	<?php if(get_sub_field('product_link_2')): ?>
				 	    		<a class="button" href="<?php the_sub_field('product_link_2'); ?>"><?php echo $market2->name; ?></a>
				 	    	<?php endif; ?>
				 	    	<?php if(!get_sub_field('product_link_2')): ?>
				 	    		<div class="button-spacer"></div>
				 	    	<?php endif; ?>	
			 	    	</div>
			        		 
			        </div>		    	
		    	</div>
		    	
		    <?php endwhile; ?>
 	    
 	    </div>
 	    
 		<?php endif; ?>    	 
		
	</div>
		
</section>