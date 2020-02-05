<?php
/**
 * Template Name: Why Page
 */
 
 get_header(); ?>
<main>
    <div class="why-section page-content">
        <div class="container">
            <div class="colmn">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="colmn-text">
                    <?php the_content();?>
                </div>
                <?php endwhile; endif; ?>
                <div class="colmn-img">
                    <?php $whyimage= get_field('why_image');?>
                       <img src="<?php echo $whyimage['url'];?>" alt="<?php echo $whyimage['alt'];?>" title="<?php echo $whyimage['title'];?>">
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>