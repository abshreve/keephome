<?php
get_header();

?>


<main id="site-content">
<div class="container">
	<?php

	if ( have_posts() ) {

		echo '<div class="home_repair_program">';


			while ( have_posts() ) { the_post();

				$home_repair_interested_help 	= get_field( 'home_repair_interested_help' );
				$home_service_name 	= get_field( 'home_repair_organization_name' );
	    		$home_program_description = get_field( 'home_program_description' );
	    		$home_city = get_field( 'home_repair_city' );
	    		$home_zip 	= get_field( 'home_repair_zipcode' );
	    		$website 	= get_field( 'home_repair_website_link' );
	    		$phone_no	= get_field( 'home_repair_phone_no' );


	    		if( $home_service_name ) {
			    	echo '<div class="home_organization_name">';
			    		echo $home_service_name;
			    	echo '</div>';
			    }

		    	echo '<div class="home_program_name">';
		    		echo  get_the_title();
		    	echo '</div>';

		    	if( $home_program_description ) {
			    	echo '<div class="home_program_description">';
			    		echo $home_program_description;
			    	echo '</div>';
			    }

			    if( !empty( get_the_content() )  ) {
			    	echo '<div class="home_description">';
			    		echo get_the_content();
			    	echo '</div>';
			    }

			    if( $home_city || $home_zip ) {
					echo '<div class="home_program_state_zip">';

						if( $home_zip ){
							echo $home_city . ' - '. $home_zip;
						} else {
							echo 'All OHIO - N/A';
						}

			    	echo '</div>';
			    }

			   	if( $website ){
					echo '<div class="home_website">';
					    echo '<a class="button" href="'.esc_url( $website ).'" target="_blank"> Learn More </a>';
					echo '</div>';
				}

				echo '<div class="home-wrap">';
			    if( $phone_no ){
			    	echo '<div class="home_phone_no">';
						echo '<span>Call</span>';
			    		echo '<a href="tel:'.str_replace(".", "", $phone_no).'">' . $phone_no . '</a>';
			    	echo '</div>';
			    }
				
				if( $home_repair_interested_help ){
			    	echo '<div class="home_phone_no">';
						echo '<span>Type</span>';
			    		echo '<p>' . $home_repair_interested_help . '</p>';
			    	echo '</div>';
			    }
				echo '</div>';
			}

			echo '<div class="home_website">';
			    echo '<a class="button" href="'.site_url('/home-repair-funds').'"> Back </a>';
			echo '</div>';


		echo '</div>';
	}


?>
</div>
</main><!-- #site-content -->


<?php get_footer(); ?>
