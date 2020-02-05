<?php
/**
 * Template Name: Resource Page
 */ 
 get_header(); ?>
<main>
    <div class="resource-section page-content">
        <div class="resource-banner product-view-section">
            <div class="container">
                <div class="colmn">
                    <?php  if (have_posts() ) : while (have_posts() ) :the_post(); ?>
                    <div class="colmn-text">
                        <?php the_content();?>
                    </div>
                    <?php endwhile; endif; ?>
                    <div class="colmn-img">
                        <?php $bannerimage= get_field('resource_image');?>
                        <img src="<?php echo $bannerimage['url'];?>" alt="<?php echo $bannerimage['title'];?>" title="<?php echo $bannerimage['title'];?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-sm">
            <?php if (have_rows('resourse_description')) : ?>
                  <?php while( have_rows('resourse_description') ): the_row(); ?>
            <div class="text-box">
                      <h5><?php the_sub_field('resorce_heading_details'); ?></h5>
                      <p><?php the_sub_field('resource_details'); ?></p>
					  
					  	<div class="colmn detail-box">
							<?php echo get_template_part('content','socialshare'); ?>         
						</div>	
					  
            </div>
            <?php wp_reset_query(); endwhile; endif; ?>
            <div class="form-view-section resource-form">
                <div class="form-section">
                    <?php echo do_shortcode('[contact-form-7 id="237" title="Resource Guide"]'); ?>
					<script type="text/javascript">
						var __ss_noform = __ss_noform || [];
						__ss_noform.push(['baseURI', 'https://app-3QNEGP78YU.marketingautomation.services/webforms/receivePostback/MzawMDEzNzcyBQA/']); 
						__ss_noform.push(['endpoint', '938b86ff-4929-4bab-bb71-af273f393da8']);
					</script>
					<script type="text/javascript" src="https://koi-3QNEGP78YU.marketingautomation.services/client/noform.js?ver=1.24" ></script>					
					
                </div>
            </div>
        </div>
        <div class="patient-section text-center">
            <div class="container">
                <h2><?php the_field('resensation_patient_heading');?></h2>
                <div class="colmn">
               <?php if (have_rows('resensation')) : ?>
                  <?php while( have_rows('resensation') ): the_row(); ?>
                    <div class="colmn-box">
                        <h5><?php the_sub_field('resensation_details'); ?></h5>
                    </div>
              <?php wp_reset_query(); endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>