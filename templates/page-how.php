<?php
/**
 * Template Name: How Page
 */
 
 get_header(); ?>
<main>
    <div class="how-section page-content">
        <div class="container">
            <div class="colmn">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="colmn-text">
                    <?php the_content();?>
                </div>
                <?php endwhile; endif; ?>

                
                <div class="colmn-img">
                    <h5><?php the_field('how_text');?></h5>
                    <?php $howimage= get_field('how_image');?>
                       <img src="<?php echo $howimage['url'];?>" alt="<?php echo $howimage['alt'];?>" title="<?php echo $howimage['title'];?>">
                </div>
                
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>