<?php
/**
 * Template Name: Testing
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="krunal">
<?php
echo "<pre>";
$categories = get_categories('hide_empty=0');

$i= 1;
								$j= 0;

foreach ($categories as $categori) {
	//print_r($categori);
	echo $i."<br>";
	echo $j."<br><br>";
							if(($i==1) || ($i-($j*3)==1))
							{
							echo 'step1'."<br>";
							}
							
							if(($i==2) || ($i-($j*3)==2))
							{
							echo 'step2'."<br>";
							}
							
							if(($i==3) || ($i-($j*3)==3))
							{
							echo 'step3'."<br>";
							}
							
							
						?>
<?php $i++; if($i%3==0) $j++; } ?>

</div>
<?php
//get_sidebar();
get_footer();
