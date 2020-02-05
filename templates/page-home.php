<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>
<div class="hero-banner homeslider text-center">
    <div>
        <div class="slider-section bg-control" style="background-image: url(<?php the_field('slider_image'); ?>);">
            <div class="text-section">
                <?php the_field('slider_text'); ?>
            </div>
        </div>
    </div>
    <div>
        <div class="slider-section">
            <div class="text-section circle-section">
                <div class="center-box">
                    <?php the_field('sliders_title'); ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="slider-section">
            <div class="text-section rounder-section">
                <h3>
                    <?php the_field('slider_title'); ?>
                </h3>
            </div>
        </div>
    </div>

    <div>
        <div class="slider-section bg-control" style="background-image: url(<?php the_field('sliders_img'); ?>);">
            <div class="text-section">
                <span><?php the_field('sliders_text'); ?></span>
            </div>
        </div>
    </div>

</div>
<section id="mouse" class="container scroll">

    <a><span></span></a>
</section>
<main>


    <?php if(get_field('show_testimonial')){?>
        <div class="testimonial-section bg-control text-center" style="background-image: url(<?php echo get_field('testimonial_img'); ?>)">
            <div class="container">
               <div class="single-item">

                  <?php $testimonial = array(
                    'post_type'     =>'testimonial',
                    'post_status'   =>'publish' , 
                    'posts_per_page'=> -1, 
                    'order'         => 'ASC'
                );  

                  $testimonials = new WP_Query($testimonial);

                  if ( $testimonials->have_posts() ) {
                     while ( $testimonials->have_posts() ) {
                        $testimonials->the_post(); 
                        ?>

                        <div class="testimonial-box">
                         <div class="content-section">
                            <h3><?php echo get_field('line1'); ?></h3>
                            <h4><?php echo get_field('line2'); ?><h4>
                            </div>
                            <h5><?php echo get_field('testimony'); ?></h5>
                            <span><?php echo get_field('designation'); ?></span>
                        </div>
                        <?php		
    				} // end while
    				wp_reset_postdata();
    			} // end if
              ?>




          </div>
      </div>
  </div>

<?php } ?>
<div class="product-view-section section-top">
    <div class="container">
        <div class="colmn">
            <div class="colmn-img mobileresourceguide">
                <?php $patientguidem= get_field('resensation_patient_imgmobile');?>
                <img src="<?php echo $patientguidem['url'];?>" alt="<?php echo $patientguidem['alt'];?>" title="<?php echo $patientguidem['title'];?>">

            </div>
            <div class="colmn-text">
                <?php echo get_field('resensation_patient_title'); ?>
               
                <a href="<?php echo get_field('download_link'); ?>" target="_blank" class="btn" id="myButton">
                    <?php echo get_field('download_title'); ?>
                </a>
            </div>
            <div class="colmn-img desktopsourceguide">
                <?php $patientguided= get_field('resensation_patient_img');?>
                <img src="<?php echo $patientguided['url'];?>" alt="<?php echo $patientguided['alt'];?>" title="<?php echo $patientguided['title'];?>">

            </div>
        </div>
    </div>
</div>


<!-- Video Testimonial -->
        <section class="client-video mt_100" id="patientexperience">
            <div class="slider-heading">
                <h2>
                    <strong>ReSensation</strong> Patient Experiences
                </h2>
            </div>
            <div class="container">
                <div class="client-experience">


                <?php 
                    $vidtestimonials = array('post_type'=>'videotestimonials', 'posts_per_page'=> -1, 'order'=> 'ASC');
                    $vidtestimonial = new WP_Query($vidtestimonials);
                    while ( $vidtestimonial->have_posts() ) : $vidtestimonial->the_post();
                ?>
                    <a href="javascript:void(0);" class="popup_link">
                        <div style="padding:56.25% 0 0 0;position:relative;"><?php
                            echo html_entity_decode(get_field('iframe_vimeo_code',get_the_ID()), ENT_QUOTES, 'UTF-8');  
                        ?></div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </a>
                <?php       
                    endwhile;   wp_reset_postdata()
                ?>
                    
                </div>
            </div>
        </section>
<!-- Video Testimonial -->

    <div class="blog-view-section section-top text-center">
		<h2><?php echo the_field('blog_title'); ?></h2>
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
			<a href="<?php echo get_field('more_news_link'); ?>" class="btn btn-outline">More News <i class="fas fa-angle-down"></i></a>
		</div>
	</div> 
    <div class="form-view-section">
        <div class="container">
            <div class="form-section">
                <?php echo do_shortcode('[contact-form-7 id="60" title="Sign Up Form" html_id="sighnupforupdate"]'); ?>
                <?php

                echo html_entity_decode(get_field('home_sharp_spring_code', 'option'), ENT_QUOTES, 'UTF-8');  
                ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
