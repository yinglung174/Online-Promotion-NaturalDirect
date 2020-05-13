<?php
include_once 'includes/db_connection.php';
//post count
$post_count = $conn->query("SELECT * FROM posts");
//comment count
$comment_count = $conn->query("SELECT * FROM comments");
?>


<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
<style>
    #header{
        background-color: <?php echo $color['header'] ?>;
    }
    #topbar{
        background-color: <?php echo $color['topbar'] ?>;
    }
    #nav ul li a:hover,
    #nav ul li:hover a{
        background-color: <?php echo $color['nav'] ?>;
    }
    #header-sidebar .widget_text .textwidget{
        border: 1px solid <?php echo $color['slidebar'] ?>;
        box-shadow:5px 5px 5px #0d0d0d;
        background-color:<?php echo $color['slidebar'] ?>;  
    }
    #topbar_login a.topbar_login{
        background-color:<?php echo $color['login'] ?>;  
    }
    #nav ul.sub-menu, #nav ul.children{
    background-color: <?php echo $color['nav'] ?>;
    }
</style>
<!-- START BG SHADOW -->
<div class="bg-shadow">
    <!-- START WRAPPER -->
    <div id="wrapper" class="container group">

        <!-- START TOP BAR -->
        <div id="topbar">
            <div class="container">
                <div class="row">
                    <div id="nav" class="span12 light">

                        <!-- START MAIN NAVIGATION -->

                        <ul id="menu-menu" class="level-1">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="about.php">About us</a>
                                <ul class="sub-menu">
                                    <li> <a href="autismInfo.php">About Autism</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="news.php">News</a>
                            </li>
                            <li>
                                <a href="product.php">Products</a>
                            </li>
                            <li>
                                <a href="service.php">Services</a>
                            </li>
                            <li>
                                <a href="game.php">Game</a>
                            </li>
                            <li>
                                <a href="portfolio.php">PORTFOLIO</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact us</a>
                                <ul class="sub-menu">
                                    <li><a href="faq.php">FAQ</a></li>
                                    <li><a href="support.php">Be our volunteer</a></li>
                                </ul>
                            </li>
                            <?php
                            $queryASearch = "SELECT * from file ORDER BY fileNo ASC";
                            $resultASearch = mysqli_query($conn, $queryASearch);

                            if (!$resultASearch) {
                                die("Database access failed: " . mysqli_error($conn));
                            } else {
                                while ($rowSA = mysqli_fetch_array($resultASearch)) {

                                    echo '<li><a href="' . $rowSA["fileName"] . '.php">' . $rowSA["fileTitle"] . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <!-- END MAIN NAVIGATION -->

                        <!-- START TOPBAR LOGIN -->

                        <!-- normal user -->
                        <div id="topbar_login" >
                            <?php if (!isset($_SESSION["No"]) && !isset($_SESSION["userData"])) {
                                ?><a class="topbar_login" href="members/members.php">LOGIN</a>
                                <!-- Member -->
                            <?php }if (isset($_SESSION["user"])) {
                                ?>
                                <ul id="menu-menu" class="level-1">
                                    <li>
                                        <a href="members/profile.php">
                                            <?php
                                            echo "Welcome, " . $_SESSION["name"];
                                            ?>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="members/profile.php">Profile</a></li>
                                            <li><a href="members/message.php">Email</a></li>
                                            <li><a href="members/memberorder.php">Shopping Cart</a></li>
                                            <li><a href="members/vieworder.php">Order</a></li>
                                            <li><a href="members/echat/home.php">Chatroom</a></li>
                                            <li><a href="members/autism.php">Autism Test</a></li>
                                            <li><a href="members/logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <?php
                            }
                            ?>
                            <!-- Facebook Member -->
                            <?php if (isset($_SESSION["userData"])) {
                                ?>
                                <ul id="menu-menu" class="level-1">
                                    <li>
                                        <a href="members/fb_profile.php">
                                            <?php
                                            echo $_SESSION["fb_img"];
                                            ?>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="members/fb_profile.php">Profile</a></li>
                                            <li><a href="members/message.php">Email</a></li>
                                            <li><a href="members/memberorder.php">Shopping Cart</a></li>
                                            <li><a href="members/vieworder.php">Order</a></li>
                                            <li><a href="members/echat/home.php">Chatroom</a></li>
                                            <li><a href="members/autism.php">Autism Test</a></li>
                                            <li><a href="members/fb_logout.php">Logout</a></li>

                                        </ul>
                                    </li>
                                </ul>
                                <?php
                            }
                            ?>
                        </div>
                        <!-- END TOPBAR LOGIN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END TOP BAR -->

        <!-- START HEADER -->
        <div id="header" class="group margin-bottom">

            <div class="group container">
                <div class="row" id="logo-headersidebar-container">
                    <!-- START LOGO -->
                    <div id="logo" class="span6 group">
                        <a id="logo-img" href="index.php" title="wePaint">
                            <img height="100" width="100" src="images/natdir.png" title="wePaint" alt="natural direct" />
                        </a>
                        <!-- title -->
                        <p id='tagline'><?php echo"$rowtitle[1]"; ?></p>
                    </div>
                    <!-- END LOGO -->
                    <!-- START HEADER SIDEBAR -->
                    <div id="header-sidebar" class="span6 group">
                        <div class="widget-first widget header-text-image">
                            <div class="text-image" style="text-align:left">
                                <img src="images/phone1.png" alt="CUSTOMER SUPPORT" />
                            </div>

                            <div class="text-content">
                                <h3>CUSTOMER SUPPORT</h3>
                                <p>+852 <?php echo"$rowtitle[2]"; ?></p>
                            </div>
                        </div>
                        <div class="widget-last widget widget_text">
                            <div class="textwidget">
                                <div class="socials-default-small facebook-small default">
                                    <a target="_blank" href="https://www.facebook.com/WePaint-950298961684277/" class="socials-default-small default facebook">facebook</a>
                                </div>

                                <div class="socials-default-small twitter-small default">
                                    <a href="https://twitter.com/HK_wePaint"target="_blank" class="socials-default-small default twitter">twitter</a>
                                </div>

                                <div class="socials-default-small flickr-small default">
                                    <a href="https://www.instagram.com/hkwepaint/"target="_blank" class="socials-default-small default instagram">Instagram</a>
                                </div>

                                <div class="socials-default-small pinterest-small default">
                                    <a href="https://www.pinterest.com/hkwepaint/"target="_blank" class="socials-default-small default pinterest">pinterest</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>