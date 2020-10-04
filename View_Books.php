<?php
    include("header.php");
    include("side_menu.php");
    include("connection.php");
    error_reporting(0);
?>
            <div class="grid_10">
                <div class="box round first">
                    <h2>Books : <span id="totalBooks"></span></h2>
                    <div class="block form-group">
                        <table style="width:500px;" align="center" border="2">
                            <tr>
                                <td>
                                    <input type="radio" id="qtyLowToUp" value="Quantity Low to High">Book Quantity Low to High            
                                </td>
                                <td>
                                    <input type="radio" id="qtyUpToLow" value="Quantity High to Low">Book Quantity High to Low
                                </td>
                            </tr>
                        </table> 
                        <br>
                        <div id="pagination_data"></div>
                    </div>
                </div>

<script>
    $(document).ready(function(){
        load_data();
        function load_data(page){
            $.ajax({
                url:"Books.php",
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
        $.ajax({
            url:'insertData.php',
            type:'POST',
            //data: '',
            success: function(total){
                $('#totalBooks').html(total);
            }
        })
        $("#qtyLowToUp").click(function(){
                var ltu = document.getElementById('qtyLowToUp');
                var text1 =document.getElementById('qtyLowToUp').value;
                var utl = document.getElementById('qtyUpToLow');
                if (ltu.checked == true) {
                    utl.checked = false;
                    $.ajax({
                        url:'Books.php',
                        type:'POST',
                        data:{Disp_Order:'ltu'},
                        success:function(result){
                            $('#pagination_data').html(result);
                        }
                    })
                }
            })
            $("#qtyUpToLow").click(function(){
                var ltu = document.getElementById('qtyLowToUp');
                var utl = document.getElementById('qtyUpToLow');
                var text2 =document.getElementById('qtyUpToLow').value;
                if (utl.checked == true) {
                    ltu.checked = false;
                    $.ajax({
                        url:'Books.php',
                        type:'POST',
                        data:{Disp_Order:'utl'},
                        success:function(result){
                            $('#pagination_data').html(result);
                        }
                    })
                } 
            })
    });
</script>
<?php
    include("footer.php");
?>