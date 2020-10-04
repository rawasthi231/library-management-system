<?php
    include("header.php");
    include("side_menu.php");
    error_reporting(0);
    if ($_GET['bCode']) {
        $bookCode = $_GET['bCode'];
?>
     <div class="grid_10">
        <div class="box round first">
            <h2>Total Books</h2>
            <div class="block form-group">
                <form method="POST" autocomplete="off">
                    <select id="searchBy" name="search">
                        <option>Search By</option>
                        <option>Book_Code</option>
                        <option>Book_Title</option>
                        <option>Book_Subject</option>
                        <option>Book_Author</option>
                        <option>Book_Publisher</option>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <select id="searchOption" class="hideData" name="Book_Pub">
                        <option value="Select Publisher">Select Publisher</option>
                        <?php getPublisher(); ?>
                    </select>
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search">
                </form>
                <br> <hr> <br>
                <table width="700" border="5" align="center">
                    <tr>
                        <th>Book Code</th>
                        <th>Book Title</th>
                        <th>Book Subject</th>
                        <th>Book Author</th>
                        <th>Book Publisher</th>
                        <th>Book Editor</th>
                        <th>Book Quantity</th>
                    </tr>
<?php   
            getData('Book_Code', $bookCode);
    }
    elseif ($_GET['bSubject']) {
        $bookSubject = $_GET['bSubject'];
?>
     <div class="grid_10">
        <div class="box round first">
            <h2>Total Books</h2>
            <div class="block form-group">
                <form method="POST" autocomplete="off">
                    <select id="searchBy" name="search">
                        <option>Search By</option>
                        <option>Book_Code</option>
                        <option>Book_Title</option>
                        <option>Book_Subject</option>
                        <option>Book_Author</option>
                        <option>Book_Publisher</option>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <select id="searchOption" class="hideData" name="Book_Pub">
                        <option value="Select Publisher">Select Publisher</option>
                        <?php getPublisher(); ?>
                    </select>
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search">
                </form>
                <br> <hr> <br>
                <table width="700" border="5" align="center">
                    <tr>
                        <th>Book Code</th>
                        <th>Book Title</th>
                        <th>Book Subject</th>
                        <th>Book Author</th>
                        <th>Book Publisher</th>
                        <th>Book Editor</th>
                        <th>Book Quantity</th>
                    </tr>
<?php   
            getData('Book_Subject', $bookSubject);
    }
    elseif ($_GET['bPublisher']) {
        $bookPublisher = $_GET['bPublisher'];
?>
     <div class="grid_10">
        <div class="box round first">
            <h2>Total Books</h2>
            <div class="block form-group">
                <form method="POST" autocomplete="off">
                    <select id="searchBy" name="search">
                        <option>Search By</option>
                        <option>Book_Code</option>
                        <option>Book_Title</option>
                        <option>Book_Subject</option>
                        <option>Book_Author</option>
                        <option>Book_Publisher</option>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <select id="searchOption" class="hideData" name="Book_Pub">
                        <option value="Select Publisher">Select Publisher</option>
                        <?php getPublisher(); ?>
                    </select>
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search">
                </form>
                <br> <hr> <br>
                <table width="700" border="5" align="center">
                    <tr>
                        <th>Book Code</th>
                        <th>Book Title</th>
                        <th>Book Subject</th>
                        <th>Book Author</th>
                        <th>Book Publisher</th>
                        <th>Book Editor</th>
                        <th>Book Quantity</th>
                    </tr>
<?php   
            getData('Book_Publisher', $bookPublisher);
    }
    else{
?>
    <div class="grid_10">
        <div class="box round first">
            <h2>Total Books : <span id="totalBooks"></span></h2>
            <div class="block form-group">
                <form method="POST" autocomplete="off">
                    <select id="searchBy" name="search">
                        <option>Search By</option>
                        <option>Book_Code</option>
                        <option>Book_Title</option>
                        <option>Book_Subject</option>
                        <option>Book_Author</option>
                        <option>Book_Publisher</option>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <select id="searchOption" class="hideData" name="Book_Pub">
                        <option value="Select Publisher">Select Publisher</option>
                        <?php getPublisher(); ?>
                    </select>
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search">
                </form>
                <br> <hr> <br>
                <table width="700" border="5" align="center">
                    <tr>
                        <th>Book Code</th>
                        <th>Book Title</th>
                        <th>Book Subject</th>
                        <th>Book Author</th>
                        <th>Book Publisher</th>
                        <th>Book Editor</th>
                        <th>Book Quantity</th>
                    </tr>
<?php
    }

    if (isset($_POST['btnSearch'])) {
        $searchOption = $_POST['search'];
        $searchText=strtoupper($_POST['searchText']);
        $bookPub=strtoupper($_POST['Book_Pub']);
        //Search books by its attributes
        switch ($searchOption) {
            case 'Book_Code': 
                getData('Book_Code', $searchText);
                break;
            case 'Book_Title':
                getData('Book_Title', $searchText);
                break;
            case 'Book_Subject':
                getData('Book_Subject', $searchText);
                break;
            case 'Book_Author':
                getData('Book_Author', $searchText);
                break;
            case 'Book_Publisher':
                getData('Book_Publisher', $bookPub);
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
                    if (x == "Book_Publisher") {
                        $("#searchText").addClass("hideData");
                        $("#searchOption").removeClass("hideData");
                    } else{
                        $("#searchOption").addClass("hideData");
                        $("#searchText").removeClass("hideData");
                    }
                }
                    
            })
            $(document).ready(function(){
                $.ajax({
                    url:'insertData.php',
                    type:'POST',
                    //data: '',
                    success: function(total){
                        $('#totalBooks').html(total);
                    }
                })
            })
        });
    </script>

<?php
    
    function getData($searchBy, $searchContent){
        include("connection.php");
        $run = mysqli_query($con, "select * from books where $searchBy = '$searchContent'");
            while ($result = mysqli_fetch_array($run)) { ?>
                <tr>
                    <td><?php echo $result['Book_Code'];?></td>
                    <td><?php echo strtoupper($result['Book_Title']);?></td>
                    <td><?php echo strtoupper($result['Book_Subject']);?></td>
                    <td><?php echo strtoupper($result['Book_Author']);?></td>
                    <td><?php echo strtoupper($result['Book_Publisher']);?></td>
                    <td><?php echo $result['Book_Edition'];?></td>
                    <td><?php echo $result['Book_Quantity'];?></td>
                </tr>                    
    <?php   }
    }

    function getPublisher(){
        include("connection.php");
        $runQuery = mysqli_query($con, "select * from publishers");
            while ($result_Set = mysqli_fetch_array($runQuery)) { ?>
                <option value="<?php echo $result_Set['Publisher_Name'];?>"><?php echo $result_Set['Publisher_Name'];?></option>                                   
    <?php   }
    }
    include("footer.php");
?>
