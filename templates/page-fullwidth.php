<?php
/**
 * Template Name: Full Page
 */
 
 get_header(); ?>
<main>
    <div class="full-width-section page-content">
       
        <div class="container">
            <div class="colmn">
                <div class="colmn-text">
                    <h1><?php the_title(); ?></h1>
                    <div class="accordin-section">
                        <div class="accordin-box">
                       
                       <?php if(have_posts()){ ?>
                           <?php while(have_posts()){ ?>
                           
                             
                                   <?php the_post(); ?>
                                   
                                   <?php the_content(); ?>  
    
                            <?php } ?>
                       <?php } ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>