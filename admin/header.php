<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
include_once '../includes/db_connection.php';
$user = $_SESSION['user_id'];
$myip = $_SESSION['user_ip'];
//post count
$post_count = $conn->query("SELECT * FROM posts");
//comment count
$comment_count = $conn->query("SELECT * FROM comments");
?>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.php">Welcome, <?php echo "$user" ?></a></h1>
                    <?php
                    date_default_timezone_set("hongkong");
                    echo date("l, d F Y - H:i a ");

                    function season() {
                        $limits = array('/11/21' => 'Winter', '/09/21' => 'Autumn', '/06/21' => 'Summer', '/03/21' => 'Spring', '/12/31' => 'Winter');
                        foreach ($limits AS $key => $value) {
                            $limit = date("Y") . $key;
                            if (strtotime("now") > strtotime($limit)) {
                                return $value;
                            }
                        }
                    }

                    echo season();
                    ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group form">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li  class="current"><a style="color:#009900" href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a style="color:#ff6666" href="calendar.php"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a style="color:#0099ff" href="editors.php"><i class="glyphicon glyphicon-pencil"></i> Post</a></li>
                    <li><a style="color:#66ccff" href="manage.php"><i class="glyphicon glyphicon-tasks"></i>Article Management</a></li>
                    <li><a style="color:#00cc33" href="user.php?user=yes"><i class="glyphicon glyphicon-user"></i>User Management</a></li>
                    <li><a style="color:#666666" href="mail.php?email=yes"><i class="glyphicon glyphicon-envelope"></i>Email Management</a></li>
                    <li><a style="color:#cc6600" href="product.php?product=yes"><i class="glyphicon glyphicon-euro"></i>Product Management</a></li>
                    <li><a style="color:#ff9900" href="service.php?service=yes"><i class="glyphicon glyphicon-cloud"></i>Service Management</a></li>
                    <li><a style="color:#6666ff" href="chatroom.php?chatroom=yes"><i class="glyphicon glyphicon-heart"></i>Chatroom Management</a></li>
                    <li><a style="color:#00cc00" href="test.php?test=yes"><i class="glyphicon glyphicon-search"></i>Test Management</a></li>
                    <li><a style="color:#ff6699" href="order.php?order=yes"><i class="glyphicon glyphicon-star"></i>Order Management</a></li>
                    <li><a style="color:#ff3412" href="file.php?file=yes"><i class="glyphicon glyphicon-file"></i>File Management</a></li>
                    <!--                    <li class="submenu">
                                            <a style="color:#3399ff" href="">
                                                <i  class="glyphicon glyphicon-picture"></i> Image Management
                                                <span class="caret pull-right"></span>
                                            </a>
                                             Sub menu 
                                            <ul>
                                                <li><a href="slide_img.php">Home page sliders</a></li>
                                                <li><a href="article_img.php">Article Cover Images</a></li>
                                                <li><a href="image.php">Portfolio</a></li>
                                            </ul>
                                        </li>-->
                    <li class="current"><a style="color:#0099ff" href="sitemanage.php"><i class="glyphicon glyphicon-cog"></i> Site Manage</a></li>
                    <li><a style="color:#33cc00" href="slide_img.php"><i  class="glyphicon glyphicon-picture"></i>Home page sliders</a></li>
                    <li><a style="color:#0099ff" href="article_img.php"><i  class="glyphicon glyphicon-picture"></i>Article Cover Picture</a></li>
                    <li><a style="color:#ff6699" href="image.php"><i  class="glyphicon glyphicon-picture"></i>Portfolio</a></li>
                </ul>
            </div>
        </div>
