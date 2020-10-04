<?php
	include("connection.php");
	//extract($_GET);
	// if(isset($_REQUEST['btnAddBook'])){
	// 	echo $bookCode;
	// 	$query = "insert into books(Book_Code, Book_Title, Book_Subject, Book_Author, Book_Publisher, Book_Edition, Book_Quantity) values('$bookCode', '$bookTitle', '$bookSubject', '$bookAuthor', '$bookPublication', $bookEdition, $bookQuantity)";
	// 	$result = mysqli_query($con, $query);
	// 	// header("location:Add_Book.php");
	// }
	$res = mysqli_query($con, "select * from books");
	$total = mysqli_num_rows($res);
	echo $total;

	// $getStudents = mysqli_query($con, "select * from student");
	// $students = mysqli_num_rows($getStudents);
	
?>