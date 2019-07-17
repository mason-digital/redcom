<?php /* Template Name: Events & Trade Shows */ ?>

<?php get_header(); ?>

<!--
<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
<div class="header-behind photo" style="background-image: url(<?php echo $featured_img_url ?>);">
	<div class="overlay">
		<svg viewBox="0 0 100 100" preserveAspectRatio="none">
			<polygon points="0,0 100,100 0,100"/>
		</svg>
	</div>
</div>
-->
		
<section id="content" role="main">
	
	<div class="page-top"></div>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <section class="entry-content">
            
            <?php the_content(); ?>
            
            <?php get_template_part('template-parts/events'); ?>
            
        </section>
    </article>
    
    <?php endwhile; endif; ?>
    
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>