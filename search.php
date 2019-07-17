<?php get_header(); ?>
<section id="content" role="main">
	
	<div class="page-top"></div>
	
	<div class="container">
		
	    <?php if ( have_posts() ) : ?>
	    <header class="header">
	        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'redcom' ), get_search_query() ); ?></h1>
	    </header>
	    
	    <div class="row">
	    <?php while ( have_posts() ) : the_post(); ?>
	  
		    	<div class="col-md-6 search-col">
			    	<a class="search-box-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
				    	<div class="search-wrapper">
					    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php //get_template_part( 'entry' ); ?>
							
							<?php $success_story = get_field('success_story'); ?>
							<?php $event = get_field('event_info'); ?>
							<?php $blog = get_field('post_content'); ?>
							
							<?php if ($success_story['hero_image']): ?>
								<div class="image"><img src="<?php echo $success_story['hero_image']['sizes']['medium'] ?>" /></div>
								
							<?php elseif ($event['hero_image']): ?>
								<div class="image"><img src="<?php echo $event['hero_image']['sizes']['medium'] ?>" /></div>
							
							<?php elseif ( has_post_thumbnail() ) : ?>
								<div class="image"><?php the_post_thumbnail('medium'); ?></div>
								
							<?php endif; ?>
							
							
							<div class="info">
								
								<?php 
								$post_type = get_post_type( get_the_ID() ); 
								$obj = get_post_type_object($post_type); 
								$term_list = wp_get_post_terms(get_the_ID(), 'knowledge_type', array("fields" => "slugs")); ?>
								<div class="post-type">
									<?php echo ($term_list ? $term_list[0] : $obj->labels->singular_name); ?>
								</div>
								
								<h2 class="title"><?php the_title(); ?></h2>
								<?php echo $success_story['summary']; ?>
								<?php echo $event['summary']; ?>
								<?php echo $blog['summary']; ?>
								<?php the_field('summary'); ?>
								<?php the_field('product_description'); ?>
								
								<button class="button">Learn More</button>
								
							</div>
								
					    	</article>	
				    	</div>
			    	</a>
		    	</div>
	    
	    <?php endwhile; ?>
	    </div>
	    
	    <?php get_template_part( 'nav', 'below' ); ?>
	    <?php else : ?>
	    <article id="post-0" class="post no-results not-found">
	        <header class="header">
	            <h2 class="entry-title"><?php _e( 'Nothing Found', 'redcom' ); ?></h2>
	        </header>
	        <section class="entry-content">
	            <p>
	                <?php _e( 'Sorry, nothing matched your search. Please try again.', 'redcom' ); ?>
	            </p>
	            <?php get_search_form(); ?>
	        </section>
	    </article>
	    <?php endif; ?>
	    
	</div>    
	    
</section>
<?php // get_sidebar(); ?>
<?php get_footer(); ?>