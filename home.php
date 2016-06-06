<?php get_header(); ?>

<?php
        $stickyPosts = get_option('sticky_posts');
        $args = array(
                'posts_per_page' => 1,
                'post__in'  => $stickyPosts,
                'ignore_sticky_posts' => 1,
                'category__in' => array(4,5,112)
        );
        $the_query = new WP_Query($args);
        $the_query->the_post();
        array_push($stickyPosts, get_the_ID());
?>

<div class="row featured-content">
                        <div class="small-12 medium-3 columns world-quick-summary">
                                In 2104 the first colonization flights leave Earth for the habitable worlds discovered just over eight light years away. This would be the beginning of man's settlement of the stars.<br/><br/>
                                In 2169, fed up with Earth's interference in their affairs, the people of the colonial star cluster declare their independence and form the Unified Republic of Stars.<br/><br/>
                                <strong>It is the start of one hundred and fifty years of conflict between the people of the young Republic and the human home world.</strong><br/><br/>
                                These are the stories and facts about the first human colonies and their fight for freedom.<br/><br/>
                        </div>

                        <div class="small-12 medium-8 columns main-story">
                                <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<?php urs_featured_excerpt(); ?>
                                <p class="more-link right"><a href="<?php the_permalink() ?>">Read More...</a></p>
                        </div>
                </div>

                <div class="row secondary-story-container" data-equalizer>
			<?php $wiki = urs_get_wiki_content(); ?>
			<?php if ($wiki) : ?>
                        <div class="small-12 medium-4 columns homepage-secondary-story" data-equalizer-watch>
                                <h3><a href="<?php echo($wiki['url']); ?>" title="<?php echo($wiki['title']); ?>">Reference: <?php echo($wiki['title']); ?></a></h3>
                                <span class="homepage-byline"><a href="/wiki/index.php/Main_Page">From the Reference Wiki</a></span>
				 <?php if (sizeof($wiki['image'])) : ?>
					<a href="<?php echo($wiki['url']); ?>"><img src="<?php echo($wiki['image']['url']); ?>" width="<?php echo($wiki['image']['width']); ?>" height="<?php echo($wiki['image']['height']); ?>"></a>
				<?php else: ?>
				<p><?php echo($wiki['summary']); ?></p>
				<?php endif; ?>
                                <p class="more-link right"><a href="<?php echo($wiki['url']); ?>" title="Keep reading <?php echo($wiki['title']); ?>">Read More <span class="meta-nav">...</span></a></p>
                        </div>
			<?php endif; ?>

			<?php
				$args = array(
					'posts_per_page' => 1,
					'post__not_in'  => $stickyPosts,
					'category__in' => array(4,5,112,128)
				);
				$the_query = new WP_Query($args);
				$the_query->the_post();
				array_push($stickyPosts, get_the_ID());
				$latest_cats = get_the_category();
			?>
                        <div class="small-12 medium-4 columns homepage-secondary-story" data-equalizer-watch>
                                <h3><a href="<?php the_permalink() ?>"><?php if ($latest_cats[0]->cat_ID == 128) { ?>Podcast: <?php } ?><?php the_title() ?></a></h3>
                                <span class="homepage-byline">by <?php the_author(); ?></span>
				<?php the_excerpt(); ?>
                                <p class="more-link right"><a href="<?php the_permalink() ?>" title="Keep reading <?php the_title() ?>">Read More <span class="meta-nav">...</span></a></p>
				<p class="text-right published"><abbr title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time('F j, Y') ?> </abbr></p>
                        </div>

			<?php
				$args = array(
					'cat' => 53,
					'posts_per_page' => 1,
					'post__not_in' => $stickyPosts
				);
				$the_query = new WP_Query($args);
				$the_query->the_post()
			?>
                        <div class="small-12 medium-4 columns homepage-secondary-story" data-equalizer-watch>
                                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                <span class="homepage-byline">by <?php the_author(); ?></span>
				<?php the_excerpt(); ?>
                                <p class="more-link right"><a href="<?php the_permalink() ?>" title="Keep reading ‘Junichiro Niwa’">Read More <span class="meta-nav">...</span></a></p>
				<p class="text-right published"><abbr title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time('F j, Y') ?> </abbr></p>
                        </div>
                </div>

<?php get_footer(); ?>
