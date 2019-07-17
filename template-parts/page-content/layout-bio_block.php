<?php if( get_row_layout() == 'bio_block' ):

$posts = get_field('team_members');
if( $posts ): ?>

<div class="container fadeIn" data-scroll>
	
	<div class="block-wrap">
		<h3 class="block-title"><?php the_field('related_team_title'); ?></h3>
		<div class="bios">
			<?php $count = count($posts); ?>

			<?php foreach( $posts as $p ): ?>
			<div class="team-member <?php if($count == 1): echo 'single'; endif; ?>">
				
				<?php $featured_img_url = get_the_post_thumbnail_url( $p->ID ,'thumbnail'); ?>
				<div class="photo">
					<img src="<?php echo $featured_img_url ?>" />
				</div>
				<div class="info">
					<p class="name"><?php echo get_the_title( $p->ID ); ?></p>
					<p class="title"><?php the_field('team_title', $p->ID); ?></p>
					<div class="links">
						<a href="mailto:<?php the_field('team_email', $p->ID); ?>" aria-label="Send <?php echo get_the_title( $p->ID ); ?> an Email"><span class="fas fa-envelope"></span></a>
						<a href="<?php the_field('team_linkedin', $p->ID); ?>" aria-label="Go to <?php echo get_the_title( $p->ID ); ?>'s Linked in profile" target="_blank" rel="noopener"><span class="fab fa-linkedin"></span></a>
						<a href="<?php echo get_permalink( $p->ID ); ?>" aria-label="Learn more about <?php echo get_the_title( $p->ID ); ?>"><span class="fas fa-user-circle"></span></a>
					</div>
				</div>
				
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	
</div>

<?php endif; ?>
<?php endif; ?>