<?php
/**
 * Template Name: Portfolio
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
 ?>
<!-- load css for cubeportfolio -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/cubeportfolio.min.css">

<div class="page-content">
	<!-- BEGIN PAGE CONTENT-->
			<div class="general-page">	
				<h1>Web Portfolio</h1>
			   <div id="filters-container" class="cbp-l-filters-alignLeft">
                <button data-filter="*" class="cbp-filter-item-active cbp-filter-item">All (<div class="cbp-filter-counter"></div>)</button>
                <button data-filter=".web" class="cbp-filter-item">Web (<div class="cbp-filter-counter"></div>)</button>
                <button data-filter=".mobile" class="cbp-filter-item">Mobile (<div class="cbp-filter-counter"></div>)</button>
                <button data-filter=".graphic" class="cbp-filter-item">Graphic (<div class="cbp-filter-counter"></div>)</button>
               </div>


<div id="grid-container" class="cbp-l-grid-team">
                <ul>
         			<?php
					query_posts('post_type=portfolio&portfolio_type=web&posts_per_page=-1');
					while( have_posts() ):the_post();
					$image = get_field('image_gallery');
				?>
						
				 <li class="cbp-item web">
                        <a href="<?php the_permalink(); ?>" class="cbp-caption"  title="<?php the_title(); ?>">
                            <div class="cbp-caption-defaultWrap">
                                <img src="<?php echo get_field('image'); ?>" alt="" width="100%">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="<?php the_permalink(); ?>" class="cbp-l-grid-team-name"  title="<?php the_title(); ?>"><?php the_title(); ?></a>
                       
                    </li>
					<?php endwhile; wp_reset_query(); ?>
			
				<?php
					query_posts('post_type=portfolio&portfolio_type=mobile&posts_per_page=-1');
					while( have_posts() ):the_post();
					$image = get_field('image_gallery');
				?>
				 <li class="cbp-item mobile">
                        <a href="<?php the_permalink(); ?>" class="cbp-caption"  title="<?php the_title(); ?>">
                            <div class="cbp-caption-defaultWrap">
                                <img src="<?php echo get_field('image'); ?>" alt="" width="100%">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="<?php the_permalink(); ?>" class="cbp-l-grid-team-name" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                       
                    </li>
				<?php endwhile; ?>
				
				<?php
					query_posts('post_type=portfolio&portfolio_type=graphic&posts_per_page=-1');
					while( have_posts() ):the_post();
					$image = get_field('image_gallery');
				?>
				 <li class="cbp-item graphic">
                        <a href="<?php the_permalink(); ?>" class="cbp-caption"  title="<?php the_title(); ?>">
                            <div class="cbp-caption-defaultWrap">
                                <img src="<?php echo get_field('image'); ?>" alt="" width="100%">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="<?php the_permalink(); ?>" class="cbp-l-grid-team-name" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                       
                    </li>
				<?php endwhile; ?>
               </ul>
</div>

				
				
			</div>
</div>

 <!-- load cubeportfolio plugin -->

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main_new.js"></script>
<?php
get_footer();
