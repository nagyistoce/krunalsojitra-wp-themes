<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js ie7 lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js ie8 lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title( '|', true, 'right' ); ?></title>

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">


  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  		
  		<link href="<?php echo get_template_directory_uri(); ?>/library/css/toastr.min.css" rel="stylesheet" type="text/css" />
  		
  		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery.min.js"></script>
  		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery.cookie.js"></script>
    	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/html5.js"></script>
    	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery.validate.js"></script>
    	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/additional-methods.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/toastr.min.js"></script>
		
		<script type="text/javascript">
			jQuery(window).load(function(){
				$('#user_login').attr( 'placeholder', 'Username' );
				$('#user_pass').attr( 'placeholder', 'Password' );
			});
		</script>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/xos8hto.js"></script>
		<script src="//use.typekit.net/saa5jve.js"></script> <script>try{Typekit.load();}catch(e){}</script>
		<script>try{Typekit.load();}catch(e){}</script>
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		<!--[if IE 7]>
		    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/csswizardry-grids-ie7-polyfill.min.js"></script>
		<![endif]-->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->
		<!--<link rel="stylesheet" type="text/css" href="<?php //echo get_template_directory_uri(); ?>/library/res.css"> -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/css/bootstrap-select.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
    	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/jquery-ui.js"></script>
    	<link href="<?php echo get_template_directory_uri(); ?>/library/css/jquery-ui.css" rel="stylesheet" type="text/css" />

		
<script type="text/javascript">
	 $(document).ready(function(){
		$('.stng').on('click', function(event) {        
			 $('.stng ul').slideToggle();
		});

	
	});
</script>

<script>
	$(document).ready(function(){
		$('.comment-section #edite').live('click', function(event) {        
			 //$('.comment-section #editcomment').slideToggle();
			 $(this).closest("div").find('form').slideToggle();
		});
	});
</script>
	</head>

	<body <?php body_class(); ?>>
<?php bloginfo_new();?> 
	<div id="container">

			<header class="header" role="banner">

				<div class="inner-header wrap">

					<div class="grid">

						<div class="logo-main">
							<a href="<?php echo home_url(); ?>" rel="nofollow" class="logo" title="E-pray">
								<?php
								if ( $logo = get_theme_mod('logo') ) {
									echo '<img src="'.$logo.'" alt="'.get_bloginfo('name').'">';
								} else {
									bloginfo('name');
								} ?>
							</a>
							<?php // bloginfo('description'); ?>
						</div>
						<div class="nav-main">
							<nav role="navigation">
								<?php if(is_user_logged_in()){?> 
													<?php bones_main_nav(); ?>  
                                             <?php }?> 
													
										    
							</nav>
						</div>

					</div><!-- end .grid -->

				</div> <!-- end .inner-header -->

			</header> <!-- end header -->
<?php if(is_page( 'notifications' )){
	
}elseif(is_page( 'prayer-list' )){
		
}elseif(is_page( 'cares' )){
	
}elseif(is_page( 'explore' )){
		
}else{?>
		<style>
			.menu-item-home{ border-bottom: 9px solid #2c5895;
    cursor: pointer;
    padding-bottom: 15px;}
    @media only screen and (max-width: 767px) {
    	.menu-item-home{ border-bottom: 3px solid #2c5895;
    cursor: pointer;
    padding-bottom: 0;}
    }
		</style>
<?php }?>