<?php
/**
 * The Template for displaying all single posts
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
	
	
	
	
	
			<!-- #Related prodect-->
			<div class="Related-productct">
		    <?php
		        $orig_post = $post;
		        global $post;
		        $tags = wp_get_post_tags($post->ID);
		 
		        if ($tags) {?>
		        	
		        	
		    <h4>Related posts</h4>
		        	<?php
		        			            $tag_ids = array();
		        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		            $args=array(
		                'tag__in' => $tag_ids,
		                'post__not_in' => array($post->ID),
		                'posts_per_page'=>4, // Number of related posts to display.
		                'caller_get_posts'=>1
		            );
		        $my_query = new wp_query( $args );
		        while( $my_query->have_posts() ) {
		            $my_query->the_post();
		        ?>
		         
		         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 relate-box1">
			        <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
			       <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail();?></a>
			    </div>
		        <?php }
		        }
		        $post = $orig_post;
		        wp_reset_query();
		        ?>
		    </div>

			<?php endwhile; // end of the loop. ?>
  	</div>
   	</div>
	</div>
</div>	  
<?php //get_sidebar(); ?>
<?php get_footer(); ?>