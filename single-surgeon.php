<?php
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main single-blog custom-main-box">
		<div class="surgeon-banner">
			

	<?php  
	$bannerimage = get_field('banner'); 
	if( is_array($bannerimage) ){ ?>

		<img class="main-img" src="<?php echo $bannerimage['url']; ?>" alt="<?php echo $bannerimage['alt']; ?>">

	<?php }
	?>
			<div class="patten-img">
				<?php  $bannerpattern = get_field('surgeon_profile_pattern_banner','option'); 
				if( is_array($bannerpattern) ){ ?>

					<img src="<?php echo $bannerpattern['url']; ?>" alt="<?php echo $bannerpattern['alt']; ?>">

				<?php }
				?>
				
			</div>
		</div>
		<div class="people-card">
			<div class="container">
				<div class="colmn">
					<div class="colmn-img">
				<?php  
				$doctorimage = get_field('doctor_profile_picture'); 
				if( is_array($doctorimage) ){ ?>

					<img src="<?php echo $doctorimage['url']; ?>" alt="<?php echo $doctorimage['alt']; ?>">

				<?php }
				?>
						
					</div>
					<div class="colmn-text">
						<h2><?php echo get_field('doctor_firstname'); ?> <?php echo get_field('doctor_middlename'); ?> <?php echo get_field('doctor_lastname'); ?>, <span> <?php echo get_field('doctor_designation'); ?></span></h2>
						<h3><?php echo get_field('doctor_practice_address_city'); ?>, <?php echo get_field('doctor_practice_address_state'); ?></h3>
						<div class="colmn-innerBox">
							<div class="inner-img">

							<?php  
							$practiceimage = get_field('doctor_practice_logo'); 
							if( is_array($practiceimage) ){ ?>

								<img src="<?php echo $practiceimage['url']; ?>" alt="<?php echo $practiceimage['alt']; ?>">

							<?php }
							?>
								
							</div>
							<div class="inner-text">
								<h4><span><?php echo get_field('doctor_practice_name'); ?></span></h4>
								<h4><?php echo get_field('doctor_practice_address_line_1'); ?><?php if(get_field('doctor_practice_address_line_2')){?>, <?php echo get_field('doctor_practice_address_line_2'); ?>  <?php } ?> <br><?php echo get_field('doctor_practice_address_city'); ?>, <?php echo get_field('doctor_practice_address_state'); ?> <?php echo get_field('doctor_practice_address_zip'); ?></h4>
							</div>
						</div>
						<ul class="btn-grp">
							<li><a href="tel:<?php echo get_field('doctor_practice_phone_number'); ?>" class="btn"><img src="<?php echo get_template_directory_uri(); ?>/images/phone.svg" alt="Phone"> <?php echo get_field('doctor_practice_phone_number'); ?></a></li>
							<li><a href="#circle-popup" class="btn btn-blue">Request a Consultation</a></li>
						</ul>
						<div class="colmn-sec detail-box socialshare Social-top-link aboutusv2">
							<?php echo get_template_part('content','socialshare'); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="surgeontext-box">
			<div class="container-xs">
				<h2><?php echo get_field('doctor_firstname'); ?> <?php echo get_field('doctor_lastname'); ?>, <?php echo get_field('doctor_designation'); ?></h2>
				<?php echo get_field('about_doctor'); ?>
			</div>
		</div>
		<div class="surgeon-slider">
			<div class="container-xs">
				<div class="text-section">

					<div class="blog-slider blog-item">
						
							<?php if(have_rows('testimonials')){
								while(have_rows('testimonials')){
									the_row();

							?>
							<div class="slide-section slider-testimonial pink">
								<h4><?php echo get_sub_field('testimonial_heading'); ?></h4>
								<div class="testi-name longpages">
									<span class="text-span pink">

										<?php echo get_sub_field('testimonial_content'); ?>
										
									</span>
									<div class="testi-author">
										<h3><?php echo get_sub_field('testimony_author'); ?></h3>
										<p><?php echo get_sub_field('testimonial_author_designation'); ?></p>
									</div>
								</div>
							</div>

							<?php 
								}
							} ?>


					</div>
				</div>
			</div>
		</div>
		<div class="imageBox-section">
			<div class="container-xs">
				<div class="colmn">
					<div class="img-box">
						<ul>
							<li>
								<h4 class="custom-affiliate hospitalheading">Affiliated <br> Hospitals</h4>

							</li>

							<?php if(have_rows('affiliated_hospitals')){
								while(have_rows('affiliated_hospitals')){
									the_row();

							?>
							<li>

							<?php  
							$hospital_logo = get_sub_field('hospital_logo'); 
							if( is_array($hospital_logo) ){ ?>

								<img src="<?php echo $hospital_logo['url']; ?>" alt="<?php echo $hospital_logo['alt']; ?>">

							<?php }else{ ?>

								<h4 class="custom-affiliate"><?php echo get_sub_field('hospital_name'); ?></h4>
							<?php }
							?>
								

								

							</li>

							<?php 
								}
							} ?>

						
						</ul>
					</div>
					<div class="text-box">
						<?php echo get_field('doctor_details'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="surgeontext-box">
			<div class="container-xs">
				<h2><?php echo get_field('service_heading'); ?></h2>
				<?php echo get_field('service_details'); ?>
			</div>
		</div>
		<div class="circle-popup popUp" id="circle-popup">
			<div class="popup-container">
				<span class="btn-close">X</span>
				<h2><span>Request a Consult with</span> <?php echo get_field('doctor_firstname'); ?> <?php echo get_field('doctor_lastname'); ?>, <?php echo get_field('doctor_designation'); ?></h2>
				<?php 
				echo do_shortcode('[contact-form-7 id="1130" title="Consult a Physician" destination-email="'.get_field("doctor_practice_email").'"]'); 
				?>
				
			</div>
		</div>

<script type="text/javascript">
var __ss_noform = __ss_noform || [];
__ss_noform.push(['baseURI', 'https://app-3QNEGP78YU.marketingautomation.services/webforms/receivePostback/MzawMDEzNzcyBQA/']);
__ss_noform.push(['endpoint', 'f1841d0b-da9e-4932-be70-888fd03c530d']);
__ss_noform.push(['mailofdoctor', '<?php echo get_field("doctor_practice_email"); ?>']);
</script>
<script type="text/javascript" src="https://koi-3QNEGP78YU.marketingautomation.services/client/noform.js?ver=1.24" ></script>

		<?php if(get_field('is_qa_module_avalaible')){ ?> 
		<div class="faq-section" id="consultdoctor">
			<div class="container-sm">
				<div class="colmn">
					<div class="colmn-img">


					<?php  
					$doctor_qa_photo = get_field('doctor_qa_photo'); 
					if( is_array($doctor_qa_photo) ){ ?>

						<img src="<?php echo $doctor_qa_photo['url']; ?>" alt="<?php echo $doctor_qa_photo['alt']; ?>">

					<?php }
					?>
			
					</div>
					<div class="colmn-text">
						<h2><span>Q&A</span> <?php echo get_field('doctor_qa_heading'); ?></h2>
						<a href="<?php echo get_field('doctor_interview_link') ?>" class="btn form-btsn">Learn more</a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

		<!-- Consultation Form -->
		
		<div class="profile_forms">
			<div class="container">
				<div class="profile-main-form">
					<h2><span>Request a Consult with</span> <?php echo get_field('doctor_firstname'); ?> <?php echo get_field('doctor_lastname'); ?>, <?php echo get_field('doctor_designation'); ?></h2>
				<?php 
					echo do_shortcode('[contact-form-7 id="1215" title="Consult a Physician" destination-email="'.get_field("doctor_practice_email").'"]'); 
				?>
				</div>
			</div>
		</div>

		<!-- Consultation FOrm -->

		<div class="blog-view-section section-top text-center padTop70">
			<h2><?php echo the_field('resensation_blog_title','option'); ?></h2>
			<div class="container">


				<div class="colmn">


					<?php $args = array('post_type'=>'post','post_status'=>'publish' , 'posts_per_page'=> 4 );  

					$blogs = new WP_Query($args);

					if ( $blogs->have_posts() ) {
						while ( $blogs->have_posts() ) {
							$blogs->the_post(); 
							?>

							<div class="colmn-box">
								<span>
									<?php 
		                        	$blog_thumbnail_id = get_post_thumbnail_id( get_the_ID() );

		                        	$blogimage_alt = get_post_meta($blog_thumbnail_id, '_wp_attachment_image_alt', TRUE);
		                    		?>
	                        		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'homeblog' ) ; ?>" alt="<?php  echo $blogimage_alt;  ?>"> 
								</span>
								<div class="box-text">
									<a href="<?php the_permalink();  ?>"><h5 class="blogtitles"><?php the_title(); ?></h5></a>
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink();  ?>" class="btn">Read More</a>
								</div>
							</div>

							<?php		
						} // end while
						wp_reset_postdata();
					} // end if

					?>

				</div>
				<a href="<?php echo get_field('more_blog_text','option'); ?>" class="btn btn-outline">More News <i class="fas fa-angle-down"></i></a>
			</div>
		</div> 


	</main>
	<!-- #main -->
</div>
<?php get_footer(); ?>
