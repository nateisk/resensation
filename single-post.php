<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package axresensationmm
 */

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main single-blog">

        <?php
		while ( have_posts() ) :
			the_post();			
			//the_post_thumbnail('detailpageblogimage');
            ?>

      <!--   <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'detailpageblogimage'); ?>"> -->
        <?php
		
		endwhile; // End of the loop.
		?>


        <!-- top background -->
                  <div class="banner-img-single" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'detailpageblogimage'); ?>');background-position: top center; background-size: cover; background-repeat: no-repeat; width: 100%; clear: both; position: relative;">
                             <!-- <div class="container">
 -->                
                   <!-- </div> -->
               </div>

        <!-- top background end -->





        <div class="container">
            <div class="blog-content top-banner-content custom-blog-content2 custom-detail-page">
                <div class="single-blog-head">
                    <h1 class="size-42">
                        <?php the_field('heading');?>
                    </h1>
                    <h6>
                        <?php the_field('title');?>
                    </h6>
                    <div class="colmn">

                              <?php if( have_rows('persons_details')): while( have_rows('persons_details') ): the_row();?>

                        <div class="colmn-box">
                                <?php if(get_sub_field('person_image')) {?>
                                <span><img src="<?php  echo get_sub_field('person_image'); ?>" alt=""></span>
                            <?php }?>
                            <div class="text-box">
                                <?php if(get_sub_field('person_title')) {?>
                                <h6>
                                    <?php echo get_sub_field('person_title'); ?>
                                </h6>
                                <?php }?>
                                <?php if(get_sub_field('person_degination')) {?>
                                <p>
                                    <?php echo get_sub_field('person_degination'); ?>
                                </p>
                                <?php }?>
                            </div>
                        </div>
                             <?php wp_reset_query();                                 
                            endwhile; 
                            endif;  ?>
                    </div>
                </div>
            </div>

            <div class="blog-content rem-marg-top">
                <div class="single-blog-body">
                    <div class="colmn detail-box">
                        <?php echo get_template_part('content','socialshare'); ?>
                        <span>
                            <?php echo get_the_date( 'd M Y' );?></span>
                    </div>
                    <div class="text-section">
                        <?php the_field('our_description');?>

                        <div class="blog-slider blog-item">
                            <?php while( have_rows('slide-section') ): the_row('slide-section'); ?>
                            <div class="slide-section slider-testimonial <?php the_sub_field('color');?>">
                                <h4>
                                    <?php the_sub_field('description');?>
                                </h4>
                                <div class="blog-slider-review">
                                    <span class="text-span <?php the_sub_field('color');?>">
                                       <p> <?php echo get_sub_field('reviewers');?> </p>
                                    </span>
                                </div>
                            </div>

                            <?php  endwhile;?>


                        </div>

                        <?php the_field('our_description1');?>
                        <img src="<?php the_field('images');?>" alt="">

                        <?php the_field('our_description2');?>
                    </div>
                    <?php  get_template_part('content','blogsighnupupdate') ; ?>
                    <div class="text-section">

                        <?php the_field('our_description_3');?>

                        <?php the_field('sliders_description');?>
                        
                    </div>
                    <div class="text-section content_links">

                        <?php the_field('content_links');?>

                    </div>
                    <?php  get_template_part('content','patiendeducationguide') ; ?>
                </div>
            </div>
        </div>
        <div class="blog-view-section section-top text-center blog-list-page">
            <h2>
                <?php the_field('resensation_blog_title','option');?>
            </h2>
            <div class="container">
                <div class="colmn">

                    <?php 
					$currentID = get_the_ID();
                    $my_query = new WP_Query( array('post_type' => 'post', 'showposts' => '4', 'post__not_in' => array($currentID)));
						if ( $my_query->have_posts() ) {
							while ( $my_query->have_posts() ) {
								$my_query->the_post(); 
					?>

                    <div class="colmn-box">
                        <span>
                        <?php 
                            $blog_thumbnail_id = get_post_thumbnail_id( get_the_ID() );

                            $blogimage_alt = get_post_meta($blog_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                        ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'homeblog' ) ; ?>" alt="<?php  echo $blogimage_alt;  ?>">
                        </span>
                        <div class="box-text">
                            <h5>
                                <a href="<?php the_permalink();  ?>"><?php the_title(); ?></a>
                            </h5>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink();  ?>" class="btn blog-detail-btn">Read More</a>
                        </div>
                    </div>

                    <?php		
							} // end while
								wp_reset_postdata();
							} // end if
						?>
                </div>


                <a href="<?php the_field('more_blog_link','option');?>" class=" btn btn-outline">
                    <?php the_field('more_blog_text','option');?><i class="fas fa-angle-down"></i></a>

            </div>
        </div>
        <div class="share-sticky">
            <div class="colmn">
                <h5>
                    <?php the_field('social_share_heading','option');?>
                </h5>
                <ul class="social-circle" class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                    <div id="fb-root">
                        <script>
                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));

                        </script>
                    </div>

                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a></li>

                    <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" data-size="large" target="_blank"><i class="fab fa-twitter"></i></a></li>

                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php the_title(); ?>&source=LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>

                    <li><a href="mailto:type_email_address_here?subject=<?php the_title(); ?>&body=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank"><i class="far fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </main>
    <!-- #main -->
</div>
<!-- #primary -->

<?php
get_footer();
