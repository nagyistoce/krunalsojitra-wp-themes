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

<div class="blog-content inner-page">
	<div class="">
		<div class="container">
			
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 content-left">
 
<?php
			$args = array(
			'post_type'=> 'post',
            /*'category'  => '12',*/
            'category_name'  => 'blog',
              'orderby' => 'post_date',
			  /*'posts_per_page'=>'1'*/
			'paged' => get_query_var('paged')
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
        	<?php the_post_thumbnail('custom-size');?>
        
        </div>
        <div class="bl_cont">
        <?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 400);?>...
        </div>
        <div class="comt_red_but">
        <div class="comt_but"><a href="<?php the_permalink(); ?>">Comment</a></div>
        <div class="red_but"><a href="<?php the_permalink(); ?>">Read More..</a></div>
        </div>
        </div>
                      <?php endwhile;?>
                      	<div class="numbers">
							<?php 
				// Wordpress Pagination
				$big = 999999999; // need an unlikely integer
				$links = paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'prev_text'    => '<',
					'next_text'    => '>',
					'type' => 'array'
				) );
				if(!empty($links)){ ?>
				<ul class="pagination">
						<?php
						
						foreach($links as $link){
							?>
							<li><?php echo $link; ?></li>
							<?php 
						}
						wp_reset_query(); ?>
					</ul>
					<?php } ?>
						</div>
  </div>
 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 content-right">
 <?php get_sidebar(); ?>
 </div>
  
   	</div>
	</div>
</div>	  
<?php get_footer(); ?>