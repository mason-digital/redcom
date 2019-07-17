<?php if( get_row_layout() == 'four_column' ): 

$full_width = get_sub_field('full_width');
$bg_color = get_sub_field('background_color');
$border = get_sub_field('border');
$rounded = get_sub_field('rounded');

$col_sizes = get_sub_field('column_sizes');
$col_color_1 = get_sub_field('column_color_1');
$col_color_2 = get_sub_field('column_color_2');
$col_color_3 = get_sub_field('column_color_3');
$col_color_4 = get_sub_field('column_color_4');

$rounded_1 = get_sub_field('rounded_corners_1');
$rounded_2 = get_sub_field('rounded_corners_2');
$rounded_3 = get_sub_field('rounded_corners_3');
$rounded_4 = get_sub_field('rounded_corners_4');

$col_border_1 = get_sub_field('col_border_1');
$col_border_2 = get_sub_field('col_border_2');
$col_border_3 = get_sub_field('col_border_3');
$col_border_4 = get_sub_field('col_border_4');

$icon_1 = get_sub_field('icon_1');
$icon_size_1 = get_sub_field('icon_size_1');
$icon_pos_1 = get_sub_field('icon_position_1');
$icon_2 = get_sub_field('icon_2');
$icon_size_2 = get_sub_field('icon_size_2');
$icon_pos_2 = get_sub_field('icon_position_2');
$icon_3 = get_sub_field('icon_3');
$icon_size_3 = get_sub_field('icon_size_3');
$icon_pos_3 = get_sub_field('icon_position_3');
$icon_4 = get_sub_field('icon_4');
$icon_size_4 = get_sub_field('icon_size_4');
$icon_pos_4 = get_sub_field('icon_position_4');

$headline_text_color = get_sub_field('headline_text_color');
$text_color_1 = get_sub_field('text_color_1');
$text_color_2 = get_sub_field('text_color_2');
$text_color_3 = get_sub_field('text_color_3');
$text_color_4 = get_sub_field('text_color_4');
	
?>


<?php if($full_width == 'yes'): ?>
	<div class="fluid-container" style="<?php if($bg_color): ?>background-color:<?php echo $bg_color; endif; ?>">
<?php endif; ?>

<div class="container fadeIn" data-scroll>
	<div class="row<?php if($border == 'yes'): echo ' row-border'; endif; ?><?php if($rounded == 'yes'): echo ' rounded-corners'; endif; ?><?php if($bg_color): echo ' padding'; endif; ?>" style="<?php if($bg_color): ?>background-color:<?php echo $bg_color; endif; ?>">
		
		<?php if(get_sub_field('headline')): ?>
			<div class="col-12">
				<h3 class="headline" style="<?php echo $headline_text_color; ?>"><?php the_sub_field('headline'); ?></h3>
			</div>
		<?php endif; ?>
		
		<div class="col-md-6 col-lg-3 column">
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
		<div class="col-md-6 col-lg-3 column">
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
		<div class="col-md-6 col-lg-3 column">
			<div class="flex-wrapper<?php if($col_border_3 == 'yes' || $col_color_3): echo ' padding'; endif; ?><?php if($col_border_3 == 'yes'): echo ' has-border'; endif; ?><?php if($rounded_3 == 'yes'): echo ' rounded-corners'; endif; ?> <?php echo $text_color_3; ?>" style="<?php if($col_color_3): ?>background-color:<?php echo $col_color_3; endif; ?>">
				
				<?php if( !empty($icon_3) ): ?>
					<div class="icon <?php echo $icon_pos_3; ?>">
						<img class="<?php echo $icon_size_3; ?>" src="<?php echo $icon_3['url']; ?>" alt="<?php echo $icon_3['alt']; ?>" />
					</div>
				<?php endif; ?>
				<div style="width:100%">
					<?php if(get_sub_field('sub_headline_3')): ?>
						<h3 class="sub-headline"><?php the_sub_field('sub_headline_3'); ?></h3>
					<?php endif; ?>
					<?php the_sub_field('text_copy_3'); ?>
				</div>
				
			</div>
		</div>
		<div class="col-md-6 col-lg-3 column">
			<div class="flex-wrapper<?php if($col_border_4 == 'yes' || $col_color_4): echo ' padding'; endif; ?><?php if($col_border_4 == 'yes'): echo ' has-border'; endif; ?><?php if($rounded_4 == 'yes'): echo ' rounded-corners'; endif; ?> <?php echo $text_color_4; ?>" style="<?php if($col_color_4): ?>background-color:<?php echo $col_color_4; endif; ?>">
				
				<?php if( !empty($icon_4) ): ?>
					<div class="icon <?php echo $icon_pos_4; ?>">
						<img class="<?php echo $icon_size_4; ?>" src="<?php echo $icon_4['url']; ?>" alt="<?php echo $icon_4['alt']; ?>" />
					</div>
				<?php endif; ?>
				<div style="width:100%">
					<?php if(get_sub_field('sub_headline_4')): ?>
						<h3 class="sub-headline"><?php the_sub_field('sub_headline_4'); ?></h3>
					<?php endif; ?>
					<?php the_sub_field('text_copy_4'); ?>
				</div>
				
			</div>
		</div>
	</div>
</div>

<?php if($full_width == 'yes'): ?>
	</div>
<?php endif; ?>

<?php endif; ?>