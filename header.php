<?php //mapi_mobile_header('class', TRUE, FALSE); ?>
<!DOCTYPE HTML>
<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]>
<html <?php language_attributes(); ?> class="no-js"><![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&rsaquo;'); ?></title>
	<?php blankout_copyright(); ?>
	<!--[if IE]>
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />	<![endif]-->
	<meta name="HandheldFriendly" content="True" />
	<meta name="MobileOptimized" content="320" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<?php if(function_exists('mapi_get_favicon_url') && mapi_get_favicon_url() != NULL) : ?>
		<link rel="shortcut icon" href="<?php echo mapi_get_favicon_url(); ?>" />
	<?php else : ?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" />
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" href="<?php echo get_feed_link(); ?>" title="<?php echo esc_html(get_bloginfo('name')); ?> latest updates" />

	<?php if(function_exists('mapi_is_true') && mapi_is_true(get_option('default_comment_status'))) : ?>
		<link rel="alternate" type="application/rss+xml" href="<?php echo get_post_comments_feed_link(); ?>" title="<?php echo esc_html(get_bloginfo('name')); ?> recent comments" />
	<?php endif; ?>

	<?php if(function_exists('mapi_is_true') && mapi_is_true(get_option('default_ping_status'))) : ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php endif; ?>
	<link href='//fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic|Source+Code+Pro:400,600,700|Oswald:400,700,300' rel='stylesheet' type='text/css' />

	<?php wp_head(); ?>


	<?php blankout_enable_nav_hover(); ?>
</head>
<body <?php body_class(); ?>>
<a id="top"></a>

<div class="container">
	<header class="header" role="banner">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"><?php _e('Toggle navigation', 'blankout'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
				</button>
				<?php if(get_theme_mod('menu_title')) : ?>
					<a class="navbar-brand" id="logo" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
				<?php endif; ?>
			</div>
			<div class="collapse navbar-collapse">
				<?php
				if(has_nav_menu('main-nav')) {
					wp_nav_menu(
						array(
							'container'       => ' ',
							'container_class' => 'nav',
							'fallback_cb'     => 'wp_page_menu',
							'menu'            => 'main-nav',
							'menu_class'      => 'nav navbar-nav',
							'theme_location'  => 'main-nav',
							'depth'           => '2',
							'walker'          => new Blankout_Menu_Walker()
						)
					);
				} ?>
			</div>
		</nav>
	</header>
</div>
