<?php
/**
 * Template Name: Sign Page
 */
 
 get_header(); ?>z
<main>
    <div class="sign-section page-content">
        <div class="container">
            <div class="colmn">
                <div class="colmn-text">
                    <h1><?php the_field('sign_heading');?></h1>
                    <?php echo do_shortcode('[contact-form-7 id="85" title="Sign Up Page" html_id="sighnupforupdates"]'); ?>
                <?php
                    echo html_entity_decode(get_field('sharp_spring_code', 'option'), ENT_QUOTES, 'UTF-8');  
                ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
