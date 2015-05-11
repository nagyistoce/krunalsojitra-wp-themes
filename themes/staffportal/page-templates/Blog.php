<?php
/**
 * Template Name: Blog Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<div class="das2_1">
					<?php the_title();?>
				</div>
				<div class="das2_2 ped14">
                    <div class="all_blog">        
								<!-- Blog start-->
                                 <?php
			$args = array(
			'post_type'=> 'post',
            /*'category'  => '12',*/
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
        <img src="<?php echo $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );?>" alt=""  width="273px" />
        </div>
        <div class="bl_cont">
        <?php the_excerpt(); ?>
        </div>
        <div class="comt_red_but">
        <!--<div class="comt_but"><a href="<?php the_permalink(); ?>">Comment</a></div>-->
        <div class="red_but"><a href="<?php the_permalink(); ?>">Read More..</a></div>
        </div>
        </div>
                      <?php endwhile;?>
                      <?php wp_pagenavi(); ?>
                            </div>   <!-- all blog end-->  
                                
						</div>
			</div>
			<?php get_sidebar(); ?>
<?php get_footer(); ?>