<?php
    include("header.php");
    include("side_menu.php");
    include("connection.php");
    error_reporting(0);
    if ($_GET['sId']) {
        $studentId = $_GET['sId'];
?>
     <div class="grid_10">
        <div class="box round first">
            <h2>Total Issued Books : </h2>
            <div class="block form-group">
                <form method="POST" autocomplete="off">
                    <select id="searchBy" name="search">
                        <option>Search By</option>
                        <option>Book_ISBN</option>
                        <option>Book_Code</option>
                        <option>Student_Id</option>
                        <option>Issue_Date</option>
                        <option>Due_Date</option>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <input type="date" name="searchDate" id="searchOption" class="hideData">
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search">
                </form>
                <br> <hr> <br>
                <table width="700" border="5" align="center">
                    <tr>
                        <th>Book ISBN</th>
                        <th>Book Code</th>
                        <th>Student Id</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                    </tr>
<?php   
            getData('Student_Id', $studentId);
    }
    else{
?>
    <div class="grid_10">
        <div class="box round first">
            <h2>Total Issued Books : </h2>
            <div class="block form-group">
                <form method="POST" autocomplete="off">
                    <select id="searchBy" name="search">
                        <option>Search By</option>
                        <option>Book_ISBN</option>
                        <option>Book_Code</option>
                        <option>Student_Id</option>
                        <option>Issue_Date</option>
                        <option>Due_Date</option>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <input type="date" name="searchDate" id="searchOption" class="hideData">
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search">
                </form>
                <br> <hr> <br>
                <table width="700" border="5" align="center">
                    <tr>
                        <th>Book ISBN</th>
                        <th>Book Code</th>
                        <th>Student Id</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                    </tr>
<?php
            $run = mysqli_query($con, "select * from issued_books");
            while ($result = mysqli_fetch_array($run)) { ?>
                <tr>
                    <td><?php echo $result['Book_ISBN'];?></td>
                    <td><?php echo $result['Book_Code'];?></td>
                    <td><a href="Search_Student.php?sId=<?php echo $result['Student_Id'];?>"><?php echo $result['Student_Id'];?></a></td>
                    <td><?php echo $result['Issue_Date'];?></td>
                    <td><?php echo $result['Due_Date'];?></td>
                </tr>                    
<?php       }
    }

    if (isset($_POST['btnSearch'])) {
        $searchOption = $_POST['search'];
        $searchText=strtoupper($_POST['searchText']);
        $searchDate=$_POST['searchDate'];
        //Search books by its attributes
        switch ($searchOption) {
            case 'Book_ISBN':
                getData('Book_ISBN', $searchText);
                break;
            case 'Book_Code': 
                getData('Book_Code', $searchText);
                break;
            case 'Student_Id':
                getData('Student_Id', $searchText);
                break;
            case 'Issue_Date':
                getData('Issue_Date', $searchDate);
                break;
            case 'Due_Date':
                getData('Due_Date', $searchDate);
                break;
            default:
                echo "<script>alert('Please select a valid option');</script>";
                break;
        }
    }
?>                
                </table>
            </div>
        </div>

    <script>
        $(document).ready(function(){
            $("#searchBy").on("change", function(){
                setClass();
                function setClass(){
                    var x = document.getElementById("searchBy").value;
                    if (x == "Issue_Date" || x == "Due_Date") {
                        $("#searchText").addClass("hideData");
                        $("#searchOption").removeClass("hideData");
                    } else{
                        $("#searchOption").addClass("hideData");
                        $("#searchText").removeClass("hideData");
                    }
                }
            })
        });
    </script>

<?php
    
    function getData($searchBy, $searchContent){
        include("connection.php");
        $run = mysqli_query($con, "select * from Issued_Books where $searchBy = '$searchContent'");
            while ($result = mysqli_fetch_array($run)) { ?>
                <tr>
                    <td><?php echo $result['Book_ISBN'];?></td>
                    <td><?php echo $result['Book_Code'];?></td>
                    <td><a href="Search_Student.php?sId=<?php echo $result['Student_Id'];?>"><?php echo $result['Student_Id'];?></a></td>
                    <td><?php echo $result['Issue_Date'];?></td>
                    <td><?php echo $result['Due_Date'];?></td>
                </tr>                    
    <?php   }
    }
    include("footer.php");
?>