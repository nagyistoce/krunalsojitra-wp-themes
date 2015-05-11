			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="inner-footer wrap">

					<div class="grid">

						<nav role="navigation" class="grid__item">
	    					
		                </nav><!--

		             --><div class="grid__item lap--one-third desk--one-third">
							<!-- <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p> -->

							<?php echo get_option('facebook_url') ? '<a href="'.get_option('facebook_url').'" class="fb">Facebook</a>' : ''; ?>
							<?php echo get_option('twitter_url') ? '<a href="'.get_option('twitter_url').'" class="twitter">Twitter</a>' : ''; ?>
							<?php echo get_option('linkedin_url') ? '<a href="'.get_option('linkedin_url').'" class="linkedin">LinkedIn</a>' : ''; ?>


		                </div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->

		</div> <!-- end #container -->
		
		<script>
        	$(window).load(function(){
        		$(".home-post section:nth-child(2n+2)").addClass("second"); 
				$(".desk--one-whole section:nth-child(3n+3)").addClass("third"); 
			});
        </script>
		<!-- all js scripts are loaded in library/bones.php -->
<?php 
global $wpdb;
$user_id = get_current_user_id();
$cont_notification = count($wpdb->get_results("SELECT * FROM `".$wpdb->prefix."notifications` WHERE `post_author_id`= $user_id AND `notification_status`= '0'"));
?>
<?php if($cont_notification > 0){ ?>
<script type="text/javascript">
	 $(document).ready(function(){
		$('.notifications').append('<span class="notifications_count"><?php if($cont_notification > 0){echo $cont_notification;}?></span>');
	});
</script>
	<?php } ?>	
<?php
	global $wpdb;
 $author_id = get_current_user_id();
  $user_id = get_current_user_id();
 $current_user = wp_get_current_user();
  $current_user_name = $current_user->user_login ;
 ?>
			
<!---------prayer like----->			
	<script type="text/javascript">
	var post_id;
	$(document).on("click" ,".like_plus", function(event){
		event.preventDefault();
		post_id = $(this).closest('ul').attr('id');
		author_ID = $(this).parent().parent().attr('id');
		var user_id = <?php echo $user_id; ?>;
		
		//alert(author_ID);
		
			var data = {};
			data.postid = post_id;
			data.userid = user_id;
			data.authorid = author_ID;
			data.action = "postlike_action";
			jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationSuccessLike);
		
	
	

	function locationSuccessLike(result){ //onSuccessFunction
	//alert(result);
		var count = result;
		//alert(count);
		$("#container #"+post_id+" li.like span").empty().append($.trim(count));
		
		if(result == 1){
			toastr.options.showMethod = 'slideDown'; 
			toastr.options.closeButton = true;
			toastr.options.positionClass = 'toast-bottom-left';
			toastr.options.timeOut= '10000';
				//toastr.info('You have liked this prayer.');
			
		}
	
	}
	});
	
	</script>
	<!---------prayer like----->	
<!---------add to prayer list----->
<script type="text/javascript">
	var post_id;
	$(document).on("click",".prayer_list", function(event){
		event.preventDefault();
		post_id = $(this).closest('ul').attr('id');
		author_ID = $(this).parent().parent().attr('id');
		var user_id = <?php echo $user_id; ?>;
		
		//alert(author_ID);
		
			var data = {};
			data.postid = post_id;
			data.userid = user_id;
			data.authorid = author_ID;
			data.action = "prayerlist_action";
			jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationSuccessList);
		
	
	

	function locationSuccessList(result){ //onSuccessFunction
	//alert(result);
		var count = $.trim(result);
		//alert(count);
		$("#"+post_id+" li.list span").html($.trim(count));
		 //$(this).parent().find('.user-name').html(count)
	if(result == 1){
		toastr.options.showMethod = 'slideDown'; 
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-left';
		toastr.options.timeOut= '10000';
			//toastr.info('Prayer added to prayer list');
		
	}
	
	}
	});
	
	</script>
<!---------add to prayer list----->
<!---------bookmark tag----->
<script type="text/javascript">
	var post_id;
	$(document).on("click",".prg", function(event){
		event.preventDefault();
		post_id = $(this).attr('id');
		post_tag = $(this).attr('title');
		var user_id = <?php echo $user_id; ?>;
		//alert(post_tag);
		
			var data = {};
			data.postid = post_id;
			data.posttag = post_tag;
			data.userid = user_id;
			data.action = "bookmarktag_action";
			jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationSuccessBookmark);
		
	
	

	function locationSuccessBookmark(result){ //onSuccessFunction
	//alert(result);
		if(result == 1){
			
			toastr.options.showMethod = 'slideDown'; 
			toastr.options.closeButton = true;
			toastr.options.positionClass = 'toast-bottom-left';
			toastr.options.timeOut= '10000';
			
			
				//toastr.info('#tag sucessfully bookmarked');
			
		
		}
	  }
	
	
	});
	
	</script>
<!---------bookmark tag----->

<!---------Featured image----->
<script type="text/javascript">
		var delay = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();

		
		var post_id;
		$("#description").on("keyup",function(){
		
			var array = [];
			 var description = $("#description").val();
			if (description.indexOf('#') > -1) {
			var split_value = description.match(/#(.*$)/)[1];//description.substring(description.indexOf('#')+1);
			var final_value = split_value.split(" ");
			//array.push();
			 //$("#devalue").val(final_value[0]); //add value in #devalue id 
			var final_tag_name = final_value[0]
			}
			
			delay(function () {
				var data = {};
				data.tagName = final_tag_name;
				data.rand = "false";
				data.action = "feactureimg_action";
				jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationFeatureImage);
			
			 }, 1550);
		});
		
		<?php if(!is_front_page()): ?> 
			$( document ).ready(function() {
			
			
				var array = [];
				var description = $("#description").val();
				if (description.indexOf('#') > -1) {
				var split_value = description.match(/#(.*$)/)[1];//description.substring(description.indexOf('#')+1);
				var final_value = split_value.split(" ");
				//array.push();
				 //$("#devalue").val(final_value[0]); //add value in #devalue id 
				var final_tag_name = final_value[0]
				}
				
				delay(function () {
					var data = {};
					data.tagName = final_tag_name;
					data.rand = "false";
					data.action = "feactureimg_action";
					jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationFeatureImage);
				
				 }, 1550);
			});
	<?php endif; ?>
	function locationFeatureImage(result){ //onSuccessFunction
		//alert(result);
	
		$("#fet_image").html(result);
	}
	
	</script>
<!---------Featured image----->

<!---------Click to Find Other Inspirations----->
<script type="text/javascript">
		var delayClick = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();

		
		var post_id;
		
		$(document).on("click","#new_post .right-img #inspiration",function(){
			
			//alert('inspiration');
			var array = [];
			 var description = $("#description").val();
			if (description.indexOf('#') > -1) {
			var split_value = description.match(/#(.*$)/)[1];//description.substring(description.indexOf('#')+1);
			var final_value = split_value.split(" ");
			//array.push();
			 //$("#devalue").val(final_value[0]); //add value in #devalue id 
			var final_tag_name = final_value[0]
			}
			
			delayClick(function () {
				var data = {};
				data.tagName = final_tag_name;
				data.rand = "true";
				data.action = "feactureimg_action";
				jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationFeatureImage);
			
			 }, 500);
		});
	
	function locationFeatureImage(result){ //onSuccessFunction
		//alert(result);
		$("#fet_image").html(result);
	}
	
	</script>
<!---------Click to Find Other Inspirations----->
    <script src="<?php echo get_template_directory_uri(); ?>/library/js/bootstrap-select.js"></script>
	<script type="text/javascript">
        window.onload=function(){
            $('.wpcf7-select').selectpicker();
        };
    </script>

<!---------auto search----->
	<script type="text/javascript">
		$(document).ready(function(){
				jQuery(document).on("keyup", "#s", function(){
				    jQuery(this).autocomplete({
				        source: "<?php echo get_template_directory_uri(); ?>/suggest-names.php",
				        minLength: 3,
				        //search: function(){$(this).addClass('loading');},
        				//open: function(){$(this).removeClass('loading');}
				    });
				});
				
				
			});

	</script>
<!---------auto search----->
<?php wp_footer(); ?>

</body>
</html> <!-- end page. what a ride! -->