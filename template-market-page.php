<?php /* Template Name: Market Page */ ?>

<?php get_header(); ?>

<?php $hero = get_field('market_page_template'); ?>
<div class="market-page-top">
	<div class="hero" style="background-image: url(<?php echo $hero['hero_image']['url'] ?>); background-position: center <?php echo $hero['image_position'] ?>">
		<div class="overlay">
			<div class="gradient"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="hero-title"><?php echo $hero['hero_title']; ?></h1>
					</div>
					<div class="col-md-4">
						<?php if($hero['show_promo']): ?>
							<div class="promo-box desktop <?php echo $hero['text_color']; ?>" style="background-color: <?php if($hero['bg_color']): echo $hero['bg_color']; else: ?> rgba(0,0,0,0.8)<?php endif; ?>">
								<?php if($hero['icon']): ?>
									<div class="icon"><img src="<?php echo $hero['icon']['sizes']['medium'] ?>"></div>
								<?php endif; ?>
								<?php echo $hero['content']; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<svg viewBox="0 0 100 100" preserveAspectRatio="none">
				<polygon points="0,100 100,0 100,100"/>
			</svg>
		</div>
	</div>
	<div class="sub-hero">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<h2><?php echo $hero['sub_hero_title']; ?></h2>
					<?php echo $hero['sub_hero_copy']; ?>
				</div>
				<div class="col-lg-4">
				</div>
			</div>
		</div>
	</div>
	<svg class="under-sub-hero" viewBox="0 0 100 100" preserveAspectRatio="none";>
		<polygon points="0,0 100,0 0,100"/>
	</svg>
	
</div>


<section id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-8" style="padding-left:0px;">
	
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		        
		        <section class="entry-content">
		            
		            <?php if($hero['show_promo']): ?>
		            	<div class="container">
							<div class="promo-box mobile <?php echo $hero['text_color']; ?>" style="background-color: <?php if($hero['bg_color']): echo $hero['bg_color']; else: ?> rgba(0,0,0,0.8)<?php endif; ?>">
								<?php if($hero['icon']): ?>
									<div class="icon"><img src="<?php echo $hero['icon']['sizes']['medium'] ?>"></div>
								<?php endif; ?>
								<?php echo $hero['content']; ?>
							</div>
		            	</div>
					<?php endif; ?>
		            
		            <?php the_content(); ?>
		            
		        </section>
		        
		    </article>
		    <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
		    <?php endwhile; endif; ?>
		    
			</div>
			
			<div class="col-lg-4">
				<div class="sidebar margin">
					
					<?php if( $hero['video'] ): ?>
					<div class="sub-hero-box">
						<div class="embed-container">
							<?php echo $hero['video']; ?>
						</div>
						<div class="caption">
							<?php echo $hero['video_caption']; ?>
						</div>
					</div>
					<?php endif; ?>
					
					<?php if( have_rows('market_page_template') ): ?>
						<?php while ( have_rows('market_page_template') ) : the_row(); ?>
					
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
		
		<?php if(get_field('full_width_field')): ?>
			<div class="full-width-section">
				<?php the_field('full_width_field'); ?>
			</div>
		<?php endif; ?>
		
	</div>
	
	<?php get_template_part('template-parts/related-links-box'); ?>
	
</section>

<?php get_template_part('template-parts/testimonials'); ?>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>