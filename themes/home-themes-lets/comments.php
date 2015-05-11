<?php 
/** COMMENTS WALKER */
class lets_walker_comment extends Walker_Comment {
     
    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
 
    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>
         
        <ul id="comment-list">
         
    <?php }
     
    /** START_LVL 
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {       
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
                <hr /><ul class="children">
    <?php }
 
    /** END_LVL 
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
        </ul><!-- /.children -->
         
    <?php }
     
    /** START_EL */
    function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment; 
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
         
        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
            <div id="comment-body-<?php comment_ID() ?>" class="blog_lcomments media">
             		<a href="#" class="pull-left">
             			<?php echo get_avatar( $comment, 50); ?> 
					</a>
                	
				
                <div id="comment-content-<?php comment_ID(); ?>" class="comment-content media-body">
                	<h4 class="media-heading"><?php echo get_comment_author_link(); ?>
									<span>
										 <?php comment_date('M j, Y'); ?> /
										<?php $reply_args = array(
				                        'add_below' => $add_below, 
				                        'depth' => $depth,
				                        'max_depth' => $args['max_depth'] );
				     
				                    	comment_reply_link( array_merge( $args, $reply_args ) );  ?>
									</span>
									</h4>
                    <?php if( !$comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
                     
                    <?php else: comment_text(); ?>
                    <?php endif; ?>
                </div><!-- /.comment-content -->
 
                
            </div><!-- /.comment-body -->
 
    <?php }
 
    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
        <hr /> 
        </li><!-- /#comment-' . get_comment_ID() . ' -->
         
    <?php }
     
    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top 
     * of the comments list, just seems to balance out nicely:) */
    function __destruct() { ?>
     
    </ul><!-- /#comment-list -->
 
    <?php }
}
?>
<div id="comments-container">
    <?php wp_list_comments( array(
        'walker' => new lets_walker_comment,
        'style' => 'ul',
        'callback' => null,
        'end-callback' => null,
        'type' => 'all',
        'page' => null
    ) ); ?>
</div><!-- /#comments-container -->
<hr />
<div class="post-comment">
    <?php 
    $args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => '<h3>Leave a Comment</h3>',
	  'title_reply_to'    => __( 'Leave a Reply to %s' ),
	  'cancel_reply_link' => __( 'Cancel Reply' ),
	  'label_submit'      => __( 'Post a Comment' ),
	
	  'comment_field' =>  '<div class="form-group"><label class="control-label">Message <span class="required">*</span></label><textarea id="comment" required="" name="comment" class="col-md-10 form-control" rows="8">' . '</textarea></div>',
	
	  'must_log_in' => '<p class="must-log-in">' .
	    sprintf(
	      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</p>',
	
	  'logged_in_as' => '<p class="logged-in-as">' .
	    sprintf(
	    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>',
	
	  'comment_notes_before' => '',
	
	  'comment_notes_after' => '',
	
	  'fields' => apply_filters( 'comment_form_default_fields', array(
	
	    'author' =>
	      '<div class="form-group"><label class="control-label">Name <span class="required">*</span></label>' .
	      '<input id="author" name="author" type="text" required="required" value="' . esc_attr( $commenter['comment_author'] ) .
	      '" size="30"' . $aria_req . ' /></div>',
	
	    'email' =>
	      '<div class="form-group"><label class="control-label">Email <span class="required">*</span></label><input id="email" required="required" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      '" size="30"' . $aria_req . ' /></div>'
	    )
	  ),
	);
    comment_form($args); ?>
</div><!-- /#respond-container -->