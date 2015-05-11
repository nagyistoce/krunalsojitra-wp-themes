<?php
//get_header();
require_once ("../../../wp-load.php");
global $wpdb;
$term = urldecode($_REQUEST['term']);

$strpos_user = strpos($term,"@");

if($strpos_user == 0 or $strpos_user !== FALSE ){
	$term_user = str_replace("@","",$term);
	$serach_name = $wpdb -> get_results("SELECT * FROM ".$wpdb->prefix."users where user_login like '$term_user%'");
	
	foreach ($serach_name as $row) {
		$data[] = array(
		'label' => '@'.$row->user_login, 
		'value' => $row -> user_login, 
		'id' => $row -> ID
		
		);
	}
	
}

$strpos = strpos($term,"#");
if($strpos == 0 or $strpos !== FALSE)
{
	$term_tag = str_replace("#","",$term);
	$serach_teg = $wpdb -> get_results("SELECT * FROM ".$wpdb->prefix."terms where name like '$term_tag%'");
	 foreach($serach_teg as $row)
	 {
		 $data[] = array(
		 'label' =>'#'.$row->name,
		 'value' =>'#'.$row->name,
		 'id' => $row->term_id
		);
	 }
	
}


echo json_encode($data);
?>
<?php //get_footer(); ?>