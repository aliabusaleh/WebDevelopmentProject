$(window).load(function(){$("#loader").fadeOut("slow")});(function(){"use strict";new WOW().init();var Scripts={initialized:!1,initialize:function(){if(this.initialized)return;this.initialized=!0;this.build()},build:function(){$("input, textarea").placeholder();this.dropdownhover();this.carttoggle();this.initOwlCarousel();this.isotopeFilter();this.initBxSlider();this.goToTop();this.fixedHeader();this.rangeSlider();this.productCounter();this.mbileMenu()},dropdownhover:function(options){if(992<$(window).width()){$(".navbar-main-slide").on("mouseenter",".navbar-nav > .dropdown",function(){"use strict";$(this).addClass("open")}).on("mouseleave",".navbar-nav > .dropdown",function(){"use strict";$(this).removeClass("open")})}},carttoggle:function(options){$(".header-middle").on("mouseenter",".header-cart",function(){"use strict";$(".header-cart_product").addClass("open")}).on("mouseleave",".header-cart",function(){"use strict";$(".header-cart_product").removeClass("open")})},initOwlCarousel:function(options){$(".enable-owl-carousel").each(function(i){var $owl=$(this),navigationData=$owl.data("navigation"),paginationData=$owl.data("pagination"),singleItemData=$owl.data("single-item"),autoPlayData=$owl.data("auto-play"),transitionStyleData=$owl.data("transition-style"),mainSliderData=$owl.data("main-text-animation"),afterInitDelay=$owl.data("after-init-delay"),stopOnHoverData=$owl.data("stop-on-hover"),min600=$owl.data("min600"),min800=$owl.data("min800"),min1200=$owl.data("min1200");$owl.owlCarousel({navigation:navigationData,pagination:paginationData,singleItem:singleItemData,autoPlay:autoPlayData,transitionStyle:transitionStyleData,stopOnHover:stopOnHoverData,navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],itemsCustom:[[0,1],[600,min600],[800,min800],[1200,min1200]],afterInit:function(elem){if(mainSliderData){setTimeout(function(){$(".main-slider_zoomIn").css("visibility","visible").removeClass("zoomIn").addClass("zoomIn");$(".main-slider_fadeInLeft").css("visibility","visible").removeClass("fadeInLeft").addClass("fadeInLeft");$(".main-slider_fadeInLeftBig").css("visibility","visible").removeClass("fadeInLeftBig").addClass("fadeInLeftBig");$(".main-slider_fadeInRightBig").css("visibility","visible").removeClass("fadeInRightBig").addClass("fadeInRightBig")},afterInitDelay)}},beforeMove:function(elem){if(mainSliderData){$(".main-slider_zoomIn").css("visibility","hidden").removeClass("zoomIn");$(".main-slider_slideInUp").css("visibility","hidden").removeClass("slideInUp");$(".main-slider_fadeInLeft").css("visibility","hidden").removeClass("fadeInLeft");$(".main-slider_fadeInRight").css("visibility","hidden").removeClass("fadeInRight");$(".main-slider_fadeInLeftBig").css("visibility","hidden").removeClass("fadeInLeftBig");$(".main-slider_fadeInRightBig").css("visibility","hidden").removeClass("fadeInRightBig")}},afterMove:sliderContentAnimate,afterUpdate:sliderContentAnimate})});function sliderContentAnimate(elem){var $elem=elem,afterMoveDelay=$elem.data("after-move-delay"),mainSliderData=$elem.data("main-text-animation");if(mainSliderData){setTimeout(function(){$(".main-slider_zoomIn").css("visibility","visible").addClass("zoomIn");$(".main-slider_slideInUp").css("visibility","visible").addClass("slideInUp");$(".main-slider_fadeInLeft").css("visibility","visible").addClass("fadeInLeft");$(".main-slider_fadeInRight").css("visibility","visible").addClass("fadeInRight");$(".main-slider_fadeInLeftBig").css("visibility","visible").addClass("fadeInLeftBig");$(".main-slider_fadeInRightBig").css("visibility","visible").addClass("fadeInRightBig")},afterMoveDelay)}}},isotopeFilter:function(options){var $container=$(".isotope-filter");$container.imagesLoaded(function(){$container.isotope({filter:".newproducts",itemSelector:".isotope-item"})});$("#filter").on("click","a",function(){$("#filter  a").removeClass("current");$(this).addClass("current");var selector=$(this).attr("data-filter");$container.isotope({filter:selector});return!1})},initBxSlider:function(options){$(".bxslider").each(function(i){var sliderMode=$(this).data("mode"),slideMargin=$(this).data("slide-margin"),minSlides=$(this).data("min-slides"),moveSlides=$(this).data("move-slides"),sliderPager=$(this).data("pager"),sliderPagerCustom=$(this).data("pager-custom"),sliderControls=$(this).data("controls");$(this).bxSlider({mode:sliderMode,slideMargin:slideMargin,minSlides:minSlides,moveSlides:moveSlides,pager:sliderPager,pagerCustom:sliderPagerCustom,controls:sliderControls,prevText:"<i class=\"fa fa-angle-left\"></i>",nextText:"<i class=\"fa fa-angle-right\"></i>"})})},goToTop:function(options){$("#footer").on("click",".goToTop",function(e){e.preventDefault();$("html,body").animate({scrollTop:0},"slow")});$(window).on("scroll",function(){var fromTop=$(this).scrollTop(),display="none";if(650<fromTop){display="block"}$("#scrollTop").css({display:display})})},fixedHeader:function(options){var topOffset=$(window).scrollTop();if(0<topOffset){$("body").addClass("fixed-header")}$(window).on("scroll",function(){var fromTop=$(this).scrollTop();if(0<fromTop){$("body").addClass("fixed-header")}else{$("body").removeClass("fixed-header")}})},rangeSlider:function(options){$(".slider-range").each(function(i){var minAmount=$(this).data("min"),minDefaultAmount=$(this).data("default-min"),maxAmount=$(this).data("max"),maxDefaultAmount=$(this).data("default-max"),rangeData=$(this).data("range"),valueContainerId=$(this).data("value-container-id");$(this).slider({range:rangeData,min:minAmount,max:maxAmount,values:[minDefaultAmount,maxDefaultAmount],slide:function(event,ui){$("#"+valueContainerId).val("$"+ui.values[0]+" - $"+ui.values[1])}});$("#"+valueContainerId).val("$"+$(this).slider("values",0)+" - $"+$(this).slider("values",1))})},productCounter:function(options){$(".product-counter").on("click",".productCounter",function(e){e.preventDefault();var counterStep=parseInt($(this).data("counter-step"),10),counterType=$(this).data("counter-type"),counterField=$(this).data("counter-field"),counterAmount=parseInt($(counterField).val(),10);if(!isNaN(counterAmount)){if("add"==counterType){counterAmount=counterAmount+counterStep}else if("minus"==counterType){counterAmount=counterAmount-counterStep}if(0>counterAmount){counterAmount=0}$(counterField).val(counterAmount)}})},mbileMenu:function(options){$(".menu-trigger").on("click",function(e){$("#icon-menu").toggleClass("mbile-nav")})}};Scripts.initialize()})();