<?php
/**
 * The Content Sidebar
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
 <?php 
if(isset($_SESSION['device_type_str']) && !empty($_SESSION['device_type_str'])){ $type = $_SESSION['device_type_str'];}
 if($type=='other'){?><!-- hide in mobile -->
<!--aside -->
                <aside class="page_rightbar">
                   <?php
      $sdigit1 = mt_rand(1,20);
    $sdigit2 = mt_rand(1,20);
    if( mt_rand(0,1) === 1 ) {
            $smath = "$sdigit1 + $sdigit2";
            $_SESSION['sanswer'] = $sdigit1 + $sdigit2;
    } else {
            $smath = "$sdigit1 - $sdigit2";
            $_SESSION['sanswer'] = $sdigit1 - $sdigit2;
    }
    ?>
                    <form id="get_in_touch" method="post" action="">
                    	<h3>Let’s Get Started</h3>
                        <ul>
                        	<li><input type="text" class="get-tch-txbx" placeholder="Name *" name="name" id="name"></li>
                        	<li><input type="text" class="get-tch-txbx" placeholder="Phone *" name="phone" id="phone"></li>
                        	<li><input type="text" class="get-tch-txbx" placeholder="Email *" name="email" id="email"></li>
                        	<li><input type="text" class="get-tch-txbx"  placeholder="Website *" name="website" id="website"></li>
                        	<li><textarea class="get-tch-txara" name="comment" id="comment" placeholder="Comment *"></textarea></li>
                        	<li class="cpcha get_side">
                        		 <p>What's <?php echo $smath; ?> = </p><input name="sanswer" id="sanswer" type="text" /><p style="width: 245px ! important; text-align: right;"><?php echo $ctpwrong; ?></p><br />
									<!-- <input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /><span>+</span>
									<input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /><span>=</span>
									<input id="captcha" class="captcha" type="text" name="captcha" maxlength="2" /> -->
									
							</li>
                        	<li><input type="button" name="sidebar_submit" id="sidebar_submit" class="get-tch-txbt" value="Get In Touch" ></li>
                       </ul>
                    </form>
                     <?php dynamic_sidebar('sidebar-1'); ?>
                     <style>#tag_cloud-2{display: none;}</style>
                    <div class="blg-pst">
                    	<h3>Proof Of Our Happiness</h3>
                        <div class="flexslider port_sidebar">
  							<ul class="slides">
  								<?php
									query_posts('post_type=portfolio&posts_per_page=1&orderby=rand');
										while( have_posts() ):the_post();
											
									?><li>
													<a href="<?php echo get_permalink(101);?>">
													<img src="<?php echo get_field('image'); ?>">
													<!-- <p><?php the_title(); ?></p> -->
													</a>
												</li>
									<?php 
											endwhile;
									 
										wp_reset_query(); 
									?>
			           		
							</ul>
						</div>
                    </div>
                    <div class="tag">
                    	<h3>Proof Of Your Happiness</h3>
                    	 <div class="flexslider port_sidebar sidebar_testimonial ">
  							<ul class="slides">
  								<?php
										$letsnurture_home_post = array( 'post_type' => 'post' ); // Display Default Home 
										$letsnurture_home = new WP_Query( $letsnurture_home_post );
										while ( $letsnurture_home->have_posts() ) : $letsnurture_home->the_post();
											while(has_sub_field('testimonials', 2)):
									?>
												<?php $content = get_sub_field('description', 2);?>
												<li>
													<?php echo substr($content, 0, 180); if(strlen($content) > 180) echo '...'; ?>
													<?php //echo $content;?>
													<span>- <?php  the_sub_field('client_name', 2);?></span>
												</li>
									<?php 
											endwhile;
										endwhile;	 
										wp_reset_query(); 
									?>
			           		
							</ul>
						</div>
						
                    </div>
					
                </aside>
                <!--aside -->

<script>
$('#sidebar_submit').click(function(){
	if ($('#get_in_touch').valid()){
		
	var ans_value = $('#sanswer').val();
	var act_value = '<?php echo $_SESSION['sanswer']; ?>';
	if($('#sanswer').val()=='')
	{
		alert('Please enter captcha value.');
	}
	else
	{
		if(ans_value===act_value)
		{
			
			 	var data = {};
				data.name = $('#name').val();
				data.email = $('#email').val();
				data.phone=$('#phone').val();
				data.website=$('#website').val();
				data.comment=$('#comment').val();
				data.action = "getintouch_action";
				$.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data,done);
			 
		}
		else alert('Oops !! Wrong Captcha');
		
	}
}		 
});
function done(result) { //onSuccessFunction
	if(result==1)
	{
		//alert('Your request has been submitted. Thank You!');
		//window.location.href = document.location.href;
		window.location.href="http://www.letsnurture.com/thank-you.html";
	}
	else alert('Sorry! Failed to submit your request.');
}	
	
</script>
<?php }?><!-- hide in mobile -->