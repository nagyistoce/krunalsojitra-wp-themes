<?php 	global $wpdb;
 $author_id = get_current_user_id();
 $user_id = get_current_user_id();
 $current_user = wp_get_current_user();
 $current_user_name = $current_user->user_login ;
  $user_eamil = $current_user->user_email; 

global $pccf_defaults;
$tmp = get_option( 'pccf_options');
$db_search_string = $tmp['txtar_keywords'];
//print_r($db_search_string);
$rows = explode(",", $db_search_string);
//print_r($rows);
for($n=0;$n<count($rows);$n++)
{
	$abbusive_keyword_arr[] = "'".$rows[$n]."'";
}
$abbusive_keywords = @implode(", ", $abbusive_keyword_arr);
 ?>
	<script type="text/javascript">
	function isUrl(s) {
		var regexp = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org|.uk]+(\[\?%&=]*)?/
		return regexp.test(s);
		}
		$(document).ready(function() {
			$( "input[name$='RBL_Mail']" ).val( "<?php echo $user_eamil; ?>" );
			// validate signup form on keyup and submit
			$("#commentform").validate({
				rules: {
					author: {
						required: true,
						minlength: 2,
						maxlength: 10,
					},
					email: {
						required: true,
						email: true,
						maxlength: 35,
					},
					comment: {
						required: true,
						//minlength: 6,
						maxlength: 25,
					},
					
				},
				messages: {
					author: {
						required: "Required",
						maxlength:"Max required"
					},
					email: {
						email: "Not a valid email",
						maxlength:"Max required"
					},
					comment: {
						required: "Required",
						//minlength: "Minimum 6 Characters",
						maxlength:"Max 25 Character allowed"
					},
					
				}
			});
			
			$("#editpost").validate({
				rules: {
					post_cont: {
						required: true,
						//minlength: 6,
						maxlength: 225,
					}
					
				},
				messages: {
					post_cont: {
						required: "Required",
						//minlength: "Minimum 20 Characters",
						maxlength:"Max 225 Character allowed"
					},
						
					}
			});
			$("#editcomment").validate({
				rules: {
					edit_coment: {
						required: true,
						//minlength: 6,
						maxlength: 25,
					}
					
				},
				messages: {
					edit_coment: {
						required: "Required",
						//minlength: "Minimum 6 Characters",
						maxlength:"Max 25 Character allowed"
					},
						
					}
			});
		});
$(document).on("click","#submit", function(){
				var keyword_array = [];
				var description = $("#comment").val();
				keyword_array = description.split(" ");
				var abusive_keyword_array = [];
				abusive_keyword_array = [<?php echo $abbusive_keywords;?>]
				var count = 0
				for (var i = 0; i < keyword_array.length; i++) {
					//alert(keyword_array[i]);
				    for (var j = 0; j < abusive_keyword_array.length; j++) {
				    	//alert(keyword_array[i]+"--"+abusive_keyword_array[j]);
				        if (keyword_array[i].trim() == abusive_keyword_array[j].trim()) {
				        	//is_abusive = 1;
				        		//alert("Please do not use abusive words");
				        		count = j;
				        		
				        }
				    }
				}		
						
					 if(isUrl($('#comment').val()))
						{
							toastr.options.showMethod = 'slideDown'; 
							toastr.options.closeButton = true;
							toastr.options.positionClass = 'toast-bottom-left';
							toastr.options.timeOut= '10000';
						    toastr.error('Url not allow.');
						
						return false;
						}
					else if(count > 0){
						
							toastr.options.showMethod = 'slideDown'; 
							toastr.options.closeButton = true;
							toastr.options.positionClass = 'toast-bottom-left';
							toastr.options.timeOut= '10000';
						    toastr.error('No foul language please');
						return false;
					}else{
						//alert("submit");
						 return true;
						}
			  });

</script>
<style type="text/css">
.dark_overlay {
	display: none;
	position: relative;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	
	z-index: 1001;
	
}
.bright_content {
	display: none;
	position: relative;
	top: 25%;
	width: 58%;
	background-color: rgba(255, 255, 255, 0.22);
	z-index: 1002;
	overflow: auto;
	padding:2%;
	margin:0px auto;
}
.pop_mes h3 {
	color: #000000;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 24px;
	font-weight: bold;
	line-height: 34px;
}
.pop_mes p {
	color: #000000;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 20px;
	line-height: 30px;
	margin-bottom: 15px;
	margin-top: 30px;
}
#submit{  background: none repeat scroll 0 0 #53a7e8;
    border: 1px solid #4092d0;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
   
    font-size: 15px;
    font-weight: bold;
    padding: 5px 12px;}
 .close{ color:  #53a7e8;}
.close:hover{ color:  #fff;}
</style>
		
<!-----pop script---->
	<script type="text/javascript">
	$(document).ready(function(){
		mamu = ($(window).height());
		$('.cool').css({'height': mamu + 'px'});
		$('.cool').css({'position': 'fixed'}); 
		var hei = $('.main').height();
		var mam = (mamu - hei) / 3;
		$('.main').css({'top': mam + "px"});
	});
	function popUp(){
		document.getElementById('light').style.display='block';
		document.getElementById('fade').style.display='block'
	}
	function popUpClose(){
		document.getElementById('light').style.display='none';
		document.getElementById('fade').style.display='none'
	}
	</script>
<!-----edit post----->
	<div id="fade" class="dark_overlay cool">
			<div id="light" class="bright_content main">
			      <div class="pop_mes">
					   <form method="post" action="" id="editpost" name="editpost">
						   	<textarea name="post_cont" id="post_cont"><?php print $content = get_the_content();?></textarea>
							<input type="button" name="update" value="Update"  class="update_content" id="update"/>
					   </form>
				  </div>
				<a href="javascript:void(0)" onclick="popUpClose()" class="close"> Close</a> 
			</div> 
		</div>
		<?php $postid = get_the_ID(); ?> 
		<!---------update prayer----->
<script type="text/javascript">
	var post_id;
	$(document).on("click",".update_content", function(event){
	  var keyword_array = [];
				var description = $("#post_cont").val();
				keyword_array = description.split(" ");

				var abusive_keyword_array = [];
				abusive_keyword_array = [<?php echo $abbusive_keywords;?>]

				
				var count = 0
				
				for (var i = 0; i < keyword_array.length; i++) {
					//alert(keyword_array[i]);
				    for (var j = 0; j < abusive_keyword_array.length; j++) {
				    	//alert(keyword_array[i]+"--"+abusive_keyword_array[j]);
				        if (keyword_array[i].trim() == abusive_keyword_array[j].trim() || keyword_array[i].trim() == '#'+abusive_keyword_array[j].trim()) {
				        	//is_abusive = 1;
				        		//alert("Please do not use abusive words");
				        		count = j;
				        		
				        }
				    }
				}		
		if ($('#editpost').valid()){
		event.preventDefault();
		//postconts = $('#post_cont').val();
		//alert(postconts);
		var post_id = <?php echo get_the_ID(); ?>;
		//alert("helo");
		
			var data = {};
			data.postcont = $('#post_cont').val();
			data.postid = post_id;
			data.action = "updatepost_action";
			jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationupdatepostSuccessList);
		}
		function locationupdatepostSuccessList(result){ //onSuccessFunction
			//jQuery('#loader').hide(); // HIDE AJAX LOADER
			var result = result;
				//alert(result);
			if( result > 1 || result == 0){
				toastr.options.showMethod = 'slideDown'; 
				toastr.options.closeButton = true;
				toastr.options.positionClass = 'toast-bottom-left';
				toastr.options.timeOut= '10000';
				if(result > 1){ 
					toastr.error('More than one #tag not allowed');
				}else{ 
					toastr.error('At least one #tag required');
			    }
			}
			else if(isUrl($('#post_cont').val()))
				{
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-bottom-left';
					toastr.options.timeOut= '10000';
				    toastr.error('Url not allow.');
				//return false;
				}
			else if(count > 0){
				
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-bottom-left';
					toastr.options.timeOut= '10000';
				    toastr.error('No foul language please');
				//return false;
			}else{
				location.reload();
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-bottom-left';
					toastr.options.timeOut= '10000';
				    toastr.info('Update post!');
				}
		
		}
	
});
	
	</script>
<!---------update prayer----->
<!-----edit post end----->		