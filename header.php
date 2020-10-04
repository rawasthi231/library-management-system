<?php 
    session_start(); 
    if (!$_SESSION['usrId']) {
        echo "<script>alert('Login first');
                window.location.href='index.php'</script>";
    } else{
        include("connection.php");
        $usrId = $_SESSION['usrId'];
        $run = mysqli_query($con, "select * from admin where User_Id = '$usrId'");
        $result = mysqli_fetch_array($run);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>| eLMS </title>
     <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link href="img/favicon.ico" rel="icon" type="image/x-icon" />

    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
			setSidebarHeight();
        });
    </script>
    <style type="text/css">
        .hideData{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <h1 ><a href="dashboard.php" style="color: #ffffff;">eLMS | Library Management System</a></h1>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/Profile/<?php echo $result['Profile_Picture']; ?>" alt="Profile Pic" style="height:40px; width:50px; border-radius: 20px; margin-top: -10px;" />
                    </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li><b><?php echo $result['Name']; ?></b></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey"></span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="grid_12">
            <ul class="nav main">
                
                <!-- <li class="ic-charts"><a href="javascript:"><span> View Issued Books</span></a>
                    <ul>
                        <li><a href="">View by auther</a> </li>
                        <li><a href="">View by publication</a> </li>
                    </ul>
                </li> -->
                <li class="ic-gallery dd"><a href="Add_Publisher.php"><span>Add Publisher</span></a></li>
                <li class="ic-charts"><a href="Add_Subject.php"><span>Add Subject</span></a> </li>
                <li class="ic-form-style"><a href="Add_Book.php"><span>Add Book</span></a></li>
                <li class="ic-form-style"><a href="Add_Single_Book.php"><span>Add Single Book</span></a></li>
                <li class="ic-grid-tables"><a href="Issue_Book.php"><span>Issue a Book</span></a></li>
				<li class="ic-grid-tables"><a href="Return_Book.php"><span>Return a Book</span></a></li>
                
                <!--<li class="ic-gallery dd"><a href=""><span>Image Galleries</span></a>
               		 <ul>
                        <li><a href="image-gallery.html">Pretty Photo</a> </li>
                        <li><a href="gallery-with-filter.html">Gallery with Filter</a> </li>
                    </ul>
                </li>
                <li class="ic-notifications"><a href="notifications.html"><span>Notifications</span></a></li> -->
            </ul>
        </div>
<?php
    }
?>