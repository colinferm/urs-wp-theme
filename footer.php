<section class="large-centered footer-container">
                        <div class="row">
                                <div class="large-4 medium-4 columns">
                                        <ul class="xoxo">
						<?php dynamic_sidebar(1); ?>
						<li style="margin-top:1em;"><a href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img src="/wp-content/themes/new-urs-theme/img/CC-BY-NC-SA.png" border="0"></a></li>
                                        </ul>
                                </div>
                                <div class="large-4 medium-4 columns">
                                        <ul class="xoxo">
						<?php dynamic_sidebar(2); ?>
                                        </ul>

                                </div>
                                <div class="large-4 medium-4 columns">
                                        <ul class="xoxo">
						<?php dynamic_sidebar(3); ?>

                                                <li id="urs search-3" class="widget urs_widget_search">
                                                        <h3 class="widgettitle">Search</h3>
                                                        <form action="/reference/Special:Search" id="searchform">
                                                        <div>
                                                                <input id="s" name="search" type="text" />
                                                                <input type="submit" name="fulltext" class="tiny button secondary radius" id="searchsubmit" value="Search" />
                                                        </div>
                                                        </form>
                                                </li>
                                        </ul>
                                </div>
                        </div>
                </section>
                <script>
                jQuery(document).foundation();
                </script>
		<?php wp_footer() ?>
		<script type="text/javascript">
                (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                })();
        	</script>
        <script type='text/javascript' src='/wp-content/themes/new-urs-theme/js/social.js?ver=1.0'></script>
        </body>
</html>
