<?php
/**
 * Template Name: FAQ V2
 */

get_header(); ?>
<div id="primary" class="content-area">

<main id="main" class="site-main single-blog custom-main-box">

<?php
if( have_posts() ) :
	while ( have_posts() ) :
	the_post();

    $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
    $image_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
    ?>

    <img class="height-800" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'detailpageblogimage'); ?>" alt="<?php echo $image_alt ;  ?>">
    <?php
	endwhile; 
endif; // End of the loop.
?>


    <div class="faq-section page-content">
        <div class="container">
        	


        		<!-- Socal Share and Title -->
        		<div class="blog-content custom-blog-content page-why-d2">
	        		<div class="single-blog-head custom-single-blog addcustom2">
	                <h1><?php the_title() ;?></h1>
	                 <h6>
	                    <?php the_field('title');?>
	                </h6> 
	                 <div class="colmn detail-box">
	                    <?php echo get_template_part('content','socialshare'); ?>
	                   
	                </div>
	                
	                </div>
            	</div>
        		<!-- End Social Share and title -->


            <div class="colmn">
                <div class="colmn-text">
<!--                    <h4><?php the_title();?></h4>-->
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
    </div>
</main>
</div>
<?php get_footer(); ?>