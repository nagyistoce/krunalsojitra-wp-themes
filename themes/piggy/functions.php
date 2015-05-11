<?php

/**

 * Twenty Twelve functions and definitions.

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

 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */



/**

 * Sets up the content width value based on the theme's design and stylesheet.

 */

if ( ! isset( $content_width ) )

	$content_width = 625;



/**

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

function twentytwelve_setup() {

	/*

	 * Makes Twenty Twelve available for translation.

	 *

	 * Translations can be added to the /languages/ directory.

	 * If you're building a theme based on Twenty Twelve, use a find and replace

	 * to change 'twentytwelve' to the name of your theme in all the template files.

	 */

	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );



	// This theme styles the visual editor with editor-style.css to match the theme style.

	add_editor_style();



	// Adds RSS feed links to <head> for posts and comments.

	add_theme_support( 'automatic-feed-links' );



	// This theme supports a variety of post formats.

	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );



	// This theme uses wp_nav_menu() in one location.

	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );



	/*

	 * This theme supports custom background color and image, and here

	 * we also set up the default background color.

	 */

	add_theme_support( 'custom-background', array(

		'default-color' => 'e6e6e6',

	) );



	// This theme uses a custom image size for featured images, displayed on "standard" posts.

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

}

add_action( 'after_setup_theme', 'twentytwelve_setup' );



/**

 * Adds support for a custom header image.

 */

require( get_template_directory() . '/inc/custom-header.php' );



/**

 * Returns the Google font stylesheet URL if available.

 *

 * The use of Open Sans by default is localized. For languages that use

 * characters not supported by the font, the font can be disabled.

 *

 * @since Twenty Twelve 1.2

 *

 * @return string Font stylesheet or empty string if disabled.

 */

function twentytwelve_get_font_url() {

	$font_url = '';



	/* translators: If there are characters in your language that are not supported

	 by Open Sans, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {

		$subsets = 'latin,latin-ext';



		/* translators: To add an additional Open Sans character subset specific to your language, translate

		 this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */

		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );



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

 * Enqueues scripts and styles for front-end.

 *

 * @since Twenty Twelve 1.0

 */

function twentytwelve_scripts_styles() {

	global $wp_styles;



	/*

	 * Adds JavaScript to pages with the comment form to support

	 * sites with threaded comments (when in use).

	 */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );



	/*

	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.

	 */

	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );



	$font_url = twentytwelve_get_font_url();

	if ( ! empty( $font_url ) )

		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );



	/*

	 * Loads our main stylesheet.

	 */

	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );



	/*

	 * Loads the Internet Explorer specific stylesheet.

	 */

	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );

	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );

}

add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );



/**

 * Adds additional stylesheets to the TinyMCE editor if needed.

 *

 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.

 *

 * @since Twenty Twelve 1.2

 *

 * @param string $mce_css CSS path to load in TinyMCE.

 * @return string

 */

function twentytwelve_mce_css( $mce_css ) {

	$font_url = twentytwelve_get_font_url();



	if ( empty( $font_url ) )

		return $mce_css;



	if ( ! empty( $mce_css ) )

		$mce_css .= ',';



	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );



	return $mce_css;

}

add_filter( 'mce_css', 'twentytwelve_mce_css' );



/**

 * Creates a nicely formatted and more specific title element text

 * for output in head of document, based on current view.

 *

 * @since Twenty Twelve 1.0

 *

 * @param string $title Default title text for current view.

 * @param string $sep Optional separator.

 * @return string Filtered title.

 */

function twentytwelve_wp_title( $title, $sep ) {

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

		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );



	return $title;

}

add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );



/**

 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.

 *

 * @since Twenty Twelve 1.0

 */

function twentytwelve_page_menu_args( $args ) {

	if ( ! isset( $args['show_home'] ) )

		$args['show_home'] = true;

	return $args;

}

add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );



/**

 * Registers our main widget area and the front page widget areas.

 *

 * @since Twenty Twelve 1.0

 */

function twentytwelve_widgets_init() {

	register_sidebar( array(

		'name' => __( 'After Ordering ', 'twentytwelve' ),

		'id' => 'after_ordering',

		'description' => __( 'After Ordering ', 'twentytwelve' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h2>',

		'after_title' => '</h2>',

	) );



	register_sidebar( array(

		'name' => __( 'Footer Menu', 'twentytwelve' ),

		'id' => 'footer_menu',

		'description' => __( 'Footer Menu', 'twentytwelve' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );



	register_sidebar( array(

		'name' => __( 'Footer Contact Us', 'twentytwelve' ),

		'id' => 'footer_contact_us',

		'description' => __( 'Footer Contact Us', 'twentytwelve' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );

}

add_action( 'widgets_init', 'twentytwelve_widgets_init' );

register_nav_menus( array(
	'footer_menu' => 'Footer Menu'
) );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :

/**

 * Displays navigation to next/previous pages when applicable.

 *

 * @since Twenty Twelve 1.0

 */

function twentytwelve_content_nav( $html_id ) {

	global $wp_query;



	$html_id = esc_attr( $html_id );



	if ( $wp_query->max_num_pages > 1 ) : ?>

<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
  <h3 class="assistive-text">
    <?php _e( 'Post navigation', 'twentytwelve' ); ?>
  </h3>
  <div class="nav-previous">
    <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?>
  </div>
  <div class="nav-next">
    <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
  </div>
</nav>
<!-- #<?php echo $html_id; ?> .navigation -->

<?php endif;

}

endif;



if ( ! function_exists( 'twentytwelve_comment' ) ) :

/**

 * Template for comments and pingbacks.

 *

 * To override this walker in a child theme without modifying the comments template

 * simply create your own twentytwelve_comment(), and that function will be used instead.

 *

 * Used as a callback by wp_list_comments() for displaying the comments.

 *

 * @since Twenty Twelve 1.0

 */

function twentytwelve_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;

	switch ( $comment->comment_type ) :

		case 'pingback' :

		case 'trackback' :

		// Display trackbacks differently than normal comments.

	?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php _e( 'Pingback:', 'twentytwelve' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
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

						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''

					);

					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',

						esc_url( get_comment_link( $comment->comment_ID ) ),

						get_comment_time( 'c' ),

						/* translators: 1: date, 2: time */

						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )

					);

				?>
    </header>
    <!-- .comment-meta -->
    
    <?php if ( '0' == $comment->comment_approved ) : ?>
    <p class="comment-awaiting-moderation">
      <?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?>
    </p>
    <?php endif; ?>
    <section class="comment-content comment">
      <?php comment_text(); ?>
      <?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
    </section>
    <!-- .comment-content -->
    
    <div class="reply">
      <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <!-- .reply --> 
    
  </article>
  <!-- #comment-## -->
  
  <?php

		break;

	endswitch; // end comment_type check

}

endif;



if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :

/**

 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.

 *

 * Create your own twentytwelve_entry_meta() to override in a child theme.

 *

 * @since Twenty Twelve 1.0

 */

function twentytwelve_entry_meta() {

	// Translators: used between list items, there is a space after the comma.

	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );



	// Translators: used between list items, there is a space after the comma.

	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );



	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',

		esc_url( get_permalink() ),

		esc_attr( get_the_time() ),

		esc_attr( get_the_date( 'c' ) ),

		esc_html( get_the_date() )

	);



	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',

		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),

		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),

		get_the_author()

	);



	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.

	if ( $tag_list ) {

		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );

	} elseif ( $categories_list ) {

		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );

	} else {

		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );

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

 * @param array Existing class values.

 * @return array Filtered class values.

 */

function twentytwelve_body_class( $classes ) {

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

	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )

		$classes[] = 'custom-font-enabled';



	if ( ! is_multi_author() )

		$classes[] = 'single-author';



	return $classes;

}

add_filter( 'body_class', 'twentytwelve_body_class' );



/**

 * Adjusts content_width value for full-width and single image attachment

 * templates, and when there are no active widgets in the sidebar.

 *

 * @since Twenty Twelve 1.0

 */

function twentytwelve_content_width() {

	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {

		global $content_width;

		$content_width = 960;

	}

}

add_action( 'template_redirect', 'twentytwelve_content_width' );



/**

 * Add postMessage support for site title and description for the Theme Customizer.

 *

 * @since Twenty Twelve 1.0

 *

 * @param WP_Customize_Manager $wp_customize Theme Customizer object.

 * @return void

 */

function twentytwelve_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}

add_action( 'customize_register', 'twentytwelve_customize_register' );



/**

 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.

 *

 * @since Twenty Twelve 1.0

 */

function twentytwelve_customize_preview_js() {

	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );

}


// wp-admin login logo change
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );

function my_custom_login_logo()
{
    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/images/logo.png)  !important; background-size:280px 89px !important; width:auto !important; } </style>';
}
add_action('login_head',  'my_custom_login_logo');




// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
  <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
  <?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
	
}
//breadcrum

	function wordpress_breadcrumbs() {

 

  $delimiter = '&raquo;';

  $name = 'Home'; //text for the 'Home' link

  $currentBefore = '<span class="current">';

  $currentAfter = '</span>';

 

  if ( !is_home() && !is_front_page() || is_paged() ) {

 

    echo '<div class="navi3">';

 

    global $post;

    $home = get_bloginfo('url');

    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

 

    if ( is_category() ) {

      global $wp_query;

      $cat_obj = $wp_query->get_queried_object();

      $thisCat = $cat_obj->term_id;

      $thisCat = get_category($thisCat);

      $parentCat = get_category($thisCat->parent);

      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));

      echo $currentBefore . 'Archive by category &#39;';

      single_cat_title();

      echo '&#39;' . $currentAfter;

 

    } elseif ( is_day() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';

      echo $currentBefore . get_the_time('d') . $currentAfter;

 

    } elseif ( is_month() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

      echo $currentBefore . get_the_time('F') . $currentAfter;

 

    } elseif ( is_year() ) {

      echo $currentBefore . get_the_time('Y') . $currentAfter;

 

    } elseif ( is_single() ) {

      $cat = get_the_category(); $cat = $cat[0];

      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

      echo $currentBefore;

      the_title();

      echo $currentAfter;

 

    } elseif ( is_page() && !$post->post_parent ) {

      echo $currentBefore;

      the_title();

      echo $currentAfter;

 

    } elseif ( is_page() && $post->post_parent ) {

      $parent_id  = $post->post_parent;

      $breadcrumbs = array();

      while ($parent_id) {

        $page = get_page($parent_id);

        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';

        $parent_id  = $page->post_parent;

      }

      $breadcrumbs = array_reverse($breadcrumbs);

      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';

      echo $currentBefore;

      the_title();

      echo $currentAfter;

 

    } elseif ( is_search() ) {

      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;

 

    } elseif ( is_tag() ) {

      echo $currentBefore . 'Posts tagged &#39;';

      single_tag_title();

      echo '&#39;' . $currentAfter;

 

    } elseif ( is_author() ) {

       global $author;

      $userdata = get_userdata($author);

      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;

 

    } elseif ( is_404() ) {

      echo $currentBefore . 'Error 404' . $currentAfter;

    }

 

    if ( get_query_var('paged') ) {

      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';

      echo __('Page') . ' ' . get_query_var('paged');

      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';

    }

 

    echo '</div>';

 

  }

}
// odd even
function oddeven_post_class ( $classes ) {
   global $current_class;
   $classes[] = $current_class;
   $current_class = ($current_class == 'odd') ? 'even' : 'odd';
   return $classes;
}
add_filter ( 'post_class' , 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';

//dashboard footer
function remove_footer_admin () {
echo 'Fueled by <a href="http://www.letsnurture.com" target="_blank">WordPress</a> | Designed by <a href="http://www.letsnurture.com" target="_blank">Letsnurture</a> | WordPress Tutorials: <a href="http://www.letsnurture.com" target="_blank">LetsBeginner</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//dashboard
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<img src="http://www.letsnurture.com/wp-content/themes/letsnurture/images/logo_letsnurture1.png"><p>Designed by <a href="http://www.letsnurture.com" target="_blank">Letsnurture</a></p>';
}

//adminbar
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
//


//register custome post
add_action ('init', 'create_post_type');

function create_post_type() {

register_post_type('testimonial',
		array(
			'labels' => array(
				'name' => __('Testimonial'),
				'singular_name' => __('Testimonial')
			),
			'public' => true,
			'has_rewrite' => true,
			'rewrite' => array('slug' => 'testimonial'),
			'supports' => array('title')
		)
	);
	
	
	register_post_type('dire_subm',
		array(
			'labels' => array(
				'name' => __('Directory Submissions'),
				'singular_name' => __('Directory Submissions')
			),
			'public' => true,
			'has_rewrite' => true,
			'rewrite' => array('slug' => 'dire_subm'),
			'supports' => array('title')
		)
	);



register_post_type('website_traffic',
		array(
			'labels' => array(
				'name' => __('Website Traffic'),
				'singular_name' => __('Website Traffic')
			),
			'public' => true,
			'has_rewrite' => true,
			'rewrite' => array('slug' => 'website_traffic'),
			'supports' => array('title')
		)
	);
	register_post_type('all_plans',
		array(
			'labels' => array(
				'name' => __('All Plans'),
				'singular_name' => __('All Plans')
			),
			'public' => true,
			'has_rewrite' => true,
			'rewrite' => array('slug' => 'all_plans'),
			'supports' => array('title')
		)
	);


}

// nav menu walker
class My_Custom_Nav_Walker extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $item_html = '';
       parent::start_el($item_html, $item, $depth, $args);

       if ( $item->is_dropdown && $depth === 0 ) {
           $item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
           $item_html = str_replace( '</a>', ' <b class="caret"></b></a>', $item_html );
       }

       $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current )
        $element->classes[] = 'active';

        $element->is_dropdown = !empty( $children_elements[$element->ID] );

        if ( $element->is_dropdown ) {
            if ( $depth === 0 ) {
                $element->classes[] = 'dropdown';
            } elseif ( $depth === 1 ) {
                // Extra level of dropdown menu, 
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                $element->classes[] = 'dropdown-submenu';
            }
        }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

//

