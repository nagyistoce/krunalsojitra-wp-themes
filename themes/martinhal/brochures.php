<?php
/*
Template Name: Brochures
*/

get_header(); ?>

	<div class="slide brochures" id="content-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="content-box brochures" id="cust-scrl">
			
        	<?php if ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>
			
			
			<ul>
				<?php if(get_field('e_brochures')): ?>
			    	<?php while(has_sub_field('e_brochures')): ?>
			    		<?php if(get_sub_field('e_brochures_name')): ?>
				        	<li>
				        		<?php if(get_sub_field('e_brochures_url')): ?>
				        			<a href="<?php echo the_sub_field('e_brochures_url'); ?>" title="<?php echo the_sub_field('e_brochures_name'); ?>" target="_blank" rel="nofollow"><?php echo the_sub_field('e_brochures_name'); ?></a>
				        		<?php else: ?>
				        			<a href="javascript:void(0);" title="<?php echo the_sub_field('e_brochures_name'); ?>" ><?php echo the_sub_field('e_brochures_name'); ?></a>
				        		<?php endif; ?>
							</li>
						<?php endif; ?>
			        <?php endwhile; ?>
			    <?php endif; ?>
			</ul>
			
			
			<ul>
				<?php if(get_field('activities')): ?>
			    	<?php $counter = 1; while(has_sub_field('activities')): ?>
			    		<?php if(get_sub_field('activities_name')): ?>
				        	<li>
				        		<?php if(get_sub_field('activities_file')): ?>
				        			<a href="<?php echo the_sub_field('activities_file'); ?>" title="<?php echo the_sub_field('activities_name'); ?>" target="_blank"><?php echo the_sub_field('activities_name'); ?></a>
				        		<?php else: ?>
				        			<a href="javascript:void(0);" title="<?php echo the_sub_field('activities_name'); ?>" target="_blank"><?php echo the_sub_field('activities_name'); ?></a>
				        		<?php endif; ?>
							</li>
						<?php endif; ?>
			        <?php $counter++; endwhile; ?>
			    <?php endif; ?>
			</ul>
        </div>
	</div>

<?php get_footer(); ?>