/*
 * Author: Matthijs Molhoek, 66Themes
 * URL: http://themeforest.net/user/66themes
 *
 * Project Name: Fragment -  WordPress Theme
 * Version: 1.2
 * URL: -
 */

jQuery(document).ready(function($){"use strict";var body=$('body');var wpOffset=85;if(!(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent))){$.fn.waypoint.defaults={context:window,continuous:true,enabled:true,horizontal:false,offset:0,triggerOnce:false};$('.animated').waypoint(function(direction){var elem=$(this);var animation=elem.data('animation');var fff=elem.attr('data-revert');if(direction!="down"){if(elem.hasClass('visible')&&elem.attr('data-revert')!==undefined){if(elem.attr('data-animation-delay')!==undefined){var timeout=elem.data('animation-delay');setTimeout(function(){elem.addClass(elem.attr('data-revert')+" visible");},timeout);}else{elem.addClass(elem.attr('data-revert')+" visible");}}}else{if(fff!=''){elem.removeClass(fff);}
if(!elem.hasClass('visible')&&elem.attr('data-animation')!==undefined){if(elem.attr('data-animation-delay')!==undefined){var timeout=elem.data('animation-delay');setTimeout(function(){elem.addClass(animation+" visible");elem.removeClass("fadeOutDown");},timeout);}else{elem.addClass(elem.data('animation')+" visible");}}}},{offset:wpOffset+'%'});}else{$('.animated').addClass('visible');}});