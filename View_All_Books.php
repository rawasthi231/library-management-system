<?php
    include("header.php");
    include("side_menu.php");
    include("connection.php");
?>
            <div class="grid_10">
                <div class="box round first">
                    <h2>Total Books : </h2>
                    <div class="block form-group">
                        <div id="pagination_data"></div>
                    </div>
                </div>

<script>
    $(document).ready(function(){
        load_data();
        function load_data(page){
            $.ajax({
                url:"All_Books.php",
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
    include("footer.php");
?>