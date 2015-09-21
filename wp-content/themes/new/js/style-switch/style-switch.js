function get_cookie(c_name) {
	var i, x, y, ARRcookies = document.cookie.split(";");
	
	for (i = 0; i < ARRcookies.length; i++) {
		x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
		y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
		x = x.replace(/^\s+|\s+$/g,"");
		if (x == c_name) {
			return unescape(y);
		}
	}
	
	return null;
}

function set_cookie(c_name, value, exdays) {
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}

function get_style(default_style, allowed_styles) {
	var my_style = '';
	var hash = window.location.hash;
	
	if (hash.indexOf('#') == 0) {
		hash = hash.replace('#', '');
	}
	
	if (hash && $.inArray(hash, allowed_styles) != -1) {
		my_style = hash;
	} else {
		my_style = get_cookie('my_style');
	}
	
	if (!my_style) {
		my_style = default_style;
	}
	
	return my_style;
}

function switch_style(css_title) {
	var i, link_tag;
	
	for (i = 0, link_tag = document.getElementsByTagName("link"); i < link_tag.length; ++i) {
		if (link_tag[i].rel.indexOf("stylesheet") != -1) {
			$(link_tag[i]).after($('<link rel="stylesheet" href="js/style-switch/css/' + css_title + '.css" />'));
			set_cookie('my_style', css_title, 20);
			return;
		}
	}
}

var allowed_styles = ['blue', 'blue2', 'cyan', 'green', 'red', 'purple', 'yellow', 'orange'];
var my_style = get_style('blue2', allowed_styles);
switch_style(my_style);