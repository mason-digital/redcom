<?php if( have_rows('related_links_cols') ): ?>

<section id="related-links" class="fadeIn" role="complementary" data-scroll>
	<div class="container">
		<div class="box">
			<div class="row">
				<div class="col">
					<h2>Related Links</h2>
				</div>
			</div>
			<div class="row">
				
				<?php $count = count(get_field('related_links_cols'));?>
				<?php while ( have_rows('related_links_cols') ) : the_row(); ?>
				
				<div class="links-column <?php if($count==4){echo "col-md-6 col-lg-3";} elseif($count==3){echo "col-md-4";} elseif($count==2){echo "col-md-6";} else{echo "col";} ?>">
					
					<?php $icon = get_sub_field('column_icon'); ?>
					<img class="icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
					<h3><?php the_sub_field('column_title'); ?></h3>
					
					<?php if( have_rows('links') ): ?>
					
					<ul class="links">
					
						<?php while ( have_rows('links') ) : the_row(); ?>
							<li>
								
								<?php if(get_sub_field( 'link_type' ) == 'knowledge' ): ?>
									<?php $posts = get_sub_field('link_knowledge'); ?>
									<?php foreach( $posts as $p ): ?>	
										<a href="<?php echo get_permalink( $p->ID ); ?>">
											<?php the_sub_field('link_text'); ?>
										</a>
									<?php endforeach; ?>
								<?php endif; ?>
								
								<?php if( get_sub_field( 'link_type' ) == 'internal' ): ?>
									<a href="<?php the_sub_field('link_page'); ?>">
										<?php the_sub_field('link_text'); ?>
									</a>
								<?php endif; ?>
								
								<?php if( get_sub_field( 'link_type' ) == 'external' ): ?>
									<a href="<?php the_sub_field('link_url'); ?>" target="_blank" rel="noopener">
										<?php the_sub_field('link_text'); ?>
									</a>
								<?php endif; ?>
								
							</li>
						<?php endwhile; ?>
					
					</ul>
						
					<?php endif; ?>
					
				</div>
				
				<?php endwhile; ?>
				
			</div>
		</div>
	</div>
</section>

<?php endif; ?>