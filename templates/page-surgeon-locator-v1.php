<?php
/**
 * Template Name: Surgeon Locator V1
 */

get_header(); ?>

<div class="search-form">
	<form>
		<div class="colmn">
			<div class="select-box" id="state">
				<?php 
				$surgeonsdata = array(	
						'post_type'      => 'surgeon',
						'posts_per_page' => -1,
						'post_status'    => array('publish'),
						'meta_key'       => 'doctor_practice_address_state',
						'orderby'        => 'meta_value',
						'order'          => 'ASC',

										 );
				$states   = new WP_Query($surgeonsdata);
				if($states->have_posts()){
						while($states->have_posts()){
							$states->the_post();
							$state[get_field('doctor_practice_address_state')] =  get_field('doctor_practice_address_state')  ; 
							
						}
					}
				?>
				<select>
					<?php 
					foreach ($state as $key => $value) { ?>
						<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
					<?php } ?>
				</select>
				<div class="custom-select-box">
					<p>Sort by: <span>State</span><i class="fa fa-chevron-down" aria-hidden="true"></i></p>
					<ul>
					</ul>
				</div>
			</div>
			<div class="select-box" id="institution">

				<?php 
					$institutions      = new WP_Query($surgeonsdata);
					if($institutions->have_posts()){
						while($institutions->have_posts()){
							$institutions->the_post();
							$inst[get_field('doctor_practice_name')] =  get_field('doctor_practice_address_state')  ; 
							
						}
					}
				?>
				<select>
					
					<?php 
					foreach ($inst as $key => $value) { ?>
						<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
					<?php } ?>
					
				</select>
				<div class="custom-select-box">
					<p>Sort by: <span>Institution</span><i class="fa fa-chevron-down" aria-hidden="true"></i></p>
					<ul>
					</ul>
				</div>
			</div>
			<div class="select-box" id="doctorsName">
				<select>
					<option value="doctor_firstname">Doctors First Name</option>
					<option value="doctor_lastname">Doctors Last Name</option>
				</select>
				<div class="custom-select-box">
					<p>Sort by: <span>Sort By Name</span><i class="fa fa-chevron-down" aria-hidden="true"></i></p>
					<ul>
					</ul>
				</div>
			</div>
			<div class="mobile-heading">
				<h2>Find <span>A Surgeon</span></h2>
			</div>
			<div class="search-bar mobile">
				<i class="fa fa-search" aria-hidden="true"></i>
				<input type="text" name="searchtext" class="searchtext" id="statesinmobile" placeholder="Search Availability by State">
				<button type="button" class="statesinmobile">Search</button>
			</div>
			<div class="search-bar">
				<i class="fa fa-search" aria-hidden="true"></i>
				<input type="text" name="searchtext" class="searchtext">
				<button type="button" class="search-btn">Search</button>
			</div>
		</div>
	</form>
</div>
<div class="find-section">
	<div class="colmn">
		<div class="find-sidebar">
			<h2>Find <span>A Surgeon</span></h2>

			<div class="surgeon-listing">				
			</div>
		</div>
		<div class="find-map">
			<div id="map"></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
<!-- AIzaSyDNw-m_FVKaPbYtMxOtvYatAi6DAtbf7kA - Dev Key -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7ELSm83XIv-iuf18ErvoQjd6X81FsSOA"></script>
<script type="text/javascript">

	jQuery().ready(function(){


		 
			 /*State Autocomplete*/
			jQuery( function() {

				<?php 
				$surgeonsdata = array(	
											'post_type'      => 'surgeon',
											'posts_per_page' => -1,
											'post_status'    => array('publish'),

										 );
				$states   = new WP_Query($surgeonsdata);
				if($states->have_posts()){
						while($states->have_posts()){
							$states->the_post();
							$state[get_field('doctor_practice_address_state')] =  get_field('doctor_practice_address_state')  ; 
							
						}
					}
				?>

				var availableTags = ["<?php echo  implode('","', $state) ?>"];
				jQuery( "#statesinmobile" ).autocomplete({
			    	 source: availableTags


			   
				});
			});

			 /*End State Autocomplete*/


			var data = {
                    action   : 'get_physician',
                }
            jQuery.ajax({
                url : resensation.ajaxurl,
                type: 'post',
                data: data,
                success: function (response) {  
                	jQuery('.surgeon-listing').empty().append(response);
                }
            });


            /*maps*/
            "use strict";
  			simpleGoogleMapsApiExample.map(jQuery("#map")[0], 39, -95);
            /*Maps*/


            /*Search Click*/
            jQuery('.search-btn').click(function(){	
	            var data = {
	                    action    : 'get_physician',
	                    searchtext: jQuery('.searchtext').val()
	                }
	            jQuery.ajax({
	                url : resensation.ajaxurl,
	                type: 'post',
	                data: data,
	                success: function (response) {  
	                	jQuery('.surgeon-listing').empty().append(response);
	                }
	            });


	            "use strict";
	  			simpleGoogleMapsApiExample.map(jQuery("#map")[0], 39, -95);
            });
            /*Search Click*/


            /*Search Click Mobile*/
            jQuery('.statesinmobile').click(function(){	
	            var data = {
	                    action    : 'get_physician_mobile',
	                    state    : jQuery('#statesinmobile').val()
	                }
	            jQuery.ajax({
	                url : resensation.ajaxurl,
	                type: 'post',
	                data: data,
	                success: function (response) {  
	                	jQuery('.surgeon-listing').empty().append(response);
	                }
	            });
            });
            /*Search Click Mobile*/




            /*State Click*/
            jQuery('#state .custom-select-box ul li').click(function(){

            	jQuery('#institution .custom-select-box p span').text('Institution');
            	jQuery('#doctorsName .custom-select-box p span').text('Sort By Name');

            	var data = {
                    action   : 'get_physician',
                    state    : jQuery(this).data('value')
                }
	            jQuery.ajax({
	                url : resensation.ajaxurl,
	                type: 'post',
	                data: data,
	                success: function (response) {  
	                	jQuery('.surgeon-listing').empty().append(response);
	                }
	            });

            	console.log(jQuery(this).data('value'));
            	 "use strict";
  				 simpleGoogleMapsApiExample.map(jQuery("#map")[0], 39, -95,jQuery(this).data('value'));
            });
			/*State Click*/

			/*State Click*/
            jQuery('#institution .custom-select-box ul li').click(function(){

            	jQuery('#state .custom-select-box p span').text('State');
            	jQuery('#doctorsName .custom-select-box p span').text('Sort By Name');

            	var data = {
                    action         : 'get_physician',
                    institution    : jQuery(this).text(),
                }
	            jQuery.ajax({
	                url : resensation.ajaxurl,
	                type: 'post',
	                data: data,
	                success: function (response) {  
	                	jQuery('.surgeon-listing').empty().append(response);
	                }
	            });

            	console.log(jQuery(this).data('value'));
            	 "use strict";
  				 simpleGoogleMapsApiExample.map(jQuery("#map")[0], 39, -95,jQuery(this).data('value'));
            });
			/*State Click*/


			/*Doctor By Name Click*/
            jQuery('#doctorsName .custom-select-box ul li').click(function(){

            	jQuery('#state .custom-select-box p span').text('State');
            	jQuery('#institution .custom-select-box p span').text('Institution');

            	var data = {
                    action         : 'get_physician',
                    byname         : jQuery(this).data('value'),
                }
	            jQuery.ajax({
	                url : resensation.ajaxurl,
	                type: 'post',
	                data: data,
	                success: function (response) {  
	                	jQuery('.surgeon-listing').empty().append(response);
	                }
	            });

            	console.log(jQuery(this).data('value'));
            	 "use strict";
  				 simpleGoogleMapsApiExample.map(jQuery("#map")[0], 39, -95);
            });
			/*Doctor By Name Click*/


	});


	jQuery(".surgeon-listing").mCustomScrollbar({
      axis:"y",
      theme:"light-3",
      advanced:{autoExpandHorizontalScroll:true}
    });



	/*Map FUnction*/
	var infoWindow;
	var simpleGoogleMapsApiExample = simpleGoogleMapsApiExample || {};
	simpleGoogleMapsApiExample.map = function (mapDiv, latitude, longitude,queriedstate) {
		  "use strict";

		  var initialize = function (mapDiv, latitude, longitude, queriedstate) {		  

		    var mapOptions = {
		      center    : new google.maps.LatLng(latitude, longitude),
		      mapTypeId : google.maps.MapTypeId.ROADMAP,
		      zoom      : 5
		    };

		 
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


		    var  map = new google.maps.Map(mapDiv, mapOptions);
		    map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');


		    var states = {
	
		   
		    'CA': [
		    		{lat:41.9983, lng:-124.4009},
					{lat:42.0024, lng:-123.6237},
					{lat:42.0126, lng:-123.1526},
					{lat:42.0075, lng:-122.0073},
					{lat:41.9962, lng:-121.2369},
					{lat:41.9983, lng:-119.9982},
					{lat:39.0021, lng:-120.0037},
					{lat:37.5555, lng:-117.9575},
					{lat:36.3594, lng:-116.3699},
					{lat:35.0075, lng:-114.6368},
					{lat:34.9659, lng:-114.6382},
					{lat:34.9107, lng:-114.6286},
					{lat:34.8758, lng:-114.6382},
					{lat:34.8454, lng:-114.5970},
					{lat:34.7890, lng:-114.5682},
					{lat:34.7269, lng:-114.4968},
					{lat:34.6648, lng:-114.4501},
					{lat:34.6581, lng:-114.4597},
					{lat:34.5869, lng:-114.4322},
					{lat:34.5235, lng:-114.3787},
					{lat:34.4601, lng:-114.3869},
					{lat:34.4500, lng:-114.3361},
					{lat:34.4375, lng:-114.3031},
					{lat:34.4024, lng:-114.2674},
					{lat:34.3559, lng:-114.1864},
					{lat:34.3049, lng:-114.1383},
					{lat:34.2561, lng:-114.1315},
					{lat:34.2595, lng:-114.1651},
					{lat:34.2044, lng:-114.2249},
					{lat:34.1914, lng:-114.2221},
					{lat:34.1720, lng:-114.2908},
					{lat:34.1368, lng:-114.3237},
					{lat:34.1186, lng:-114.3622},
					{lat:34.1118, lng:-114.4089},
					{lat:34.0856, lng:-114.4363},
					{lat:34.0276, lng:-114.4336},
					{lat:34.0117, lng:-114.4652},
					{lat:33.9582, lng:-114.5119},
					{lat:33.9308, lng:-114.5366},
					{lat:33.9058, lng:-114.5091},
					{lat:33.8613, lng:-114.5256},
					{lat:33.8248, lng:-114.5215},
					{lat:33.7597, lng:-114.5050},
					{lat:33.7083, lng:-114.4940},
					{lat:33.6832, lng:-114.5284},
					{lat:33.6363, lng:-114.5242},
					{lat:33.5895, lng:-114.5393},
					{lat:33.5528, lng:-114.5242},
					{lat:33.5311, lng:-114.5586},
					{lat:33.5070, lng:-114.5778},
					{lat:33.4418, lng:-114.6245},
					{lat:33.4142, lng:-114.6506},
					{lat:33.4039, lng:-114.7055},
					{lat:33.3546, lng:-114.6973},
					{lat:33.3041, lng:-114.7302},
					{lat:33.2858, lng:-114.7206},
					{lat:33.2754, lng:-114.6808},
					{lat:33.2582, lng:-114.6698},
					{lat:33.2467, lng:-114.6904},
					{lat:33.1720, lng:-114.6794},
					{lat:33.0904, lng:-114.7083},
					{lat:33.0858, lng:-114.6918},
					{lat:33.0328, lng:-114.6629},
					{lat:33.0501, lng:-114.6451},
					{lat:33.0305, lng:-114.6286},
					{lat:33.0282, lng:-114.5888},
					{lat:33.0351, lng:-114.5750},
					{lat:33.0328, lng:-114.5174},
					{lat:32.9718, lng:-114.4913},
					{lat:32.9764, lng:-114.4775},
					{lat:32.9372, lng:-114.4844},
					{lat:32.8427, lng:-114.4679},
					{lat:32.8161, lng:-114.5091},
					{lat:32.7850, lng:-114.5311},
					{lat:32.7573, lng:-114.5284},
					{lat:32.7503, lng:-114.5641},
					{lat:32.7353, lng:-114.6162},
					{lat:32.7480, lng:-114.6986},
					{lat:32.7191, lng:-114.7220},
					{lat:32.6868, lng:-115.1944},
					{lat:32.5121, lng:-117.3395},
					{lat:32.7838, lng:-117.4823},
					{lat:33.0501, lng:-117.5977},
					{lat:33.2341, lng:-117.6814},
					{lat:33.4578, lng:-118.0591},
					{lat:33.5403, lng:-118.6290},
					{lat:33.7928, lng:-118.7073},
					{lat:33.9582, lng:-119.3706},
					{lat:34.1925, lng:-120.0050},
					{lat:34.2561, lng:-120.7164},
					{lat:34.5360, lng:-120.9128},
					{lat:34.9749, lng:-120.8427},
					{lat:35.2131, lng:-121.1325},
					{lat:35.5255, lng:-121.3220},
					{lat:35.9691, lng:-121.8013},
					{lat:36.2808, lng:-122.1446},
					{lat:36.7268, lng:-122.1721},
					{lat:37.2227, lng:-122.6871},
					{lat:37.7783, lng:-122.8903},
					{lat:37.8965, lng:-123.2378},
					{lat:38.3449, lng:-123.3202},
					{lat:38.7423, lng:-123.8338},
					{lat:38.9946, lng:-123.9793},
					{lat:39.3088, lng:-124.0329},
					{lat:39.7642, lng:-124.0823},
					{lat:40.1663, lng:-124.5314},
					{lat:40.4658, lng:-124.6509},
					{lat:41.0110, lng:-124.3144},
					{lat:41.2386, lng:-124.3419},
					{lat:41.7170, lng:-124.4545},
					{lat:41.9983, lng:-124.4009}
		    	  ],
		    'CO': [
					{lat:37.0004, lng:-109.0448},
					{lat:36.9949, lng:-102.0424},
					{lat:41.0006, lng:-102.0534},
					{lat:40.9996, lng:-109.0489},
					{lat:37.0004, lng:-109.0448}
		    	  ],

		    'FL':[
		    		{lat:30.9988, lng:-87.6050},
					{lat:30.9964, lng:-86.5613},
					{lat:31.0035, lng:-85.5313},
					{lat:31.0012, lng:-85.1193},
					{lat:31.0023, lng:-85.0012},
					{lat:30.9364, lng:-84.9847},
					{lat:30.8845, lng:-84.9367},
					{lat:30.8409, lng:-84.9271},
					{lat:30.7902, lng:-84.9257},
					{lat:30.7489, lng:-84.9147},
					{lat:30.6993, lng:-84.8611},
					{lat:30.6911, lng:-84.4272},
					{lat:30.6509, lng:-83.5991},
					{lat:30.5895, lng:-82.5595},
					{lat:30.5682, lng:-82.2134},
					{lat:30.5315, lng:-82.2134},
					{lat:30.3883, lng:-82.1997},
					{lat:30.3598, lng:-82.1544},
					{lat:30.3598, lng:-82.0638},
					{lat:30.4877, lng:-82.0226},
					{lat:30.6308, lng:-82.0473},
					{lat:30.6757, lng:-82.0514},
					{lat:30.7111, lng:-82.0377},
					{lat:30.7371, lng:-82.0514},
					{lat:30.7678, lng:-82.0102},
					{lat:30.7914, lng:-82.0322},
					{lat:30.7997, lng:-81.9717},
					{lat:30.8244, lng:-81.9608},
					{lat:30.8056, lng:-81.8893},
					{lat:30.7914, lng:-81.8372},
					{lat:30.7796, lng:-81.7960},
					{lat:30.7536, lng:-81.6696},
					{lat:30.7289, lng:-81.6051},
					{lat:30.7324, lng:-81.5666},
					{lat:30.7229, lng:-81.5295},
					{lat:30.7253, lng:-81.4856},
					{lat:30.7111, lng:-81.4609},
					{lat:30.7088, lng:-81.4169},
					{lat:30.7064, lng:-81.2274},
					{lat:30.4345, lng:-81.2357},
					{lat:30.3160, lng:-81.1725},
					{lat:29.7763, lng:-81.0379},
					{lat:28.8603, lng:-80.5861},
					{lat:28.4771, lng:-80.3650},
					{lat:28.1882, lng:-80.3815},
					{lat:27.1789, lng:-79.9255},
					{lat:26.8425, lng:-79.8198},
					{lat:26.1394, lng:-79.9118},
					{lat:25.5115, lng:-79.9997},
					{lat:24.8802, lng:-80.3815},
					{lat:24.5384, lng:-80.8704},
					{lat:24.3959, lng:-81.9250},
					{lat:24.4496, lng:-82.2066},
					{lat:24.5484, lng:-82.3137},
					{lat:24.6982, lng:-82.1997},
					{lat:25.2112, lng:-81.3977},
					{lat:25.6019, lng:-81.4622},
					{lat:25.9235, lng:-81.9456},
					{lat:26.3439, lng:-82.2876},
					{lat:26.9098, lng:-82.5307},
					{lat:27.3315, lng:-82.8342},
					{lat:27.7565, lng:-83.0182},
					{lat:28.0574, lng:-83.0017},
					{lat:28.6098, lng:-82.8548},
					{lat:28.9697, lng:-83.0264},
					{lat:29.0478, lng:-83.2050},
					{lat:29.4157, lng:-83.5318},
					{lat:29.9133, lng:-83.9767},
					{lat:29.8930, lng:-84.1072},
					{lat:29.6940, lng:-84.4409},
					{lat:29.4551, lng:-85.0465},
					{lat:29.4946, lng:-85.3610},
					{lat:29.7262, lng:-85.5807},
					{lat:30.1594, lng:-86.1946},
					{lat:30.2175, lng:-86.8510},
					{lat:30.1499, lng:-87.5171},
					{lat:30.3006, lng:-87.4429},
					{lat:30.4256, lng:-87.3750},
					{lat:30.4830, lng:-87.3743},
					{lat:30.5658, lng:-87.3907},
					{lat:30.6344, lng:-87.4004},
					{lat:30.6763, lng:-87.4141},
					{lat:30.7702, lng:-87.5253},
					{lat:30.8527, lng:-87.6256},
					{lat:30.9470, lng:-87.5912},
					{lat:30.9682, lng:-87.5912},
					{lat:30.9964, lng:-87.6050}
		    	 ],
		    'GA':[
		    		{lat:34.9974, lng:-85.6082},
					{lat:34.9906, lng:-84.7266},
					{lat:34.9895, lng:-84.1580},
					{lat:34.9996, lng:-83.1088},
					{lat:34.9287, lng:-83.1418},
					{lat:34.8318, lng:-83.3025},
					{lat:34.7281, lng:-83.3560},
					{lat:34.6569, lng:-83.3080},
					{lat:34.5744, lng:-83.1528},
					{lat:34.4839, lng:-83.0072},
					{lat:34.4681, lng:-82.8918},
					{lat:34.4443, lng:-82.8589},
					{lat:34.2674, lng:-82.7490},
					{lat:34.1254, lng:-82.6831},
					{lat:34.0140, lng:-82.5952},
					{lat:33.8647, lng:-82.3988},
					{lat:33.7563, lng:-82.2505},
					{lat:33.6695, lng:-82.2217},
					{lat:33.5963, lng:-82.1558},
					{lat:33.5036, lng:-82.0432},
					{lat:33.3707, lng:-81.9484},
					{lat:33.2077, lng:-81.8303},
					{lat:33.1674, lng:-81.7795},
					{lat:33.1456, lng:-81.7424},
					{lat:33.0881, lng:-81.6078},
					{lat:33.0075, lng:-81.5034},
					{lat:32.9418, lng:-81.5089},
					{lat:32.6914, lng:-81.4142},
					{lat:32.5815, lng:-81.4087},
					{lat:32.5283, lng:-81.2769},
					{lat:32.4576, lng:-81.1945},
					{lat:32.3185, lng:-81.1642},
					{lat:32.2151, lng:-81.1436},
					{lat:32.1128, lng:-81.1134},
					{lat:32.0477, lng:-80.9225},
					{lat:32.0500, lng:-80.6960},
					{lat:31.8881, lng:-80.7289},
					{lat:31.4697, lng:-80.9665},
					{lat:30.9988, lng:-81.1011},
					{lat:30.7041, lng:-81.2288},
					{lat:30.7241, lng:-81.6023},
					{lat:30.7713, lng:-81.7657},
					{lat:30.8221, lng:-81.9498},
					{lat:30.7560, lng:-82.0239},
					{lat:30.6379, lng:-82.0459},
					{lat:30.4866, lng:-82.0239},
					{lat:30.4309, lng:-82.0363},
					{lat:30.3575, lng:-82.0610},
					{lat:30.3598, lng:-82.1585},
					{lat:30.3859, lng:-82.2025},
					{lat:30.4842, lng:-82.2148},
					{lat:30.5682, lng:-82.2162},
					{lat:30.6131, lng:-82.9688},
					{lat:30.7041, lng:-84.8639},
					{lat:30.7831, lng:-84.9257},
					{lat:30.9117, lng:-84.9586},
					{lat:30.9741, lng:-84.9985},
					{lat:31.1282, lng:-85.0630},
					{lat:31.2116, lng:-85.1070},
					{lat:31.5247, lng:-85.0493},
					{lat:31.8006, lng:-85.1358},
					{lat:31.9592, lng:-85.0919},
					{lat:32.1570, lng:-85.0342},
					{lat:32.2500, lng:-84.9023},
					{lat:32.3974, lng:-84.9628},
					{lat:32.5468, lng:-85.0342},
					{lat:32.6949, lng:-85.1001},
					{lat:32.8138, lng:-85.1660},
					{lat:32.9833, lng:-85.2072},
					{lat:33.6512, lng:-85.3418},
					{lat:34.5620, lng:-85.5231},
					{lat:34.9929, lng:-85.6068}
		    	],
		    'KS':[
		    		{lat:40.0034, lng:-102.0506},
					{lat:40.0034, lng:-102.0506},
					{lat:36.9927, lng:-102.0438},
					{lat:36.9982, lng:-94.6211},
					{lat:38.8803, lng:-94.6046},
					{lat:39.0789, lng:-94.6143},
					{lat:39.1971, lng:-94.6184},
					{lat:39.1673, lng:-94.7255},
					{lat:39.2759, lng:-94.8793},
					{lat:39.5612, lng:-95.0990},
					{lat:39.7283, lng:-94.8807},
					{lat:39.8286, lng:-94.8930},
					{lat:39.8823, lng:-94.9342},
					{lat:39.8971, lng:-95.0098},
					{lat:39.8760, lng:-95.0922},
					{lat:39.9445, lng:-95.2213},
					{lat:40.0087, lng:-95.3036},
					{lat:40.0024, lng:-102.0506}
		    	 ],
		    'LA':[
		    		{lat:33.0225, lng:-94.0430},
					{lat:33.0179, lng:-93.0048},
					{lat:33.0087, lng:-91.1646},
					{lat:32.9269, lng:-91.2209},
					{lat:32.8773, lng:-91.1220},
					{lat:32.8358, lng:-91.1481},
					{lat:32.7642, lng:-91.1412},
					{lat:32.6382, lng:-91.1536},
					{lat:32.5804, lng:-91.1069},
					{lat:32.6093, lng:-91.0080},
					{lat:32.4588, lng:-91.0904},
					{lat:32.4379, lng:-91.0355},
					{lat:32.3742, lng:-91.0286},
					{lat:32.3150, lng:-90.9064},
					{lat:32.2616, lng:-90.9723},
					{lat:32.1942, lng:-91.0464},
					{lat:32.1198, lng:-91.0739},
					{lat:32.0593, lng:-91.0464},
					{lat:31.9918, lng:-91.1014},
					{lat:31.9498, lng:-91.1865},
					{lat:31.8262, lng:-91.3101},
					{lat:31.7947, lng:-91.3527},
					{lat:31.6230, lng:-91.3925},
					{lat:31.6218, lng:-91.5134},
					{lat:31.5668, lng:-91.4310},
					{lat:31.5130, lng:-91.5161},
					{lat:31.3701, lng:-91.5244},
					{lat:31.2598, lng:-91.5477},
					{lat:31.2692, lng:-91.6425},
					{lat:31.2328, lng:-91.6603},
					{lat:31.1917, lng:-91.5848},
					{lat:31.1047, lng:-91.6287},
					{lat:31.0318, lng:-91.5614},
					{lat:30.9988, lng:-91.6397},
					{lat:31.0012, lng:-89.7336},
					{lat:30.6686, lng:-89.8517},
					{lat:30.5386, lng:-89.7858},
					{lat:30.3148, lng:-89.6347},
					{lat:30.1807, lng:-89.5688},
					{lat:30.1582, lng:-89.4960},
					{lat:30.2140, lng:-89.1843},
					{lat:30.1463, lng:-89.0373},
					{lat:30.0905, lng:-88.8354},
					{lat:29.8383, lng:-88.7421},
					{lat:29.5758, lng:-88.8712},
					{lat:29.1833, lng:-88.9371},
					{lat:28.9649, lng:-89.0359},
					{lat:28.8832, lng:-89.2282},
					{lat:28.9048, lng:-89.4754},
					{lat:29.1210, lng:-89.7418},
					{lat:28.9529, lng:-90.1126},
					{lat:28.9120, lng:-90.6619},
					{lat:28.9553, lng:-91.0355},
					{lat:29.1210, lng:-91.3211},
					{lat:29.2864, lng:-91.9061},
					{lat:29.4360, lng:-92.7452},
					{lat:29.6009, lng:-93.8177},
					{lat:29.6749, lng:-93.8631},
					{lat:29.7370, lng:-93.8933},
					{lat:29.7930, lng:-93.9304},
					{lat:29.8216, lng:-93.9276},
					{lat:29.8883, lng:-93.8370},
					{lat:29.9811, lng:-93.7985},
					{lat:30.0144, lng:-93.7601},
					{lat:30.0691, lng:-93.7106},
					{lat:30.0929, lng:-93.7354},
					{lat:30.1166, lng:-93.6996},
					{lat:30.1997, lng:-93.7271},
					{lat:30.2899, lng:-93.7106},
					{lat:30.3350, lng:-93.7656},
					{lat:30.3871, lng:-93.7601},
					{lat:30.4416, lng:-93.6914},
					{lat:30.5102, lng:-93.7106},
					{lat:30.5433, lng:-93.7463},
					{lat:30.5954, lng:-93.7106},
					{lat:30.5906, lng:-93.6914},
					{lat:30.6545, lng:-93.6859},
					{lat:30.6781, lng:-93.6365},
					{lat:30.7513, lng:-93.6200},
					{lat:30.7890, lng:-93.5925},
					{lat:30.8150, lng:-93.5513},
					{lat:30.8645, lng:-93.5623},
					{lat:30.8881, lng:-93.5788},
					{lat:30.9187, lng:-93.5541},
					{lat:30.9423, lng:-93.5294},
					{lat:31.0082, lng:-93.5760},
					{lat:31.0318, lng:-93.5101},
					{lat:31.0906, lng:-93.5596},
					{lat:31.1211, lng:-93.5321},
					{lat:31.1799, lng:-93.5349},
					{lat:31.1658, lng:-93.5953},
					{lat:31.2292, lng:-93.6282},
					{lat:31.2668, lng:-93.6118},
					{lat:31.3044, lng:-93.6859},
					{lat:31.3888, lng:-93.6694},
					{lat:31.4240, lng:-93.7051},
					{lat:31.4427, lng:-93.6859},
					{lat:31.4755, lng:-93.7573},
					{lat:31.5083, lng:-93.7189},
					{lat:31.5411, lng:-93.8040},
					{lat:31.6113, lng:-93.8425},
					{lat:31.6581, lng:-93.8205},
					{lat:31.7071, lng:-93.7985},
					{lat:31.8029, lng:-93.8480},
					{lat:31.8892, lng:-93.9029},
					{lat:31.9149, lng:-93.9606},
					{lat:32.0081, lng:-94.0430},
					{lat:32.7041, lng:-94.0430},
					{lat:33.0225, lng:-94.0430}
		    	 ],

		    'MI':[
		    		{lat:48.0101, lng:-87.6050},
					{lat:46.8902, lng:-84.8584},
					{lat:46.6362, lng:-84.7650},
					{lat:46.4606, lng:-84.5563},
					{lat:46.4525, lng:-84.4780},
					{lat:46.4894, lng:-84.4450},
					{lat:46.5008, lng:-84.4203},
					{lat:46.4989, lng:-84.3956},
					{lat:46.5093, lng:-84.3750},
					{lat:46.5069, lng:-84.3386},
					{lat:46.4927, lng:-84.2905},
					{lat:46.4951, lng:-84.2651},
					{lat:46.5343, lng:-84.2253},
					{lat:46.5404, lng:-84.1951},
					{lat:46.5272, lng:-84.1779},
					{lat:46.5348, lng:-84.1347},
					{lat:46.5041, lng:-84.1113},
					{lat:46.4189, lng:-84.1457},
					{lat:46.3720, lng:-84.1395},
					{lat:46.3218, lng:-84.1058},
					{lat:46.3147, lng:-84.1203},
					{lat:46.2672, lng:-84.1148},
					{lat:46.2563, lng:-84.0969},
					{lat:46.2411, lng:-84.1093},
					{lat:46.2098, lng:-84.0859},
					{lat:46.1879, lng:-84.0777},
					{lat:46.1508, lng:-84.0097},
					{lat:46.1180, lng:-84.0070},
					{lat:46.1018, lng:-83.9761},
					{lat:46.0570, lng:-83.9555},
					{lat:46.0604, lng:-83.9040},
					{lat:46.1185, lng:-83.8264},
					{lat:46.1028, lng:-83.7598},
					{lat:46.1218, lng:-83.6547},
					{lat:46.1056, lng:-83.5723},
					{lat:45.9993, lng:-83.4343},
					{lat:45.8211, lng:-83.5977},
					{lat:45.3396, lng:-82.5197},
					{lat:43.5918, lng:-82.1221},
					{lat:43.0112, lng:-82.4119},
					{lat:42.9956, lng:-82.4249},
					{lat:42.9579, lng:-82.4236},
					{lat:42.9021, lng:-82.4648},
					{lat:42.8543, lng:-82.4689},
					{lat:42.8100, lng:-82.4826},
					{lat:42.7863, lng:-82.4723},
					{lat:42.7339, lng:-82.4847},
					{lat:42.6855, lng:-82.5032},
					{lat:42.6380, lng:-82.5108},
					{lat:42.6036, lng:-82.5307},
					{lat:42.5672, lng:-82.5774},
					{lat:42.5490, lng:-82.5993},
					{lat:42.5521, lng:-82.6501},
					{lat:42.5354, lng:-82.6680},
					{lat:42.4746, lng:-82.7257},
					{lat:42.4726, lng:-82.7250},
					{lat:42.3738, lng:-82.8280},
					{lat:42.3469, lng:-82.9440},
					{lat:42.3382, lng:-82.9550},
					{lat:42.3098, lng:-83.0779},
					{lat:42.2392, lng:-83.1294},
					{lat:42.1741, lng:-83.1342},
					{lat:42.1267, lng:-83.1212},
					{lat:42.0411, lng:-83.1493},
					{lat:41.9600, lng:-83.1116},
					{lat:41.7344, lng:-83.4164},
					{lat:41.7211, lng:-83.8724},
					{lat:41.7057, lng:-84.3736},
					{lat:41.6965, lng:-84.8062},
					{lat:41.7611, lng:-84.8076},
					{lat:41.7621, lng:-87.2067},
					{lat:42.4934, lng:-87.0241},
					{lat:43.3771, lng:-87.1477},
					{lat:43.7056, lng:-87.1216},
					{lat:43.9958, lng:-87.0474},
					{lat:44.1674, lng:-86.9939},
					{lat:44.4720, lng:-86.8662},
					{lat:44.8841, lng:-86.6849},
					{lat:45.0813, lng:-86.5009},
					{lat:45.2353, lng:-86.2495},
					{lat:45.4438, lng:-86.7563},
					{lat:45.4438, lng:-87.0996},
					{lat:45.3772, lng:-87.1518},
					{lat:45.3502, lng:-87.1710},
					{lat:45.2401, lng:-87.3166},
					{lat:45.2024, lng:-87.4059},
					{lat:45.0774, lng:-87.4416},
					{lat:45.0910, lng:-87.5912},
					{lat:45.1036, lng:-87.6407},
					{lat:45.2207, lng:-87.6970},
					{lat:45.3367, lng:-87.6476},
					{lat:45.3878, lng:-87.6984},
					{lat:45.3425, lng:-87.8494},
					{lat:45.5025, lng:-87.7959},
					{lat:45.6726, lng:-87.7890},
					{lat:45.7570, lng:-87.9318},
					{lat:45.7953, lng:-87.9922},
					{lat:45.8058, lng:-88.1186},
					{lat:45.8585, lng:-88.0870},
					{lat:45.9531, lng:-88.1955},
					{lat:45.9722, lng:-88.3438},
					{lat:45.9836, lng:-88.3891},
					{lat:46.0113, lng:-88.5457},
					{lat:45.9970, lng:-88.7022},
					{lat:46.0227, lng:-88.8135},
					{lat:46.0418, lng:-88.8547},
					{lat:46.1408, lng:-89.0936},
					{lat:46.3384, lng:-90.1222},
					{lat:46.5692, lng:-90.4175},
					{lat:46.9034, lng:-90.2019},
					{lat:47.2913, lng:-89.9547},
					{lat:48.0129, lng:-89.4946},
					{lat:47.9743, lng:-89.3381},
					{lat:48.2448, lng:-88.6761},
					{lat:48.3042, lng:-88.3726}
		    	  ],
		    'NY':[
		    		{lat:42.5142, lng:-79.7624},
					{lat:42.7783, lng:-79.0672},
					{lat:42.8508, lng:-78.9313},
					{lat:42.9061, lng:-78.9024},
					{lat:42.9554, lng:-78.9313},
					{lat:42.9584, lng:-78.9656},
					{lat:42.9886, lng:-79.0219},
					{lat:43.0568, lng:-79.0027},
					{lat:43.0769, lng:-79.0727},
					{lat:43.1220, lng:-79.0713},
					{lat:43.1441, lng:-79.0302},
					{lat:43.1801, lng:-79.0576},
					{lat:43.2482, lng:-79.0604},
					{lat:43.2812, lng:-79.0837},
					{lat:43.4509, lng:-79.2004},
					{lat:43.6311, lng:-78.6909},
					{lat:43.6321, lng:-76.7958},
					{lat:43.9987, lng:-76.4978},
					{lat:44.0965, lng:-76.4388},
					{lat:44.1349, lng:-76.3536},
					{lat:44.1989, lng:-76.3124},
					{lat:44.2049, lng:-76.2437},
					{lat:44.2413, lng:-76.1655},
					{lat:44.2973, lng:-76.1353},
					{lat:44.3327, lng:-76.0474},
					{lat:44.3553, lng:-75.9856},
					{lat:44.3749, lng:-75.9196},
					{lat:44.3994, lng:-75.8730},
					{lat:44.4308, lng:-75.8221},
					{lat:44.4740, lng:-75.8098},
					{lat:44.5425, lng:-75.7288},
					{lat:44.6647, lng:-75.5585},
					{lat:44.7672, lng:-75.4088},
					{lat:44.8101, lng:-75.3442},
					{lat:44.8383, lng:-75.3058},
					{lat:44.8676, lng:-75.2399},
					{lat:44.9211, lng:-75.1204},
					{lat:44.9609, lng:-74.9995},
					{lat:44.9803, lng:-74.9899},
					{lat:44.9852, lng:-74.9103},
					{lat:45.0017, lng:-74.8856},
					{lat:45.0153, lng:-74.8306},
					{lat:45.0046, lng:-74.7633},
					{lat:45.0027, lng:-74.7070},
					{lat:45.0007, lng:-74.5642},
					{lat:44.9920, lng:-74.1467},
					{lat:45.0037, lng:-73.7306},
					{lat:45.0085, lng:-73.4203},
					{lat:45.0109, lng:-73.3430},
					{lat:44.9874, lng:-73.3547},
					{lat:44.9648, lng:-73.3379},
					{lat:44.9160, lng:-73.3396},
					{lat:44.8354, lng:-73.3739},
					{lat:44.8013, lng:-73.3324},
					{lat:44.7419, lng:-73.3667},
					{lat:44.6139, lng:-73.3873},
					{lat:44.5787, lng:-73.3736},
					{lat:44.4916, lng:-73.3049},
					{lat:44.4289, lng:-73.2953},
					{lat:44.3513, lng:-73.3365},
					{lat:44.2757, lng:-73.3118},
					{lat:44.1980, lng:-73.3818},
					{lat:44.1142, lng:-73.4079},
					{lat:44.0511, lng:-73.4367},
					{lat:44.0165, lng:-73.4065},
					{lat:43.9375, lng:-73.4079},
					{lat:43.8771, lng:-73.3749},
					{lat:43.8167, lng:-73.3914},
					{lat:43.7790, lng:-73.3557},
					{lat:43.6460, lng:-73.4244},
					{lat:43.5893, lng:-73.4340},
					{lat:43.5655, lng:-73.3969},
					{lat:43.6112, lng:-73.3818},
					{lat:43.6271, lng:-73.3049},
					{lat:43.5764, lng:-73.3063},
					{lat:43.5675, lng:-73.2582},
					{lat:43.5227, lng:-73.2445},
					{lat:43.2582, lng:-73.2582},
					{lat:42.9715, lng:-73.2733},
					{lat:42.8004, lng:-73.2898},
					{lat:42.7460, lng:-73.2664},
					{lat:42.4630, lng:-73.3708},
					{lat:42.0840, lng:-73.5095},
					{lat:42.0218, lng:-73.4903},
					{lat:41.8808, lng:-73.4999},
					{lat:41.2953, lng:-73.5535},
					{lat:41.2128, lng:-73.4834},
					{lat:41.1011, lng:-73.7275},
					{lat:41.0237, lng:-73.6644},
					{lat:40.9851, lng:-73.6578},
					{lat:40.9509, lng:-73.6132},
					{lat:41.1869, lng:-72.4823},
					{lat:41.2551, lng:-72.0950},
					{lat:41.3005, lng:-71.9714},
					{lat:41.3108, lng:-71.9193},
					{lat:41.1838, lng:-71.7915},
					{lat:41.1249, lng:-71.7929},
					{lat:41.0462, lng:-71.7517},
					{lat:40.6306, lng:-72.9465},
					{lat:40.5368, lng:-73.4628},
					{lat:40.4887, lng:-73.8885},
					{lat:40.5232, lng:-73.9490},
					{lat:40.4772, lng:-74.2271},
					{lat:40.4861, lng:-74.2532},
					{lat:40.6468, lng:-74.1866},
					{lat:40.6556, lng:-74.0547},
					{lat:40.7618, lng:-74.0156},
					{lat:40.8699, lng:-73.9421},
					{lat:40.9980, lng:-73.8934},
					{lat:41.0343, lng:-73.9854},
					{lat:41.3268, lng:-74.6274},
					{lat:41.3583, lng:-74.7084},
					{lat:41.3811, lng:-74.7101},
					{lat:41.4386, lng:-74.8265},
					{lat:41.5075, lng:-74.9913},
					{lat:41.6000, lng:-75.0668},
					{lat:41.6719, lng:-75.0366},
					{lat:41.7672, lng:-75.0545},
					{lat:41.8808, lng:-75.1945},
					{lat:42.0013, lng:-75.3552},
					{lat:42.0003, lng:-75.4266},
					{lat:42.0013, lng:-77.0306},
					{lat:41.9993, lng:-79.7250},
					{lat:42.0003, lng:-79.7621},
					{lat:42.1827, lng:-79.7621},
					{lat:42.5146, lng:-79.7621}
		    	  ],
            'OH': [
                  {lat:38.4385, lng:-82.3425},
                  {lat:38.5707, lng:-82.2917},
                  {lat:38.5965, lng:-82.1722},
                  {lat:38.7712, lng:-82.1997},
                  {lat:39.0181, lng:-82.0294},
                  {lat:38.8750, lng:-81.8729},
                  {lat:38.9359, lng:-81.7644},
                  {lat:39.1865, lng:-81.7397},
                  {lat:39.2812, lng:-81.5680},
                  {lat:39.4022, lng:-81.4444},
                  {lat:39.3460, lng:-81.3661},
                  {lat:39.4479, lng:-81.1244},
                  {lat:39.5549, lng:-81.0352},
                  {lat:39.6565, lng:-80.8374},
                  {lat:39.8676, lng:-80.7948},
                  {lat:40.5941, lng:-80.6520},
                  {lat:40.6223, lng:-80.5188},
                  {lat:42.3210, lng:-80.5229},
                  {lat:42.2153, lng:-81.2521},
                  {lat:41.9962, lng:-81.6806},
                  {lat:41.9962, lng:-81.7094},
                  {lat:41.6770, lng:-82.3961},
                  {lat:41.6709, lng:-82.6845},
                  {lat:41.9585, lng:-83.1157},
                  {lat:41.7314, lng:-83.4219},
                  {lat:41.6944, lng:-84.8021},
                  {lat:39.1056, lng:-84.8172},
                  {lat:39.1407, lng:-84.7444},
                  {lat:39.0960, lng:-84.5068},
                  {lat:39.0459, lng:-84.4052},
                  {lat:38.9434, lng:-84.2857},
                  {lat:38.8055, lng:-84.2432},
                  {lat:38.7712, lng:-84.0866},
                  {lat:38.7519, lng:-83.8916},
                  {lat:38.6330, lng:-83.6636},
                  {lat:38.6962, lng:-83.5263},
                  {lat:38.5976, lng:-83.2736},
                  {lat:38.6169, lng:-83.1445},
                  {lat:38.7027, lng:-83.0127},
                  {lat:38.7327, lng:-82.8973},
                  {lat:38.5782, lng:-82.8355},
                  {lat:38.3761, lng:-82.5952}
                  ],

            'PA': [
                  {lat:42.3261, lng:-80.5174},
                  {lat:42.3961, lng:-80.0821},
                  {lat:42.5167, lng:-79.7621},
                  {lat:42.0003, lng:-79.7607},
                  {lat:41.9983, lng:-75.3580},
                  {lat:41.9431, lng:-75.2673},
                  {lat:41.8696, lng:-75.1794},
                  {lat:41.7713, lng:-75.0586},
                  {lat:41.6729, lng:-75.0366},
                  {lat:41.6021, lng:-75.0641},
                  {lat:41.5086, lng:-74.9927},
                  {lat:41.4283, lng:-74.7935},
                  {lat:41.3933, lng:-74.7070},
                  {lat:41.2282, lng:-74.8608},
                  {lat:40.9830, lng:-75.1355},
                  {lat:40.8554, lng:-75.0490},
                  {lat:40.6806, lng:-75.1904},
                  {lat:40.5639, lng:-75.2124},
                  {lat:40.5743, lng:-75.1025},
                  {lat:40.5013, lng:-75.0600},
                  {lat:40.4208, lng:-75.0655},
                  {lat:40.4072, lng:-74.9776},
                  {lat:40.3392, lng:-74.9432},
                  {lat:40.2628, lng:-74.8389},
                  {lat:40.1495, lng:-74.7221},
                  {lat:39.9592, lng:-75.0929},
                  {lat:39.8370, lng:-75.2577},
                  {lat:39.8128, lng:-75.4321},
                  {lat:39.8317, lng:-75.6477},
                  {lat:39.7199, lng:-75.7892},
                  {lat:39.7220, lng:-80.5243},
                  {lat:42.3240, lng:-80.5202}
                  ],

            'SC':[
				{lat:32.0488, lng:-80.7001},
				{lat:32.0453, lng:-80.8978},
				{lat:32.1105, lng:-81.1134},
				{lat:32.2058, lng:-81.1423},
				{lat:32.3846, lng:-81.1821},
				{lat:32.4576, lng:-81.1986},
				{lat:32.5283, lng:-81.2769},
				{lat:32.5838, lng:-81.4087},
				{lat:32.6926, lng:-81.4183},
				{lat:32.8242, lng:-81.4746},
				{lat:32.9465, lng:-81.5117},
				{lat:33.0098, lng:-81.5034},
				{lat:33.0777, lng:-81.6010},
				{lat:33.1238, lng:-81.7122},
				{lat:33.2065, lng:-81.8289},
				{lat:33.3443, lng:-81.9319},
				{lat:33.4830, lng:-82.0280},
				{lat:33.5860, lng:-82.1475},
				{lat:33.6878, lng:-82.2437},
				{lat:33.7609, lng:-82.2437},
				{lat:33.8305, lng:-82.3576},
				{lat:33.9308, lng:-82.5018},
				{lat:33.9650, lng:-82.5471},
				{lat:34.0947, lng:-82.6625},
				{lat:34.1664, lng:-82.7216},
				{lat:34.3434, lng:-82.7930},
				{lat:34.4647, lng:-82.8905},
				{lat:34.4760, lng:-82.9893},
				{lat:34.5281, lng:-83.0855},
				{lat:34.6581, lng:-83.3121},
				{lat:34.7326, lng:-83.3588},
				{lat:34.8318, lng:-83.2983},
				{lat:34.9276, lng:-83.1459},
				{lat:34.9996, lng:-83.1047},
				{lat:35.0817, lng:-82.7779},
				{lat:35.2075, lng:-82.3920},
				{lat:35.1974, lng:-82.2203},
				{lat:35.1480, lng:-81.0379},
				{lat:35.0446, lng:-81.0324},
				{lat:35.1019, lng:-80.9322},
				{lat:34.9344, lng:-80.7811},
				{lat:34.8194, lng:-80.7948},
				{lat:34.8048, lng:-79.6756},
				{lat:34.2016, lng:-78.9560},
				{lat:33.7951, lng:-78.4836},
				{lat:33.6489, lng:-78.7871},
				{lat:33.2019, lng:-79.0837},
				{lat:32.7607, lng:-79.4476},
				{lat:32.5225, lng:-79.8116},
				{lat:32.3556, lng:-80.1508},
				{lat:32.2012, lng:-80.4240},
				{lat:32.0500, lng:-80.7001}
            	  ],


            'TN': [ 
                  {lat:36.6739, lng:-88.0678},
                  {lat:36.6354, lng:-87.8522},
                  {lat:36.6023, lng:-83.6787},
                  {lat:36.5946, lng:-81.9402},
                  {lat:36.6144, lng:-81.9209},
                  {lat:36.6111, lng:-81.6518},
                  {lat:36.3295, lng:-81.7163},
                  {lat:36.3516, lng:-81.7973},
                  {lat:36.2974, lng:-81.9072},
                  {lat:36.1212, lng:-82.0308},
                  {lat:36.1024, lng:-82.1255},
                  {lat:36.1434, lng:-82.1475},
                  {lat:36.1323, lng:-82.2450},
                  {lat:36.1168, lng:-82.3521},
                  {lat:36.0702, lng:-82.4167},
                  {lat:35.9669, lng:-82.5389},
                  {lat:35.9702, lng:-82.6076},
                  {lat:36.0602, lng:-82.6378},
                  {lat:35.9925, lng:-82.7751},
                  {lat:35.9169, lng:-82.8177},
                  {lat:35.8623, lng:-82.9042},
                  {lat:35.7755, lng:-83.0017},
                  {lat:35.7131, lng:-83.2393},
                  {lat:35.5635, lng:-83.4961},
                  {lat:35.5501, lng:-83.6938},
                  {lat:35.5233, lng:-83.8284},
                  {lat:35.5065, lng:-83.8847},
                  {lat:35.4014, lng:-84.0248},
                  {lat:35.2905, lng:-84.0276},
                  {lat:35.2322, lng:-84.1113},
                  {lat:35.2624, lng:-84.2294},
                  {lat:35.2198, lng:-84.2926},
                  {lat:34.9884, lng:-84.3201},
                  {lat:34.9996, lng:-90.3131},
                  {lat:35.1233, lng:-90.2843},
                  {lat:35.1379, lng:-90.1758},
                  {lat:35.1985, lng:-90.1112},
                  {lat:35.2849, lng:-90.1524},
                  {lat:35.4372, lng:-90.1346},
                  {lat:35.5568, lng:-90.0192},
                  {lat:35.7343, lng:-89.9547},
                  {lat:35.8579, lng:-89.7638},
                  {lat:35.9180, lng:-89.6635},
                  {lat:35.9947, lng:-89.7130},
                  {lat:36.0902, lng:-89.6759},
                  {lat:36.1279, lng:-89.5894},
                  {lat:36.1856, lng:-89.6484},
                  {lat:36.2343, lng:-89.7006},
                  {lat:36.2531, lng:-89.5331},
                  {lat:36.2996, lng:-89.6210},
                  {lat:36.3494, lng:-89.5784},
                  {lat:36.3406, lng:-89.5180},
                  {lat:36.4964, lng:-89.5345},
                  {lat:36.5107, lng:-89.3051},
                  {lat:36.4986, lng:-88.1667},
                  {lat:36.4997, lng:-88.0692},
                  {lat:36.6871, lng:-88.0637}
                ],

             'TX': [
             		{lat:31.8659, lng:-106.5715},
					{lat:31.7504, lng:-106.5042},
					{lat:31.6242, lng:-106.3092},
					{lat:31.4638, lng:-106.2103},
					{lat:31.3912, lng:-106.0181},
					{lat:31.1846, lng:-105.7874},
					{lat:31.0012, lng:-105.5663},
					{lat:30.8456, lng:-105.4015},
					{lat:30.6462, lng:-105.0032},
					{lat:30.3847, lng:-104.8521},
					{lat:30.2591, lng:-104.7437},
					{lat:30.0738, lng:-104.6915},
					{lat:29.9169, lng:-104.6777},
					{lat:29.7644, lng:-104.5679},
					{lat:29.6475, lng:-104.5280},
					{lat:29.5603, lng:-104.4044},
					{lat:29.4719, lng:-104.2067},
					{lat:29.3834, lng:-104.1559},
					{lat:29.2948, lng:-103.9774},
					{lat:29.2804, lng:-103.9128},
					{lat:29.2481, lng:-103.8208},
					{lat:29.1378, lng:-103.5640},
					{lat:29.0682, lng:-103.4692},
					{lat:29.0105, lng:-103.3154},
					{lat:28.9601, lng:-103.1616},
					{lat:29.0177, lng:-103.0957},
					{lat:29.1330, lng:-103.0298},
					{lat:29.2157, lng:-102.8677},
					{lat:29.2565, lng:-102.8979},
					{lat:29.3570, lng:-102.8375},
					{lat:29.4898, lng:-102.8004},
					{lat:29.6881, lng:-102.7002},
					{lat:29.7691, lng:-102.5134},
					{lat:29.7596, lng:-102.3843},
					{lat:29.8788, lng:-102.3047},
					{lat:29.7834, lng:-102.1509},
					{lat:29.7572, lng:-101.7004},
					{lat:29.7644, lng:-101.4917},
					{lat:29.6308, lng:-101.2939},
					{lat:29.5269, lng:-101.2582},
					{lat:29.3642, lng:-101.0056},
					{lat:29.3056, lng:-100.9204},
					{lat:29.1642, lng:-100.7707},
					{lat:29.0946, lng:-100.7007},
					{lat:28.9012, lng:-100.6306},
					{lat:28.6593, lng:-100.4974},
					{lat:28.4675, lng:-100.3601},
					{lat:28.2778, lng:-100.2969},
					{lat:28.1882, lng:-100.1733},
					{lat:28.0526, lng:-100.0195},
					{lat:27.9435, lng:-99.9344},
					{lat:27.7638, lng:-99.8438},
					{lat:27.6641, lng:-99.7119},
					{lat:27.4839, lng:-99.4812},
					{lat:27.3059, lng:-99.5375},
					{lat:27.1948, lng:-99.4290},
					{lat:27.0175, lng:-99.4455},
					{lat:26.8829, lng:-99.3164},
					{lat:26.6867, lng:-99.2065},
					{lat:26.4116, lng:-99.0967},
					{lat:26.3574, lng:-98.8138},
					{lat:26.2257, lng:-98.6668},
					{lat:26.2343, lng:-98.5474},
					{lat:26.1357, lng:-98.3276},
					{lat:26.0457, lng:-98.1697},
					{lat:26.0518, lng:-97.9143},
					{lat:26.0050, lng:-97.6643},
					{lat:25.8419, lng:-97.4020},
					{lat:25.9074, lng:-97.3526},
					{lat:25.9679, lng:-97.0148},
					{lat:26.1789, lng:-97.0697},
					{lat:26.8253, lng:-97.2249},
					{lat:27.4230, lng:-97.0752},
					{lat:28.0599, lng:-96.6096},
					{lat:28.4228, lng:-95.9285},
					{lat:28.7568, lng:-95.3036},
					{lat:29.0742, lng:-94.7296},
					{lat:29.3810, lng:-94.3355},
					{lat:29.6021, lng:-93.8205},
					{lat:29.8013, lng:-93.9317},
					{lat:29.9157, lng:-93.8136},
					{lat:30.0489, lng:-93.7230},
					{lat:30.1214, lng:-93.6996},
					{lat:30.2021, lng:-93.7216},
					{lat:30.2792, lng:-93.7038},
					{lat:30.3278, lng:-93.7628},
					{lat:30.3835, lng:-93.7587},
					{lat:30.4380, lng:-93.7010},
					{lat:30.5079, lng:-93.7024},
					{lat:30.5362, lng:-93.7299},
					{lat:30.6296, lng:-93.6694},
					{lat:30.7466, lng:-93.6090},
					{lat:30.8114, lng:-93.5527},
					{lat:30.8834, lng:-93.5747},
					{lat:30.9376, lng:-93.5307},
					{lat:31.0318, lng:-93.5074},
					{lat:31.0812, lng:-93.5266},
					{lat:31.1787, lng:-93.5335},
					{lat:31.1670, lng:-93.5980},
					{lat:31.3055, lng:-93.6832},
					{lat:31.3830, lng:-93.6708},
					{lat:31.4369, lng:-93.6887},
					{lat:31.5107, lng:-93.7202},
					{lat:31.5820, lng:-93.8315},
					{lat:31.6440, lng:-93.8123},
					{lat:31.7188, lng:-93.8232},
					{lat:31.7936, lng:-93.8342},
					{lat:31.8309, lng:-93.8782},
					{lat:31.8869, lng:-93.9221},
					{lat:31.9335, lng:-93.9661},
					{lat:32.0081, lng:-94.0430},
					{lat:33.4681, lng:-94.0430},
					{lat:33.5414, lng:-94.0430},
					{lat:33.5689, lng:-94.1528},
					{lat:33.5872, lng:-94.1968},
					{lat:33.5872, lng:-94.2627},
					{lat:33.5689, lng:-94.3176},
					{lat:33.5597, lng:-94.3945},
					{lat:33.5780, lng:-94.4275},
					{lat:33.6055, lng:-94.4275},
					{lat:33.6421, lng:-94.4495},
					{lat:33.6329, lng:-94.4879},
					{lat:33.6421, lng:-94.5236},
					{lat:33.6695, lng:-94.6637},
					{lat:33.7061, lng:-94.7461},
					{lat:33.7791, lng:-94.8999},
					{lat:33.8818, lng:-95.0757},
					{lat:33.9251, lng:-95.1526},
					{lat:33.9604, lng:-95.2254},
					{lat:33.8750, lng:-95.2858},
					{lat:33.8841, lng:-95.5399},
					{lat:33.8887, lng:-95.7568},
					{lat:33.8408, lng:-95.8420},
					{lat:33.8556, lng:-96.0274},
					{lat:33.6901, lng:-96.3528},
					{lat:33.8442, lng:-96.6179},
					{lat:33.8898, lng:-96.5836},
					{lat:33.8955, lng:-96.6673},
					{lat:33.8179, lng:-96.7538},
					{lat:33.8613, lng:-96.8335},
					{lat:33.8613, lng:-96.8774},
					{lat:33.9388, lng:-96.9159},
					{lat:33.7392, lng:-97.0917},
					{lat:33.7449, lng:-97.1645},
					{lat:33.8978, lng:-97.2180},
					{lat:33.8225, lng:-97.3746},
					{lat:33.8305, lng:-97.4611},
					{lat:33.8761, lng:-97.4460},
					{lat:33.9798, lng:-97.6945},
					{lat:33.8476, lng:-97.8648},
					{lat:33.8978, lng:-97.9651},
					{lat:34.0299, lng:-98.0983},
					{lat:34.1141, lng:-98.1752},
					{lat:34.1425, lng:-98.3743},
					{lat:34.0640, lng:-98.4773},
					{lat:34.1209, lng:-98.5529},
					{lat:34.1232, lng:-98.7520},
					{lat:34.2095, lng:-98.9539},
					{lat:34.2073, lng:-99.0637},
					{lat:34.2141, lng:-99.1832},
					{lat:34.3593, lng:-99.2505},
					{lat:34.4613, lng:-99.3823},
					{lat:34.3774, lng:-99.4318},
					{lat:34.4160, lng:-99.5718},
					{lat:34.3706, lng:-99.6158},
					{lat:34.4726, lng:-99.8094},
					{lat:34.5631, lng:-99.9934},
					{lat:36.4975, lng:-100.0017},
					{lat:36.5008, lng:-103.0408},
					{lat:32.0011, lng:-103.0655},
					{lat:32.0023, lng:-106.6168}
             	  ]

};


			
			for (var key in states) {
			    if (states.hasOwnProperty(key)) {
			    	
					console.log( typeof(queriedstate) + queriedstate );
					console.log( typeof(key) + key );
					
			      	//if(typeof(queriedstate) == "undefined"){
			      		if( key == queriedstate  ){

			    			var fillColor = '#ec008c';
			        	}
			        	else{
			        		var fillColor = '#f4adcc';
			        	}
			        	console.log(fillColor);
			        	var key = new google.maps.Polygon({
						                  paths: states[key],
						                  strokeColor: '#f4adcc',
						                  strokeOpacity: 1,
						                  strokeWeight: 1,
						                  fillColor: fillColor,
						                  fillOpacity: 0.80,
		             					  content   : key
		             	 				});
			        	
		                	/*key.setOptions( { fillColor: '#0000ff' });*/ 
            			
		                key.setMap(map);

		                

		                key.addListener('click', showArrays);
						
						
			      //}


			    	/*if(key  == queriedstate){
			    		console.log('aya');
			        	var key = new google.maps.Polygon({
						                  paths: states[key],
						                  strokeColor: '#F50081',
						                  strokeOpacity: 0.75,
						                  strokeWeight: 1,
						                  fillColor: '#0000ff',
						                  fillOpacity: 0.35
		             
		             	 				});
		                key.setMap(map);
		                key.setOptions( { fillColor: '#0000ff' }); 
            		}*/

               
        

			    }

			}


              return map;     
		  };

		  initialize(mapDiv, latitude, longitude , queriedstate);


		


	};
	/*Map Function*/


	/*Show surgeons of specific state*/		  
	function showArrays(event) {
        
        var vertices = this.getPath();

        /* 
        infoWindow.setContent(this.content);
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);
        infoWindow.open(map);*/

        /*trigger our custom event on the map*/
        
        /*Hit Ajax*/
        var data = {
            action   : 'get_physician',
            state    : this.content
        }
        jQuery.ajax({
            url : resensation.ajaxurl,
            type: 'post',
            data: data,
            success: function (response) {  
            	jQuery('.surgeon-listing').empty().append(response);
            }
        });

        console.log(this.content);
        simpleGoogleMapsApiExample.map(jQuery("#map")[0], 39, -95,this.content);
      }
      /*Show surgeons of specific state*/


</script>
<style type="text/css">
div#map {
  width: 100%; height: 100% !important ;
}
</style>