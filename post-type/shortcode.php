<?php
function wpb_home_repair_filter() {

	$home_repair_interested_help = get_acf_fields_object('9099');
	$home_repair_needs = get_acf_fields_object('9100');
	$home_repair_includes = get_acf_fields_object('9101');

	//echo "<pre>";print_r($home_repair_needs);


	$filter_data = '<div class="home-repair-tool">';

		$filter_data .= '<form action="" name="filter_program" class="filter_home_repair_result">';

			// Things that you want to do.
			$filter_data .= '<div class="form-field">';
			$filter_data .= '<label>';
			$filter_data .= 'I’m interested in finding help';
			$filter_data .= '</label>';
			$filter_data .= '<div class="form-field-input">';
			$filter_data .= '<select name="home_repair_interested_help">';
				$filter_data .= "<option value='' class='test'>Select One</option>";
				$filter_data .= "<option value='Improvements & Repair' class='test'>Improvements & Repair</option>";
				$filter_data .= "<option value='Repair'>Repair </option>";
				$filter_data .= "<option value='Accessibility & Repair'>Accessibility & Repair</option>";
				$filter_data .= "<option value='Weatherization'>Weatherization</option>";
				$filter_data .= "<option value='Energy Assistance'>Energy Assistance</option>";
				$filter_data .= "<option value='Rehab'>Rehab</option>";
			$filter_data .= '<select>';
			$filter_data .= '</div>';
			$filter_data .= '</div>';

			$filter_data .= '<div class="form-field">';
			$filter_data .= '<label>';
			$filter_data .= 'My needs are';
			$filter_data .= '</label>';
			$filter_data .= '<div class="form-field-input">';
			$filter_data .= '<select name="home_repair_needs">';
				$filter_data .= "<option value=''>Select One</option>";
				$filter_data .= "<option value='1'>Urgent</option>";
				$filter_data .= "<option value='2'>Not Urgent</option>";
				$filter_data .= "<option value='3'>Not Sure</option>";
			$filter_data .= '<select>';
			$filter_data .= '</div>';
			$filter_data .= '<p>Urgent issues pose a threat to the health and safety of someone in my houshold.</p>';
			$filter_data .= '</div>';

			$filter_data .= '<div class="form-field">';
			$filter_data .= '<label>';
			$filter_data .= 'My zip code is';
			$filter_data .= '</label>';
			$filter_data .= '<div class="form-field-input form-field-input-text">';
			$filter_data .= '<input type="text" name="home_repair_zipcode" value="" placeholder="enter"/>';
			$filter_data .= '</div>';
			$filter_data .= '</div>';

			$filter_data .= '<div class="form-field">';
			$filter_data .= '<label>';
			$filter_data .= 'My household includes:';
			$filter_data .= '</label>';
			$filter_data .= '<div class="form-field-input">';
			$filter_data .= '<div class="form-field-input form-field-input-checkbox round">';
				$filter_data .= '<div class="form-field-check">';
				$filter_data .= '<input type="checkbox" class="repair_include" id="home_repair_includes1" name="home_repair_includes[]" value="1">';
	  			$filter_data .= '<label for="home_repair_includes1"></label>';
				$filter_data .= '</div>';
				$filter_data .= '<span>Children under 6</span>';
			$filter_data .= '</div>';
			$filter_data .= '<div class="form-field-input form-field-input-checkbox round">';
				$filter_data .= '<div class="form-field-check">';
				$filter_data .= '<input type="checkbox" class="repair_include" id="home_repair_includes2" name="home_repair_includes[]" value="2">';
	  			$filter_data .= '<label for="home_repair_includes2"></label>';
				$filter_data .= '</div>';
				$filter_data .= '<span>People over 60</span>';
			$filter_data .= '</div>';
			$filter_data .= '<div class="form-field-input form-field-input-checkbox round">';
				$filter_data .= '<div class="form-field-check">';
				$filter_data .= '<input type="checkbox" class="repair_include" id="home_repair_includes3" name="home_repair_includes[]" value="3">';
	  			$filter_data .= '<label for="home_repair_includes3"></label>';
				$filter_data .= '</div>';
				$filter_data .= '<span>People with disabilities</span>';
			$filter_data .= '</div>';
			$filter_data .= '<div class="form-field-input form-field-input-checkbox round">';
				$filter_data .= '<div class="form-field-check">';
				$filter_data .= '<input type="checkbox" class="" id="home_repair_includes4" name="home_repair_includes[]" value="4">';
	  			$filter_data .= '<label for="home_repair_includes4"></label>';
				$filter_data .= '</div>';
				$filter_data .= '<span class="none_of_above">None of the above</span>';
			$filter_data .= '</div>';
			$filter_data .= '</div>';
			$filter_data .= '</div>';

			$filter_data .= '<input type="hidden" name="action" value="home_repair">';

			//$filter_data .= '<input type="submit" name="filter" value="Find a Program">';
			$filter_data .= '<div class="form-field">';
			$filter_data .= '<div class="form-field-input">';
			$filter_data .= '<button class="find_program">Find a program</button>';
			$filter_data .= '</div>';
			$filter_data .= '</div>';

			$filter_data .= '<div class="form-field">';

			$filter_data .= '<h5>results are within a 25 mile radius of the zip code entered</h5>';

			$filter_data .= '</div>';

		$filter_data .= '</form>';

	$filter_data .= '</div>';


	$filter_data .= '<div id="response_advising"></div>';

	// Output needs to be return
	return $filter_data;

}
// register shortcode
add_shortcode('home_repair', 'wpb_home_repair_filter');
