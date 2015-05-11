<?php get_header(); ?>
			<!--banner -->
			<div class="banner">
		    	<div class="bg-ring"></div>
		    	<!--container -->
		    	<div class="container">
		        	<!--banner-text -->
		        	<div class="banner-text">
		            	<div class="img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/library/images/diagram.png"></div>
		                <h1>Everyone pray.</h1>
						<span>Connect & Share With People Who Care</span>
		            </div>
		            <!--banner-text -->
		            <!--form-main -->
		            <div class="form-main ff-left">
		            	<!--login-form -->
		            	<div class="login-form">
		                	<form>
		                    	<ul>
		                        	<li>
		                            	<input type="text" value="" class="text-bx" placeholder="Username">
		                            </li>
		                        	<li>
		                            	<input type="password" value="" class="text-bx qt-hlf" placeholder="Password">
		                                <input type="button" value="Sign in" class="sgn-in" />
		                            </li>
		                        	<li>
		                            	<label><input type="checkbox" class="check-bx" />Remember me</label>
		                                <a href="#">Forgot password?</a>
		                            </li>
		                        </ul>
		                    </form>
		                </div>
		                <!--login-form -->
		                <div class="clear"></div>
		                <!--signup-form -->
		            	<div class="signup-form">
		                	<form>
		                    	<ul>
		                        	<li>
		                            	<div class="top-head">
		                                	<h2>New to ePray? <span>Sign Up</span></h2>
		                                </div>
		                            </li>
		                        	<li>
		                            	<input type="text" value="" class="text-bx" placeholder="Username">
		                            </li>
		                        	<li>
		                            	<input type="email" value="" class="text-bx" placeholder="Email">
		                            </li>
		                        	<li>
		                            	<input type="password" value="" class="text-bx" placeholder="Password">
		                            </li>
		                            <li>
		                                <input type="button" value="Sign-up for ePray" class="sgn-up" />
		                            </li>
		                        </ul>
		                    </form>
		                </div>
		                <!--signup-form -->
		            </div>
		            <!--form-main -->
		        
		        </div>
		        <!--container -->
		    </div>    
		    <!--banner -->

			<div id="content">

				<div id="inner-content" class="inner-content wrap">

					<div class="grid">

						<div class="grid__item lap--two-thirds desk--three-quarters">

						    <div id="main" class="main clearfix" role="main">

							    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								    <header class="article-header">

									    <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

									    <p class="byline vcard"><?php _e('Posted', 'dmsqdtheme'); ?> <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time> <span class="amp">&amp;</span> <?php _e('filed under', 'dmsqdtheme'); ?> <?php the_category(', '); ?>.</p>

								    </header> <!-- end article header -->

								    <section class="entry-content clearfix">
									    <?php the_content(); ?>
								    </section> <!-- end article section -->

								    <footer class="article-footer">

		    							<p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>

								    </footer> <!-- end article footer -->

								    <?php // comments_template(); // uncomment if you want to use them ?>

							    </article> <!-- end article -->

							    <?php endwhile; ?>

							        <?php if (function_exists('bones_page_navi')) { ?>
							            <?php bones_page_navi(); ?>
							        <?php } else { ?>
							            <nav class="wp-prev-next">
							                <ul class="clearfix">
							        	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "dmsqdtheme")) ?></li>
							        	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "dmsqdtheme")) ?></li>
							                </ul>
							            </nav>
							        <?php } ?>

							    <?php else : ?>

							        <article class="post-not-found hentry clearfix">
							            <header class="article-header">
							        	    <h1><?php _e("Oops, Post Not Found!", "dmsqdtheme"); ?></h1>
							        	</header>
							            <section class="entry-content">
							        	    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "dmsqdtheme"); ?></p>
							        	</section>
							        	<footer class="article-footer">
							        	    <p><?php _e("This is the error message in the index.php template.", "dmsqdtheme"); ?></p>
							        	</footer>
							        </article>

							    <?php endif; ?>

						    </div> <!-- end #main -->

	    				</div><!--
	    			 --><div class="grid__item lap--one-third desk--one-quarter">

			    			<?php get_sidebar('blog-sidebar'); ?>

	    				</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
