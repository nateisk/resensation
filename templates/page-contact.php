<?php
/**
 * Template Name: Contact Page
 */
 
 get_header(); ?>
<main>
    <div class="page-content contact-section">
        <div class="container">
            <div class="colmn">
                <div class="colmn-text">
                    <h1><?php echo get_field('contact_title');?></h1>
                    <?php if (have_rows('contact_detail')) : ?>
                      <?php while( have_rows('contact_detail') ): the_row(); ?>
                    <div class="information-section">
                        <div class="information-box">
                            <h5><?php the_sub_field('contact_information'); ?></h5>
                            <a href="mailto:<?php the_sub_field('contact_link'); ?>"><?php the_sub_field('contact_mail'); ?></a>
                        </div>
                    </div>
                   <?php wp_reset_query(); endwhile; endif; ?>
                </div>
                <?php //echo get_template_part('content','socialshare'); ?> 
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>