<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<meta name="google-site-verification" content="O_A4_KYOlPHpaNxYtD5lwY2btDAqK-Cx2JrQpti1lCo" />
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		<!-- Sharp Spring -->
		<script type="text/javascript">
		var _ss = _ss || [];
		_ss.push(['_setDomain', 'https://koi-3QNDP85EQS.marketingautomation.services/net']);
		_ss.push(['_setAccount', 'KOI-3ZXO7GUBOI']);
		_ss.push(['_trackPageView']);
		(function() {
		    var ss = document.createElement('script');
		    ss.type = 'text/javascript'; ss.async = true;
		    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3QNDP85EQS.marketingautomation.services/client/ss.js?ver=1.1.1';
		    var scr = document.getElementsByTagName('script')[0];
		    scr.parentNode.insertBefore(ss, scr);
		})();
		</script>
		
		<?php wp_head(); ?>
	</head>	
	<body <?php body_class(); ?>>
		
	<? // Body Wrapper ?>
	<div id="body-wrapper">
	
	<div id="nav-panel">
		<div class="wrapper">
			<nav id="menu" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</nav>
		</div>
	</div>
	
	<div id="canvas"><!- Site Body Containter ->
		
		<?php // Show SVG background on some template pages ?>
		<?php if( is_page_template( array('template-market-page.php','template-about-page.php','template-capability-page.php') ) ): ?>	
			<svg class="body-svg" viewBox="0 0 100 100" preserveAspectRatio="none">
				<polygon points="0,0 100,100 0,100"/>
			</svg>
		<?php endif; ?>	
		
		<?php // Hide Header on these pages
		if( !is_page_template( array('template_landing-page.php','template_basic-blank-page.php') ) ): ?>
		
		<header id="header" role="banner">
			
			<div id="top-bar">
				<div class="container">
					<div class="social">
						<?php $social = get_field('social_media','option'); ?>
						<a href="<?php echo $social['linkedin'] ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
						<a href="<?php echo $social['twitter'] ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
						<a href="<?php echo $social['facebook'] ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
						<a href="<?php echo $social['youtube'] ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
						<a href="/contact"><i class="fas fa-envelope"></i></a>
					</div>
					<div class="info">
						
						<div class="portals">
							<a class="portals-toggle"><span class="fas fa-angle-down"></span>Portals</a>
							<nav class="portals-menu" role="navigation">
			  					<?php wp_nav_menu( array( 'theme_location' => 'portals-menu', 'depth' => 1  ) ); ?>
			  				</nav>
						</div>
						
						<?php $company_info = get_field('company_info','option'); ?>
						<div class="phone"><a href="tel:+1<?php echo $company_info['phone_number'] ?>" aria-label="REDCOM Phone Number"><span class="fas fa-phone"></span><span class="mobile-no-show"><?php echo $company_info['phone_number'] ?></span><span class="mobile-show">Call Now</span></a></div>
						
						<div class="search">
							<a class="search-toggle" aria-label="Search"><span class="fas fa-search"></span>Search</a>
							<div class="search-box">
								<form role="search" method="get" id="searchform" class="searchform" action="/">
									<div class="search-box-container">
										<input type="text" value="" name="s" id="s" placeholder="Search..." />
										<button type="submit" id="searchsubmit"><span class="fas fa-arrow-right"></span></button>
									</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
			<div id="header-content">
								
				<div class="container">
					
					<div class="top-row">
						<div id="site-logo">
							<?php $site_logo = get_field('site_logo','option')?>
							<a href="/" aria-label="Link to Homepage"><img src="<?php echo $site_logo['url']; ?>" alt="REDCOM Logo"></a>
						</div>
						<a id="nav-toggle" aria-label="Mobile Navigation Menu">Menu</i></a>	
					</div>
					<div class="bottom-row">	
						<nav id="menu" role="navigation">
							<?php wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'menu_class'     => 'menu',
								'walker' => new Redcom_Walker()
							) ); ?>
						</nav>
					</div>
					<?php if(is_front_page()): ?>
					<div class="hero-title">
						<?php $hero = get_field('hero'); ?>
						<h1><?php echo $hero['hero_title']; ?></h1>
					</div>
					<?php endif; ?>
					
					<?php if( !is_front_page() && !is_search() && !is_page_template(array('template-market-page.php','template-about-page.php','template-capability-page.php')) && !is_singular(array('products','success_stories','use_cases','post','events')) ): ?>
					<header class="entry-title">
						<?php if(get_field('custom_page_title')): ?>
							<h1><?php the_field('custom_page_title'); ?>
						<?php elseif(is_singular('knowledge_base')): ?>
							<h1>Knowledge Base</h1>
						<?php elseif(is_singular('careers')): ?>
							<h1>Careers at REDCOM</h1>
						<?php else: ?>
							<h1><?php the_title(); ?></h1>
						<?php endif; ?>
						<?php if( is_single() && get_field('team_title') ): ?>
							<h2 class="team-title"><?php the_field('team_title'); ?></h2>
						<?php endif; ?>	
						<?php if(get_field('custom_page_subtitle')): ?>
							<h2 class="subtitle"><?php the_field('custom_page_subtitle'); ?></h2>
						<?php endif; ?>
	        		</header>
	        		<?php endif; ?>        		
				</div>			
	
			</div>
			
			<svg viewBox="0 0 100 100" preserveAspectRatio="none">
				<polygon points="0,0 100,0 0,100"/>
			</svg>
			
		</header>
		
		<?php endif; ?>
		