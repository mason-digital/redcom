<?php /* Template Name: About Page */ ?>

<?php get_header(); ?>

<?php $hero = get_field('about_page_template'); ?>
<div class="market-page-top">
	<div class="hero" style="background-image: url(<?php echo $hero['hero_image']['url'] ?>); background-position: center <?php echo $hero['image-position'] ?>">
		<div class="overlay">
			<div class="gradient"></div>
			<div class="container">
				<h1 class="hero-title"><?php echo $hero['hero_title']; ?></h1>
			</div>
			<svg viewBox="0 0 100 100" preserveAspectRatio="none">
				<polygon points="0,100 100,0 100,100"/>
			</svg>
		</div>
	</div>
	<div class="sub-hero">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2><?php echo $hero['sub_hero_title']; ?></h2>
					<p><?php echo $hero['sub_hero_copy']; ?></p>
				</div>
			</div>
		</div>
	</div>
	
</div>


<section id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-8" style="padding-left:0px;">
	
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		        
		        <section class="entry-content">
		            <?php if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?>
		            <?php the_content(); ?>
		            <div class="entry-links">
		                <?php wp_link_pages(); ?>
		            </div>
		        </section>
		        
		    </article>
		    <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
		    <?php endwhile; endif; ?>
		    
			</div>
			
			<div class="col-lg-4">
				<div class="sidebar">
					
					<?php if( have_rows('about_page_template') ): ?>
						<?php while ( have_rows('about_page_template') ) : the_row(); ?>
					
						<?php if( have_rows('sidebar_boxes') ): ?>
							<?php while ( have_rows('sidebar_boxes') ) : the_row(); ?>
							
							<div class="sidebar-box">
								<?php $image = get_sub_field('image');?>
								<div class="image" style="background-image: url(<?php echo $image['sizes']['medium'] ?>)">
									<div class="gradient"></div>
									<h3><?php the_sub_field('title'); ?></h3>
								</div>
								<svg viewBox="0 0 100 100" preserveAspectRatio="none">
									<polygon points="0,100 100,0 100,100"/>
								</svg>
								<div class="content">
									<?php if( have_rows('links') ): ?>
										<?php while ( have_rows('links') ) : the_row(); ?>
											<a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a>
									<?php endwhile; endif; ?>
								</div>
							</div>
							
						<?php endwhile; endif; ?>
					<?php endwhile; endif; ?>
					
				</div>
			</div>
			
		</div>
	</div>
	
	<?php // get_template_part('template-parts/related-links-box'); ?>
	
</section>

<?php get_template_part('template-parts/testimonials'); ?>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>