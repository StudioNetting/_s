jQuery(document).ready(function($) {
 	$(".menu-toggle").click(function(){
	    $(".responsive-menu").slideToggle(500);
	});
	
	// Change aria-values on toggle
	$('.menu-toggle').on('click', function() {
		var id = $(this).attr('aria-controls');
		
	    if ($(this).attr('aria-expanded') === 'true') { // region is collapsed
	        $(this).attr('aria-expanded', 'false');
	    }
	    else { 
		    $('.menu-toggle').each(function(){
		    	$(this).attr('aria-expanded', 'false');
	    	});
	        
	        $(this).attr('aria-expanded', 'true');
	    } 
    });
});