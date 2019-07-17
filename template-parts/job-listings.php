<section id="job-listings" class="fadeIn" role="complementary" data-scroll>
	
	<div class="container">
		
		<div class="job-listings-box">
			<h2 class="box-title">Current Job Openings</h2>
			
			<div class="row">
			
			<?php
			
			$cat_args = array (
			    'taxonomy' => 'departments',
			);
			$categories = get_categories ( $cat_args );
			$cat_num = count($categories);
			
			foreach ( $categories as $category ) {
			    $cat_query = null;
			    $args = array (
			        'order' => 'ASC',
			        'orderby' => 'title',
			        'posts_per_page' => -1,
			        'post_type' => 'careers',
			        'taxonomy' => 'departments',
			        'term' => $category->slug
			    );
			
			    $cat_query = new WP_Query( $args );
			
			    if ( $cat_query->have_posts() ) { ?>
				    <div class="dept-col <?php if($cat_num <= 2): echo 'col-md-6'; endif; ?><?php if($cat_num >= 3): echo 'col-md-4'; endif; ?>">
			        <h3 class="dept-name"><?php echo $category->name ?></h3>
			        <ul>
			        <?php while ( $cat_query->have_posts() ) {
			            $cat_query->the_post();
			            ?>
			            <li>
			                <a href="<?php the_permalink(); ?>" aria-label="Job Listing for <?php the_title(); ?>"><?php the_title(); ?></a>
			            </li>
			            <?php
			        } ?>
			        </ul>
			        </div>
			    <?php }
			    wp_reset_postdata();
			}
			?>
			
			</div>
			
		</div>
		
	</div>
		
</section>