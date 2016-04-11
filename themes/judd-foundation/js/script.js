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
	})
})(jQuery);