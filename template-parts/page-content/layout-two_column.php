<?php if( get_row_layout() == 'two_column' ): 
	
$full_width = get_sub_field('full_width');
$bg_color = get_sub_field('background_color');
$border = get_sub_field('border');
$rounded = get_sub_field('rounded');

$col_sizes = get_sub_field('column_sizes');
$col_color_1 = get_sub_field('column_color_1');
$col_color_2 = get_sub_field('column_color_2');

$rounded_1 = get_sub_field('rounded_1');
$rounded_2 = get_sub_field('rounded_2');

$col_border_1 = get_sub_field('col_border_1');
$col_border_2 = get_sub_field('col_border_2');

$icon_1 = get_sub_field('icon_1');
$icon_size_1 = get_sub_field('icon_size_1');
$icon_pos_1 = get_sub_field('icon_position_1');
$icon_2 = get_sub_field('icon_2');
$icon_size_2 = get_sub_field('icon_size_2');
$icon_pos_2 = get_sub_field('icon_position_2');

$headline_text_color = get_sub_field('headline_text_color');
$text_color_1 = get_sub_field('text_color_1');
$text_color_2 = get_sub_field('text_color_2');
	
?>

<?php if($full_width == 'yes'): ?>
	<div class="fluid-container" style="<?php if($bg_color): ?>background-color:<?php echo $bg_color; endif; ?>">
<?php endif; ?> 

<div class="container fadeIn" data-scroll>
	<div class="row<?php if($border == 'yes'): echo ' row-border'; endif; ?><?php if($rounded == 'yes'): echo ' rounded-corners'; endif; ?><?php if($bg_color): echo ' padding'; endif; ?>" style="<?php if($bg_color): ?>background-color:<?php echo $bg_color; endif; ?>">
		
		<?php if(get_sub_field('headline')): ?>
			<div class="col-12">
				<h3 class="headline <?php echo $headline_text_color; ?>"><?php the_sub_field('headline'); ?></h3>
			</div>
		<?php endif; ?>
	
		<div class="<?php if( $col_sizes == 'half' ): echo 'col-md-6'; endif; ?><?php if( $col_sizes == 'third-1' ): echo 'col-md-4'; endif; ?><?php if( $col_sizes == 'third-2' ): echo 'col-md-8'; endif; ?><?php if( $col_sizes == 'fourth-1' ): echo 'col-md-3'; endif; ?><?php if( $col_sizes == 'fourth-2' ): echo 'col-md-9'; endif; ?> column">
			
			<div class="flex-wrapper<?php if($col_border_1 == 'yes' || $col_color_1): echo ' padding'; endif; ?><?php if($col_border_1 == 'yes'): echo ' has-border'; endif; ?><?php if($rounded_1 == 'yes'): echo ' rounded-corners'; endif; ?> <?php echo $text_color_1; ?>" style="<?php if($col_color_1): ?>background-color:<?php echo $col_color_1; endif; ?>">
				
				<?php if( !empty($icon_1) ): ?>
					<div class="icon <?php echo $icon_pos_1; ?>">
						<img class="<?php echo $icon_size_1; ?>" src="<?php echo $icon_1['url']; ?>" alt="<?php echo $icon_1['alt']; ?>" />
					</div>
				<?php endif; ?>
				<div style="width:100%">
					<?php if(get_sub_field('sub_headline_1')): ?>
						<h3 class="sub-headline"><?php the_sub_field('sub_headline_1'); ?></h3>
					<?php endif; ?>
					<?php the_sub_field('text_copy_1'); ?>
				</div>
				
			</div>
		</div>
		
		<div class="<?php if( $col_sizes == 'half' ): echo 'col-md-6'; endif; ?><?php if( $col_sizes == 'third-1' ): echo 'col-md-8'; endif; ?><?php if( $col_sizes == 'third-2' ): echo 'col-md-4'; endif; ?><?php if( $col_sizes == 'fourth-1' ): echo 'col-md-9'; endif; ?><?php if( $col_sizes == 'fourth-2' ): echo 'col-md-3'; endif; ?> column">
			
			<div class="flex-wrapper<?php if($col_border_2 == 'yes' || $col_color_2): echo ' padding'; endif; ?><?php if($col_border_2 == 'yes'): echo ' has-border'; endif; ?><?php if($rounded_2 == 'yes'): echo ' rounded-corners'; endif; ?> <?php echo $text_color_2; ?>" style="<?php if($col_color_2): ?>background-color:<?php echo $col_color_2; endif; ?>">
				
				<?php if( !empty($icon_2) ): ?>
					<div class="icon <?php echo $icon_pos_2; ?>">
						<img class="<?php echo $icon_size_2; ?>" src="<?php echo $icon_2['url']; ?>" alt="<?php echo $icon_2['alt']; ?>" />
					</div>
				<?php endif; ?>
				<div style="width:100%">
					<?php if(get_sub_field('sub_headline_2')): ?>
						<h3 class="sub-headline"><?php the_sub_field('sub_headline_2'); ?></h3>
					<?php endif; ?>
					<?php the_sub_field('text_copy_2'); ?>
				</div>
				
			</div>
		</div>
		
	</div>
</div>

<?php if($full_width == 'yes'): ?>
	</div>
<?php endif; ?>

<?php endif; ?>