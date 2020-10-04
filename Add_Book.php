<?php
    include("header.php");
    include("side_menu.php");
?>
            <div class="grid_10">
                <div class="box round first">
                    <h2>Add new book</h2>
                    <div class="block form-group">
                        <form method="POST" autocomplete="off">
                            <table border="3" cellpadding="5" cellspacing="5" align="center" style="width: 500px;">
                                <tr>
                                    <td><label>Book Code : </label></td>
                                    <td><input type="text" name="bookCode"></td>
                                </tr>
                                <tr>
                                    <td><label>Book Title : </label></td>
                                    <td><input type="text" name="bookTitle"></td>
                                </tr>
                                <tr>
                                    <td><label>Book Subject : </label></td>
                                    <td>
                                        <select name="bookSubject">
                                            <option>Select Subject</option>
                                            <?php fetchSubjects(); ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Book Author : </label></td>
                                    <td><input type="text" name="bookAuthor"></td>
                                </tr>
                                <tr>
                                    <td><label>Books Publisher : </label></td>
                                    <td>
                                        <select name="bookPublisher">
                                            <option>Select Publisher</option>
                                            <?php fetchPublishers(); ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Book Edition : </label></td>
                                    <td><input type="text" name="bookEdition"></td>
                                </tr>
                                <tr>
                                    <td><label>Book Quantity : </label></td>
                                    <td><input type="text" name="bookQuantity"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnAddBook" value="Add Book"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

<?php
    include("footer.php");
    include("connection.php");
    if(isset($_POST['btnAddBook'])){
        $bCode = $_POST['bookCode'];
        $bTitle = strtoupper($_POST['bookTitle']);
        $bSubject = strtoupper($_POST['bookSubject']);
        $bAuthor = strtoupper($_POST['bookAuthor']);
        $bPublisher = strtoupper($_POST['bookPublisher']);
        $bEdition = $_POST['bookEdition'];
        $bQuantity = $_POST['bookQuantity'];
        $Sql_Query = "insert into books values('', '$bCode', '$bTitle', '$bSubject', '$bAuthor', '$bPublisher', $bEdition, $bQuantity)";
        $result = mysqli_query($con, $Sql_Query);
        if ($result) {
            echo "<script>alert('Book added to database');</script>";
        }
        else
            echo "<script>alert('Error while adding book to database');</script>";
    }

    function fetchSubjects(){
        include("connection.php");
        $getSubjects = mysqli_query($con, "select * from subject");
        while($subject = mysqli_fetch_array($getSubjects)){ 
?>
            <option><?php echo $subject['Subject_Title']; ?> </option>
<?php    } 
    }

    function fetchPublishers(){
        include("connection.php");
        $getPublishers = mysqli_query($con, "select * from publishers");
        while($Publisher = mysqli_fetch_array($getPublishers)){ 
?>
            <option><?php echo $Publisher['Publisher_Name']; ?> </option>
<?php    } 
    }
?>