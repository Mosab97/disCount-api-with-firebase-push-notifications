/* ==============================================
    Website Preloader
 =============================================== */

$(window).on("load",function() {
    'use strict';
    // Animate loader off screen
    $(".se-pre-con").fadeOut( "slow" );

});

$(document).ready(function(){
    /* ==============================================
     Its A Custom Scroll
     =============================================== */

    'use strict';
    $('html').niceScroll();

    /* ==============================================
     Converting Graph SVG Images to Inline SVG
     =============================================== */
    'use strict';
    $( ".svg" ).svgToInline();
});


/* ==============================================
 Navigation Fixed on Scroll
 =============================================== */

$(window).scroll(function(){
    'use strict';
    var scroll = $(window).scrollTop();
    if (scroll >= 10)
    {
        $('nav.navbar-default').addClass('nav-fixed');
    }
    else {
        $('nav.navbar-default').removeClass('nav-fixed');
    }
});


/* ==============================================
 Navigation Click & Active on Reaching Section
 =============================================== */

'use strict';
	var sections = $('section')
	    , nav = $('nav')
	    , nav_height = nav.outerHeight();
	
	$(window).on('scroll', function () {
	    'use strict';
	    var cur_pos = $(this).scrollTop();
	
	    sections.each(function() {
	        var top = $(this).offset().top - nav_height - 90,
	            bottom = top + $(this).outerHeight();
	
	        if (cur_pos >= top && cur_pos <= bottom) {
	            nav.find('a').removeClass('active');
	            sections.removeClass('active');
	
	            $(this).addClass('active');
	            nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
	        }
	    });
	});

	var navlia = $('.nav li a');
	$(navlia).on('click',function() {
	    'use strict';
	    var hreff = $(this).attr('href');
	    $('html, body').animate({
	        scrollTop: $(hreff).offset().top-40
	    }, 800);
	
	    if($(window).width() <= 1200){
	        'use strict';
	        $('.navbar-toggle').trigger('click');
	    }
	});

	$('.logoo').on('click',function() {
	    'use strict';
	    var hreff = $(this).attr('href');
	    $(navlia).removeClass('active');
	    $('.nav li:first-child a').addClass('active');
	    $('html, body').animate({
	        scrollTop: $(hreff).offset().top-40
	    }, 800);
	});


/* ==============================================
 Youtube Video Popups Function Calling
 =============================================== */

	'use strict';
	jQuery("a.videoPopup").YouTubePopUp();