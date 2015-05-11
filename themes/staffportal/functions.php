<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function staffportal_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'staffportal' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'staffportal', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'staffportal' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'staffportal_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function staffportal_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'staffportal' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'staffportal' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function staffportal_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'staffportal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	$font_url = staffportal_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'staffportal-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'staffportal-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'staffportal-ie', get_template_directory_uri() . '/css/ie.css', array( 'staffportal-style' ), '20121010' );
	$wp_styles->add_data( 'staffportal-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'staffportal_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses staffportal_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function staffportal_mce_css( $mce_css ) {
	$font_url = staffportal_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'staffportal_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function staffportal_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'staffportal' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'staffportal_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function staffportal_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'staffportal_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */

function staffportal_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Menu', 'staffportal' ),
		'id' => 'sidebarmenu',
		'description' => __( 'Appears on events page', 'staffportal' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'staffportal_widgets_init' );

if ( ! function_exists( 'staffportal_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function staffportal_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>

<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
  <h3 class="assistive-text">
    <?php _e( 'Post navigation', 'staffportal' ); ?>
  </h3>
  <div class="nav-previous">
    <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'staffportal' ) ); ?>
  </div>
  <div class="nav-next">
    <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'staffportal' ) ); ?>
  </div>
</nav>
<!-- #<?php echo $html_id; ?> .navigation -->
<?php endif;
}
endif;

if ( ! function_exists( 'staffportal_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own staffportal_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function staffportal_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php _e( 'Pingback:', 'staffportal' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'staffportal' ), '<span class="edit-link">', '</span>' ); ?>
  </p>
  <?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <article id="comment-<?php comment_ID(); ?>" class="comment">
    <header class="comment-meta comment-author vcard">
      <?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'staffportal' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'staffportal' ), get_comment_date(), get_comment_time() )
					);
				?>
    </header>
    <!-- .comment-meta -->
    
    <?php if ( '0' == $comment->comment_approved ) : ?>
    <p class="comment-awaiting-moderation">
      <?php _e( 'Your comment is awaiting moderation.', 'staffportal' ); ?>
    </p>
    <?php endif; ?>
    <section class="comment-content comment">
      <?php comment_text(); ?>
      <?php edit_comment_link( __( 'Edit', 'staffportal' ), '<p class="edit-link">', '</p>' ); ?>
    </section>
    <!-- .comment-content -->
    
    <div class="reply">
      <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'staffportal' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <!-- .reply --> 
  </article>
  <!-- #comment-## -->
  <?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'staffportal_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own staffportal_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function staffportal_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'staffportal' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'staffportal' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'staffportal' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'staffportal' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'staffportal' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'staffportal' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function staffportal_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'staffportal-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'staffportal_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function staffportal_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'staffportal_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function staffportal_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'staffportal_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function staffportal_customize_preview_js() {
	wp_enqueue_script( 'staffportal-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'staffportal_customize_preview_js' );


function my_login_logo() { ?>
  <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/logo.png);
            padding-bottom: 0px;
        }
		body.login div#login h1 {
    background: #228BB9;
    margin-bottom: 15px;
    margin-left: 8px;
    padding-top: 8px;
    width: 310px;
}
    </style>
  <?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );  

//register custom post
add_action ('init', 'create_post_type');

function create_post_type() {

register_post_type('upcoming_events',
		array(
			'labels' => array(
				'name' => __('Upcoming Events'),
				'singular_name' => __('Upcoming Events')
			),
			'public' => true,
			'has_rewrite' => true,
			'rewrite' => array('slug' => 'upcoming_events'),
			'supports' => array('title')
		)
	);
	
register_post_type('documents',
		array(
			'labels' => array(
				'name' => __('Documents Limited Risk'),
				'singular_name' => __('Documents Limited Risk')
			),
			'public' => true,
			'has_rewrite' => true,
			'rewrite' => array('slug' => 'documents'),
			'supports' => array('title')
		)
	);
	
register_post_type('staff_induction',
		array(
			'labels' => array(
				'name' => __('Staff Induction'),
				'singular_name' => __('Staff Induction')
			),
			'public' => true,
			'has_rewrite' => true,
			'rewrite' => array('slug' => 'staff_induction'),
			'supports' => array('title')
		)
	);	
	
	
	
}

function get_userid() {
	 $current_user = wp_get_current_user();
		//echo $current_user->ID;
	
//echo strlen($current_user->ID); 
	if(strlen($current_user->ID) == 4){
	 $new_user_id = 'LR'.$current_user->ID;
	}
elseif(strlen($current_user->ID) == 3){
	 $new_user_id = 'LR0'.$current_user->ID;
	}
elseif(strlen($current_user->ID) == 2){
	 $new_user_id = 'LR00'.$current_user->ID;
	}
else{
	 $new_user_id = 'LR000'.$current_user->ID;
	}
	echo $new_user_id;
}


/**
 * Redirect non-admins to the homepage after logging into the site.
 *
 * @since 	1.0
 */
 
 // login redirect
function soi_login_redirect( $redirect_to, $request, $user  ) {
	return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? admin_url('') : site_url('/staff-induction');
} // end soi_login_redirect
add_filter( 'login_redirect', 'soi_login_redirect', 10, 3 );



//menu register
register_nav_menus( array(
	'sidebar_menu' => 'Sidebar Menu'
) );

//wordpress update clode
add_action('admin_menu','wphidenag');
function wphidenag() {
remove_action( 'admin_notices', 'update_nag', 3 );
}


//Register Form 
 //1. Add a new form element...
    add_action('register_form','myplugin_register_form');
    function myplugin_register_form (){
        //$first_name = ( isset( $_POST['first_name'] ) ) ? $_POST['first_name']: '';
		$last_name = ( isset( $_POST['last_name'] ) ) ? $_POST['last_name']: '';
		$phone_number = ( isset( $_POST['phone_number'] ) ) ? $_POST['phone_number']: '';
		$datestr = ( isset( $_POST['date_of_birth_day'] ) && isset( $_POST['date_of_birth_mnth'] ) && isset( $_POST['date_of_birth_yr'] ) ) ? $_POST['date_of_birth_day']."-".$_POST['date_of_birth_day']."-".$_POST['date_of_birth_day']: '';
		$pin_supplied_date = ( isset( $_POST['pin_supli_mnth'] ) && isset( $_POST['pin_supli_yr'] ) ) ? $_POST['pin_supli_mnth']."/".$_POST['pin_supli_yr']: '';
		 $accept_terms_of_use = ( isset( $_POST['accept_terms_of_use'] ) ) ? $_POST['accept_terms_of_use']: '';

        ?>
  <div class="lol7_6">
    <div class="lol7_4">
      <label for="user_login">
        <?php _e('First Name') ?>
      </label>
    </div>
    <div class="lol7_5">
      <input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr(wp_unslash($user_login)); ?>" size="20"  placeholder="First Name" />
    </div>
  </div>
  <input type="hidden" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(wp_unslash($user_login)); ?>" size="25" />
  <div class="lol7_6">
    <div class="lol7_4">
      <label for="last_name">
        <?php _e('Last Name','mydomain') ?>
      </label>
    </div>
    <div class="lol7_5">
      <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(stripslashes($last_name)); ?>" size="25"  placeholder="Last Name" />
    </div>
  </div>
  <div class="lol7_6">
    <div class="lol7_4">
      <label for="user_email">
        <?php _e('Email Address') ?>
      </label>
    </div>
    <div class="lol7_5">
      <input type="email" name="user_email" id="user_email" class="input" value="<?php echo esc_attr(wp_unslash($user_email)); ?>" size="25"  placeholder="Email Address" />
      <input type="hidden" name="email" id="email" class="input" value="<?php echo esc_attr(wp_unslash($user_email)); ?>" size="25" />
      
      
    </div>
  </div>
  <div class="lol7_6">
    <div class="lol7_4">
      <label for="phone_number">
        <?php _e('Contact Number','mydomain') ?>
      </label>
    </div>
    <div class="lol7_5">
      <input type="text" name="phone_number" id="phone_number" class="input" value="<?php echo esc_attr(stripslashes($phone_number)); ?>" size="25"  placeholder="Example: 0[10 digits] (Starts with 0)" />
    </div>
  </div>
  <div class="lol7_6">
    <div class="lol7_4">
      <label for="date_of_birth">
        <?php _e('Date of Birth','mydomain') ?>
      </label>
    </div>
    <div class="lol7_5">
      <div class="lol7_5 lol9_1">
        <input type="text" name="date_of_birth_day" id="date_of_birth_day" class="input"  size="8" placeholder="DD" />
      </div>
      <div class="lol7_5 lol9_1">
        <input type="text" name="date_of_birth_mnth" id="date_of_birth_mnth" class="input"  size="8" placeholder="MM" />
      </div>
      <div class="lol7_5 lol9_2">
        <input type="text" name="date_of_birth_yr" id="date_of_birth_yr" class="input"  size="8" placeholder="YYYY" />
      </div>
    </div>
  </div>
  <div class="lol7_6">
    <div class="lol7_4">
      <label for="pin_supplied_by_limited_risk">
        <?php _e('Pin Supplied by Limited Risk','mydomain') ?>
      </label>
    </div>
    <div class="lol7_5">
      <div class="lol7_5 lol9_3">
      
        <input name="pin_supli_mnth" type="text"  placeholder="First 4 Characters" id="pin_month" name="pin_month" required="required"/>
        <span class="invali_pin"></span>
      </div>
      <div class="lol7_5 lol9_4"> - </div>
      <div class="lol7_5 lol9_3">
        <input name="pin_supli_yr" type="text"  placeholder="Second 4 Characters" id="pin_yr" name="pin_yr" required="required"/>
        <span class="invali_pin_yr"></span>
      </div>
    </div>
  </div>
  <div class="lol7_6">
    <div class="lol7_4 lol9_5">
      <div class="lol7_7 lol7_9">
        <input type="checkbox" name="accept_terms_of_use" id="accept_terms_of_use" class="input" value="<?php echo esc_attr(stripslashes($accept_terms_of_use)); ?>" size="25"  />
        <label for="accept_terms_of_use">
          <?php _e('Accept Terms of Use','mydomain') ?>
        </label>
      </div>
    </div>
  </div>
  <input type="hidden" name="address" id="address" value=""  />
  <?php
    }

     //ERROR
    add_filter('registration_errors', 'myplugin_registration_errors', 10, 3);
    function myplugin_registration_errors ($errors, $sanitized_user_login, $user_email) {

       // if ( empty( $_POST['first_name'] ) )
//            $errors->add( 'first_name_error', __('<strong>ERROR</strong>: You must include a first name.','mydomain') );
//        return $errors;
		
		 if ( empty( $_POST['last_name'] ) )
            $errors->add( 'last_name_error', __('<strong>ERROR</strong>: You must include a Last Name.','mydomain') );

        return $errors;
		
		 if ( empty( $_POST['phone_number'] ) )
            $errors->add( 'phone_number_error', __('<strong>ERROR</strong>: You must include a Contact Number.','mydomain') );

        return $errors;
		
		 if ( empty( $_POST['date_of_birth'] ) )
            $errors->add( 'date_of_birth_error', __('<strong>ERROR</strong>: You must include a Date of Birth.','mydomain') );

        return $errors;
		
		  if ( empty( $_POST['pin_supplied_by_limited_risk'] ) )
            $errors->add( 'pin_supplied_by_limited_risk_error', __('<strong>ERROR</strong>: You must include a Pin Supplied by Limited Risk.','mydomain') );

        return $errors;
		 if ( empty( $_POST['accept_terms_of_use'] ) )
            $errors->add( 'accept_terms_of_use_error', __('<strong>ERROR</strong>: You must include a Accept Terms of Use.','mydomain') );

        return $errors;
    }

    //update
    add_action('user_register', 'myplugin_user_register');
    function myplugin_user_register ($user_id) {
		
        if ( isset( $_POST['user_login'] ) )
          update_user_meta($user_id, 'first_name', $_POST['user_login']);
		
			 if ( isset( $_POST['last_name'] ) )
            update_user_meta($user_id, 'last_name', $_POST['last_name']);
			
			 if ( isset( $_POST['user_email'] ) )
            update_user_meta($user_id, 'email', $_POST['user_email']);
			
			  if ( isset( $_POST['phone_number'] ) )
            update_user_meta($user_id, 'phone_number', $_POST['phone_number']);
			
			 if ( isset( $_POST['date_of_birth_day'])  && isset( $_POST['date_of_birth_mnth']) && isset( $_POST['date_of_birth_yr']))
						 $dob_day = $_POST['date_of_birth_day'];
						 $dob_month = $_POST['date_of_birth_mnth']; 
						 $dob_year = $_POST['date_of_birth_yr'];
						 $datestr = $dob_day."-".$dob_month."-".$dob_year;
            update_user_meta($user_id, 'date_of_birth', $datestr);
			
			if ( isset( $_POST['pin_supli_mnth']) && isset($_POST['pin_supli_yr']) )
						 $pin_supli_month = $_POST['pin_supli_mnth']; 
						 $pin_supli_year = $_POST['pin_supli_yr'];
						 $pin_supplied_date  = $pin_supli_month."/".$pin_supli_year;
            update_user_meta($user_id, 'pin_supplied_by_limited_risk', $pin_supplied_date);
			
			if ( isset( $_POST['accept_terms_of_use'] ) )
            update_user_meta($user_id, 'accept_terms_of_use', $_POST['accept_terms_of_use']);
			
			if ( isset( $_POST['address'] ) )
            update_user_meta($user_id, 'address', $address);
    }
	
	
	
	
	
	
// register form in home page 	
function regform(){
	?>
  <form name="registerform" id="registerform" action="<?php echo esc_url( site_url('wp-login.php?action=register', 'login_post') ); ?>" method="post">
    <?php do_action( 'register_form' );?>
    <?php
	/**
	 * Fires following the 'E-mail' field in the user registration form.
	 *
	 * @since 2.1.0
	 */
	//do_action( 'register_form' );
	?>
    <!--<p id="reg_passmail"><?php _e('A password will be e-mailed to you.') ?></p>--> 
    <br class="clear" />
    <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />
    <div class="lol7_6">
      <div class="lol7_4">
        <div class="lol7_8">
          <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Register'); ?>" />
        </div>
      </div>
    </div>
  </form>
  <?php	
	
}


//adminbar
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

