<?php if( get_field('show_testimonial_slider') ): ?>

<?php $terms = get_field('testimonial_markets'); ?>

<?php $bg_image = get_field('background_image'); ?>
<section id="testimonials" role="complementary" style="<?php if(get_field('use_image_background')): ?>background-image:url(<?php echo $bg_image['url'];?>)<?php endif; ?>">
	<div class="overlay" style="<?php if(get_field('use_image_background')): ?>background-color:<?php echo the_field('overlay_color') ?>;<?php endif; ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
					
					<?php
				    $testimonials = new WP_Query( array(
				        'post_type' => 'testimonials',
				        'tax_query' => array(
					        array(
					            'taxonomy' => 'testimonial_market',
					            'field' => 'term_id',  // term_id, slug or name
					            'terms' => $terms,                  
					        )
					    ),
				        'post_status' => 'publish',
				        'orderby'  => 'rand',
					    'posts_per_page' => -1
				    ));
					
					if( $testimonials->have_posts() ) { ?>
					
						<div class="testimonials">
							
							<?php while ( $testimonials->have_posts() ) { $testimonials->the_post(); ?>
							
							<div class="testimonial" style="<?php if(get_field('use_image_background')):?>color:<?php the_field('text_color') ?>;<?php endif; ?>">
								<div class="wrapper">
									<p><?php the_field('the_quote'); ?></p>
									<p><strong><?php the_field('quote_source'); ?></strong></p>
								</div>
							</div>
							
							<?php } ?>	
						
						</div>
					
					<?php }
				    else {} 
				    wp_reset_postdata();
					?>	
					
				</div>
			</div>		
		</div>	
	</div>
</section>

<?php endif; ?>