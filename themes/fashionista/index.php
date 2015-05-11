<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package aThemes
 */

get_header(); ?>
<script src="<?php bloginfo('template_url');?>/js/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="<?php bloginfo('template_url');?>/js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php bloginfo('template_url');?>/css/jquery.bxslider.css" rel="stylesheet" />
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url');?>/js/css3-multi-column.js"></script>
<![endif]-->
			<div id="primary" class="content-area homePage">
				
				<div class="Home-slider">
					<ul class="bxslider">
						<?php
							$args = array(
				                 'post_type'=>'slider'
				            );
				          	query_posts( $args ); 
							while (have_posts()) : the_post(); 
							?>
            					<li><?php the_post_thumbnail( 'full' ); ?></li>
					    
					       <?php endwhile;?>
					  
					 
					</ul>
				</div>
				<div class="service">
					<div class="sercices"><img  class="fest-banner" src="<?php bloginfo('template_url');?>/images/travel_banner_6.png" /></div>
					<div class="sercices"><img   class="fest-banner" src="<?php bloginfo('template_url');?>/images/smb2.jpg" /></div>
				</div>
			<div class="adds-google">
				<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Indian Travellers -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7370133726696427"
     data-ad-slot="2862520394"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
 
				<div class="home-post">
					<header class="page-header"><h1 class="page-title">Asia</h1></header>
					<div class="categorys">
						<?php $args = array(
							'posts_per_page'   => 2,
							'category_name'    => 'asia',
							'orderby'          => 'post_date',
							);  
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>						
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>
				</div>
				<div class="home-post">
					<header class="page-header"><h1 class="page-title">Europe</h1></header>			
					<div class="categorys">
						<?php $args = array(
							'posts_per_page'   => 2,
							'category_name'    => 'europe',
							'orderby'          => 'post_date',
							);  
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>			
							<?php ?>						
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>
				</div>
				<div class="home-post">
					<header class="page-header"><h1 class="page-title">Australia</h1></header>
					<div class="categorys">
						<?php $args = array(
							'posts_per_page'   => 2,
							'category_name'    => 'austria',
							'orderby'          => 'post_date',
							);  
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>			
							<?php ?>						
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>
				</div>
				<div class="home-post">
					<header class="page-header"><h1 class="page-title">USA</h1></header>
					<div class="categorys">
						<?php $args = array(
							'posts_per_page'   => 2,
							/*'post_type'    => 'post',*/
							'category_name'    => 'austria',
							'orderby'          => 'post_date',
							);  
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>			
							<?php ?>						
						<?php endforeach; 
						wp_reset_postdata();?>
						
					</div>
				</div>
				
				<div class="home-post">
					<header class="page-header"><h1 class="page-title">India </h1></header>
					<div class="categorys">
						<?php $args = array(
							'posts_per_page'   => 2,
							'category_name'    => 'india',
							'orderby'          => 'post_date',
							);  
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>			
							<?php ?>						
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>
				</div>
				<div class="home-post">
					<header class="page-header"><h1 class="page-title">Gujarat</h1></header>
					<div class="categorys">
						<?php $args = array(
							'posts_per_page'   => 2,
							'category_name'    => 'gujarat',
							'orderby'          => 'post_date',
							);  
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>			
							<?php ?>						
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>
				</div>
				<div class="home-post">
					<header class="page-header"><h1 class="page-title">Travel News</h1></header>
					<div class="categorys">
						<?php $args = array(
							'posts_per_page'   => 2,
							'category_name'    => 'travel-news',
							'orderby'          => 'post_date',
							);  
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>			
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>
				</div>
				<div class="home-post">
					<header class="page-header"><h1 class="page-title">Visa News</h1></header>
					<div class="categorys">
						<?php $args = array(
							'posts_per_page'   => 2,
							'category_name'    => 'visa',
							'orderby'          => 'post_date',
							);  
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>				
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>
				</div>
				
				<div class="footer-service">
					<div class="footersercices">
						<header class="page-header"><h1 class="page-title">Latest Posts</h1></header>
						<div class="indiacategorys">
							<?php $args = array(
								'posts_per_page'   => 3,
								'post_type'    => 'post',
								'orderby'          => 'post_date',
								);  
							$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
								<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>				
							<?php endforeach; 
							wp_reset_postdata();?>
							
						</div>
					</div>
					<div class="footersercices">
						<div class="newcategorys">
							<header class="page-header"><h1 class="page-title">Most Visited</h1></header>
							<div class="indiacategorys">
							
							<?php $args = array(
								'posts_per_page'   => 3,
								'orderby'          => 'DESC',
								'orderby' => 'comment_count'
								);  
							$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
								<div class="post-list">
								<div class="cate-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if ( has_post_thumbnail() ) { 
											the_post_thumbnail( 'custom-size' ); 
										}else{?>
											<img src="<?php bloginfo('template_url');?>/images/default.png" />
										<?php }?>
									</a>
								</div>
								<div class="cate-post">
									<h6><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0 , 44); ?></a></h6>
									<p><?php $excerpt = get_the_content();
											$excerpt = strip_tags($excerpt);
											echo $excerpt = substr($excerpt, 0, 100);?>...
										</p>
								</div>
							</div>			
							<?php endforeach; 
							wp_reset_postdata();?>
							
						</div>
						</div>
					</div>
				</div>
				
				
				
			<!-- #primary --></div>

<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>