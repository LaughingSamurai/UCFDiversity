/* Author:

*/

function jqUpdateSize(){   

    var minWidth = 992; 
    var currentWidth = $('body').width();
    if ( currentWidth > minWidth ) {
        $( '.sibling-nav ul' ).css ({'display':'block'});
		$( '.dropdown-menu' ).attr('style' ,'');
    }
  
}

function checkContactModalSize() {

    var currentWindowHeight = $( window ).height();

    if ( currentWindowHeight < 600 ) {

        $('#contact-modal-container, .respect-story').addClass( 'full-height-modal' );

    } else {

        $('#contact-modal-container, .respect-story').removeClass( 'full-height-modal' );

    }

}

$(document).ready(function(){

	jqUpdateSize();
	checkContactModalSize();

	$( window ).resize(function() {
	  jqUpdateSize();
	  checkContactModalSize();
	});

	// Fix Mobile Double Tap Issue
	$('.sibling-nav a').on('click touchend', function(e) {
      var el = $(this);
      var link = el.attr('href');
      window.location = link;
   });

	$( '.filter-dropdown-button' ).click(
	    function() {
	    	$( '.sibling-nav ul' ).slideToggle( 'slide' );
	    }
	);

	var browserWidth = $('body').width();

	if ( browserWidth > 768 ) {

		$( '.course-container' ).bind( 'click', function(e) {

			e.preventDefault();

			var coursecontainerID = $(this).attr('id');

			var coursecontainerheight = $("#courses-container").height();

			var newheight = $('#modal-'+coursecontainerID).height();

			var biggestHeight = "0";

			biggestHeight = newheight + 50;

			var biggestcoursecontainerheight = coursecontainerheight + 50;

			$('#modal-'+coursecontainerID).addClass( 'active-course' );

			if ( biggestHeight > coursecontainerheight ) {

				if ( $('html').hasClass('lt-ie9') ){

					$("#courses-container").height(biggestHeight);

				} else {

					$("#courses-container").animate({
					    height: biggestHeight
					}, 500, function() {
					    // Animation complete.
					});

				}

			} else {

				if ( $('html').hasClass('lt-ie9') ){

					$("#courses-container").height(biggestcoursecontainerheight);

				} else {

					$("#courses-container").animate({
					    height: biggestcoursecontainerheight
					}, 500, function() {
					    // Animation complete.
					});

				}
				$('#modal-'+coursecontainerID).height(coursecontainerheight);
			}

		});

		var courseContainerBaseHeight =  $("#courses-container").height();

		$( '.close-course' ).bind( 'touchstart click', function(e) {

			e.preventDefault();

			$(".course-modal-container").removeClass( 'active-course' );

		    $("#courses-container").css( 'height', 'auto' );

		});

		$( '.respect-story-tile' ).bind( 'click', function(e) {

			e.preventDefault();

			var respectstorycontainerID = $(this).attr('id');

			var respectstorycontainerheight = $("#respect-stories").height();

			var newheight = $('#respect-story-'+respectstorycontainerID).height();

			var biggestHeight = "0";

			biggestHeight = newheight + 50;

			var biggestrespectstorycontainerheight = respectstorycontainerheight;

			$('#respect-story-'+respectstorycontainerID).addClass( 'active-story' );

			if ( biggestHeight > respectstorycontainerheight ) {

				if ( $('html').hasClass('lt-ie9') ){

					$("#respect-stories").height(biggestHeight);

				} else {

					$("#respect-stories").animate({
					    height: biggestHeight
					}, 500, function() {
					    // Animation complete.
					});

				}

			} else {

				if ( $('html').hasClass('lt-ie9') ){

					$("#respect-stories").height(respectstorycontainerheight);

				} else {

					$("#respect-stories").animate({
					    height: respectstorycontainerheight
					}, 500, function() {
					    // Animation complete.
					});

				}
				$('#respect-story-'+respectstorycontainerID).height(respectstorycontainerheight);
			}

		});

		var respectstoryContainerBaseHeight =  $("#respect-stories").height();

		$( '.close-respect-story' ).bind( 'touchstart click', function(e) {

			e.preventDefault();

			$(".respect-story").removeClass( 'active-story' );

		    $("#respect-stories").css( 'height', 'auto' );

		});

	}

	$( window ).resize(function() {

			$("#courses-container").css( 'height', 'auto' );

		    var courseContainerResizeHeight = $("#courses-container").height();

		    var courseModalResizeHeight = $(".active-course .course-modal-container-inner").height();

		    var courseModalResizePaddedHeight = $(".active-course .course-modal-container-inner").height() + 60;

		    var courseModalResizeBigPaddedHeight = $(".active-course .course-modal-container-inner").height() + 60;

		    if ( courseModalResizeHeight > courseContainerResizeHeight ) {

		    	if ( $('html').hasClass('lt-ie9') ){

					$(".active-course").height(courseModalResizePaddedHeight);

					$("#courses-container").height(courseModalResizeBigPaddedHeight);

				} else {

					$(".active-course").animate({
					    height: courseModalResizePaddedHeight
					}, 500, function() {
					    // Animation complete.
					});

					$("#courses-container").animate({
					    height: courseModalResizeBigPaddedHeight
					}, 500, function() {
					    // Animation complete.
					});

				}

			} else {

				if ( $('html').hasClass('lt-ie9') ){

					$(".active-course, #courses-container").height(courseContainerResizeHeight);

				} else {

					$(".active-course, #courses-container").animate({
					    height: courseContainerResizeHeight
					}, 500, function() {
					    // Animation complete.
					});
					
				}

			}

			$("#respect-stories").css( 'height', 'auto' );

		    var respectStoriesContainerResizeHeight = $("#respect-stories").height();

		    var respectStoriesModalResizeHeight = $(".active-story").height();

		    var respectStoriesModalResizePaddedHeight = $(".active-story").height();

		    var respectStoriesModalResizeBigPaddedHeight = $(".active-story").height();

		    if ( respectStoriesModalResizeHeight > respectStoriesContainerResizeHeight ) {

		    	if ( $('html').hasClass('lt-ie9') ){

					$(".active-story").height(respectStoriesModalResizePaddedHeight);

					$("#respect-stories").height(respectStoriesModalResizeBigPaddedHeight);

				} else {

					$(".active-story").animate({
					    height: respectStoriesModalResizePaddedHeight
					}, 500, function() {
					    // Animation complete.
					});

					$("#respect-stories").animate({
					    height: respectStoriesModalResizeBigPaddedHeight
					}, 500, function() {
					    // Animation complete.
					});

				}

			} else {

				if ( $('html').hasClass('lt-ie9') ){

					$(".active-story, #respect-stories").height(respectStoriesContainerResizeHeight);

				} else {

					$(".active-story, #respect-stories").animate({
					    height: respectStoriesContainerResizeHeight
					}, 500, function() {
					    // Animation complete.
					});
					
				}

			}

	});

	$( '.push-menu-right-toggle' ).bind( 'touchstart click', function(e) {

		e.preventDefault();

	    $('body').toggleClass( 'pmr-open' );

	    $('.mask').toggleClass( 'mask-visible' );

	    $('.push-menu-right-toggle, html').toggleClass( 'push-menu-right-open' );

	});

	$( '.mask, .close-push-menu-right, .push-menu-right-toggle.push-menu-right-open' ).bind( 'touchstart click', function(e) {

		e.preventDefault();

		$('body').removeClass( 'pmr-open' );

		$('.mask').removeClass( 'mask-visible' );

		$('.push-menu-right-toggle, html').removeClass( 'push-menu-right-open' );

	});

	$('.popup').click(function(event) {
	    event.preventDefault();
	    window.open($(this).attr("href"), "popupWindow", "width=600,height=600,scrollbars=yes");
	});

	$('.course-container').click(function () {

        $( '.course-modal-container' ).fadeOut();

        var modalid = $(this).attr('id');

        $('#modal-'+modalid+'').fadeIn();

    });

    $('.close-course').click(function (e) {
        e.preventDefault();

        var modalid = $(this).attr('id');

        $(this).parent().fadeOut();

    });

    $('.respect-story-tile').click(function () {

        $( '.respect-story' ).fadeOut();

        var modalid = $(this).attr('id');

        $('#respect-story-'+modalid+'').fadeIn();

    });

    $('.close-respect-story').click(function (e) {
        e.preventDefault();

        $(this).parent().fadeOut();

    });

    $('.contact').click(function () {

        $( '#contact-modal-container' ).fadeIn();

    });

    $('.close-contact').click(function (e) {
        e.preventDefault();

        $( '#contact-modal-container' ).fadeOut();

    });

    $( "#menu-primary-navigation a.dropdown-toggle, #menu-primary-navigation-1 a.dropdown-toggle" ).bind( "touchstart click", function() {
	  var hrefvalue = $( this ).attr( "href" );

	  window.location.href = hrefvalue;
	});

    $('.dropdown').off( "mouseenter mouseleave" );
	$('#menu-primary-navigation-1 li.dropdown a.dropdown-toggle span.child-expand-button').unbind();

    var windowcheck = $('body').width();

	$( window ).resize(function() {

		$('.dropdown').off( "mouseenter mouseleave" );
		$('#menu-primary-navigation-1 li.dropdown a.dropdown-toggle span.child-expand-button').unbind();

		var windowcheck = $('body').width();

		if ( windowcheck > 768 ) {

		    var navTimers = [];
			$( ".dropdown" ).hover(
				function () {
					var id = jQuery.data( this );
					var $this = $( this );
					navTimers[id] = setTimeout( function() {
						$this.children( '.dropdown-menu' ).slideToggle();
						navTimers[id] = "";
					}, 300 );
				},
				function () {
					var id = jQuery.data( this );
					if ( navTimers[id] != "" ) {
						clearTimeout( navTimers[id] );
					} else {
						$( this ).children( ".dropdown-menu" ).toggle();
					}
				}
			);	

			$('.dropdown-toggle span.child-expand-button').text('+');

            $('.dropdown-toggle').removeClass('child-nav-open');

            $('.dropdown-toggle span.child-expand-button').removeClass('child-nav-open');

            $('.dropdown-menu').removeClass('display-child-nav');

            $('#menu-primary-navigation-1 li.dropdown a.dropdown-toggle span.child-expand-button').unbind();

		} else {

    		$('#menu-primary-navigation-1 li.dropdown a.dropdown-toggle span.child-expand-button').bind( 'touchstart click', function(e) {

		        e.preventDefault();

		        e.stopPropagation();

		        var currentText = $(this).text();

		        if ( currentText == '-' ) {

		            $(this).text('+');

		            $(this).parent().removeClass('child-nav-open');

		            $(this).removeClass('child-nav-open');

		            $(this).parent().siblings('.dropdown-menu').css( 'display', 'none' );

		        } else if ( currentText == '+' ) {

		            $(this).text('-');

		            $(this).parent().addClass('child-nav-open');

		            $(this).addClass('child-nav-open');

		            $(this).parent().siblings('.dropdown-menu').css( 'display', 'block' );
		            
		        }

		    });

		    $('.dropdown').off( "mouseenter mouseleave" );

		}

	});

	if ( windowcheck > 768 ) {

		    var navTimers = [];
			$( ".dropdown" ).hover(
				function () {
					var id = jQuery.data( this );
					var $this = $( this );
					navTimers[id] = setTimeout( function() {
						$this.children( '.dropdown-menu' ).slideToggle();
						navTimers[id] = "";
					}, 300 );
				},
				function () {
					var id = jQuery.data( this );
					if ( navTimers[id] != "" ) {
						clearTimeout( navTimers[id] );
					} else {
						$( this ).children( ".dropdown-menu" ).toggle();
					}
				}
			);	

			$('.dropdown-toggle span.child-expand-button').text('+');

            $('.dropdown-toggle').removeClass('child-nav-open');

            $('.dropdown-toggle span.child-expand-button').removeClass('child-nav-open');

            $('.dropdown-menu').removeClass('display-child-nav');

            $('#menu-primary-navigation-1 li.dropdown a.dropdown-toggle span.child-expand-button').unbind();

		} else {

    		$('#menu-primary-navigation-1 li.dropdown a.dropdown-toggle span.child-expand-button').bind( 'touchstart click', function(e) {

		        e.preventDefault();

		        e.stopPropagation();

		        var currentText = $(this).text();

		        if ( currentText == '-' ) {

		            $(this).text('+');

		            $(this).parent().removeClass('child-nav-open');

		            $(this).removeClass('child-nav-open');

		            $(this).parent().siblings('.dropdown-menu').css( 'display', 'none' );

		        } else if ( currentText == '+' ) {

		            $(this).text('-');

		            $(this).parent().addClass('child-nav-open');

		            $(this).addClass('child-nav-open');

		            $(this).parent().siblings('.dropdown-menu').css( 'display', 'block' );
		            
		        }

		    });

		    $('.dropdown').off( "mouseenter mouseleave" );

		}

});