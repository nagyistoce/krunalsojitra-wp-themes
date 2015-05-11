<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="blog-content inner-page">
	<div class="container">
		<div class="service-box">
			<div class="main-box">
			<?php while ( have_posts() ) : the_post(); ?>
				<h4><?php the_title();?></h4>

					<?php if(get_field('slier_images')): ?>
						<div class="post-slider">			 
									<ul class="bxslider">
			           <?php while(has_sub_field('slier_images')): ?>
								
									  <li><img src="<?php  the_sub_field('image');?>"/></li>
					   <?php endwhile; ?>
					   				</ul>
          			   	</div>
					<?php endif; ?>
					
					
					
						
					<?php if(get_field('color_images')): ?>
						<div class="color-cat">
			           <?php while(has_sub_field('color_images')): ?>
								<div class="color-tiles">			           	 
									<img src="<?php  the_sub_field('image');?>"/>
									<span><?php  the_sub_field('title');?></span>
					   			</div>
					   <?php endwhile; ?>
					   </div>
					<?php endif; ?>
					
					<div class="post-content"><?php the_content();?></div>
			<?php endwhile; // end of the loop. ?>
		
	
	<!-- #Related productct-->
	
		<?php if(is_page('door')){?>
			<div class="Related-productct">
    	<?php $recent = new WP_Query("cat=4&showposts=5");
   			  while($recent->have_posts()) : $recent->the_post();?>
				 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 relate-box1">
			        <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
			       <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail();?></a>
			    </div>
        	<?php endwhile; ?>
        	</div>
       <?php }?>
       
    	<?php if(is_page('windows')){ ?>
    		<div class="Related-productct">
    	  <?php $recent = new WP_Query("cat=2&showposts=5");
    	   while($recent->have_posts()) : $recent->the_post();?>
    	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 relate-box1">
		        <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
		       <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail();?></a>
		    </div>
        	<?php endwhile; ?>
     </div>
       <?php }?>
       </div>
   	</div>
	</div>
</div>	  
<?php //get_sidebar(); ?>
<?php get_footer(); ?>