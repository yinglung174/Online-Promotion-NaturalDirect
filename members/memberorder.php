<!DOCTYPE html>
<?php
session_start();
date_default_timezone_set("Asia/Hong_Kong");
include("connect.php");
include_once '../includes/db_connection.php';
//get title from database
$query_title = "select title from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);
?>
<?php
if (isset($_GET["order"]) && !empty($_GET["order"])) {
     if (isset($_SESSION["No"])){
                $No = $_SESSION['No'];
                }elseif (isset ($_SESSION["fb_id"])) {
                $No = $_SESSION['fb_id'];
            }
    $date = date("d/m/Y");
    $code1 = $_GET['code1'];
    $num = $_GET['num'];
    $item_total = $_GET['item_total'];
    $order = "INSERT INTO product_order VALUES('','$code1','$num','$No','$item_total','$date') ";
    $resultQ = mysql_query($order) or die(mysql_error());
    if ($order) {
        echo "<script>alert('Order Successfully');window.location.href='vieworder.php';</script>";
        unset($_SESSION['carts'][$code1]);
    }
}
// check if action is set and not empty
if (isset($_GET["action"]) && !empty($_GET["action"])) {

    if (!isset($_SESSION['carts'])) {
        $_SESSION['carts'] = array();
    }
    $action = $_GET["action"];
    switch ($action) { //decide what to do 
        case "add":
            // get the code from  input form using $_GET
            $code = $_GET["code"];
            // get the quantity from the input form using $_GET
            $quantity = $_GET["quantity"];
            if (!isset($_SESSION['carts'][$code])) {
                $_SESSION['carts'][$code] = "0";
            }
            // add the quantity of the product with id $code 
            $_SESSION['carts'][$code] += $quantity;
            break;

        case "remove":
            // get the code from  input form using $_GET
            $code = $_GET["code"];
            // get the quantity from the input form using $_GET
            $quantity = $_GET["quantity"];
            // remove  from the quantity of the product with id $code
            // if the quantity less than zero, remove it completely (using the 'unset' function) 
            // - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 

            $_SESSION['carts'][$code] -= $quantity;


            if ($_SESSION['carts'][$code] < 1) {
                unset($_SESSION['carts'][$code]);
            }
            break;
    }
}
?>
<html>

    <head>
        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



        <title>Shopping Cart - <?php echo"$rowtitle[0]";?></title>

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
        $query = "SELECT * FROM product ORDER BY productID ASC";
        // execute the query 
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $code = $row["code"];
            // created an associative array.
            // the key is the $code and value is detail of details row
            $product_array [$code] = $row;
        }
        ?>
        <?php include_once 'shadow.php'; ?>
    </div>
    <div class="slogan">
        <h2>Members</h2>
    </div>
    <!-- START PRIMARY -->
<center>
    <?php
    if (isset($_SESSION['No'])||isset($_SESSION['fb_id'])) {
        if (isset($_SESSION['carts']) && !empty($_SESSION['carts'])) {
            $carts = $_SESSION['carts'];
            $item_total = "0";
            echo "<div style=\"border: 1px dotted red; width: 450px; margin: 5px; padding:5px\">";
            echo "<h2>Your shopping cart contain the following item:<br></h2>";

            // use foreach to print out each elements in the $carts 
            // code and quantity
            foreach ($carts as $code1 => $num) {
                ?>

                <form method="GET" action="memberorder.php">
                    <img src="<?php echo $product_array[$code1]["productUrl"]; ?>" width="100" height="100">
                    <?php
                    echo "x       " . $num;
                    echo "<input type=\"hidden\" name=\"code\" value=\"$code1\"/>";
                    $item_total = ($product_array[$code1]["price"] * $num);
                    echo "<b>subtotal:   $item_total</b>";
                    ?>
                    <input type="hidden" name="code1" value="<?php echo $code1; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $num; ?>"/>
                    <input type="hidden" name="item_total" value="<?php echo $item_total; ?>"/>
                    <input type="hidden" name="action" value="remove"/>
                    <input type="text" name="quantity" value="1" size="2" />
                    <input type="submit" value="remove"/><br>
                    <input type="submit" name="order" value="order"/>
                </form>

                <?php
            }
            echo "<a href='../product.php'>Back</a>";
            echo "</div>";
        }
    } else {
        echo "<center>Please Login First!</center><br>";
    }
    echo "<a href='../index.php'>Back</a>";
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
