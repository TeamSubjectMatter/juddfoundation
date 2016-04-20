/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function() {
	var container, button, menu, links, subMenus;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );


	// Set menu items with submenus to aria-haspopup="true".
	for ( var i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();

(function( $ ) {

	function hover(){
		var $containerWidth = $(window).width();
		if($containerWidth > 768){
				$( "ul#menu-primary-navigation" ).hover(
				  	 function() {
				  	 	$('div.overlay').css('display','block');
				  	 	$('div.top-bar').css('display','none');
				  	 	
				  	 },
				  	 function() {
				  	 	$('div.overlay').css('display','none');
				  	 	$('div.top-bar').css('display','block');

				  	 }
				);//console.log($containerWidth);
			}
		else{
			$( "ul#menu-primary-navigation" ).hover(function(){
				$('div.overlay').css('display','block');
				$('div.top-bar').css('display','none');
			});
		}
	}
	hover();
	 $(window).resize(function() {
	 	
        hover();

    });
	 
	 $('div.search').click(function(e) {
	 	console.log('clicked');
	 	$('.search form').show();
		$('.search').addClass('active');
		$('.search>i').hide();
	 });


/*if($(window).width() > 768){
		//Shows search
		$('div.navigation-overlay .primary-navigation div div.search i:first-child').click(function() {
			$('.search form').show();
			$('.search').addClass('active');
			$(this).hide();

		});
	}
	else{
		$('.search form').show();
		$('.primary-navigation div div.search i:first-child').hide();
	}*/
    //Displays Navigation
	 $('div.header-right i.fa-bars').click(function(e) {
    	$('i.fa-bars').addClass('active');
    	$('div.navigation-overlay').css('display','block');
    	$('body').css('overflow','hidden');
    	$('header').css('visibility','hidden');

    });
	$('div.navigation-overlay div.close').click(function(e) {
		hideOverlay();

	});
// close overlay clicking on dark area
$(document).mouseup(function(e) {
    if( $('div.navigation-overlay').css('display') == 'block' ) {
        var container = $('div.navigation-overlay .menu-container');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            hideOverlay();
        }
    }
});

function hideOverlay(){
	$('div.navigation-overlay').css('display','none');
		$('header').css('visibility','visible');
		$('i.fa-bars').removeClass('active');
		$('.search').removeClass('active');
		$('.search form').hide();
		$('.search>i').show();
}
			
	//Hide sub navigation on mobile
	$( "ul.menu li" ).click(function(){
		$('.sub-container').hide();
	})
})
(jQuery);