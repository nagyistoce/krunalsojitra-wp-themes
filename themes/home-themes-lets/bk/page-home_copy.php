<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php 
 	  $errName     = "";
	  $errcompany  = "";
	  $errPhone   = "";
      $errEmail    = "";
	  $errCategory  = "";
     
      $errEnquiry  = "";
	  $errCaptcha  = "";
	  
	  
if(isset($_POST['home_submit']))
{
			
			// Full Name must be letters, dash and spaces only
        if(empty($_POST["your_name"])){
        	 $errName = 'error';
        }else{
			if(preg_match("/^[a-z0-9_]+$/i", $_POST["your_name"]) === 0)
          	$errName = 'error';
		}
		if(empty($_POST["company"])){
        	 $errcompany = 'error';
        }else{
			if(preg_match("/^[a-z0-9_]+$/i", $_POST["company"]) === 0)
          	$errcompany = 'error';
		}
		 // Phone mask 1-800-998-7087
        if(empty($_POST["phone"])){
        	 $errPhone = 'error';
        }else{
        	if((preg_match("/[^0-9]/", '', $str)) && strlen($str) == 10)
          $errPhone = 'error';
		}
		// Email mask
          if(empty($_POST["email"])){
        	 $errEmail = 'error';
        }else{
        	if(preg_match("/^[a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $_POST["email"]) === 0)
          $errEmail = 'error';
		}
		// Category
		if(empty($_POST["category"])){
        	 $errCategory = 'error';
        }
        // Address must be word characters only
         if(empty($_POST["enquiry"])){
        	 $errEnquiry = 'error';
        } 
         if ($_SESSION['answer'] == $_POST['answer'] ){
	           
       
		
				if(empty($errName) && empty($errcompany) && empty($errPhone) && empty($errEmail) && empty($errCategory) && empty($errEnquiry)){
						
					$headers = "From: ".$_POST['your_name']."<".$_POST['email'].">";	
					$headers.= "MIME-version: 1.0\n";	
				    $headers.= "Content-type: text/html; charset=utf-8\n";
			     $subject = "Contact form mail home page Footer";
				 $message = "Name: ".$_POST['your_name']."<br>";
				 $message .= "Company: ".$_POST['company']."<br>";
				 $message .= "Phone: ".$_POST['phone']."<br>";
				 $message .= "Email: ".$_POST['email']."<br>";
				 $message .= "Category: ".$_POST['category']."<br>";
				 $message .= "Enquiry: ".$_POST['enquiry']."<br><br><br><br>"; 
				 $message .= "IP Address: ".$_SERVER['SERVER_ADDR']."<br>"; 
				$message .= "URL: ".$_SERVER['HTTP_REFERER']."<br>"; 
				$message .= "Device/Browser: ".$_SERVER['HTTP_USER_AGENT']."<br>"; 
				
				 $mail = mail('info@letsnurture.com', $subject, $message, $headers); 
			     if($mail){
			     	//echo '<script>alert("Your Message has been Sent Successfully");</script>';
			     	echo '<script>window.location="http://www.letsnurture.com/thank.html";</script>';
			     }
				}
			 }else{
	            
				$ctpwrong = 'Oops !! Wrong Captcha';
			}
}


?>
<style>
	header{background: none;}
	 header.sml-hd .logo a img{width: 183px;}
	 header.sml-hd a.get-but{    margin-top: 9px;}
	 header.sml-hd nav ul{  margin-top: 20px;}
	 .sml-hd .header_faq a{border-bottom;none;font-size:16px;}
	 header.sml-hd nav ul.desk-menu li .fst_lev{ font-size: 17px;}
</style>
	<a class="sticky_career" href="http://www.letsnurture.com/career.html"><img src="<?php bloginfo('template_directory'); ?>/images/hire.png" /></a>
<div class="section" id="main">
    	<!--container -->
    	
    	<div class="container">
    		
			<nav class="side-navigation hide-mobile">
				<ul>
					<li><a class="active" title="Welcome" href="#main"><span>Welcome</span></a></li>
					<li><a title="Services" href="#services"><span>Services</span></a></li>
					<li><a title="Testimonials" href="#clients"><span>Testimonials</span></a></li>
					<li><a title="Portfolio" href="#portfolio"><span>Portfolio</span></a></li>
					<li><a title="About" href="#about"><span>About</span></a></li>
					<li><a title="Contact" href="#contact"><span>Contact</span></a></li>
				</ul>
			</nav>    		
    		<div class="slidercont">
    		<ul class="slides">
    			<?php while( has_sub_field('slider_block') ){ ?>
    				<li>
    				<h1 class="animated" data-animation="bounceInDown" data-revert="bounceOutUp"><?php the_sub_field('title'); ?></h1>
		        	
		            <a class="cta animated" data-animation="flipInX" data-revert="flipOutX" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_text'); ?></a>
		            <!--<a class="read-more" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a> -->
		            </li>
		        <?php } ?>	
    		</ul>
    		</div>
    		<a class="read-more" href="#services"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a>
        	
        </div>
        <!--container -->
    </div>
    <div class="section" id="services">
    	<!--container -->
    	<div class="container">
    		<nav class="side-navigation hide-mobile">
				<ul>
					<li><a title="Welcome" href="#main"><span>Welcome</span></a></li>
					<li><a class="active" title="Services" href="#services"><span>Services</span></a></li>
					<li><a title="Testimonials" href="#clients"><span>Testimonials</span></a></li>
					<li><a title="Portfolio" href="#portfolio"><span>Portfolio</span></a></li>
					<li><a title="About" href="#about"><span>About</span></a></li>
					<li><a title="Contact" href="#contact"><span>Contact</span></a></li>
				</ul>
			</nav>
    		<?php while( has_sub_field('service_block') ){ ?>
        	<h2 class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">Our Services</h2>
            <div class="clear"></div>
            <span class="line animated" data-animation="bounceInLeft" data-revert="bounceOutRight">&nbsp;</span>
            <div class="sub-head animated"  data-animation="flipInX" data-revert="flipOutX"><?php the_sub_field('title'); ?></div>
            
            <p class="animated" data-animation="flipInX" data-revert="flipOutX"><?php the_sub_field('subtitle'); ?></p>
            
            <ul>
            	<?php 
				while( has_sub_field('services') )
				{
				?>
            	<li>
                    <a href="<?php the_sub_field('service_url'); ?>">
                    	<img class="animated" data-revert="rollOutLeft" data-animation="rollIn" src="<?php the_sub_field('image'); ?>" />
                   
	                <span class="animated" data-revert="fadeOutLeft" data-animation="fadeInLeft" >
	                
	                		<?php the_sub_field('title'); ?>
	                	
	                </span>
	                </a>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
            
            <a class="read-more" href="#clients"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a>
            
        </div>
        <!--container -->
    </div>
    <div class="section" id="clients">
    	<!--container -->
    	<div class="container">
    		<nav class="side-navigation hide-mobile">
				<ul>
					<li><a title="Welcome" href="#main"><span>Welcome</span></a></li>
					<li><a title="Services" href="#services"><span>Services</span></a></li>
					<li><a class="active" title="Testimonials" href="#clients"><span>Testimonials</span></a></li>
					<li><a title="Portfolio" href="#portfolio"><span>Portfolio</span></a></li>
					<li><a title="About" href="#about"><span>About</span></a></li>
					<li><a title="Contact" href="#contact"><span>Contact</span></a></li>
				</ul>
			</nav>
    		<h2 class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">Client Testimonials</h2>
            <div class="clear"></div>
            <span class="line animated" data-animation="bounceInLeft" data-revert="bounceOutRight">&nbsp;</span>
            
             <div class="slidercont">
	            <ul class="slides">
	            	<li>
	            	<?php $testimonials = get_field('testimonials');
					$i = 1; 
	            	foreach($testimonials as $testimonial){
	            		$cls = '';
						$list = '';
						if($i%2 == 0)
						{
							$cls = 'right';
							$list = '</li><li>';
						}
						else {
							$cls = 'left';
						}
	            	?>
        	    		<div class="<?php echo $cls; ?>">
	            			<?php echo $testimonial['description']; ?>
	                   		<span>- <?php echo $testimonial['client_name']; ?></span>
	            		</div>
	            	<?php 
	                	echo $list;
	                	$i++;
					} ?>
	                </li>
	            </ul>
            </div>
            <a class="read-more" href="#portfolio"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a>
        </div>
        <!--container -->
    </div>
    <div class="section" id="portfolio">
    	<!--container -->
    	<div class="container">
    		<nav class="side-navigation hide-mobile">
				<ul>
					<li><a title="Welcome" href="#main"><span>Welcome</span></a></li>
					<li><a title="Services" href="#services"><span>Services</span></a></li>
					<li><a title="Testimonials" href="#clients"><span>Testimonials</span></a></li>
					<li><a class="active" title="Portfolio" href="#portfolio"><span>Portfolio</span></a></li>
					<li><a title="About" href="#about"><span>About</span></a></li>
					<li><a title="Contact" href="#contact"><span>Contact</span></a></li>
				</ul>
			</nav>
        	<h2 class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">Portfolio</h2>
            <div class="clear"></div>
            <span class="line animated" data-animation="bounceInLeft" data-revert="bounceOutRight">&nbsp;</span>
            <div class="clear"></div>
           
            <div class="portfolio_home portfolio_home_web">	
            <div class="flexslider home_port">
            	<span class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">Web Application</span>
            	
            	<ul class="slides">	
				<?php
					query_posts('post_type=portfolio&portfolio_type=web&posts_per_page=-1');
					while( have_posts() ):the_post();
				
				?>
										<li>
											<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_field('image'); ?>">
											<p><?php the_title(); ?></p>
											</a>
											
										</li>
				<?php  endwhile; wp_reset_query(); ?>
				</ul>
            	
            </div>
            </div>
            <div class="portfolio_home">
            <div class="flexslider home_port">
            	<span class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">Mobile Application</span>
            	
            <ul class="slides">	
				<?php
					query_posts('post_type=portfolio&portfolio_type=mobile&posts_per_page=-1');
					while( have_posts() ):the_post();
					$image = get_field('image_gallery');
				?>
										<li>
											<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_field('image'); ?>">
											<p><?php the_title(); ?></p>
											</a>
											
										</li>
				<?php endwhile; wp_reset_query(); ?>
				</ul>
            	
            </div>
            </div>	
            
            <a class="read-more" href="#about"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a>
        </div>
        <!--container -->
    </div>
    <div class="section" id="about" >
    	<!--container -->
    	<div class="container">
    		<nav class="side-navigation hide-mobile">
				<ul>
					<li><a title="Welcome" href="#main"><span>Welcome</span></a></li>
					<li><a title="Services" href="#services"><span>Services</span></a></li>
					<li><a title="Testimonials" href="#clients"><span>Testimonials</span></a></li>
					<li><a title="Portfolio" href="#portfolio"><span>Portfolio</span></a></li>
					<li><a class="active" title="About" href="#about"><span>About</span></a></li>
					<li><a title="Contact" href="#contact"><span>Contact</span></a></li>
				</ul>
			</nav>
    		<?php while( has_sub_field('about_block') ){ ?>
        	<h2 class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">About</h2>
            <div class="clear"></div>
            <span class="line animated" data-animation="bounceInLeft" data-revert="bounceOutRight">&nbsp;</span>
            <div class="sub-head animated"  data-animation="flipInX" data-revert="flipOutX"><?php the_sub_field('about_subtitle'); ?></div>
            
            <ul>
            	<?php  
				$j=1;
            	while( has_sub_field('columns') ){
            		$anim = '';
            		if($j == 1)
					{
						$anim = 'Left';
					} 
					if($j == 2)
					{
						$anim = 'Up';
					}
					if($j == 3)
					{
						$anim = 'Right';
					}
            	?>
            	<li>
                	<h3 class="animated" data-animation="fadeInDown<?php echo $j; ?>" data-revert="fadeOutDown<?php echo $j; ?>"><?php the_sub_field('column_title'); ?></h3>
                    <p class="animated" data-animation="fadeIn<?php echo $anim; ?>" data-revert="fadeOut<?php echo $anim; ?>"><?php echo strip_tags(get_sub_field('column_description')); ?></p>
                </li>
                <?php $j++;} ?>
            </ul>
			<a class="read-more" href="#contact"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a>
			<?php } ?>
        </div>
        <!--container -->
    </div>
    <div class="section" id="contact">
    	<!--container -->
    	<div class="container">
    		<nav class="side-navigation hide-mobile">
			<ul>
    		<li><a title="Welcome" href="#main"><span>Welcome</span></a></li>
			<li><a title="Services" href="#services"><span>Services</span></a></li>
			<li><a title="Testimonials" href="#clients"><span>Testimonials</span></a></li>
			<li><a title="Portfolio" href="#portfolio"><span>Portfolio</span></a></li>
			<li><a title="About" href="#about"><span>About</span></a></li>
			<li><a class="active" title="Contact" href="#contact"><span>Contact</span></a></li>
			</ul>
			</nav>
			
        	<h2 class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">Get in touch</h2>
            <div class="clear"></div>
            <span class="line animated" data-animation="bounceInLeft" data-revert="bounceOutRight">&nbsp;</span>
            <div class="clear"></div>
            <div class="cnt-left animated home_fot" data-animation="fadeInLeft" data-revert="fadeOutLeft">
            	<?php dynamic_sidebar('sidebar-3'); ?>
	             <div class="face_folo"><!----facebook or linked following---->				 <div id="fb-root"></div>				<script>(function(d, s, id) {				  var js, fjs = d.getElementsByTagName(s)[0];				  if (d.getElementById(id)) return;				  js = d.createElement(s); js.id = id;				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";				  fjs.parentNode.insertBefore(js, fjs);				}(document, 'script', 'facebook-jssdk'));</script>					 <div class="fb-like" data-href="https://www.facebook.com/LetsNurture?" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>			   </div><!----facebook or linked following---->			    <div class="face_folo"><!----facebook or linked following---->						<script src="http://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>						<script type="IN/FollowCompany" data-id="1236420" data-counter="top"></script>			   </div><!----facebook or linked following---->   
            </div>
            <?php
    $digit1 = mt_rand(1,20);
    $digit2 = mt_rand(1,20);
    if( mt_rand(0,1) === 1 ) {
            $math = "$digit1 + $digit2";
            $_SESSION['answer'] = $digit1 + $digit2;
    } else {
            $math = "$digit1 - $digit2";
            $_SESSION['answer'] = $digit1 - $digit2;
    } 
    ?>
            <form class="animated home_footer" data-animation="fadeInRight" data-revert="fadeOutRight" method="post" id="home_conct_form">
            	<ul>
                	<li>
                    	<label>Your name *</label>
	                    <input type="text" name="your_name"   value="" placeholder=""  class="hm-cnt-txbx <?php  if(isset($errName)) echo $errName; ?>" />
                    </li>
                	<li>
                    	<label>Company *</label>
	                    <input type="text" name="company" value="" placeholder="" class="hm-cnt-txbx <?php  if(isset($errcompany)) echo $errcompany; ?>" />
                    </li>
                	<li class="half">
                    	<label>Phone *</label>
	                    <input type="text" name="phone" value="" placeholder=""  class="hm-cnt-txbx <?php  if(isset($errPhone)) echo $errPhone; ?>" />
                    </li>
                	<li class="half ff-right">
                    	<label>Email *</label>
	                    <input type="email" name="email" value="" placeholder="" " class="hm-cnt-txbx <?php  if(isset($errEmail)) echo $errEmail; ?>" />
                    </li>
                	<li>
                    	<label>Category *</label>
	                    <select name="category" class="hm-cnt-slct selectpicker <?php  if(isset($errCategory)) echo $errCategory; ?>" >
                        	<option value=""></option>
                            <option value="Logo Design">Logo Design</option>
                            <option value="UI Design">UI Design</option>
                            <option value="Prototype Design">Prototype Design</option>
                            <option value="App Design">App Design</option>
                            <option value="Brochure Design">Brochure Design</option>
			    <option value="Ecommerce Web">Ecommerce Web</option>	
			    <option value="CMS Web">CMS Web</option>	
			    <option value="Mobile Friendly Web">Mobile Friendly Web</option>	
			    <option value="POC Development">POC Development</option>
			    <option value="App Upgrade">App Upgrade</option>	
			    <option value="iOS8 Upgrade">iOS8 Upgrade</option>
			    <option value="Android Wear Development">Android Wear Development</option>
			    <option value="AI Development">AI Development</option>
			    <option value="Bluetooth Apps">Bluetooth Apps</option>
			    <option value="iBeacon Apps">iBeacon Apps</option>
		            <option value="NFC Apps">NFC Apps</option>
			    <option value="Other">Other</option>		
                        </select>
                    </li>
                	<li>
                    	<label>Enquiry *</label>
	                    <textarea name="enquiry" class="hm-cnt-txara <?php  if(isset($errEnquiry)) echo $errEnquiry; ?>"></textarea>
                    </li>
                    <li class="cpcha in_fot_cat">
                    	  <p>What's <?php echo $math; ?> = </p><input name="answer" type="text" /><p style="width: 245px ! important; text-align: right;"><?php echo $ctpwrong; ?></p><br />
									<!-- <input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /><span>+</span>
									<input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /><span>=</span>
									<input id="captcha" class="captcha <?php  if(isset($errCaptcha)) echo $errCaptcha; ?>" type="text" name="captcha" maxlength="2" />
									 -->
					</li>
                    
                	<li>
	                    <input type="submit" name="home_submit" id="home_submit"  value="Submit" class="hm-cnt-bt" />
                    </li>
                </ul>
            </form>
            
        </div>
        <!--container -->
        
            <div class="cpy">
            	<div class="container">
        
       			</div>
            	Copyright © 2014 Lets Nurture. India | UK <a href="<?php echo get_permalink(5241); ?>" title="Sitemap">Sitemap</a>
            </div>
    </div>

<?php get_footer(); ?>
