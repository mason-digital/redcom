<?php $timeline = get_field('timeline'); ?>
<?php if( have_rows('timeline') ): ?>

<section id="timeline" role="complementary">
	<div class="container">
		
		<div class="timeline">
			
			<?php if( have_rows('timeline') ): ?>
				<?php while ( have_rows('timeline') ) : the_row(); ?>
				
					<div class="timeline-entry">
						
						<div class="timeline-box">
							
							<div class="content" data-scroll>
								<div class="year"><?php the_sub_field('year'); ?></div>
								<?php if( have_rows('year_items') ): ?>
									<?php while ( have_rows('year_items') ) : the_row(); ?>
											<p class="year-item"><?php the_sub_field('year_item'); ?></p>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
							
							<span class="dot"></span>
							
						</div>
						
						<div class="timeline-empty"></div>
						
					</div>
				
				<?php endwhile; ?>
			<?php endif; ?>
			
		</div>
		
	</div>
</section>

<?php endif; ?>