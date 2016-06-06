<!-- PODCAST -->
<?php get_header(); ?>

<?php query_posts('category_name=podcast&posts_per_page=20'); ?>

<?php $count = 0; ?>
<?php while ( have_posts() ) : the_post(); ?>


<?php
if (function_exists('powerpress_get_enclosure_data')) { 
	$enclosure = powerpress_get_enclosure_data(get_the_ID());
}
?>

<?php if ($count == 0) : ?>
	<div <?php post_class("row"); ?>>
		<ul class="hide-for-medium hide-for-large small-block-grid-3">
			<li><a class="podcast-link" href="/feed/podcast"><img src="<?php bloginfo('stylesheet_directory') ?>/img/click-subscribe.png" class="podcast-link"/></a></li>
			<li><a class="podcast-link" href="http://www.stitcher.com/podcast/unified-republic-of-stars-podcast"><img src="<?php bloginfo('stylesheet_directory') ?>/img/stitcher-subscribe.png" class="podcast-link"/></a></li>
			<li><a class="podcast-link" href="https://itunes.apple.com/us/podcast/unified-republic-stars-podcast/id915564793"><img src="<?php bloginfo('stylesheet_directory') ?>/img/subscribe-itunes.png" class="podcast-link"/></a></li>
		</ul>
		<div class="small-11 medium-11 columns end featured">
			<h3>Latest Episode</h3>
			<div class="row">
				<div class="small-12 medium-9 large-6 columns">
					<div class="podcast featured">
						<h3><?php the_title(); ?></h3>
						<audio src="<?php echo $enclosure['url']; ?>" style="width:100%;height:100%" width="640px" height="352px" preload="metadata"/>
					</div>
				</div>
				<div class="hide-for-small medium-3 large-6 columns">
					<a class="podcast-link" href="/feed/podcast"><img src="<?php bloginfo('stylesheet_directory') ?>/img/click-subscribe.png" class="podcast-link"/></a><br/>
					<a class="podcast-link" href="http://www.stitcher.com/podcast/unified-republic-of-stars-podcast"><img src="<?php bloginfo('stylesheet_directory') ?>/img/stitcher-subscribe.png" class="podcast-link"/></a><br/>
					<a class="podcast-link" href="https://itunes.apple.com/us/podcast/unified-republic-stars-podcast/id915564793"><img src="<?php bloginfo('stylesheet_directory') ?>/img/subscribe-itunes.png" class="podcast-link"/></a>
				</div>
			</div>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="podcast shownotes-link right">Read the show notes...</a>
		</div>
	</div>

<?php else: ?>

	<div <?php post_class("row"); ?>>
		<div class="small-11 medium-11 columns end podcast">
			<!--
			<div class="podcast-audio-container">
			<audio src="<?php echo $enclosure['url']; ?>" preload="metadata"/>
			</div>
			-->
			<a href="<?php the_permalink(); ?>" class="headline"><?php the_title(); ?></a>
			<?php the_excerpt(); ?>
		</div>
	<!--
	<div class="entry-meta hide-for-small medium-2 columns">
		<span class="info">By <?php the_author(); ?></span>
		<span class="info"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time('F j, Y') ?></abbr></span>
		<span class="info"><?php the_tags(); ?></span>
	</div>
	-->
	</div>
<?php endif; ?>

<?php $count++; ?>
<?php endwhile; ?>

<div id="nav-below" class="navigation">
	<?php next_posts_link('<div class="nav-previous hide-for-small">&larr; Older Posts</div>') ?>
	<?php previous_posts_link( '<div class="nav-next hide-for-small">Newer posts &rarr;</div>') ?>
</div>

<?php get_footer(); ?>
