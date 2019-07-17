<?php if( get_row_layout() == 'image_gallery' ): ?>

<div class="container fadeIn" data-scroll>
	<div class="row">
		<div class="col">
			
			<?php 

			$images = get_sub_field('gallery');
			
			if( $images ): ?>
			    
			    <div class="image-gallery <?php the_sub_field('number_of_columns'); ?> <?php if( get_sub_field('gallery_carousel') ): ?>gallery-slick<?php endif; ?>">
		        <?php foreach( $images as $image ): ?>	
		        	<div class="image-container">						            
		                <a data-fancybox="gallery" href="<?php echo $image['url']; ?>">
		                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
		                </a>
	                </div>
		        <?php endforeach; ?>
			    </div>
			    
			<?php endif; ?>
			
		</div>
	</div>
</div>

<?php endif; ?>