<?php /* Template Name: Landing Page */ ?>

<?php get_header(); ?>
		
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php $hero = get_field('lp_hero'); ?>
	<div class="lp-hero" style="background-image: url(<?php echo $hero['hero_image']['url'] ?>); background-position: center <?php echo $hero['hero_position'] ?>">
		<div class="overlay" style="background-color:<?php echo $hero['overlay_color'] ?>">
			<div class="container">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	
	<div class="container">	
	
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		        
	        <section class="entry-content">
	            
	            <?php the_content(); ?>
	            			    
	        </section>
	        
	    </article>
			    		
	</div>
    
    <?php endwhile; endif; ?>
    
</section>

<div class="basic-bottom">
	<div class="site-logo">
		<?php $site_logo = get_field('site_logo','option')?>
		<a href="/" aria-label="Link to Homepage"><img src="<?php echo $site_logo['url']; ?>" alt="REDCOM Logo"></a>
	</div>
</div>

<?php get_footer(); ?>