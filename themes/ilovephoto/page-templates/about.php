<?php
/**
 * Template Name: About US
 *
 */

get_header(); ?>
<div class="index-about full-height">
	<div id="container" class="container intro-effect-side">
<?php	// Start the loop.
		while ( have_posts() ) : the_post();
		 $post_id = get_the_ID();
		 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
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
					<!-- <p class="subline">My life is my message.</p> -->
				</div>
			</header>
			<button class="trigger scroll-down-pulse"><span>Trigger</span></button>

			<article class="content">
				<div>
					<h1><span class="black">Introduction </span><span class="green">letter</span></h1>
					<?php the_content();?>

				</div>
	
				<!-- Map holder -->
				
				<div class="clearfix"></div>

				<div>
					<h1 class="text-left"><span class="black">Let me take you </span><span class="green">to the mountain</span></h1>
					<div class="author_skills">
			            <div class="one_half">
							<iframe src="http://www.youtube.com/embed/C-y70ZOSzE0?hd=1&amp;rel=0&amp;autohide=1&amp;showinfo=0" width="410" height="230" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
			            </div>
						<div class="one_half">
							<p>Uniquely whiteboard just in time sources through fully researched methodologies. Rapidiously administrate vertical functionalities whereas robust outsourcing. Rapidiously exploit team building benefits before multimedia based portals. Quickly revolutionize seamless infomediaries without seamless quality vectors. Energistically productivate virtual bandwidth whereas pandemic niches. Interactively fabricate cost effective web services.</p>
						</div>
						<div class="divider_30"></div>
			        </div>
				</div>

				<div class="clearfix"></div>

				<!-- Tweets -->
				<div class="author_tweets_full white">
					<div class="boxed">
						<div class="one_sixth text-center">
							<i class="fa fa-twitter"></i>
						</div>
						<div class="sixth_one">
							<span><?php dynamic_sidebar( 'twitter-1' ); ?></span>
							<!-- <span>@ilovephotography - <i> Amazing view - 3 days ago</i></span> -->
						</div>
					</div>
				</div>

<?php endwhile; ?>				
			</article>
		</div><!-- /container -->

</div>

<?php
//get_sidebar();
get_footer();
