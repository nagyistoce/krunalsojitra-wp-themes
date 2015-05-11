<?php
/**
 * Template Name: News Page Tempale
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();	 ?>
<!-- load css for cubeportfolio -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/cubeportfolio.min.css">

<div class="page-content">
	<!-- BEGIN PAGE CONTENT-->
			<div class="general-page">	
				<h4><?php the_title();?></h4>
			   


<div id="grid-container" class="cbp-l-grid-team">
                <ul>
         			
         			
         			<?php 
         			
         				$args = array( 'category_name'=>'news-page','order'=>'DESC','posts_per_page'=>'-1' );
					$myposts = get_posts( $args );
					
					foreach( $myposts as $post ) :	setup_postdata($post);
                       ?>
											
						
				 <li class="cbp-item web">
                        <a href="<?php the_permalink(); ?>" class="cbp-caption"  title="<?php the_title(); ?>">
                            <div class="cbp-caption-defaultWrap">
                            	<?php if(get_field('main_image') != ""){?>
                                <img src="<?php echo get_field('main_image'); ?>" alt="" width="100%">
                                <?php } else{?>
                                	<img src="<?php bloginfo('template_directory'); ?>/images/no-image.png" alt="" width="100%">
                                <?php }?>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-text">VIEW NEWS</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="<?php the_permalink(); ?>" class="cbp-l-grid-team-name"  title="<?php the_title(); ?>"><?php the_title(); ?></a>
                       
                    </li>
					<?php  endforeach;  ?>
			
			
               </ul>
</div>

				
				
			</div>
</div>

 <!-- load cubeportfolio plugin -->

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main_new.js"></script>
<?php
get_footer();
