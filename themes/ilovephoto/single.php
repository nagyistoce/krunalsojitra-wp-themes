<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="index-single full-width">
<?php	// Start the loop.
		while ( have_posts() ) : the_post();
		 $post_id = get_the_ID();
		 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
		<div id="container" class="container intro-effect-push">

		<a class="cd-primary-nav-trigger" id="trigger-menu" href="#0">
		  	<span class="cd-menu-icon"></span>
		</a>
		<!-- BOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->
		<div id="Letsnurture-search" class="Letsnurture-search">
			<form>
				<input class="Letsnurture-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
				<input class="Letsnurture-search-submit" type="submit" value="">
				<span class="Letsnurture-icon-search fa fa-search"></span>
			</form>
		</div>
		<!-- EOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->
	
			<header class="header">
				<div class="bg-img">
					
					<img  class="async-image hide" src="#" data-src="<?php echo $url = $thumb['0'];?>" alt="" />
					<div class="overlay hidden" id="overlay"></div>
				</div>
				<div class="title hidden" id="title">					
					<h1><?php the_title();?></h1>
				</div>
			</header>
			<button class="trigger scroll-down-pulse"><span>Trigger</span></button>
			<div class="title">					
				<h1 class="black"><?php the_title();?></h1>
				<?php 
				global $wpdb;
				$ip = $_SERVER['REMOTE_ADDR'];
				$checkprayelist = $wpdb -> get_var("SELECT * FROM wp_post_like WHERE ip = '$ip' and post_id = $post_id"); 
				$likecount = $wpdb -> get_var("SELECT COUNT(*) FROM wp_post_like WHERE post_id = $post_id");
				if (!isset($checkprayelist) && empty($checkprayelist)) { ?>
				<span id="<?php echo $post_id;?>" class="likepost" name="<?php echo $ip;?>"></span>
				<?php }else{ ?>
				<span class="liked"></span>
				<?php }
				if (isset($likecount) && !empty($likecount)) { ?>
					<h2 class="like_count"><?php echo trim($likecount);?></h2>
				<?php }else{ ?>
				<h2 class="like_count">0</h2>
				<?php } ?>
			</div>
			<article class="content">
				<div class="article-footer">
					<p>
						by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="hover-effect"><strong><?php the_author_nickname(); ?></strong></a>
						 &mdash; Posted on <?php the_time('M'); ?> <?php the_time('d'); ?>, <?php the_time('Y'); ?>, in <?php 
$category = get_the_category(); 
if($category[0]){
echo '<a href="'.get_category_link($category[0]->term_id ).'" data-href="Animals">'.$category[0]->cat_name.'</a>';
}
?>
					</p>
				</div>
				<div class="divider"></div>
				<div class="contener">
					<?php the_content();?>
					
					
					<ul class="imglist">
			        <?php if(get_field('gallery_images')): ?>
		           			 <?php while(has_sub_field('gallery_images')): 
		           			 	$smallimg = get_sub_field('images');
								//print_r(get_sub_field('images'));
								//echo $smallimg['sizes']['thumbnail'];
		           			 	?>
		           			 	
		            			<li><a class="fancybox-thumb" rel="fancybox-thumb" href="<?php  echo get_sub_field('images'); ?>" ><img src="<?php echo get_sub_field('images'); ?>" alt="ALT_TITLE"></a></li>
				            <?php  endwhile; ?>
			        <?php endif; ?>
			       </ul>
			        
			      
			
				<div class="article-footer">
					<div class="fullwidth">
						<h3 class="black">Share this article on:</h3>
						<div class="float-left">
							<?php echo do_shortcode( '[hupso]' );?>
							<!-- <div class="social facebook float-left">
								<a href="http://www.facebook.com/share.php?u=http://192.168.1.214/ilovephoto/india/photo-7&amp;title=I%20want%20to%20travel%20the%20world">
									<i class="fa fa-facebook"></i>
								</a>
							</div>
							<div class="social twitter float-left">
								<a href="http://twitter.com/home?status=I%20want%20to%20travel%20the%20world+http://Letsnurture.seoresearch.com/single.html">
									<i class="fa fa-twitter"></i>
								</a>
							</div>
							<div class="social googleplus float-left">
								<a href="https://plus.google.com/share?url=http://Letsnurture.seoresearch.com/single.html">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
							<div class="social linkedin float-left">
								<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://Letsnurture.seoresearch.com/single.html&amp;title=I%20want%20to%20travel%20the%20world&amp;source=http://Letsnurture.seoresearch.com/">
									<i class="fa fa-linkedin"></i>
								</a>
							</div>
							<div class="social reddit float-left">
								<a href="http://www.reddit.com/submit?url=http://Letsnurture.seoresearch.com/single.html&amp;title=I%20want%20to%20travel%20the%20world">
									<i class="fa fa-reddit"></i>
								</a>
							</div>
							<div class="social tumblr float-left">
								<a href="http://www.tumblr.com/share?v=3&amp;u=http://Letsnurture.seoresearch.com/single.html&amp;t=I%20want%20to%20travel%20the%20world">
									<i class="fa fa-tumblr"></i>
								</a>
							</div> -->
						</div> 
					</div>
					<div class="clearfix"></div>
				</div>
				<?php
						// Previous/next post navigation.
									the_post_navigation( array(
										'prev_text' => '<div class="pagination grid">
															<figure class="single-item-effect half">
																<figcaption>
																<div class="figcaption-border">
																	<h2><i class="fa fa-angle-left"></i> Previous <span>Post</span></h2>
																	<p>%title</p>
																</div>
															</figcaption>
														</figure>
														</div>',
										'next_text' => '<div class="pagination grid">
															<figure class="single-item-effect half">
															<figcaption>
																<div class="figcaption-border">
																	<h2>Next <span>Post</span> <i class="fa fa-angle-right"></i> </h2>
																	<p>%title</p>
																</div>
															</figcaption>								
														</figure>
														</div>',
										
									) );
						?>
							
				<?php comments_template();?>

			</div>
			<!-- <div class="divider_30"></div>
			<div class="divider_30"></div> -->
			</article>
			

		</div><!-- /container -->
<?php endwhile; ?>
</div>

<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
.contener{width: 100%;}
.imglist{float: left;width: 100%; padding-left: 0 !important;}
.imglist li{float: left; width: 32%;
    height: 191px; margin: 5px;}
.imglist li img{width: 100%;height: 100%;}
</style>
<?php get_footer(); ?>
<script type="text/javascript" src="http://www.martinhal.com/wp-content/themes/martinhal/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox-thumbs.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox.thumb.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox-thumbs.css" />

<script type="text/javascript">
    $(document).ready(function() {
    	//alert("else");
		$("[rel='fancybox-thumb']").fancybox({
				helpers : {
					thumbs : true
				}
			});
    });
</script>
<script type="text/javascript">
$(document).on("click",".likepost", function(event){
	var post_id = $(this).attr('id');
	var ip = $(this).attr('name');
	//alert(ip);
	var data = {};
	data.postid = post_id;
	data.ip = ip;
	data.action = "likepost_action";
	jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationSuccessList);

	function locationSuccessList(result){ //onSuccessFunction
		//alert(result);
		var count = $.trim(result);
		$(".like_count").html($.trim(count));
		$(".likepost").addClass("liking");
	}
});
</script> 