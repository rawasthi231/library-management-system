<?php
	include("connection.php");
    error_reporting(0);
	$query = '';
	$limit = 10;
	$page = '';
	$output = ''; 
	if (isset($_POST["page"])) {
		$page  = $_POST["page"]; 
	} else {
		$page=1; 
	}  
	$start_from = ($page-1) * $limit;  
	if($_POST['Disp_Order']== 'ltu'){
		$query	= "SELECT * FROM books ORDER BY Book_Quantity ASC LIMIT $start_from, $limit";
	} else if ($_POST['Disp_Order']== 'utl') {
		$query	= "SELECT * FROM books ORDER BY Book_Quantity DESC LIMIT $start_from, $limit";
	} else {
		$query = "SELECT * FROM books ORDER BY Id ASC LIMIT $start_from, $limit";	
	}
	$rs_result = mysqli_query($con, $query);
	$output .= "
		<table border='5' align='center'>
			<tr>
				<th style='font-size:15px;'>Book Code</th>
				<th style='font-size:15px;'>Book Title</th>
				<th style='font-size:15px;'>Book Subject</th>
				<th style='font-size:15px;'>Book Author</th>
				<th style='font-size:15px;'>Book Publisher</th>
				<th style='font-size:15px;'>Book Edition</th>
				<th style='font-size:15px;'>Book Quantity</th>
			</tr>
	";   
	while ($row = mysqli_fetch_assoc($rs_result)) {  
		$output .='  
        	<tr>  
            	<td><a href="View_Single_Book.php?bookCode='.$row['Book_Code'].'" title="Click to get associated books info">'.$row['Book_Code'].'</a></td>
            	<td>'.strtoupper($row['Book_Title']).'</td>
            	<td>'.strtoupper($row['Book_Subject']).'</td>
            	<td>'.strtoupper($row['Book_Author']).'</td>
            	<td>'.strtoupper($row['Book_Publisher']).'</td>
            	<td>'.$row['Book_Edition'].'</td>
            	<td>'.$row['Book_Quantity'].'</td>
            </tr>
        ';  
	}  
	$output .='</table><br><div align="center"';
	$query2 = "SELECT COUNT(Id) FROM books";  
	$result = mysqli_query($con, $query2);  
	$rows = mysqli_fetch_row($result);
	$total_records = $rows[0]; 
    $total_pages = ceil($total_records / $limit);
    for ($i=1; $i<=$total_pages ; $i++) {
    	$output .="<button class='pagination_link' style='cursor:pointer; padding:10px; border:1px solid #ccc;' id='".$i."'>".$i."</button>";
    }
    echo $output;
?>  
