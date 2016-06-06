jQuery(document).ready(function($) {
	$(".podcast.featured > audio").mediaelementplayer({
                features: ['playpause','current','progress','duration','volume'],
        });

	$(".podcast audio").mediaelementplayer({
                alwaysShowControls: true,
                features: ['playpause','duration'],
                audioWidth: 65,
                audioHeight: 25
        });
});
