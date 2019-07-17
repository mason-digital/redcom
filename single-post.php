<?php get_header(); ?>

<section id="content" role="main">
	
	<?php $post_content = get_field('post_content'); ?>
	<div class="success-hero" style="background-image: url(<?php echo $post_content['hero_image']['url'] ?>); background-position: center <?php echo $post_content['hero_position'] ?>">
		<div class="overlay" style="background-color:<?php echo $post_content['overlay_color'] ?>">
			<div class="container">
				<header class="header">
					
					<?php 
					$categories = get_the_category(); 
					$primary_cat = $categories[0]->name;
					?>
					<p class="meta"><?php echo $primary_cat ?></p>
					
		            <h1 class="entry-title"><?php the_title(); ?></h1>
		        </header>
			</div>
		</div>
	</div>
	
	<div class="container">	
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    
		    <div class="container">
			    <p class="date"><?php the_time('F j, Y'); ?>
			    <?php $posts = get_field('author'); ?>
			    <?php if( $posts ): ?><?php foreach( $posts as $p ): ?>
				    <span class="author-name"> | Posted by: <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></span>
				<?php endforeach; ?><?php endif; ?>
				</p>
			    
		    </div>
	        
	        <section class="entry-content">	            
	            
	            <?php the_content(); ?>
	            
	        </section>
	        
	    </article>
	    <?php endwhile; endif; ?>
	    
    
	</div>
</section>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>