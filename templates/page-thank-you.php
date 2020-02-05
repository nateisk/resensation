<?php
/**
 * Template Name: Thank You Page 1
 */
 
 get_header(); ?>
<main>
    <div class="thank-section">
        <div class="banner-section">
            <?php $bannerimage= get_field('banner_image');?>
                       <img src="<?php echo $bannerimage['url'];?>" alt="<?php echo $bannerimage['alt'];?>" title="<?php echo $bannerimage['title'];?>">
        </div>
        <div class="container">
            <div class="message-section">
                <h3><?php the_field('thank_you_title'); ?></h3>
                <h5><?php the_field('thank_you_text'); ?></h5>
                <?php //echo get_template_part('content','socialshare'); ?> 
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>