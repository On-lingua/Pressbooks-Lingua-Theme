jQuery(document).ready(function () {
    var http = location.protocol;
    var slashes = http.concat("//");
    var host = slashes.concat(window.location.hostname);
    var plugin_url = host.concat('/wp-content/plugins/Pressbooks-Lingua-Theme/themes/pressbooks-lingua-theme/images/langs/');
    var lang_code = jQuery('#flag_li').find('a').attr('class');
    var image = plugin_url + lang_code + '.png';
    if (lang_code !== 'none') {
        jQuery('#flag_li').find('a').css("background-image", "url(" + image + ")");
    }

	jQuery('#page-meta').hide();
	jQuery('.page-meta-btn a, #page-meta a.close').live('click', function() {
		if(jQuery('#page-meta').css('display') == 'none') {
			jQuery('.page-meta-btn a').addClass('tabbed');
			jQuery('.page-meta-btn').addClass('bg-color');
			jQuery('#page-meta').toggle({ duration:200 });
			return false;
		} else {
			jQuery('.page-meta-btn a').removeClass('tabbed');
			jQuery('.page-meta-btn').removeClass('bg-color');
			jQuery('#page-meta').toggle({ duration:100 });
			return false;
		}
	});

	jQuery('#related-books').hide();
	jQuery('.related-books-btn a, #related-books a.close').live('click', function() {
		if(jQuery('#related-books').css('display') == 'none') {
			jQuery('.related-books-btn a').addClass('tabbed');
			jQuery('.related-books-btn').addClass('bg-color');
			jQuery('#related-books').toggle({ duration:200 });
			return false;
		} else {
			jQuery('.related-books-btn a').removeClass('tabbed');
			jQuery('.related-books-btn').removeClass('bg-color');
			jQuery('#related-books').toggle({ duration:100 });
			return false;
		}
	});
	jQuery('#sidebar-search').hide();
	jQuery('.search-btn a, #sidebar-search a.close').live('click', function () {
	    if (jQuery('#sidebar-search').css('display') == 'none') {
	        jQuery('.search-btn a').addClass('tabbed');
	        jQuery('.search-btn').addClass('bg-color');
	        jQuery('#sidebar-search').toggle({ duration: 200 });
	        return false;
	    } else {
	        jQuery('.search-btn a').removeClass('tabbed');
	        jQuery('.search-btn').removeClass('bg-color');
	        jQuery('#sidebar-search').toggle({ duration: 100 });
	        return false;
	    }
	});
});

