<?php session_start();
$type = $_SERVER['HTTP_USER_AGENT'];
//echo "<script>alert('".$type."')</script>"; if(strpos((string)$type, "iPad")!=false)
{
	$_SESSION['device_type_str']='iPad';
}
if(strpos((string)$type, "iPhone") != false){
	$_SESSION['device_type_str']='iPhone';
}else{
	$_SESSION['device_type_str']='other';
}
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head><meta charset='utf-8'>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php if($_SESSION['flag'] == 'pt'){?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="pt-pt" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="pt-pt" />	<?php }?>
<?php }elseif($_SESSION['flag'] == 'uk'){ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="en-gb" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="en-gb" />		<?php }?>
<?php }elseif($_SESSION['flag'] == 'de'){ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="de-de" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="de-de" />	<?php }?>
<?php }elseif($_SESSION['flag'] == 'es'){ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="es-es" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="es-es" />	<?php }?>
<?php }elseif($_SESSION['flag'] == 'fr'){ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="fr-fr" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="fr-fr" />	<?php }?>
<?php }elseif($_SESSION['flag'] == 'it'){ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="it-it" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="it-it" />	<?php }?>
<?php }elseif($_SESSION['flag'] == 'nl'){ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="nl-nl" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="nl-nl" />	<?php }?>
<?php }elseif($_SESSION['flag'] == 'ru'){ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="ru-ru" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="ru-ru" />			<?php }?>
<?php }elseif($_SESSION['flag'] == 'cn'){ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="zh-cn" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="zh-cn" />	<?php }?>
<?php }else{ ?>	<?php if(is_front_page()){?>		<link rel="alternate" href="http://www.martinhal.com" hreflang="en-gb" />	<?php }else{?>
		<link rel="alternate" href="<?php the_permalink();?>" hreflang="en-gb" />			<?php }?>
<?php }?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css" />

 <!-- start: Favicon and Touch Icons -->
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-152.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-120.png">
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-76.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-60.png">
<link rel="icon" type="icon/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
<!-- end: Favicon and Touch Icons -->

<?php if( !is_home() || !is_front_page() ): ?>
	
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main-style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/res.css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/js.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.stellar.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
 <script type="text/javascript" src="http://malsup.github.com/jquery.corner.js"></script>
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '670939399651937']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=670939399651937&amp;ev=PixelInitialized" /></noscript>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.stellar.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#hideshow').live('click', function(event) {        
			 jQuery('#content').toggle('show');
		});
		/* $(".ipad_round").corner('50px');
		 $(".ipad_round a").corner('50px');*/
	});
</script>

<script type="text/javascript">
	var $ = jQuery.noConflict();
	$(document).ready(function(){
		$('#check').live('click', function(event) {        
			 $('#chk-bx').toggle('show');
			 $('#slide2 #chk-bx').toggle('show');
		});
	});
</script>

<script>
$("#check").click(function(e){
	e.preventDefault();
	$("#chk-bx").fadeToggle("slow",function(){
		var customScrollbar=$("#chk-bx").find(".mCSB_scrollTools");
		customScrollbar.css({"opacity":0});
		$("#chk-bx").mCustomScrollbar("update");
		customScrollbar.animate({opacity:1},"slow");
	});
});

</script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.backstretch.js"></script>
	<!---click functionality in menu -->
<script>
	var $ = jQuery.noConflict();
	$(document).ready(function(){
		$('#menu-trigger').live('click', function(event) {        
			 $('#nav').slideToggle();
		});

		var type = '<?php if(isset($_SESSION['device_type_str']) && !empty($_SESSION['device_type_str'])) echo $_SESSION['device_type_str']; ?>'; 
		if(type=='iPad')
		{
			var url = '<?php echo get_permalink(get_queried_object_id()); ?>';
			var page_id = '<?php echo get_queried_object_id(); ?>';
			
		if(page_id=='707')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-728 a:first").attr("href","javascript:void(0);");
				$("#menu-item-728 ul.sub-menu").css('display','');
				
				$("#menu-item-727 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/uk/restaurants/");
				$("#menu-item-727 ul.sub-menu").css('display','none');
				
				$("#menu-item-726 a:first").attr("href","<?php echo home_url(); ?>/uk/facilities/");
				$("#menu-item-726 ul.sub-menu").css('display','none');
				$("#menu-item-725 a:first").attr("href","<?php echo home_url(); ?>/uk/kids/");
				$("#menu-item-725 ul.sub-menu").css('display','none');
			}
			else if(page_id=='709')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-727 a:first").attr("href","javascript:void(0);");
				$("#menu-item-727 ul.sub-menu").css('display','');
				
				$("#menu-item-728 a:first").attr("href","<?php echo home_url(); ?>/uk/accommodation");
				$("#menu-item-728 ul.sub-menu").css('display','none');
				$("#menu-item-726 a:first").attr("href","<?php echo home_url(); ?>/uk/facilities/");
				$("#menu-item-726 ul.sub-menu").css('display','none');
				$("#menu-item-725 a:first").attr("href","<?php echo home_url(); ?>/uk/kids/");
				$("#menu-item-725 ul.sub-menu").css('display','none');
			}
			else if(page_id=='711')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-726 a:first").attr("href","javascript:void(0);");
				$("#menu-item-726 ul.sub-menu").css('display','');
				
				$("#menu-item-728 a:first").attr("href","<?php echo home_url(); ?>/uk/accommodation");
				$("#menu-item-728 ul.sub-menu").css('display','none');
				$("#menu-item-727 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/uk/restaurants/");
				$("#menu-item-727 ul.sub-menu").css('display','none');
				$("#menu-item-725 a:first").attr("href","<?php echo home_url(); ?>/uk/kids/");
				$("#menu-item-725 ul.sub-menu").css('display','none');
			}
			else if(page_id=='713')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-725 a:first").attr("href","javascript:void(0);");
				$("#menu-item-725 ul.sub-menu").css('display','');
				
				$("#menu-item-728 a:first").attr("href","<?php echo home_url(); ?>/uk/accommodation");
				$("#menu-item-728 ul.sub-menu").css('display','none');
				$("#menu-item-727 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/uk/restaurants/");
				$("#menu-item-727 ul.sub-menu").css('display','none');
				$("#menu-item-726 a:first").attr("href","<?php echo home_url(); ?>/uk/facilities/");
				$("#menu-item-726 ul.sub-menu").css('display','none');
			
			}
			else if(page_id=='729')
			{ 
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-744 a:first").attr("href","javascript:void(0);");
				$("#menu-item-744 ul.sub-menu").css('display','');
				
				$("#menu-item-745 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/pt/restaurantes");
				$("#menu-item-745 ul.sub-menu").css('display','none');
				
				$("#menu-item-746 a:first").attr("href","<?php echo home_url(); ?>/pt/facilidade");
				$("#menu-item-746 ul.sub-menu").css('display','none');
				$("#menu-item-747 a:first").attr("href","<?php echo home_url(); ?>/pt/criancas");
				$("#menu-item-747 ul.sub-menu").css('display','none');
			}
			else if(page_id=='731')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-745 a:first").attr("href","javascript:void(0);");
				$("#menu-item-745 ul.sub-menu").css('display','');
				
				$("#menu-item-744 a:first").attr("href","<?php echo home_url(); ?>/pt/alojamento");
				$("#menu-item-744 ul.sub-menu").css('display','none');
				$("#menu-item-746 a:first").attr("href","<?php echo home_url(); ?>/pt/facilidade");
				$("#menu-item-746 ul.sub-menu").css('display','none');
				$("#menu-item-747 a:first").attr("href","<?php echo home_url(); ?>/pt/criancas");
				$("#menu-item-747 ul.sub-menu").css('display','none');
			}
			else if(page_id=='733')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-746 a:first").attr("href","javascript:void(0);");
				$("#menu-item-746 ul.sub-menu").css('display','');
				
				$("#menu-item-744 a:first").attr("href","<?php echo home_url(); ?>/pt/alojamento");
				$("#menu-item-744 ul.sub-menu").css('display','none');
				$("#menu-item-745 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/pt/restaurantes");
				$("#menu-item-745 ul.sub-menu").css('display','none');
				$("#menu-item-747 a:first").attr("href","<?php echo home_url(); ?>/pt/criancas");
				$("#menu-item-747 ul.sub-menu").css('display','none');
			}
			else if(page_id=='736')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-747 a:first").attr("href","javascript:void(0);");
				$("#menu-item-747 ul.sub-menu").css('display','');
				
				$("#menu-item-744 a:first").attr("href","<?php echo home_url(); ?>/pt/alojamento");
				$("#menu-item-744 ul.sub-menu").css('display','none');
				$("#menu-item-745 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/pt/facilidade");
				$("#menu-item-745 ul.sub-menu").css('display','none');
				$("#menu-item-746 a:first").attr("href","<?php echo home_url(); ?>/uk/facilities/");
				$("#menu-item-746 ul.sub-menu").css('display','none');
			
			}			
			
			
			else if(page_id=='1536')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-1538 a:first").attr("href","javascript:void(0);");
				$("#menu-item-1538 ul.sub-menu").css('display','');
				
				$("#menu-item-1544 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/de/restaurants");
				$("#menu-item-1544 ul.sub-menu").css('display','none');
				
				$("#menu-item-2851 a:first").attr("href","<?php echo home_url(); ?>/de/einrichtungen");
				$("#menu-item-2851 ul.sub-menu").css('display','none');
				$("#menu-item-1554 a:first").attr("href","<?php echo home_url(); ?>/de/kinder");
				$("#menu-item-1554 ul.sub-menu").css('display','none');
			}
			else if(page_id=='1542')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-1544 a:first").attr("href","javascript:void(0);");
				$("#menu-item-1544 ul.sub-menu").css('display','');
				
				$("#menu-item-1538 a:first").attr("href","<?php echo home_url(); ?>/de/ferienhauser");
				$("#menu-item-1538 ul.sub-menu").css('display','none');
				$("#menu-item-2851 a:first").attr("href","<?php echo home_url(); ?>/de/einrichtungen");
				$("#menu-item-2851 ul.sub-menu").css('display','none');
				$("#menu-item-1554 a:first").attr("href","<?php echo home_url(); ?>/de/kinder");
				$("#menu-item-1554 ul.sub-menu").css('display','none');
			}
			else if(page_id=='1545')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-2851 a:first").attr("href","javascript:void(0);");
				$("#menu-item-2851 ul.sub-menu").css('display','');
				
				$("#menu-item-1538 a:first").attr("href","<?php echo home_url(); ?>/de/ferienhauser");
				$("#menu-item-1538 ul.sub-menu").css('display','none');
				$("#menu-item-1544 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/de/restaurants");
				$("#menu-item-1544 ul.sub-menu").css('display','none');
				$("#menu-item-1554 a:first").attr("href","<?php echo home_url(); ?>/de/kinder");
				$("#menu-item-1554 ul.sub-menu").css('display','none');
			}
			else if(page_id=='1547')
			{
				$("header .sub-menu").prev().attr("href","javascript:void(0);");
				$("#menu-item-1554 a:first").attr("href","javascript:void(0);");
				$("#menu-item-1554 ul.sub-menu").css('display','');
				
				$("#menu-item-1538 a:first").attr("href","<?php echo home_url(); ?>/de/ferienhauser");
				$("#menu-item-1538 ul.sub-menu").css('display','none');
				$("#menu-item-1554 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/de/restaurants");
				$("#menu-item-1554 ul.sub-menu").css('display','none');
				$("#menu-item-2851 a:first").attr("href","<?php echo home_url(); ?>/de/einrichtungen");
				$("#menu-item-2581 ul.sub-menu").css('display','none');
			
			}else{
				
				$("#menu-item-728 a:first").attr("href","<?php echo home_url(); ?>/uk/accommodation");
				$("#menu-item-728 ul.sub-menu").css('display','none');
				$("#menu-item-727 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/uk/restaurants/");
				$("#menu-item-727 ul.sub-menu").css('display','none');
				$("#menu-item-726 a:first").attr("href","<?php echo home_url(); ?>/uk/facilities/");
				$("#menu-item-726 ul.sub-menu").css('display','none');
				$("#menu-item-725 a:first").attr("href","<?php echo home_url(); ?>/uk/kids/");
				$("#menu-item-725 ul.sub-menu").css('display','none');
				
				$("#menu-item-744 a:first").attr("href","<?php echo home_url(); ?>/pt/alojamento/");
				$("#menu-item-744 ul.sub-menu").css('display','none');
				$("#menu-item-745 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/pt/restaurantes/");
				$("#menu-item-745 ul.sub-menu").css('display','none');
				$("#menu-item-746 a:first").attr("href","<?php echo home_url(); ?>/pt/facilidades/");
				$("#menu-item-746 ul.sub-menu").css('display','none');
				$("#menu-item-747 a:first").attr("href","<?php echo home_url(); ?>/pt/criancas/");
				$("#menu-item-747 ul.sub-menu").css('display','none');
				
				$("#menu-item-1538 a:first").attr("href","<?php echo home_url(); ?>/de/ferienhauser");
				$("#menu-item-1538 ul.sub-menu").css('display','none');
				$("#menu-item-1544 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/de/restaurants/");
				$("#menu-item-1544 ul.sub-menu").css('display','none');
				$("#menu-item-2851 a:first").attr("href","<?php echo home_url(); ?>/de/einrichtungen/");
				$("#menu-item-2851 ul.sub-menu").css('display','none');
				$("#menu-item-1554 a:first").attr("href","<?php echo home_url(); ?>/de/kinder/");
				$("#menu-item-1554 ul.sub-menu").css('display','none');
				
				
			}
		}
		
		$("header .sub-menu").prev().attr("href","javascript:void(0);");
	
		$("#menu-item-728 a:first").attr("href","<?php echo home_url(); ?>/uk/accommodation");
		$("#menu-item-727 .sub-menu").prev().attr("href","<?php echo home_url(); ?>/uk/restaurants/");
		$("#menu-item-726 a:first").attr("href","<?php echo home_url(); ?>/uk/facilities/");
		$("#menu-item-725 a:first").attr("href","<?php echo home_url(); ?>/uk/kids/");
		
		$("#menu-item-744 a:first").attr("href","<?php echo home_url(); ?>/pt/alojamento/");
		$("#menu-item-745 a:first").attr("href","<?php echo home_url(); ?>/pt/restaurantes/");
		$("#menu-item-746 a:first").attr("href","<?php echo home_url(); ?>/pt/facilidades/");
		$("#menu-item-747 a:first").attr("href","<?php echo home_url(); ?>/pt/criancas/");
		
		$("#menu-item-1538 a:first").attr("href","<?php echo home_url(); ?>/de/ferienhauser/");
		$("#menu-item-1544 a:first").attr("href","<?php echo home_url(); ?>/de/restaurants/");
		$("#menu-item-2851 a:first").attr("href","<?php echo home_url(); ?>/de/einrichtungen/");
		$("#menu-item-1554 a:first").attr("href","<?php echo home_url(); ?>/de/kinder/");
		
		$("header .sub-menu").prev().css('cursor','default !important');
		$('header #nav li .spanArrow').live('click', function(event) {        
			//$(".sub-menu").prev().attr("href","javascript:void(0);");
			
			$(this).prev().slideToggle();
		});
		$('.sub-menu').closest('li').append('<span class="spanArrow"></span>');

//
		//$('#nav > li > ul > li > a').live('click', function(event) {        
	//		$('#nav > li > ul > li > ul').slideToggle();
		//});

	});
	
</script>	
<!--///////////////////////////////////////////////////////////////////////////////////////////////////
//
//		jQuery fancyBox scripts
//
///////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php if ( is_page_template('brochures-images.php') ) : ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-thumbs.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.thumb.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox-thumbs.css" />

<?php if(isset($_SESSION['device_type_str']) && !empty($_SESSION['device_type_str'])){
		if($_SESSION['device_type_str']=='iPhone')
		{
?>
<script type="text/javascript">
    $(document).ready(function() {
		//alert("if");
		$("[rel='fancybox-thumb']").fancybox({
				helpers : {
					thumbs : false
				}
			});
    });
</script>
<?php }else{ ?>
<script type="text/javascript">
    $(document).ready(function() {
    	//alert("else");
		$("[rel='fancybox-thumb']").fancybox({
				helpers : {
					thumbs : true
				}
			});
    });
</script>
<?php } 
} ?>
<?php endif; ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5lightbox.js"></script>
<?php wp_head(); ?>
</head>

<?php if( is_home() || is_front_page() ): ?>
<body>
		
<?php else: ?>
	<?php
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		$custom_image = get_field('detail_page_image', $page_id);
		
		if(get_field('detail_page_image', $page_id)){
			?>
				<style type="text/css">
					#content-slide {
						background-image: url(<?php echo $custom_image; ?>) !important;
						-webkit-background-size: cover !important;
			  			-moz-background-size: cover !important;
			  			-o-background-size: cover !important;
			  			background-size: cover !important;
					}
				</style>
			<?php
		}else{
			?>
				<style type="text/css">
					#content-slide {
						background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
						min-height: 800px !important;
						max-height: 800px !important;
						background-size: auto 100% !important;
					}
				</style>
			<?php
		}
	?>
	<body class="inner-page">
<?php endif; ?>
	
<!--main -->
	<header>
		<?php
			$page = get_query_var('paged');	
			
			// Creating session for flags			
			if(isset($_POST['pt'])){
				
				$_SESSION['flag'] = "pt"; // Portuguese
				
			}elseif(isset($_POST['uk'])){
				
				$_SESSION['flag'] = "uk"; // UK English
				
			}elseif(isset($_POST['de'])){
				
				$_SESSION['flag'] = "de"; // German
				
			}elseif(isset($_POST['es'])){
				
				$_SESSION['flag'] = "es"; // Spanish
				
			}elseif(isset($_POST['fr'])){
				
				$_SESSION['flag'] = "fr"; // French
				
			}elseif(isset($_POST['it'])){
				
				$_SESSION['flag'] = "it"; // Italian
				
			}elseif(isset($_POST['nl'])){
				
				$_SESSION['flag'] = "nl"; // Dutch
				
			}elseif(isset($_POST['ru'])){
				
				$_SESSION['flag'] = "ru"; // Russian
				
			}elseif(isset($_POST['cn'])){
				
				$_SESSION['flag'] = "cn"; // Chinese
				
			}elseif(!$_POST and !isset($page)){

				$_SESSION['flag'] = "uk"; // Default UK English
				
			}
		?>
		<?php
    		$header_post = array( 'post_type' => 'header' );
			$header = new WP_Query( $header_post );
				
			if ( $header->have_posts() ) : $header->the_post();
		?>
	 		<div class="logo">
	        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_field('logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
	        </div> 	  
	        <div class="head-top ff-right" >
	        	
	        	<?php $webcam = get_post(821); ?>
		        <a class="webcam ff-right" href="<?php echo get_permalink(821); ?>" title="<?php echo $webcam->post_title; ?>">
		        	<img src="<?php echo get_template_directory_uri(); ?>/images/web-cam.png" alt="Webcam" />
		        </a>
		        
	            <a class="lang" id="hideshow" href="javascript:void(0);"></a>
	            
	            <ul id="content" class="ff-right">
	                <li>
	                	<form id="pt_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('pt_flag').submit();" title="Portuguese" <?php if($_SESSION['flag'] == 'pt'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_1'); ?>" alt="Portuguese" />
		                	</a>
		                	<input type="hidden" name="pt" value="pt" />
		                </form>
	                </li>
	                
	                <li>
	                	<form id="uk_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('uk_flag').submit();" title="English" <?php if($_SESSION['flag'] == 'uk'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_2'); ?>" alt="English" />
		                	</a>
		                	<input type="hidden" name="uk" value="uk" />
		                </form>
	                </li>
	                
	                <li>
	                	<form id="de_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('de_flag').submit();" title="German" <?php if($_SESSION['flag'] == 'de'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_3'); ?>" alt="German" />
		                	</a>
		                	<input type="hidden" name="de" value="de" />
	                	</form>
	                </li>
	                
	                <li>
	                	<form id="es_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('es_flag').submit();" title="Spanish" <?php if($_SESSION['flag'] == 'es'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_4'); ?>" alt="Spanish" />
		                	</a>
		                	<input type="hidden" name="es" value="es" />
		                </form>
	                </li>
	                
	                <li>
	                	<form id="fr_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('fr_flag').submit();" title="French" <?php if($_SESSION['flag'] == 'fr'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_5'); ?>" alt="French" />
		                	</a>
		                	<input type="hidden" name="fr" value="fr" />
		                </form>
	                </li>
	                
	                <li>
	                	<form id="it_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('it_flag').submit();" title="Italian" <?php if($_SESSION['flag'] == 'it'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_6'); ?>" alt="Italian" />
		                	</a>
		                	<input type="hidden" name="it" value="it" />
		                </form>
	                </li>
	                
	                <li>
	                	<form id="nl_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('nl_flag').submit();" title="Dutch" <?php if($_SESSION['flag'] == 'nl'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_7'); ?>" alt="Dutch" />
		                	</a>
		                	<input type="hidden" name="nl" value="nl" />
		                </form>
	                </li>
	                
	                <li>
	                	<form id="ru_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('ru_flag').submit();" title="Russian" <?php if($_SESSION['flag'] == 'ru'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_9'); ?>" alt="Russian" />
		                	</a>
		                	<input type="hidden" name="ru" value="ru" />
		                </form>
	                </li>
	                	                
	                <li>
	                	<form id="cn_flag" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		                	<a href="javascript:void(0);" onclick="document.getElementById('cn_flag').submit();" title="Chinese" <?php if($_SESSION['flag'] == 'cn'){ echo "class='flag_active'"; } ?>>
		                		<img src="<?php echo get_field('flag_8'); ?>" alt="Chinese" />
		                	</a>
		                	<input type="hidden" name="cn" value="cn" />
	                	</form>
	                </li>
	                
	            </ul>
		<?php endif; ?>
	            
	            <span class="hd-cntct ff-right">
	            	<?php
	           			 if($_SESSION['flag'] == 'pt'){
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>pt/contactos">Contacte Nos</a> </span>  
					<?php
						}elseif($_SESSION['flag'] == 'uk'){
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>uk/contacts">Contact Us</a> </span>  
					<?php
						}elseif($_SESSION['flag'] == 'de'){
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>de/kontakt">Kontakt</a> </span>  
					<?php
						}elseif($_SESSION['flag'] == 'es'){
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>es/contactos">Contactos</a> </span>  
					<?php
						}elseif($_SESSION['flag'] == 'fr'){					
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>fr/nous-contacter">Nous Contacter</a> </span>  
					<?php
						}elseif($_SESSION['flag'] == 'it'){					
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>it/contatti">Contatti</a> </span>  
					<?php
						}elseif($_SESSION['flag'] == 'nl'){
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>nl/contacten">Contacten</a> </span>  
					<?php
						}elseif($_SESSION['flag'] == 'ru'){
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>ru/обращайтесь-к-нам">Обращайтесь к нам</a> </span>  
					<?php
						}elseif($_SESSION['flag'] == 'cn'){
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>cn/联络我们">联络我们</a> </span>  
					<?php
						}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
					?>
					<span class="cnt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>uk/contacts">Contact Us</a> </span>  
					<?php
						}?>	                 	
					<?php
						$header_post = array( 'post_type' => 'header' );
						$header = new WP_Query( $header_post );
							
						if ( $header->have_posts() ) : $header->the_post();
					?>
					
					<?php
	           			 if($_SESSION['flag'] == 'pt'){
					?>
				
					<a class="mailto" href="<?php echo esc_url( home_url( '/' ) ); ?>pt/contactos"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a>
					<?php
						}elseif($_SESSION['flag'] == 'uk'){
					?>
					<a class="mailto" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/contacts"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a> 
					<?php
						}elseif($_SESSION['flag'] == 'de'){
					?>
					<a class="mailto"  href="<?php echo esc_url( home_url( '/' ) ); ?>de/kontakt"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a> 
					<?php
						}elseif($_SESSION['flag'] == 'es'){
					?> 
					<a class="mailto" href="<?php echo esc_url( home_url( '/' ) ); ?>es/contactos"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a> 
					<?php
						}elseif($_SESSION['flag'] == 'fr'){					
					?>
					<a class="mailto"  href="<?php echo esc_url( home_url( '/' ) ); ?>fr/nous-contacter"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a> 
					<?php
						}elseif($_SESSION['flag'] == 'it'){					
					?>
					<a class="mailto" href="<?php echo esc_url( home_url( '/' ) ); ?>it/contatti"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a>  
					<?php
						}elseif($_SESSION['flag'] == 'nl'){
					?>  
					<a class="mailto" href="<?php echo esc_url( home_url( '/' ) ); ?>nl/contacten"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a> 
					<?php
						}elseif($_SESSION['flag'] == 'ru'){
					?>
					<a class="mailto" href="<?php echo esc_url( home_url( '/' ) ); ?>ru/обращайтесь-к-нам"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a> 
					<?php
						}elseif($_SESSION['flag'] == 'cn'){
					?> 
					<a class="mailto" href="<?php echo esc_url( home_url( '/' ) ); ?>cn/联络我们"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a> 
					<?php
						}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
					?>
				
			<a class="mailto" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/contacts"><span class="tel"><span>Tel:</span> <?php echo get_field('tel'); ?></span></a> 
					<?php
						}?>	                 	
	                <a class="mailto" href="mailto:<?php echo get_field('email'); ?>"><span class="email"><span>Email:</span><?php echo get_field('email'); ?></span></a>
	            </span>
	        </div>
        <?php endif; ?>
        
        <div class="clear-r"></div>
        <nav>
        
        	<a id="menu-trigger" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/mimg.png"></a>
            <?php
	            if($_SESSION['flag'] == 'pt'){

					wp_nav_menu( array('menu' => 'header-pt', 'menu_id' => 'nav', 'fallback_cb' => false ));
					
				}elseif($_SESSION['flag'] == 'uk'){

					wp_nav_menu( array('menu' => 'header-uk', 'menu_id' => 'nav', 'fallback_cb' => false ));
					
				}elseif($_SESSION['flag'] == 'de'){
					
					wp_nav_menu( array('menu' => 'header-de', 'menu_id' => 'nav','fallback_cb' => false ));
					
				}elseif($_SESSION['flag'] == 'es'){
					
					wp_nav_menu( array('menu' => 'header-es', 'menu_id' => 'nav','fallback_cb' => false ));
					
				}elseif($_SESSION['flag'] == 'fr'){
					
					wp_nav_menu( array('menu' => 'header-fr', 'menu_id' => 'nav','fallback_cb' => false ));
					
				}elseif($_SESSION['flag'] == 'it'){
					
					wp_nav_menu( array('menu' => 'header-it', 'menu_id' => 'nav','fallback_cb' => false ));
					
				}elseif($_SESSION['flag'] == 'nl'){
					
					wp_nav_menu( array('menu' => 'header-nl', 'menu_id' => 'nav','fallback_cb' => false ));
					
				}elseif($_SESSION['flag'] == 'ru'){
					
					wp_nav_menu( array('menu' => 'header-ru', 'menu_id' => 'nav','fallback_cb' => false ));
					
				}elseif($_SESSION['flag'] == 'cn'){
					
					wp_nav_menu( array('menu' => 'header-cn', 'menu_id' => 'nav','fallback_cb' => false ));
					
				}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
					
					wp_nav_menu( array('menu' => 'header-uk', 'menu_id' => 'nav','fallback_cb' => false ));
					
				}
			if( is_home() || is_front_page() || is_page('Accommodation') || is_page('Facilities') || is_page('Kids') || is_page('Restaurants')
			|| is_page('Alojamento')|| is_page('Restaurantes')|| is_page('Facilidades')|| is_page('criancas')
			|| is_page('ferienhauser')|| is_page('restaurants')|| is_page('einrichtungen')|| is_page('kinder')
			|| is_page('Alojamiento')|| is_page('Restaurantes')|| is_page('Zonas de Ocio')|| is_page('Niños')): ?>
			 
			  <a id="check" href="#">Book Now</a>
			<?php endif; ?>
        </nav>

    </header>
