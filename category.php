<?php get_header(); ?>

<div class="row">
	<div class="medium-9 small-12 columns end">
		<h2 class="page-title"><span><?php single_cat_title() ?></span></h2>
		<?php $categorydesc = category_description(); if ( strlen($categorydesc) > 7 ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
	</div>
</div>

<?php while ( have_posts() ) : the_post(); ?>

<div <?php post_class("row"); ?>>
	<div class="medium-9 small-12 columns">
		<a href="<?php the_permalink(); ?>" class="headline"><?php the_title(); ?></a>
		<?php the_excerpt(); ?>
	</div>
	<div class="hide-for-small medium-1 columns">
		&nbsp;
	</div>
	<div class="entry-meta hide-for-small medium-2 columns">
		<span class="info">By <?php the_author(); ?></span>
		<span class="info"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time('F j, Y') ?></abbr></span>
		<span class="info"><?php the_tags(); ?></span>
	</div>
</div>

<?php endwhile; ?>

<div id="nav-below" class="navigation">
	<?php next_posts_link('<div class="nav-previous hide-for-small">&larr; Older Posts</div>') ?>
	<?php previous_posts_link( '<div class="nav-next hide-for-small">Newer posts &rarr;</div>') ?>
</div>

<?php get_footer(); ?>
