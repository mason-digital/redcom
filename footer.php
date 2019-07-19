		<?php if( !is_page_template( 'template_basic-blank-page.php' ) ): ?>
		<?php $slide_form = get_field('slide_out','option'); ?>
		<div id="contact-wrap">
			<div id="contact-cta">
				<div class="contact-content">
					<p class="contact-title"><?php echo $slide_form['title'] ?></p>
					<p class="contact-subtitle"><?php echo $slide_form['subtitle'] ?></p>
					<?php echo $slide_form['form_code'] ?>
				</div>
				<a id="contact-tab">
					<div class="tab-content"><?php echo $slide_form['tab_text'] ?></div>
				</a>
			</div>
		</div>
		<?php endif; ?>

		<?php // Hide Footer on these pages
		if( !is_page_template( array('template_landing-page.php','template_basic-blank-page.php') ) ): ?>
		
		<footer id="footer" role="contentinfo">
  			<div class="container">
	  			<div class="row">
		  			<div class="col-6 col-lg-4">
						<div class="site-logo">
							<?php $site_logo = get_field('site_logo','option')?>
							<a href="/" aria-label="Link to Homepage"><img src="<?php echo $site_logo['url']; ?>" alt="<?php echo $site_logo['alt']; ?>"></a>
						</div>
						<div class="site-info">
							<?php $company_info = get_field('company_info','option'); ?>
							<p><?php echo $company_info['address_line_1'] ?></p>
							<p><?php echo $company_info['address_line_2'] ?></p>
							<p><?php echo $company_info['phone_number'] ?></p>
						</div>
						<div class="social">
							<?php $social = get_field('social_media','option'); ?>
							<a href="<?php echo $social['linkedin'] ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
							<a href="<?php echo $social['twitter'] ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
							<a href="<?php echo $social['facebook'] ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
							<a href="<?php echo $social['youtube'] ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
						</div>
		  			</div>
		  			<div class="col-6 col-lg-4">
			  			<h3 class="footer-title">Explore</h3>
			  			<nav id="footer-menu" role="navigation">
			  				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'depth' => 1  ) ); ?>
			  			</nav>
		  			</div>
		  			<div class="col-lg-4">
			  			
			  		<!-- SharpSpring Form for Stay in the loop!  -->
					<script type="text/javascript">
					    var ss_form = {'account': 'MzawMDEzMzY3AwA', 'formID': 'MzRINUkzNE3SNU5NTNE1sTQx0bUwsTDVNbBIMk1NNjIxTDQ2BAA'};
					    ss_form.width = '100%';
					    ss_form.height = '1000';
					    ss_form.domain = 'app-3QNDP85EQS.marketingautomation.services';
					    ss_form.hidden = {'Company': 'Anon', '_usePlaceholders': true}; // Modify this for sending hidden variables, or overriding values
					</script>
					<script type="text/javascript" src="https://koi-3QNDP85EQS.marketingautomation.services/client/form.js?ver=1.1.1"></script>	
			  			
		  			</div>
	  			</div>
	  			<div class="row footer-bottom">
		  			<div class="col-md-5">
			  			<p>&copy; <?php echo date("Y"); ?> REDCOM LABORATORIES, INC.</p>
		  			</div>
		  			<div class="col-md-7 menu">
			  			<nav id="footer-menu" role="navigation">
			  				<?php wp_nav_menu( array( 'theme_location' => 'footer-bottom', 'depth' => 1  ) ); ?>
			  			</nav>
		  			</div>
	  			</div>
			</div>
		</footer>
		<?php endif; ?>
		
		<?php get_template_part('template-parts/gdpr'); ?>
		
		</div><!-- end #canvas -->
		</div><!-- end #body-wrapper -->
		
		<?php wp_footer(); ?>
		
		<? // $-Testimonial Slick Slider ?>
		<script>
		jQuery(document).ready(function($){
		  $('.testimonials').slick({
		    infinite: true,
		  });
		});
		</script>
		
		<? // $-.Logo Block Slick Slider ?>
		<?php 
			if( have_rows('page_content') ):
			while ( have_rows('page_content') ) : the_row(); 
				if( get_row_layout() == 'logo_gallery' ):
					$autoplay = get_sub_field( 'autoplay' );
					$speed = get_sub_field( 'speed' );
				endif;
			endwhile; endif;
		?>
		<script>
		jQuery(document).ready(function($){
		  $('.gallery-slick').slick({
		    infinite: true,
		    slidesToShow: 5,
		    autoplay: <?php if($autoplay): echo $autoplay; else: echo 'false'; endif; ?>,
		    autoplaySpeed: <?php if($speed): echo $speed; else: echo '600'; endif; ?>,
		    speed: 600,
		    responsive: [
			{
		      breakpoint: 1200,
		      settings: {slidesToShow:4}
		    },
		    {
		      breakpoint: 991,
		      settings: {slidesToShow:3}
		    },
		    {
		      breakpoint: 767,
		      settings: {slidesToShow:2}
		    },
		    {
		      breakpoint: 480,
		      settings: {slidesToShow:1}
		    }
		  ]
		  });
		});
		</script>
		
		<? // $-Init for on scroll animation ?>
		<script>
		document.addEventListener('DOMContentLoaded', function(){
		  var trigger = new ScrollTrigger({
		    toggle: {
		      visible: 'visible',
		      hidden: 'hidden'
		    },
		    offset: {
		      x: 0,
		      y: 80
		    },
		    centerVertical: false,
		    once: true
		  }, document.body, window);
		});
		</script>
		
		<? // $-Isotope ?>
		<script>
		jQuery(document).ready(function($){
			
			var buttonFilter;
			var qsRegex;
			
			var $grid = $('.grid').isotope({
				itemSelector: '.grid-item',
				layoutMode: 'fitRows',
				filter: function() {
				    var $this = $(this);
				    var searchResult = qsRegex ? $this.find('h3').text().match( qsRegex ) : true;
				    var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
				    return searchResult && buttonResult;
				  }
				
			});
			
/*
			// bind filter button click
			$('.filters-button-group').on( 'click', 'button', function() {
			  var filterValue = $( this ).attr('data-filter');
			  // use filterFn if matches value
			  buttonFilter = filterFns[ filterValue ] || filterValue;
			  $grid.isotope();
			});
*/
			// change is-checked class on buttons
			$('.button-group').each( function( i, buttonGroup ) {
			  var $buttonGroup = $( buttonGroup );
			  $buttonGroup.on( 'click', 'button', function() {
			    $buttonGroup.find('.is-checked').removeClass('is-checked');
			    $( this ).addClass('is-checked');
			  });
			});
			
						

			var $selects = $('.filters-select');
			$selects.add( $selects ).on("change", function() {
			  // map input values to an array
			  var exclusives = [];
			  $selects.each( function( i, elem ) {
			    if ( elem.value ) {
			      exclusives.push( elem.value );
			    }
			  });
			 exclusives = exclusives.join('');
			 buttonFilter = exclusives;
			
			   //$grid.isotope({ filter: filterValue });
			   $grid.isotope();
			});

			
			// store filter for each group
			var filters = {};
			
			$('.filter-button-group').on( 'click', '.button', function() {
			  var $this = $(this);
			  // get group key
			  var $buttonGroup = $this.parents('.button-group');
			  var filterGroup = $buttonGroup.attr('data-filter-group');
			  // set filter for group
			  filters[ filterGroup ] = $this.attr('data-filter');
			  // combine filters
			  buttonFilter = concatValues( filters );
			  $grid.isotope();
			});
			
			var $quicksearch = $('#quicksearch').keyup( debounce( function() {
			  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
			  $grid.isotope();
			}) );
			
			// flatten object by concatting values
			function concatValues( obj ) {
			  var value = '';
			  for ( var prop in obj ) {
			    value += obj[ prop ];
			  }
			  return value;
			}
			
			function debounce( fn, threshold ) {
			  var timeout;
			  threshold = threshold || 100;
			  return function debounced() {
			    clearTimeout( timeout );
			    var args = arguments;
			    var _this = this;
			    function delayed() {
			      fn.apply( _this, args );
			    }
			    timeout = setTimeout( delayed, threshold );
			  };
			}
			
		});
		</script>
		
	</body>
</html>