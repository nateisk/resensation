<?php
/**
 * Template Name: Thank You Page 2
 */
 
 get_header(); ?>
<main>
    <div class="thank-section">
        <div class="banner-section">
            <?php $bannerimage= get_field('image');?>
                       <img src="<?php echo $bannerimage['url'];?>" alt="<?php echo $bannerimage['alt'];?>" title="<?php echo $bannerimage['title'];?>">
        </div>
        <div class="container">
            <div class="message-section">
                <?php echo get_field('text');?>
				<div class="social-icon">
				<div id="fb-root">
				<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script></div>
				<ul class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true">
				<li><a target="_blank" target="_blank" href="https://www.facebook.com/ReSensation" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i> Follow</a></li>
				<li><a target="_blank" class="twitter-share-button" href="https://twitter.com/ReSensationNow"data-size="large"target="_blank">
				<i class="fab fa-twitter"></i> Follow</a></li>
				<li><a target="_blank" href="https://www.linkedin.com/company/resensationbyaxogen"target="_blank"><i class="fab fa-linkedin-in"></i> Follow</a>
				</li>         
				</ul>
				</div>  

            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>