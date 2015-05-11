<?php
/**
 * Template Name: Home Page(index.php)
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php if(isset($_SESSION['device_type_str']) && !empty($_SESSION['device_type_str'])){ $type = $_SESSION['device_type_str'];}?>
<style>
	header{background: none;}
	 header.sml-hd .logo a img{width: 183px;}
	 header.sml-hd a.get-but{    margin-top: 9px;}
	 header.sml-hd nav ul{  margin-top: 20px;}
	 .sml-hd .header_faq a{border-bottom;none;font-size:16px;}
	 header.sml-hd nav ul.desk-menu li .fst_lev{ font-size: 17px;}
</style>

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
    		<!-- <div class="slidercont">
    		<ul class="slides">
    			<?php while( has_sub_field('slider_block') ){ ?>
    				<li>
    				<h1 class="animated" data-animation="bounceInDown" data-revert="bounceOutUp"><?php the_sub_field('title'); ?></h1>
		        	
		            <a class="cta animated" data-animation="flipInX" data-revert="flipOutX" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_text'); ?></a>
		           
		            </li>
		        <?php } ?>	
    		</ul>
    		</div> -->
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
		            <?php if($type=='other'){?><!-- hide in mobile --> 
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
		            <?php }?><!-- hide in mobile -->
            <?php } ?>
            
            <a class="read-more" href="#clients"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a>
            
        </div>
        <!--container -->
    </div>

 <?php if($type=='other'){?><!-- hide in mobile -->
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
             <div class="">
	            <ul class="bxslider">
	            	<?php $testimonials = get_field('testimonials');
					foreach($testimonials as $testimonial){ ?>
	            	<li>
						<div class="testimonial-mainnew">
							<div class="testimonial-authorimg">
								<?php if($testimonial['images'] != ""){?>
								<img src="<?php echo $testimonial['images']; ?>" />
								<?php }else{?>
									<img src="<?php bloginfo('template_directory'); ?>/images/1-new.png" />
								<?php }?>
								<p class="testimonial-author"><?php echo $testimonial['client_name']; ?></p>
								<!-- <span class="author-city">Italy</span> -->
							</div>
							<div class="testimonial-cont">
								<blockquote class="testimonial"> 
									<?php echo $testimonial['description']; ?>
								</blockquote>
							</div>
						</div>
	                </li>
	                <?php 
	                	echo $list;
	                	$i++;
					} ?>
	            
	            </ul>
            </div>

           
            
             
            <a class="read-more" href="#portfolio"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a>
        </div>
        <!--container -->
    </div>
<?php }?><!-- hide in mobile -->
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
				<?php $portfolios = get_field('home_portfolio_web');
					foreach($portfolios as $portfolio){ ?>
						<li>
							<a href="<?php the_permalink();?>" title="<?php echo $portfolio['title']; ?>">
							<img src="<?php echo $portfolio['image']; ?>">
							<p><?php echo $portfolio['title']; ?></p>
							</a>
							
						</li>
				<?php 
	                } ?>
				</ul>
            	
            </div>
            </div>
            <div class="portfolio_home">
            <div class="flexslider home_port">
            	<span class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">Mobile Application</span>
            	
            <ul class="slides">	
				<?php $portfolios = get_field('home_portfolio_mobile');
					foreach($portfolios as $portfolio){ ?>
						<li>
							<a href="<?php the_permalink();?>" title="<?php echo $portfolio['title']; ?>">
							<img src="<?php echo $portfolio['image']; ?>">
							<p><?php echo $portfolio['title']; ?></p>
							</a>
							
						</li>
				<?php 
	                } ?>
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
            		<?php } ?>
            <ul>
            	<?php
			$args = array(
			'post_type'=> 'post',
            'category_name'  => 'blog',
              'orderby' => 'post_date',
			 'posts_per_page'=>'1',
			
           );
           
			query_posts( $args ); 
			while (have_posts()) : the_post(); 
			
		?>
            	<li><h2 class="three_section">Latest Blog</h2>
                	<h3 class="animated" data-animation="fadeInDown" data-revert="fadeOutDown"><?php echo substr(get_the_title(), 0 , 98); ?>...</h3>
                    <p class="animated" data-animation="fadeIn" data-revert="fadeOut">
                    	<?php //echo substr(get_the_content(), 0 , 150);?>
                    	<?php echo content(30); ?> 
                    	</p>
                    	<a class="read-more-post" href="<?php echo get_permalink(); ?>">Read more..</a>
                </li>
          <?php  endwhile; wp_reset_query(); ?>
         <?php 
         			
         				$args = array( 'category_name'=>'news-page','order'=>'DESC','posts_per_page'=>'1' );
					$myposts = get_posts( $args );
					
					foreach( $myposts as $post ) :	setup_postdata($post);
                       ?>
                <li><h2 class="three_section">Latest News</h2>
                	<h3 class="animated" data-animation="fadeInDown" data-revert="fadeOutDown"><?php echo substr(get_the_title(), 0 , 98); ?>...</h3>
                    <p class="animated" data-animation="fadeIn" data-revert="fadeOut">
                    	<?php echo substr(get_the_content(), 0 , 150);?>
                    	<?php //echo content(30); ?> 
                    	</p>
                    	<a class="read-more-post" href="<?php echo get_permalink(); ?>">Read more..</a>
                </li>
                 <?php  endforeach;  ?>
               <?php 
         			
         				$args = array( 'category_name'=>'event','order'=>'DESC','posts_per_page'=>'1', 'post_status' => 'publish');
					$myposts = get_posts( $args );
					
					foreach( $myposts as $post ) :	setup_postdata($post);
                       ?>
                         <li><h2 class="three_section">Latest Events</h2>
                	<h3 class="animated" data-animation="fadeInDown" data-revert="fadeOutDown"><?php echo substr(get_the_title(), 0 , 98); ?>...</h3>
                    <p class="animated" data-animation="fadeIn" data-revert="fadeOut">
                    	<?php echo substr(get_the_content(), 0 , 150);?>
                    	</p>
                    	<a class="read-more-post" href="<?php echo get_permalink(); ?>">Read more..</a>
                </li>
                <?php  endforeach;  ?>
            </ul>
			<a class="read-more" href="#contact"><img src="<?php bloginfo('template_directory'); ?>/images/read-more.png" /></a>
	
        </div>
        <!--container -->
   </div>
<?php get_footer(); ?>
<style>
	.section h2.three_section {
    margin-top: 0 !important;
}
.read-more-post {
    clear: both;
    float: right;
    font-family: arial;
    font-size: 17px;
    font-weight: lighter;
}

.testimonial {
    margin: 0;
    /*background: #B7EDFF;*/
 padding: 10px 50px;
 position: relative;
 font-family: Georgia, serif;
 /*color: #fff;*/
 border-radius: 5px;
 font-style: italic;
 /*text-shadow: 0 1px 0 #ECFBFF;*/
 /*background: #0099FF;*/
}

.testimonial:before{
 content: "";
 position: absolute;
 font-size: 80px;
 line-height: 1;
 color: #000;
 font-style: normal;
 width:18px;
 height:18px;
 background: url("<?php bloginfo('template_directory'); ?>/images/invert.png") center no-repeat;
}

.testimonial:before {
 top: 0;
 left: 10px;
}/*
.testimonial:after {
 content: "\201D";
 right: 10px;
 bottom: -0.5em;
}
*/
.testimonial-author {
 margin: 0 0 0 25px;
 font-family: Arial, Helvetica, sans-serif;
 color: #999;
 text-align:left;
 font-weight: bold;
}
.testimonial-author span {
 font-size: 12px;
 color: #666;
}
.testimonial-mainnew{float: left; width: 100%;}
.testimonial-authorimg{float: left; width: 140px; text-align: center;}
p.testimonial-author{text-align: center !important; color: rgb(0, 0, 0); font-weight: normal; font-size: 19px;}
span.author-city{float: left; font-size: 14px; width: 101%; font-weight: bold;}
.testimonial-cont{float: none; width: auto; display:table;}
.slidercont{margin-top: 44px !important; z-index: 99; position: relative;}
.testimonial > p {
    color: #5b5959;
    font-style: normal;
    font-weight: normal;
    line-height: 22px;
}

@media screen and (max-width:480px) {
	.testimonial { padding:10px 0 10px 30px;}
	.testimonial p { line-height: 24px;}
		
}
@media screen and (max-width:320px) {
	
}

</style>

<script src="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('.bxslider').bxSlider({
  minSlides: 2,
  maxSlides: 2,
  slideWidth: 800,
  slideMargin: 10,
  pager: false,
 	auto: true,
  touchEnabled: true,
controls: false
  
  
});
});
</script>