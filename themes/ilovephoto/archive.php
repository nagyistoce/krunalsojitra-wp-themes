<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php 
$category = get_the_category(); 
$author = get_the_author(); 

?>
<?php if($author == ""){?>
<div class="index-category full-height">
<?php } else{?>
<div class="index-category index-author full-height">
<?php } ?>
		<div id="container" class="container intro-effect-sidefixed">

		<a class="cd-primary-nav-trigger" id="trigger-menu" href="#0">
		  	<span class="cd-menu-icon"></span>
		</a>

		<!-- BOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->
		<div id="Letsnurture-search" class="Letsnurture-search">
			<form action="#l">
				<input class="Letsnurture-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
				<input class="Letsnurture-search-submit" type="submit" value="">
				<span class="Letsnurture-icon-search fa fa-search"></span>
			</form>
		</div>
		<!-- EOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->

			<?php if($author == ""){?>
			<div class="title hidden" id="title">
				<h1>Category: <?php echo $category[0]->name;?></h1>
				<p class="subline"><?php echo $category[0]->description;?></p>
			</div>
			<?php } else{?>
			<div id="title" class="title">
				<p class="subline"><img src="<?php bloginfo('template_url');?>/img/member_2.jpg" class="subline"></p>
				<h1><?php echo $author;?></h1>
				<p class="subline">George</p>
			</div>
			<?php } ?>

			<!-- Top Navigation -->
			<header class="header">
				<div class="bg-img">
					<img class="async-image hide" src="#" data-src="<?php echo $category_image = get_field('feacture_image', 'category_' . $category[0]->cat_ID);?>" alt="" />
					<div class="overlay hidden" id="overlay"></div>
				</div>
			</header>
			<button class="trigger"><span>Trigger</span></button>
			<article class="content no-padding">
				<div class="title hidden" id="title2">
					<h1></h1>
					<p class="subline"></p>
				</div>
				<div class="no-margin">
					<div class="grid">
					
			<?php
			$myposts = get_posts();
			$i= 1;
			$j= 0;
			while ( have_posts() ) : the_post();?>
			
			<?php if(($i==1) || ($i-($j*3)==1))
				{ ?>
					<figure class="single-item-effect full">
						<?php the_post_thumbnail('full');?>
							
							<figcaption>
								<div class="figcaption-border">
									<h2><?php the_title();?></h2>
									<p><?php echo substr(get_the_content(), 0 , 50);?></p>
									<a href="<?php echo get_permalink(); ?>">View more</a>
									<div class="figure-overlay"></div>
								</div>
							</figcaption>												
						</figure>
						
				<?php }?>
				<?php if(($i==2) || ($i-($j*3)==2))
						{ ?>
						<figure class="single-item-effect big">
							<?php the_post_thumbnail('full');?>
							<figcaption>
								<div class="figcaption-border">
									<h2><?php the_title();?></h2>
									<p><?php echo substr(get_the_content(), 0 , 50);?></p>
									<a href="<?php echo get_permalink(); ?>">View more</a>
									<div class="figure-overlay"></div>
								</div>
							</figcaption>												
						</figure>
						
				<?php }?>
				
				<?php 
				 if(($i==3) || ($i-($j*3)==0))
				{ ?>
						<figure class="single-item-effect big">
							<?php the_post_thumbnail('full');?>
							<figcaption>
								<div class="figcaption-border">
									<h2><?php the_title();?></h2>
									<p><?php echo substr(get_the_content(), 0 , 50);?></p>
									<a href="<?php echo get_permalink(); ?>">View more</a>
									<div class="figure-overlay"></div>
								</div>
							</figcaption>												
						</figure>
				<?php }?>
				
			<?php $i++; if($i%3==0) $j++; endwhile; ?>
						
						
						
					</div>
				</div>
			</article>
		</div><!-- /container -->

</div>		
<?php get_footer(); ?>
