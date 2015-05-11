<?php
/**
 * Template Name: Staff Induction Test Result
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<section class="lor1">
  <div class="lol2">
    <div class="das1">
     
    <div class="test_que">
		<div class="test_tit"><?php the_title();?></div>
        
        
        <?php 
		         $email_id = $current_user->user_email;
				  $test_result = $wpdb->get_row("SELECT  `score` FROM  `wp_plugin_slickquiz_scores` WHERE  `createdBy` =  '$user_id' ORDER BY id DESC LIMIT 1");
				  //print_r($test_result);
				$res = explode("/",$test_result->score);
				$res_trimmed = trim($res[0]);
				//echo "Exame Result ".$res_trimmed;
				?>
				
                <div class="res_page"><!--res_page -->
                
				
				<?php
				if($res_trimmed >= 16)
				{
				
				 ?>
                 <div class="exam_result"><?php echo "<p>Exame Result :-</p>".$res_trimmed; ?>   (<?php echo "80%";?>)</div>
				
				 <div class="cog_mes">Cogratulation..! You have Passed the Staff Induction Test</div>
                 <p class="p1">Please click here create your profile.</p>
                 <div class="res_but"><a href="<?php echo bloginfo('wpurl'); ?>/my-profile">Profile</a></div>
				 <?php
			    
				}
				elseif(12<= $res_trimmed && $res_trimmed <16){
				
				 
				   ?>
                    <div class="exam_result"><?php echo "<p>Exame Result :-</p>".$res_trimmed; ?>   (<?php echo "50%";?>)</div>
				 <div class="cog_mes">Sorry ..! You have Failed the Staff Induction Test</div>
                 <p class="p1">Please click here to restart test.</p>
                 <div class="res_but"><a href="<?php echo bloginfo('wpurl'); ?>/staff-induction">Test</a></div>
				 <?php
				  
				}
				elseif(8<= $res_trimmed && $res_trimmed <12){
				
				  
				   ?>
                    <div class="exam_result"><?php echo "<p>Exame Result :-</p>".$res_trimmed; ?>   (<?php echo "30%";?>)</div>
				 <div class="cog_mes">Sorry ..! You have Failed the Staff Induction Test</div>
                 <p class="p1">Please click here to restart test.</p>
                 <div class="res_but"><a href="<?php echo bloginfo('wpurl'); ?>/staff-induction">Test</a></div>
				 <?php
				 }
				elseif(4<= $res_trimmed && $res_trimmed<8){
				
					
				   ?>
                    <div class="exam_result"><?php echo "<p>Exame Result :-</p>".$res_trimmed; ?>   (<?php echo "20%";?>)</div>
				 <div class="cog_mes">Sorry ..! You have Failed the Staff Induction Test</div>
                 <p class="p1">Please click here to restart test.</p>
                 <div class="res_but"><a href="<?php echo bloginfo('wpurl'); ?>/staff-induction">Test</a></div>
				 <?php
				  
				}
				elseif(0<= $res_trimmed && $res_trimmed<4){
				
					
				   ?>
                    <div class="exam_result"><?php echo "<p>Exame Result :-</p>".$res_trimmed; ?>   (<?php echo "0%";?>)</div>
				 <div class="cog_mes">Sorry ..! You have Failed the Staff Induction Test</div>
                 <p class="p1">Please click here to restart test.</p>
                 <div class="res_but"><a href="<?php echo bloginfo('wpurl'); ?>/staff-induction">Test</a></div>
				 <?php
				  
				}
		?>
         </div><!--res_page -->
        
        
        
    </div>
		</div>
	</div>
</section>
<style>

.res_page {
    float: left;
    width: 100%;
}

.exam_result {
     color: #2A97C6;
    float: left;
    font-family: verdana;
    font-size: 21px;
    width: 330px;
}

.exam_result p{
    float: left;
    margin-right: 16px;
	 color: #000000;
}

.cog_mes {
    float: left;
    font-size: 20px;
    margin-top: 24px;
    width: 100%;
}

.p1{
    float: left;
    font-size: 18px;
    margin-top: 27px;
	 margin-right: 42px;
}
.res_but{ float:left; margin-top:24px;}
.res_but a{background: linear-gradient(to bottom, #1E90C3 0%, #1A769F 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 0 solid;
    border-radius: 5px;
    color: #FFFFFF;
    cursor: pointer;
    font-family: Verdana,Geneva,sans-serif;
    font-size: 22px;
    height: 30px;
    line-height: 30px;
    padding: 6px 12px;}
.res_but a:hover {
    background: linear-gradient(to bottom, #1A769F 0%, #1E90C3 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
}
</style>
<?php get_footer(); ?>
