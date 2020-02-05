jQuery().ready(function () {
   
    jQuery('.text-box').click(function (e) {
        jQuery(this).siblings('ul').stop().slideToggle();
        e.stopPropagation();
    });
    jQuery('.option-list li').click(function () {
        var Getoption = jQuery(this).text();
        var getOptionValue = jQuery(this).data('value');
        jQuery('.text-box p .placeHere').text(Getoption);
        
        jQuery('.text-box2').val(getOptionValue);


    });
    jQuery('body').click(function () {
        jQuery('.option-list').slideUp();
        
    });
    jQuery('.homeslider').slick({
        dots: true,
        infinite: true,
        speed: 2000,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 7000,
    });
    jQuery('.single-item').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 7000,
        adaptiveHeight: true
    });
    jQuery('.blog-item').slick({
        dots: false,
        infinite: true,
        speed: 2000,
        arrows: false,
        autoplay: true,
        adaptiveHeight: true,
        autoplaySpeed: 3000
    });
    jQuery('.client-experience').slick({
        dots: false,
        infinite: true,
        speed: 2000,
        arrows: true,
        autoplay: false,
        adaptiveHeight: true,
        autoplaySpeed: 7000
    });


    jQuery(".navbar-toggler").click(function () {
        jQuery(this).toggleClass('close');
        jQuery(".navbar-collapse").slideToggle();
    });


    jQuery('.accordin-header').click(function () {
        jQuery(this).toggleClass('open').parents('.accordin-box').siblings().children('.accordin-header').removeClass('open');
        jQuery(this).siblings('.accordin-body').stop().slideToggle();
        jQuery(this).parents('.accordin-box').siblings().children('.accordin-body').slideUp();
    });
    /*jQuery('.accordin-box:first .accordin-body').slideDown();
    jQuery('.accordin-box:first .accordin-header').addClass('open');*/

    nav = jQuery('.single-blog-head');
    if (nav.length) {

        var x = jQuery('.single-blog-head').offset().top;
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > x) {
                jQuery('.share-sticky').addClass('show');
            } else {
                jQuery('.share-sticky').removeClass('show');
            }
        });
    }



    jQuery('#physicianregister').click(function () {

        console.log(resensation.ajaxurl);

        jQuery.ajax({
            url: resensation.ajaxurl,
            type: 'post',
            data: {
                action: 'register_physician',
                firstname: jQuery('#firstname').val(),
                lastname: jQuery('#lastname').val(),
                email: jQuery('#email').val(),
                password: jQuery('#password').val(),
            },
            success: function (response) {

                responseobj = jQuery.parseJSON(response);

                if (responseobj['flag'] == 'success') {
                    jQuery('#message').text(responseobj['message']);
                }

            }
        });

    });
    jQuery('.profile-main-form .form-group ul li,.circle-popup .form-group ul li').click(function () {
        jQuery(this).addClass('active').siblings().removeClass('active');
    });
    jQuery('.profile-main-form .form-group li:nth-child(1),.circle-popup .form-group li:nth-child(1)').addClass('active');



    jQuery('.btn-blue').click(function (e) {
        e.preventDefault();
        var getPopup = jQuery(this).attr('href');
        jQuery(getPopup).addClass('active');
        jQuery('body').css({
            'overflow': 'hidden'
        });
    });
    jQuery('.btn-close').click(function () {
        jQuery('.popUp').removeClass('active');
        jQuery('body').css({
            'overflow': 'auto'
        });
    });

    jQuery('.custom-select-box p').click(function (e) {
        e.stopPropagation();
        jQuery(this).siblings('ul').stop().toggleClass('active');
    });
    jQuery('body').click(function () {
        jQuery('.custom-select-box ul').removeClass('active');
    });
    for (var i = 0; i < (jQuery('.search-form .select-box').length + 1); i++) {
        var oplists = jQuery('.search-form .select-box select').find('option');
        oplists[i] = jQuery('.search-form .select-box').eq(i).children('select').find('option');
        var apli = oplists[i].map(function () {
            
            return jQuery('.search-form .select-box').eq(i).children('.custom-select-box').children('ul').append('<li data-value='+jQuery(this).val()+'>' + jQuery(this).text() + '</li>');
        });
    }

    jQuery('.custom-select-box li').click(function () {
        var getliText = jQuery(this).text();
        jQuery(this).parents('ul').siblings('p').children('span').text(getliText);
        jQuery(this).parents('ul').parents('.custom-select-box').siblings('select').val(getliText);
    });


    /*Surgeon Li Click on Surgeon Profile Page Request a consult form*/

        jQuery('.dateofweekli li').click(function(){
            console.log(jQuery(this).data('dateofweek'));
            jQuery('.dayofweek').val(jQuery(this).data('dateofweek'));  
        });

        jQuery('.timeofdayli li').click(function(){
            console.log(jQuery(this).data('timeofday'));
            jQuery('.timeofday').val(jQuery(this).data('timeofday'));
        });

    /*Surgeon Li Click on Surgeon Profile Page Request a consult form*/

     /*Register Button*/
        jQuery('#registerbutton').click(function(event) {
            event.preventDefault();


            var registerdata = {
                action          : 'register_physician',
                firstname       : jQuery('#firstname').val(),
                lastname        : jQuery('#lastname').val(),
                jobtitle        : jQuery('#jobtitle').val(),
                email           : jQuery('#emailaddress').val(),
                facility        : jQuery('#facilitypracticename').val(),
                phonenumber     : jQuery('#phonenumber').val(),
            }

 


            jQuery.ajax({
                url: resensation.ajaxurl,
                type: 'post',
                data: registerdata,
                success: function(response) {
                    __ss_noform.push(['submit', null, 'e2342682-eed3-439c-a516-fb9f58997f9d']);
                    responseobj = jQuery.parseJSON(response);

                    console.log(responseobj);
                    jQuery('#message').text(responseobj['message']);

                    jQuery('#firstname').val('');
                    jQuery('#lastname').val('');
                    jQuery('#jobtitle').val('');
                    jQuery('#emailaddress').val('');
                    jQuery('#facilitypracticename').val('');
                    jQuery('#phonenumber').val('');

                    if( '' != responseobj['redirecturl'] ){
                        
                        window.location.href = responseobj['redirecturl'];
                    }

                }
            });

        });

        /*End Register Button*/


        /*Login Button */
        jQuery('#loginbutton').click(function(event) {
            event.preventDefault();

            var logindata = {
                action  : 'signin_physician',
                username: jQuery('#userlogin').val(),
                password: jQuery('#userpassword').val(),

            }


            jQuery.ajax({
                url : frontendajax.ajaxurl,
                type: 'post',
                data: logindata,
                success: function(response) {
                    __ss_noform.push(['submit', null, 'b09199f4-fa36-4faa-9a14-a183f83a44e8']);
                    
                    
                    responseobj = jQuery.parseJSON(response);

                    console.log(responseobj);
                    jQuery('#message').text(responseobj['message']);

                    if (responseobj['flag'] == 'success') {

                        window.location.href = responseobj['redirecturl'];
                    }

                }
            });
        });
        /*End Login Button */



        /*Forget Password*/
        jQuery('#forgetpasswprd').hide();

        jQuery('.forgetpassword').click(function(){
            jQuery('#login545').hide();
            jQuery('#forgetpasswprd').show();
        });

        jQuery('.loginaccount').click(function(){
            jQuery('#login545').show();
            jQuery('#forgetpasswprd').hide();
        });

        jQuery('.registeraccount').click(function(){
            jQuery('#register').css('display','block');
            jQuery('.registerli').addClass('active');

            jQuery('#login').css('display','none');
            jQuery('.loginli').removeClass('active');
        });

       
        jQuery('#forgetpassword').click(function(event){
             event.preventDefault();

            var forgetdata = {
                action: 'forgetpassword_physician',
                email : jQuery('#useremailforgotpass').val(),
            }

            jQuery.ajax({
                url : resensation.ajaxurl,
                type: 'post',
                data: forgetdata,
                success: function(response) {

                    responseobj = jQuery.parseJSON(response);
                    console.log(responseobj);
                    jQuery('#message').text(responseobj['message']);
                }
            });

        });

        /*End Forget Password*/
});

/*jquery equalheight*/

equalheight = function (a) {
    var e, b = 0,
        c = 0,
        d = new Array;
    jQuery(a).each(function () {
        if (e = jQuery(this), jQuery(e).height("auto"), topPostion = e.position().top, c != topPostion) {
            for (currentDiv = 0; currentDiv < d.length; currentDiv++) d[currentDiv].height(b);
            d.length = 0, c = topPostion, b = e.height(), d.push(e)
        } else d.push(e), b = b < e.height() ? e.height() : b;
        for (currentDiv = 0; currentDiv < d.length; currentDiv++) d[currentDiv].height(b)
    })
}, jQuery(window).on("load resize ready", function () {
    equalheight(".blog-view-section .colmn-box .box-text");
});

jQuery('.toggle_form_btn a').click(function (e) {
    e.preventDefault();
    jQuery(this).parent().addClass('active').siblings().removeClass('active');
    var GetForm = jQuery(this).attr('href');
    jQuery(GetForm).fadeIn().siblings().fadeOut();
});
jQuery('.toggle_form_btn li:first').addClass('active');
jQuery('.form-groups:first').fadeIn();

jQuery('.physicians-tabs li:first').addClass('active');
jQuery('.physicianTab-section .tab-box:first').addClass('active');
jQuery('.physicians-tabs li a').click(function(e){
    e.preventDefault();
    var getTab = jQuery(this).attr('href');
    jQuery(getTab).addClass('active').siblings().removeClass('active');
    jQuery(this).parent().addClass('active').siblings().removeClass('active');
});

jQuery('.brand-link li a').click(function(e){
    e.preventDefault();
    var getOffset = jQuery(this).attr('href');
    jQuery('html').animate({scrollTop: jQuery(getOffset).offset().top}); 
})

jQuery('.people-card .btn-grp li .btn-blue').click(function(e){
    e.preventDefault();
    var getOffset = jQuery(this).attr('href');
    jQuery('html').animate({scrollTop: jQuery(getOffset).offset().top}); 
})