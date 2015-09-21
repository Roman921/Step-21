$(document).ready(function() {
	$.getScript('js/style-switch/style-switch.js');
	
	$('html').css('background-color', '#070707');
	
	// Slideshow
	$('#slideshow').dm3Slideshow({
		speed: 500,
		autoScrollInterval: 4000,
		autoScroll: false
	});
	
	// Sub Navigation
	dm3_sub_navigation('#nav li');
	
	// Fading Title
	dm3_fade_in_title($('.fade_in_title'));
	
	// Lightbox Controls
	dm3_lightbox_controls($('.lb_controls'));
	
	// Lightbox
	$('a.lightbox, a.lb_magnify').prettyPhoto({ social_tools: null });
	
	// Fade Slider + Testimonials Slider
	$('ul.dm3_slider').dm3FadeSlider({
		afterSlideChange: function() {
			// Associate the "enlarge" button to current slide after every slide change
			var cur_slide = this.slides.eq(this.cur);
			var enlargeurl = cur_slide.data('enlargeurl');
			var enlarge_link = cur_slide.parent().parent().find('a.lb_magnify:first');
			if (enlarge_link.length)
				enlarge_link.attr('href', enlargeurl);
		}
	});
	
	$('ul.testimonials').dm3FadeSlider({ height: 'auto' });
	
	// carousel
	$('#carousel').jcarousel({
    	scroll: 1,
    	wrap: 'both',
    	buttonNextHTML: "<div>Next &raquo;</div>",
    	buttonPrevHTML: "<div>&laquo; Prev</div>"
    });
    
    // Twitter
    dm3_load_tweets($('.twitter_widget'), 2);
    
    // Flickr
    dm3_load_flickr_photos($('.flickr_photos'));
    
    // Sliding panel
    dm3_sliding_panel($('#sliding_promotion'));
    
    // Tabs
    $('.tabs').dmTabs();
    
    // Quicksand
    dm3_init_quicksand('#portfolio_quicksand', '#portfolio_categories li');
    
    // Toggles
    dm3_init_toggle_boxes('.toggle_box', '.toggle_header');
	
	// Email Subscription Form
	dm3_init_subscribe_form('#subscribe');
	
	// Contact Form
	dm3_init_contact_form('#contact_form');
	
	dm3_scroll_to($('a.scroll_to'));
});


/**
 * Main nav sub navigation animation
 * ver 1.0
 */
function dm3_sub_navigation(selector) {
	/**
	 * Animate sub navigation
	 */
	var i = 0;
	var currNavIdx = null;
	var currNavLi = null;
	
	$(selector).each(function() {
		var $this = $(this);
		var li = $this.get(0);
		li.navSub = $this.find('ul:first');
		li.navIdx = i++;
		
		// No sub menues?
		if (!li.navSub.length)
			return;
		
		$this.addClass('has_sub_menu');
		
		// Is it a child li.navSub menu or parent li.navSub menu
		if ($this.parent('ul').parent('li').length)
			li.navType = 'child';
		else
			li.navType = 'parent';
			
		li.navSub.data('left', parseInt(li.navSub.css('left')));
		li.navSub.data('top', parseInt(li.navSub.css('top')));
		
		$this.hover(function() {
			var $this = $(this);
			var li = $this.get(0);
			
			if (typeof li.dmTimeout != undefined)
				clearTimeout(li.dmTimeout);
			
			li.showTimeout = setTimeout(function() {
				if (li.navType == 'parent' && currNavIdx != li.navIdx) {
					// Hide all previous menues
					if (currNavLi)
						currNavLi.find('ul').each(function() { $(this).css({display:"none"}); });
					
					// Save as currently active menu
					currNavIdx = li.navIdx;
					currNavLi = $this;
				}
				
				if (li.navSub.is(':hidden')) {
					var left = li.navSub.data('left'), top = li.navSub.data('top');
					
					li.navSub.stop().css({display: 'block', opacity: 0, left: (left-10) + 'px', top: (top - 10) + 'px'})
						.animate({opacity: 1, left: left + 'px', top: top + 'px'}, {duration: 300});
				}
			}, 250);
		},
		function() {
			if (typeof li.showTimeout != undefined)
				clearTimeout(li.showTimeout);
					
			li.dmTimeout = setTimeout(function() {
				var left = li.navSub.data('left'), top = li.navSub.data('top');
				
				li.navSub.stop().animate({opacity: 0, left: (left - 10) + 'px', top: (top - 10) + 'px'}, {duration: 300, complete: function() {
					$(this).css({display: 'none', left: left, top: top});
				}});
			}, 400);
		});
	});
}


/**
 * Show hide controls on lightboxes and sliders
 */
function dm3_lightbox_controls(obj) {
	obj.each(function() {
		var controls_container = $(this);
		var parent = controls_container.parent();
		
		// hide controls initially
		controls_container.css('display', 'none');
		
		parent.hover(function() {
			controls_container.stop().css({display: 'block', opacity: 0}).animate({opacity: 1}, {duration: 600});
		}, function() {
			controls_container.stop().animate({opacity: 0}, {duration: 800, complete: function() { $(this).css({display: 'none'}); }});
		});
	});
}


/**
 * Escape html string, so that it is not parsed as HTML
 * version 1.0
 */
function dm3_escape_html(str) {
  return str
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}


/**
 * Load tweets into an html element
 * version 1.0.1
 */
var dm3_tweets_requests = [];

function dm3_load_tweets(el, default_num) {
	// One tweet by default
	default_num = (parseInt(default_num) == default_num) ? default_num : 1;
	
	el.each(function() {
		var el = $(this);
		
		// get parameters
		var params_str = el.text();
		var params = params_str.split(',');
		var userId = params[0];

		if (parseInt(params[1]) == params[1])
			num = parseInt(params[1]);
		else
			num = default_num;
		
		if (typeof dm3_tweets_requests[userId] != 'undefined') {
			var objects = dm3_tweets_requests[userId].objects;
			objects[objects.length] = {
				el: el,
				num: num
			};
			
			dm3_tweets_requests[userId].objects = objects;
		} else {
			var objects = [];
			objects[0] = {
				el: el,
				num: num
			};
			
			dm3_tweets_requests[userId] = {
				url: "http://twitter.com/statuses/user_timeline/" + userId + ".json?count=10&callback=?",
				objects: objects
			};
		}
	});
	
	for (key in dm3_tweets_requests) {
		var request = dm3_tweets_requests[key];
		
		$.ajax({
		    url: request.url,
		    dataType: "json",
	        timeout: 15000,
	        success: function(data) {
	        	for (obj in request.objects) {
	        		var obj = request.objects[obj];
		        	var ul = $('<ul>');
					var li = null;
					
					for (i = 0; i < data.length; ++i) {
						if (i >= obj.num)
							break;
						
						// Create html
						li = document.createElement('li');
						li.innerHTML = '@<a href="http://twitter.com/' + dm3_escape_html(data[i].user.screen_name)
							+ '">' + dm3_escape_html(data[i].user.screen_name) + '</a> ' + dm3_escape_html(data[i].text);
						
						ul.append(li);
					}
					
					obj.el.html(ul);
				}
	        }
	    });
	}
}


/**
 * Load <num> flickr photos from account ID <flickr_id> into ul element <el>
 * version 1.0
 */
var dm3_flickr_requests = [];

function dm3_load_flickr_photos(els, default_num) {
	default_num = (parseInt(default_num) == default_num) ? default_num : 1;
	
	els.each(function() {
		var el = $(this);
		
		// Parse parameters
		var num = default_num;
		var params = el.text();
		params = params.split(',');
		var flickr_id = params[0]
		if (parseInt(params[1]) == params[1])
			num = parseInt(params[1]);
		var size = params[2];
		if (typeof size == 'undefined')
			size = 's';
		
		if (typeof dm3_flickr_requests[flickr_id] != 'undefined') {
			var objects = dm3_flickr_requests[flickr_id].objects;
			objects[objects.length] = {
				el: el,
				num: num,
				size: size
			};
			
			dm3_flickr_requests[flickr_id].objects = objects;
		} else {
			var objects = [];
			objects[0] = {
				el: el,
				num: num,
				size: size
			};
			
			dm3_flickr_requests[flickr_id] = {
				url: "http://api.flickr.com/services/feeds/photos_public.gne?format=json&id=" + flickr_id + '&jsoncallback=?',
				objects: objects
			};
		}
	});
	
	for (key in dm3_flickr_requests) {
		var request = dm3_flickr_requests[key];
		
		$.getJSON(request.url, function(data) {
			for (obj in request.objects) {
				var obj = request.objects[obj];
				var htmlString = '<ul>';
		    
			    $.each(data.items, function(i, item) {
			    	if (i >= obj.num)
			    		return;
			    	
			    	if (obj.size != 'm')
			    		item.media.m = item.media.m.replace('_m', '_' + obj.size);
			        
			        htmlString += '<li><a class="frame" href="' + dm3_escape_html(item.link) + '" target="_blank">';
			        htmlString += '<img title="' + dm3_escape_html(item.title) + '" src="' + dm3_escape_html(item.media.m);
			        htmlString += '" alt="';
			        htmlString += dm3_escape_html(item.title) + '" />';
			        htmlString += '</a></li>';
			        
			        ++i;
			    });
			    
			    obj.el.html(htmlString + '</ul>');
			}
		});
	}
}


/**
 * Sliding panel
 * version 1.0
 */
function dm3_sliding_panel(el) {
	var panel_height = el.innerHeight(true);
	var panel_switch = el.find('.sp_switch:first');
	
	panel_switch.css({
		opacity: 0.6
	});
	
	el.css({
		top: '-' + panel_height + 'px',
		display: 'block'
	});
	
	function hide_el(el) {
		panel_switch.removeClass('sp_switch_active');
		el.stop().animate({top: '-' + panel_height + 'px'}, {duration: 400});
		el.data('active', false);
		panel_switch.css({ opacity: 0.6 });
	}
	
	function show_el(el) {
		panel_switch.addClass('sp_switch_active');
		el.stop().animate({top: 0}, {duration: 400});
		el.data('active', true);
		panel_switch.css({ opacity: 1 });
	}
	
	panel_switch.click(function(e) {
		e.stopPropagation();
		
		if (!el.data('active')) {
			show_el(el);
			
			$('html').one('click', function() {
				hide_el(el);
			});
		} else {
			hide_el(el);
		}
	});
	
	el.click(function(e) {
		e.stopPropagation();
	});
}


/**
 * Show hide title inside of lightboxes and some sliders
 */
function dm3_fade_in_title(obj) {
	obj.each(function() {
		var title = $(this);
		var parent = title.parent();
		
		title.css('opacity', 0);
		
		parent.hover(function() {
			$(this).find('.fade_in_title:first').stop().animate({opacity: 0.8}, {duration: 600});
		}, function() {
			$(this).find('.fade_in_title:first').stop().animate({opacity: 0}, {duration: 800});
		});
	});
}


/**
 * Quicksand Portfolio
 * version 1.0
 */
function dm3_init_quicksand(items_selector, terms_selector) {
	var items = $(items_selector).clone();
	var terms = $(terms_selector);
	
	if (terms.length && items.length) {
		var curr_term = terms.eq(0);
		curr_term.addClass('active');
		
		terms.click(function(e) {
			// Prevent the default behaviour of the link
			e.preventDefault();
			
			var term = $(this);
			var term_name = term.find("a:first").data("type");
		
			if (term.hasClass('active')) {
				return;
			} else {
				curr_term.removeClass('active');
				term.addClass('active');
				curr_term = term;
			}
		
			if (term_name == 'all') {
				var filteredItems = items.find('.quicksand_item');
			} else {
				var filteredItems = items.children().not(function() {
					var item = $(this);
					var terms = item.attr('data-type');
					
					if (terms.indexOf(term_name) == -1) {
						return true;
					}
					
					return false;
				});
			}
		
			$(items_selector).quicksand(filteredItems, {
				adjustHeight: 'dynamic',
				attribute: 'data-id',
				enhancement: function() {
					var quicksand = $(items_selector);
					
					/* Lightbox */
					quicksand.find('a.lb_magnify').prettyPhoto({ social_tools: null });
   					
   					/* Fade Slider */
					quicksand.find('ul.dm3_slider').dm3FadeSlider();
					
					dm3_fade_in_title(quicksand.find('.fade_in_title'));
					
					dm3_lightbox_controls(quicksand.find('.lb_controls'));
				}
			});
		});
	}
}


/**
 * Toggle Boxes
 * ver 1.0
 */
function dm3_init_toggle_boxes(box_selector, header_selector) {
	$(box_selector).hide();
	
	$(header_selector).each(function() {
		var el = $(this);
		var content = el.next(box_selector);
		
		if (!content.length)
			return;
		
		this.toggle_open = false;
		
		// bind onclick event to the toggle header
		el.click(function() {
			if (this.toggle_open == true) {
				el.removeClass('toggle_open');
				this.toggle_open = false;
			} else {
				el.addClass('toggle_open');
				this.toggle_open = true;
			}
			
			content.slideToggle('slow');
		});
	});
}


/**
 * PHP Subscription Form
 * ver 1.0
 */
function dm3_init_subscribe_form(selector) {
	$(selector).submit(function(e) {
		e.preventDefault();
		
		var subscribe_form = $(this);
		
		//var ajax_loader = subscribe_form.find('.ajax_loader:first').fadeIn();
		var button = subscribe_form.find('button:first');
		button.stop().animate({opacity: 0}, {duration: 200});
		
		$.ajax({
			url: 'scripts/subscribe/subscribe.php',
			type: 'post',
			data: 'email=' + $('#subscribe_email').val(),
			success: function(response) {
				if (response == 'email_added') {
					subscribe_form.find('.subscribe_error:first').fadeOut();
					subscribe_form.find('.subscribe_success:first').fadeIn();
					$('#subscribe_email').val('');
					setTimeout(function() {
						subscribe_form.find('.subscribe_success:first').fadeOut();
					}, 5000);
				} else {
					subscribe_form.find('.subscribe_success:first').fadeOut();
					subscribe_form.find('.subscribe_error:first').fadeIn();
					setTimeout(function() {
						subscribe_form.find('.subscribe_error:first').fadeOut();
					}, 5000);
				}
				
				//ajax_loader.fadeOut();
				button.stop().animate({opacity: 1}, {duration: 200});
			},
			error: function() {
				ajax_loader.fadeOut();
				button.fadeIn();
			}
		});
	});
}


/**
 * PHP Contact Form
 * ver 1.0
 */
function dm3_init_contact_form(selector) {
	// contact form
	$(selector).submit(function(e) {
		e.preventDefault();
		
		var form = $(this);
		
		var ajax_loader = form.find('.ajax_loader:last').fadeIn();
		var button = form.find('#contact_submit:first').fadeOut();
		
		var first_name = $('#first_name');
		var last_name = $('#last_name');
		var email = $('#contact_email');
		var phone = $('#contact_phone');
		var subject = $('#subject');
		var message = $('#message');
		
		var error = false;
		
		if (first_name.val() == '') {
			first_name.parent().find('.error_message').fadeIn();
			error = true;
		} else {
			first_name.parent().find('.error_message').fadeOut();
		}
		
		if (last_name.val() == '') {
			last_name.parent().find('.error_message').fadeIn();
			error = true;
		} else {
			last_name.parent().find('.error_message').fadeOut();
		}
		
		if (email.val() == '') {
			email.parent().find('.error_message').fadeIn();
			error = true;
		} else {
			email.parent().find('.error_message').fadeOut();
		}
		
		if (error) {
			ajax_loader.fadeOut();
			button.fadeIn();
			return false;
		}
		
		var data = 'first_name='+first_name.val()+'&last_name='+last_name.val()+'&email='+email.val()+
			'&phone=' + phone.val() + '&subject='+subject.val()+'&message='+message.val();
			
		$.ajax({
			url: 'scripts/contact/process.php',
			type: 'post',
			data: data,
			success: function(response) {
				ajax_loader.fadeOut();
				button.fadeIn();
				
				if (response == '1') {
					form.find('.success_message:first').css({
						'opacity': 0,
						'display': 'inline-block'
					}).animate({opacity: 1}, {duration: 300});
				} else {
					alert('Error occured. Please try again.');
					form.find('.success_message:first').fadeOut();
				}
			}
		});
	});
}


/**
 * Scroll to some element identified by ID taken from href attribute of a link
 * ver 1.0
 */
function dm3_scroll_to(elements) {
	elements.click(function(e) {
    	e.preventDefault();
    	var scroll_to = $($(this).attr('href')).offset().top;
    	$('html, body').animate({ scrollTop: scroll_to+'px' }, 600);
    });
}