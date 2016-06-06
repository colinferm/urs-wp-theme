<?php
get_header();
the_post();
?>
<div id="container" class="row">
                        <?php the_post_thumbnail('featured-banner'); ?>
        <div id="content" role="main" class="small-12 medium-10 columns">
                <div id="content-container" <?php post_class() ?>>
                        <h2 class="entry-title"><?php the_title(); ?></h2>
                        <div class="entry-content">
				<?php if (wp_attachment_is_image($post->id)) {
					$att_image = wp_get_attachment_image_src( $post->id, array(800,800));
				?>
					<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>">
					<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
					</a>
					<?php the_content(); ?>
				<?php } ?>
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

<?php	
get_footer();
?>
