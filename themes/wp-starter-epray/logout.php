<?php
/*
Template Name: Logout
*/
?>
<?php wp_redirect(get_site_url());
get_header();?>
  <?php wp_logout(); ?> 
  <div id="content" class="contant">

				<div id="inner-content" class="inner-content wrap">

					<div class="grid">

						<div class="grid__item desk--one-whole">

                            <div class="contant-home">
                                <h6>Search Results : <?php echo esc_attr(get_search_query()); ?></h6>
                                	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="sect-txbx" placeholder="Search by #word username"/>
											<input type="submit" id="searchsubmit" value="search" class="gray-but"/>
										
									</form>
                            </div>
						    <div id="main" class="main" role="main">
					
		    				</div><!-- end #main -->

						</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>