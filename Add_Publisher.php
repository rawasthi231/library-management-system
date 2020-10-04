<?php
    include("header.php");
    include("side_menu.php");
?>
            <div class="grid_10">
                <div class="box round first">
                    <h2>Add Publisher</h2>
                    <div class="block form-group">
                        <form method="POST" autocomplete="off">
                            <table border="3" cellpadding="5" cellspacing="5" align="center" style="width: 500px;">
                                <tr>
                                    <td><label>Publisher Name : </label></td>
                                    <td><input type="text" name="publisherName"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnAddPublisher" value="Add Publisher"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

<?php
    include("footer.php");
    include("connection.php");
    if(isset($_POST['btnAddPublisher'])){
        $pName = strtoupper($_POST['publisherName']);
        $Sql_Query = "insert into publishers(Id, Publisher_Name) values('', '$pName')";
        $result = mysqli_query($con, $Sql_Query);
        if ($result) {
            echo "<script>alert('Publisher added to database');</script>";
        }
        else
            echo "<script>alert('Error while adding publisher to database');</script>";
    }
?>