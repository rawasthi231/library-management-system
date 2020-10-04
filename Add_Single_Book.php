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
                                    <td><label>Book ISBN : </label></td>
                                    <td><input type="text" name="bookISBN"></td>
                                </tr>
                                <tr>
                                    <td><label>Book Code : </label></td>
                                    <td><input type="text" name="bookCode"></td>
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
        $bISBN = $_POST['bookISBN'];
        $bCode = $_POST['bookCode'];
        $Sql_Query = "insert into single_book_info(Id, Book_ISBN, Book_Category_Code) values('', $bISBN, $bCode)";
        $result = mysqli_query($con, $Sql_Query);
        if ($result) {
            setQuantity($bCode);
            echo "<script>alert('Book added to database');</script>";
        }
        else
            echo "<script>alert('Error while adding book to database');</script>";
    }

    function setQuantity($bCode){
        include("connection.php");
        $getData = mysqli_query($con, "update books set Book_Quantity = Book_Quantity + 1 where Book_Code = $bCode");
    }
?>