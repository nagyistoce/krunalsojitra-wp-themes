<?php
class pagination {
    /**
     *  Script Name: WP Style Pagination Class
     *  Created From: *Digg Style Paginator Class
     *  Script URI: http://www.intechgrity.com/?p=794
     *  Original Script URI: http://www.mis-algoritmos.com/2007/05/27/digg-style-pagination-class/
     *  Description: Class in PHP that allows to use a pagination like WP in your WP Plugins
     *  Script Version: 1.0.0
     *
     *  Author: Swashata Ghosh <swashata4u@gmail.com
     *  Author URI: http://www.intechgrity.com/
     *  Original Author: Victor De la Rocha
     */
 
    /* Default values */
 
    var $total_pages = -1; //items
    var $limit = null;
    var $target = "";
    var $page = 1;
    var $adjacents = 2;
    var $showCounter = false;
    var $className = "pagination-links";
    var $parameterName = "p";
 
    /* Buttons next and previous */
    var $nextT = "Next";
    var $nextI = "&#187;"; //&#9658;
    var $prevT = "Previous";
    var $prevI = "&#171;"; //&#9668;
 
    /*     * ** */
    var $calculate = false;
 
    #Total items
 
    function items($value) {
        $this->total_pages = (int) $value;
    }
 
    #how many items to show per page
 
    function limit($value) {
        $this->limit = (int) $value;
    }
 
    #Page to sent the page value
 
    function target($value) {
        $this->target = $value;
    }
 
    #Current page
 
    function currentPage($value) {
        $this->page = (int) $value;
    }
 
    #How many adjacent pages should be shown on each side of the current page?
 
    function adjacents($value) {
        $this->adjacents = (int) $value;
    }
 
    #show counter?
 
    function showCounter($value="") {
        $this->showCounter = ($value === true) ? true : false;
    }
 
    #to change the class name of the pagination div
 
    function changeClass($value="") {
        $this->className = $value;
    }
 
    function nextLabel($value) {
        $this->nextT = $value;
    }
 
    function nextIcon($value) {
        $this->nextI = $value;
    }
 
    function prevLabel($value) {
        $this->prevT = $value;
    }
 
    function prevIcon($value) {
        $this->prevI = $value;
    }
 
    #to change the class name of the pagination div
 
    function parameterName($value="") {
        $this->parameterName = $value;
    }
 
    var $pagination;
 
    function pagination() {
 
    }
 
    function show() {
        if (!$this->calculate)
            if ($this->calculate())
                echo "<span class=\"$this->className\">$this->pagination</span>\n";
    }
 
    function getOutput() {
        if (!$this->calculate)
            if ($this->calculate())
                return "<span class=\"$this->className\">$this->pagination</span>\n";
    }
 
    function get_pagenum_link($id) {
        if (strpos($this->target, '?') === false)
            return "$this->target?$this->parameterName=$id";
        else
            return "$this->target&$this->parameterName=$id";
    }
 
    function calculate() {
        $this->pagination = "";
        $this->calculate == true;
        $error = false;
 
        if ($this->total_pages < 0) {
            echo "It is necessary to specify the <strong>number of pages</strong> (\$class->items(1000))<br />";
            $error = true;
        }
        if ($this->limit == null) {
            echo "It is necessary to specify the <strong>limit of items</strong> to show per page (\$class->limit(10))<br />";
            $error = true;
        }
        if ($error)
            return false;
 
        $n = trim($this->nextT . ' ' . $this->nextI);
        $p = trim($this->prevI . ' ' . $this->prevT);
 
        /* Setup vars for query. */
        if ($this->page)
            $start = ($this->page - 1) * $this->limit;             //first item to display on this page
        else
            $start = 0;                                //if no page var is given, set start to 0
 
        /* Setup page vars for display. */
        $prev = $this->page - 1;                            //previous page is page - 1
        $next = $this->page + 1;                            //next page is page + 1
        $lastpage = ceil($this->total_pages / $this->limit);        //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;                        //last page minus 1
 
        /*
          Now we apply our rules and draw the pagination object.
          We're actually saving the code to a variable in case we want to draw it more than once.
         */
 
        if ($lastpage > 1) {
            if ($this->page) {
                //anterior button
                if ($this->page > 1)
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link($prev) . "\" class=\"prev\">$p</a>";
                else
                    $this->pagination .= "<a href=\"javascript: void(0)\" class=\"disabled\">$p</a>";
            }
            //pages
            if ($lastpage < 7 + ($this->adjacents * 2)) {//not enough pages to bother breaking it up
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $this->page)
                        $this->pagination .= "<a href=\"javascript: void(0)\" class=\"current\">$counter</a>";
                    else
                        $this->pagination .= "<a href=\"" . $this->get_pagenum_link($counter) . "\">$counter</a>";
                }
            }
            elseif ($lastpage > 5 + ($this->adjacents * 2)) {//enough pages to hide some
                //close to beginning; only hide later pages
                if ($this->page < 1 + ($this->adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($this->adjacents * 2); $counter++) {
                        if ($counter == $this->page)
                            $this->pagination .= "<a href=\"javascript: void(0)\" class=\"current\">$counter</a>";
                        else
                            $this->pagination .= "<a href=\"" . $this->get_pagenum_link($counter) . "\">$counter</a>";
                    }
                    $this->pagination .= "<span>...</span>";
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link($lpm1) . "\">$lpm1</a>";
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link($lastpage) . "\">$lastpage</a>";
                }
                //in middle; hide some front and some back
                elseif ($lastpage - ($this->adjacents * 2) > $this->page && $this->page > ($this->adjacents * 2)) {
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link(1) . "\">1</a>";
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link(2) . "\">2</a>";
                    $this->pagination .= "<span>...</span>";
                    for ($counter = $this->page - $this->adjacents; $counter <= $this->page + $this->adjacents; $counter++)
                        if ($counter == $this->page)
                            $this->pagination .= "<a href=\"javascript: void(0)\" class=\"current\">$counter</a>";
                        else
                            $this->pagination .= "<a href=\"" . $this->get_pagenum_link($counter) . "\">$counter</a>";
                    $this->pagination .= "<span>...</span>";
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link($lpm1) . "\">$lpm1</a>";
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link($lastpage) . "\">$lastpage</a>";
                }
                //close to end; only hide early pages
                else {
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link(1) . "\">1</a>";
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link(2) . "\">2</a>";
                    $this->pagination .= "<span>...</span>";
                    for ($counter = $lastpage - (2 + ($this->adjacents * 2)); $counter <= $lastpage; $counter++)
                        if ($counter == $this->page)
                            $this->pagination .= "<a href=\"javascript: void(0)\" class=\"current\">$counter</a>";
                        else
                            $this->pagination .= "<a href=\"" . $this->get_pagenum_link($counter) . "\">$counter</a>";
                }
            }
            if ($this->page) {
                //siguiente button
                if ($this->page < $counter - 1)
                    $this->pagination .= "<a href=\"" . $this->get_pagenum_link($next) . "\" class=\"next\">$n</a>";
                else
                    $this->pagination .= "<a href=\"javascript: void(0)\" class=\"disabled\">$n</a>";
            }
        }
 
        return true;
    }
 
}

//get the number of records in the database table
$status = '0';
//$pagination_count = $wpdb->get_var($wpdb->prepare("SELECT * from  wp_property_reviews where status = %d",$status));

$row = $wpdb->get_results("SELECT * from  my_job");
$pagination_count = count($row);
/*echo "<pre>******";
print_r($row);
echo "*****</pre>";*/

if($pagination_count > 0) {
    //get current page
    $this_page = ($_GET['p'] && $_GET['p'] > 0)? (int) $_GET['p'] : 1;
    //Records per page
    $per_page = 10;
    //Total Page
    $total_page = ceil($pagination_count/$per_page);
 
    //initiate the pagination variable
    $pag = new pagination();
    //Set the pagination variable values
    $pag->Items($pagination_count);
    $pag->limit($per_page);
    $pag->target("admin.php?page=withdraw-event-user/withdraw-event-user.php");
    $pag->currentPage($this_page);
 
    //Done with the pagination
    //Now get the entries
    //But before that a little anomaly checking
    $list_start = ($this_page - 1)*$per_page;
    if($list_start >= $pagination_count)  //Start of the list should be less than pagination count
        $list_start = ($pagination_count - $per_page);
    if($list_start < 0) //list start cannot be negative
        $list_start = 0;
    $list_end = ($this_page * $per_page) - 1;
 //Get the data from the database
 
   if(isset($_POST['event_withdraw'])){
				$hidden_post_id = $_POST['hidden_post_id'];
				$hidden_use_id = $_POST['use_id'];
				
				$delete_job = $wpdb->get_results("DELETE FROM my_job WHERE user_id = $hidden_use_id AND post_id = $hidden_post_id");
				//echo "DELETE FROM my_job WHERE user_id = $hidden_use_id AND post_id = $hidden_post_id";
				$withdraw_mes = "Withdraw Event Successfully";
				}
     $job = $wpdb->get_results("SELECT * FROM my_job ORDER BY post_id");?>
<div id='icon-edit-pages' class='icon32'></div> <h1>Withdraw Event</h1>
 <?php
    if( $job) {
        //Do something with it! Probably display table
        ?>
        <table class="widefat">
            <thead>
                <tr>
                   <th>Staff ID</th>
        <th>Date</th>      
        <th>Event Name</th>
        <th>Location</th>
        <th>Time</th>      
        <th>Withdraw</th>

                </tr>
            </thead>
            <tbody>
                <?php
                //loop through
                 foreach ($job as $all_job_data) {
					 
						 $user_id =	$all_job_data->user_id;
						
						if(strlen($all_job_data->user_id) == 4){
							 $staff_user_id = 'LR'.$all_job_data->user_id;
							}
						elseif(strlen($all_job_data->user_id) == 3){
							 $staff_user_id = 'LR0'.$all_job_data->user_id;
							}
						elseif(strlen($all_job_data->user_id) == 2){
							 $staff_user_id = 'LR00'.$all_job_data->user_id;
							}
						else{
							 $staff_user_id = 'LR000'.$all_job_data->user_id;
							}
						
						
						
						 $post_id =	$all_job_data->post_id;
						 $job_date = $all_job_data->job_date;
						 $job_event_name =	$all_job_data->job_event_name;
						 $positions_name =	$all_job_data->positions_name;
						 $job_location =	$all_job_data->job_location;
						 $job_time =	$all_job_data->job_time;
                    ?>
                <tr>
                    <td><?php echo $staff_user_id; ?></td>
     <td><?php echo $job_date; ?></td>
     <td><?php echo $job_event_name; ?></td>
     <td><?php echo $job_location; ?></td>
     <td><?php echo $job_time; ?></td>
     <td>
            <form name="event_delete" method="post" action="">
            <input type="hidden" name="hidden_post_id" value="<?php echo $post_id?>" />
            <input type="hidden" name="use_id" value="<?php echo  $user_id;?>" />
            <input type="submit" name="event_withdraw" value="Withdraw"  class="event_with_but button-primary"/>
            </form>
     </td>
                </tr>
                    <?php
                }
                ?>
            </tbody>
            <thead>
                <tr>
                   <th>Staff ID</th>
        <th>Date</th>      
        <th>Event Name</th>
        <th>Location</th>
        <th>Time</th>      
        <th>Withdraw</th>

                </tr>
            </thead>
        </table>
        <div class="image_container">
        
        </div>
        <?php
        //Now display the pagiantion links
        ?>
            <div class="tablenav">
                <div class="alignleft actions">
                    <!--<input type="submit" class="button-secondary" value="Bulk Delete" />-->
                </div>
                <div class="tablenav-pages">
                    <span class="displaying-num"><?php echo $pagination_count; ?> items</span>
                    <?php $pag->show(); ?>
                </div>
            </div>
        <?php
    }
    else {
        echo '<div class="error"><p>Something Went wrong! Check</p></div>';
    }
}
else {
    echo '<div class="error"><p>No Data</p></div>';
}


?>

 