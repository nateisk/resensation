<?php
/**
 * axresensationmm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package axresensationmm
 */

if ( ! function_exists( 'axresensationmm_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function axresensationmm_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on axresensationmm, use a find and replace
		 * to change 'axresensationmm' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'axresensationmm', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'axresensationmm' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'axresensationmm_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'axresensationmm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function axresensationmm_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'axresensationmm_content_width', 640 );
}
add_action( 'after_setup_theme', 'axresensationmm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function axresensationmm_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'axresensationmm' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'axresensationmm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'axresensationmm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function axresensationmm_scripts() {
	wp_enqueue_style( 'bootstrapcss', get_template_directory_uri(). '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css', array('bootstrapcss') );
	wp_enqueue_style( 'slickcsstheme', get_template_directory_uri(). '/css/slick-theme.css', array('fontawesome') );
	wp_enqueue_style( 'slickcss', get_template_directory_uri(). '/css/slick.css', array('slickcsstheme') );
	wp_enqueue_style( 'axresensationmm-style', get_stylesheet_uri('slickcss') );
	wp_enqueue_style( 'fontawesome47', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array('axresensationmm-style') );
	wp_enqueue_style( 'customscroll', get_template_directory_uri(). '/css/jquery.mCustomScrollbar.css', array('slickcsstheme') );



	wp_enqueue_script( 'axresensationmm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'axresensationmm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	/*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}*/

	wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1', true );
	
	wp_enqueue_script( 'customscroll', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '1', true );

	wp_register_script( 'customjs', get_template_directory_uri() . '/js/custom.js', array('jquery','slickjs'), '1', true );
	wp_register_script( 'ionicons', 'https://unpkg.com/ionicons@4.5.0/dist/ionicons.js' );

	$resensationarray = array(
		'siteurl'  => site_url(),
		'adminurl' => admin_url(),
		'ajaxurl'  => admin_url( 'admin-ajax.php' )
	);
	wp_localize_script( 'customjs', 'resensation', $resensationarray );

	wp_enqueue_script( 'customjs');
	wp_enqueue_script( 'jquery-ui-autocomplete' );
}
add_action( 'wp_enqueue_scripts', 'axresensationmm_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*Theme Options*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Physician Settings',
		'menu_title'	=> 'Physician',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/*Theme Options*/


#################################################
#             Pagination for blog posts         #
#################################################
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

if (empty($pagerange)) {
    $pagerange = 4;
  }


global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }


$pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('<i class="fas fa-angle-left"></i> Previous Page '),
    'next_text'       => __('Next Page <i class="fas fa-angle-right"></i>'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

$paginate_links = paginate_links($pagination_args);

if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
#################################################
#         End Pagination for blog posts         #
#################################################
/*Svg file uploads*/
function svg_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'svg_mime_types');


function filter_plugin_updates( $value ) {
unset( $value->response['advanced-custom-fields-pro/acf.php'] );
return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );


/*Blog rewrite*/
add_action( 'init', 'resensation_newblog_directory', 1 );
function resensation_newblog_directory() {

    register_post_type( 'post', array(
        'labels' => array(
            'name_admin_bar' => _x( 'Post', 'add new on admin bar' ),
        ),
        'public'  => true,
        '_builtin' => false, 
        '_edit_link' => 'post.php?post=%d', 
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'breast-reconstruction-and-neurotization-after-mastectomy-blog' ),
        'query_var' => false,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
    ) );
}
/*Blog rewrite*/

/*Physician Registration*/
add_action('wp_ajax_register_physician','register_physician_callback');
add_action('wp_ajax_nopriv_register_physician','register_physician_callback');
function register_physician_callback(){

	extract($_POST);

	$user_name = sanitize_text_field($_POST['email']);

	if ( username_exists( $user_name ) != false ){
		echo json_encode(array('flag'=>'failure','message'=>'The username already exists.'));
	}
	elseif( email_exists($user_name)   != false ){
		echo json_encode(array('flag'=>'failure','message'=>'The email already exists.'));
	}else{


	$user_id = wp_create_user( 
					sanitize_text_field($_POST['email'] ), 
					'',
					sanitize_text_field($_POST['email'] ) 
				);

	$user = new WP_User($user_id); 

	$user->set_role('physician');
	update_user_meta( $user_id, 'user_status', 0 );

	update_user_meta( $user_id, 'jobtitle',    sanitize_text_field($_POST['jobtitle'])  );
	update_user_meta( $user_id, 'facility',    sanitize_text_field($_POST['facility']) );
	update_user_meta( $user_id, 'phonenumber', sanitize_text_field($_POST['phonenumber']) );

	update_user_meta( $user_id, 'first_name', sanitize_text_field($_POST['firstname'] ) );
	update_user_meta( $user_id, 'last_name',  sanitize_text_field($_POST['lastname'] ) );
	/*wp_new_user_notification( $user_id,'','user' );*/

		if($user_id && is_numeric($user_id)){

		/*Send admin order notification*/
		$registration = get_field('physician_registration_information_email','option');


		$registrationreplaced = str_replace(

			array('[username]'), 

			array($user_name),

			$registration
		);


		$headers = "From: " . strip_tags(get_field('from_email','option')) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		mail(	
			strip_tags(get_field('physician_email_to_send_notification','option')), 
			'New Physician Resource Registration', 
			$registrationreplaced , 
			$headers
		);

		/*End admin order notification*/





		echo json_encode(array('flag'=>'success','message'=>'Your account has been successfully created.','redirecturl'=> get_field('registration_redirect_url','option') ));
		}else{
			
			echo json_encode(array('flag'=>'failure','message'=>'There was problem creating account please try after some time.','redirecturl'=>'' ));
		}
		
	}
	

	die; 
}
/*Physician Registration*/

/*User Redirect to ome page after logout*/
add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
wp_redirect( home_url() );
exit();
}
/*User Redirect to ome page after logout*/



/*Disable Block Editor of WP*/
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);
/*Disable Block Editor of WP*/


/*Approve Physician to active*/
function new_modify_user_table( $column ) {

		if( ($_GET['role'] == 'physician') ) {

		    $column['jobtitle'] 	= 'Job Title';
		    $column['facility'] 	= 'Facility';
		    $column['phonenumber'] 	= 'Phone Number';
		    $column['user_status'] 	= 'Status';
		   
		}
		 return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {

	

	    switch ($column_name) {
	        case 'jobtitle' :
	            return get_the_author_meta( 'jobtitle', $user_id );
	            break;
	        case 'facility' :
	            return get_the_author_meta( 'facility', $user_id );
	            break;
	        case 'phonenumber' :
	            return get_the_author_meta( 'phonenumber', $user_id );
	            break;
	        case 'user_status' :
	            return get_user_meta($user_id, 'user_status',true  ) == 1 ? 'Approved':'Pending' ;
	            break;
	         
	        default:
	    }
	    return $val;

	
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );
/*Approve Physician to active*/





/*Physician Approval Mail with username and password*/
function resensation_approveuser_action( $actions, $user ) {

	$user_roles = $user->roles;
	if ( in_array( 'physician', $user_roles, true ) && get_user_meta($user->ID, 'user_status',true  ) == 0 ) {

		if( ($_GET['action'] == 'approvephysician') && ($_GET['user'] == $user->ID) ) {

			
			update_user_meta( $user->ID, 'user_status',1 );
			$password  = strtoupper(md5(time())); 
			wp_set_password( $password , $user->ID ); 
			$userdata  = get_userdata( $user->ID ); 


			$userlogin = $userdata->data->user_login; 
			$user_mail = $userdata->data->user_email; 

			$welcomemail = get_field('physician_welcome_email','option');


			$welcomemail_replaced = str_replace(

			array('[username]','[password]'), 

			array($userlogin , $password),

			$welcomemail
			); 

			$headers = "From: " . strip_tags(get_field('from_email','option')) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

			mail(strip_tags($user_mail), 'Physician Resource Account Details', $welcomemail_replaced , $headers);

           
       echo '<div class="updated notice"><p>Success! Physician #' . $_GET['user'] . '. Approved</p></div>';
          }


	     $actions['approvephysician'] = "<a class='approvephysician' href='" . admin_url( "users.php?&action=approvephysician&amp;user=$user->ID") . "'>" . esc_html__( 'Approve', 'axogenresensation' ) . "</a>";
	}

   
    return $actions;
}
add_filter('user_row_actions', 'resensation_approveuser_action', 10, 2);
/*Physician Approval Mail with username and password*/




/*Physician Resource Login*/
add_action('wp_ajax_signin_physician','signin_physician_callback');
add_action('wp_ajax_nopriv_signin_physician','signin_physician_callback');
function signin_physician_callback(){

	if(trim($_POST["username"] == '' )  || trim($_POST["password"] == '' )  ){
		echo json_encode(array('flag'=>'failure','message'=> 'Please enter both username and password.' ));
	}else{

		$user_login     = esc_attr($_POST["username"]);
		$user_password  = esc_attr($_POST["password"]);

		$creds = array();
		$creds['user_login']    = $user_login;
		$creds['user_password'] = $user_password;
		$creds['remember']      = true;

		$user = wp_signon( $creds, false );
		$userID = $user->ID;

		if(get_user_meta($user->ID, 'user_status',true ) == 1){	
			wp_set_current_user( $userID, $user_login );
			wp_set_auth_cookie( $userID, true, false );
			do_action( 'wp_login', $user_login );

			   if ( is_wp_error($user) ) {

			 	echo json_encode(array('flag'=>'failure','message'=> 'Invalid username or password.' ));
		       
			       die();
			    } else {
			        wp_set_auth_cookie( $user->ID, 0, 0);
			        echo json_encode(array('flag' => 'success','message' => 'Logged in sucessfully','redirecturl' => get_field('resource_url','option') ));
			        die();
			    }
		}else{

			echo json_encode(array('flag'=>'failure','message'=> 'User account is not activated.' ));

		}

		
	}

	die;
}
/*Physician Resource Login*/


/*Physician forget password*/
add_action('wp_ajax_forgetpassword_physician','forgetpassword_physician_callback');
add_action('wp_ajax_nopriv_forgetpassword_physician','forgetpassword_physician_callback');
function forgetpassword_physician_callback(){


	$usermail    = sanitize_text_field($_POST['email']); 
	$userdetails = get_user_by(  'email', $usermail );

	$user_id     = $userdetails->data->ID;
	if($userdetails){
		$password    = wp_generate_password(6,true); 
		wp_set_password(  $password,  $user_id );

		$newpasswordrequest = '<table>
		<tr><th colspan="2">Updated Account Details</th></tr>
		<tr><td>Login URL</td>:<td>'.site_url('physician-tool-kit-login').'</td></tr>
		<tr><td>Username</td>:<td>'.$userdetails->data->user_login.'</td></tr>
		<tr><td>Password</td>:<td>'.$password.'</td></tr>
	</table>';


		$headers = "From: " . strip_tags(get_field('from_email','option')) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		mail(	
			$usermail , 
			'Your New Password Request', 
			$newpasswordrequest , 
			$headers
		);
	}

	

		if($password){
		 	echo json_encode(array('flag' => 'success','message' => 'Your new password has been sent to your registered email address.','redirecturl' => '' ));

		}else{
			echo json_encode(array('flag'=>'failure','message'=> 'User account is not activated.' ));
		}

	
	die;
}
/*Physician forget password*/

/*Add dynamic value to contact form 7*/
add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
 
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
    $customattr = 'destination-email';
 
    if ( isset( $atts[$customattr] ) ) {
        $out[$customattr] = $atts[$customattr];
    }
 
    return $out;
}
/*Add dynamic value to contact form 7*/


/*Fetch surgeons to show on surgeon locator page*/

add_action('wp_ajax_get_physician','get_physician_callback');
add_action('wp_ajax_nopriv_get_physician','get_physician_callback');
function get_physician_callback(){

	$meta_query = array();

	if($_POST['state'] != ''){


		array_push($meta_query, 

        	 array(
		            'key'     => 'doctor_practice_address_state',
		            'value'   => $_POST['state'],
		            'compare' => '=',
		       
		        )
        );
	}


	if($_POST['institution'] !=''){

		array_push($meta_query, 

        	 array(
		            'key'     => 'doctor_practice_name',
		            'value'   => $_POST['institution'],
		            'compare' => '=',
		       
		        )
        );


	}

	if($_POST['searchtext'] != ''){

		$args = array(
				'post_type'      => 'surgeon',
				'posts_per_page' => -1,
				'post_status'    => array('publish'),
				'meta_query'     => $meta_query,
				's'              => trim($_POST['searchtext']),
				'meta_key' 		 => $_POST['byname'] == ''? 'doctor_firstname' : $_POST['byname'] ,
				'orderby'        => 'meta_value title',
				'order'          => 'ASC',
		);

	}else{

		$args = array(
				'post_type'      => 'surgeon',
				'posts_per_page' => -1,
				'post_status'    => array('publish'),
				'meta_query'     =>  $meta_query,
				'meta_key' 		 =>  $_POST['byname'] == ''? 'doctor_firstname' : $_POST['byname'] ,
				'orderby'        => 'meta_value title',
				'order'          => 'ASC',
		);

	}

	/*echo '<pre>' ; print_r(array_filter($args));die;*/

	$surgeons = new WP_Query($args);

	$surgeon = '';
	if($surgeons->have_posts()){
		while($surgeons->have_posts()){
			$surgeons->the_post();
	
		$profileimage = get_field('doctor_thumbnail_picture'); 
		if(is_array($profileimage)){
			$profilepicture = $profileimage['url'];
		}else{
			$profilepicture = get_field('no_image_picture','option');
		}

	    $surgeon .= 
	         '<div class="surgeon-list-item">
					<div class="inner-colmn">
						<figure>
							<img src="'.$profilepicture.'" height="70" width="70" alt="'.$profileimage['alt'].'">
						</figure>
						<div class="detail-box">
							<h3>'.get_field('doctor_firstname').' '.get_field('doctor_lastname').', <span> '.get_field('doctor_designation').'</span></h3>
							<p>'.get_field('doctor_location').', '.get_field('doctor_practice_address_state').'</p>
						</div>
						<span style="color:white;">4.4 mi</span>
					</div>
					<address>
						'.get_field('doctor_practice_name').' <span>'.get_field('doctor_practice_address_line_1').' </span>
					</address>
					<a target="_blank" href="'.get_the_permalink().'" class="btn">Surgeon Profile</a>
				</div>';
	
		}
		echo  $surgeon; 
	}
	die;
}
/*Fetch surgeons to show on surgeon locator page*/

/*Fetch surgeons on mobile to show on surgeon locator page*/
add_action('wp_ajax_get_physician_mobile','get_physician_mobile_callback');
add_action('wp_ajax_nopriv_get_physician_mobile','get_physician_mobile_callback');
function get_physician_mobile_callback(){

	$meta_query = array();

	if($_POST['state'] != ''){


		array_push($meta_query, 

        	 array(
		            'key'     => 'doctor_practice_address_state',
		            'value'   => $_POST['state'],
		            'compare' => '=',
		       
		        )
        );
	}



		$args = array(
				'post_type'      => 'surgeon',
				'posts_per_page' => -1,
				'post_status'    => array('publish'),
				'meta_query'     => $meta_query,
				'meta_key' 		 => 'doctor_firstname' ,
				'orderby'        => 'meta_value title',
				'order'          => 'ASC',
		);




	/*echo '<pre>' ; print_r(array_filter($args));die;*/

	$surgeons = new WP_Query($args);

	$surgeon = '';
	if($surgeons->post_count > 0){
		if($surgeons->have_posts()){
			while($surgeons->have_posts()){
				$surgeons->the_post();
		
			$profileimage = get_field('doctor_thumbnail_picture'); 
			if(is_array($profileimage)){
				$profilepicture = $profileimage['url'];
			}else{
				$profilepicture = get_field('no_image_picture','option');
			}

		    $surgeon .= 
		         '<div class="surgeon-list-item">
						<div class="inner-colmn">
							<figure>
								<img src="'.$profilepicture.'" height="70" width="70" alt="'.$profileimage['alt'].'">
							</figure>
							<div class="detail-box">
								<h3>'.get_field('doctor_firstname').' '.get_field('doctor_lastname').', <span> '.get_field('doctor_designation').'</span></h3>
								<p>'.get_field('doctor_location').', '.get_field('doctor_practice_address_state').'</p>
							</div>
							<span style="color:white;">4.4 mi</span>
						</div>
						<address>
							'.get_field('doctor_practice_name').' <span>'.get_field('doctor_practice_address_line_1').' </span>
						</address>
						<a target="_blank" href="'.get_the_permalink().'" class="btn">Surgeon Profile</a>
					</div>';
		
			}
			echo  $surgeon; 
		}
	}
	else{


		$surgeon .= 
		         '<div class="surgeon-list-item">
						<div class="inner-colmn">
							ReSensation is not currently offered in your state. Please select another state to find a ReSensation surgeon in your region of the United States
						</div>
				  </div>';
		
		
			echo  $surgeon; 

	}

	

	die;


}
/*Fetch surgeons on mobile to show on surgeon locator page*/
