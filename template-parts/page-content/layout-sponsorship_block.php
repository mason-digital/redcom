<?php if( get_row_layout() == 'sponsorship_block' ): ?>

<?php $logo = get_sub_field('logo'); ?>
<?php $image = get_sub_field('image'); ?>

<div class="container fadeIn" data-scroll>
	<div class="row">
	
		<div class="col-md-3 logo-wrap">	
			<?php if( !empty($logo) ): ?>
				<div class="logo">
					<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
				</div>
			<?php endif; ?>	
		</div>
		<div class="col-md-9 column">				
			<?php if( !empty($image) && get_sub_field('image_location') == 'above' ): ?>
				<div class="image-top">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
			<?php endif; ?>	
		</div>
		
	</div>
	<div class="row">
		
		<div class="col-12 col-wrap">
			<?php if( !empty($image) && get_sub_field('image_location') != 'above' ): ?>
			<div class="image <?php if( get_sub_field('image_size') == 'one-half' ): echo 'half'; endif; ?><?php if( get_sub_field('image_size') == 'one-third' ): echo 'third'; endif; ?><?php if( get_sub_field('image_size') == 'one-quarter' ): echo 'quarter'; endif; ?> <?php if( get_sub_field('image_location') == 'right' ): echo 'right'; endif; ?>">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			</div>
			<?php endif; ?>
			<div class="text <?php if( get_sub_field('image_location') != 'above' && get_sub_field('image_size') == 'one-half' ): echo 'half'; endif; ?><?php if( get_sub_field('image_location') != 'above' && get_sub_field('image_size') == 'one-third' ): echo 'third'; endif; ?><?php if( get_sub_field('image_location') != 'above' && get_sub_field('image_size') == 'one-quarter' ): echo 'quarter'; endif; ?>">
				<?php the_sub_field('text_copy'); ?>
			</div>
		</div>	
		
	</div>
</div>

<?php endif; ?>