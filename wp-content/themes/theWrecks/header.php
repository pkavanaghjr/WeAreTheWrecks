<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">

<title> <?php wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>

<!-- START: Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71874838-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-71874838-3');
</script>
<!-- END: GOOGLE ANALYTICS -->

</head>

<body <?php body_class(); ?>>
<div class="wrapper">
	<header role="banner" class="header">

	<!-- MIDNIGHT HEADERS	 -->
		<?php if( have_rows('midnight_headers','option') ): ?>
			<nav class="fixed hide-nav">
	        <?php while ( have_rows('midnight_headers','option') ) : the_row(); ?>
	            
	        	<?php if( get_row_layout() == 'unique_midnight_header' ): ?>
		            <div class="midnightHeader <?php the_sub_field('midnight_header_name','option') ?>">
						<div class="container title-container">
				            <h1 class="page-title desktop-toggle"><span class="nav-toggle desktop-toggle">&#9776;</span><?php the_sub_field('midnight_header_title','option') ?></h1>
				            <h1 class="page-title mobile-toggle"><span class="nav-toggle mobile-toggle">&#9776;</span><?php the_sub_field('midnight_header_title','option') ?></h1>
				        </div>
				        <!-- NAVIGATION ITEMS -->
						<nav class="hidden-navigation">
							<div class="container">
								<div class="nav-toggle desktop-toggle">&#9776;</div>
								<div class="nav-toggle mobile-toggle">&#9776;</div>
								<?php wp_nav_menu( array('menu' => 'Primary Menu' )); ?>
							</div>
						</nav>
					</div>    

				<?php endif; ?>  
	        <?php endwhile; ?>
	    	</nav>
	    <?php endif; ?>  

	</header>







