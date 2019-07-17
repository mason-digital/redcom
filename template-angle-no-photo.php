<?php /* Template Name: Angled - No Photo */ ?>

<?php get_header(); ?>

<div class="header-behind">
	<svg viewBox="0 0 100 100" preserveAspectRatio="none">
		<polygon points="0,0 100,100 0,100"/>
	</svg>
</div>
		
<section id="content" role="main">
	
	<!--
	<div class="page-top">
	</div>
	-->
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    
	    <!--
	    <div class="container">
	        <header class="header">
	            <h1 class="entry-title"><?php the_title(); ?></h1>
	        </header>
	    </div>
	    -->
        
        <section class="entry-content">
            <?php // if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?>
            <?php the_content(); ?>
            
            <?php get_template_part('template-parts/related-links-box'); ?>
            
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