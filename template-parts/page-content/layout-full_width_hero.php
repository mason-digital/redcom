<?php if( get_row_layout() == 'full_width_hero' ): ?>

<div class="hero" data-scroll data-parallax="scroll" data-image-src="<?php the_sub_field('background_image'); ?>" style="background: transparent;">
	<div class="overlay" style="background-color:<?php the_sub_field('overlay_color'); ?>">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<?php if(get_sub_field('headline')): ?>
						<h2 class="headline" style="color:<?php the_sub_field('text_color'); ?>"><?php the_sub_field('headline'); ?></h2>
					<?php endif; ?>
					
					<?php if(get_sub_field('text_copy')): ?>
						<p class="text-copy" style="color:<?php the_sub_field('text_color'); ?>"><?php the_sub_field('text_copy'); ?></p>
					<?php endif; ?>
					
					<?php if(get_sub_field('button_text')): ?>
						<a class="button" href="<?php the_sub_field('button_link'); ?>" aria-label="<?php the_sub_field('button_text'); ?>"><?php the_sub_field('button_text'); ?></a>
					<?php endif; ?>
				
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>