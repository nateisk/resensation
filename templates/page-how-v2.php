<?php
/**
 * Template Name: How Us V2
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main single-blog custom-main-box">

            <?php
		while ( have_posts() ) :
			the_post();

            $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
            $image_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
            ?>

            <img class="height-800" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'detailpageblogimage'); ?>" alt="<?php echo $image_alt ;  ?>">
            <?php
		
		endwhile; // End of the loop.
		?>
                <div class="container">
                    <div class="blog-content custom-blog-content">
                        <div class="single-blog-head custom-single-blog">
                            <h1>
                                <?php the_field('heading');?>
                            </h1>
                            <h6>
                                <?php the_field('title');?>
                            </h6>
                             <div class="colmn detail-box">
                                <?php echo get_template_part('content','socialshare'); ?>
                               
                            </div>
                            <div class="colmn">

                                <?php while( have_rows('persons_details') ): the_row();

                   ?>
                                <div class="colmn-box">
                                    <span><img src="<?php the_sub_field('person_image'); ?>" alt=""></span>
                                    <div class="text-box">
                                        <h6>
                                            <?php the_sub_field('person_title'); ?>
                                        </h6>
                                        <p>
                                            <?php the_sub_field('person_degination'); ?>
                                        </p>
                                    </div>
                                </div>
                                <?php wp_reset_query(); endwhile;  ?>
                            </div>
                        </div>
                        <div class="single-blog-body">
                           
                            <div class="text-section">
                                <?php the_field('our_description');?>
                                <?php the_field('our_description1');?>  
                            </div>

                           

                             <?php  get_template_part('content','blogsighnupupdate') ; ?>



                            <div class="text-section">
                               
                               <?php the_field('our_description2');?>

                                <div class="blog-slider blog-item">
                                    <?php while( have_rows('slide-section') ): the_row('slide-section'); ?>
                                    <div class="slide-section slider-testimonial <?php the_sub_field('color');?>">
                                        <h4>
                                            <?php the_sub_field('description');?>
                                        </h4>
                                        <div class="testi-name longpages">
                                            <span class="text-span <?php the_sub_field('color');?>"> 
                                                <p><?php echo get_sub_field('reviewers_name');?></p>
                                                <p><?php echo get_sub_field('reviewers');?></p>
                                            </span>
                                        </div>
                                    </div>

                                    <?php  endwhile;?>


                                </div>
                            </div>

                            <?php  get_template_part('content','patiendeducationguide') ; ?>
                            <div class="text-section content_links">
                                
                                <?php the_field('sliders_description');?>

                            </div>


                            
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
                                    <a href="<?php the_permalink();  ?>"><h5 class="blogtitles">
                                        <?php the_title(); ?>
                                    </h5></a>
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
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_footer();
