<?php
    include("header.php");
    include("side_menu.php");
?>
            <div class="grid_10">
                <div class="box round first">
                    <h2>Issue a book</h2>
                    <div class="block form-group">
                        <form method="POST" autocomplete="off">
                            <table border="3" align="center" cellpadding="5" cellspacing="5" style="width: 500px;">
                                <tr>
                                    <td><label>Book ISBN : </label></td>
                                    <td><input type="text" name="bookISBN"></td>
                                </tr>
                                <tr>
                                    <td><label>Student Id : </label></td>
                                    <td><input type="text" name="studentId"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnIssue" value="Issue Book"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
<?php
    include("footer.php");
    include("connection.php");
    if(isset($_POST['btnIssue'])){
        $bISBN = $_POST['bookISBN'];
        $sId = $_POST['studentId'];
        $iDate = date("yy-m-d");
        $dueDate = new DateTime($iDate); // Y-m-d
        $dueDate->add(new DateInterval('P30D'));
        $dDate = $dueDate->format('Y-m-d');
        $getBCode = mysqli_query($con, "select Book_Category_Code from single_book_info where Book_ISBN = $bISBN");
        if ($getBCode) {
            $res = mysqli_fetch_array($getBCode);
            $bCode = $res['Book_Category_Code'];
            $Sql_Query = "insert into issued_books values('', $bISBN, $bCode, $sId, '$iDate', '$dDate')";
            $result = mysqli_query($con, $Sql_Query);
            if ($result) {
                //updateDetails($bCatCode, $sId);
                mysqli_query($con, "update student set NumberOfBooks_Issued = NumberOfBooks_Issued + 1 where Student_Id = $sId");
                echo "<script>alert('Book issued successfully');</script>";
            }
            else
                echo "<script>alert('Error while issueing book');</script>";    
        }
        else
            echo "<script>alert('Please check book ISBN');</script>";
    }

    // function updateDetails($bookCode, $studentId){
    //     include("connection.php");
    //     // $getQuantity = mysqli_query($con, "select * from books where Book_Code = $bookCode");
    //     // $bookDetails = mysqli_fetch_array($getQuantity);
    //     // $bookQuantity = $bookDetails['Book_Quantity'];
        
    //     $getStudentInfo = mysqli_query($con, "select * from student where Student_Id  = $studentId");
    //     $studentInfo = mysqli_fetch_array($getStudentInfo);
    //     $NumberOfBooksIssued = $studentInfo['NumberOfBooks_Issued'];
    //     mysqli_query($con, "update books set Book_Quantity = ($bookQuantity-1) where Book_Code = $bookCode");
    //     mysqli_query($con, "update student set NumberOfBooks_Issued = ($NumberOfBooksIssued+1) where Student_Id = $studentId");  
    // }
?>