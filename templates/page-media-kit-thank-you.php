<?php
/**
 * Template Name: Media Kit Thank You Page
 */
 
 get_header(); ?>
<main>
    <div class="thank-section">
        <div class="banner-section">
            <?php $bannerimage= get_field('banner_image');?>
                       <img src="<?php echo $bannerimage['url'];?>" alt="<?php echo $bannerimage['title'];?>" title="<?php echo $bannerimage['title'];?>">
        </div>
        <div class="container">
            <div class="message-section">
                <h3><?php the_field('thank_you_title'); ?></h3>
                
                <?php //echo get_template_part('content','socialshare'); ?> 
            </div>
			<center><br><br>
			<h5>Physician Marketing and Promotional Resources</h5>
			<h6 style="font-size:16pt;max-width:700px;">Our <strong><i>ReSensation Physician Marketing and Promotional resources</i></strong> are available below. Thank you for using this kit to promote ReSensation to patients, prospective patients, referring physicians and the media.
</h6><br>


<div class="patient-section text-center">
<div class="container">
<div class="colmn">
<div class="colmn-box">
<h5><a href="https://ss-usa.s3.amazonaws.com/c/308467725/media/5be1c5372ff22/Educational%20Communications.zip">Educational Communications (.zip)</a></h5>
</div>
<div class="colmn-box">
<h5><a href="https://ss-usa.s3.amazonaws.com/c/308467725/media/5be1c55f25af2/Press%20Release.zip">Press Release (.zip)</a></h5>
</div>
<div class="colmn-box">
<h5><a href="https://ss-usa.s3.amazonaws.com/c/308467725/media/5be1c57dcc8c7/ReSensation%20Logos.zip">ReSensation Logos (.zip)</a></h5>
</div>
<div class="colmn-box">
<h5><a href="https://ss-usa.s3.amazonaws.com/c/308467725/media/5be1c5d0e5c9f/LB-0967%20R00%20ReSensation%20PR%20Kit%20Suggested%20Social%20Posts.docx">Social Media Shares (.doc)</a></h5>
</div>
<div class="colmn-box">
<h5><a href="https://ss-usa.s3.amazonaws.com/c/308467725/media/5be1c5fa6b2f0/ReSensation%20HTML%20Facility%20Websites.pdf">Website Copy (.pdf)</a></h5>
</div>
</div>
</div>
</div>

<br><br>
			<h6 style="font-size:16pt;">For additional marketing assistance or resources please click <a href="mailto:ALane@axogeninc.com">here</a>. 
</h6>
			</center>
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