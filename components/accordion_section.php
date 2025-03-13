<section class="accordion-block" data-component="accordion">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="main-wrap">
					<?php 
					if( get_sub_field('accordion_main_title') ) {
						echo "<h2>".get_sub_field('accordion_main_title')."</h2>";
						
					}
			
			if ( have_rows('page_accordion') ):	?>				
				<div class="accordian-wrap">
					<?php
		            while ( have_rows('page_accordion') ):
	                    the_row();
		                $accordion_title = get_sub_field('accordion_title');
		                $accordion_description = get_sub_field('accordion_description');
		                ?>
						<div class="accordian-item">
							<h5><?php echo $accordion_title; ?></h5>
							<div class="accordian-answer">
									<p><?php echo $accordion_description; ?></p>
							</div>
						</div>
		            	<?php
		            endwhile; ?>
	            </div><?php 
			endif;?>
	        </div>
			</div>
        </div>
    </div>
</section>


