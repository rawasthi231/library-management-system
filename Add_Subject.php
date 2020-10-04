<?php
    include("header.php");
    include("side_menu.php");
?>
            <div class="grid_10">
                <div class="box round first">
                    <h2>Add Subject</h2>
                    <div class="block form-group">
                        <form method="POST" autocomplete="off">
                            <table border="3" cellpadding="5" cellspacing="5" align="center" style="width: 500px;">
                                <tr>
                                    <td><label>Subject Title : </label></td>
                                    <td><input type="text" name="subjectTitle"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnAddSubject" value="Add Subject"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

<?php
    include("footer.php");
    include("connection.php");
    if(isset($_POST['btnAddSubject'])){
        $sTitle = $_POST['subjectTitle'];
        $Sql_Query = "insert into subject(Id, Subject_Title) values('', '$sTitle')";
        $result = mysqli_query($con, $Sql_Query);
        if ($result) {
            echo "<script>alert('Subject added to database');</script>";
        }
        else
            echo "<script>alert('Error while adding subject to database');</script>";
    }
?>