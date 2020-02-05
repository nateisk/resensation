<?php
/**
 * Template Name: About Page
 */
 
 get_header(); ?>
 <main>
    <div class="about-section page-content">
        <div class="container">
            <h4><?php the_title();?></h4>
            <div class="colmn">
                <?php if( have_rows('about_subheading') ):
                     while( have_rows('about_subheading') ): the_row(); ?>
                <div class="colmn-text">
                    <?php the_sub_field('about_subheading_detail'); ?>
                </div> 
               <div class="colmn-text">
                   <?php the_sub_field('about_subheading_detail1'); ?>
                </div> 
            </div>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
    <div class="pattan-section">
        <div class="container">
            <?php $aboutimage= get_field('about_image'); ?>
                       <img src="<?php echo $aboutimage['url'];?>" alt="<?php echo $aboutimage['alt'];?>" title="<?php echo $aboutimage['title'];?>">
        </div>
    </div>
</main>
 <?php get_footer(); ?>