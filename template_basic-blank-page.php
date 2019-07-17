<?php /* Template Name: Basic Blank Page */ ?>

<?php get_header(); ?>
		
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<div class="container">	
	
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		        
	        <section class="entry-content">
	            
	            <?php the_field('form_code'); ?>
	            <?php the_content(); ?>
	            			    
	        </section>
	        
	    </article>
			    		
	</div>
    
    <?php endwhile; endif; ?>
    
</section>

<?php get_footer(); ?>