<?php
/**
 * Template Name: Blog Template
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header(); ?>

	<div class="slider_ppart">
<div class="page_cont leftpart">
     
<?php
			$args = array(
			'post_type'=> 'post',
            /*'category'  => '12',*/
              'orderby' => 'post_date',
			  /*'posts_per_page'=>'1'
			'paged' => get_query_var('paged')*/
           );
            $i = 1;
			global $more; 
			query_posts( $args ); 
			while (have_posts()) : the_post(); 
			$more = 0;
		?>
  		<div class="loop_blog">
        <div class="ti_da">
       <div class="date_formt">
       <span class="sp_date"><?php the_time('d') ?></span>
        <div class="sp_month_year">
        <span class="sp_date_month"><?php the_time('M') ?></span>
        <span class="sp_date_year"><?php the_time('Y') ?></span>
       </div>
        </div>
        <div class="bg_t"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
        </div>
        <div class="catname_riter">
        <ul><li>
        <?php $category = get_the_category(); 
echo $category[0]->cat_name;?></li><li>
        <?php the_author_nickname(); ?></li></ul>
          </div>
        <div class="bl_img">
        <img src="<?php echo $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );?>" alt=""  width="200px" />
        </div>
        <div class="bl_cont">
        <?php content('60'); ?>
        </div>
        <div class="comt_red_but">
        <div class="comt_but"><a href="<?php the_permalink(); ?>">Comment</a></div>
        <div class="red_but"><a href="<?php the_permalink(); ?>">Read More..</a></div>
        </div>
        </div>
                      <?php endwhile;?>
  </div> 
 <div class="rightpt">
 <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
			<?php endif; ?>
 </div>        

</div>   
<?php get_footer(); ?>