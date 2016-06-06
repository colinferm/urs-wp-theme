window.fbAsyncInit = function() {
        FB.init({
                appId      : '360908660620743', // App ID
                //appId      : '178877245482146', // App ID
                status     : true, // check login status
                cookie     : true, // enable cookies to allow the server to access the session
                xfbml      : true  // parse XFBML
        });

        FB.Event.subscribe('edge.create', function(targetUrl) {
                _gaq.push(['_trackSocial', 'facebook', 'like', targetUrl]);
        });

        FB.Event.subscribe('edge.remove', function(targetUrl) {
                _gaq.push(['_trackSocial', 'facebook', 'unlike', targetUrl]);
        });

        FB.Event.subscribe('message.send', function(targetUrl) {
                _gaq.push(['_trackSocial', 'facebook', 'send', targetUrl]);
        });

        FB.Event.subscribe('comment.create', function(targetUrl) {
                _gaq.push(['_trackSocial', 'facebook', 'comment', targetUrl.href]);
        });

        FB.Event.subscribe('comment.remove', function(targetUrl) {
                _gaq.push(['_trackSocial', 'facebook', 'comment_remove', targetUrl.href]);
        });
};

window.twttr = (function (d,s,id) {
        var t, js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
    js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
    return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
}(document, "script", "twitter-wjs"));

twttr.ready(function (twttr) {
        twttr.events.bind('tweet', function(event) {
                if (event) {
                        var targetUrl;
                        if (event.target && event.target.nodeName == 'IFRAME') {
                                targetUrl = extractParamFromUri(event.target.src, 'url');
                        }
                        _gaq.push(['_trackSocial', 'twitter', 'tweet', targetUrl]);
                }
        });
});

function extractParamFromUri(uri, paramName) {
        if (!uri) {
                return;
        }
        var uri = uri.split('#')[0];  // Remove anchor.
        var parts = uri.split('?');  // Check for query params.
        if (parts.length == 1) {
                return;
        }
        var query = decodeURI(parts[1]);

          // Find url param.
        paramName += '=';
        var params = query.split('&');
        for (var i = 0, param; param = params[i]; ++i) {
                if (param.indexOf(paramName) === 0) {
                        return unescape(param.split('=')[1]);
                }
        }
}

jQuery(document).ready(function($) {
	$("div.entry-content a").click(function() {
		var href = $(this).attr('href');
		var title = $(this).attr('title');
		if (!title) title = $(this).html();
		//alert('HREF: ' + href + "\nTITLE: " + title);
		if (href.indexOf('unifiedrepublicofstars') == -1 && href.indexOf('http') != -1) {
			try {
				_gaq.push(['_trackEvent', 'Link' ,  'Exit', title ]);
				//alert('HREF: ' + href + "\nTITLE: " + title);
			} catch(e){}

			setTimeout('document.location = "' + href + '"', 100);
			return false;
		} else if (href.indexOf('unifiedrepublicofstars') != -1 && (href.indexOf('tar.gz') != -1 || href.indexOf('pdf') != -1)) {
			try {
				_gaq.push(['_trackEvent', 'Link' ,  'Download', href ]);
				//alert('HREF: ' + href + "\nTITLE: " + title);
			} catch(e){}

			setTimeout('document.location = "' + href + '"', 100);
			return false;
		}
		return true;

	});

	$('div.reveal').click(function() {
		_gaq.push(['_trackEvent', 'Story' , 'Expand', 'Main Story' ]);
	});
});
