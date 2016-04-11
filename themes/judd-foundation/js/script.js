//Dropdown Menu for Art Page
(function( $ ) {
	var $grid= $('.grid').isotope({
	  // options
	  itemSelector: '.grid-item',
	  layoutMode: 'fitRows'
	});

	$('li.dropdown-list').click(function() {
	var filterValue = $(this).attr('data-filter');
  	$grid.isotope({ filter: filterValue });
  	});

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

