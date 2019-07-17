<?php /* Template Name: Team Members */ ?>

<?php get_header(); ?>

<!--
<div class="bg">
	<div class="fill"></div>
	<svg viewBox="0 0 100 100" preserveAspectRatio="none">
		<polygon points="0,0 100,0 100,100"/>
	</svg>
</div>
-->
		
<section id="content" role="main">
	
	<div class="page-top"></div>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <section class="entry-content">
	        <div class="container" style="padding:0px;">
		        
		        <?php the_content(); ?>
            
	            <div id="team-members">    
		                
			        <?php
					$cat_args = array (
					    'taxonomy' => 'team_group',
					);
					$categories = get_categories ( $cat_args );
					$cat_num = count($categories);
					
					foreach ( $categories as $category ) {
					    $cat_query = null;
					    $args = array (
					        'posts_per_page' => -1,
					        'post_status' => 'publish',
					        'post_type' => 'team',
					        'taxonomy' => 'team_group',
					        'term' => $category->slug
					    );
					
					    $cat_query = new WP_Query( $args );
					
					    if ( $cat_query->have_posts() ) { ?>   
					    
					    <div class="team-group"> 
			            
				            <h2 class="section-title"><?php echo $category->name ?> Team</h2>
				            
				            <div class="team-members-wrapper">
					            
				            <?php while ( $cat_query->have_posts() ) {
					            $cat_query->the_post();
					            ?>
					            
					            <div class="team-member" data-scroll>
								    <a href="<?php the_permalink(); ?>" aria-label="View Profile">
									    <div class="team-member-wrapper">
										    <?php $featured_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'medium')); ?>
											<div class="image" style="background-image: url(<?php echo $featured_img_url ?>)">
												<svg viewBox="0 0 100 100" preserveAspectRatio="none">
													<polygon points="0,100 100,0 100,100"/>
												</svg>
											</div>
											<div class="info">
										    	<div class="name"><? the_title(); ?></div>
												<div class="title"><? the_field('team_title'); ?></div>
											</div>
									    </div>
								    </a>
							    </div>
							    
							<?php } ?>
				            </div>
				            
				            <?php } wp_reset_postdata(); ?>
				            
					    </div>
			            
			        <?php } ?>   
		            
		            
		            
		            
		            
		            
	            
	            
	        </div>
            
            <div class="entry-links">
                <?php wp_link_pages(); ?>
            </div>
        </section>
    </article>
    <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
    <?php endwhile; endif; ?>
    
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>