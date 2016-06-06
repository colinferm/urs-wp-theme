<?php get_header(); ?>
<?php the_post(); ?>
<div id="container" class="row">
	<div id="content" role="main" class="small-12 medium-10 columns">
		<div id="content-container" <?php post_class() ?>>
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<div class="entry-meta hide-for-small medium-2 columns">
               	<span class="info">By <?php the_author(); ?></span>
               	<span class="info"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time('F j, Y') ?></abbr></span>
               	<span class="info"><?php the_tags(); ?></span>
	</div>
</div>
<?php get_footer(); ?>
