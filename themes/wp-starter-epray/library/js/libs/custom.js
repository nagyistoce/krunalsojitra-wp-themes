 <script type="text/javascript">
 								
		function isUrl(s) {
		var regexp = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org|.uk]+(\[\?%&=]*)?/
		return regexp.test(s);
		}
								
				 $(document).ready(function(){
				 	var flag=0;
					// validate signup form on keyup and submit
					$("#new_post").validate({
						rules: {
							description: {
								required: true,
								//minlength: 20,
					 			maxlength: 225
							},
							image_featured: {
								//required: true
								//extension: "jpg|png"			
							},
							
						},
						messages: {
							description: {
								required: "Required",
								//minlength:"Minimum 20 Characters",
								maxlength:"Maximum 225 words allowed"
							},
							image_featured: {
								//required: "Required",
								//extension:"File Format not supported"
							 },
							
						}
					});
					
					
					$('#image_featured').on('change', function(evt){
						$('#validExt').html('');
					
					    var file = evt.target.files[0];
					    
						
					    if(file.type.match('image.*')){
					        var reader = new FileReader();
					        reader.onload = (function(file){
					            return function(e){
									$('#validExt').html('');
									
									$('#dis_upload_img').attr('src',e.target.result);
					                // $('#upload_img').css({
					                    // 'background-image': 'url(' + e.target.result +')' 
					                // });
					            }
					        })(file);
					    }else
						{
							$('#validExt').css('color','red');
							$('#validExt').html('Not an image');
							return false;
						}
					    
					    reader.readAsDataURL(file);
					})
					
					
					//find has tag 
					$("#description").on("change",function(){

						if (description.indexOf('#') > -1) {
						var split_value = description.match(/#(.*$)/)[1];//description.substring(description.indexOf('#')+1);
						var final_value = split_value.split(" ");
						//array.push();
						 //$("#devalue").val(final_value[0]); //add value in #devalue id 
						//alert(final_value[0]);
							}
					});
			
			
						     $(".phn").live("click", function(){
					    	$('.phn').removeClass('active');
					        $(this).addClass('active');
						    });
						
						$(document).on("click","#submit", function(){
							
							
						var keyword_array = [];
						var description = $("#description").val();
						keyword_array = description.split(" ");

						var abusive_keyword_array = [];
						abusive_keyword_array = [<?php echo $abbusive_keywords;?>]
//var _0xb0ea=["\x61\x35\x35","\x61\x35\x35\x68\x6F\x6C\x65","\x20\x61\x65\x6F\x6C\x75\x73","\x20\x61\x68\x6F\x6C\x65","\x20\x61\x6E\x61\x6C","\x20\x61\x6E\x61\x6C\x70\x72\x6F\x62\x65","\x20\x61\x6E\x69\x6C\x69\x6E\x67\x75\x73","\x20\x61\x6E\x75\x73","\x20\x61\x72\x65\x6F\x6C\x61","\x20\x61\x72\x65\x6F\x6C\x65","\x20\x61\x72\x69\x61\x6E","\x20\x61\x72\x79\x61\x6E","\x20\x61\x73\x73","\x20\x61\x73\x73\x62\x61\x6E\x67","\x20\x61\x73\x73\x62\x61\x6E\x67\x65\x64","\x20\x61\x73\x73\x62\x61\x6E\x67\x73","\x20\x61\x73\x73\x65\x73","\x20\x61\x73\x73\x66\x75\x63\x6B","\x20\x61\x73\x73\x66\x75\x63\x6B\x65\x72","\x20\x61\x73\x73\x68\x30\x6C\x65","\x20\x61\x73\x73\x68\x61\x74","\x20\x61\x73\x73\x68\x6F\x31\x65","\x20\x61\x73\x73\x20\x68\x6F\x6C\x65","\x20\x61\x73\x73\x68\x6F\x6C\x65\x73","\x20\x61\x73\x73\x6D\x61\x73\x74\x65\x72","\x20\x61\x73\x73\x6D\x75\x6E\x63\x68","\x20\x61\x73\x73\x77\x69\x70\x65","\x20\x61\x73\x73\x77\x69\x70\x65\x73","\x20\x61\x7A\x61\x7A\x65\x6C","\x20\x61\x7A\x7A","\x20\x62\x31\x74\x63\x68","\x20\x62\x61\x62\x65","\x20\x62\x61\x62\x65\x73","\x20\x62\x61\x6C\x6C\x73\x61\x63\x6B","\x20\x62\x61\x6E\x67","\x20\x62\x61\x6E\x67\x65\x72","\x20\x62\x61\x72\x66","\x20\x62\x61\x73\x74\x61\x72\x64","\x20\x62\x61\x73\x74\x61\x72\x64\x73","\x20\x62\x61\x77\x64\x79","\x20\x62\x65\x61\x6E\x65\x72","\x20\x62\x65\x61\x72\x64\x65\x64\x63\x6C\x61\x6D","\x20\x62\x65\x61\x73\x74\x69\x61\x6C\x69\x74\x79","\x20\x62\x65\x61\x74\x63\x68","\x20\x62\x65\x61\x74\x65\x72","\x20\x62\x65\x61\x76\x65\x72","\x20\x62\x65\x65\x72","\x20\x62\x65\x65\x79\x6F\x74\x63\x68","\x20\x62\x65\x6F\x74\x63\x68","\x20\x62\x69\x61\x74\x63\x68","\x20\x62\x69\x67\x74\x69\x74\x73","\x20\x62\x69\x67\x20\x74\x69\x74\x73","\x20\x62\x69\x6D\x62\x6F","\x20\x62\x69\x74\x63\x68","\x20\x62\x69\x74\x63\x68\x65\x64","\x20\x62\x69\x74\x63\x68\x65\x73","\x20\x62\x69\x74\x63\x68\x79","\x20\x62\x6C\x6F\x77\x20\x6A\x6F\x62","\x20\x62\x6C\x6F\x77","\x20\x62\x6C\x6F\x77\x6A\x6F\x62","\x20\x62\x6C\x6F\x77\x6A\x6F\x62\x73","\x20\x62\x6F\x64","\x20\x62\x6F\x64\x69\x6C\x79","\x20\x62\x6F\x69\x6E\x6B","\x20\x62\x6F\x6C\x6C\x6F\x63\x6B","\x20\x62\x6F\x6C\x6C\x6F\x63\x6B\x73","\x20\x62\x6F\x6C\x6C\x6F\x6B","\x20\x62\x6F\x6E\x65","\x20\x62\x6F\x6E\x65\x64","\x20\x62\x6F\x6E\x65\x72","\x20\x62\x6F\x6E\x65\x72\x73","\x20\x62\x6F\x6E\x67","\x20\x62\x6F\x6F\x62","\x20\x62\x6F\x6F\x62\x69\x65\x73","\x20\x62\x6F\x6F\x62\x73","\x20\x62\x6F\x6F\x62\x79","\x20\x62\x6F\x6F\x67\x65\x72","\x20\x62\x6F\x6F\x6B\x69\x65","\x20\x62\x6F\x6F\x74\x65\x65","\x20\x62\x6F\x6F\x74\x69\x65","\x20\x62\x6F\x6F\x74\x79","\x20\x62\x6F\x6F\x7A\x65","\x20\x62\x6F\x6F\x7A\x65\x72","\x20\x62\x6F\x6F\x7A\x79","\x20\x62\x6F\x73\x6F\x6D","\x20\x62\x6F\x73\x6F\x6D\x79","\x20\x62\x6F\x77\x65\x6C","\x20\x62\x6F\x77\x65\x6C\x73","\x20\x62\x72\x61","\x20\x62\x72\x61\x73\x73\x69\x65\x72\x65","\x20\x62\x72\x65\x61\x73\x74","\x20\x62\x72\x65\x61\x73\x74\x73","\x20\x62\x75\x67\x67\x65\x72","\x20\x62\x75\x6B\x6B\x61\x6B\x65","\x20\x62\x75\x6C\x6C\x73\x68\x69\x74","\x20\x62\x75\x6C\x6C\x20\x73\x68\x69\x74","\x20\x62\x75\x6C\x6C\x73\x68\x69\x74\x73","\x20\x62\x75\x6C\x6C\x73\x68\x69\x74\x74\x65\x64","\x20\x62\x75\x6C\x6C\x74\x75\x72\x64\x73","\x20\x62\x75\x6E\x67","\x20\x62\x75\x73\x74\x79","\x20\x62\x75\x74\x74","\x20\x62\x75\x74\x74\x20\x66\x75\x63\x6B","\x20\x62\x75\x74\x74\x66\x75\x63\x6B","\x20\x62\x75\x74\x74\x66\x75\x63\x6B\x65\x72","\x20\x62\x75\x74\x74\x70\x6C\x75\x67","\x20\x63\x2E\x30\x2E\x63\x2E\x6B","\x20\x63\x2E\x6F\x2E\x63\x2E\x6B\x2E","\x20\x63\x2E\x75\x2E\x6E\x2E\x74","\x20\x63\x30\x63\x6B","\x20\x63\x2D\x30\x2D\x63\x2D\x6B","\x20\x63\x61\x63\x61","\x20\x63\x61\x68\x6F\x6E\x65","\x20\x63\x61\x6D\x65\x6C\x74\x6F\x65","\x20\x63\x61\x72\x70\x65\x74\x6D\x75\x6E\x63\x68\x65\x72","\x20\x63\x61\x77\x6B","\x20\x63\x65\x72\x76\x69\x78","\x20\x63\x68\x69\x6E\x63","\x20\x63\x68\x69\x6E\x63\x73","\x20\x63\x68\x69\x6E\x6B","\x20\x63\x68\x6F\x64\x65","\x20\x63\x68\x6F\x64\x65\x73","\x20\x63\x6C\x31\x74","\x20\x63\x6C\x69\x6D\x61\x78","\x20\x63\x6C\x69\x74","\x20\x63\x6C\x69\x74\x6F\x72\x69\x73","\x20\x63\x6C\x69\x74\x6F\x72\x75\x73","\x20\x63\x6C\x69\x74\x73","\x20\x63\x6C\x69\x74\x74\x79","\x20\x63\x6F\x63\x61\x69\x6E","\x20\x63\x6F\x63\x61\x69\x6E\x65","\x20\x63\x6F\x63\x6B","\x20\x63\x2D\x6F\x2D\x63\x2D\x6B","\x20\x63\x6F\x63\x6B\x62\x6C\x6F\x63\x6B","\x20\x63\x6F\x63\x6B\x68\x6F\x6C\x73\x74\x65\x72","\x20\x63\x6F\x63\x6B\x6B\x6E\x6F\x63\x6B\x65\x72","\x20\x63\x6F\x63\x6B\x73","\x20\x63\x6F\x63\x6B\x73\x6D\x6F\x6B\x65\x72","\x20\x63\x6F\x63\x6B\x73\x75\x63\x6B\x65\x72","\x20\x63\x6F\x63\x6B\x20\x73\x75\x63\x6B\x65\x72","\x20\x63\x6F\x69\x74\x61\x6C","\x20\x63\x6F\x6D\x6D\x69\x65","\x20\x63\x6F\x6E\x64\x6F\x6D","\x20\x63\x6F\x6F\x6E","\x20\x63\x6F\x6F\x6E\x73","\x20\x63\x6F\x72\x6B\x73\x75\x63\x6B\x65\x72","\x20\x63\x72\x61\x62\x73","\x20\x63\x72\x61\x63\x6B","\x20\x63\x72\x61\x63\x6B\x65\x72","\x20\x63\x72\x61\x63\x6B\x77\x68\x6F\x72\x65","\x20\x63\x72\x61\x70","\x20\x63\x72\x61\x70\x70\x79","\x20\x63\x75\x6D","\x20\x63\x75\x6D\x6D\x69\x6E","\x20\x63\x75\x6D\x6D\x69\x6E\x67","\x20\x63\x75\x6D\x73\x68\x6F\x74","\x20\x63\x75\x6D\x73\x68\x6F\x74\x73","\x20\x63\x75\x6D\x73\x6C\x75\x74","\x20\x63\x75\x6D\x73\x74\x61\x69\x6E","\x20\x63\x75\x6E\x69\x6C\x69\x6E\x67\x75\x73","\x20\x63\x75\x6E\x6E\x69\x6C\x69\x6E\x67\x75\x73","\x20\x63\x75\x6E\x6E\x79","\x20\x63\x75\x6E\x74","\x20\x63\x2D\x75\x2D\x6E\x2D\x74","\x20\x63\x75\x6E\x74\x66\x61\x63\x65","\x20\x63\x75\x6E\x74\x68\x75\x6E\x74\x65\x72","\x20\x63\x75\x6E\x74\x6C\x69\x63\x6B","\x20\x63\x75\x6E\x74\x6C\x69\x63\x6B\x65\x72","\x20\x63\x75\x6E\x74\x73","\x20\x64\x30\x6E\x67","\x20\x64\x30\x75\x63\x68\x33","\x20\x64\x30\x75\x63\x68\x65","\x20\x64\x31\x63\x6B","\x20\x64\x31\x6C\x64\x30","\x20\x64\x31\x6C\x64\x6F","\x20\x64\x61\x67\x6F","\x20\x64\x61\x67\x6F\x73","\x20\x64\x61\x6D\x6D\x69\x74","\x20\x64\x61\x6D\x6E","\x20\x64\x61\x6D\x6E\x65\x64","\x20\x64\x61\x6D\x6E\x69\x74","\x20\x64\x61\x77\x67\x69\x65\x2D\x73\x74\x79\x6C\x65","\x20\x64\x69\x63\x6B","\x20\x64\x69\x63\x6B\x62\x61\x67","\x20\x64\x69\x63\x6B\x64\x69\x70\x70\x65\x72","\x20\x64\x69\x63\x6B\x66\x61\x63\x65","\x20\x64\x69\x63\x6B\x66\x6C\x69\x70\x70\x65\x72","\x20\x64\x69\x63\x6B\x68\x65\x61\x64","\x20\x64\x69\x63\x6B\x68\x65\x61\x64\x73","\x20\x64\x69\x63\x6B\x69\x73\x68","\x20\x64\x69\x63\x6B\x2D\x69\x73\x68","\x20\x64\x69\x63\x6B\x72\x69\x70\x70\x65\x72","\x20\x64\x69\x63\x6B\x73\x69\x70\x70\x65\x72","\x20\x64\x69\x63\x6B\x77\x65\x65\x64","\x20\x64\x69\x63\x6B\x77\x68\x69\x70\x70\x65\x72","\x20\x64\x69\x63\x6B\x7A\x69\x70\x70\x65\x72","\x20\x64\x69\x64\x64\x6C\x65","\x20\x64\x69\x6B\x65","\x20\x64\x69\x6C\x64\x6F","\x20\x64\x69\x6C\x64\x6F\x73","\x20\x64\x69\x6C\x69\x67\x61\x66","\x20\x64\x69\x6C\x6C\x77\x65\x65\x64","\x20\x64\x69\x6D\x77\x69\x74","\x20\x64\x69\x6E\x67\x6C\x65","\x20\x64\x69\x70\x73\x68\x69\x70","\x20\x64\x6F\x67\x67\x69\x65\x2D\x73\x74\x79\x6C\x65","\x20\x64\x6F\x67\x67\x79\x2D\x73\x74\x79\x6C\x65","\x20\x64\x6F\x6E\x67","\x20\x64\x6F\x6F\x66\x75\x73","\x20\x64\x6F\x6F\x73\x68","\x20\x64\x6F\x70\x65\x79","\x20\x64\x6F\x75\x63\x68\x33","\x20\x64\x6F\x75\x63\x68\x65","\x20\x64\x6F\x75\x63\x68\x65\x62\x61\x67","\x20\x64\x6F\x75\x63\x68\x65\x62\x61\x67\x73","\x20\x64\x6F\x75\x63\x68\x65\x79","\x20\x64\x72\x75\x6E\x6B","\x20\x64\x75\x6D\x61\x73\x73","\x20\x64\x75\x6D\x62\x61\x73\x73","\x20\x64\x75\x6D\x62\x61\x73\x73\x65\x73","\x20\x64\x75\x6D\x6D\x79","\x20\x64\x79\x6B\x65","\x20\x64\x79\x6B\x65\x73","\x20\x65\x6A\x61\x63\x75\x6C\x61\x74\x65","\x20\x65\x6E\x6C\x61\x72\x67\x65\x6D\x65\x6E\x74","\x20\x65\x72\x65\x63\x74","\x20\x65\x72\x65\x63\x74\x69\x6F\x6E","\x20\x65\x72\x6F\x74\x69\x63","\x20\x65\x73\x73\x6F\x68\x62\x65\x65","\x20\x65\x78\x74\x61\x63\x79","\x20\x65\x78\x74\x61\x73\x79","\x20\x66\x2E\x75\x2E\x63\x2E\x6B","\x20\x66\x61\x63\x6B","\x20\x66\x61\x67","\x20\x66\x61\x67\x67","\x20\x66\x61\x67\x67\x65\x64","\x20\x66\x61\x67\x67\x69\x74","\x20\x66\x61\x67\x67\x6F\x74","\x20\x66\x61\x67\x6F\x74","\x20\x66\x61\x67\x73","\x20\x66\x61\x69\x67","\x20\x66\x61\x69\x67\x74","\x20\x66\x61\x6E\x6E\x79\x62\x61\x6E\x64\x69\x74","\x20\x66\x61\x72\x74","\x20\x66\x61\x72\x74\x6B\x6E\x6F\x63\x6B\x65\x72","\x20\x66\x61\x74","\x20\x66\x65\x6C\x63\x68","\x20\x66\x65\x6C\x63\x68\x65\x72","\x20\x66\x65\x6C\x63\x68\x69\x6E\x67","\x20\x66\x65\x6C\x6C\x61\x74\x65","\x20\x66\x65\x6C\x6C\x61\x74\x69\x6F","\x20\x66\x65\x6C\x74\x63\x68","\x20\x66\x65\x6C\x74\x63\x68\x65\x72","\x20\x66\x69\x73\x74\x65\x64","\x20\x66\x69\x73\x74\x69\x6E\x67","\x20\x66\x69\x73\x74\x79","\x20\x66\x6C\x6F\x6F\x7A\x79","\x20\x66\x6F\x61\x64","\x20\x66\x6F\x6E\x64\x6C\x65","\x20\x66\x6F\x6F\x62\x61\x72","\x20\x66\x6F\x72\x65\x73\x6B\x69\x6E","\x20\x66\x72\x65\x65\x78","\x20\x66\x72\x69\x67\x67","\x20\x66\x72\x69\x67\x67\x61","\x20\x66\x75\x62\x61\x72","\x20\x66\x75\x63\x6B","\x20\x66\x2D\x75\x2D\x63\x2D\x6B","\x20\x66\x75\x63\x6B\x61\x73\x73","\x20\x66\x75\x63\x6B\x65\x64","\x20\x66\x75\x63\x6B\x65\x72","\x20\x66\x75\x63\x6B\x66\x61\x63\x65","\x20\x66\x75\x63\x6B\x69\x6E","\x20\x66\x75\x63\x6B\x69\x6E\x67","\x20\x66\x75\x63\x6B\x6E\x75\x67\x67\x65\x74","\x20\x66\x75\x63\x6B\x6E\x75\x74","\x20\x66\x75\x63\x6B\x6F\x66\x66","\x20\x66\x75\x63\x6B\x73","\x20\x66\x75\x63\x6B\x74\x61\x72\x64","\x20\x66\x75\x63\x6B\x2D\x74\x61\x72\x64","\x20\x66\x75\x63\x6B\x75\x70","\x20\x66\x75\x63\x6B\x77\x61\x64","\x20\x66\x75\x63\x6B\x77\x69\x74","\x20\x66\x75\x64\x67\x65\x70\x61\x63\x6B\x65\x72","\x20\x66\x75\x6B","\x20\x66\x76\x63\x6B","\x20\x66\x78\x63\x6B","\x20\x67\x61\x65","\x20\x67\x61\x69","\x20\x67\x61\x6E\x6A\x61","\x20\x67\x61\x79","\x20\x67\x61\x79\x73","\x20\x67\x65\x79","\x20\x67\x66\x79","\x20\x67\x68\x61\x79","\x20\x67\x68\x65\x79","\x20\x67\x69\x67\x6F\x6C\x6F","\x20\x67\x6C\x61\x6E\x73","\x20\x67\x6F\x61\x74\x73\x65","\x20\x67\x6F\x64\x61\x6D\x6E","\x20\x67\x6F\x64\x61\x6D\x6E\x69\x74","\x20\x67\x6F\x64\x64\x61\x6D","\x20\x67\x6F\x64\x64\x61\x6D\x6D\x69\x74","\x20\x67\x6F\x64\x64\x61\x6D\x6E","\x20\x67\x6F\x6C\x64\x65\x6E\x73\x68\x6F\x77\x65\x72","\x20\x67\x6F\x6E\x61\x64","\x20\x67\x6F\x6E\x61\x64\x73","\x20\x67\x6F\x6F\x6B","\x20\x67\x6F\x6F\x6B\x73","\x20\x67\x72\x69\x6E\x67\x6F","\x20\x67\x73\x70\x6F\x74","\x20\x67\x2D\x73\x70\x6F\x74","\x20\x67\x74\x66\x6F","\x20\x67\x75\x69\x64\x6F","\x20\x68\x30\x6D\x30","\x20\x68\x30\x6D\x6F","\x20\x68\x61\x6E\x64\x6A\x6F\x62","\x20\x68\x61\x72\x64\x20\x6F\x6E","\x20\x68\x65\x31\x31","\x20\x68\x65\x62\x65","\x20\x68\x65\x65\x62","\x20\x68\x65\x6C\x6C","\x20\x68\x65\x6D\x70","\x20\x68\x65\x72\x6F\x69\x6E","\x20\x68\x65\x72\x70","\x20\x68\x65\x72\x70\x65\x73","\x20\x68\x65\x72\x70\x79","\x20\x68\x69\x74\x6C\x65\x72","\x20\x68\x69\x76","\x20\x68\x6F\x62\x61\x67","\x20\x68\x6F\x6D\x30","\x20\x68\x6F\x6D\x65\x79","\x20\x68\x6F\x6D\x6F","\x20\x68\x6F\x6D\x6F\x65\x79","\x20\x68\x6F\x6E\x6B\x79","\x20\x68\x6F\x6F\x63\x68","\x20\x68\x6F\x6F\x6B\x61\x68","\x20\x68\x6F\x6F\x6B\x65\x72","\x20\x68\x6F\x6F\x72","\x20\x68\x6F\x6F\x74\x63\x68","\x20\x68\x6F\x6F\x74\x65\x72","\x20\x68\x6F\x6F\x74\x65\x72\x73","\x20\x68\x6F\x72\x6E\x79","\x20\x68\x75\x6D\x70","\x20\x68\x75\x6D\x70\x65\x64","\x20\x68\x75\x6D\x70\x69\x6E\x67","\x20\x68\x75\x73\x73\x79","\x20\x68\x79\x6D\x65\x6E","\x20\x69\x6E\x62\x72\x65\x64","\x20\x69\x6E\x63\x65\x73\x74","\x20\x69\x6E\x6A\x75\x6E","\x20\x6A\x33\x72\x6B\x30\x66\x66","\x20\x6A\x61\x63\x6B\x61\x73\x73","\x20\x6A\x61\x63\x6B\x68\x6F\x6C\x65","\x20\x6A\x61\x63\x6B\x6F\x66\x66","\x20\x6A\x61\x70","\x20\x6A\x61\x70\x73","\x20\x6A\x65\x72\x6B","\x20\x6A\x65\x72\x6B\x30\x66\x66","\x20\x6A\x65\x72\x6B\x65\x64","\x20\x6A\x65\x72\x6B\x6F\x66\x66","\x20\x6A\x69\x73\x6D","\x20\x6A\x69\x7A","\x20\x6A\x69\x7A\x6D","\x20\x6A\x69\x7A\x7A","\x20\x6A\x69\x7A\x7A\x65\x64","\x20\x6A\x75\x6E\x6B\x69\x65","\x20\x6A\x75\x6E\x6B\x79","\x20\x6B\x69\x6B\x65","\x20\x6B\x69\x6B\x65\x73","\x20\x6B\x69\x6C\x6C","\x20\x6B\x69\x6E\x6B\x79","\x20\x6B\x6B\x6B","\x20\x6B\x6C\x61\x6E","\x20\x6B\x6E\x6F\x62\x65\x6E\x64","\x20\x6B\x6F\x6F\x63\x68","\x20\x6B\x6F\x6F\x63\x68\x65\x73","\x20\x6B\x6F\x6F\x74\x63\x68","\x20\x6B\x72\x61\x75\x74","\x20\x6B\x79\x6B\x65","\x20\x6C\x61\x62\x69\x61","\x20\x6C\x65\x63\x68","\x20\x6C\x65\x70\x65\x72","\x20\x6C\x65\x73\x62\x69\x61\x6E\x73","\x20\x6C\x65\x73\x62\x6F","\x20\x6C\x65\x73\x62\x6F\x73","\x20\x6C\x65\x7A","\x20\x6C\x65\x7A\x62\x69\x61\x6E","\x20\x6C\x65\x7A\x62\x69\x61\x6E\x73","\x20\x6C\x65\x7A\x62\x6F","\x20\x6C\x65\x7A\x62\x6F\x73","\x20\x6C\x65\x7A\x7A\x69\x65","\x20\x6C\x65\x7A\x7A\x69\x65\x73","\x20\x6C\x65\x7A\x7A\x79","\x20\x6C\x6D\x61\x6F","\x20\x6C\x6D\x66\x61\x6F","\x20\x6C\x6F\x69\x6E","\x20\x6C\x6F\x69\x6E\x73","\x20\x6C\x75\x62\x65","\x20\x6C\x75\x73\x74\x79","\x20\x6D\x61\x6D\x73","\x20\x6D\x61\x73\x73\x61","\x20\x6D\x61\x73\x74\x65\x72\x62\x61\x74\x65","\x20\x6D\x61\x73\x74\x65\x72\x62\x61\x74\x69\x6E\x67","\x20\x6D\x61\x73\x74\x65\x72\x62\x61\x74\x69\x6F\x6E","\x20\x6D\x61\x73\x74\x75\x72\x62\x61\x74\x65","\x20\x6D\x61\x73\x74\x75\x72\x62\x61\x74\x69\x6E\x67","\x20\x6D\x61\x73\x74\x75\x72\x62\x61\x74\x69\x6F\x6E","\x20\x6D\x61\x78\x69","\x20\x6D\x65\x6E\x73\x65\x73","\x20\x6D\x65\x6E\x73\x74\x72\x75\x61\x74\x65","\x20\x6D\x65\x6E\x73\x74\x72\x75\x61\x74\x69\x6F\x6E","\x20\x6D\x65\x74\x68","\x20\x6D\x2D\x66\x75\x63\x6B\x69\x6E\x67","\x20\x6D\x6F\x66\x6F","\x20\x6D\x6F\x6C\x65\x73\x74","\x20\x6D\x6F\x6F\x6C\x69\x65","\x20\x6D\x6F\x72\x6F\x6E","\x20\x6D\x6F\x74\x68\x65\x72\x66\x75\x63\x6B\x61","\x20\x6D\x6F\x74\x68\x65\x72\x66\x75\x63\x6B\x65\x72","\x20\x6D\x6F\x74\x68\x65\x72\x66\x75\x63\x6B\x69\x6E\x67","\x20\x6D\x74\x68\x65\x72\x66\x75\x63\x6B\x65\x72","\x20\x6D\x74\x68\x72\x66\x75\x63\x6B\x65\x72","\x20\x6D\x74\x68\x72\x66\x75\x63\x6B\x69\x6E\x67","\x20\x6D\x75\x66\x66","\x20\x6D\x75\x66\x66\x64\x69\x76\x65\x72","\x20\x6D\x75\x72\x64\x65\x72","\x20\x6D\x75\x74\x68\x61\x66\x75\x63\x6B\x61\x7A","\x20\x6D\x75\x74\x68\x61\x66\x75\x63\x6B\x65\x72","\x20\x6D\x75\x74\x68\x65\x72\x66\x75\x63\x6B\x65\x72","\x20\x6D\x75\x74\x68\x65\x72\x66\x75\x63\x6B\x69\x6E\x67","\x20\x6D\x75\x74\x68\x72\x66\x75\x63\x6B\x69\x6E\x67","\x20\x6E\x61\x64","\x20\x6E\x61\x64\x73","\x20\x6E\x61\x6B\x65\x64","\x20\x6E\x61\x70\x61\x6C\x6D","\x20\x6E\x61\x70\x70\x79","\x20\x6E\x61\x7A\x69","\x20\x6E\x61\x7A\x69\x73\x6D","\x20\x6E\x65\x67\x72\x6F","\x20\x6E\x69\x67\x67\x61","\x20\x6E\x69\x67\x67\x61\x68","\x20\x6E\x69\x67\x67\x61\x73","\x20\x6E\x69\x67\x67\x61\x7A","\x20\x6E\x69\x67\x67\x65\x72","\x20\x6E\x69\x67\x67\x65\x72\x73","\x20\x6E\x69\x67\x67\x6C\x65","\x20\x6E\x69\x67\x6C\x65\x74","\x20\x6E\x69\x6D\x72\x6F\x64","\x20\x6E\x69\x6E\x6E\x79","\x20\x6E\x69\x70\x70\x6C\x65","\x20\x6E\x6F\x6F\x6B\x79","\x20\x6E\x79\x6D\x70\x68\x6F","\x20\x6F\x70\x69\x61\x74\x65","\x20\x6F\x70\x69\x75\x6D","\x20\x6F\x72\x61\x6C","\x20\x6F\x72\x61\x6C\x6C\x79","\x20\x6F\x72\x67\x61\x6E","\x20\x6F\x72\x67\x61\x73\x6D","\x20\x6F\x72\x67\x61\x73\x6D\x69\x63","\x20\x6F\x72\x67\x69\x65\x73","\x20\x6F\x72\x67\x79","\x20\x6F\x76\x61\x72\x79","\x20\x6F\x76\x75\x6D","\x20\x6F\x76\x75\x6D\x73","\x20\x70\x2E\x75\x2E\x73\x2E\x73\x2E\x79\x2E","\x20\x70\x61\x64\x64\x79","\x20\x70\x61\x6B\x69","\x20\x70\x61\x6E\x74\x69\x65","\x20\x70\x61\x6E\x74\x69\x65\x73","\x20\x70\x61\x6E\x74\x79","\x20\x70\x61\x73\x74\x69\x65","\x20\x70\x61\x73\x74\x79","\x20\x70\x63\x70","\x20\x70\x65\x63\x6B\x65\x72","\x20\x70\x65\x64\x6F","\x20\x70\x65\x64\x6F\x70\x68\x69\x6C\x65","\x20\x70\x65\x64\x6F\x70\x68\x69\x6C\x69\x61","\x20\x70\x65\x64\x6F\x70\x68\x69\x6C\x69\x61\x63","\x20\x70\x65\x65","\x20\x70\x65\x65\x70\x65\x65","\x20\x70\x65\x6E\x65\x74\x72\x61\x74\x65","\x20\x70\x65\x6E\x65\x74\x72\x61\x74\x69\x6F\x6E","\x20\x70\x65\x6E\x69\x61\x6C","\x20\x70\x65\x6E\x69\x6C\x65","\x20\x70\x65\x6E\x69\x73","\x20\x70\x65\x72\x76\x65\x72\x73\x69\x6F\x6E","\x20\x70\x65\x79\x6F\x74\x65","\x20\x70\x68\x61\x6C\x6C\x69","\x20\x70\x68\x61\x6C\x6C\x69\x63","\x20\x70\x68\x75\x63\x6B","\x20\x70\x69\x6C\x6C\x6F\x77\x62\x69\x74\x65\x72","\x20\x70\x69\x6D\x70","\x20\x70\x69\x6E\x6B\x6F","\x20\x70\x69\x73\x73","\x20\x70\x69\x73\x73\x65\x64","\x20\x70\x69\x73\x73\x6F\x66\x66","\x20\x70\x69\x73\x73\x2D\x6F\x66\x66","\x20\x70\x6D\x73","\x20\x70\x6F\x6C\x61\x63\x6B","\x20\x70\x6F\x6C\x6C\x6F\x63\x6B","\x20\x70\x6F\x6F\x6E","\x20\x70\x6F\x6F\x6E\x74\x61\x6E\x67","\x20\x70\x6F\x72\x6E","\x20\x70\x6F\x72\x6E\x6F","\x20\x70\x6F\x72\x6E\x6F\x67\x72\x61\x70\x68\x79","\x20\x70\x6F\x74","\x20\x70\x6F\x74\x74\x79","\x20\x70\x72\x69\x63\x6B","\x20\x70\x72\x69\x67","\x20\x70\x72\x6F\x73\x74\x69\x74\x75\x74\x65","\x20\x70\x72\x75\x64\x65","\x20\x70\x75\x62\x65","\x20\x70\x75\x62\x69\x63","\x20\x70\x75\x62\x69\x73","\x20\x70\x75\x6E\x6B\x61\x73\x73","\x20\x70\x75\x6E\x6B\x79","\x20\x70\x75\x73\x73","\x20\x70\x75\x73\x73\x69\x65\x73","\x20\x70\x75\x73\x73\x79","\x20\x70\x75\x73\x73\x79\x70\x6F\x75\x6E\x64\x65\x72","\x20\x70\x75\x74\x6F","\x20\x71\x75\x65\x61\x66","\x20\x71\x75\x65\x65\x66","\x20\x71\x75\x65\x65\x72","\x20\x71\x75\x65\x65\x72\x6F","\x20\x71\x75\x65\x65\x72\x73","\x20\x71\x75\x69\x63\x6B\x79","\x20\x71\x75\x69\x6D","\x20\x72\x61\x63\x79","\x20\x72\x61\x70\x65","\x20\x72\x61\x70\x65\x64","\x20\x72\x61\x70\x65\x72","\x20\x72\x61\x70\x69\x73\x74","\x20\x72\x61\x75\x6E\x63\x68","\x20\x72\x65\x63\x74\x61\x6C","\x20\x72\x65\x63\x74\x75\x6D","\x20\x72\x65\x63\x74\x75\x73","\x20\x72\x65\x65\x66\x65\x72","\x20\x72\x65\x65\x74\x61\x72\x64","\x20\x72\x65\x69\x63\x68","\x20\x72\x65\x74\x61\x72\x64","\x20\x72\x65\x74\x61\x72\x64\x65\x64","\x20\x72\x65\x76\x75\x65","\x20\x72\x69\x6D\x6A\x6F\x62","\x20\x72\x69\x74\x61\x72\x64","\x20\x72\x74\x61\x72\x64","\x20\x72\x2D\x74\x61\x72\x64","\x20\x72\x75\x6D","\x20\x72\x75\x6D\x70","\x20\x72\x75\x6D\x70\x72\x61\x6D\x6D\x65\x72","\x20\x72\x75\x73\x6B\x69","\x20\x73\x2E\x68\x2E\x69\x2E\x74\x2E","\x20\x73\x2E\x6F\x2E\x62\x2E","\x20\x73\x30\x62","\x20\x73\x61\x64\x69\x73\x6D","\x20\x73\x61\x64\x69\x73\x74","\x20\x73\x63\x61\x67","\x20\x73\x63\x61\x6E\x74\x69\x6C\x79","\x20\x73\x63\x68\x69\x7A\x6F","\x20\x73\x63\x68\x6C\x6F\x6E\x67","\x20\x73\x63\x72\x65\x77","\x20\x73\x63\x72\x65\x77\x65\x64","\x20\x73\x63\x72\x6F\x67","\x20\x73\x63\x72\x6F\x74","\x20\x73\x63\x72\x6F\x74\x65","\x20\x73\x63\x72\x6F\x74\x75\x6D","\x20\x73\x63\x72\x75\x64","\x20\x73\x63\x75\x6D","\x20\x73\x65\x61\x6D\x61\x6E","\x20\x73\x65\x61\x6D\x65\x6E","\x20\x73\x65\x64\x75\x63\x65","\x20\x73\x65\x6D\x65\x6E","\x20\x73\x65\x78","\x20\x73\x65\x78\x75\x61\x6C","\x20\x73\x68\x31\x74","\x20\x73\x2D\x68\x2D\x31\x2D\x74","\x20\x73\x68\x61\x6D\x65\x64\x61\x6D\x65","\x20\x73\x68\x69\x74","\x20\x73\x2D\x68\x2D\x69\x2D\x74","\x20\x73\x68\x69\x74\x65","\x20\x73\x68\x69\x74\x65\x61\x74\x65\x72","\x20\x73\x68\x69\x74\x66\x61\x63\x65","\x20\x73\x68\x69\x74\x68\x65\x61\x64","\x20\x73\x68\x69\x74\x68\x6F\x6C\x65","\x20\x73\x68\x69\x74\x68\x6F\x75\x73\x65","\x20\x73\x68\x69\x74\x73","\x20\x73\x68\x69\x74\x74","\x20\x73\x68\x69\x74\x74\x65\x64","\x20\x73\x68\x69\x74\x74\x65\x72","\x20\x73\x68\x69\x74\x74\x79","\x20\x73\x68\x69\x7A","\x20\x73\x69\x73\x73\x79","\x20\x73\x6B\x61\x67","\x20\x73\x6B\x61\x6E\x6B","\x20\x73\x6C\x61\x76\x65","\x20\x73\x6C\x65\x61\x7A\x65","\x20\x73\x6C\x65\x61\x7A\x79","\x20\x73\x6C\x75\x74","\x20\x73\x6C\x75\x74\x64\x75\x6D\x70\x65\x72","\x20\x73\x6C\x75\x74\x6B\x69\x73\x73","\x20\x73\x6C\x75\x74\x73","\x20\x73\x6D\x65\x67\x6D\x61","\x20\x73\x6D\x75\x74","\x20\x73\x6D\x75\x74\x74\x79","\x20\x73\x6E\x61\x74\x63\x68","\x20\x73\x6E\x69\x70\x65\x72","\x20\x73\x6E\x75\x66\x66","\x20\x73\x2D\x6F\x2D\x62","\x20\x73\x6F\x64\x6F\x6D","\x20\x73\x6F\x75\x73\x65","\x20\x73\x6F\x75\x73\x65\x64","\x20\x73\x70\x65\x72\x6D","\x20\x73\x70\x69\x63","\x20\x73\x70\x69\x63\x6B","\x20\x73\x70\x69\x6B","\x20\x73\x70\x69\x6B\x73","\x20\x73\x70\x6F\x6F\x67\x65","\x20\x73\x70\x75\x6E\x6B","\x20\x73\x74\x65\x61\x6D\x79","\x20\x73\x74\x66\x75","\x20\x73\x74\x69\x66\x66\x79","\x20\x73\x74\x6F\x6E\x65\x64","\x20\x73\x74\x72\x69\x70","\x20\x73\x74\x72\x6F\x6B\x65","\x20\x73\x74\x75\x70\x69\x64","\x20\x73\x75\x63\x6B","\x20\x73\x75\x63\x6B\x65\x64","\x20\x73\x75\x63\x6B\x69\x6E\x67","\x20\x73\x75\x6D\x6F\x66\x61\x62\x69\x61\x74\x63\x68","\x20\x74\x31\x74","\x20\x74\x61\x6D\x70\x6F\x6E","\x20\x74\x61\x72\x64","\x20\x74\x61\x77\x64\x72\x79","\x20\x74\x65\x61\x62\x61\x67\x67\x69\x6E\x67","\x20\x74\x65\x61\x74","\x20\x74\x65\x72\x64","\x20\x74\x65\x73\x74\x65","\x20\x74\x65\x73\x74\x65\x65","\x20\x74\x65\x73\x74\x65\x73","\x20\x74\x65\x73\x74\x69\x63\x6C\x65","\x20\x74\x65\x73\x74\x69\x73","\x20\x74\x68\x72\x75\x73\x74","\x20\x74\x68\x75\x67","\x20\x74\x69\x6E\x6B\x6C\x65","\x20\x74\x69\x74","\x20\x74\x69\x74\x66\x75\x63\x6B","\x20\x74\x69\x74\x69","\x20\x74\x69\x74\x73","\x20\x74\x69\x74\x74\x69\x65\x66\x75\x63\x6B\x65\x72","\x20\x74\x69\x74\x74\x69\x65\x73","\x20\x74\x69\x74\x74\x79","\x20\x74\x69\x74\x74\x79\x66\x75\x63\x6B","\x20\x74\x69\x74\x74\x79\x66\x75\x63\x6B\x65\x72","\x20\x74\x6F\x6B\x65","\x20\x74\x6F\x6F\x74\x73","\x20\x74\x72\x61\x6D\x70","\x20\x74\x72\x61\x6E\x73\x73\x65\x78\x75\x61\x6C","\x20\x74\x72\x61\x73\x68\x79","\x20\x74\x75\x62\x67\x69\x72\x6C","\x20\x74\x75\x72\x64","\x20\x74\x75\x73\x68","\x20\x74\x77\x61\x74","\x20\x74\x77\x61\x74\x73","\x20\x75\x67\x6C\x79","\x20\x75\x6E\x64\x69\x65\x73","\x20\x75\x6E\x77\x65\x64","\x20\x75\x72\x69\x6E\x61\x6C","\x20\x75\x72\x69\x6E\x65","\x20\x75\x74\x65\x72\x75\x73","\x20\x75\x7A\x69","\x20\x76\x61\x67","\x20\x76\x61\x67\x69\x6E\x61","\x20\x76\x61\x6C\x69\x75\x6D","\x20\x76\x69\x61\x67\x72\x61","\x20\x76\x69\x72\x67\x69\x6E","\x20\x76\x69\x78\x65\x6E","\x20\x76\x6F\x64\x6B\x61","\x20\x76\x6F\x6D\x69\x74","\x20\x76\x6F\x79\x65\x75\x72","\x20\x76\x75\x6C\x67\x61\x72","\x20\x76\x75\x6C\x76\x61","\x20\x77\x61\x64","\x20\x77\x61\x6E\x67","\x20\x77\x61\x6E\x6B","\x20\x77\x61\x6E\x6B\x65\x72","\x20\x77\x61\x7A\x6F\x6F","\x20\x77\x65\x64\x67\x69\x65","\x20\x77\x65\x65\x64","\x20\x77\x65\x65\x6E\x69\x65","\x20\x77\x65\x65\x77\x65\x65","\x20\x77\x65\x69\x6E\x65\x72","\x20\x77\x65\x69\x72\x64\x6F","\x20\x77\x65\x6E\x63\x68","\x20\x77\x65\x74\x62\x61\x63\x6B","\x20\x77\x68\x30\x72\x65","\x20\x77\x68\x30\x72\x65\x66\x61\x63\x65","\x20\x77\x68\x69\x74\x65\x79","\x20\x77\x68\x69\x7A","\x20\x77\x68\x6F\x72\x61\x6C\x69\x63\x69\x6F\x75\x73","\x20\x77\x68\x6F\x72\x65","\x20\x77\x68\x6F\x72\x65\x61\x6C\x69\x63\x69\x6F\x75\x73","\x20\x77\x68\x6F\x72\x65\x64","\x20\x77\x68\x6F\x72\x65\x66\x61\x63\x65","\x20\x77\x68\x6F\x72\x65\x68\x6F\x70\x70\x65\x72","\x20\x77\x68\x6F\x72\x65\x68\x6F\x75\x73\x65","\x20\x77\x68\x6F\x72\x65\x73","\x20\x77\x68\x6F\x72\x69\x6E\x67","\x20\x77\x69\x67\x67\x65\x72","\x20\x77\x6F\x6D\x62","\x20\x77\x6F\x6F\x64\x79","\x20\x77\x6F\x70","\x20\x77\x74\x66","\x20\x78\x2D\x72\x61\x74\x65\x64","\x20\x78\x78\x78","\x20\x79\x65\x61\x73\x74\x79","\x20\x79\x6F\x62\x62\x6F","\x20\x7A\x6F\x6F\x70\x68\x69\x6C\x65"];abusive_keyword_array=[_0xb0ea[0],_0xb0ea[1],_0xb0ea[2],_0xb0ea[3],_0xb0ea[4],_0xb0ea[5],_0xb0ea[6],_0xb0ea[7],_0xb0ea[8],_0xb0ea[9],_0xb0ea[10],_0xb0ea[11],_0xb0ea[12],_0xb0ea[13],_0xb0ea[14],_0xb0ea[15],_0xb0ea[16],_0xb0ea[17],_0xb0ea[18],_0xb0ea[19],_0xb0ea[20],_0xb0ea[21],_0xb0ea[22],_0xb0ea[23],_0xb0ea[24],_0xb0ea[25],_0xb0ea[26],_0xb0ea[27],_0xb0ea[28],_0xb0ea[29],_0xb0ea[30],_0xb0ea[31],_0xb0ea[32],_0xb0ea[33],_0xb0ea[34],_0xb0ea[35],_0xb0ea[36],_0xb0ea[37],_0xb0ea[38],_0xb0ea[39],_0xb0ea[40],_0xb0ea[41],_0xb0ea[42],_0xb0ea[43],_0xb0ea[44],_0xb0ea[45],_0xb0ea[46],_0xb0ea[47],_0xb0ea[48],_0xb0ea[49],_0xb0ea[50],_0xb0ea[51],_0xb0ea[52],_0xb0ea[53],_0xb0ea[54],_0xb0ea[55],_0xb0ea[56],_0xb0ea[57],_0xb0ea[58],_0xb0ea[59],_0xb0ea[60],_0xb0ea[61],_0xb0ea[62],_0xb0ea[63],_0xb0ea[64],_0xb0ea[65],_0xb0ea[66],_0xb0ea[67],_0xb0ea[68],_0xb0ea[69],_0xb0ea[70],_0xb0ea[71],_0xb0ea[72],_0xb0ea[73],_0xb0ea[74],_0xb0ea[75],_0xb0ea[76],_0xb0ea[77],_0xb0ea[78],_0xb0ea[79],_0xb0ea[80],_0xb0ea[81],_0xb0ea[82],_0xb0ea[83],_0xb0ea[84],_0xb0ea[85],_0xb0ea[86],_0xb0ea[87],_0xb0ea[88],_0xb0ea[89],_0xb0ea[90],_0xb0ea[91],_0xb0ea[92],_0xb0ea[93],_0xb0ea[94],_0xb0ea[95],_0xb0ea[96],_0xb0ea[97],_0xb0ea[98],_0xb0ea[99],_0xb0ea[100],_0xb0ea[101],_0xb0ea[102],_0xb0ea[103],_0xb0ea[104],_0xb0ea[104],_0xb0ea[105],_0xb0ea[106],_0xb0ea[107],_0xb0ea[108],_0xb0ea[109],_0xb0ea[110],_0xb0ea[111],_0xb0ea[112],_0xb0ea[113],_0xb0ea[114],_0xb0ea[115],_0xb0ea[116],_0xb0ea[117],_0xb0ea[118],_0xb0ea[119],_0xb0ea[119],_0xb0ea[120],_0xb0ea[121],_0xb0ea[122],_0xb0ea[123],_0xb0ea[124],_0xb0ea[125],_0xb0ea[126],_0xb0ea[127],_0xb0ea[128],_0xb0ea[129],_0xb0ea[130],_0xb0ea[131],_0xb0ea[132],_0xb0ea[133],_0xb0ea[134],_0xb0ea[135],_0xb0ea[136],_0xb0ea[137],_0xb0ea[138],_0xb0ea[139],_0xb0ea[140],_0xb0ea[141],_0xb0ea[142],_0xb0ea[143],_0xb0ea[144],_0xb0ea[145],_0xb0ea[146],_0xb0ea[147],_0xb0ea[148],_0xb0ea[149],_0xb0ea[150],_0xb0ea[151],_0xb0ea[152],_0xb0ea[153],_0xb0ea[154],_0xb0ea[155],_0xb0ea[156],_0xb0ea[157],_0xb0ea[158],_0xb0ea[159],_0xb0ea[160],_0xb0ea[161],_0xb0ea[162],_0xb0ea[162],_0xb0ea[163],_0xb0ea[164],_0xb0ea[165],_0xb0ea[166],_0xb0ea[167],_0xb0ea[168],_0xb0ea[169],_0xb0ea[170],_0xb0ea[171],_0xb0ea[172],_0xb0ea[173],_0xb0ea[174],_0xb0ea[175],_0xb0ea[176],_0xb0ea[177],_0xb0ea[178],_0xb0ea[179],_0xb0ea[180],_0xb0ea[181],_0xb0ea[182],_0xb0ea[183],_0xb0ea[184],_0xb0ea[185],_0xb0ea[186],_0xb0ea[187],_0xb0ea[188],_0xb0ea[189],_0xb0ea[190],_0xb0ea[191],_0xb0ea[192],_0xb0ea[193],_0xb0ea[194],_0xb0ea[195],_0xb0ea[196],_0xb0ea[197],_0xb0ea[198],_0xb0ea[199],_0xb0ea[200],_0xb0ea[201],_0xb0ea[202],_0xb0ea[203],_0xb0ea[204],_0xb0ea[205],_0xb0ea[206],_0xb0ea[207],_0xb0ea[208],_0xb0ea[209],_0xb0ea[210],_0xb0ea[211],_0xb0ea[212],_0xb0ea[213],_0xb0ea[214],_0xb0ea[215],_0xb0ea[216],_0xb0ea[217],_0xb0ea[218],_0xb0ea[219],_0xb0ea[220],_0xb0ea[221],_0xb0ea[222],_0xb0ea[223],_0xb0ea[224],_0xb0ea[225],_0xb0ea[226],_0xb0ea[227],_0xb0ea[228],_0xb0ea[229],_0xb0ea[230],_0xb0ea[231],_0xb0ea[232],_0xb0ea[233],_0xb0ea[234],_0xb0ea[235],_0xb0ea[236],_0xb0ea[237],_0xb0ea[238],_0xb0ea[239],_0xb0ea[240],_0xb0ea[241],_0xb0ea[242],_0xb0ea[243],_0xb0ea[244],_0xb0ea[245],_0xb0ea[246],_0xb0ea[247],_0xb0ea[248],_0xb0ea[249],_0xb0ea[250],_0xb0ea[251],_0xb0ea[252],_0xb0ea[253],_0xb0ea[254],_0xb0ea[255],_0xb0ea[256],_0xb0ea[257],_0xb0ea[258],_0xb0ea[259],_0xb0ea[260],_0xb0ea[261],_0xb0ea[262],_0xb0ea[263],_0xb0ea[264],_0xb0ea[265],_0xb0ea[266],_0xb0ea[267],_0xb0ea[268],_0xb0ea[268],_0xb0ea[269],_0xb0ea[270],_0xb0ea[271],_0xb0ea[272],_0xb0ea[273],_0xb0ea[274],_0xb0ea[275],_0xb0ea[276],_0xb0ea[277],_0xb0ea[278],_0xb0ea[279],_0xb0ea[280],_0xb0ea[281],_0xb0ea[282],_0xb0ea[283],_0xb0ea[284],_0xb0ea[285],_0xb0ea[286],_0xb0ea[287],_0xb0ea[288],_0xb0ea[289],_0xb0ea[290],_0xb0ea[291],_0xb0ea[292],_0xb0ea[293],_0xb0ea[294],_0xb0ea[295],_0xb0ea[296],_0xb0ea[297],_0xb0ea[298],_0xb0ea[299],_0xb0ea[300],_0xb0ea[301],_0xb0ea[302],_0xb0ea[303],_0xb0ea[304],_0xb0ea[305],_0xb0ea[306],_0xb0ea[307],_0xb0ea[308],_0xb0ea[309],_0xb0ea[310],_0xb0ea[311],_0xb0ea[312],_0xb0ea[313],_0xb0ea[314],_0xb0ea[315],_0xb0ea[316],_0xb0ea[317],_0xb0ea[318],_0xb0ea[319],_0xb0ea[320],_0xb0ea[321],_0xb0ea[322],_0xb0ea[323],_0xb0ea[324],_0xb0ea[325],_0xb0ea[326],_0xb0ea[327],_0xb0ea[328],_0xb0ea[329],_0xb0ea[330],_0xb0ea[331],_0xb0ea[332],_0xb0ea[333],_0xb0ea[334],_0xb0ea[335],_0xb0ea[336],_0xb0ea[337],_0xb0ea[338],_0xb0ea[339],_0xb0ea[340],_0xb0ea[341],_0xb0ea[342],_0xb0ea[343],_0xb0ea[344],_0xb0ea[345],_0xb0ea[346],_0xb0ea[347],_0xb0ea[348],_0xb0ea[349],_0xb0ea[350],_0xb0ea[351],_0xb0ea[352],_0xb0ea[353],_0xb0ea[354],_0xb0ea[355],_0xb0ea[356],_0xb0ea[357],_0xb0ea[358],_0xb0ea[359],_0xb0ea[360],_0xb0ea[361],_0xb0ea[362],_0xb0ea[363],_0xb0ea[364],_0xb0ea[365],_0xb0ea[366],_0xb0ea[367],_0xb0ea[368],_0xb0ea[369],_0xb0ea[370],_0xb0ea[371],_0xb0ea[372],_0xb0ea[373],_0xb0ea[374],_0xb0ea[375],_0xb0ea[376],_0xb0ea[377],_0xb0ea[378],_0xb0ea[379],_0xb0ea[380],_0xb0ea[381],_0xb0ea[382],_0xb0ea[383],_0xb0ea[384],_0xb0ea[385],_0xb0ea[386],_0xb0ea[387],_0xb0ea[388],_0xb0ea[389],_0xb0ea[390],_0xb0ea[391],_0xb0ea[392],_0xb0ea[393],_0xb0ea[394],_0xb0ea[395],_0xb0ea[396],_0xb0ea[397],_0xb0ea[398],_0xb0ea[399],_0xb0ea[400],_0xb0ea[401],_0xb0ea[402],_0xb0ea[403],_0xb0ea[404],_0xb0ea[405],_0xb0ea[406],_0xb0ea[407],_0xb0ea[408],_0xb0ea[409],_0xb0ea[410],_0xb0ea[411],_0xb0ea[412],_0xb0ea[413],_0xb0ea[414],_0xb0ea[415],_0xb0ea[416],_0xb0ea[417],_0xb0ea[418],_0xb0ea[419],_0xb0ea[420],_0xb0ea[421],_0xb0ea[422],_0xb0ea[423],_0xb0ea[424],_0xb0ea[425],_0xb0ea[426],_0xb0ea[427],_0xb0ea[428],_0xb0ea[429],_0xb0ea[430],_0xb0ea[431],_0xb0ea[432],_0xb0ea[433],_0xb0ea[434],_0xb0ea[435],_0xb0ea[436],_0xb0ea[437],_0xb0ea[438],_0xb0ea[439],_0xb0ea[440],_0xb0ea[441],_0xb0ea[442],_0xb0ea[443],_0xb0ea[443],_0xb0ea[444],_0xb0ea[445],_0xb0ea[446],_0xb0ea[447],_0xb0ea[448],_0xb0ea[449],_0xb0ea[450],_0xb0ea[451],_0xb0ea[452],_0xb0ea[453],_0xb0ea[454],_0xb0ea[455],_0xb0ea[456],_0xb0ea[457],_0xb0ea[458],_0xb0ea[459],_0xb0ea[460],_0xb0ea[461],_0xb0ea[462],_0xb0ea[463],_0xb0ea[464],_0xb0ea[465],_0xb0ea[466],_0xb0ea[467],_0xb0ea[468],_0xb0ea[469],_0xb0ea[470],_0xb0ea[471],_0xb0ea[472],_0xb0ea[473],_0xb0ea[474],_0xb0ea[475],_0xb0ea[476],_0xb0ea[477],_0xb0ea[478],_0xb0ea[479],_0xb0ea[480],_0xb0ea[481],_0xb0ea[482],_0xb0ea[483],_0xb0ea[484],_0xb0ea[485],_0xb0ea[486],_0xb0ea[487],_0xb0ea[488],_0xb0ea[489],_0xb0ea[490],_0xb0ea[491],_0xb0ea[492],_0xb0ea[493],_0xb0ea[494],_0xb0ea[495],_0xb0ea[496],_0xb0ea[497],_0xb0ea[498],_0xb0ea[499],_0xb0ea[500],_0xb0ea[501],_0xb0ea[502],_0xb0ea[503],_0xb0ea[504],_0xb0ea[505],_0xb0ea[506],_0xb0ea[507],_0xb0ea[508],_0xb0ea[509],_0xb0ea[510],_0xb0ea[511],_0xb0ea[512],_0xb0ea[513],_0xb0ea[514],_0xb0ea[515],_0xb0ea[516],_0xb0ea[517],_0xb0ea[518],_0xb0ea[519],_0xb0ea[520],_0xb0ea[521],_0xb0ea[522],_0xb0ea[522],_0xb0ea[523],_0xb0ea[524],_0xb0ea[525],_0xb0ea[526],_0xb0ea[527],_0xb0ea[528],_0xb0ea[529],_0xb0ea[530],_0xb0ea[531],_0xb0ea[532],_0xb0ea[533],_0xb0ea[534],_0xb0ea[535],_0xb0ea[536],_0xb0ea[537],_0xb0ea[538],_0xb0ea[539],_0xb0ea[540],_0xb0ea[541],_0xb0ea[542],_0xb0ea[543],_0xb0ea[544],_0xb0ea[545],_0xb0ea[546],_0xb0ea[547],_0xb0ea[548],_0xb0ea[549],_0xb0ea[550],_0xb0ea[551],_0xb0ea[552],_0xb0ea[553],_0xb0ea[554],_0xb0ea[555],_0xb0ea[556],_0xb0ea[557],_0xb0ea[558],_0xb0ea[559],_0xb0ea[560],_0xb0ea[561],_0xb0ea[562],_0xb0ea[563],_0xb0ea[564],_0xb0ea[565],_0xb0ea[566],_0xb0ea[567],_0xb0ea[568],_0xb0ea[569],_0xb0ea[570],_0xb0ea[571],_0xb0ea[572],_0xb0ea[573],_0xb0ea[574],_0xb0ea[575],_0xb0ea[576],_0xb0ea[577],_0xb0ea[578],_0xb0ea[579],_0xb0ea[580],_0xb0ea[581],_0xb0ea[582],_0xb0ea[583],_0xb0ea[584],_0xb0ea[585],_0xb0ea[586],_0xb0ea[587],_0xb0ea[588],_0xb0ea[589],_0xb0ea[590],_0xb0ea[591],_0xb0ea[592],_0xb0ea[593],_0xb0ea[594],_0xb0ea[595],_0xb0ea[596],_0xb0ea[597],_0xb0ea[598],_0xb0ea[599],_0xb0ea[600],_0xb0ea[601],_0xb0ea[602],_0xb0ea[603],_0xb0ea[604],_0xb0ea[605],_0xb0ea[606],_0xb0ea[607],_0xb0ea[608],_0xb0ea[609],_0xb0ea[610],_0xb0ea[611],_0xb0ea[612],_0xb0ea[613],_0xb0ea[614],_0xb0ea[615],_0xb0ea[616],_0xb0ea[617],_0xb0ea[618],_0xb0ea[619],_0xb0ea[620],_0xb0ea[621],_0xb0ea[622],_0xb0ea[623],_0xb0ea[624],_0xb0ea[625],_0xb0ea[626],_0xb0ea[627],_0xb0ea[628],_0xb0ea[629],_0xb0ea[630],_0xb0ea[631],_0xb0ea[632],_0xb0ea[633],_0xb0ea[634],_0xb0ea[635],_0xb0ea[636],_0xb0ea[637],_0xb0ea[638],_0xb0ea[639],_0xb0ea[640],_0xb0ea[641],_0xb0ea[642],_0xb0ea[643],_0xb0ea[644],_0xb0ea[645],_0xb0ea[646],_0xb0ea[647],_0xb0ea[648],_0xb0ea[649],_0xb0ea[650],_0xb0ea[651],_0xb0ea[652],_0xb0ea[653],_0xb0ea[654],_0xb0ea[655],_0xb0ea[656],_0xb0ea[657],_0xb0ea[658],_0xb0ea[659],_0xb0ea[660],_0xb0ea[661],_0xb0ea[662],_0xb0ea[663],_0xb0ea[664],_0xb0ea[665],_0xb0ea[666],_0xb0ea[667],_0xb0ea[668],_0xb0ea[669],_0xb0ea[670],_0xb0ea[671],_0xb0ea[672],_0xb0ea[673],_0xb0ea[674],_0xb0ea[675],_0xb0ea[676],_0xb0ea[677],_0xb0ea[678],_0xb0ea[679],_0xb0ea[680],_0xb0ea[681],_0xb0ea[682],_0xb0ea[683],_0xb0ea[684],_0xb0ea[685],_0xb0ea[686],_0xb0ea[687],_0xb0ea[688],_0xb0ea[689],_0xb0ea[690],_0xb0ea[691],_0xb0ea[692],_0xb0ea[693],_0xb0ea[694],_0xb0ea[695],_0xb0ea[696],_0xb0ea[697],_0xb0ea[698],_0xb0ea[699],_0xb0ea[700],_0xb0ea[701],_0xb0ea[702],_0xb0ea[703],_0xb0ea[704],_0xb0ea[705],_0xb0ea[706],_0xb0ea[707],_0xb0ea[708],_0xb0ea[709],_0xb0ea[710],_0xb0ea[711],_0xb0ea[712],_0xb0ea[713],_0xb0ea[714],_0xb0ea[715],_0xb0ea[716]];
						
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
								
							 if(isUrl($('#description').val()))
								{
									toastr.options.showMethod = 'slideDown'; 
									toastr.options.closeButton = true;
									toastr.options.positionClass = 'toast-bottom-left';
									toastr.options.timeOut= '10000';
								    toastr.error('Url not allowed.');
								
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
					  
					 
				});
	
 
	
			</script>		