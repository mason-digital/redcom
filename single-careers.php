<?php get_header(); ?>

<section id="content" role="main">
	
	<div class="page-top"></div>
	
	<div class="container">	
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	        
	        <section class="entry-content">
		        
		        
		        <header class="header">
			        <p class="header-term">Job Listing</p>
	            	<h2 class="entry-title"><?php the_title(); ?></h2>
	        	</header>
		        
	            <?php // if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?>
	            
	            
	            <?php the_content(); ?>
	            
	            <a class="button apply" href="/company/careers/application">Apply Now for this Position</a>
	            
	        </section>
	        
	    </article>
	    <?php endwhile; endif; ?>
    
	</div>
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>