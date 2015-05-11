<?php
/**
 * Template Name: Staff Forum Template
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
					<?php the_title(); ?>
				</div>
				<div class="das2_2 ped14">
                        <div class="staff_forum">        
                        	
                            <?php echo do_shortcode('[bbp-forum-index]'); ?>
                        </div>   <!-- staff_forum end-->  
                                
						</div>
			</div>
			<div class="das3">
				<div class="das3_1">
					<div class="das3_2">
						<div class="das3_2_1">
							Notifications
						</div>
						<div class="das3_2_2">
							06
						</div>
					</div>
					<div class="das3_2 das3_3">
						<div class="das3_3_1">
							<div class="das3_3_2">
								<div class="das3_3_3">
									15th October 2013
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										You must complete your profile to continue using this site
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8">
											<a href="#">
												View
											</a>
										</div>
									</div>
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										You must complete your profile to continue using this site
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8">
											<a href="#">
												View
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="das3_3_2">
								<div class="das3_3_3">
									12th October 2013
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5 das3_3_9">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										Accepted to work on 12/11/13 at Alexandra Palace 20:00 - 23:45
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8 das3_3_10">
											<a href="#">
												Ok
											</a>
										</div>
									</div>
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5 das3_3_9">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										Accepted to work on 12/11/13 at Alexandra Palace 20:00 - 23:45
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8 das3_3_10">
											<a href="#">
												Ok
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="das3_3_2">
								<div class="das3_3_3">
									10th October 2013
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5 das3_3_9">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										Accepted to work on 12/11/13 at Alexandra Palace 20:00 - 23:45
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8 das3_3_10">
											<a href="#">
												Ok
											</a>
										</div>
									</div>
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5 das3_3_9">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										Accepted to work on 13/11/13 at Alexandra Palace 20:00 - 23:45
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8 das3_3_10">
											<a href="#">
												Ok
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="das3_1 das3_4">
					<div class="das3_2">
						<div class="das3_2_1">
							Menu
						</div>
					</div>
					<div class="das3_2 das3_3">
						<div class="das3_3_1">
							<nav class="das3_4_1">
								<?php if ( is_active_sidebar( 'sidebarmenu' ) ) : ?>
			<?php dynamic_sidebar( 'sidebarmenu' ); ?>
			<?php endif; ?>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="das4">
				<div class="das4_1 das4_3">
					<div class="lol4_2 das4_2">
						<span class="lol4_3">
							Latest News
						</span>
					</div>
				</div>
				<div class="das4_1">
					<article class="das4_4">
						<ul>
							<li>
								<a href="#">
									<figure>
										<img src="<?php bloginfo('stylesheet_directory'); ?>/images/news1.jpg" />
									</figure>
									<h2>
										News Title 1
									</h2>
								</a>
							</li>
							<li>
								<a href="#">
									<figure>
										<img src="<?php bloginfo('stylesheet_directory'); ?>/images/news2.jpg" />
									</figure>
									<h2>
										News Title 2
									</h2>
								</a>
							</li>
							<li>
								<a href="#">
									<figure>
										<img src="<?php bloginfo('stylesheet_directory'); ?>/images/news3.jpg" />
									</figure>
									<h2>
										News Title 3
									</h2>
								</a>
							</li>
						</ul>
					</article>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>