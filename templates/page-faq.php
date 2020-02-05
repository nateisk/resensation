<?php
/**
 * Template Name: FAQ Page
 */
 
 get_header(); ?>
<main>
    <div class="faq-section page-content">
        <div class="container">
            <div class="colmn">
                <div class="colmn-text">
                    <h4><?php the_title();?></h4>
                    <div class="accordin-section">
                        <?php if( have_rows('faqs') ):
                              while( have_rows('faqs') ): the_row(); ?>
                        <div class="accordin-box">
                            <div class="accordin-header">
                                <p><?php the_sub_field('faq_question'); ?></p>
                                <span><i class="fas fa-plus"></i></span>
                            </div>
                            <div class="accordin-body">
                                <p><?php the_sub_field('answer'); ?></p>
                            </div>
                        </div>
                       
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>