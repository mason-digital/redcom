<?php $feat_info = get_field('featured_information'); ?>
<?php if( $feat_info['show_featured_info'] ): ?>

<section id="product-featured-info" class="fadeIn" role="complementary" data-scroll>
	<div class="fluid-container wrap">
		<div class="container">
			<h2 class="section-title"><?php echo $feat_info['section_title']; ?></h2>
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="<?php echo $feat_info['image']['url']; ?>" alt="<?php echo $feat_info['image']['alt']; ?>" />
				</div>
				<div class="col-md-6">
					<?php if( have_rows('featured_information') ): ?>
						<?php while ( have_rows('featured_information') ) : the_row(); ?>
							
						<?php if( have_rows('featured_info') ): ?>
							<?php while ( have_rows('featured_info') ) : the_row(); ?>
								
								<div class="content">
									<h3><?php the_sub_field('headline'); ?></h3>
									<?php the_sub_field('text_copy'); ?>
									<a class="button" href="<?php the_sub_field('button_link'); ?>" aria-label="<?php the_sub_field('button_text'); ?>"><?php the_sub_field('button_text'); ?></a>
								</div>
							
						<?php endwhile; endif; ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>