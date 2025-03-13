/* global twentyseventeenScreenReaderText */
(function( $ ) {

	$('.filter_advising_result').on('submit', function () {

		var filter = $('.filter_advising_result	');
		$.ajax({
			url:ajax_object.ajaxurl,
			data:filter.serialize(), // form data
			type:'post', // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Search'); // changing the button label back
				$('#response_advising').html(data); // insert data
			}
		});
		return false;
	});


	 /*$(".nav-toggle").click(function() {
        $('#collapse1').show();
        $(this).hide();
     });*/

     var i = 1;
 	$('.advisor-content p').each(function() {
 		if( i == 1 ) {
	    	$(this).replaceWith(""+$(this).html()+"<p></p>");
		}
	    i++;
	});

 	var maxLength = 180;
	$(".advisor-content").each(function(){
		var myStr = $(this).html();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append(' <a href="javascript:void(0);" class="read-more">Read More...</a>');
			$(this).append('<span class="more-text">' + removedStr + '</span>');
		}
	});
	
	$(".read-more").click(function(){
		$(this).siblings(".more-text").contents().unwrap();
		$(this).remove();
	});

})( jQuery );



