<?php get_header(); ?>

<div class="header-behind">
	<svg viewBox="0 0 100 100" preserveAspectRatio="none">
		<polygon points="0,0 100,0 100,25 0,100"/>
	</svg>
</div>

<section id="content" role="main">
	
	<div class="page-top"></div>
		
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="container">
		<div class="row product-top">
			
			<div class="col-xl-4 col-lg-5">
				<div class="product-info">
					
					<?php $term_list = wp_get_post_terms($post->ID, 'product_market', array("fields" => "all")); 
					foreach($term_list as $term_single) {
					    $market = $term_single->name; 
					} ?>
					
					<div class="market">For <?php echo $market ?></div>
					<header><h1 class="product-title">
						<?php if(get_field('product_title')): ?>
							<?php the_field('product_title'); ?>
						<?php else: ?>
							<?php the_title(); ?>
						<?php endif; ?>
					</h1></header>
					<h2 class="product-subtitle"><?php the_field('product_subtitle'); ?></h2>
					<p class="product-description"><?php the_field('product_description'); ?></p>
				</div>
			</div>
			<div class="col-xl-8 col-lg-7 product-col">
				<div class="product-image">
					<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
					<?php $featured_img_url_full = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
					<a data-fancybox href="<?php echo $featured_img_url_full ?>"><img src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>"></a>
				</div>
			</div>
			
		</div>
	</div>
	
	    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <section class="entry-content">
			    
			    <?php the_content(); ?>
			    
			    <?php get_template_part('template-parts/product-featured-info'); ?>
			    
			    <?php get_template_part('template-parts/related-links-box'); ?>
			    
			</section>	    
	    <?php endwhile; endif; ?>
    </article>
    
    <!--
    <footer class="footer">
        <?php get_template_part( 'nav', 'below-single' ); ?>
    </footer>
    -->
    
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>