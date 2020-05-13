<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
session_start();
include_once '../includes/db_connection.php';
//get title from database
$query_title = "select title from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);
?>
<html>
    <head>
        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



        <title>Profile - <?php echo"$rowtitle[0]"; ?></title>

        <!-- RESET STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
        <!-- BOOTSTRAP STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css" />
        <!-- MAIN THEME STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="style.css" />

        <!-- [favicon] begin -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- [favicon] end -->

        <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
        <!-- For iPad3 with retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x.png">
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57x.png" />
        <link rel="stylesheet" type="text/css" href="css/button.css">

        <link rel='stylesheet' id='thickbox-css' href='js/thickbox/thickbox.css' type='text/css' media='all' />
        <link rel='stylesheet' id='google-fonts-css' href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
        <link rel='stylesheet' id='fontawesome-css' href='css/font-awesome.css' type='text/css' media='all' />
        <link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all' />
        <link rel='stylesheet' id='polaroid-slider-css' href='sliders/polaroid/css/polaroid.css' type='text/css' media='all' />
        <link rel='stylesheet' id='ahortcodes-css' href='css/shortcodes.css' type='text/css' media='all' />
        <link rel='stylesheet' id='contact-form-css' href='css/contact_form.css' type='text/css' media='all' />
        <link rel='stylesheet' id='blog-libra-big-css' href='blog/libra-big/css/style.css' type='text/css' media='all' />
        <link rel='stylesheet' id='custom-css' href='css/custom.css' type='text/css' media='all' />

        <style type="text/css">
            body {
                background-color: #ffffff;
                background-image: url('images/bg-pattern.png');
                background-repeat: repeat;
                background-position: top left;
                background-attachment: scroll;
            }
        </style>

        <script type='text/javascript' src='js/jquery/jquery.js'></script>


    </head>
    <body class="page no_js responsive stretched">
        <?php include_once 'db.php' ?>   
        <?php include_once 'shadow.php'; ?>
    </div>
    <div class="slogan">
        <h2>Profile</h2>
    </div>
    <!-- START PRIMARY -->

    <?php
    //update profile
    if (isset($_POST["Update"])) {
        $No = $_POST["No"];
        $pw = $_SESSION["pw"];
        $user = $_POST["username"];
        $icon = $_POST["icon"];
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $sql = "update user set icon ='" . $icon . "',username ='" . $user . "',name ='" . $name . "',gender ='" . $gender . "',address ='" . $address . "',tel ='" . $tel . "',email ='" . $email . "' where userID ='" . $No . "'";
        $resultsql = mysqli_query($conn, $sql);
        if ($resultsql) {
            echo "Edit Success!";
        }
        include 'form.php';
    }
    //update password
    else if (isset($_POST["Update_pwd"])) {
        $No = $_POST["No"];
        $pw = $_SESSION["pw"];
        $user = $_POST["username"];
        $npw = md5($_POST["n_password"]);
        $cpw = md5($_POST["c_password"]);
        $icon = $_POST["icon"];
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        if ($npw === $cpw) {
            $sql = "update user set password ='" . $npw . "' where userID ='" . $No . "'";
            $resultsql = mysqli_query($conn, $sql);
            $_SESSION["pw"] = $npw;
        } else {
            echo "<script>window.location.href='../error-404.php';</script>";
        }
        if ($resultsql) {
            echo "<script>alert('Password updated');</script>";
        }
        include 'form.php';
    }
    //change password
    elseif (isset($_POST["Edit_pwd"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $queryUser = "SELECT * from user";
        $resultUser = mysqli_query($conn, $queryUser);
        if (!$resultUser) {
            die("Database access failed: " . mysqli_error($conn));
        }
        $rowUser = mysqli_num_rows($resultUser);
        $numOfRecordUser = count($rowUser);
        $u = 0;
        while ($rowUser = mysqli_fetch_array($resultUser)) {
            if ($rowUser["username"] == $username && $rowUser["password"] == $password) {
                $No = $rowUser["userID"];
                $user = $rowUser["username"];
                $pw = $rowUser["password"];
                $name = $rowUser["name"];
                $gender = $rowUser["gender"];
                $address = $rowUser["address"];
                $tel = $rowUser["tel"];
                $email = $rowUser["email"];
                $icon = $rowUser["icon"];
                $login = "user";
                break;
            } elseif ($username == "admin" && $password == "admin") {
                $No = $rowUser["userID"];
                $user = $rowUser["username"];
                $pw = $rowUser["password"];
                $name = $rowUser["name"];
                $gender = $rowUser["gender"];
                $address = $rowUser["address"];
                $tel = $rowUser["tel"];
                $email = $rowUser["email"];
                $icon = $rowUser["icon"];
                $login = "admin";
                break;
            } else {
                $No = "fail";
                $user = "fail";
                $pw = "fail";
                $login = "fail";
                $name = "UNKNOWN USER";
            }
            $u++;
        }
        if ($user != "fail") {
            include 'edit_pwd.php';
        } else {
            echo "<center><h3>Login Fail</h3></center>";
            include 'login.php';
        }
    }
    //edit profile
    elseif (isset($_POST["Edit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $queryUser = "SELECT * from user";
        $resultUser = mysqli_query($conn, $queryUser);
        if (!$resultUser) {
            die("Database access failed: " . mysqli_error($conn));
        }
        $rowUser = mysqli_num_rows($resultUser);
        $numOfRecordUser = count($rowUser);
        $u = 0;
        while ($rowUser = mysqli_fetch_array($resultUser)) {
            if ($rowUser["username"] == $username && $rowUser["password"] == $password) {
                $No = $rowUser["userID"];
                $user = $rowUser["username"];
                $pw = $rowUser["password"];
                $name = $rowUser["name"];
                $gender = $rowUser["gender"];
                $address = $rowUser["address"];
                $tel = $rowUser["tel"];
                $email = $rowUser["email"];
                $icon = $rowUser["icon"];
                $login = "user";
                break;
            } elseif ($username == "admin" && $password == "admin") {
                $No = $rowUser["userID"];
                $user = $rowUser["username"];
                $pw = $rowUser["password"];
                $name = $rowUser["name"];
                $gender = $rowUser["gender"];
                $address = $rowUser["address"];
                $tel = $rowUser["tel"];
                $email = $rowUser["email"];
                $icon = $rowUser["icon"];
                $login = "admin";
                break;
            } else {
                $No = "fail";
                $user = "fail";
                $pw = "fail";
                $login = "fail";
                $name = "UNKNOWN USER";
            }
            $u++;
        }
        if ($user != "fail") {
            include 'edit.php';
        } else {
            echo "<center><h3>Login Fail</h3></center>";
            include 'login.php';
        }
    } elseif (isset($_SESSION["No"])) {
        $username = $_SESSION["user"];
        $password = $_SESSION["pw"];
        $queryUser = "SELECT * from user";
        $resultUser = mysqli_query($conn, $queryUser);
        if (!$resultUser) {
            die("Database access failed: " . mysqli_error($conn));
        }
        $rowUser = mysqli_num_rows($resultUser);
        $numOfRecordUser = count($rowUser);
        $u = 0;
        while ($rowUser = mysqli_fetch_array($resultUser)) {
            if ($rowUser["username"] == $username) {
                $No = $rowUser["userID"];
                $user = $rowUser["username"];
                $pw =  $rowUser["password"];
                $name = $rowUser["name"];
                $gender = $rowUser["gender"];
                $address = $rowUser["address"];
                $tel = $rowUser["tel"];
                $email = $rowUser["email"];
                $icon = $rowUser["icon"];
                $login = "user";
                break;
            } elseif ($username == "admin") {
                $No = $rowUser["userID"];
                $user = $rowUser["username"];
                   $pw =  $rowUser["password"];
                $name = $rowUser["name"];
                $gender = $rowUser["gender"];
                $address = $rowUser["address"];
                $tel = $rowUser["tel"];
                $email = $rowUser["email"];
                $icon = $rowUser["icon"];
                $login = "admin";
                break;
            } else {
                $No = "fail";
                $user = "fail";
                $pw = "fail";
                $login = "fail";
                $name = "UNKNOWN USER";
            }
            $u++;
        }
        if ($user != "fail") {
            include 'form.php';
        } else {
            echo "<center><h3>Login Fail</h3></center>";
            include 'login.php';
        }
    } else {
        include 'login.php';
    }
    ?>





    <!-- START FOOTER -->
    <?php include_once '../footer.php'; ?>
    <!-- ENDFOOTER -->

    <!-- START COPYRIGHT -->
    <?php include_once '../copyright.php'; ?>
    <!-- END COPYRIGHT -->

    <div class="wrapper-border"></div>

</div>
<!-- END WRAPPER -->

</div>
<!-- END BG SHADOW -->
<!-- END BG SHADOW -->

<script type='text/javascript' src='js/comment-reply.min.js'></script>
<script type='text/javascript' src='js/underscore.min.js'></script>
<script type='text/javascript' src='js/jquery/jquery.masonry.min.js'></script>
<script type='text/javascript' src='js/jquery.easing.js'></script>
<script type='text/javascript' src='js/hoverIntent.min.js'></script>
<script type='text/javascript' src='js/media-upload.min.js'></script>
<script type='text/javascript' src='js/jquery.clickout.min.js'></script>
<script type='text/javascript' src='js/responsive.js'></script>
<script type='text/javascript' src='js/mobilemenu.js'></script>
<script type='text/javascript' src='js/jquery.superfish.js'></script>
<script type='text/javascript' src='js/jquery.colorbox-min.js'></script>
<script type='text/javascript' src='js/jquery.placeholder.js'></script>
<script type='text/javascript' src='js/contact.js'></script>
<script type='text/javascript' src='js/jquery.tweetable.js'></script>
<script type='text/javascript' src='js/jquery.tipsy.js'></script>
<script type='text/javascript' src='js/jquery.cycle.min.js'></script>
<script type='text/javascript' src='js/shortcodes.js'></script>
<script type='text/javascript' src='js/jquery.custom.js'></script>
</body>
</html>
