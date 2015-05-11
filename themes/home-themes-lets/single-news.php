<?php $category = get_the_category();
 $category_name = $category[0]->cat_name; ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/magnific-popup.css"> 

<div class="inner-page detail_port">
	<div class="blogs bloginner">
		<div class="container">
			  
	<!-- BEGIN PAGE CONTENT-->
			<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php //the_title(); ?></h1>
			<div class="portfolio_detail">
				<div class="portfolio_left"> 		
					
					      <div class="main_img"><img src="<?php echo get_field('main_image');?>" /></div>
					
			 				<div class="more_img">
			 					<ul class="popup-gallery">
			 					<?php while(has_sub_field('more_image')):
			 						if(get_sub_field('image') != ""){?>
									<li>
										<a href="<?php  the_sub_field('image');?>" title="<?php the_title(); ?>">
											<img src="<?php  the_sub_field('image');?>" title="<?php the_title(); ?>" />
										</a>
									</li>
								<?php }endwhile; wp_reset_query(); ?>
								</ul>
							</div>
				</div>
			<?php endwhile;	?>
		<?php if($category_name == 'News Page'){?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="portfolio_right nes">
				
                <div class="port_framwork">
					<h1 class="head-title"><?php the_title();?></h1>
					<span><p>on <?php echo date('F j, Y',strtotime(get_the_date())); ?></p></span>
                </div>
                
				<div class="port_des">
					
					<?php the_content(); ?>
                </div>
			</div>
			<?php endwhile;	?>
          <?php }elseif($category_name == 'Event'){?>
            <?php while ( have_posts() ) : the_post(); ?>
             <div class="portfolio_right nes">
				<div class="port_framwork">
					<h1 class="head-title"><?php the_title();?></h1>
					<span><p>on <?php echo date('F j, Y',strtotime(get_the_date())); ?></p>, at <p><?php echo get_field('event_location');?></p></span>
                </div>
              
				<div class="port_des">
					<?php the_content(); ?>
                </div>
			</div>
			<?php endwhile;	?>
          <?php }elseif($category_name == 'Career'){?>
            <?php while ( have_posts() ) : the_post(); ?>
             <div class="portfolio_right nesa">
				<div class="port_framwork">
					<h1 class="head-title"><?php the_title();?></h1>
                </div>
                <div class="port_framwork">
					<span>No. Of Positions :</span>
					<?php echo get_field('no_of_positions');?>
                </div>
				<div class="port_des">
					<span>Job Responsibilities :</span>
					<?php the_content(); ?>
                </div>
			</div>
            <style>
           
            </style>
             <?php endwhile;	?>
          <?php }elseif($category_name == 'Case Studies'){?>  
          	<?php while ( have_posts() ) : the_post(); ?>
          	<div class="portfolio_right">
				<div class="port_framwork">
					
				<h1 class="head-title"><?php the_title();?></h1>
                </div>
                <div class="port_framwork">
					<span>Problem Statement :</span>
					<?php echo get_field('problem_statement');?>
                </div>
				<div class="port_des">
					<span>Duration :</span>
					<?php echo get_field('duration');?>
                </div>
                <div class="port_des">
					<span>Solution :</span>
					<?php the_content(); ?>
                </div>
                <a class="btn blue" href="http://www.letsnurture.com/get-a-quote.html">Looking For Similar Solution?</a>
                <div style="clear: both;">
                	<?php echo do_shortcode( '[hupso]' ); ?>
                	</div>
			</div>
            <style>
           
            .port_des .hupso-share-buttons{display: none;}
            </style>
              <p class="next_prev"><?php previous_post('%', 'Previous', 'no'); ?> <span id="seperator" style="visibility: hidden;">|</span> <?php next_post('%', 'Next', 'no'); ?></p>
          <?php endwhile;	?>
          <?php } ?>
           
			</div>
				</div>
	</div>
	
</div><!-- #content -->
<style>
.portfolio_right{margin-top:0px;}
.nesa h6{margin: 0px;}
.nes .port_framwork h6 {
    float: left;
    margin: 0;
    width: 100%;
   }
.portfolio_right.nes span {
    color: #0b1733;
    float: left;
    font-size: 13px;
    margin-right: 9px;
     font-weight: normal;
      width: 100%;
} 
.port_framwork p {
    display: inline;
  
    font-size: 13px;
    font-weight: bold;
}
strong{  color: #428bca;
    float: left;
    margin-bottom: 10px;
    margin-top: 11px;
    width: 100%;}
.portfolio_right ul li{line-height: 19px;}
.portfolio_right p{float: left;width: 100%;margin-top: 15px;}
.portfolio_right ul{margin-top: 7px;}
</style>