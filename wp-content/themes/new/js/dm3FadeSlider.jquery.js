/******************************************************************************
 * dmFadeSlider
 * ver 1.0.4
 ******************************************************************************/
$.fn.dm3FadeSlider = function(options) {

	// Defaults
	var opt = {
		interval: 0, // in seconds, set to 0 to turn off
		height: null, // auto, null
		speed: 500,
		// Navigation must be either before or after the slides container
		showNav: true, // true || false
		navClass: 'dm3_slider_nav', // navigation container class, MANDATORY
		currentClass: 'dm3_slider_current',
		afterSlideChange: null // callback
	};
	
	function dm3_remove_iefilter(el) {
		if (typeof el.style.filter != "undefined" && typeof el.style.removeAttribute == "object") {
			el.style.removeAttribute("filter");
		}
	}
	
	function dmFadeSlider(el, opt) {
		// Get options
		this.opt = opt;
		
		// Slides container
		this.container = $(el);
		
		// Get all slides
		this.slides = this.container.children('.slide');
		
		// Keep track of slides' heights
		this.slidesH = [];
		this.slidesMaxH = 0;

		// Keep track of current and previous slides
		this.cur = 0;
		this.prev = 0;
		
		// NAvigation
		this.nav = null;
		
		// Other settings
		this.interval = null;
		this.stop = false;
		
		// Start the plugin
		this.init();
	}
	
	dmFadeSlider.prototype.init = function() {
		var that = this;
		
		// Find heights of each slide
		this.slides.each(function(i) {
			var slide = $(this);
			var h = slide.outerHeight(true);
			
			if (h > that.slidesMaxH)
				that.slidesMaxH = h;
			
			that.slidesH[i] = h;

			// Set css for slides
			slide.css({
				position: 'absolute',
				left: 0,
				top: 0,
				'z-index': 7
			});
		});
		
		// Set css for container
		this.container.css({
			position: 'relative'
			/*overflow: 'hidden'*/
		});
		
		// Set css for the first slide
		this.slides.eq(this.cur).css('z-index', 8).addClass(this.opt.currentClass);
		
		// Check height
		if (this.opt.height != 'auto') {
			this.slidesMaxH = this.container.css('height');
		} else {
			// Set initial height of the container
			this.container.css({
				height: this.slidesMaxH + 'px',
				overflow: 'hidden'
			});
		}
		
		// Set height of each slide to be equal
		/*this.slides.css({
			height: this.slidesMaxH
		});*/
		
		// Setup navigation
		if (this.opt.showNav == true) {
			this.nav = this.container.next();
			if (!this.nav.hasClass(this.opt.navClass)) {
				this.nav = this.container.prev();
				if (!this.nav.hasClass(this.opt.navClass))
					this.nav = null;
			}
		} else {
			this.nav = null;
		}
		
		if (this.nav) {
			this.nav.find('.dm3_prev:first').click(function(e) {
				e.preventDefault();
				that.setCurrent('prev', 'manual');
				that.changeSlide('manual');
			});
			
			this.nav.find('.dm3_next:first').click(function(e) {
				e.preventDefault();
				that.setCurrent('next', 'manual');
				that.changeSlide('manual');
			});
		}
		
		// Set slider interval
		var interval = 0;
		var classes = this.container.attr('class');
		classes = classes.split(' ');

		for (var i = 0; i < classes.length; ++i) {
			if (classes[i].indexOf('interval_') != -1) {
				interval = classes[i].split('_');
				interval = parseInt(interval[1]);
				break;
			}
		}

		if (interval == 'NaN' || interval == 0) {
			interval = this.opt.interval;
		}
		
		if (interval > 0) {
			this.interval = setInterval(function() {
				that.setCurrent('next');
				that.changeSlide();
			}, interval*1000);
		}
		
		// Stop sliding if user hovers over the slider or nav
		this.container.hover(function() {
			that.stop = true;
		}, function() {
			that.stop = false;
		});
		
		
		if (this.nav) {
			this.nav.hover(function() {
				that.stop = true;
			}, function() {
				that.stop = false;
			});
		}
	};
	
	dmFadeSlider.prototype.setCurrent = function(dir, by) {
		if (this.stop == true && by != "manual")
			return;
		
		this.prev = this.cur;
		
		if (dir == 'prev') {
			// Go Back
			this.cur--;
			if (this.cur < 0) this.cur = this.slides.length - 1;
		} else {
			// Go Forward
			this.cur++;
			if (this.cur > this.slides.length - 1) this.cur = 0;
		}
	};
	
	dmFadeSlider.prototype.changeSlide = function(by) {
		if (this.stop == true && by != "manual")
			return;
		
		var that = this;
		
		this.slides.eq(this.prev).removeClass(this.opt.currentClass);
		this.slides.eq(this.cur).addClass(this.opt.currentClass);
		
		// Adjust height of the container
		if (that.opt.height == 'auto') {
			that.container.animate({ height: that.slidesH[that.cur] + 'px'}, { duration: 300 });
		}
		
		// Show current slide
		this.slides.eq(this.cur)
			.css({opacity: 0, 'z-index': 9})
			.animate({opacity: 1}, {duration: this.opt.speed, queue: false, complete: function() {
				$(this).css('z-index', 8);
				
				// Hide previous slide
				that.slides.eq(that.prev).css('z-index', 7);
				
				// font disrtortion correction in IE 7, 8
				dm3_remove_iefilter(this);
				
				if (that.opt.afterSlideChange != null) {
					that.opt.afterSlideChange.call(that);
				}
			}});
	};
	
	return this.each(function() {

		if (options) {
			$.extend(opt, options);
		}
	
		// Initialize the plugin
		var slider = new dmFadeSlider(this, opt);
	});

};