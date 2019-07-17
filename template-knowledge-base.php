<?php /* Template Name: Knowledge Base */ ?>

<?php get_header(); ?>
		
<section id="content" role="main">
	
	<div class="page-top">
	</div>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <section class="entry-content">
            
            <?php the_content(); ?>
            
            <?php get_template_part('template-parts/knowledge-center'); ?>
            
        </section>
        
    </article>
    <?php endwhile; endif; ?>
    
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>