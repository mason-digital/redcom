<?php if( get_row_layout() == 'accordion' ): ?>

<div class="container fadeIn" data-scroll>
	<div class="row">
		<div class="col">
			
			<?php if( have_rows('accordion_panels') ): ?>
	
			<div class="accordion" id="accordion-<?php echo $layoutID; ?>">
			  
			  <?php $i=1; while ( have_rows('accordion_panels') ) : the_row(); ?>
			  
			  <div class="panel">
			    <div class="panel-header" id="heading-<?php echo $i; ?>">
			      <h3>
			        <a class="collapsed" data-toggle="collapse" data-target="#collapse-<?php echo $layoutID; ?>-<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $layoutID; ?>-<?php echo $i; ?>"><?php the_sub_field('panel_title'); ?></a>
			      </h3>
			    </div>
			
			    <div id="collapse-<?php echo $layoutID; ?>-<?php echo $i; ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo $layoutID; ?>-<?php echo $i; ?>" data-parent="#accordion-<?php echo $layoutID; ?>">
			      <div class="panel-body">
			        <?php the_sub_field('panel_content'); ?>
			      </div>
			    </div>
			  </div>
			  
			  <?php $i++; endwhile; ?>
			 
			</div>
			
			<?php endif; ?>
			
		</div>
	</div>
</div>

<?php endif; ?>