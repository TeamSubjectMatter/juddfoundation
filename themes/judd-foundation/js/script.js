//Dropdown Menu for Art Page
(function( $ ) {

	$('ul.dropdown p').click(function(){
		$(this).parent().addClass('dropping');
		$('li.dropdown-list').toggle();
		$('li.dropdown-list').click(function() {

    		

			$('#title').html($(this).find('a').html());
    		$('li.dropdown-list').hide();
    		//$('ul.dropdown').removeClass('active');
   		});
	});


})(jQuery);

( function($) {
	  // init Isotope
	  var $grid = $('.grid').isotope({
	    itemSelector: '.grid-item',
	    layoutMode: 'fitRows'
	  });
	$('li.dropdown-list').click(function() {
	var filterValue = $(this).attr('data-filter');
	$grid.isotope({ filter: filterValue });
	});
})(jQuery);