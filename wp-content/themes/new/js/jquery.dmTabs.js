/******************************************************************************
 * Tabs jQuery plugin
 * ver 1.0.3
 ******************************************************************************/
$.fn.dmTabs = function(options) {

	function removeIeFilter(el) {
		if (typeof el.style.filter != "undefined" && typeof el.style.removeAttribute == "object") {
			el.style.removeAttribute("filter");
		}
	}
	
	var options = $.extend({
		speed: 600,
		startTab: 0,
		tabActiveClass: "active",
		minHeight: false
	}, options);
	
	return this.each(function() {
		var offsetTop = 0;
		
		var wait = false;
		
		// Reference to tabs container
		var container = $(this).css({position: 'relative'});
		
		// Get current tab
		var tabIDInput = container.find('input[name="tabIDInput"]:first');
		
		// Get tabs containers
		var tabsContainers = container.children(".tab");
		
		// Get navigation
		var tabsNav = container.prev("ul").children();
		
		// Get minimum height limit of the tabs container
		var minHeight = null;
		if (options.minHeight)
			minHeight = container.find("ul:first").outerHeight(true);
		
		// Hide all tab containers
		var containerWidth = tabsContainers.eq(0).css('width');
		var i = 0;
		tabsContainers.each(function() {
			var tab = $(this);

			if (typeof tab.attr('id') != 'undefined' && tab.attr('id') == tabIDInput.val())
				options.startTab = i;
			
			tab.css({
				display: 'none',
				opacity: 0,
				position: 'absolute',
				left: 0,
				top: offsetTop + 'px',
				width: containerWidth
			});
			++i;
		});
		
		// Activate current tab
		var prev = options.startTab; // Previously selected tab index
		tabsNav.eq(options.startTab).addClass(options.tabActiveClass).css('display', 'block');
		tabsContainers.eq(options.startTab).css({
			display: 'block',
			opacity: 1
		});
		
		removeIeFilter(tabsContainers.eq(options.startTab).get(0));
		
		// Set initial container height
		setTimeout(function() {
			var curHeight = tabsContainers.eq(options.startTab).outerHeight(true) + offsetTop;
			if (options.minHeight && curHeight < minHeight)
					curHeight = minHeight;
			container.css({height: curHeight + 'px'});
		}, 500);
		
		// Function to switch tabs
		function changeTab(idx) {
			// Hide previous
			tabsContainers.eq(prev).animate({opacity: 0}, {duration: 300, queue: false, complete: function() {
				$(this).css({display: 'none'});
			}});
			
			prevTemp = prev;
			prev = idx;
			
			var currentTab = tabsContainers.eq(idx);
			
			// Show selected
			currentTab.stop().css('display', 'block').animate({opacity: 1}, {duration: 300, queue: false, complete: function() {
				removeIeFilter(this);
			}});
			
			// Change container height
			var height = currentTab.outerHeight(true);
			if (options.minHeight && height < minHeight)
				height = minHeight;
			
			container.animate({height: height + offsetTop + 'px'}, {duration: 300, queue: false});
			
			// Save current tab's id
			tabIDInput.val(currentTab.attr('id'));
		}
		
		// Start tabs
		var i = 0;
		tabsNav.each(function() {
			this.idx = i;
			
			var link = $(this);
			link.bind('click', function(e)
			{
				e.preventDefault();
				if (prev == this.idx)
					return false;
				tabsNav.eq(prev).removeClass(options.tabActiveClass);
				$(this).addClass(options.tabActiveClass);
				changeTab(this.idx);
			});
			++i;
		});
	});
};