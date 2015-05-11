<?php
/*
Template Name: Custom Page Example
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="inner-content wrap">

					<div class="grid">

						<div class="grid__item lap--two-thirds desk--three-quarters">

						    <div id="main" class="main" role="main">

							    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								    <header class="article-header">

									    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								    </header> <!-- end article header -->

								    <section class="entry-content clearfix" itemprop="articleBody">
									    <?php the_content(); ?>
									</section> <!-- end article section -->

								    <footer class="article-footer">

									    <?php //the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

								    </footer> <!-- end article footer -->

								    <?php //comments_template(); ?>

							    </article> <!-- end article -->

							    <?php endwhile; else : ?>

		    					    <article id="post-not-found" class="hentry clearfix">
		    					    	<header class="article-header">
		    					    		<h1><?php _e("Oops, Post Not Found!", "dmsqdtheme"); ?></h1>
		    					    	</header>
		    					    	<section class="entry-content">
		    					    		<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "dmsqdtheme"); ?></p>
		    					    	</section>
		    					    	<footer class="article-footer">
		    					    	    <p><?php _e("This is the error message in the page.php template.", "dmsqdtheme"); ?></p>
		    					    	</footer>
		    					    </article>

							    <?php endif; ?>

		    				</div>

						</div><!--

	    			 --><div class="grid__item lap--one-third desk--one-quarter">

		    				<?php get_sidebar(); ?>

	    				</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>