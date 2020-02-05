<?php
/**
 * Template Name: Media Kit Page
 */ 
 get_header(); ?>
<div id="content" class="site-content">
<main>
<div class="thank-section">
<div class="banner-section">
            <?php $bannerimage= get_field('banner_image');?>
                       <img src="<?php echo $bannerimage['url'];?>" alt="<?php echo $bannerimage['title'];?>" title="<?php echo $bannerimage['title'];?>">
</div>
<div class="container">
<div class="message-section" style="padding-bottom:10px;">
<h3 style="color:#ec008c;font-weight:bolder;font-family:var(--font-bold);">ReSensation Physician Marketing and Promotional Resources</h3>
<h5 style="padding: 60px 40px 50px;">We have a range of resources available to aid our physicians and institutions in the promotion of ReSensation to patients and prospective patients, referring physicians and the media.</h5>
</div>
</div>
</div>
</main>

</div>

	
	
<main>	
	
    <div class="resource-section page-content">

        <div class="container-sm">
            <?php if (have_rows('resourse_description')) : ?>
                  <?php while( have_rows('resourse_description') ): the_row(); ?>
<br>
            <?php wp_reset_query(); endwhile; endif; ?>
            <div class="form-view-section resource-form">
                <div class="form-section">
                    <?php echo do_shortcode('[contact-form-7 id="520" title="Download Resources Now"]'); ?>
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QNEGP78YU.marketingautomation.services/webforms/receivePostback/MzawMDEzNzcyBQA/']);
    __ss_noform.push(['endpoint', '8be1448a-afed-44eb-9447-65807fde08fe']);
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
<style>
.ask-box {
	display:none;
}

.fbut {
	display:none;
}
</style>
<?php get_footer(); ?>