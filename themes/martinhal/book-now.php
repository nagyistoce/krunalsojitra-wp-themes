<?php
/*
Template Name: Book Now
*/

get_header(); ?>

<?php
	$page_object = get_queried_object();
	$page_id  = get_queried_object_id(); // Get current page id
	$title = get_post($page_id); // Get live webcam page title
	$custom_image = get_field('detail_page_image', $page_id);
	
	if(get_field('detail_page_image', $page_id)){
		?>
			<style type="text/css">
				#contact-slide {
					background-image: url(<?php echo $custom_image; ?>) !important;
					-webkit-background-size: cover !important;
		  			-moz-background-size: cover !important;
		  			-o-background-size: cover !important;
		  			background-size: cover !important;
				}
			</style>
		<?php
	}else{
		?>
			<style type="text/css">
				#contact-slide {
					background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
					min-height: 800px !important;
					max-height: 800px !important;
					background-size: auto 100% !important;
				}
			</style>
		<?php
	}
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.js"></script>
<script type="text/javascript">
	$(function() {
		$("#from").datepicker({
			//defaultDate : "+1w",
			minDate : 0,
			dateFormat : "yy-mm-dd",
			changeMonth : true,
			numberOfMonths : 2,
			onClose : function(selectedDate) {
				$("#to").datepicker("option", "minDate", selectedDate);
			}
		});

		$("#to").datepicker({
			//defaultDate : "+1w",
			dateFormat : "yy-mm-dd",
			changeMonth : true,
			numberOfMonths : 2,
			onClose : function(selectedDate) {
				$("#from").datepicker("option", "maxDate", selectedDate);
			}
		});
	});
</script>
    <div class="slide special_offers" id="pkg-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="packege-box" >
        	
			<?php //echo '<h4>'. $title->post_title .'</h4>';	?>
            <div class="clear"></div>
            	
            	<!--<form method="get" action="http://www.martinhal.com/booking-engine/index2.html" target="_blank">
            		<ul>
                    	<li>
                    		<label for="from">Check in</label>
                        	<input type="text" id="from" name="from" class="job-form-txbx">
                        </li>
                    	<li>
                    		<label for="to">Check out</label>
                        	<input type="text" id="to" name="to" class="job-form-txbx">
                        </li>
                    	<li>
                        	<input type="hidden" name="hotel" value="2191,2192,2194">
                        </li>
                        <li>
                        	<input type="submit" value="Search" class="job-form-send">
                        </li>
                    </ul>
            	</form>-->
				
				
				<?php
					header("Access-Control-Allow-Origin: *");
				?>
				<script src="https://connect.protel.net/files/wbe/2/WBEApp.js" type="text/javascript"></script>
				<script language="javascript" type="text/javascript">
					protelWBE = new WBE4();
					protelWBE.GoogleApiClientId = '';
					protelWBE.GoogleApiKey = '';
					protelWBE.FacebookAppID = "";
					protelWBE.TwitterApiKey = "";
					protelWBE.RegisterResultView('Search-Results');
					protelWBE.RegisterDetailView('DetailView-Content');
					protelWBE.RegisterHeaderContainer('headerWBE4');
					protelWBE.RegisterFooterContainer('footerWBE4');
					protelWBE.RenderWbeToContainer ="wbecontent";
					protelWBE.WbeSettings.CustomErrorPage="";
					protelWBE.APIKey="5031772a-c076-4b01-b125-e6ab12130700";
					protelWBE.WbeSettings.Design = 'liquid';
					protelWBE.TemplatePath = "<?php echo get_template_directory_uri(); ?>/booking-engine/";
					protelWBE.Init();
				</script>

				<div id="wbecontent"  style="width: 957px;"></div>
    

			
         </div>
	</div>
	


<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
	(function($){
		$(window).load(function(){
			$("#offers-slide").mCustomScrollbar({
				scrollButtons:{
					enable:true
				}
			});
			$("#offers-slide").hover(function(){
				$(document).data({"keyboard-input":"enabled"});
				$(this).addClass("keyboard-input");
			},function(){
				$(document).data({"keyboard-input":"disabled"});
				$(this).removeClass("keyboard-input");
			});
			// $(document).keydown(function(e){
				// if($(this).data("keyboard-input")==="enabled"){
					// var activeElem=$(".keyboard-input"),
						// activeElemPos=Math.abs($(".keyboard-input .mCSB_container").position().top),
						// pixelsToScroll=900;
					// if(e.which===100){ //scroll up
						// e.preventDefault();
						// if(pixelsToScroll>activeElemPos){
							// activeElem.mCustomScrollbar("scrollTo","top");
						// }else{
							// activeElem.mCustomScrollbar("scrollTo",(activeElemPos-pixelsToScroll),{scrollInertia:100,scrollEasing:"easeOutCirc"});
						// }
					// }else if(e.which===100){ //scroll down
						// e.preventDefault();
						// activeElem.mCustomScrollbar("scrollTo",(activeElemPos+pixelsToScroll),{scrollInertia:100,scrollEasing:"easeOutCirc"});
					// }
				// }
			// });
		});
	})(jQuery);
</script>
<style>
	html, body{text-shadow:none;}
	.wbe4Wrapper #MemberContent{  width: 181px;}
	.wbe4Wrapper #Search-Box-Container .TabSelector ul li.k-state-active, 
	.wbe4Wrapper #Search-Box-Container .TabSelector .k-content{ background: #8C2203;}
	#headerPersonal #div_basket .icon{ color: #8C2203;}
	.wbe4Wrapper #TabSelectorSearchBox .k-link:hover{ background: #8C2203;}
	.wbe4Wrapper #Search-Box-Container .TabSelector ul li.k-state-active a{font-size: 19px;    margin-top: 25px;    text-align: center;    text-decoration: none;}
	.wbe4Wrapper #Search-Box-Container .TabSelector ul li.k-state-active, .wbe4Wrapper #Search-Box-Container .TabSelector .k-content{ border: none !important;}
	#search-bar-basic .searchLineFull{margin-left: 125px;}
	#returningCustomer .icon{display: none;}
	.wbe4Wrapper #footerMark{border-top:2px solid #8C2203;}
	.wbe4Wrapper .wbeButton{padding: 8px 17px;}
	.wbe4Wrapper .wbeButton:hover{padding: 8px 17px;}
	.searchLineFull .searchLine{text-align: left;}
	.wbe4Wrapper #HotelTabs li:hover{background-color: #67B8DE;   border-color: #67B8DE; padding: 2.5px;}
    .wbe4Wrapper #HotelTabs li:hover a{ color: #FFFFFF;}
	#Search-Results .searchBoxDiv label{  padding-right: 17px; float: left;}
	#Search-Results{padding: 0 14px;}
	.requiredSmb {    display: none;}
	.k-widget.k-dropdown.k-header {    clear: both;    float: left;}
	.k-animation-container.wbe4Wrapper.bgKfix{margin-left: -18px;}
.wbe4Wrapper #SocialLogin li#addAccount a:hover {    width: 161px;}
.tableBox.fixIE8Table{ float: left;}
#LoginFormAuthID > p {    clear: both;    float: left;    font-size: 12px;}
</style>
<?php get_footer(); ?>