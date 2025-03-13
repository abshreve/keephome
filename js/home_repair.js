/* global twentyseventeenScreenReaderText */
(function( $ ) {

	$('.filter_home_repair_result').on('submit', function () {

		var filter = $('.filter_home_repair_result');
		$.ajax({
			url:ajax_object.ajaxurl,
			data:filter.serialize(), // form data
			type:'post', // POST
			beforeSend:function(xhr){
				filter.find('.find_program').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('.find_program').text('Find a program'); // changing the button label back
				$('#response_advising').html(data); // insert data
			}
		});
		return false;
	});

	jQuery('.round').on('click',function() {
	    if( jQuery(this).closest('.form-field-input').find('input[type=checkbox]').is(':checked') ) {
	    	jQuery(this).closest('.form-field-input').find('input[type=checkbox]').prop('checked', false);
	    }else{
	    	jQuery(this).closest('.form-field-input').find('input[type=checkbox]').prop('checked', true);
	    }

	    if(jQuery(this).closest('.form-field-input').find('.none_of_above').is('[class*="none_of_above"]')) {
			jQuery('.repair_include').prop('checked', false);
		}else{
			//alert(0);
			jQuery('.none_of_above').closest('.form-field-input').find('input[type=checkbox]').prop('checked', false);
			//jQuery('.repair_include').prop('checked', false);
		}

	});

	 // $('.styledSelect .active').on('click', function () {
	 //    	alert(0);
	 //
	 //    });


	$('.filter_home_repair_result select').each(function () {

	    // Cache the number of options
	    var $this = $(this),
	        numberOfOptions = $(this).children('option').length;

	    // Hides the select element
	    $this.addClass('s-hidden');

	    // Wrap the select element in a div
	    $this.wrap('<div class="select"></div>');

	    // Insert a styled div to sit over the top of the hidden select element
	    $this.after('<div class="styledSelect"></div>');

	    // Cache the styled div
	    var $styledSelect = $this.next('div.styledSelect');

	    // Show the first select option in the styled div
	    $styledSelect.text($this.children('option').eq(0).text());

	    // Insert an unordered list after the styled div and also cache the list
	    var $list = $('<ul />', {
	        'class': 'options'
	    }).insertAfter($styledSelect);

	    // Insert a list item into the unordered list for each select option
	    for (var i = 0; i < numberOfOptions; i++) {
	        $('<li />', {
	            text: $this.children('option').eq(i).text(),
	            rel: $this.children('option').eq(i).val()
	        }).appendTo($list);
	    }

	    // Cache the list items
	    var $listItems = $list.children('li');

	    // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
	    $styledSelect.click(function (e) {
				$('div.styledSelect').removeClass('active');
	        e.stopPropagation();
	        $('div.styledSelect.active').each(function () {
	            $(this).removeClass('active').next('ul.options').hide();
	        });
	        $(this).toggleClass('active').next('ul.options').toggle();
	    });

	    // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
	    // Updates the select element to have the value of the equivalent option
	    $listItems.click(function (e) {
	        e.stopPropagation();
					$('div.styledSelect').removeClass('active');
	        $styledSelect.text($(this).text()).removeClass('active');
	        $this.val($(this).attr('rel'));
	        $list.hide();
	        /* alert($this.val()); Uncomment this for demonstration! */
	    });

	    // Hides the unordered list when clicking outside of it
	    $(document).click(function () {
	        $('div.styledSelect').removeClass('active');
	        $list.hide();
	    });

	});


	// accordian-section
	$(document).ready(function(){
			$('.accordian-wrap .accordian-item h5').click(function() {
			if ($(this).parents('.accordian-wrap .accordian-item').hasClass('active')) {
				$(this).parents('.accordian-wrap .accordian-item').removeClass('active')
				$(this).next('.accordian-answer').stop(true, false).slideUp();
			} else {
				$('.accordian-wrap .accordian-item').removeClass('active');
				$('.accordian-wrap .accordian-item .accordian-answer').stop(true, false).slideUp();
				$(this).parents('.accordian-wrap .accordian-item').addClass('active');
				$(this).next('.accordian-wrap .accordian-item .accordian-answer').stop(true, false).slideDown();
			}
		});


		/*setTimeout(function() {
			var bg = $('.content-page-hero__image').data("img");
			$('.content-page-hero__image').css("background-image", "url(" + bg + ")");
			console.log(bg);
		}, 100);*/

	});

})( jQuery );
