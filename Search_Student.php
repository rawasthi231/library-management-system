<?php
    include("header.php");
    include("side_menu.php");
    error_reporting(0);
    if ($_GET['sLibCode']) {
        $LibCode = $_GET['sLibCode'];
?>
    <div class="grid_10">
        <div class="box round first">
            <h2>Students </h2>
            <div class="block form-group">
                <form method="POST" autocomplete="off">
                    <select id="searchBy" name="search">
                        <option value="Search By">Search By</option>
                        <option value="sName">Student Name</option>
                        <option value="sFName">Father's Name</option>
                        <option value="sMobile">Mobile</option>
                        <option value="sEmail">Email</option>
                        <option value="sCourse">Course</option>
                        <option value="sLibraryCode">Library Code</option>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <select id="searchOption" class="hideData" name="Std_Class">
                        <option value="Select Class">Select Course</option>
                        <?php getClasses(); ?>
                    </select>
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search">
                </form>
                <br> <hr> <br>
                <table width="700" border="5" align="center">
                    <tr>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Library Code</th>
                    </tr>
<?php                   
            getData('sLibraryCode', $LibCode); 
    }
    else{
?>
    <div class="grid_10">
        <div class="box round first">
            <h2>Students </h2>
            <div class="block form-group">
                <form method="POST" autocomplete="off">
                    <select id="searchBy" name="search">
                        <option value="Search By">Search By</option>
                        <option value="sName">Student Name</option>
                        <option value="sFName">Father's Name</option>
                        <option value="sMobile">Mobile</option>
                        <option value="sEmail">Email</option>
                        <option value="sCourse">Course</option>
                        <option value="sLibraryCode">Library Code</option>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <select id="searchOption" class="hideData" name="Std_Class">
                        <option value="Select Class">Select Course</option>
                        <?php getClasses(); ?>
                    </select>
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search">
                </form>
                <br> <hr> <br>
                <table width="700" border="5" align="center">
                    <tr>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Library Code</th>
                    </tr>
<?php
    }
    if (isset($_POST['btnSearch'])) {
        $searchOption = $_POST['search'];
        $searchText=strtoupper($_POST['searchText']);
        $studentClass=strtoupper($_POST['Std_Class']);
        $result = [];
        switch ($searchOption) {
            case 'sName':
                getData('sName', $searchText);
                break;
            case 'sFName':
                getData('sFName', $searchText);
                break;
            case 'sMobile':
                getData('sMobile', $studentClass);
                break;
            case 'sEmail':
                getData('sEmail', $searchText);
                break;
            case 'sCourse':
                getData('sCourse', $searchText);
                break;    
            case 'sLibraryCode':
                getData('sLibraryCode', $searchText);
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
                    if (x == "sCourse") {
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
        $run = mysqli_query($con, "select * from students where $searchBy = '$searchContent'");
            while ($result = mysqli_fetch_array($run)) { ?>
                <tr>
                    <td><?php echo $result['sName'];?></td>
                    <td><?php echo $result['sFName'];?></td>
                    <td><?php echo $result['sMobile'];?></td>
                    <td><?php echo $result['sEmail'];?></td>
                    <td><?php echo $result['sCourse'];?></td>
                    <td><a href="Issued_Books.php?sLibCode=<?php echo $result['sLibraryCode'];?>" title="Click to check issued books of this student"><?php echo $result['sLibraryCode'];?></a></td>
                </tr>                                   
    <?php   }
    }
    function getClasses(){
        include("connection.php");
        $runQuery = mysqli_query($con, "select DISTINCT sCourse from students");
            while ($result_Set = mysqli_fetch_array($runQuery)) { ?>
                <option value="<?php echo $result_Set['sCourse'];?>"><?php echo $result_Set['sCourse'];?></option>                                   
    <?php   }
    }
    include("footer.php");
?>