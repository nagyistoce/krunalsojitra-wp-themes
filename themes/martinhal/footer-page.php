<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<div class="slide" id="slide8" data-slide="7" data-stellar-background-ratio="0.5">
	<div class="footer">
    	<div class="ft-btn">
    		<?php
    			$book_now = get_post(164); // Get book now page title by page id
				$special_offers = get_post(166); // Get special offers page title by page id
				$newsletter = get_post(168); // Get newsletter page title by page id
    		?>
        	<!-- <a class="normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank"> -->
        		<a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">
				<?php
				    if($_SESSION['flag'] == 'pt'){
						echo "Reserve Ja";
					}elseif($_SESSION['flag'] == 'uk'){
						echo "Book Now";
					}elseif($_SESSION['flag'] == 'de'){
						echo "Jetzt Buchen";
					}elseif($_SESSION['flag'] == 'es'){
						echo "Reserve Ahora";
					}elseif($_SESSION['flag'] == 'fr'){
						echo "Reserver Maintenant";
					}elseif($_SESSION['flag'] == 'it'){
						echo "Prenota Ora";
					}elseif($_SESSION['flag'] == 'nl'){
						echo "Boek Nu";
					}elseif($_SESSION['flag'] == 'ru'){
						echo "Book Now";
					}elseif($_SESSION['flag'] == 'cn'){
						echo "Book Now";
					}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
						echo "Book Now";
					}
				?>        		
        	</a>
           
				<?php
				    if($_SESSION['flag'] == 'pt'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>pt/ofertas-especiais-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
						<?php
					}elseif($_SESSION['flag'] == 'uk'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
						<?php
					}elseif($_SESSION['flag'] == 'de'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>de/urlaub-ferien-familien-angebote-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
						<?php
					}elseif($_SESSION['flag'] == 'es'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>es/ofertas-especiales-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiales</a>
						<?php
					}elseif($_SESSION['flag'] == 'fr'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>fr/offres-speciales-familles-vacances-hotel-resort-martinhal-sagres-portugal">Offres Speciales</a>
						<?php
					}elseif($_SESSION['flag'] == 'it'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>it/offerte-speciali-famiglie-vacanze-hotel-resort-martinhal-sagres-portugal">Offerte Speciali</a>
						<?php
					}elseif($_SESSION['flag'] == 'nl'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>nl/speciale-aanbiedingen-families-vakanties-hotel-resort-martinhal-sagres-portugal">Speciale Aanbiedingen</a>
						<?php
					}elseif($_SESSION['flag'] == 'ru'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>ru/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
						<?php
					}elseif($_SESSION['flag'] == 'cn'){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>cn/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
						<?php
					}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
						<?php
					}
				?>            	
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>newsletter/">
				<?php
				    if($_SESSION['flag'] == 'pt'){
						echo "Newsletter";
					}elseif($_SESSION['flag'] == 'uk'){
						echo "Newsletter";
					}elseif($_SESSION['flag'] == 'de'){
						echo "Newsletter";
					}elseif($_SESSION['flag'] == 'es'){
						echo "Boletin";
					}elseif($_SESSION['flag'] == 'fr'){
						echo "Bulletin";
					}elseif($_SESSION['flag'] == 'it'){
						echo "Newsletter";
					}elseif($_SESSION['flag'] == 'nl'){
						echo "Nieuwsbrief";
					}elseif($_SESSION['flag'] == 'ru'){
						echo "Newsletter";
					}elseif($_SESSION['flag'] == 'cn'){
						echo "Newsletter";
					}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
						echo "Newsletter";
					}
				?>            	
            </a>
        </div>

        <?php
            if($_SESSION['flag'] == 'pt'){

				wp_nav_menu( array('menu' => 'footer-pt', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'uk'){

				wp_nav_menu( array('menu' => 'footer-uk', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'de'){
				
				wp_nav_menu( array('menu' => 'footer-de', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
	
			}elseif($_SESSION['flag'] == 'es'){
				
				wp_nav_menu( array('menu' => 'footer-es', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'fr'){
				
				wp_nav_menu( array('menu' => 'footer-fr', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'it'){
				
				wp_nav_menu( array('menu' => 'footer-it', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'nl'){
				
				wp_nav_menu( array('menu' => 'footer-nl', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'ru'){
				
				wp_nav_menu( array('menu' => 'footer-ru', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'cn'){
				
				wp_nav_menu( array('menu' => 'footer-cn', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
				
				wp_nav_menu( array('menu' => 'footer-uk', 'menu_id' => 'nav', 'menu_class' => 'ft-nav', 'fallback_cb' => false ));
				
			}
		?>
        
        <div class="clear"></div>
        
        <ul class="batch">
        	<?php
        		$footer_post_awards = array( 'post_type' => 'footer' ); // Display awards
				$footer_awards = new WP_Query( $footer_post_awards );
					
				while ( $footer_awards->have_posts() ) : $footer_awards->the_post();
			?>
				<?php if(get_field('awards')): ?>
					<?php while(has_sub_field('awards')): ?>
						<li>
			            	<img src="<?php the_sub_field('awards_image'); ?>" />
			                <span><?php the_sub_field('awards_title'); ?></span>
			            </li>
	            	<?php endwhile; ?>
                <?php endif; ?>
			<?php endwhile; wp_reset_query(); ?>
        </ul>
        
        <div class="clear"></div>
        
        <?php
    		$footer_post_partners = array( 'post_type' => 'footer' ); // Display social links
			$footer_partners = new WP_Query( $footer_post_partners );
				
			if ( $footer_partners->have_posts() ) : $footer_partners->the_post();
		?>
			<?php if (get_field('partners_image')): ?>
		        <?php if (get_field('partners_url')): ?> <a class="apoios" href="<?php echo get_field('partners_url'); ?>" target="_blank" rel="nofollow"> <?php else: ?> <a class="apoios" href="javascript:void(0);"> <?php endif; ?>
		        	<img src="<?php echo get_field('partners_image'); ?>" />
		        </a>
		    <?php endif; ?>
	    <?php endif; ?>
        
        <div class="clear"></div>
        
        <a class="ft-lg" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        	<img src="<?php echo get_template_directory_uri(); ?>/images/ft-logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
        </a>
        
        <div class="clear"></div>
        
        <ul class="social">
        	<?php
        		$footer_post_social = array( 'post_type' => 'footer' ); // Display social links
				$footer_social = new WP_Query( $footer_post_social );
					
				if ( $footer_social->have_posts() ) : $footer_social->the_post();
			?>
			
				<?php
                    if (get_field('youtube')):
                        ?> <li> <a class="s1" href="<?php echo get_field('youtube'); ?>" title="Youtube" target="_blank" rel="nofollow"></a> </li> <?php
                    else:
                        ?> <li> <a class="s1" href="javascript:void(0);" title="Youtube" target="_blank" rel="nofollow"></a> </li> <?php
                    endif;
                ?>
                
                <?php
                    if (get_field('facebook')):
                        ?> <li> <a class="s2" href="<?php echo get_field('facebook'); ?>" title="Facebook" target="_blank" rel="nofollow"></a> </li> <?php
                    else:
                        ?> <li> <a class="s2" href="javascript:void(0);" title="Facebook" target="_blank" rel="nofollow"></a> </li> <?php
                    endif;
                ?>
	       		
	            <?php
                    if (get_field('twitter')):
                        ?> <li> <a class="s3" href="<?php echo get_field('twitter'); ?>" title="Twitter" target="_blank" rel="nofollow"></a> </li> <?php
                    else:
                        ?> <li> <a class="s3" href="javascript:void(0);" title="Twitter" target="_blank" rel="nofollow"></a> </li> <?php
                    endif;
                ?>
	            
	            <?php
                    if (get_field('google_plus')):
                        ?> <li> <a class="s4" href="<?php echo get_field('google_plus'); ?>" title="Google+" target="_blank" rel="nofollow"></a> </li> <?php
                    else:
                        ?> <li> <a class="s4" href="javascript:void(0);" title="Google+" target="_blank" rel="nofollow"></a> </li> <?php
                    endif;
                ?>
                
	            <?php
                    if (get_field('instagram')):
                        ?> <li> <a class="s5" href="<?php echo get_field('instagram'); ?>" title="Instagram" target="_blank" rel="nofollow"></a> </li> <?php
                    else:
                        ?> <li> <a class="s5" href="javascript:void(0);" title="Instagram" target="_blank" rel="nofollow"></a> </li> <?php
                    endif;
                ?>
                
                <?php
                    if (get_field('pinterest')):
                        ?> <li> <a class="s6" href="<?php echo get_field('pinterest'); ?>" title="Pinterest" target="_blank" rel="nofollow"></a> </li> <?php
                    else:
                        ?> <li> <a class="s6" href="javascript:void(0);" title="Pinterest" target="_blank" rel="nofollow"></a> </li> <?php
                    endif;
                ?>
                	            	            
            <?php endif; wp_reset_query(); ?>
        </ul>
        
        
        
		<div class="clear"></div>
		        
        <span class="cpy"> © <?php echo date("Y"); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"> <?php bloginfo( 'description' ); ?> </a></span></div>
        
	</div>
         
    <!-- <script type="text/javascript">
    	$(document).on("click", 'a[href^="#slide2"]', function(){
			$('html, body').animate({
				scrollTop: $("#slide2").offset().top - $('.test').height()
			}, 1000);
		});
    </script> -->
      
	<!--Menu js -->
	<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.slimmenu.js"></script> 
	<script type="text/javascript">
	$('.slimmenu').slimmenu({   
		resizeWidth: '1180',
	    collapserTitle: '',
	    animSpeed: 0,
	    easingEffect: null,
	    indentChildren: false,
	    childrenIndenter: '&nbsp;'
	});
	
	$(".slimmenu").click(function(){
		$("#nav").addClass("res-nav");
	});
	
	$(".menu-collapser").click(function(){
		$("#nav").removeClass("res-nav");
	});
	</script> -->
	
	<?php if( is_single() || is_page() ): ?>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
		<script type="text/javascript">
			(function($){
				$(window).load(function(){
					$("#cust-scrl").mCustomScrollbar({
						scrollButtons:{
							enable:true
						}
					});
					$("#cust-scrl").hover(function(){
						$(document).data({"keyboard-input":"enabled"});
						$(this).addClass("keyboard-input");
					},function(){
						$(document).data({"keyboard-input":"disabled"});
						$(this).removeClass("keyboard-input");
					});
					$(document).keydown(function(e){
						if($(this).data("keyboard-input")==="enabled"){
							var activeElem=$(".keyboard-input"),
								activeElemPos=Math.abs($(".keyboard-input .mCSB_container").position().top),
								pixelsToScroll=60;
							if(e.which===38){ //scroll up
								e.preventDefault();
								if(pixelsToScroll>activeElemPos){
									activeElem.mCustomScrollbar("scrollTo","top");
								}else{
									activeElem.mCustomScrollbar("scrollTo",(activeElemPos-pixelsToScroll),{scrollInertia:400,scrollEasing:"easeOutCirc"});
								}
							}else if(e.which===40){ //scroll down
								e.preventDefault();
								activeElem.mCustomScrollbar("scrollTo",(activeElemPos+pixelsToScroll),{scrollInertia:400,scrollEasing:"easeOutCirc"});
							}
						}
					});
				});
			})(jQuery);
		</script>
	<?php endif; ?>

	<script defer src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
			$('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
			  		$('body').removeClass('loading');
				}
		  	});
		});
	</script>
     <!----------title for backgroung image--------->
     <?php
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		$custom_image = get_field('detail_page_image', $page_id);
		$custom_image_title = get_field('detail_page_title', $page_id);
		
		
			?>
			<!-- <script>
	    $.backstretch(["<?php echo $custom_image; ?>"]);
      $(".other").backstretch("<?php echo $custom_image; ?>");
      $('.backstretch img').attr('title','<?php echo $custom_image_title; ?>');
  </script> -->
  <!----------title for backgroung image--------->
  <img id="background_title" src="<?php echo $custom_image; ?>" title="<?php echo $custom_image_title; ?>"  alt="<?php echo $custom_image_title; ?>" style="height: 1px; width: 0px; position: absolute;"/>
<!-- Flag Div <div class="flag"><?php echo $_SESSION['flag']; ?></div> -->
<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12531320-1', 'auto');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
(function() {
var sc = document.createElement('script'); sc.type = 'text/javascript'; sc.async = true;
sc.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//scripts.affilired.com/customs/M4338.php?merchant=4338';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sc, s);
})();
</script>




<!-- Google Code for Remarketing tag -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1071685842;
var google_conversion_label = "3lzFCJyoogQQ0sGC_wM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script><div class="if">
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1071685842/?value=1.00&amp;currency_code=EUR&amp;label=3lzFCJyoogQQ0sGC_wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</div>

</body>
</html>