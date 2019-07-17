<?php if( get_row_layout() == 'duo_block' ): ?>
<?php $bg_image = get_sub_field('background_image'); ?>

<div class="container fadeIn" data-scroll >	
	<div class="row">
		
		<div class="col-md-6 left-col<?php if(get_sub_field('use_image')): ?> image<?php endif; ?><?php if(get_sub_field('text_color') == 'dark'): ?> dark<?php endif; ?>" <?php if(get_sub_field('use_image')): ?>style="background-image:url(<?php echo $bg_image['url'] ?>)"<?php endif; ?> >
			<div class="overlay" <?php if(get_sub_field('use_image')): ?>style="background-color:<?php the_sub_field('overlay_color'); ?>"<?php endif; ?> >	
				<h3 class="headline<?php if(get_sub_field('text_color') == 'dark'): ?> dark<?php endif; ?>"><?php the_sub_field('left_block_title'); ?></h3>
				<?php the_sub_field('left_block_text'); ?>
			</div>
		</div>
		<div class="col-md-6 right-col">	
			<?php the_sub_field('right_block_text'); ?>
		</div>
		
	</div>
</div>

<?php endif; ?>