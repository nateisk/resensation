<?php
/**
 * Template Name: Physician Resource Singnup Login
 */ 
 get_header(); ?>
<div id="content" class="site-content">
    <main>
        <div class="thank-section">
            <div class="banner-section">
                <?php $bannerimage= get_field('banner_image');?>
                <img src="<?php echo $bannerimage['url'];?>" alt="<?php echo $bannerimage['alt'];?>" title="<?php echo $bannerimage['title'];?>">
            </div>
            <div class="container">
                <div class="message-section" style="padding-bottom:10px;">
                    <?php if(have_rows('resourse_description')) {

                            while (have_rows('resourse_description')) {

                                the_row();
                    ?>

                     <h1 style="color:#ec008c;font-weight:bolder;font-family:var(--font-bold);"><?php echo get_sub_field('resorce_heading_details'); ?></h1>
                    <h5><?php echo get_sub_field('resource_details'); ?></h5>
                    <?php
                            } }
                    ?>
                   
                </div>
            </div>
        </div>
    </main>

</div>



<main>

    <div class="resource-section page-content">

        <div class="container-sm">
            <?php if (have_rows('resourse_description')) : ?>
            <?php while( have_rows('resourse_description') ): the_row(); ?>
            <br>
            <?php wp_reset_query(); endwhile; endif; ?>
            <div class="form-view-section resource-form">
                <!--
                <div class="form-section">
                    <?php echo do_shortcode('[contact-form-7 id="925" title="Download Resources Now"]'); ?>
    <script type="text/javascript">
        var __ss_noform = __ss_noform || [];
        __ss_noform.push(['baseURI', 'https://app-3QNEGP78YU.marketingautomation.services/webforms/receivePostback/MzawMDEzNzcyBQA/']);
        __ss_noform.push(['endpoint', '8be1448a-afed-44eb-9447-65807fde08fe']);
    </script>
    <script type="text/javascript" src="https://koi-3QNEGP78YU.marketingautomation.services/client/noform.js?ver=1.24"></script>


                </div>-->
                <?php if( !is_user_logged_in() ){ ?>


                <div class="media_kit_sign">
                    <ul class="toggle_form_btn">
                        <li><a href="#register">Register</a></li>
                        <li><a href="#login">Login</a></li>
                    </ul>
                    <div class="forms">
                        <div id="register" class="media_kit_register form-groups">
                            <form id="regform545" class="register_media">
                                <div class="register_box regtxt">
                                    <h3>
                                        Please fill out all the required fields below.<br> Access will be granted by the ReSensation team.

                                    </h3>

                                </div>
                                <div class="register_box u1">
                                    <input type="text" name="fname" placeholder="First name" id="firstname" /></div>
                                <div class="register_box u1">
                                    <input type="text" name="lname" placeholder="Last Name" id="lastname" /></div>


                                <div class="register_box u1">
                                    <input type="text" name="jobtitle" placeholder="Job Title" id="jobtitle" /></div>
                                <div class="register_box m1">
                                    <input type="email" name="emailadd" placeholder="E-mail Address" id="emailaddress" /></div>
                                <div class="register_box u1">
                                    <input type="text" name="accomodate" placeholder="Facility/Practice Name" id="facilitypracticename" /></div>
                                <div class="register_box num">
                                    <input type="number" name="contact" placeholder="Phone Number" id="phonenumber" /></div>
                                <!-- <div class="custom-check">
                                    <div class="check-box">
                                                                           <input type="checkbox">
                                        <div class="check-icon">
                                            <input type="checkbox" id="agree">
                                            <label for="agree">
                                                <span> Yes, please contact me to participate in your surgeon KOL guest blogging program for ReSensation.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="register_box">
                                    <input id="registerbutton" type="submit" value="Submit" />
                                </div>
                            </form>


                        </div>
                        <div id="login" class="media_kit_login form-groups">
                            <!-- Login Form -->
                            <form class="login_media" id="login545">
                                <div class="register_box u1">
                                    <input type="text" name="fname" placeholder="User Name" id="userlogin" /></div>
                                <div class="register_box lock">
                                    <input type="password" name="pass" placeholder="Password" id="userpassword" /></div>
                                <div class="register_box logintxt">
                                    <a class="forgetpassword" href="javascript:void(0)">Forgot your password ?</a>
                                    <a class="registeraccount" href="javascript:void(0)"> Register</a>
                                </div>
                                <div class="register_box">
                                    <input id="loginbutton" type="submit" value="Submit" />
                                </div>
                            </form>
                            <!-- End Login Form -->

                            <!-- Forget Password Form -->
                            <form class="login_media" id="forgetpasswprd">
                                <div class="register_box u1">
                                    <input type="text" name="useremailforgotpass" placeholder="Enter your email address" id="useremailforgotpass" /></div>
                                
                                <div class="register_box logintxt">
                                    <a class="loginaccount" href="javascript:void(0)">Login</a>
                                </div>
                                <div class="register_box">
                                    <input id="forgetpassword" type="submit" value="Submit" />
                                </div>
                            </form>
                            <!-- End Forget Password Form -->
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div>
                    <p id="message" style="text-align: center;"></p>
                </div>
            </div>
        </div>
        <div class="patient-section text-center">
            <div class="container">
                <h2>
                    <?php the_field('resensation_patient_heading');?>
                </h2>
                <div class="colmn">
                    <?php if (have_rows('resensation')) : ?>
                    <?php while( have_rows('resensation') ): the_row(); ?>
                    <div class="colmn-box">
                        <h5>
                            <?php the_sub_field('resensation_details'); ?>
                        </h5>
                    </div>
                    <?php wp_reset_query(); endwhile; endif; ?>
                </div>
            </div>
        </div>

    </div>
</main>
<style>
    .ask-box {
        display: none;
    }

    .fbut {
        display: none;
    }

</style>


<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QNEGP78YU.marketingautomation.services/webforms/receivePostback/MzawMDEzNzcyBQA/']);
    __ss_noform.push(['form', 'regform545', 'e2342682-eed3-439c-a516-fb9f58997f9d']);
	__ss_noform.push(['submitType', 'manual']);
	
	
	
	
</script>
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QNEGP78YU.marketingautomation.services/webforms/receivePostback/MzawMDEzNzcyBQA/']);
    __ss_noform.push(['form', 'login545', 'b09199f4-fa36-4faa-9a14-a183f83a44e8']);
	__ss_noform.push(['submitType', 'manual']);
	
</script>
<script type="text/javascript" src="https://koi-3QNEGP78YU.marketingautomation.services/client/noform.js?ver=1.24" ></script>


<?php get_footer(); ?>
