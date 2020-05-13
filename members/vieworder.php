<?php
session_start();
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



        <title>Order - <?php echo"$rowtitle[0]"; ?></title>

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
    if (isset($_SESSION["No"]) || isset($_SESSION["fb_id"])) {
         if (isset($_SESSION["No"])){
                $No = $_SESSION['No'];
                }elseif (isset ($_SESSION["fb_id"])) {
                $No = $_SESSION['fb_id'];
            }
        if (isset($_GET["service"])) {
            $code1 = $_GET["code"];
            $date = date("d/m/Y");
            $item_total = $_GET['item_total'];
            $order = "INSERT INTO service_order VALUES('','$code1','$No','$item_total','$date') ";
            $resultQ = mysql_query($order) or die(mysql_error());
            if ($order) {
                echo "Order successfully!<br>";
            }
        }
        if (isset($_POST["cancel"])) {
            $queryCancel = "DELETE from product_order WHERE porderID = '" . $_POST["porderID"] . "'";
            $resultCancel = mysqli_query($conn, $queryCancel);
            if (!$resultCancel) {
                die("Database access failed: " . mysqli_error($conn));
            }
        }
        if (isset($_POST["cancelS"])) {
            $queryCancel = "DELETE from service_order WHERE pserviceID = '" . $_POST["pserviceID"] . "'";
            $resultCancel = mysqli_query($conn, $queryCancel);
            if (!$resultCancel) {
                die("Database access failed: " . mysqli_error($conn));
            }
        }
        $start = 0;
        $limit = 4;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $start = ($id - 1) * $limit;
        } else {
            $id = 1;
        }
        $queryUser = "SELECT * from product_order o,product p WHERE p.code = o.productCode AND o.userID = '" . $No . "' ORDER BY date LIMIT $start,$limit";
        $queryS = "SELECT * from service_order o,service p WHERE p.code = o.serviceCode AND o.userID = '" . $No . "' ORDER BY date LIMIT $start,$limit";

        $resultUser = mysqli_query($conn, $queryUser);
        if (!$resultUser) {
            die("Database access failed: " . mysqli_error($conn));
        }
        $resultS = mysqli_query($conn, $queryS);
        if (!$resultS) {
            die("Database access failed: " . mysqli_error($conn));
        }
        $rowS = mysqli_num_rows($resultS);
        $rowUser = mysqli_num_rows($resultUser);
        $numOfRecordUser = count($rowUser);
        $numOfRecordS = count($rowS);
        $u = 0;
        $realtotal = 0;
        echo "Your Order";
        echo "<table border='0'>";
        $count = 1;
        while ($rowS = mysqli_fetch_array($resultS)) {
            if ($count % 4 == 1) {
                echo "<tr>";
            }
            $pserviceID = $rowS["pserviceID"];
            $serviceCode = $rowS["serviceCode"];
            $userID = $rowS["userID"];
            $total = $rowS["total"];
            $date = $rowS["date"];
            $price = $rowS["price"];
            $serviceUrl = $rowS["serviceUrl"];
            $realtotal += $total;
            echo "<td>";
            echo "<img src=\"$serviceUrl\" width=\"200\" height=\"200\">";
            echo "<br><b>subtotal:   $total";
            echo "<form method=\"POST\" action=\"vieworder.php\">";
            echo "<input type=\"hidden\" name=\"pserviceID\" value=\"$pserviceID\"/>";
            echo "<input type=\"submit\" name=\"cancelS\" value=\"Cancel\"/></form>";
            echo "</b>";
            echo "</td>";
            if ($count % 4 == 0) {
                echo "</tr>";
            }
            $count++;
        }
        while ($rowUser = mysqli_fetch_array($resultUser)) {
            if ($count % 4 == 1) {
                echo "<tr>";
            }
            $porderID = $rowUser["porderID"];
            $productCode = $rowUser["productCode"];
            $quantity = $rowUser["quantity"];
            $userID = $rowUser["userID"];
            $total = $rowUser["total"];
            $date = $rowUser["date"];
            $price = $rowUser["price"];
            $productUrl = $rowUser["productUrl"];
            $realtotal += $total;
            echo "<td>";
            echo "<img src=\"$productUrl\" width=\"200\" height=\"200\">";
            echo "<br>x       " . $quantity;
            echo "<b>subtotal:   $total";
            echo "<form method=\"POST\" action=\"vieworder.php\">";
            echo "<input type=\"hidden\" name=\"porderID\" value=\"$porderID\"/>";
            echo "<input type=\"submit\" name=\"cancel\" value=\"Cancel\"/></form>";
            echo "</b>";
            echo "</td>";
            if ($count % 4 == 0) {
                echo "</tr>";
            }
            $count++;
        }
        echo "</table>";
        echo "<b>Total:  $realtotal</b><br>";
        ?>
        <?php
        $roww = mysql_num_rows(mysql_query("select * from product_order WHERE userID = '" . $No . "'"));
        $rowse = mysql_num_rows(mysql_query("select * from service_order WHERE userID = '" . $No . "'"));
        $totalrow = $roww + $rowse;
        $totall = ceil($totalrow / $limit);
        echo "<br />";
        if ($id > 1) {
            echo "<center><a style='color:white;background-color : #033c73;' href='?id=" . ($id - 1) . "'>Previous Page</a></center><br>";
        }
        if ($id != $totall) {
            echo "<center><a style='color:white;background-color : #033c73;' href='?id=" . ($id + 1) . "'>Next Page</a></center><br>";
        }


        echo "<center>";
        for ($i = 1; $i <= $totall; $i++) {
            if ($i == $id) {
                echo "<button style='color:white;background-color : #033c73;'><a>" . $i . "</a></button>";
            } else {
                echo "<button class='button'><a href='?id=" . $i . "'>" . $i . "</a></button>";
            }
        }
        echo "</center>";
        ?>
        <?php
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
</body>
</html>
