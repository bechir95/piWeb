/*! Customized Jquery from Punit Korat.  punit@templatetrip.com  : www.templatetrip.com
Authors & copyright (c) 2016: TemplateTrip - Webzeel Services(addonScript). */
/*! NOTE: This Javascript is licensed under two options: a commercial license, a commercial OEM license and Copyright by Webzeel Services - For use Only with TemplateTrip Themes for our Customers*/

$(document).ready(function() {
						   
		var p = $(".popup__overlay");
			
		$("#popup__toggle").click(function() {
		  p.css("display", "block");
		});
		p.click(function(event) {
		  e = event || window.event;
		  if (e.target == this) {
			$(p).css("display", "none");
		  }
		});
		$(".popup__close").click(function() {
		  p.css("display", "none");
		});
		
		//video popup
		function toggleVideo(state) {
		  // if state == 'hide', hide. Else: show video
		  var div = document.getElementById("popupVid");
		  var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
		  //div.style.display = state == 'hide' ? 'none' : '';
		  func = state == "hide" ? "pauseVideo" : "playVideo";
		  iframe.postMessage(
			'{"event":"command","func":"' + func + '","args":""}',
			"*"
		  );
		}
		
		$("#popup__toggle").click(function() {
		  p.css("visibility", "visible").css("opacity", "1");
		});
		
		p.click(function(event) {
		  e = event || window.event;
		  if (e.target == this) {
			$(p)
			  .css("visibility", "hidden")
			  .css("opacity", "0");
			toggleVideo("hide");
		  }
		});
		
		$(".popup__close").click(function() {
		  p.css("visibility", "hidden").css("opacity", "0");
		  toggleVideo("hide");
		});
						   
						   
		$(".ttsearch_button").click(function() {
			$(".right-block").toggleClass("active");
			$('.ttsearchtoggle').parent().toggleClass('active');
			$('.ttsearchtoggle').toggle('fast', function() {
			});
			$('.ttsearchtoggle .input-lg').attr('autofocus', 'autofocus').focus();
			$(".account-link-toggle").slideUp("slow");
			$(".header-cart-toggle").slideUp("slow");
			$(".currency-toggle").slideUp("slow");
			$(".language-toggle").slideUp("slow");
	 	});				   
						   
	
		$(".user-info a.dropdown-toggle").click(function(){
			$(".right-block").toggleClass("active");
			$( ".account-link-toggle" ).slideToggle( "2000" );
		   	$(".header-cart-toggle").slideUp("slow");
			$('.ttsearchtoggle').parent().removeClass("active");
       		$('.ttsearchtoggle').hide('fast');
	  	});
			
		$("#cart button.dropdown-toggle").click(function(){
			$( ".header-cart-toggle" ).slideToggle( "2000" );														 
		   	$(".account-link-toggle").slideUp("slow");
			$(".language-toggle").slideUp("slow");
			$(".currency-toggle").slideUp("slow");
			$('.ttsearchtoggle').parent().removeClass("active");
			$('.ttsearchtoggle').hide('fast');
			$('.ttsearchtoggle').parent().removeClass("active");
       		$('.ttsearchtoggle').hide('fast');
   	    });
		
	$(".option-filter .list-group-items a").click(function() {
		$(this).toggleClass('collapsed').next('.list-group-item').slideToggle();
	});

	$( "#content" ).addClass( "left-column" );
	
	$("ul.breadcrumb li:nth-last-child(1) a").addClass('last-breadcrumb').removeAttr('href');

	$("#column-left .products-list .product-thumb, #column-right .products-list .product-thumb").unwrap();
	$("#column-left .list-products .product-thumb, #column-right .list-products .product-thumb").unwrap();

	$("#content > h1, .account-wishlist #content > h2, .account-address #content > h2, .account-download #content > h2").first().addClass("page-title");
	
	$("#content > .page-title").wrap("<div class='page-title-wrapper'><div class='container'></div></div>");
	$(".page-title-wrapper .container").append($("ul.breadcrumb"));
	$(".page-title-wrapper").prependTo($(".header-content-title .parallex"));

	
	$('#column-left .product-thumb .image, #column-right .product-thumb .image').attr('class', 'image col-xs-4 col-sm-4 col-md-4');
	$('#column-left .product-thumb .thumb-description, #column-right .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-8 col-sm-8 col-md-8');

		$('#content .row > .product-list .product-thumb .image').attr('class', 'image col-xs-4 col-sm-4 col-md-4');
		$('#content .row > .product-list .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-8 col-sm-8 col-md-8');
		$('#content .row > .product-grid .product-thumb .image').attr('class', 'image col-xs-12');
		$('#content .row > .product-grid .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-12');

		$('select.form-control').wrap("<div class='select-wrapper'></div>");
		$('input[type="checkbox"]').wrap("<span class='checkbox-wrapper'></span>");
		$('input[type="checkbox"]').attr('class','checkboxid');
		$('input[type="radio"]').wrap("<span class='radio-wrapper'></span>");
		$('input[type="radio"]').attr('class','radioid');
		
		$('#column-left .products-list .btn-cart').removeAttr('data-original-title');
		
		$("#column-left .product-thumb > .image > .button-group, #column-right .product-thumb > .image > .button-group").each(function() {
			$(this).appendTo($(this).parent().parent().find(".thumb-description"));
		});
		
		$( "#ttcmspaymentlogo" ).appendTo( ".footer-container .container" );

		/*-------start go to top---------*/		
	$( "body" ).append( "<div class='backtotop-img'><div class='goToTop ttbox'></div></div>" );
	$( "body" ).append( "<div id='goToTop' title='Top' class='goToTop ttbox-img'></div>" );
	$("#goToTop").hide();
/*-------end go to top---------*/		
/*---------------------- Inputtype Js Start -----------------------------*/
$('.checkboxid').change(function(){
if($(this).is(":checked")) {
$(this).addClass("chkactive");
$(this).parent().addClass('active');
} else {
$(this).removeClass("chkactive");
$(this).parent().removeClass('active');
}
});

$(function() {
var $radioButtons = $('input[type="radio"]');
$radioButtons.click(function() {
$radioButtons.each(function() {
$(this).parent().toggleClass('active', this.checked);
});
});
});
/*---------------------- Inputtype Js End -----------------------------*/

/*------------- Slider -Loader Js Strat ---------------*/
$(window).load(function() 
{ 
$(".ttloading-bg").fadeOut("slow");
})
/*------------- Slider -Loader Js End ---------------*/
/* Slider Load Spinner */
$(window).load(function() { 
	$(".slideshow-panel .ttloading-bg").removeClass("ttloader");
});

/* --------------- Start Sticky-header JS ---------------*/	
function menuClass() {
	if($( window ).width() > 1199) {
		$( ".left-main-menu" ).addClass( "left-menu" );
	}
	else {
		$( ".left-main-menu" ).removeClass( "left-menu" );
	}
}
$(document).ready(function(){menuClass();});
$(window).resize(function() {menuClass();});

	function header() {	
	 if (jQuery(window).width() > 1199){
		 if (jQuery(this).scrollTop() > 500)
			{    
				jQuery('.full-header').addClass("fixed");
				 
			}else{
			 jQuery('.full-header').removeClass("fixed");
			}
		} else {
		  jQuery('.full-header').removeClass("fixed");
		  }
	}
	 
	$(document).ready(function(){header();});
	jQuery(window).resize(function() {header();});
	jQuery(window).scroll(function() {header();});
	
/* --------------- End Sticky-header JS ---------------*/

/* ----------- SmartBlog Js Start ----------- */
	 var ttblog = $("#ttsmartblog-carousel");
      ttblog.owlCarousel({
		 autoPlay : false,
     	 items :1, //10 items above 1000px browser width
     	 itemsDesktop : [1199,1], 
     	 itemsDesktopSmall : [991,1], 
     	 itemsTablet: [767,1], 
     	 itemsMobile : [480,1],
		 navigation: true,
		 pagination: false
      });

      // Custom Navigation Events

      $(".ttblog_next").click(function(){
        ttblog.trigger('owl.next');
      })
      $(".ttblog_prev").click(function(){
        ttblog.trigger('owl.prev');
      })
 /* ----------- SmartBlog Js End ----------- */
/*----------------- Testimonial Js Start ------------------------*/
	var tttestimonial = $("#tttestimonial-carousel");
    tttestimonial.owlCarousel({
        autoPlay: true,
        pagination: true,
        paginationNumbers: false,
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1200, 1],
        itemsDesktopSmall: [991, 1],
        itemsTablet: [767, 1],
        itemsMobile: [480, 1]
    });
/*----------------- Testimonial Js End ------------------------*/
/*-------------------------- Countdown js start ------------------------------ */
$('.tt-special-countdown .product-thumb').each(function(){
var $desc = jQuery(this).find('.thumb-description .progress');
var $qty = jQuery(this).find('#quantity');
var $pbar = jQuery(this).find('.progress-bar');
var $progress = $desc;
var $progressBar = $pbar;
var $quantity = $qty.html();
var currentWidth = parseInt($progressBar.css('width'));
var allowedWidth = parseInt($progress.css('width'));
var addedWidth = currentWidth + parseInt($quantity);
if (addedWidth > allowedWidth) {
addedWidth = allowedWidth;
}
var progress = (addedWidth / allowedWidth) * 100;
$progressBar.animate({width: progress + '%' }, 100);
});


$('#content .image-additional img').on('click',function(event) {
    var img_wrap = $(this).closest( ".product-thumb" );
    $(img_wrap).find('.special-image img').attr('src',$(event.target).data('image-large-src'));
    $('.selected').removeClass('selected');
    $(event.target).addClass('selected');
    $(img_wrap).find('.product-image img').prop('src', $(event.currentTarget).data('image-large-src'));
});

$('#content .tt-special-countdown .special-countdown.products-carousel').owlCarousel({
	items:1,
	itemsDesktop: [1200,1],
	itemsDesktopSmall: [991,1],
	itemsTablet: [767,1],
	itemsMobile: [480,1],
	navigation: true,
	autoPlay: false,
	pagination: false
});
$('#column-right .tt-special-countdown .special-countdown.products-carousel').owlCarousel({
	items:1,
	itemsDesktop: [1199,1],
	itemsDesktopSmall: [991,1],
	itemsTablet: [767,1],
	itemsMobile: [480,1],
	navigation: false,
	autoPlay: true,
	stopOnHover  : true,
	pagination: false
});
$('#column-left .tt-special-countdown .special-countdown.products-carousel').owlCarousel({
	items:1,
	itemsDesktop: [1199,1],
	itemsDesktopSmall: [991,1],
	itemsTablet: [767,1],
	itemsMobile: [480,1],
	navigation: false,
	autoPlay: true,
	stopOnHover  : true,
	pagination: false
});
$('#content .special-additional-images').owlCarousel({
	items: 2,
	itemsDesktop: [1200,2],
	itemsDesktopSmall: [991,2],
	itemsTablet: [767,3],
	itemsMobile: [480,2],
	autoPlay: true,
	stopOnHover  : true,
	navigation: false,
	pagination: false
});

// Custom Navigation Events
$(".additional-next").click(function(){
	$(".additional-images").trigger('owl.next');
})
$(".additional-prev").click(function(){
	$(".additional-images").trigger('owl.prev');
})
$(".additional-images-container .customNavigation").addClass('owl-navigation');

$("#column-left .tt-special-countdown .item-countdown, #column-right .tt-special-countdown .item-countdown").each(function() {
    $(this).insertAfter($(this).parent().parent().parent().find(".button-group"));
});
/*-------------------------- Countdown js End ------------------------------ */
/*-------------------------- latest js Start ------------------------------ */
var cat_feature = $(".category-feature.tt-carousel");
      cat_feature.owlCarousel({
     	 autoPlay : true,
		 pagination : false,
     	 items : 4, //10 items above 1000px browser width
     	 itemsDesktop : [1199,3], 
     	 itemsDesktopSmall : [991,3], 
     	 itemsTablet: [767,2],
     	 itemsMobile : [480,1] 
});

var relatedproduct = $(".related-carousel .related-items.products-carousel");
	relatedproduct.owlCarousel({
	items:4,
	itemsDesktop : [1199,3],
	itemsDesktopSmall : [991,3],
	itemsTablet: [767,2],
	itemsMobile : [480,1],
	navigation: true,
	pagination: false
});

/*-------------------------- latest js End ------------------------------ */

// Carousel Counter
	colsCarousel = $('#column-right, #column-left').length;
	if (colsCarousel == 2) {
		ci=3;
	} else if (colsCarousel == 1) {
		ci=3;
	} else {
		ci=4;
}
// product Carousel
$("#content .products-list .products-carousel").owlCarousel({
	items: ci,
	itemsDesktop : [1910,3], 
	itemsDesktopSmall : [1499,3],
	itemsTablet: [1199,3],
	itemsTabletSmall : [767,2],
	itemsMobile : [480,1],
	navigation: true,
	pagination: false
});

$(".customNavigation .next").click(function(){
	$(this).parent().parent().find(".products-carousel").trigger('owl.next');
})
$(".customNavigation .prev").click(function(){
	$(this).parent().parent().find(".products-carousel").trigger('owl.prev');
})
$(".products-list .customNavigation").addClass('owl-navigation');

/*-----------start menu toggle ------------*/

	$('.left-main-menu .TT-panel-heading').click(function() { 
		$('.left-main-menu .TT-panel-heading').toggleClass('active'); 
		$('.left-main-menu ul.dropmenu').slideToggle("2000"); 
	});  
	
/*-----------End menu toggle ------------*/
/* ------------ Start TemplateTrip Parallax JS ------------ */
	
	var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
	if(!isMobile) {
		if($(".parallex").length){  $(".parallex").sitManParallex({  invert: false });};    
		}else{
		$(".parallex").sitManParallex({  invert: true });
	}	
	
/* ------------ End TemplateTrip Parallax JS ------------ */

/* Go to Top JS START */
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 150) {
				$('.goToTop').fadeIn();
			} else {
				$('.goToTop').fadeOut();
			}
		});
	
		// scroll body to 0px on click
		$('.goToTop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1000);
			return false;
		});
	});
	/* Go to Top JS END */
	
	$(".product-list .product-thumb > .image > .button-group").each(function() {
		$(this).appendTo($(this).parent().parent().find(".thumb-description"));
	});
	
	$(".product-grid .product-thumb > .thumb-description > .button-group").each(function() {
		$(this).appendTo($(this).parent().parent().find(".image"));
	});
	

	/* Active class in Product List Grid START */
	$('#list-view').click(function() {
		$('#grid-view').removeClass('active');
		$('#list-view').addClass('active');
		$('#content .row > .product-list .product-thumb .image').attr('class', 'image col-xs-4 col-sm-4 col-md-4');
		$('#content .row > .product-list .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-8 col-sm-8 col-md-8');
		//$(".product-layout.product-list .product-thumb .button-group .btn-cart").removeAttr('data-original-title'); /* for remove tooltrip */
		$(".product-list .product-thumb > .image > .button-group").each(function() {
		$(this).appendTo($(this).parent().parent().find(".thumb-description"));
		});
	});
	$('#grid-view').click(function() {
		$('#list-view').removeClass('active');
		$('#grid-view').addClass('active');
		$('#content .row > .product-grid .product-thumb .image').attr('class', 'image col-xs-12');
		$('#content .row > .product-grid .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-12');
		//$(".product-layout.product-grid .product-thumb .button-group .btn-cart").attr('data-original-title','Add to cart');/* for add tooltrip */
		$(".product-grid .product-thumb > .thumb-description > .button-group").each(function() {
		$(this).appendTo($(this).parent().parent().find(".image"));
		});
	});
	if (localStorage.getItem('display') == 'list') {
		$('#list-view').addClass('active');
	} else {
		$('#grid-view').addClass('active');
	}
	/* Active class in Product List Grid END */

});
// Documnet.ready() over....

/*****************start animation script*******************/
function hb_animated_contents() {
	$(".hb-animate-element:in-viewport").each(function (i) {
	var $this = $(this);
	if (!$this.hasClass('hb-in-viewport')) {
	setTimeout(function () {
	$this.addClass('hb-in-viewport');
	}, 180 * i);
	}
	});
	}
	$(window).scroll(function () {
	hb_animated_contents();
	});
	$(window).load(function () {
	hb_animated_contents();
});
/*****************end animation script*******************/

/* FilterBox - Responsive Content*/
function optionFilter(){
	if ($(window).width() <= 991) {
		$('#column-left .option-filter-box').appendTo('.row #content .category-description');
		$('#column-right .option-filter-box').appendTo('.row #content .category-description');
	} else {
		$('.row #content .category-description .option-filter-box').appendTo('#column-left .option-filter');
		$('.row #content .category-description .option-filter-box').appendTo('#column-right .option-filter');
	}
}
$(document).ready(function(){ optionFilter(); });
$(window).resize(function(){ optionFilter(); });
/*category filter js*/

function footerToggle() {
	
	if($( window ).width() < 992) {
		
		$("footer .footer-column h5").addClass( "toggle" );
		$("footer .footer-column ul").css( 'display', 'none' );
		$("footer .footer-column.active ul").css( 'display', 'block' );
		$("footer .footer-column h5.toggle").unbind("click");
		$("footer .footer-column h5.toggle").click(function() {
			$(this).parent().toggleClass('active').find('ul.list-unstyled').slideToggle( "fast" );
		});
				
		$("#column-left .panel-heading").addClass( "toggle" );
		$("#column-left .list-group").css( 'display', 'none' );
		$("#column-left .panel-default.active .list-group").css( 'display', 'block' );
		$("#column-left .panel-heading.toggle").unbind("click");
		$("#column-left .panel-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.list-group').slideToggle( "fast" );
		});
		
		$("#column-left .box-heading").addClass( "toggle" );
		$("#column-left .products-carousel").css( 'display', 'none' );
		$("#column-left .products-list.active .products-carousel").css( 'display', 'block' );
		$("#column-left .box-heading.toggle").unbind("click");
		$("#column-left .box-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.products-carousel').slideToggle( "fast" );
		});
		
		$("#column-right .panel-heading").addClass( "toggle" );
		$("#column-right .list-group").css( 'display', 'none' );
		$("#column-right .panel-default.active .list-group").css( 'display', 'block' );
		$("#column-right .panel-heading.toggle").unbind("click");
		$("#column-right .panel-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.list-group').slideToggle( "fast" );
		});
		
		$("#column-right .box-heading").addClass( "toggle" );
		$("#column-right .products-carousel").css( 'display', 'none' );
		$("#column-right .products-list.active .products-carousel").css( 'display', 'block' );
		$("#column-right .box-heading.toggle").unbind("click");
		$("#column-right .box-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.products-carousel').slideToggle( "fast" );
		});
		
	} else {
		
		$("footer .footer-column h5.toggle").unbind("click");
		$("footer .footer-column h5").removeClass('toggle');
		$("footer .footer-column ul.list-unstyled").css('display', 'block');
		
		$("#column-left .panel-heading").unbind("click");
		$("#column-left .panel-heading").removeClass( "toggle" );
		$("#column-left .list-group").css( 'display', 'block' );

		$("#column-left .box-heading").unbind("click");
		$("#column-left .box-heading").removeClass( "toggle" );
		$("#column-left .products-carousel").css( 'display', 'block' );
		
		$("#column-right .panel-heading").unbind("click");
		$("#column-right .panel-heading").removeClass( "toggle" );
		$("#column-right .list-group").css( 'display', 'block' );

		$("#column-right .box-heading").unbind("click");
		$("#column-right .box-heading").removeClass( "toggle" );
		$("#column-right .products-carousel").css( 'display', 'block' );
		
	}
}

$(document).ready(function() {footerToggle();});
$(window).resize(function() {footerToggle();});

/* Category List - Tree View */
function categoryListTreeView() {
	$(".category-treeview li.category-li").find("ul").parent().prepend("<div class='list-tree'></div>").find("ul").css('display','none');

	$(".category-treeview li.category-li.category-active").find("ul").css('display','block');
	$(".category-treeview li.category-li.category-active").toggleClass('active');
}
$(document).ready(function() {categoryListTreeView();});


/* Category List - TreeView Toggle */
function categoryListTreeViewToggle() {
	$(".category-treeview li.category-li .list-tree").click(function() {
		$(this).parent().toggleClass('active').find('ul').slideToggle();
	});
}
$(document).ready(function() {categoryListTreeViewToggle();});
$(document).ready(function(){ menuMore(); });
function menuToggle() {
	if($( window ).width() < 992) {
		$(".main-category-list .menu-category ul.dropmenu").css('display', 'none');
		
		$(".main-category-list ul.dropmenu li.dropdown > i").remove();
		$(".main-category-list ul.dropmenu .dropdown-menu ul li.dropdown-inner > i").remove();

		$(".main-category-list ul.dropmenu > li.dropdown > a").after("<i class='fa fa-angle-down'></i>");
		//$(".menu-category > li.dropdown .dropdown-inner ul > li.dropdown a.single-dropdown").after("<i class='fa fa-angle-down'></i>");
		
		$(".main-category-list ul.dropmenu > li.dropdown > span").after("<i class='fa fa-angle-down'></i>");
		
		$(".main-category-list .TT-panel-heading").unbind("click");
		$('.main-category-list .TT-panel-heading').click(function(){
			$(this).parent().toggleClass('TTactive').find('ul.dropmenu').slideToggle( "fast" );
		});
		
		$(".main-category-list ul.dropmenu > li.dropdown > i").unbind("click");
		$(".main-category-list ul.dropmenu > li.dropdown > i").click(function() {
			$(this).parent().toggleClass("active").find("ul").first().slideToggle();
		});
		
		$(".menu-category > li.dropdown .dropdown-inner ul > li.dropdown > i").unbind("click");
		$(".menu-category > li.dropdown .dropdown-inner ul > li.dropdown > i").click(function() {
			$(this).parent().toggleClass("active").find(".dropdown-menu").slideToggle();
		});
	}
	else {
		$(".menu-category > li.dropdown .dropdown-inner ul > li.dropdown > i").unbind("click");
		$(".menu-category > li.dropdown .dropdown-inner ul > li.dropdown > i").unbind("click");
		$(".main-category-list").removeClass('ttactive');
		$(".main-category-list .menu-category ul.dropmenu").css('display', 'block');
		$(".menu-category ul.dropmenu li.dropdown > i").remove();
		$(".menu-category > li.dropdown .dropdown-inner ul > li.dropdown > i").remove();
		$(".main-category-list ul.dropmenu > li.dropdown > i").remove();
	}
}
$(document).ready(function() {menuToggle();});
$( window ).resize(function(){menuToggle();});

/* Main Menu - MORE items */
function menuMore(){
	//$(function($){
		var max_items = 3;
		var liItems = $('.menu-category > ul.dropmenu > li');
		var remainItems = liItems.slice(max_items, liItems.length);
		remainItems.wrapAll('<li class="dropdown more-menu"><div class="dropdown-menu"><div class="dropdown-inner"><ul class="list-unstyled childs_1 single-dropdown-menu"></ul></div></div></li>');
		$('.more-menu').prepend('<span>More</span>');
	//});
}
/* Animate effect on Review Links - Product Page */
$(".product-total-review, .product-write-review").click(function() {
    $('html, body').animate({ scrollTop: $(".product-tabs").offset().top }, 1000);
});

function responsivecolumn()
{
	if ($(window).width() <= 991)
	{
		$('#page > .container > .row > #column-left').appendTo('#page > .container > .row');
		$('#page > .container > .row > #column-right').appendTo('#page > .container > .row');
	}
	else if($(window).width() >= 992)
	{
		$('#page > .container > .row > #column-left').prependTo('#page > .container > .row');
		$('#page > .container > .row > #column-right').appendTo('#page > .container > .row');
	}
}
$(window).resize(function(){responsivecolumn();});
$(window).ready(function(){responsivecolumn();});
/*category filter js end*/

