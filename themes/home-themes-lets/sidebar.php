<?php
/**
 * The Sidebar containing the main widget area
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
                <aside>
                	<div class="follow">
                    	<!-- <h3>follow & subscribe</h3> -->
                        <ul>
                        	<li><a class="ss1" href="http://www.facebook.com/LetsNurture" target="_blank" title="Facebook"></a></li>
                        	<li><a class="ss2" href="http://twitter.com/letsnurture" target="_blank" title="Twitter"></a></li>
                        	<li><a class="ss3" href="http://instagram.com/lets_nurture/" target="_blank" title="Instagram"></a></li>
                        	<li><a class="ss4" href="http://pinterest.com/letsnurture" target="_blank" title="Pinterest"></a></li>
                        	<li><a class="ss5" href="https://dribbble.com/letsnurture" target="_blank" title="Dribbble"></a></li>
                        	<li><a class="ss6" href="http://www.letsnurture.com/blog/feed/" target="_blank" title="Rss"></a></li>
                        </ul>
                    </div>
                    <div>
                    	<div class="subc">
                    		<h3 class="widget-title">
                    			Get Knowledge (it's free)
                    		</h3>
                    		<?php echo do_shortcode('[wysija_form id="1"]');?>
                    	</div>
                    </div>
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </aside>
                <!--aside -->
 <?php }?><!-- hide in mobile -->