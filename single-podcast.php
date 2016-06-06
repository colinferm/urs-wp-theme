<?php
if (function_exists('powerpress_get_enclosure_data')) {
        $enclosure = powerpress_get_enclosure_data(get_the_ID());
}
?>
<div id="container" <?php post_class("row"); ?>>
	<div class="small-11 medium-11 large-9 columns end featured">
		<div class="row">
			<div class="small-12 medium-9 large-7 columns">
				<div class="podcast featured">
					<h3><?php the_title(); ?></h3>
					<audio src="<?php echo $enclosure['url']; ?>" style="width:100%;height:100%" width="640px" height="352px" controls="controls" preload="metadata"/>
				</div>
			</div>
			<div class="hide-for-small medium-3 large-5 columns">
				<a class="podcast-link" href="/feed/podcast"><img src="<?php bloginfo('stylesheet_directory') ?>/img/click-subscribe.png" class="podcast-link"/></a><br/>
				<a class="podcast-link" href="http://www.stitcher.com/podcast/unified-republic-of-stars-podcast"><img src="<?php bloginfo('stylesheet_directory') ?>/img/stitcher-subscribe.png" class="podcast-link"/></a><br/>
				<a class="podcast-link" href="https://itunes.apple.com/us/podcast/unified-republic-stars-podcast/id915564793"><img src="<?php bloginfo('stylesheet_directory') ?>/img/subscribe-itunes.png" class="podcast-link"/></a>
			</div>
		</div>
	</div>
	<ul class="hide-for-medium hide-for-large small-block-grid-3">
		<li><a class="podcast-link" href="/feed/podcast"><img src="<?php bloginfo('stylesheet_directory') ?>/img/click-subscribe.png" class="podcast-link"/></a></li>
		<li><a class="podcast-link" href="http://www.stitcher.com/podcast/unified-republic-of-stars-podcast"><img src="<?php bloginfo('stylesheet_directory') ?>/img/stitcher-subscribe.png" class="podcast-link"/></a></li>
		<li><a class="podcast-link" href="https://itunes.apple.com/us/podcast/unified-republic-stars-podcast/id915564793"><img src="<?php bloginfo('stylesheet_directory') ?>/img/subscribe-itunes.png" class="podcast-link"/></a></li>
	</ul>
	<div id="content" role="main" class="small-12 medium-10 columns">
		<div id="content-container" <?php post_class() ?>>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
		<div id="nav-below" class="navigation">
			<?php previous_post_link( '%link', '<div class="nav-previous hide-for-small">&larr; %title</div>', true ) ?>
			<?php next_post_link( '%link', '<div class="nav-next hide-for-small">%title &rarr;</div>', true ) ?>
		</div>
	</div>
	<div class="entry-meta hide-for-small medium-2 columns">
               	<span class="info"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time('F j, Y') ?></abbr></span>
               	<span class="info"><?php the_tags(); ?></span>
	</div>
</div>
