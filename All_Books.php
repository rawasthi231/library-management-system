<?php
	include("connection.php");
	$limit = 10;
	$page = '';
	$output = ''; 
	if (isset($_POST["page"])) {
		$page  = $_POST["page"]; 
	} else {
		$page=1; 
	}  
	$start_from = ($page-1) * $limit;  
	$query = "SELECT * FROM single_book_info ORDER BY Id ASC LIMIT $start_from, $limit";  
	$rs_result = mysqli_query($con, $query);
	$output .= "
		<table border='5' align='center'>
			<tr>
				<th style='font-size:15px;'>Book ISBN</th>
				<th style='font-size:15px;'>Book Code</th>
			</tr>
	";   
	while ($row = mysqli_fetch_assoc($rs_result)) {  
		$output .='  
        	<tr>  
        		<td>'.$row['Book_ISBN'].'</td>
            	<td><a href="Search_Book.php?bCode='.$row['Book_Category_Code'].'" title="Click to view book info">'.$row['Book_Category_Code'].'</a></td>
            </tr>
        ';  
	}  
	$output .='</table><br><div align="center"';
	$query2 = "SELECT COUNT(Id) FROM single_book_info";  
	$result = mysqli_query($con, $query2);  
	$rows = mysqli_fetch_row($result);
	$total_records = $rows[0]; 
    $total_pages = ceil($total_records / $limit);
    for ($i=1; $i<=$total_pages ; $i++) {
    	$output .="<button class='pagination_link' style='cursor:pointer; padding:10px; border:1px solid #ccc;' id='".$i."'>".$i."</button>";
    }
    echo $output;
?>  
