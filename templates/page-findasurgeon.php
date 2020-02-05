<?php
/**
 * Template Name: Surgeon Page
 */

get_header(); ?>

<main>
    <div class="page-content find-surgeon">
        <div class="container">
            <div class="colmn colmn-head">
                <div class="colmn-text">
                    <h1> <?php the_field('surgeon_heading');?></h1>
                </div>
                <?php echo get_template_part('content','socialshare'); ?> 
            </div>
            <div class="colmn">

                <?php 

                $args = array('post_type'=>'clinic','post_status'=>'publish' , 'posts_per_page'=> -1 );  

                $clinic = new WP_Query($args);


                if ( $clinic->have_posts() ) {
                    while ( $clinic->have_posts() ) {
                        $clinic->the_post(); 


                        $clinics[] = array(
                            'title'  => get_the_title(),
                            'lat'    => get_post_meta(get_the_ID(),'clinic_latitude',true),
                            'long'   => get_post_meta(get_the_ID(),'clinic_longitude',true),
                            'postid' => get_the_ID(),
                            'address'=> get_post_meta(get_the_ID(),'clinic_address',true).' '.get_post_meta(get_the_ID(),'suite_number',true).' '.get_post_meta(get_the_ID(),'clinic_address_city_state_zipcode',true)
                        );
                        

                    }
                    wp_reset_postdata();
                }

                ?>

                <div id="map"></div>
                <script>

                // Initialize and add the map
                function initMap() {
                    var styledMapType = new google.maps.StyledMapType(
                        [
                        {
                            "featureType": "administrative",
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#1c2263"
                            }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "all",
                            "stylers": [
                            {
                                "color": "#efe5e5"
                            }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [
                            {
                                "visibility": "off"
                            },
                            {
                                "weight": "1.09"
                            }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            },
                            {
                                "visibility": "on"
                            },
                            {
                                "hue": "#00ddff"
                            }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [
                            {
                                "visibility": "simplified"
                            }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.icon",
                            "stylers": [
                            {
                                "visibility": "off"
                            }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [
                            {
                                "visibility": "off"
                            }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [
                            {
                                "color": "#ceddf0"
                            },
                            {
                                "visibility": "on"
                            }
                            ]
                        }
                        ],
                        {name: 'Styled Map'});

                 var width = screen.width;
                 var zooma = '';
                 if(width < 450 ){
                 	zooma = 3;
                 }
                 else{
                 	zooma = 5;
                 }
                var map = new google.maps.Map(
                    document.getElementById('map'), 
                    {   zoom   : zooma, 
                        center : {lat:39, lng: -95} 
                    });


                map.mapTypes.set('styled_map', styledMapType);
                map.setMapTypeId('styled_map');

                var json = <?php  echo json_encode($clinics);
                ?>

                for (var i = 0, length = json.length; i < length; i++) {
                  var data = json[i],
                  latLng = new google.maps.LatLng(data.lat, data.long); 

                  // Creating a marker and putting it on the map

                  var infoWindow = new google.maps.InfoWindow({
                      content: data.address
                  });

                  var marker = new google.maps.Marker({
                   position : latLng,
                   map      : map,
                   title    : data.title,
                   icon     : '<?php echo get_template_directory_uri(); ?>/images/pin.png',
                   animation : google.maps.Animation.DROP
                });

                  (function(marker, data) {


	                google.maps.event.addListener(marker, "click", function(e) {
	                    infoWindow.setContent(data.address);
	                    infoWindow.open(map, marker);

	                    marker.setIcon('<?php echo get_template_directory_uri(); ?>/images/pin.png');
	                    surgeon = document.getElementsByClassName('surgeon-box');
	                    console.log(surgeon);
	                    for (var i = 0, length = surgeon.length; i < length; i++) {

	                        document.getElementsByClassName('surgeon-box')[i].style.display = 'none';
	                    }
	                    document.getElementById('div_'+data.postid).style.display = "block";
	                });

	                 google.maps.event.addListener( map,'click', function () {
				        marker.setIcon('<?php echo get_template_directory_uri(); ?>/images/pin.png');
				    });

                  })(marker, data);


                }

                 /*google.maps.event.addDomListener(window, 'resize', initMap);
                 google.maps.event.addDomListener(window, 'load', initMap);*/

                }

               
                </script>

          </div>

          <?php 

          $args = array('post_type'=>'clinic','post_status'=>'publish' , 'posts_per_page'=> -1 );  

          $clinic = new WP_Query($args);


          if ( $clinic->have_posts() ) {
            while ( $clinic->have_posts() ) {
                $clinic->the_post(); ?>

                <div id="div_<?php echo get_the_ID(); ?>" style="display: none;" class="surgeon-box">
                    <h3><?php the_title() ?></h3>


                    <?php 
                    $practice_name = get_field('clinic_name');
                    $clinic_address1 = get_field('clinic_address');
                    $clinic_address2 = get_field('suite_number');
                    $clinic_address3 = get_field('clinic_address_city_state_zipcode');
                    if(have_rows('clinic_doctors') ){ 

                        while(have_rows('clinic_doctors')){
                            the_row();
                            ?>
                            <div class="surgeon-detail colmn">
                                <span class="box-image">
                                <?php 
                                	$dp = get_sub_field('doctor_photo') ; 
                                	
                                ?>
                                    <img src="<?php echo $dp['url']; ?>" alt="<?php echo $dp['alt']; ?>" title="<?php echo $dp['title']; ?>">
                                </span>
                                <div class="box-text">                                                 
                                    <h5><?php echo get_sub_field('doctor_name'); ?>, <?php echo get_sub_field('doctor_designation'); ?></h5>
                                    <p></p>
                                    <div class="colmn">
                                        <div class="colmn-box">
                                            <span> <?php echo $practice_name; ?> </span>
                                            <p>
                                                <?php if($clinic_address1!=''){ ?>
                                                    <?php echo $clinic_address1 ; ?> <br/>
                                                <?php } ?>

                                                <?php if($clinic_address2!=''){ ?>
                                                    <?php echo $clinic_address2 ; ?><br/>
                                                <?php } ?>

                                                <?php echo $clinic_address3 ; ?> 
                                            </p>
                                            <!-- Phone and Website -->
                                            <div class="number-boxone">
                                            
                                            <p>
                                            	<img src="<?php echo get_template_directory_uri(); ?>/images/call-icon.png" alt="Call">
                                                <a href="tel:<?php echo get_sub_field('vanity_number'); ?>"><?php echo get_sub_field('vanity_number'); ?>                                            	
                                                </a>
                                             </p>
                                             <p>
                                             	<img src="<?php echo get_template_directory_uri(); ?>/images/share-icon.png" alt="Website">
                                             	<a target="_blank" href="<?php echo get_sub_field('doctor_website_link'); ?>"><?php echo get_sub_field('doctor_website'); ?>
                                             	</a>
                                             </p>

                                         	</div>
                                         	 <!-- Phone and Website -->


                                         	<!-- Hospital Affiliation -->
	                                  		<div class="number-box">
	                                            <span>Hospital Affiliation</span>
	                                            <?php
	                                            if(have_rows('hospital_affiliation') ){ 
						                        	while(have_rows('hospital_affiliation')){
						                            the_row();
						                         ?>

	                                            <p>
	                                               <?php echo get_sub_field('hospital_name'); ?>
	                                            </p>
	                                            <?php  } } ?>
	                                            
	                                  		</div>
	                                  		<!-- Hospital Affiliation  -->


                                  		</div>


                                    <!-- 
                                    <div class="colmn-box number-box">
                                        
                                    </div> 
                                	-->
                                  	</div>
                                        </div>
                                    </div>
                                <?php  } } ?>

                            </div>

                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>

                    <div style="clear: both;"></div>
                    <div class="surgeon-text">
                        <p><?php the_field('surgeon_description');?></p>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7ELSm83XIv-iuf18ErvoQjd6X81FsSOA&callback=initMap">
</script>
<?php get_footer(); ?>