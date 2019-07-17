<?php if( get_row_layout() == 'single_column' ): 
	
$full_width = get_sub_field('full_width');
$bg_color = get_sub_field('background_color');
$border = get_sub_field('border');
$rounded = get_sub_field('rounded');
$text_color = get_sub_field('text_color');	
	
?>

<?php if(get_sub_field('full_width') == 'yes'): ?>
	<div class="fluid-container" style="<?php if($bg_color): ?>background-color:<?php echo $bg_color; endif; ?>">
<?php endif; ?> 
<div class="container fadeIn" data-scroll>
	<div class="row">
		<div class="col">
			<div class="flex-wrapper<?php if($border == 'yes'): echo ' has-border'; endif; ?><?php if( $bg_color || $border == 'yes'): echo ' padding'; endif; ?><?php if($rounded == 'yes'): echo ' rounded-corners'; endif; ?> <?php echo $text_color; ?>" style="<?php if($full_width == 'no'): ?>background-color:<?php echo $bg_color; endif; ?>">
				<?php $icon = get_sub_field('icon'); ?>
				<?php if( !empty($icon) ): ?>
					<div class="icon">
						<img class="<?php the_sub_field('icon_size'); ?>" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
					</div>
				<?php endif; ?>
				<div style="width:100%;">
					<?php if(get_sub_field('headline')): ?>
						<h3 class="headline"><?php the_sub_field('headline'); ?></h3>
					<?php endif; ?>
					<?php the_sub_field('text_copy'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(get_sub_field('full_width') == 'yes'): ?>
	</div>
<?php endif; ?> 

<?php endif; ?>