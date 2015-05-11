/*

	Supersized - Fullscreen Slideshow jQuery Plugin
	Version : 3.2.7
	Site	: www.buildinternet.com/project/supersized
	
	Author	: Sam Dunn
	Company : One Mighty Roar (www.onemightyroar.com)
	License : MIT License / GPL License
	
*/

(function($){$(document).ready(function(){$('#main').append('<div id="supersized-loader"></div><ul id="supersized"></ul>');});$.supersized=function(options){var el='#supersized',base=this;base.$el=$(el);base.el=el;vars=$.supersized.vars;base.$el.data("supersized",base);api=base.$el.data('supersized');base.init=function(){$.supersized.vars=$.extend($.supersized.vars,$.supersized.themeVars);$.supersized.vars.options=$.extend({},$.supersized.defaultOptions,$.supersized.themeOptions,options);base.options=$.supersized.vars.options;base._build();};base._build=function(){var thisSlide=0,slideSet='',markers='',markerContent,thumbMarkers='',thumbImage;while(thisSlide<=base.options.slides.length-1){switch(base.options.slide_links){case'num':markerContent=thisSlide;break;case'name':markerContent=base.options.slides[thisSlide].title;break;case'blank':markerContent='';break;}
slideSet=slideSet+'<li class="slide-'+thisSlide+'"></li>';if(thisSlide==base.options.start_slide-1){if(base.options.slide_links)markers=markers+'<li class="slide-link-'+thisSlide+' current-slide"><a>'+markerContent+'</a></li>';if(base.options.thumb_links){base.options.slides[thisSlide].thumb?thumbImage=base.options.slides[thisSlide].thumb:thumbImage=base.options.slides[thisSlide].image;thumbMarkers=thumbMarkers+'<li class="thumb'+thisSlide+' current-thumb"><img src="'+thumbImage+'"/></li>';};}else{if(base.options.slide_links)markers=markers+'<li class="slide-link-'+thisSlide+'" ><a>'+markerContent+'</a></li>';if(base.options.thumb_links){base.options.slides[thisSlide].thumb?thumbImage=base.options.slides[thisSlide].thumb:thumbImage=base.options.slides[thisSlide].image;thumbMarkers=thumbMarkers+'<li class="thumb'+thisSlide+'"><img src="'+thumbImage+'"/></li>';};}
thisSlide++;}
if(base.options.slide_links)$(vars.slide_list).html(markers);if(base.options.thumb_links&&vars.thumb_tray.length){$(vars.thumb_tray).append('<ul id="'+vars.thumb_list.replace('#','')+'">'+thumbMarkers+'</ul>');}
$(base.el).append(slideSet);if(base.options.thumbnail_navigation){vars.current_slide-1<0?prevThumb=base.options.slides.length-1:prevThumb=vars.current_slide-1;$(vars.prev_thumb).show().html($("<img/>").attr("src",base.options.slides[prevThumb].image));vars.current_slide==base.options.slides.length-1?nextThumb=0:nextThumb=vars.current_slide+1;$(vars.next_thumb).show().html($("<img/>").attr("src",base.options.slides[nextThumb].image));}
base._start();};base._start=function(){if(base.options.start_slide){vars.current_slide=base.options.start_slide-1;}else{vars.current_slide=Math.floor(Math.random()*base.options.slides.length);}
var linkTarget=base.options.new_window?' target="_blank"':'';if(base.options.performance==3){base.$el.addClass('speed');}else if((base.options.performance==1)||(base.options.performance==2)){base.$el.addClass('quality');}
if(base.options.random){arr=base.options.slides;for(var j,x,i=arr.length;i;j=parseInt(Math.random()*i),x=arr[--i],arr[i]=arr[j],arr[j]=x);base.options.slides=arr;}
if(base.options.slides.length>1){if(base.options.slides.length>2){vars.current_slide-1<0?loadPrev=base.options.slides.length-1:loadPrev=vars.current_slide-1;var imageLink=(base.options.slides[loadPrev].url)?"href='"+base.options.slides[loadPrev].url+"'":"";var imgPrev=$('<img src="'+base.options.slides[loadPrev].image+'"/>');var slidePrev=base.el+' li:eq('+loadPrev+')';imgPrev.appendTo(slidePrev).wrap('<a '+imageLink+linkTarget+'></a>').parent().parent().addClass('image-loading prevslide');imgPrev.load(function(){$(this).data('origWidth',$(this).width()).data('origHeight',$(this).height());base.resizeNow();});}}else{base.options.slideshow=0;}
imageLink=(api.getField('url'))?"href='"+api.getField('url')+"'":"";var img=$('<img src="'+api.getField('image')+'"/>');var slideCurrent=base.el+' li:eq('+vars.current_slide+')';img.appendTo(slideCurrent).wrap('<a '+imageLink+linkTarget+'></a>').parent().parent().addClass('image-loading activeslide');img.load(function(){base._origDim($(this));base.resizeNow();base.launch();if(typeof theme!='undefined'&&typeof theme._init=="function")theme._init();});if(base.options.slides.length>1){vars.current_slide==base.options.slides.length-1?loadNext=0:loadNext=vars.current_slide+1;imageLink=(base.options.slides[loadNext].url)?"href='"+base.options.slides[loadNext].url+"'":"";var imgNext=$('<img src="'+base.options.slides[loadNext].image+'"/>');var slideNext=base.el+' li:eq('+loadNext+')';imgNext.appendTo(slideNext).wrap('<a '+imageLink+linkTarget+'></a>').parent().parent().addClass('image-loading');imgNext.load(function(){$(this).data('origWidth',$(this).width()).data('origHeight',$(this).height());base.resizeNow();});}
base.$el.css('visibility','hidden');$('.load-item').hide();};base.launch=function(){base.$el.css('visibility','visible');$('#supersized-loader').remove();if(typeof theme!='undefined'&&typeof theme.beforeAnimation=="function")theme.beforeAnimation('next');$('.load-item').show();if(base.options.keyboard_nav){$(document.documentElement).keyup(function(event){if(vars.in_animation)return false;if($(document.activeElement).is("input, textarea"))return false;if((event.keyCode==37)||(event.keyCode==40)){clearInterval(vars.slideshow_interval);base.prevSlide();}else if((event.keyCode==39)||(event.keyCode==38)){clearInterval(vars.slideshow_interval);base.nextSlide();}else if(event.keyCode==32&&!vars.hover_pause){clearInterval(vars.slideshow_interval);base.playToggle();}});}
if(base.options.slideshow&&base.options.pause_hover){$(base.el).hover(function(){if(vars.in_animation)return false;vars.hover_pause=true;if(!vars.is_paused){vars.hover_pause='resume';base.playToggle();}},function(){if(vars.hover_pause=='resume'){base.playToggle();vars.hover_pause=false;}});}
if(base.options.slide_links){$(vars.slide_list+'> li').click(function(){index=$(vars.slide_list+'> li').index(this);targetSlide=index+1;base.goTo(targetSlide);return false;});}
if(base.options.thumb_links){$(vars.thumb_list+'> li').click(function(){index=$(vars.thumb_list+'> li').index(this);targetSlide=index+1;api.goTo(targetSlide);return false;});}
if(base.options.slideshow&&base.options.slides.length>1){if(base.options.autoplay&&base.options.slides.length>1){vars.slideshow_interval=setInterval(base.nextSlide,base.options.slide_interval);}else{vars.is_paused=true;}
$('.load-item img').bind("contextmenu mousedown",function(){return false;});}
$(window).resize(function(){base.resizeNow();});};base.resizeNow=function(){return base.$el.each(function(){$('img',base.el).each(function(){thisSlide=$(this);var ratio=(thisSlide.data('origHeight')/thisSlide.data('origWidth')).toFixed(2);var browserwidth=base.$el.width(),browserheight=base.$el.height(),offset;if(base.options.fit_always){if((browserheight/browserwidth)>ratio){resizeWidth();}else{resizeHeight();}}else{if((browserheight<=base.options.min_height)&&(browserwidth<=base.options.min_width)){if((browserheight/browserwidth)>ratio){base.options.fit_landscape&&ratio<1?resizeWidth(true):resizeHeight(true);}else{base.options.fit_portrait&&ratio>=1?resizeHeight(true):resizeWidth(true);}}else if(browserwidth<=base.options.min_width){if((browserheight/browserwidth)>ratio){base.options.fit_landscape&&ratio<1?resizeWidth(true):resizeHeight();}else{base.options.fit_portrait&&ratio>=1?resizeHeight():resizeWidth(true);}}else if(browserheight<=base.options.min_height){if((browserheight/browserwidth)>ratio){base.options.fit_landscape&&ratio<1?resizeWidth():resizeHeight(true);}else{base.options.fit_portrait&&ratio>=1?resizeHeight(true):resizeWidth();}}else{if((browserheight/browserwidth)>ratio){base.options.fit_landscape&&ratio<1?resizeWidth():resizeHeight();}else{base.options.fit_portrait&&ratio>=1?resizeHeight():resizeWidth();}}}
function resizeWidth(minimum){if(minimum){if(thisSlide.width()<browserwidth||thisSlide.width()<base.options.min_width){if(thisSlide.width()*ratio>=base.options.min_height){thisSlide.width(base.options.min_width);thisSlide.height(thisSlide.width()*ratio);}else{resizeHeight();}}}else{if(base.options.min_height>=browserheight&&!base.options.fit_landscape){if(browserwidth*ratio>=base.options.min_height||(browserwidth*ratio>=base.options.min_height&&ratio<=1)){thisSlide.width(browserwidth);thisSlide.height(browserwidth*ratio);}else if(ratio>1){thisSlide.height(base.options.min_height);thisSlide.width(thisSlide.height()/ratio);}else if(thisSlide.width()<browserwidth){thisSlide.width(browserwidth);thisSlide.height(thisSlide.width()*ratio);}}else{thisSlide.width(browserwidth);thisSlide.height(browserwidth*ratio);}}};function resizeHeight(minimum){if(minimum){if(thisSlide.height()<browserheight){if(thisSlide.height()/ratio>=base.options.min_width){thisSlide.height(base.options.min_height);thisSlide.width(thisSlide.height()/ratio);}else{resizeWidth(true);}}}else{if(base.options.min_width>=browserwidth){if(browserheight/ratio>=base.options.min_width||ratio>1){thisSlide.height(browserheight);thisSlide.width(browserheight/ratio);}else if(ratio<=1){thisSlide.width(base.options.min_width);thisSlide.height(thisSlide.width()*ratio);}}else{thisSlide.height(browserheight);thisSlide.width(browserheight/ratio);}}};if(thisSlide.parents('li').hasClass('image-loading')){$('.image-loading').removeClass('image-loading');}
if(base.options.horizontal_center){$(this).css('left',(browserwidth-$(this).width())/2);}
if(base.options.vertical_center){$(this).css('top',(browserheight-$(this).height())/2);}});if(base.options.image_protect){$('img',base.el).bind("contextmenu mousedown",function(){return false;});}
return false;});};base.nextSlide=function(){if(vars.in_animation||!api.options.slideshow)return false;else vars.in_animation=true;clearInterval(vars.slideshow_interval);var slides=base.options.slides,liveslide=base.$el.find('.activeslide');$('.prevslide').removeClass('prevslide');liveslide.removeClass('activeslide').addClass('prevslide');vars.current_slide+1==base.options.slides.length?vars.current_slide=0:vars.current_slide++;var nextslide=$(base.el+' li:eq('+vars.current_slide+')'),prevslide=base.$el.find('.prevslide');if(base.options.performance==1)base.$el.removeClass('quality').addClass('speed');loadSlide=false;vars.current_slide==base.options.slides.length-1?loadSlide=0:loadSlide=vars.current_slide+1;var targetList=base.el+' li:eq('+loadSlide+')';if(!$(targetList).html()){var linkTarget=base.options.new_window?' target="_blank"':'';imageLink=(base.options.slides[loadSlide].url)?"href='"+base.options.slides[loadSlide].url+"'":"";var img=$('<img src="'+base.options.slides[loadSlide].image+'"/>');img.appendTo(targetList).wrap('<a '+imageLink+linkTarget+'></a>').parent().parent().addClass('image-loading').css('visibility','hidden');img.load(function(){base._origDim($(this));base.resizeNow();});};if(base.options.thumbnail_navigation==1){vars.current_slide-1<0?prevThumb=base.options.slides.length-1:prevThumb=vars.current_slide-1;$(vars.prev_thumb).html($("<img/>").attr("src",base.options.slides[prevThumb].image));nextThumb=loadSlide;$(vars.next_thumb).html($("<img/>").attr("src",base.options.slides[nextThumb].image));}
if(typeof theme!='undefined'&&typeof theme.beforeAnimation=="function")theme.beforeAnimation('next');if(base.options.slide_links){$('.current-slide').removeClass('current-slide');$(vars.slide_list+'> li').eq(vars.current_slide).addClass('current-slide');}
nextslide.css('visibility','hidden').addClass('activeslide');switch(base.options.transition){case 0:case'none':nextslide.css('visibility','visible');vars.in_animation=false;base.afterAnimation();break;case 1:case'fade':nextslide.css({opacity:0,'visibility':'visible'}).animate({opacity:1,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 2:case'slideTop':nextslide.css({top:-base.$el.height(),'visibility':'visible'}).animate({top:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 3:case'slideRight':nextslide.css({left:base.$el.width(),'visibility':'visible'}).animate({left:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 4:case'slideBottom':nextslide.css({top:base.$el.height(),'visibility':'visible'}).animate({top:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 5:case'slideLeft':nextslide.css({left:-base.$el.width(),'visibility':'visible'}).animate({left:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 6:case'carouselRight':nextslide.css({left:base.$el.width(),'visibility':'visible'}).animate({left:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});liveslide.animate({left:-base.$el.width(),avoidTransforms:false},base.options.transition_speed);break;case 7:case'carouselLeft':nextslide.css({left:-base.$el.width(),'visibility':'visible'}).animate({left:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});liveslide.animate({left:base.$el.width(),avoidTransforms:false},base.options.transition_speed);break;}
return false;};base.prevSlide=function(){if(vars.in_animation||!api.options.slideshow)return false;else vars.in_animation=true;clearInterval(vars.slideshow_interval);var slides=base.options.slides,liveslide=base.$el.find('.activeslide');$('.prevslide').removeClass('prevslide');liveslide.removeClass('activeslide').addClass('prevslide');vars.current_slide==0?vars.current_slide=base.options.slides.length-1:vars.current_slide--;var nextslide=$(base.el+' li:eq('+vars.current_slide+')'),prevslide=base.$el.find('.prevslide');if(base.options.performance==1)base.$el.removeClass('quality').addClass('speed');loadSlide=vars.current_slide;var targetList=base.el+' li:eq('+loadSlide+')';if(!$(targetList).html()){var linkTarget=base.options.new_window?' target="_blank"':'';imageLink=(base.options.slides[loadSlide].url)?"href='"+base.options.slides[loadSlide].url+"'":"";var img=$('<img src="'+base.options.slides[loadSlide].image+'"/>');img.appendTo(targetList).wrap('<a '+imageLink+linkTarget+'></a>').parent().parent().addClass('image-loading').css('visibility','hidden');img.load(function(){base._origDim($(this));base.resizeNow();});};if(base.options.thumbnail_navigation==1){loadSlide==0?prevThumb=base.options.slides.length-1:prevThumb=loadSlide-1;$(vars.prev_thumb).html($("<img/>").attr("src",base.options.slides[prevThumb].image));vars.current_slide==base.options.slides.length-1?nextThumb=0:nextThumb=vars.current_slide+1;$(vars.next_thumb).html($("<img/>").attr("src",base.options.slides[nextThumb].image));}
if(typeof theme!='undefined'&&typeof theme.beforeAnimation=="function")theme.beforeAnimation('prev');if(base.options.slide_links){$('.current-slide').removeClass('current-slide');$(vars.slide_list+'> li').eq(vars.current_slide).addClass('current-slide');}
nextslide.css('visibility','hidden').addClass('activeslide');switch(base.options.transition){case 0:case'none':nextslide.css('visibility','visible');vars.in_animation=false;base.afterAnimation();break;case 1:case'fade':nextslide.css({opacity:0,'visibility':'visible'}).animate({opacity:1,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 2:case'slideTop':nextslide.css({top:base.$el.height(),'visibility':'visible'}).animate({top:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 3:case'slideRight':nextslide.css({left:-base.$el.width(),'visibility':'visible'}).animate({left:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 4:case'slideBottom':nextslide.css({top:-base.$el.height(),'visibility':'visible'}).animate({top:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 5:case'slideLeft':nextslide.css({left:base.$el.width(),'visibility':'visible'}).animate({left:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});break;case 6:case'carouselRight':nextslide.css({left:-base.$el.width(),'visibility':'visible'}).animate({left:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});liveslide.css({left:0}).animate({left:base.$el.width(),avoidTransforms:false},base.options.transition_speed);break;case 7:case'carouselLeft':nextslide.css({left:base.$el.width(),'visibility':'visible'}).animate({left:0,avoidTransforms:false},base.options.transition_speed,function(){base.afterAnimation();});liveslide.css({left:0}).animate({left:-base.$el.width(),avoidTransforms:false},base.options.transition_speed);break;}
return false;};base.playToggle=function(){if(vars.in_animation||!api.options.slideshow)return false;if(vars.is_paused){vars.is_paused=false;if(typeof theme!='undefined'&&typeof theme.playToggle=="function")theme.playToggle('play');vars.slideshow_interval=setInterval(base.nextSlide,base.options.slide_interval);}else{vars.is_paused=true;if(typeof theme!='undefined'&&typeof theme.playToggle=="function")theme.playToggle('pause');clearInterval(vars.slideshow_interval);}
return false;};base.goTo=function(targetSlide){if(vars.in_animation||!api.options.slideshow)return false;var totalSlides=base.options.slides.length;if(targetSlide<0){targetSlide=totalSlides;}else if(targetSlide>totalSlides){targetSlide=1;}
targetSlide=totalSlides-targetSlide+1;clearInterval(vars.slideshow_interval);if(typeof theme!='undefined'&&typeof theme.goTo=="function")theme.goTo();if(vars.current_slide==totalSlides-targetSlide){if(!(vars.is_paused)){vars.slideshow_interval=setInterval(base.nextSlide,base.options.slide_interval);}
return false;}
if(totalSlides-targetSlide>vars.current_slide){vars.current_slide=totalSlides-targetSlide-1;vars.update_images='next';base._placeSlide(vars.update_images);}else if(totalSlides-targetSlide<vars.current_slide){vars.current_slide=totalSlides-targetSlide+1;vars.update_images='prev';base._placeSlide(vars.update_images);}
if(base.options.slide_links){$(vars.slide_list+'> .current-slide').removeClass('current-slide');$(vars.slide_list+'> li').eq((totalSlides-targetSlide)).addClass('current-slide');}
if(base.options.thumb_links){$(vars.thumb_list+'> .current-thumb').removeClass('current-thumb');$(vars.thumb_list+'> li').eq((totalSlides-targetSlide)).addClass('current-thumb');}};base._placeSlide=function(place){var linkTarget=base.options.new_window?' target="_blank"':'';loadSlide=false;if(place=='next'){vars.current_slide==base.options.slides.length-1?loadSlide=0:loadSlide=vars.current_slide+1;var targetList=base.el+' li:eq('+loadSlide+')';if(!$(targetList).html()){var linkTarget=base.options.new_window?' target="_blank"':'';imageLink=(base.options.slides[loadSlide].url)?"href='"+base.options.slides[loadSlide].url+"'":"";var img=$('<img src="'+base.options.slides[loadSlide].image+'"/>');img.appendTo(targetList).wrap('<a '+imageLink+linkTarget+'></a>').parent().parent().addClass('image-loading').css('visibility','hidden');img.load(function(){base._origDim($(this));base.resizeNow();});};base.nextSlide();}else if(place=='prev'){vars.current_slide-1<0?loadSlide=base.options.slides.length-1:loadSlide=vars.current_slide-1;var targetList=base.el+' li:eq('+loadSlide+')';if(!$(targetList).html()){var linkTarget=base.options.new_window?' target="_blank"':'';imageLink=(base.options.slides[loadSlide].url)?"href='"+base.options.slides[loadSlide].url+"'":"";var img=$('<img src="'+base.options.slides[loadSlide].image+'"/>');img.appendTo(targetList).wrap('<a '+imageLink+linkTarget+'></a>').parent().parent().addClass('image-loading').css('visibility','hidden');img.load(function(){base._origDim($(this));base.resizeNow();});};base.prevSlide();}};base._origDim=function(targetSlide){targetSlide.data('origWidth',targetSlide.width()).data('origHeight',targetSlide.height());};base.afterAnimation=function(){if(base.options.performance==1){base.$el.removeClass('speed').addClass('quality');}
if(vars.update_images){vars.current_slide-1<0?setPrev=base.options.slides.length-1:setPrev=vars.current_slide-1;vars.update_images=false;$('.prevslide').removeClass('prevslide');$(base.el+' li:eq('+setPrev+')').addClass('prevslide');}
vars.in_animation=false;if(!vars.is_paused&&base.options.slideshow){vars.slideshow_interval=setInterval(base.nextSlide,base.options.slide_interval);if(base.options.stop_loop&&vars.current_slide==base.options.slides.length-1)base.playToggle();}
if(typeof theme!='undefined'&&typeof theme.afterAnimation=="function")theme.afterAnimation();return false;};base.getField=function(field){return base.options.slides[vars.current_slide][field];};base.init();};$.supersized.vars={thumb_tray:'#thumb-tray',thumb_list:'#thumb-list',slide_list:'#slide-list',current_slide:0,in_animation:false,is_paused:false,hover_pause:false,slideshow_interval:false,update_images:false,options:{}};$.supersized.defaultOptions={slideshow:1,autoplay:1,start_slide:1,stop_loop:0,random:0,slide_interval:5000,transition:1,transition_speed:750,new_window:1,pause_hover:0,keyboard_nav:1,performance:1,image_protect:1,fit_always:0,fit_landscape:0,fit_portrait:1,min_width:0,min_height:0,horizontal_center:1,vertical_center:1,slide_links:1,thumb_links:1,thumbnail_navigation:0};$.fn.supersized=function(options){return this.each(function(){(new $.supersized(options));});};})(jQuery);