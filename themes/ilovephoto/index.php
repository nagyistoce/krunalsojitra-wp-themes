<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="homepage index-home index full-height"><!-- main div -->	
		<div id="container" class="container intro-effect-grid">

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

			<header class="header">
				<div class="bg-img">
					<img class="async-image hide" src="#" data-src="<?php bloginfo('template_url'); ?>/img/homepage.jpg" alt="" />
				</div>
				<div class="title hidden" id="title">
					<h1>I <i class="fa fa-heart red"></i> Photography</h1>
				</div>
				<div class="overlay hidden" id="overlay"></div>
			</header>

			<button class="trigger scroll-down-pulse"><span>Trigger</span></button>

			<article class="content">
				<div class="">
					<div class="grid">
						<?php $categories = get_categories('hide_empty=0'); 
								$i= 1;
								$j= 0;
								foreach ($categories as $categori) {
									$term_id =  $categori->term_id;?>
						<?php 
							if(($i==1) || ($i-($j*6)==1))
							{ ?>
							   <figure class="single-item-effect big las-vegas">
									<img src="<?php echo $category_image = get_field('feacture_image', 'category_' . $term_id);?>" alt="<?php echo $cat_name;?>"/>
									<figcaption>
										<div class="figcaption-border">
											<h2><?php echo $cat_name =  $categori->name; ?></h2>
											<p><?php echo $cat_description=  $categori->description; ?></p>
											<a href="<?php echo get_category_link( $categori->term_id);?>">View more</a>
											<div class="figure-overlay"></div>
										</div>
									</figcaption>												
								</figure>
							<?php }
							
							if(($i==2) || ($i-($j*6)==2))
							{ ?>
							
								<figure class="single-item-effect small wild">
									<img src="<?php echo $category_image = get_field('feacture_image', 'category_' . $term_id);?>" alt="<?php echo $cat_name;?>"/>
									<figcaption>
										<div class="figcaption-border">
											<h2><?php echo $cat_name =  $categori->name; ?></h2>
											<p><?php echo $cat_description=  $categori->description; ?></p>
											<a href="<?php echo get_category_link( $categori->term_id);?>">View more</a>
											<div class="figure-overlay"></div>
										</div>
									</figcaption>												
								</figure>
							<?php }
							
							if(($i==3) || ($i-($j*6)==3))
							{ ?>
								<figure class="single-item-effect small wild">
									<img src="<?php echo $category_image = get_field('feacture_image', 'category_' . $term_id);?>" alt="<?php echo $cat_name;?>"/>
									<figcaption>
										<div class="figcaption-border">
											<h2><?php echo $cat_name =  $categori->name; ?></h2>
											<p><?php echo $cat_description=  $categori->description; ?></p>
											<a href="<?php echo get_category_link( $categori->term_id);?>">View more</a>
											<div class="figure-overlay"></div>
										</div>
									</figcaption>												
								</figure>
							<?php }
							
							if(($i==4) || ($i-($j*6)==4))
							{ ?>
								<figure class="single-item-effect small wild">
									<img src="<?php echo $category_image = get_field('feacture_image', 'category_' . $term_id);?>" alt="<?php echo $cat_name;?>"/>
									<figcaption>
										<div class="figcaption-border">
											<h2><?php echo $cat_name =  $categori->name; ?></h2>
											<p><?php echo $cat_description=  $categori->description; ?></p>
											<a href="<?php echo get_category_link( $categori->term_id);?>">View more</a>
											<div class="figure-overlay"></div>
										</div>
									</figcaption>												
								</figure>
							<?php }
							
							if(($i==5) || ($i-($j*6)==5))
							{ ?>
								<figure class="single-item-effect small los-angeles">
									<img src="<?php echo $category_image = get_field('feacture_image', 'category_' . $term_id);?>" alt="<?php echo $cat_name;?>"/>
									<figcaption>
										<div class="figcaption-border">
											<h2><?php echo $cat_name =  $categori->name; ?></h2>
											<p><?php echo $cat_description=  $categori->description; ?></p>
											<a href="<?php echo get_category_link( $categori->term_id);?>">View more</a>
											<div class="figure-overlay"></div>
										</div>
									</figcaption>											
								</figure>
							<?php }
							
							if(($i==6) || ($i-($j*6)==6))
							{ ?>
								<figure class="single-item-effect big las-vegas">
									<img src="<?php echo $category_image = get_field('feacture_image', 'category_' . $term_id);?>" alt="<?php echo $cat_name;?>"/>
									<figcaption>
										<div class="figcaption-border">
											<h2><?php echo $cat_name =  $categori->name; ?></h2>
											<p><?php echo $cat_description=  $categori->description; ?></p>
											<a href="<?php echo get_category_link( $categori->term_id);?>">View more</a>
											<div class="figure-overlay"></div>
										</div>
									</figcaption>												
								</figure>
							<?php }
						?>
						<?php $i++; if($i%6==0) $j++;} ?>
						
					</div>
				</div>
			</article>
		</div><!-- /container -->
</div><!-- main div -->
<?php get_footer(); ?>
