<!doctype html>
<!-- AWS -->
<html class="no-js" lang="en">
        <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title><?php wp_title( '-', true, 'right' ); bloginfo('name'); ?></title>
		<meta property="twitter:account_id" content="225953647" />


		<?php if (has_post_thumbnail($post->ID)) {
			$thumbId = get_post_thumbnail_id($post->ID);
			$thumbInfo = wp_get_attachment_image_src($thumbId, 'facebook-thumb');
			$gallery = get_post_gallery_images();
			?>
			<?php if ($gallery) { ?>
				<meta name="twitter:card" content="gallery" />
			<?php } else { ?>
				<meta name="twitter:card" content="summary_large_image" />
				<meta name="twitter:image" content="<?php echo $thumbInfo[0]; ?>" />
			<?php } ?>
			<link rel="image_src" href="<?php echo $thumbInfo[0]; ?>" />
			<meta property="og:image" content="<?php echo $thumbInfo[0]; ?>" />
			<?php 
				if ($gallery) {
					$imageCount = 0;
					foreach ($gallery as $img) {
			?>
						<meta name="twitter:image<?php echo $imageCount; ?>" content="<?php echo $img; ?>" />
			<?php
						$imageCount++;
						if ($imageCount > 3) break;
					}
				}
			?>
				
		<?php } else { ?>
			<meta name="twitter:card" content="summary" />
		<?php } ?>
		<meta name="twitter:site" content="@republicofstars" />
		<meta name="twitter:creator" content="@republicofstars" />
		<meta property="og:type" content="article" />
		<meta property="fb:app_id" content="360908660620743" />
		<meta property="article:publisher" content="https://www.facebook.com/pages/Unified-Republic-of-Stars/178877245482146" />
		<?php if (is_home()) : ?>
			<meta name="twitter:title" content="<?php bloginfo('name'); ?>" />
			<meta property="og:url" content="<?php bloginfo('url'); ?>" />
			<meta property="og:title" content="<?php bloginfo('name'); ?>" />
		<?php else : ?>
			<meta name="twitter:title" content="<?php wp_title( '', true, 'right' ); ?>" />
			<meta property="og:url" content="<?php the_permalink(); ?>" />
			<meta property="og:title" content="<?php wp_title( '', true, 'right' ); ?>" />
		<?php endif; ?>
		<meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
		<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/css/foundation.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/css/urs.css" />
		<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
		<?php wp_head(); ?>
<?php if (!is_preview() && !is_super_admin()) : ?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-3956854-2', 'auto');
ga('send', 'pageview');
</script>
<?php endif; ?>
        </head>

        <body <?php body_class(); ?>>

                <div id="home-banner-container" class="large-centered">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/img/background-spaceman03.jpg" class="home-banner">
                </div>
		<div class="sticky" data-options="sticky_on: large">
                	<nav class="top-bar" data-topbar>
	                        <ul class="title-area">
	                                <li class="name"><h1><a href="/">The Unified Republic of Stars</a></h1></li>
	                                <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
	                        </ul>

	                        <section class="top-bar-section">
					<?php
						$menu = wp_nav_menu(array(
							'theme_location' => 'header-menu',
							'container' => 'section',
							'container_class' => 'top-bar-section',
							'menu_class' => 'right',
							'items_wrap' => '<ul id="%1$s" class="%2$s right">%3$s</ul>',
							'echo' => false
						));
						$menu = str_replace( array( "\r", "\n", "\t" ), '', trim($menu) );
						echo $menu;
					?>
					<?php /*
	                                <ul class="right">
	                                        <li><a href="#">About</a><li>
	                                        <li class="has-dropdown">
	                                                <a href="#">Contribute</a>
	                                                <ul class="dropdown">
	                                                        <li><a href="#">Story Generator</a></li>
	                                                </ul>
	                                        </li>
	                                        <li class="has-dropdown">
	                                                <a href="#">Reference</a>
	                                                <ul class="dropdown">
	                                                        <li><a href="#">Planets</a></li>
	                                                        <li><a href="#">Categories</a></li>
	                                                        <li><a href="#">Books</a></li>
	                                                        <li><a href="#">Timeline</a></li>
	                                                        <li><a href="#">Help</a></li>
	                                                </ul>
	                                        </li>
	                                        <li><a href="#">Blog</a></li>
	                                </ul>
					*/ ?>
	                        </section>
	                </nav>
                </div>
