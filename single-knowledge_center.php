<?php get_header(); ?>

<section id="content" role="main">
	
	<div class="page-top"></div>
	
	<div class="container">	
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	        
	        <section class="entry-content">
		        
		        <?php $terms = wp_get_post_terms($post->ID, 'knowledge_type', array("fields" => "slugs")); ?>
		        <header class="header">
			        <p class="header-term"><?php echo $terms[0] ?></p>
	            	<h2 class="entry-title"><?php the_title(); ?></h2>
	        	</header>
		        
	            <?php // if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?>
	            
	            <?php $file = get_field('pdf'); ?>
	            <?php $xfile = get_field('external_pdf'); ?>
	            <?php if( array($file,$xfile) ): ?>
	            	<a class="download-link" href="<?php if($file): echo $file['url']; else: echo $xfile; endif; ?>" target="_blank" rel="noopener noreferrer" aria-label="Download PDF">
			            <div class="download-box">
				            <div class="download-top">
				            	<i class="fas fa-file-pdf"></i>Download PDF
				            </div>
			            </div>
		            </a>
		        <?php endif; ?>
		        
		        <?php if(get_field('summary')): ?>
		        	<div class="summary"><?php the_field('summary'); ?></div>
		        <?php endif; ?>
		        
		        
		        	<div class="knowledge-center-content"><?php the_content(); ?></div>
		        
	            
	        </section>
	        
	    </article>
	    <?php endwhile; endif; ?>
    
	</div>
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>