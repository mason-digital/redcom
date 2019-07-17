<?php if( get_row_layout() == 'logo_gallery' ): ?>

<div class="container fadeIn" data-scroll>
	<div class="row">
		<div class="col">
			    
			<div class="image-gallery <?php the_sub_field('number_of_columns'); ?> <?php if( get_sub_field('gallery_carousel') ): ?>gallery-slick<?php endif; ?>">
				<?php if( have_rows('logos') ): ?>
		        <?php while ( have_rows('logos') ) : the_row(); ?>	
			    	<?php $logo = get_sub_field('logo') ?>
		        	<div class="image-container">						            
		                <a href="<?php the_sub_field('image_link') ?>" target="_blank">
		                     <img src="<?php echo $logo['sizes']['medium']; ?>" alt="<?php echo $logo['alt']; ?>" />
		                </a>
	                </div>
		        <?php endwhile; endif; ?>
			</div>
			
		</div>
	</div>
</div>

<?php endif; ?>