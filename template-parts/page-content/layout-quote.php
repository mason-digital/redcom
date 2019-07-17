<?php if( get_row_layout() == 'quote' ): ?>

<div class="container fadeIn" data-scroll>
	<div class="row">
		<div class="col">
			<div class="wrapper">
				<i class="fas fa-quote-left quotation"></i>
				<div class="quote-wrapper">
					<?php the_sub_field('the_quote'); ?>
					<div class="name"><?php the_sub_field('name'); ?> - <?php the_sub_field('title'); ?></div>
				</div>
				<i class="fas fa-quote-right quotation"></i>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>