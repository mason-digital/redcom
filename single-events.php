<?php get_header(); ?>

<section id="content" role="main">
	
	<?php $event = get_field('event_info'); ?>
	<div class="event-hero" style="background-image: url(<?php echo $event['hero_image']['url'] ?>); background-position: center <?php echo $event['hero_position'] ?>">
		<div class="overlay" style="background-color:<?php echo $event['overlay_color'] ?>">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-lg-6">
						
						
						<?php $featured_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large')); ?>
						<?php $alt_logo = $event['alt_logo']['sizes']['large'] ?>
						<div class="event-logo">
							<?php if($alt_logo): ?>
								<img src="<?php echo $alt_logo; ?>" alt="Event Logo">
							<?php else: ?>
								<img src="<?php echo $featured_img_url; ?>" alt="Event Logo">
							<? endif; ?>
						</div>
						
						<?php if($event['event_title']): ?>
							<h1 class="event-title" style="color:<?php echo $event['text_color'] ?>"><?php echo $event['event_title'] ?></h1>
						<?php endif; ?>
						
						<?php if($event['event_date']): ?>
							<p class="event-date" style="color:<?php echo $event['text_color'] ?>"><?php echo $event['event_date'] ?></p>
						<?php endif; ?>
						
						<?php if($event['event_location']): ?>
							<p class="event-location" style="color:<?php echo $event['text_color'] ?>"><?php echo $event['event_location'] ?></p>
						<?php endif; ?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">	
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	        
	        <section class="entry-content">	            
	            
	            <?php the_content(); ?>
	            
	        </section>
	        
	    </article>
	    <?php endwhile; endif; ?>
	    
    
	</div>
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>