<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MHMVG2B');</script>
	<!-- End Google Tag Manager -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MHMVG2B" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="page" class="site">


		<header id="masthead" class="site-header">
			<div class="container">
				<nav class="navbar navbar-expand-md navbar-light">
					<a class="navbar-brand" href="<?php echo site_url(); ?>">
						<img src="<?php echo get_field('logo', 'option') ;  ?> " alt="ReSensation&trade; Logo">
					</a>
					<div class="mob-icon">
						<div class="search-icon">
							<span class="icon">
								<a onclick="fbq('track', 'Lead');" href="<?php echo get_field('mobile_menu_find_a_surgeon','option'); ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
								</span>
						</div>	
						<div class="icon-ep">
							<a onclick="fbq('track', 'CompleteRegistration');" href="<?php echo get_field('mobile_menu_find_a_surgeon_copy','option'); ?>">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								</a>		
						</div>	
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse menu" id="navbarSupportedContent">
						<?php
						wp_nav_menu( array(
							'menu' => 'header',
							'menu_class' => 'navbar-nav',
							'container' => 'ul',
						) );
						?>
					</div>
					<div class="top-buttons">
						<?php
						wp_nav_menu( array(
							'menu' => 'HeaderButtons',
							'container' => 'ul',
						) );
						?>
					</div>
              
         </nav><!-- #site-navigation -->
     </div>
 </header><!-- #masthead -->

 <div id="content" class="site-content">
