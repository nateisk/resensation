<div class="patient-education colmn">
	<div class="colmn-text">
	    <h3>
	        <?php the_field('resensation_education_title','option');?>
	    </h3>
	    <a href="<?php the_field('resensation_education_link','option');?>" class="btn" target="_blank">
	        <?php the_field('resensation_education_text','option');?>
	    </a>
	</div>
	<div class="colmn-img">
	    	<?php  $patientresourceguide = get_field('resensation_education_image','option'); 
	if( is_array($patientresourceguide) ){ ?>

		<img src="<?php echo $patientresourceguide['url']; ?>" alt="<?php echo $patientresourceguide['alt']; ?>">

	<?php }
	?>
	</div>
</div>