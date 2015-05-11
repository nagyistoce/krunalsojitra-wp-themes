<?php
/**
 * Template Name: Door Related page template
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header();
$pageid = get_the_ID();
 ?>

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
	<div class="Related-productct">
		   
			<?php
			$posts = get_posts(array(
			'posts_per_page'	=> -1,
			'post_type'			=> 'page'
			));
				if( $posts ): ?>
				 <h4>Related posts</h4> 
					 <?php foreach( $posts as $post ):?> 
				<?php if(get_field('relate_page_select') == "Doors" && $post->ID != $pageid){
					setup_postdata( $post )?>
					
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 relate-box1">
				        <h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				       <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail();?></a>
				    </div>
	
				<?php }?>
				<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	    </div>
	</div>
   	</div>
	</div>
</div>	  
<?php //get_sidebar(); ?>
<?php get_footer(); ?>