<?php get_header(); ?>
THIS IS A TEST@! for version 1.0.5
<?php // HOMEPAGE HERO
	
$hero = get_field('hero'); ?>

<section id="home-hero" role="banner">
	
	<?php putRevSlider('homepage', 'homepage'); // Revolution Slider ?>
	
	<?php if ( have_rows( 'market_columns' ) ) : ?>
		<?php while ( have_rows( 'market_columns' ) ) : the_row(); ?>
		
		<div class="markets-wrapper">
			<svg class="markets-above" viewBox="0 0 100 100" preserveAspectRatio="none">
				<polygon points="0,100 100,0 100,100"/>
			</svg>	
			<div class="markets">
				<div class="container">
						
				<?php if ( have_rows( 'markets' ) ) : ?>
					<?php while ( have_rows( 'markets' ) ) : the_row(); ?>
						
						<a class="market-link" href="<?php the_sub_field('market_button_link'); ?>">
						<div class="market" data-scroll>
							
							<div class="info">
								<img src="<?php $icon = get_sub_field('market_icon'); echo $icon['url'] ?>">
								<h2><?php the_sub_field('market_title'); ?></h2>
								<p><?php the_sub_field('market_description'); ?></p>
							</div>
							<button class="button"><?php the_sub_field('market_button_text'); ?></button>
							
						</div>
						</a>
						
				<?php endwhile; endif; // end Market Columns ?>	
				</div>		
					
			</div>
			<svg class="markets-below" viewBox="0 0 100 100" preserveAspectRatio="none">
				<polygon points="0,0 100,0 0,100"/>
			</svg>
		</div>
	
	<?php endwhile; endif; // end Market Columns ?>
	
</section> <?php // end Hero ?> 
	
<?php // HOMEPAGE BLOG ?>

<section id="content" role="main">
	
	<h2 class="media-header fadeIn" data-scroll>NEWS & INSIGHTS</h2>
	
	<?php // BLOG & CPT SECTIONS
	if( have_rows('blog_sections') ):
	    while ( have_rows('blog_sections') ) : the_row();
	
	        if( get_row_layout() == 'blog' ):
	        	get_template_part('template-parts/homepage-blog-sections/blog-section');
	
	        elseif( get_row_layout() == 'success_stories' ): 
	        	get_template_part('template-parts/homepage-blog-sections/success-stories-section');
	        	
	        elseif( get_row_layout() == 'events' ): 
	        	get_template_part('template-parts/homepage-blog-sections/events-section');
	
	        endif;
	
	    endwhile;
	endif;
	?>	
	
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="entry-content">      
		<?php the_content(); ?>
    </section>
    <?php endwhile; endif; ?>
	    
</section>

<?php get_footer(); ?>