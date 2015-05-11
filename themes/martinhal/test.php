<?php
/**
 * Template Name: test
 */

get_header(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/component.css" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jassor/jssor.js" type="text/javascript" ></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jassor/jssor.slider.js" type="text/javascript" ></script>
        <script>
            jQuery(document).ready(function ($) {
                var options = {
                    $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                    $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                    $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                    $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                    $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
    
                    $ThumbnailNavigatorOptions: {
                        $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
    
                        $Loop: 2,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                        $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                        $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                        $DisplayPieces: 6,                              //[Optional] Number of pieces to display, default value is 1
                        $ParkingPosition: 204,                          //[Optional] The offset position to park thumbnail,
    
                        $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                            $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                            $AutoCenter: 1,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                            $Steps: 6                                       //[Optional] Steps to go for each navigation request, default value is 1
                        }
                    }
                };
    
                var jssor_slider1 = new $JssorSlider$("slider1_container", options);
    
                //responsive code begin
                //you can remove responsive code if you don't want the slider scales while window resizes
                function ScaleSlider() {
                    var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                    if (parentWidth)
                        jssor_slider1.$ScaleWidth(Math.min(parentWidth, 720));
                    else
                        window.setTimeout(ScaleSlider, 30);
                }
    
                ScaleSlider();
    
                if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                    $(window).bind('resize', ScaleSlider);
                }
    
    
                if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
                    $(window).bind("orientationchange", ScaleSlider);
                }
                //responsive code end
            });
        </script>		
       	
			
			
			<?php
        		while ( have_posts() ) : the_post(); ?>
			   		<?php
						$hide_title = get_field('hide_main_title', $page_id);

					 	if($hide_title != "Yes"): 
					?>
	            		<h1><?php the_title(); ?></h1>
	            	<?php endif; ?>
	            
					<p><?php the_content(); ?></p>
					
					<?php $ck_image = get_field('brochures_images'); ?>
					<?php if(empty($ck_image[0]['images'])): ?>
						<span class="coming_soon">Coming Soon...</span>
					<?php endif; ?>	
							
			<?php endwhile; ?>
			<div class="clear"></div>
        	<!--<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 720px; height: 480px;
            overflow: hidden;">
								
								 <div>
					                <img u="image" src="<?php// echo the_sub_field('images'); ?>" />
					                <img u="thumb" src="<?php// echo the_sub_field('images'); ?>" />
					            </div>
			                
            </div>
             -->
                 <div id="slider1_container" style="position: relative; width: 720px;
        height: 480px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 720px; height: 480px;
            overflow: hidden;">
				<div>
                                    <img u="image" src="http://www.imartinhal.com/wp-content/uploads/2014/09/terrace_room.jpg" />
                                    <img u="thumb" src="http://www.imartinhal.com/wp-content/uploads/2014/09/terrace_room.jpg" />
                                </div>
                                 <div>
                                    <img u="image" src="http://www.imartinhal.com/wp-content/uploads/2014/09/Recep-0798.jpg" />
                                    <img u="thumb" src="http://www.imartinhal.com/wp-content/uploads/2014/09/Recep-0798.jpg" />
                                </div><div>
                                    <img u="image" src="http://www.imartinhal.com/wp-content/uploads/2014/09/terrace_room.jpg" />
                                    <img u="thumb" src="http://www.imartinhal.com/wp-content/uploads/2014/09/terrace_room.jpg" />
                                </div>
                                 <div>
                                    <img u="image" src="http://www.imartinhal.com/wp-content/uploads/2014/09/Recep-0798.jpg" />
                                    <img u="thumb" src="http://www.imartinhal.com/wp-content/uploads/2014/09/Recep-0798.jpg" />
                                </div><div>
                                    <img u="image" src="http://www.imartinhal.com/wp-content/uploads/2014/09/terrace_room.jpg" />
                                    <img u="thumb" src="http://www.imartinhal.com/wp-content/uploads/2014/09/terrace_room.jpg" />
                                </div>
                                 <div>
                                    <img u="image" src="http://www.imartinhal.com/wp-content/uploads/2014/09/Recep-0798.jpg" />
                                    <img u="thumb" src="http://www.imartinhal.com/wp-content/uploads/2014/09/Recep-0798.jpg" />
                                </div>
        </div>
        
        <!-- Thumbnail Navigator Skin Begin -->
        <div u="thumbnavigator" class="jssort07" style="position: absolute; width: 720px; height: 100px; left: 0px; bottom: 0px; overflow: hidden; ">
            <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>
            <!-- Thumbnail Item Skin Begin -->
            <style>
                /* jssor slider thumbnail navigator skin 07 css */
                /*
                .jssort07 .p            (normal)
                .jssort07 .p:hover      (normal mouseover)
                .jssort07 .pav          (active)
                .jssort07 .pav:hover    (active mouseover)
                .jssort07 .pdn          (mousedown)
                */
                .jssort07 .i {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 99px;
                    height: 66px;
                    filter: alpha(opacity=80);
                    opacity: .8;
                }

                .jssort07 .p:hover .i, .jssort07 .pav .i {
                    filter: alpha(opacity=100);
                    opacity: 1;
                }

                .jssort07 .o {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 97px;
                    height: 64px;
                    border: 1px solid #000;
                    transition: border-color .6s;
                    -moz-transition: border-color .6s;
                    -webkit-transition: border-color .6s;
                    -o-transition: border-color .6s;
                }

                * html .jssort07 .o {
                    /* ie quirks mode adjust */
                    width /**/: 99px;
                    height /**/: 66px;
                }

                .jssort07 .pav .o, .jssort07 .p:hover .o {
                    border-color: #fff;
                }

                .jssort07 .pav:hover .o {
                    border-color: #0099FF;
                }

                .jssort07 .p:hover .o {
                    transition: none;
                    -moz-transition: none;
                    -webkit-transition: none;
                    -o-transition: none;
                }
            </style>
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 99px; HEIGHT: 66px; TOP: 0; LEFT: 0;">
                    <thumbnailtemplate class="i" style="position:absolute;"></thumbnailtemplate>
                    <div class="o">
                    </div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
            <!-- Arrow Navigator Skin Begin -->
            <style>
                    /* jssor slider arrow navigator skin 11 css */
                    /*
                .jssora11l              (normal)
                .jssora11r              (normal)
                .jssora11l:hover        (normal mouseover)
                .jssora11r:hover        (normal mouseover)
                .jssora11ldn            (mousedown)
                .jssora11rdn            (mousedown)
                */
                    .jssora11l, .jssora11r, .jssora11ldn, .jssora11rdn {
                        position: absolute;
                        cursor: pointer;
                        display: block;
                        background: url(../img/a11.png) no-repeat;
                        overflow: hidden;
                    }

                    .jssora11l {
                        background-position: -11px -41px;
                    }

                    .jssora11r {
                        background-position: -71px -41px;
                    }

                    .jssora11l:hover {
                        background-position: -131px -41px;
                    }

                    .jssora11r:hover {
                        background-position: -191px -41px;
                    }

                    .jssora11ldn {
                        background-position: -251px -41px;
                    }

                    .jssora11rdn {
                        background-position: -311px -41px;
                    }
            </style>
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora11l" style="width: 37px; height: 37px; top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora11r" style="width: 37px; height: 37px; top: 123px; right: 8px">
            </span>
            <!-- Arrow Navigator Skin End -->
        </div>
        <!-- ThumbnailNavigator Skin End -->

        <!-- Trigger -->
    </div>
    <!-- Jssor Slider End -->

            
    
<?php 
 //require_once("footer.php");
 //include("footer.php"); 
get_footer(); ?>
