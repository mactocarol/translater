(function($) {
	"use strict";
	//Accordion js
	$(".panel_heading a").on("click", function(e){
		e.preventDefault();
	});
	$(".active_data").show();
    $('.panel_heading').click(function (e){
		$(".panel_heading").removeClass("active_head");
		if($(this).next('.panel_content').css('display') != 'block'){
			$('.active_data').removeClass('active_data').slideUp(500);
			$(this).next('.panel_content').addClass('active_data').slideDown(500);
			$(this).addClass("active_head");
		} else {
			$('.active_data').removeClass('active_data').slideUp(500);
		}
	});
	//tabs Menu
	$('.tab_menu .tab_link').on('click', function(){
		$(".tab_content").removeClass("active");
		var tab_data = $(this).attr("data-tab");
		$('.tab_menu .tab_link').removeClass("active");
		$(this).addClass("active");
		$("#"+tab_data).addClass("active");
	});
	//Responsive Menu in mobile js
	$('.nav_toggle').on('click', function(){
		$(".navigation").toggleClass("menu_open");
		$(".navigation").slideToggle(300);
	});

	//Responsive Mobile Menu
	if ($(window).width () < 991){
		$(".navigation > ul > li> ul").parents("li").addClass("dropdown_toggle");
		$(".navigation > ul > li> ul > li > ul").parents("li").addClass("dropdown_toggle");
		$(".dropdown_toggle").append("<span class='caret_down'><i class='fa fa-angle-down'></i></span>");
		$(".navigation ul li").children(".caret_down").on("click",function(){
			$(this).toggleClass("caret_up");
			$(this).prev("ul").slideToggle();
			
			$(".caret_down").children("i").attr("class","fa fa-angle-down");
			$(".caret_down.caret_up").children("i").attr("class","fa fa-angle-up");
		});
	}
	else {
		
	}
	//Sidebar toggle js
	$('.sidebar_toggle').on('click', function(){
		$(".transl_sidebar").slideToggle(300);
	});
	//Datepicker
	if($(".calendar_dv").length > 0){
		$( ".calendar_dv" ).datepicker({
		  dateFormat: "dd-mm-yy",
		  firstDay: 1,
		});
	}
	//Datepicker
	if($(".datepicker").length > 0){
		$( ".datepicker" ).datepicker({
		  dateFormat: "dd-mm-yy",
		  minDate:0
		});
	}
	//Datepicker
	if($(".calendar_input").length > 0){
		$( ".calendar_input" ).datepicker({
		  dateFormat: "dd-mm-yy",
		});
	}
	//Timepicker
	if($(".time_picker").length > 0){
		$('.time_picker').timepicker({
		  timeFormat: 'h:mm: TT',
		  ampm: true,
		  stepHour: 1,
		  stepMinute: 5,
		});
	}

	//bootsrape selectpicker
    if ($(".selectpicker").length > 0) {
      $('.selectpicker').selectpicker();
    }
	$(".dropdown_btn").on('click',function(){
		$(this).next(".dropdown_menu").slideToggle(300);
		$(".dropdown_btn").not(this).next().slideUp("slow");
	});
	//home slider
	if ($(".home_slider").length > 0) {
		$(".home_slider").owlCarousel({
			mode:"fade",
			singleItem:true,
			items:1,
			loop:true,
			margin:0,
			autoplay:false,
			autoplayTimeout:3000,
			autoplaySpeed:1500,
			smartSpeed:1500,
			dots:true,
			nav:false,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut'
		});
	}
	//blog carousel
	if ($(".team_carousel").length > 0) {
		$(".team_carousel").owlCarousel({
			mode:"fade",
			items:4,
			loop:true,
			margin:15,
			autoplay:false,
			autoplayTimeout:3000,
			autoplaySpeed:1500,
			smartSpeed:1000,
			dots:true,
			nav:false,
			responsive:{
				// breakpoint from 0 up
				0 : {
				   items:1
				},
				500 : {
				   items:2
				},
				// breakpoint from 768 up
				768 : {
					items:3
				},
				// breakpoint from 992 up
				992 : {
					items:3
				},
				// breakpoint from 1199 up
				1199 : {
					items:4
				}
			}
		});
	}
	//popup gallery
	$('.popup_gallery').magnificPopup({
		delegate: '.gallery_items',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-with-zoom',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			}
		}
	});
	//Price range slider
	$( ".price_range" ).slider({
		range: true,
		min: 0,
		max: 1000,
		values: [ 150, 650 ],
		slide: function( event, ui ) {
		$( "#p_amount" ).val( "" + ui.values[ 0 ] + " -" + ui.values[ 1 ] );
		}
	});
	$( "#p_amount" ).val( "" + $( ".price_range" ).slider( "values", 0 ) +
	" -" + $( ".price_range" ).slider( "values", 1 ) );
	
	//window load js
	$(window).on('load', function() {
	  if ($(window).width () > 991){
		var win_h = $(this).outerHeight();
		var top_h = $(".top_header").outerHeight();
		var nav_h = $(".navigation_header").outerHeight();
		var slide_h = win_h -(top_h + nav_h);
		//slider full height
		$(".slide_item_bg").css('height',slide_h);
		//Sidebar full height
		$(".transl_sidebar").css('max-height',win_h);
	   }
	});
	//Jqeury counter
	$('.number_counter').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'linear',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});
})(jQuery);