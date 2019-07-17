<?php get_header(); ?>

<section id="content" role="main">
	
	<?php $story = get_field('success_story'); ?>
	<div class="success-hero" style="background-image: url(<?php echo $story['hero_image']['url'] ?>); background-position: center <?php echo $story['hero_position'] ?>">
		<div class="overlay" style="background-color:<?php echo $story['overlay_color'] ?>">
			<div class="container">
				<header class="header">
					
					<?php $term_list = wp_get_post_terms($post->ID, 'success_markets', array("fields" => "all")); 
					foreach($term_list as $term_single) {
					    $market = $term_single->name; 
					} ?>
					<p class="meta">Use Case | <?php echo $market ?></p>
					
		            <h1 class="entry-title"><?php the_title(); ?></h1>
		        </header>
			</div>
		</div>
	</div>
	
	<div class="container">	
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	        
	        <section class="entry-content">	 
		        
		        <?php $file = $story['success_pdf']; ?>
	            <?php if( $file ): ?>
	            	<a class="download-link" href="<?php echo $file['url'] ?>" target="_blank" rel="noopener noreferrer" aria-label="Download PDF">
			            <div class="download-box">
				            <div class="download-top">
				            	<i class="fas fa-file-pdf"></i>Download PDF
				            </div>
			            </div>
		            </a>
		        <?php endif; ?>           
	            
	            <?php the_content(); ?>
	            
	        </section>
	        
	    </article>
	    <?php endwhile; endif; ?>
	    
    
	</div>
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>