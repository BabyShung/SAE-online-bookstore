$(document).ready(function()
{	
	
		//²Ëµ¥Ð§¹û
	$('#navigation2').delegate('a.subtitle', 'mouseover', function(event) {
		var self = $(this),
			qtip = '.qtip.ui-tooltip',
			container = $(event.delegateTarget || event.liveFired),
			submenu = self.next('ul'),

		// Determine whether this is a top-level menu
		isTopMenu = self.parents(qtip).length < 1;

		// If it's not a top level and we can't find a sub-menu... return
		if(isTopMenu && !submenu.length) { return false; }

		/*
		 * Top-level menus will be placed below the menu item, all others
		 * will be placed to the right of each other, top aligned.
		 */
		position = isTopMenu ?
			{ my: 'top left', at: 'bottom left' } :
			{ my: 'top left', at: 'right top' }
	
		// Create the tooltip
		self.qtip({
			overwrite: false, // Make sure we only render one tooltip
			content: {
				text: self.next('ul') // Use the submenu as the qTip content
			},
			position: $.extend(true, position, {
				// Append the nav tooltips to the #navigation element (see show.solo below)
				container: container,

				// We'll make sure the menus stay visible by shifting/flipping them back into the viewport
				viewport: $(window), adjust: { method: 'shift flip' }
			}),
			show: {
				event: event.type, // Make sure to sue the same event as above
				ready: true, // Make sure it shows on first mouseover

				/*
				 * If it's a top level menu, make sure only one is shown at a time!
				 * We'll pass the container element through too so it doesn't hide
				 * tooltips unrelated to the menu itself
				 */
				solo: isTopMenu ? container : false
			},
			hide: {
				delay: 100,
				event: 'unfocus mouseleave',
				fixed: true // Make sure we can interact with the qTip by setting it as fixed
			},
			style: {
				classes: 'ui-tooltip-nav', // Basic styles
				tip: false // We don't want a tip... it's a menu duh!
			},
			events: {
				/*
				 * If you'd like to hide ALL parent menus when we mouse out of this menu
				 * simply uncomment the code below!
				 *
				 *	hide: function(event, api) {
				 *		var oEvent = event.originalEvent || event,
				 *			parentMenu = api.elements.target.parents(qtip),
				 *			ontoMenu = $(oEvent.relatedTarget || oEvent.target).closest(qtip).length;
				 *
				 * 	if(!ontoMenu) { parentMenu.qtip('hide', oEvent); }
				 * },
				 */

				// Toggle an active class on each menus activator
				toggle: function(event, api) {
					api.elements.target.toggleClass('active', event.type === 'tooltipshow');
				}
			}
		});
	});
});
	