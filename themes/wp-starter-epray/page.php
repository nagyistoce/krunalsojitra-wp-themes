<?php get_header(); ?>
	<!--banner -->
			<div class="banner">
		    	<div class="bg-ring"></div>
		    	<!--container -->
		    	<div class="container">
		            <!--form-main -->
		            <div class="home-banner ff-left">
		            	<div class="home-box">
	    					  <?php echo do_shortcode('[e-pray-custompost]'); ?><!--- create plugin-->
	                     </div>
		               
		            </div>
		            <!--form-main -->
		        
		        </div>
		        <!--container -->
		    </div>    
		    <!--banner -->

			<div id="content" class="contant inner-contant">

				<div id="inner-content" class="inner-content wrap">

					<div class="grid">
						
						<aside class="side-bar home-side ff-left">
							<?php get_sidebar('page');?>
						</aside>
                        
						<div class="grid__item desk--three-quarters home-post">
							 <?php while (have_posts()) : the_post(); ?>
							 <div class="contant-home">
                                	<h6><?php the_title(); ?></h6>
                                    <!-- <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="sect-txbx" placeholder="Search by #word @username"/>
											<input type="submit" id="searchsubmit" value="search" class="gray-but"/>
										
									</form> -->
                                    
                                </div>
						    <div id="main" class="main" role="main">
						    	<div class="ajax-container" id="container">
							    

									    <?php the_content(); ?>
									

							   

		    					   
							</div><!-- end .ajax-container -->
								
		    				</div><!-- end #main -->
		    				 <?php endwhile;?>

						</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>