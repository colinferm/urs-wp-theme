<div id="container" class="row">
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="small-12 medium-10 column end featured-banner-container">
			<?php the_post_thumbnail('featured-banner'); ?>
		</div>
	<?php } ?>
	<div id="content" role="main" class="small-12 medium-10 columns">
		<div id="content-container" <?php post_class() ?>>
			<h2 class="entry-title"><?php the_title(); ?></h2>
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
               	<span class="info">By <?php the_author(); ?></span>
               	<span class="info"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time('F j, Y') ?></abbr></span>
               	<span class="info"><?php the_tags(); ?></span>
		<span class="comments-link"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo($pageUrl); ?>" data-count="horizontal" data-via="republicofstars">Tweet</a></span>
		<span class="comments-link"><div class="fb-like" data-href="<?php echo $pageUrl; ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div></span>
		<span class="comments-link"><g:plusone></g:plusone></span>
	</div>
</div>
