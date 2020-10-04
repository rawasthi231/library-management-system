<?php
    include("header.php");
    include("side_menu.php");
    include("connection.php");
    error_reporting(0);
    if ($_GET['bookCode']) {
        $bCode = $_GET['bookCode'];
        $output .= "
            <table border='5' style='width:500px;'>
                <tr>
                    <th style='font-size:15px;'>Book ISBN</th>
                </tr>
            ";
        $getData = mysqli_query($con, "select * from single_book_info where Book_Category_Code = $bCode");
        $rowsNum = mysqli_num_rows($getData);
        while($row = mysqli_fetch_array($getData)){
            $output .= '
                <tr>  
                    <td>'.$row['Book_ISBN'].'</td>
                </tr> 
            ';
        }
        $output .= '</table>';

        $getIssuedBooks = mysqli_query($con, "select * from issued_books where Book_Code = $bCode");
        $issuedBooksNum = mysqli_num_rows($getIssuedBooks);
?>
    <div class="grid_10">
        <div class="box round first">
            <h2>Books : </h2>
            <div class="block form-group">
                <?php echo '<h4>Book Code : <a href="Search_Book.php?bCode='.$bCode.'">'.$bCode.'</a>&nbsp;&nbsp; Total Books : '.$rowsNum.'&nbsp;&nbsp; Issued Books : '.$issuedBooksNum.' </h4>
                ' ?>
                <hr>
                <?php echo $output; ?>
            </div>
        </div>
<?php        
    }
    else{
?>
    <div class="grid_10">
        <div class="box round first">
            <h2>Books : </h2>
            <div class="block form-group">
                <div id="pagination_data"></div>
            </div>
        </div>

<script>
    $(document).ready(function(){
        //load_data();
        function load_data(page){
            $.ajax({
                url:"Single_Book.php",
                method:"POST",
                data:{page:page},
                success: function(response){
                    $('#pagination_data').html(response);
                }
            });
        };
        $(document).on('click', '.pagination_link', function(){
            var page = $(this).attr("id");
            load_data(page);
        });
    });
</script>

<?php
    }
    include("footer.php");
?>
