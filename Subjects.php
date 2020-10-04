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
	$query = "SELECT * FROM subject ORDER BY Id ASC LIMIT $start_from, $limit";  
	$rs_result = mysqli_query($con, $query);
	$output .= "
		<table border='5' align='center' style='width:500px;'>
			<tr>
				<th style='font-size:15px;'>Subject Title</th>
			</tr>
	";   
	while ($row = mysqli_fetch_assoc($rs_result)) {  
		$output .='  
        	<tr>  
            	<td><a href="Search_Book.php?bSubject='.$row["Subject_Title"].'" title="Click to view books of this subject">'.strtoupper($row["Subject_Title"]).'</a></td>
            </tr>
        ';  
	}  
	$output .='</table><br><div align="center"';
	$query2 = "SELECT COUNT(Id) FROM subject";  
	$result = mysqli_query($con, $query2);  
	$rows = mysqli_fetch_row($result);
	$total_records = $rows[0]; 
    $total_pages = ceil($total_records / $limit);
    for ($i=1; $i<=$total_pages ; $i++) {
    	$output .="<button class='pagination_link' style='cursor:pointer; padding:12px; border:1px solid #45f;' id='".$i."'>".$i."  </button>";
    }
    echo $output;
?>  
