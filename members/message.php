<?php
session_start();
include_once 'includes/db_connection.php';
require_once 'inc/fbConfig.php';
require_once 'inc/User.php';
date_default_timezone_set("Asia/Hong_Kong");
?>
<html>
    <?php
    include_once '../includes/db_connection.php';
    //get title from database
    $query_title = "select title from title where title_id = 1";
    $title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
    $rowtitle = mysqli_fetch_row($title_result);
    ?> 

    <head>
        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />
        <title>Email - <?php echo"$rowtitle[0]"; ?></title>

        <!-- RESET STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
        <!-- BOOTSTRAP STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css" />
        <!-- MAIN THEME STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="style.css" />
        <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
        <!-- [favicon] begin -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />

        <!-- styles -->

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
        <?php
        include("connect.php");
        ?>   
        <?php include_once 'shadow.php'; ?>
    </div>
    <div class="slogan">
        <h2>Members</h2>
    </div>
    <!-- START PRIMARY -->
<center>
    <?php
    if (isset($_SESSION["No"])||isset($_SESSION["fb_id"])) {
         if (isset($_SESSION["No"])){
        $queryUser = "SELECT * from email WHERE senderID = '" . $_SESSION["No"] . "' ORDER BY date";
         }elseif(isset($_SESSION["fb_id"])){
         $queryUser = "SELECT * from email WHERE senderID = '" . $_SESSION["fb_id"] . "' ORDER BY date";
         }
        $resultUser = mysqli_query($conn, $queryUser);
        if (!$resultUser) {
            die("Database access failed: " . mysqli_error($conn));
        }
        $rowUser = mysqli_num_rows($resultUser);
        $numOfRecordUser = count((is_countable($rowUser)?$rowUser:[]));
        $u = 1;
        echo "Your Personal Email";
        echo "<table border='2' width='800'>";
        echo "<tr><td><b>No.</b></td><td><b>Date</b></td><td><b>Topic</b></td><td><b>Sender</b></td></tr>";
        while ($rowUser = mysqli_fetch_array($resultUser)) {
            $emailID = $rowUser["emailID"];
            $userID = $rowUser["senderID"];
            $topic = $rowUser["topic"];
            $content = $rowUser["content"];
            $date = $rowUser["date"];
            $senderID = $rowUser["userID"];
            echo " <form action=\"read.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"u\" value=\"$u\"/>";
            echo "<input type=\"hidden\" name=\"emailID\" value=\"$emailID\"/>";
            echo "<input type=\"hidden\" name=\"userID\" value=\"$userID\"/>";
            echo "<input type=\"hidden\" name=\"topic\" value=\"$topic\"/>";
            echo "<input type=\"hidden\" name=\"content\" value=\"$content\"/>";
            echo "<input type=\"hidden\" name=\"date\" value=\"$date\"/>";
            echo "<input type=\"hidden\" name=\"senderID\" value=\"$senderID\"/>";
            echo "<tr><td>";
            echo "<input class=\"btn btn-info\" type=\"submit\" name=\"read\" value=\"$u\"/>";
            echo "</form></td>";
            echo "</td><td>$date</td><td>$topic</td><td>$senderID</td></tr>";
            $u++;
        }
        echo "</table>";
        echo " <form action=\"message.php\" method=\"post\">";
        echo "<input class=\"btn btn-success\" type=\"submit\" name=\"send\" value=\"Send Email\"/></form>";
        if (isset($_POST["send"])) {
             if (isset($_SESSION["No"])){
         $userID = $_SESSION["No"];
         }elseif(isset($_SESSION["fb_id"])){
          $userID = $_SESSION["fb_id"];
         }
            echo " <form action=\"message.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"userID\" value=\"$userID\"/>";
            ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Topic </label>
                            <input class="form-control" type="text" name="topic" placeholder="The Title of the email"  style="width:70%;" required />
                        </div>
                        <div class="form-group">
                            <label>SenderID </label>
                            <input class="form-control" type="text" name="senderID" placeholder="The userID you want to send"  style="width:70%;" required />
                        </div>
                        <?php
                        if (isset($_POST["senderID"])) {
                            echo " value=\"" . $_POST["senderID"] . "\" ";
                        }
                        ?>
                        <div>
                            <label>Content: </label>
                            <textarea id="tinymce_basic" name="content" rows="15" style="width:70%;" ></textarea>
                        </div>
                        <br>
                        <?php
                        echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"confirm\" value=\"Confirm\"/></form>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST["confirm"])) {
            $date = date("d/m/Y");
            $topic = $_POST["topic"];
            $content = $_POST["content"];
            $senderID = $_POST["senderID"];
            $userID = $_POST["userID"];
            $send = "INSERT INTO email  VALUES('','$userID','$topic','$content','$date','$senderID') ";
            $resultQ = mysqli_query($conn,$send) or die(mysqli_error($conn));
            if ($send) {
                echo "Send successfully!";
            }
        }
        echo "<a href='../index.php'>Back</a>";
    } else {
        echo "<center><h3>Login Fail</h3></center>";
        include 'login.php';
    }
    ?>
</center>




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
<script src="../admin/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
