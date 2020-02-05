<?php 
/**
 * Template Name: ReSensation Brand Resources
 */

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="physicianresourcethankyou">


        
        
		<?php  
		$featureimage = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
		if( $featureimage ){ ?>

			<img class="height-800" src="<?php echo $featureimage; ?>">

		<?php }
		?>
                        
        <div class="container">
            <div class="blog-content custom-blog-content">
                <div class="single-blog-head custom-single-blog second">
                    <h4><?php echo get_field('page_heading'); ?></h4>
                </div>
			</div>
			
			<?php
			$user = wp_get_current_user();

			if( ( is_user_logged_in() &&  in_array( 'physician', (array) $user->roles ) &&  get_user_meta($user->ID, 'user_status',true ) == 1 )  ||  in_array( 'administrator', (array) $user->roles ) ){ ?>

			<ul class="physicians-tabs" id="physicians-tabs">
				<li><a href="#physician">Downloadable Assets</a></li>
				<li><a id="orderform" href="#order">Order Form</a></li>
			</ul>
			<div class="physicianTab-section">

				<!-- Physician Tab -->
				<div id="physician" class="inner-physician tab-box">	
					<ul class="brand-link">

						<?php 
								if(have_rows('contextual_links')){

									while(have_rows('contextual_links')){

										the_row();
						?>
						<li><a href="<?php  echo get_sub_field('anchor_value') ; ?>"><?php  echo get_sub_field('anchor_text') ; ?></a></li>
						<?php
									}
								}

						?>

					</ul>
					<div id="implement">
						<div class="implementation-sec text-center">
							<h2><?php  echo get_field('implementation_heading') ; ?></h2>
						</div>
						<div class="implementation-wrapper">

							<?php 
								if(have_rows('implementation')){

									while(have_rows('implementation')){

										the_row();
							?>
							<div class="implementation">
								<div class="implementation-image">
									<?php  
									$imp_photo = get_sub_field('image'); 
									if( is_array($imp_photo) ){ ?>

										<a target="_blank" href="<?php echo get_sub_field('pdf_file'); ?>"><img src="<?php echo $imp_photo['url']; ?>" alt="<?php echo $imp_photo['alt']; ?>"></a>

									<?php }
									?>
								</div> 
								<div class="implement-hover">
									<div class="implementation-content text-center">
										<h5><a target="_blank" href="<?php echo get_sub_field('pdf_file'); ?>"><?php echo get_sub_field('heading'); ?></a></h5>
									</div>
									<div class="implement-hover-sec text-center equal-box">
										<p><?php echo get_sub_field('text'); ?></p>
									</div>
								</div>	
							</div>
							<?php
									}
								}

							?>

							
						</div>
						
					<div class="material-section" id="office-material">
						<div class="implementation-sec text-center">
							<h2><?php  echo get_field('in-office_materials_heading') ; ?></h2>
						</div>
						<div class="implementation-wrapper">

							<?php 
								if(have_rows('in_office_material_repeater')){

									while(have_rows('in_office_material_repeater')){

										the_row();
							?>
							<div class="implementation">
								<div class="implementation-image">
									<?php  
									$inofficeimage = get_sub_field('image'); 
									if( is_array($inofficeimage) ){ ?>

										<a  href="<?php echo get_sub_field('pdf_file'); ?>"><img src="<?php echo $inofficeimage['url']; ?>" alt="<?php echo $inofficeimage['alt']; ?>"></a>

									<?php }
									?>
								</div>
								<div class="implement-hover">
									<div class="implementation-content text-center equal-box">
										<h5><?php echo get_sub_field('heading'); ?></h5>
									</div>
									<div class="implement-hover-sec text-center equal-box">
											<p><?php echo get_sub_field('text'); ?></p>
									</div>	
								</div>
							</div>
							<?php
									}
								}

							?>


						</div>
						
						<div class="orders-btns text-center">
							<a class="btn fbut" id="orderbuttonclickopennewtab" href="javascript:void(0);">Order Now</a>
						</div>
					</div>
					<div class="material-section" id="social-media">
						<div class="implementation-sec text-center">
							<h2><?php echo get_field('social_media_awareness_headline') ?></h2>
						</div>


						<ul class="socials">

						<?php if( have_rows('social_icon','option') ): ?>
							<?php while( have_rows('social_icon','option') ): the_row(); ?>
								<li>
									<a target="_blank" href="<?php echo get_sub_field('social_links'); ?>">
										<i class="<?php echo get_sub_field('social_icons'); ?>"></i>
									</a>
								</li>							
							<?php endwhile; ?>
						<?php endif; ?>

						</ul>



						<div class="implementation-wrapper">

							<?php if( have_rows('social_media_awareness') ): ?>
								<?php while( have_rows('social_media_awareness') ): the_row(); ?>
									<div class="implementation">
										<div class="implementation-image">
											
										<?php  
										$socialimage = get_sub_field('image'); 
										if( is_array($socialimage) ){ ?>

											<a  href="<?php echo get_sub_field('pdf_file'); ?>"><img src="<?php echo $socialimage['url']; ?>" alt="<?php echo $socialimage['alt']; ?>"></a>

										<?php }
										?>

										</div>
										<div class="implement-hover">
											<div class="implementation-content text-center">
												<h5><?php echo get_sub_field('heading') ?></h5>
											</div>
											<div class="implement-hover-sec text-center equal-box">
												<p><?php echo get_sub_field('text'); ?></p>
											</div>
										</div>		
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
							
						</div>
					</div>
					<div class="material-section" id="logoes">
						<div class="implementation-sec text-center">
							<h2><?php echo get_field('logo_heading_text'); ?></h2>
						</div>
						<div class="bottom-btns">
							<a class="ft-logo" href="<?php echo site_url(); ?>"> 

							<?php  
							$logoimage = get_field('resensation_logo'); 
							if( is_array($logoimage) ){ ?>

								<a  href="<?php echo get_sub_field('resensation_logo_set'); ?>"><img src="<?php echo $logoimage['url']; ?>" alt="<?php echo $logoimage['alt']; ?>"></a>

							<?php }
							?>	
								
							</a>
							<div class="download-btn">
								<a  href="<?php echo get_field('resensation_logo_set'); ?>"><?php echo get_field('logo_download_text'); ?></a>
							</div>
						</div>
					</div>
				</div>
				
				

				

	       		 </div>

	        <!-- End Physician Tab -->

	        <!-- Order Tab -->

			<div id="order" class="inner-order-form tab-box">
				<ul class="order-lists">
					<?php if( have_rows('products_repeater') ): ?>
						<?php while( have_rows('products_repeater') ): the_row(); ?>
					<li>
						<div class="implementation-image">
						<?php  
						$prodimages = get_sub_field('image'); 
						if( is_array($prodimages) ){ ?>

							<img src="<?php echo $prodimages['url']; ?>" alt="<?php echo $prodimages['alt']; ?>">

						<?php }
						?>	
						</div>
						<div class="order-item-name">
							<h5><?php echo get_sub_field('product_name') ; ?></h5>
						</div>
						<div class="order-item-btns">
							<div class="order-btns">
								<a class="decrease" href="javascript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a>
								<span data-codeclass="<?php echo get_sub_field('code_class_do_not_change'); ?>"><?php echo get_sub_field('max_quantity'); ?></span>
								<a class="increase" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a>
							</div>
						</div>
					</li>
						<?php endwhile; ?>
					<?php endif; ?>
					
				</ul>
				<div class="order-main-form">
					<h4><strong>Shipping</strong> <br> Information</h4>
					<?php echo do_shortcode('[contact-form-7 id="1129" title="Physician Order Form and Shipping Information"]'); ?>
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QNEGP78YU.marketingautomation.services/webforms/receivePostback/MzawMDEzNzcyBQA/']);
    __ss_noform.push(['endpoint', 'd5c399db-e9be-4cee-8ccb-4816a0c32c78']);
</script>
<script type="text/javascript" src="https://koi-3QNEGP78YU.marketingautomation.services/client/noform.js?ver=1.24" ></script>					
				</div>
			</div>
			<!-- End Order Tab -->
			<?php } ?>
   		</div>
    </main>
</div>
<script type="text/javascript">
jQuery().ready(function(){

	jQuery('.decrease').click(function(){
		

		$minimum = 0 ; 
		var current = parseInt(jQuery(this).parent().find('span').text());
		if(current > 0){
			var decreased = parseInt(current - 1);
			jQuery(this).parent().find('span').text(decreased);

			var codeclass = jQuery(this).parent().find('span').data('codeclass');
			console.log(codeclass);
			jQuery('.'+codeclass).val(decreased);
		}
		
	});

	jQuery('.increase').click(function(){
		
		$minimum = 0 ; 
		var current = parseInt(jQuery(this).parent().find('span').text());

			var increased = parseInt(current + 1);
			jQuery(this).parent().find('span').text(increased);

			var codeclass = jQuery(this).parent().find('span').data('codeclass');
			console.log(codeclass);
			jQuery('.'+codeclass).val(increased);
		
	});
	
	jQuery('#ordernowbutton').click(function(event){

		event.preventDefault();

		jQuery('.order-lists li').each(function(){

			var codeclass = jQuery(this).find('span').data('codeclass');
			var itemcount = jQuery(this).find('span').text();

			jQuery('.'+codeclass).val(itemcount);
		});

		jQuery('#ordernowbutton').submit();

	});

	jQuery('#orderbuttonclickopennewtab').click(function(){

		jQuery('#orderform').trigger('click');

		document.getElementById('physicians-tabs').scrollIntoView(true);	
	})

});
</script>
<?php
get_footer('resources');