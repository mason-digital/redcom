<?php /* Template Name: Blog Page */ ?>

<?php get_header(); ?>

<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
<div class="header-behind photo" style="background-image: url(<?php echo $featured_img_url ?>);">
	<div class="overlay">
		<svg viewBox="0 0 100 100" preserveAspectRatio="none">
			<polygon points="0,0 100,100 0,100"/>
		</svg>
	</div>
</div>
		
<section id="content" role="main">
	
	
	
	<div class="container">	
		<div class="row">
			
			<div class="col">
	
			    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				        
			        <section class="entry-content">
			            <?php // if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?>
			            
			            <?php the_content(); ?>
			            
			            <?php
				        $terms = get_field('post_categories');   
				           
					    $blog = array(
					        'post_type' => 'post',
					        'post_status' => 'publish',
							'cat' => $terms,
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
						    'posts_per_page' => 11
						    
					    );
					    
					    // Get current page and append to custom query parameters array
						$blog['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
						
						// Instantiate custom query
						$custom_query = new WP_Query( $blog );
						
						// Pagination fix
						$temp_query = $wp_query;
						$wp_query   = NULL;
						$wp_query   = $custom_query;
					    
					    ?>
					    
					    <div class="blog-box">
					    <?php if( $custom_query->have_posts() ) { while ( $custom_query->have_posts() ) { $custom_query->the_post(); ?>
					    	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
					    	<?php $featured = get_field('featured_post'); ?>
					    	<?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "all")); 
								foreach($term_list as $term_single) {
								$cat = $term_single->name; 
								} ?>	
							<?php $post_content = get_field('post_content'); ?>			            
					            <div class="blog-content fadeIn <?php if($featured): echo 'featured'; endif; ?>" data-scroll>
						            <div class="image-container">
							            <a href="<?php the_permalink(); ?>" aria-label="Read this article">
						            		<div class="image" style="background-image: url(<?php echo $featured_img_url ?>)"></div>
							            </a>
						            </div>
						            <div class="content-container">
							            <p class="category"><?php echo $cat ?></p>
						            	<a href="<?php the_permalink(); ?>" aria-label="Read this article">
							            	<p class="title"><?php the_title(); ?></p>
							            </a>
							            <?php if(!get_field('hide_date')): ?>
											<p class="date"><?php the_time('F j, Y'); ?>
										    <?php $posts = get_field('author'); ?>
										    <?php if( $posts ): ?><?php foreach( $posts as $p ): ?>
											    <span class="author-name"> | By: <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></span>
											<?php endforeach; ?><?php endif; ?>
											</p>
										<?php endif; ?>
										<div class="excerpt"><?php echo $post_content['summary']; ?></div>
										<a class="button" href="<?php the_permalink(); ?>" aria-label="Read this article">Read More</a>
						            </div>
					            </div>
					        <?php
						    }
					    } ?>
					    </div>
					    <?php get_template_part( 'nav', 'below' );
					    
					    // Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;
					    
					    wp_reset_postdata(); ?>	
						
						
			    
			        </section>
			        
			    </article>
			    
			</div><?php // end Main Col ?>
			
			<!--
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
			-->
		
		</div><?php // end .row ?>
	</div><?php // end .container ?>
    <?php endwhile; endif; ?>
    <?php get_template_part( 'nav', 'below' ); ?>
    
</section>

<?php get_footer(); ?>