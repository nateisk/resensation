<?php
/**
 * Template Name: Blog Page
 */
 
 get_header(); ?>
    <main>
        <div class="blog-view-section blog-section single-blog custom-main-box">
            <div class="blog-img">
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
            </div>

               <!-- top background -->
             <!--      <div class="banner-img-single" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'detailpageblogimage'); ?>');background-position: top center; background-size: cover; background-repeat: no-repeat; width: 100%; clear: both; position: relative;"> -->

                <div class="banner-img-single custom-banner">
                             <div class="container">
                                 <div class="colmn colmn-head custom-single-blog custom-blog2">
                                    <div class="colmn-text">
                                        <h1>
                                            <?php the_field('blog_title');?>
                                        </h1>
                                        <?php the_field('blog_description');?>
                                    </div>
                                    <?php /*echo get_template_part('content','socialshare');*/ ?>

                                 </div>
                             </div>
                   </div>

        <!-- top background end -->


            <div class="container">
            
                <div class="colmn padd-20">

                    <?php 
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args  = array(
                	'post_type'		=>'post',
                	'post_status'	=>'publish' , 
                	'posts_per_page'=> 6,
                	'paged' 		=> $paged );  

					$blogs = new WP_Query($args);

					if ( $blogs->have_posts() ) {
						while ( $blogs->have_posts() ) {
							$blogs->the_post(); 
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
                            <a href="<?php the_permalink();  ?>" class="btn">Read More</a>
                        </div>
                    </div>

                    <?php		
						} // end while
						wp_reset_postdata();
					} // end if

					?>



                </div>

                <div class="paging pagination">
                    <?php if (function_exists('custom_pagination')) {    
               custom_pagination($blogs->max_num_pages,"",$paged);                                            
               }
               wp_reset_query();
               ?>
                </div>

            </div>
        </div>
    </main>
    <?php get_footer(); ?>
