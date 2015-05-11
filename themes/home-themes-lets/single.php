<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php
 $page_id  = get_queried_object_id(); // Get current page id 
$category = get_the_category();
 $category_name = $category[0]->cat_name;
?>

<?php if($category_name == 'News Page' || $category_name == 'Career' || $category_name == 'Case Studies' || $category_name == 'Event'){?>

<?php include (TEMPLATEPATH . '/single-news.php'); ?>
<?php //echo $category_name;?>	
<?php }else{?>


<!------------------------------------------------------------------Normal post layout---------------------------------------------------->
<!--inner-page -->
	<div class="inner-page blog new-blogcss">
 	<!--banner -->
    	<?php $banner_image = get_field('page_banner', $page_id);    
    		if($banner_image != ''){ ?>
       <style>
       	.inner-page .banner{background: url("<?php echo $banner_image; ?>");}
       </style>
       <?php } ?>
        <div class="banner ff-left">
            <div class="container">
             	<?php $args = array(
					'post_type'=> 'random_tips',
					'orderby'    => 'rand',
					'posts_per_page' => 1
				);
				query_posts( $args ); ?>
					<?php while ( have_posts() ) : the_post(); ?>
             			<h4><?php the_content(); ?></h4>
                    <?php endwhile; wp_reset_query(); ?>
                 </div>
        </div>
         <!--banner -->
       
        <!--blogs -->
        <div class="blogs">
        	<!--container -->
        	<div class="container">
            	<!--blog-left -->
            	<div class="blog-left ff-left cont_design">
            			<?php while(have_posts()):the_post(); ?>
                	<article>
                    	<div class="date ff-left">
                        	<em><?php echo date('j',strtotime(get_the_date())); ?></em>
                            <h5><?php echo date('F',strtotime(get_the_date())); ?></h5>
                            
                        </div>
                        
                        <div class="blog-detail">
                        	<h1 class="head-title"><?php the_title(); ?></h1>
                          <em>Posted on
                            	<span><?php echo date('F j, Y',strtotime(get_the_date())); ?></span>
                            	by
                            	<span><?php the_author_nickname(); ?></span>
                            	<span><?php $category = get_the_category(); //echo $category[0]->cat_name;?></span>
                            	
                            </em>
                            <div class="catname_riter">
        				
          					</div>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'single-post-thumbnail' );
							
								if($image != ''){
									?>
								  <img src="<?php echo $image[0]; ?>">
								   <?php
								}									
							 ?>
                            
                          
                            
                           	<p><?php the_content(); ?></p>
                           
                            
                        </div>

                    <p class="next_prev"><?php previous_post('%', 'Previous', 'no'); ?> <span id="seperator" style="visibility: hidden;">|</span> <?php next_post('%', 'Next', 'no'); ?></p>
                    </article>
                   
                    <?php endwhile; ?>
                    
                   </div>
				<!--blog-left -->	
<script>
jQuery(document).ready(function(){
	var check_next = $(".next_prev a").length;
	if(check_next == 2){
		$("#seperator").css("visibility", "visible");
	}
});
</script>               
<?php get_sidebar();?>
            </div>
            <!--container -->
        </div>
        <!--blogs -->
		
	 </div>
    <!--inner-page -->
<?php }
get_footer();
