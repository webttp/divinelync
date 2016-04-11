
<?php
		error_reporting(E_ALL ^ E_NOTICE);
		//previous and next
		// How many adjacent pages should be shown on each side?
		$adjacents = 5;
		$tablename='jobslist';
		$query = $conn->query("select COUNT(*) as num from ".$tablename." order by id  desc");
		$total_pages = mysqli_fetch_array($query);
		$total_pages = $total_pages['num'];
		$limit = 2;                                //how many items to show per page
		$page = $_GET['page'];
		if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
		else
        $start = 0;                             //if no page var is given, set start to 
		/* Get data. */
		$result = $conn->query("select * from ".$tablename." order by id  desc LIMIT $start, $limit");
		/* Setup page vars for display. */
		if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
		$prev = $page - 1;                          //previous page is page - 1
		$next = $page + 1;                          //next page is page + 1
		$lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;                      //last page minus 1
		$pagination = "";
		if($lastpage > 1)
		{   
			$pagination .= "<ul class=\"pager\">";
			//previous button
			$pagename="jobsList.php";
			if ($page > 1) 
				$pagination.= "<li style='background-color:'><a href=\"$pagename?page=$prev\">Previous</a></li>";
			//next button
			if ($page < $lastpage) 
				$pagination.= "<li><a href=\"$pagename?page=$next\">Next »</a></li>";
			
			$pagination.= "</ul>\n";       
		}
?>		