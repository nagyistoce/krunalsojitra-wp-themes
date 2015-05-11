<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="page-content">
	<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12 blog-page">
					<div class="row">
						<div class="col-md-9 col-sm-4 article-block">
							<?php while(have_posts()):the_post(); ?>
							<div class="row">
								<div class="col-md-4 blog-img blog-tag-data">
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'single-post-thumbnail' ); ?>
									<img src="<?php echo $image[0]; ?>" alt="" class="img-responsive">
									<ul class="list-inline">
										<li>
											<i class="fa fa-calendar"></i>
											<a href="#">
												<?php echo date('F j, Y',strtotime(get_the_date())); ?>
											</a>
										</li>
										<li>
											<i class="fa fa-comments"></i>
											<?php comments_popup_link(); ?>
										</li>
									</ul>
									<ul class="list-inline blog-tags">
										<li>
											<i class="fa fa-tags"></i>
											<?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?>
										</li>
									</ul>
								</div>
								<div class="col-md-8 blog-article">
									<h3>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p><?php the_excerpt(); ?></p>
									<a class="btn blue" href="<?php the_permalink(); ?>">
										 Read more <i class="m-icon-swapright m-icon-white"></i>
									</a>
								</div>
							</div>
							<hr>
							<?php endwhile; ?>
						</div>
						<!--end col-md-9-->
						<div class="col-md-3 blog-sidebar">
							<?php dynamic_sidebar('sidebar-1'); ?>
						</div>
						<!--end col-md-3-->
					</div>
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
	<!-- END PAGE CONTENT-->
</div>
<?php
get_footer();
