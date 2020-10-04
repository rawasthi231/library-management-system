<?php
    include("header.php");
    include("side_menu.php");
?>
            <div class="grid_10">
                <div class="box round first">
                    <h2>Return a book</h2>
                    <div class="block form-group">
                        <form method="POST" autocomplete="off">
                            <table border="3" align="center" cellpadding="5" cellspacing="10" style="width: 500px;">
                                <tr>
                                    <td><label>Book ISBN : </label></td>
                                    <td><input type="text" name="bookISBN"></td>
                                </tr>
                                <tr>
                                    <td><label>Student Id : </label></td>
                                    <td><input type="text" name="studentId"></td>
                                </tr>
                                <!-- <tr>
                                    <td><label>Return Date : </label></td>
                                    <td><input type="date" name="returnDate"></td>
                                </tr> -->
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnReturn" value="Return Book"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
<?php
    include("footer.php");
    include("connection.php");
    if(isset($_POST['btnReturn'])){
        $bISBN = $_POST['bookISBN'];
        $sId = $_POST['studentId'];
        $rDate = date("yy-m-d");
        $Sql_Query = "delete from Issued_Books where Book_ISBN = $bISBN and Student_Id = $sId";
        $result = mysqli_query($con, $Sql_Query);
        if ($result) {
            // $getBCode = mysqli_query($con, "select Book_Category_Code from single_book_info where Book_ISBN = $bISBN");
            // $row = mysqli_fetch_array($getBCode);
            // $bCode = $row['Book_Category_Code'];
            // updateDetails($bCode, $sId);
            //getFine($bCode, $sId, $rDate);
            mysqli_query($con, "update student set NumberOfBooks_Issued = NumberOfBooks_Issued - 1 where Student_Id = $sId");
            echo "<script>alert('Book returned successfully');</script>";
        }
        else
            echo "<script>alert('Error while returning book');</script>";
    }

    // function updateDetails($bookCode, $studentId){
    //     include("connection.php");
    //     $getQuantity = mysqli_query($con, "select * from books where Book_Code = $bookCode");
    //     $bookDetails = mysqli_fetch_array($getQuantity);
    //     $bookQuantity = $bookDetails['Book_Quantity'];
        
    //     $getStudentInfo = mysqli_query($con, "select * from student where Student_Id  = $studentId");
    //     $studentInfo = mysqli_fetch_array($getStudentInfo);
    //     $NumberOfBooksIssued = $studentInfo['NumberOfBooks_Issued'];
    //     mysqli_query($con, "update books set Book_Quantity = ($bookQuantity+1) where Book_Code = $bookCode");
    //     mysqli_query($con, "update student set NumberOfBooks_Issued = ($NumberOfBooksIssued-1) where Student_Id = $studentId");  
    // }

    // function getFine($bookCode, $studentId, $today){
    //     include("connection.php");
    //     $runQuery = mysqli_query($con, "select * from Issued_Books where Book_Code = $bookCode and Student_Id = $studentId");
    //     if ($runQuery) {
    //         $bookInfo = mysqli_fetch_array($runQuery); 
    //         $dueDate = $bookInfo['Due_Date']; 
    //         $diff = date_diff(date_create('$dueDate'), date_create('$today'));
    //     }
    //     echo $bookCode."  ".$studentId."  ".$today; 
    //     echo $diff->format("%R%a days");
    // }
?>