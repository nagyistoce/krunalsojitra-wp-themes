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
<?php
$page_id  = get_queried_object_id(); // Get current page id 
?>
<!--inner-page -->
	<div class="inner-page blog">
<!--banner -->
    	<?php $banner_image = get_field('page_banner', $page_id);    	if($banner_image != ''){ ?>
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
             			<h5><?php the_content(); ?></h5>
                    <?php endwhile; wp_reset_query(); ?>
                 </div>
        </div>
         <!--banner -->
        <!--blogs -->
        <div class="blogs">
        	<!--container -->
        	<div class="container">
				  	<!--blog-left -->
            	<div class="blog-left ff-left">
            		<?php
			$args = array(
			'post_type'=> 'post',
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
                	<article>
                    	<div class="date ff-left">
                        	<em><?php echo date('j',strtotime(get_the_date())); ?></em>
                            <h5><?php echo date('F',strtotime(get_the_date())); ?></h5>
                            
                        </div>
                        
                        <div class="blog-detail">
                        	<h1 class="head-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <em>Posted on
                            	<span><?php echo date('F j, Y',strtotime(get_the_date())); ?></span>
                            	by
                            	<span><?php the_author_nickname(); ?></span>
                            	<span><?php $category = get_the_category(); //echo $category[0]->cat_name;?></span>
                            	
                            </em>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'single-post-thumbnail' );
							
								if($image != ''){
									?>
								  <img src="<?php echo $image[0]; ?>">
								   <?php
								}									
							 ?>
                            
                          
                            
                           	<?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="blog_read">Read more</a>
                            
                        </div>
                    </article>
                    <?php endwhile; ?>
                	
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
				<!--blog-left -->	
		<?php get_sidebar();?>
            </div>
            <!--container -->
        </div>
        <!--blogs -->
		
	 </div>
    <!--inner-page -->
			

<?php get_footer(); ?>