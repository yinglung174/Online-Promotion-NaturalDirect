<?php session_start();
?>
<?php
include 'db.php';
include("connect.php");
date_default_timezone_set("Asia/Hong_Kong");
$date = date("d/m/Y");
?>  
<html>
    <head>
        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



        <title>wePaint | Natural Direct Co. Ltd</title>
         
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

        <?php include_once 'shadow.php'; ?>
    </div>
    <div class="slogan">
        <h2>Members</h2>
    </div>
    <!-- START PRIMARY -->
<center>
        <?php
        if (isset($_SESSION["No"])) {
            if ($_SESSION["No"] == "U00000") {
                $tableNameU = "user";
                $queryU = "SELECT * from $tableNameU ORDER BY userID ASC";
                $resultU = mysqli_query($conn, $queryU);
                if (!$resultU) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowU = mysqli_num_rows($resultU);
                $numOfRecordU = count($rowU);
                $iU = 0;
                if (isset($_POST["DeleteUser"])) {
                    $userID = $_POST["userID"];
                    $sql = "DELETE FROM user WHERE userID = '$userID'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - UserID:$userID</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditUser"])) {
                    $userID = $_POST["userID"];
                    $icon = $_POST["icon"];
                    $name = $_POST["name"];
                    $gender = $_POST["gender"];
                    $birth = $_POST["birth"];
                    $address = $_POST["address"];
                    $tel = $_POST["tel"];
                    $mail = $_POST["mail"];
                    $username = $_POST["username"];
                    $password = md5($_POST["password"]);
                    $sql = "update user set icon='" . $icon . "',name='" . $name .
                            "',email='" . $mail . "',tel='" . $tel . "',gender='"
                            . $gender . "',brithday='" . $birth . "',address='" . $address . "',username='"
                            . $username . "',password='" . $password . "' where userID='" . $userID . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - UserID :$userID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Name</td><td>$name</td></tr>";
                        echo"<tr><td>Gender</td><td>$gender</td></tr>";
                        echo"<tr><td>Email</td><td>$mail</td></tr>";
                        echo"<tr><td>telNo.</td><td>$tel</td></tr>";
                        echo"<tr><td>Birth Date</td><td>$birth</td></tr>";
                        echo"<tr><td>Address</td><td>$address</td></tr>";
                        echo"<tr><td>Icon</td><td><img src=\"$icon\" width=\"100\" height=\"100\" /></td></tr>";
                        echo"<tr><td>Username</td><td>$username</td></tr>";
                        echo"<tr><td>Password</td><td>$password</td></tr></table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
                    }
                }
                if (isset($_POST["EditUser"])) {
                    $userID = $_POST["userID"];
                    $icon = $_POST["icon"];
                    $name = $_POST["name"];
                    $gender = $_POST["gender"];
                    $birth = $_POST["birth"];
                    $address = $_POST["address"];
                    $tel = $_POST["tel"];
                    $mail = $_POST["mail"];
                    $username = $_POST["username"];
                    $password = md5($_POST["password"]);
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"userID\" value=\"$userID\" ></td></tr>";
                    echo "<tr><td>Icon</td><td><input type=\"text\" name=\"icon\" value=\"$icon\" ></td></tr>";
                    echo "<tr><td>Name</td><td><input type=\"text\" name=\"name\" value=\"$name\" ></td></tr>";
                    echo "<tr><td>Gender</td><td>M<input type=\"radio\" name=\"gender\" value=\"M\"";
                    if (isset($gender) && $gender == "M") {
                        echo "checked";
                    }
                    echo">F<input type=\"radio\" name=\"gender\" value=\"F\"";
                    if (isset($gender) && $gender == "F") {
                        echo "checked";
                    }echo"></td></tr>";
                    echo "<tr><td>Birth Date</td><td><input type=\"text\" name=\"birth\" value=\"$birth\" ></td></tr>";
                    echo "<tr><td>Address</td><td><input type=\"text\" name=\"address\" value=\"$address\" ></td></tr>";
                    echo "<tr><td>Tel.No</td><td><input type=\"text\" name=\"tel\" value=\"$tel\" ></td></tr>";
                    echo "<tr><td>Email</td><td><input type=\"text\" name=\"mail\" value=\"$mail\" ></td></tr>";
                    echo "<tr><td>Username</td><td><input type=\"text\" name=\"username\" value=\"$username\" ></td></tr>";
                    echo "<tr><td>Password</td><td><input type=\"text\" name=\"password\" value=\"$password\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditUser\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
                }
                if (isset($_POST["createUser"])) {
                    while ($rowU = mysqli_fetch_array($resultU)) {
                        if ($_POST["username"] != $rowU["username"] && $_POST["username"] != NULL) {
                            $usernameU = $_POST["username"];
                        } else {
                            echo "<center>username is repeated or null! Please create again!";
                            echo "<a href='members.php'>Back</a></center>";
                            $usernameU = NULL;
                            break;
                        }
                        $iU += 1;
                    }
                    if ($usernameU != NULL) {
                        $userIDUtemp = $iU + 1;
                        $userIDU = "U" . $userIDUtemp;
                        $icon = $_POST["icon"];
                        $name = $_POST["name"];
                        $gender = $_POST["gender"];
                        $birth = $_POST["birth"];
                        $address = $_POST["address"];
                        $tel = $_POST["tel"];
                        $mail = $_POST["mail"];
                        $password = md5($_POST["password"]);
                        $sql = "INSERT INTO user VALUES('$userIDU','$icon','$usernameU','$password','$name','$gender','$address','$tel','$mail','0','$birth','$date') ";
                        $result = mysql_query($sql) or die(mysql_error());
                        if ($sql) {
                            echo" <center>Create Success - UserID :$userIDU</center>";
                            echo"<center><table border=\"1\">";
                            echo"<tr><td>UserID</td><td>$userIDU</td></tr>";
                            echo"<tr><td>Name</td><td>$name</td></tr>";
                            echo"<tr><td>Gender</td><td>$gender</td></tr>";
                            echo"<tr><td>Email</td><td>$mail</td></tr>";
                            echo"<tr><td>telNo.</td><td>$tel</td></tr>";
                            echo"<tr><td>Birth Date</td><td>$birth</td></tr>";
                            echo"<tr><td>Address</td><td>$address</td></tr>";
                            echo"<tr><td>Icon</td><td><img src=\"$icon\" width=\"100\" height=\"100\" /></td></tr>";
                            echo"<tr><td>Username</td><td>$usernameU</td></tr>";
                            echo"<tr><td>Password</td><td>$password</td></tr></table></center>";
                            echo "<center><form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
                        }
                    }
                }
                if (isset($_POST["searchUser"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                    $querySearch = "SELECT * from user WHERE $type LIKE '%" . $keyword . "%'";
                    $resultSearch = mysqli_query($conn, $querySearch);
                    if (!$resultSearch) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"name\">Name</option>";
                        echo "<option value=\"gender\">Gender</option>";
                        echo "<option value=\"brithday\">Birth Date</option>";
                        echo "<option value=\"address\">Address</option>";
                        echo "<option value=\"tel\">Tel.No</option>";
                        echo "<option value=\"email\">Email</option>";
                        echo "<option value=\"username\">Username</option>";
                        echo "<option value=\"registerDate\">Register Date</option>";
                        echo "<option value=\"mark\">Mark</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchUser\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>UserID</td><td>Icon</td><td>Name</td><td>Gender</td><td>Birth Date</td><td>Tel.No</td><td>Address</td><td>Email</td><td>Username</td><td>Password</td><td>Mark</td><td>Register Date</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["userID"] . "</td><td><img src='" . $rowS["icon"] . "' width='75' height='75' /></td><td>" . $rowS["name"] . "</td><td>" . $rowS["gender"] . "</td><td>" . $rowS["brithday"] . "</td><td>" . $rowS["address"] . "</td><td>" . $rowS["tel"] . "</td><td>" . $rowS["email"] . "</td><td>" . $rowS["username"] . "</td><td>" . $rowS["password"] . "</td><td>" . $rowS["mark"] . "</td><td>" . $rowS["registerDate"] . "</td>";
                            echo "<form action=\"message.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"senderID\" value=\"" . $rowS["userID"] . "\">";
                            echo "<td><input type=\"submit\" name=\"send\" value=\"Mail\"></td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowS["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"icon\" value=\"" . $rowS["icon"] . "\">";
                            echo "<input type=\"hidden\" name=\"name\" value=\"" . $rowS["name"] . "\">";
                            echo "<input type=\"hidden\" name=\"gender\" value=\"" . $rowS["gender"] . "\">";
                            echo "<input type=\"hidden\" name=\"birth\" value=\"" . $rowS["brithday"] . "\">";
                            echo "<input type=\"hidden\" name=\"address\" value=\"" . $rowS["address"] . "\">";
                            echo "<input type=\"hidden\" name=\"tel\" value=\"" . $rowS["tel"] . "\">";
                            echo "<input type=\"hidden\" name=\"mail\" value=\"" . $rowS["email"] . "\">";
                            echo "<input type=\"hidden\" name=\"username\" value=\"" . $rowS["username"] . "\">";
                            echo "<input type=\"hidden\" name=\"password\" value=\"" . $rowS["password"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditUser\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteUser\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
                    }
                }
                if (isset($_POST["submitUser"])) {
                    $user = $_POST["handleuser"];
                    if ($user == "create") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Icon</td><td><input type=\"text\" name=\"icon\" ></td></tr>";
                        echo "<tr><td>Name</td><td><input type=\"text\" name=\"name\" ></td></tr>";
                        echo "<tr><td>Gender</td><td>M<input type=\"radio\" name=\"gender\" value=\"M\">F<input type=\"radio\" name=\"gender\" value=\"F\"></td></tr>";
                        echo "<tr><td>Birth Date</td><td><input type=\"text\" name=\"birth\" ></td></tr>";
                        echo "<tr><td>Address</td><td><input type=\"text\" name=\"address\" ></td></tr>";
                        echo "<tr><td>Tel.No</td><td><input type=\"text\" name=\"tel\" ></td></tr>";
                        echo "<tr><td>Email</td><td><input type=\"text\" name=\"mail\" ></td></tr>";
                        echo "<tr><td>Username</td><td><input type=\"text\" name=\"username\" ></td></tr>";
                        echo "<tr><td>Password</td><td><input type=\"text\" name=\"password\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createUser\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($user == "view" || $user == "edit" || $user == "delete") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"name\">Name</option>";
                        echo "<option value=\"gender\">Gender</option>";
                        echo "<option value=\"brithday\">Birth Date</option>";
                        echo "<option value=\"address\">Address</option>";
                        echo "<option value=\"tel\">Tel.No</option>";
                        echo "<option value=\"email\">Email</option>";
                        echo "<option value=\"username\">Username</option>";
                        echo "<option value=\"registerDate\">Register Date</option>";
                        echo "<option value=\"mark\">Mark</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchUser\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>UserID</td><td>Icon</td><td>Name</td><td>Gender</td><td>Birth Date</td><td>Tel.No</td><td>Address</td><td>Email</td><td>Username</td><td>Password</td><td>Mark</td><td>Register Date</td></tr>";
                        while ($rowU = mysqli_fetch_array($resultU)) {
                            echo "<tr><td>" . $rowU["userID"] . "</td><td><img src='" . $rowU["icon"] . "' width='75' height='75' /></td><td>" . $rowU["name"] . "</td><td>" . $rowU["gender"] . "</td><td>" . $rowU["brithday"] . "</td><td>" . $rowU["address"] . "</td><td>" . $rowU["tel"] . "</td><td>" . $rowU["email"] . "</td><td>" . $rowU["username"] . "</td><td>" . $rowU["password"] . "</td><td>" . $rowU["mark"] . "</td><td>" . $rowU["registerDate"] . "</td>";
                            echo "<form action=\"message.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"senderID\" value=\"" . $rowU["userID"] . "\">";
                            echo "<td><input type=\"submit\" name=\"send\" value=\"Mail\"></td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowU["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"icon\" value=\"" . $rowU["icon"] . "\">";
                            echo "<input type=\"hidden\" name=\"name\" value=\"" . $rowU["name"] . "\">";
                            echo "<input type=\"hidden\" name=\"gender\" value=\"" . $rowU["gender"] . "\">";
                            echo "<input type=\"hidden\" name=\"birth\" value=\"" . $rowU["brithday"] . "\">";
                            echo "<input type=\"hidden\" name=\"address\" value=\"" . $rowU["address"] . "\">";
                            echo "<input type=\"hidden\" name=\"tel\" value=\"" . $rowU["tel"] . "\">";
                            echo "<input type=\"hidden\" name=\"mail\" value=\"" . $rowU["email"] . "\">";
                            echo "<input type=\"hidden\" name=\"username\" value=\"" . $rowU["username"] . "\">";
                            echo "<input type=\"hidden\" name=\"password\" value=\"" . $rowU["password"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditUser\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteUser\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
                    }
                }
                if (isset($_POST["user"])) {
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "User Management <select name=\"handleuser\">";
                    echo "<option value=\"create\">Create User</option>";
                    echo "<option value=\"view\">View User</option>";
                    echo "<option value=\"edit\">Edit User</option>";
                    echo "<option value=\"delete\">Delete User</option>";
                    echo "</select><br />";
                    echo "<input type=\"submit\" name=\"submitUser\" value=\"submit\">";
                    echo "</form></center>";
                }
                $tableNameP = "product";
                $queryP = "SELECT * from $tableNameP ORDER BY productID ASC";
                $resultP = mysqli_query($conn, $queryP);
                if (!$resultP) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowP = mysqli_num_rows($resultP);
                $numOfRecordP = count($rowP);
                $iP = 0;
                if (isset($_POST["DeleteProduct"])) {
                    $productID = $_POST["productID"];
                    $sql = "DELETE FROM product WHERE productID = '$productID'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - ProductID:$productID</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditProduct"])) {
                    $productID = $_POST["productID"];
                    $price = $_POST["price"];
                    $productUrl = $_POST["productUrl"];
                    $code = $_POST["code"];
                    $productName = $_POST["productName"];
                    $description = $_POST["description"];
                    $sql = "update product set productID='" . $productID . "',price='" . $price .
                            "',productUrl='" . $productUrl . "',code='" . $code . "',productName='"
                            . $productName . "',description='" . $description . "'  where productID='" . $productID . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - ProductID :$productID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>UserID</td><td>$productID</td></tr>";
                        echo"<tr><td>Name</td><td>$productName</td></tr>";
                        echo"<tr><td>Code</td><td>$code</td></tr>";
                        echo"<tr><td>Description</td><td>$description</td></tr>";
                        echo"<tr><td>Price</td><td>$price</td></tr>";
                        echo"<tr><td>Url</td><td><img src=\"$productUrl\" width=\"100\" height=\"100\" /></td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                    }
                }
                if (isset($_POST["EditProduct"])) {
                    $productID = $_POST["productID"];
                    $price = $_POST["price"];
                    $productUrl = $_POST["productUrl"];
                    $code = $_POST["code"];
                    $productName = $_POST["productName"];
                    $description = $_POST["description"];
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"productID\" value=\"$productID\" ></td></tr>";
                    echo "<tr><td>Name</td><td><input type=\"text\" name=\"productName\" value=\"$productName\" ></td></tr>";
                    echo "<tr><td>Code</td><td><input type=\"text\" name=\"code\" value=\"$code\" ></td></tr>";
                    echo "<tr><td>Url</td><td><input type=\"text\" name=\"productUrl\" value=\"$productUrl\" ></td></tr>";
                    echo "<tr><td>Description</td><td><input type=\"text\" name=\"description\" value=\"$description\" ></td></tr>";
                    echo "<tr><td>Price</td><td><input type=\"text\" name=\"price\" value=\"$price\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditProduct\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                }
                if (isset($_POST["createProduct"])) {
                    $price = $_POST["price"];
                    $productUrl = $_POST["productUrl"];
                    $code = $_POST["code"];
                    $productName = $_POST["productName"];
                    $description = $_POST["description"];
                    $sql = "INSERT INTO product VALUES('','$price','$productUrl','$code','$productName','$description') ";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($rowP = mysqli_fetch_array($resultP)) {
                        $productID = $rowP["productID"];
                    }
                    $productID += 1;
                    if ($sql) {
                        echo" <center>Create Success - ProductID :$productID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>ProductID</td><td>$productID</td></tr>";
                        echo"<tr><td>Name</td><td>$productName</td></tr>";
                        echo"<tr><td>Code</td><td>$code</td></tr>";
                        echo"<tr><td>Description</td><td>$description</td></tr>";
                        echo"<tr><td>Url</td><td><img src=\"$productUrl\" width=\"100\" height=\"100\" /></td></tr>";
                        echo"<tr><td>Price</td><td>$price</td></tr>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                    }
                }
                if (isset($_POST["searchProduct"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                    $querySearch = "SELECT * from product WHERE $type LIKE '%" . $keyword . "%'";
                    $resultSearch = mysqli_query($conn, $querySearch);
                    if (!$resultSearch) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"productID\">ProductID</option>";
                        echo "<option value=\"productName\">Name</option>";
                        echo "<option value=\"code\">Code</option>";
                        echo "<option value=\"price\">Price</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchProduct\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ProductID</td><td>Name</td><td>Code</td><td>Url</td><td>Description</td><td>Price</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["productID"] . "</td><td>" . $rowS["productName"] . "</td><td>" . $rowS["code"] . "</td><td><img src='" . $rowS["productUrl"] . "' width='75' height='75' /></td><td>" . $rowS["description"] . "</td><td>" . $rowS["price"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"productID\" value=\"" . $rowS["productID"] . "\">";
                            echo "<input type=\"hidden\" name=\"productName\" value=\"" . $rowS["productName"] . "\">";
                            echo "<input type=\"hidden\" name=\"code\" value=\"" . $rowS["code"] . "\">";
                            echo "<input type=\"hidden\" name=\"productUrl\" value=\"" . $rowS["productUrl"] . "\">";
                            echo "<input type=\"hidden\" name=\"description\" value=\"" . $rowS["description"] . "\">";
                            echo "<input type=\"hidden\" name=\"price\" value=\"" . $rowS["price"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditProduct\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteProduct\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                    }
                }
                if (isset($_POST["submitProduct"])) {
                    $product = $_POST["handleproduct"];
                    if ($product == "create") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Url</td><td><input type=\"text\" name=\"productUrl\" ></td></tr>";
                        echo "<tr><td>Name</td><td><input type=\"text\" name=\"productName\" ></td></tr>";
                        echo "<tr><td>Code</td><td><input type=\"text\" name=\"code\" ></td></tr>";
                        echo "<tr><td>Description</td><td><input type=\"text\" name=\"description\" ></td></tr>";
                        echo "<tr><td>Price</td><td><input type=\"text\" name=\"price\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createProduct\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($product == "view" || $product == "edit" || $product == "delete") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"productID\">ProductID</option>";
                        echo "<option value=\"productName\">Name</option>";
                        echo "<option value=\"code\">Code</option>";
                        echo "<option value=\"price\">Price</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchProduct\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ProductID</td><td>Name</td><td>Code</td><td>Url</td><td>Description</td><td>Price</td></tr>";
                        while ($rowP = mysqli_fetch_array($resultP)) {
                            echo "<tr><td>" . $rowP["productID"] . "</td><td>" . $rowP["productName"] . "</td><td>" . $rowP["code"] . "</td><td><img src='" . $rowP["productUrl"] . "' width='75' height='75' /></td><td>" . $rowP["description"] . "</td><td>" . $rowP["price"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"productID\" value=\"" . $rowP["productID"] . "\">";
                            echo "<input type=\"hidden\" name=\"productName\" value=\"" . $rowP["productName"] . "\">";
                            echo "<input type=\"hidden\" name=\"code\" value=\"" . $rowP["code"] . "\">";
                            echo "<input type=\"hidden\" name=\"productUrl\" value=\"" . $rowP["productUrl"] . "\">";
                            echo "<input type=\"hidden\" name=\"description\" value=\"" . $rowP["description"] . "\">";
                            echo "<input type=\"hidden\" name=\"price\" value=\"" . $rowP["price"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditProduct\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteProduct\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                    }
                }
                if (isset($_POST["product"])) {
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "Product Management <select name=\"handleproduct\">";
                    echo "<option value=\"create\">Create Product</option>";
                    echo "<option value=\"view\">View Product</option>";
                    echo "<option value=\"edit\">Edit Product</option>";
                    echo "<option value=\"delete\">Delete Product</option>";
                    echo "</select><br />";
                    echo "<input type=\"submit\" name=\"submitProduct\" value=\"submit\">";
                    echo "</form></center>";
                }
                $tableNameSE = "service";
                $querySE = "SELECT * from $tableNameSE ORDER BY serviceID ASC";
                $resultSE = mysqli_query($conn, $querySE);
                if (!$resultSE) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowSE = mysqli_num_rows($resultSE);
                $numOfRecordSE = count($rowSE);
                $iSE = 0;
                if (isset($_POST["DeleteService"])) {
                    $serviceID = $_POST["serviceID"];
                    $sql = "DELETE FROM service WHERE serviceID = '$serviceID'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - ServiceID:$serviceID</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditService"])) {
                    $serviceID = $_POST["serviceID"];
                    $price = $_POST["price"];
                    $serviceUrl = $_POST["serviceUrl"];
                    $code = $_POST["code"];
                    $serviceName = $_POST["serviceName"];
                    $description = $_POST["description"];
                    $sql = "update service set serviceID='" . $serviceID . "',price='" . $price .
                            "',serviceUrl='" . $serviceUrl . "',code='" . $code . "',serviceName='"
                            . $serviceName . "',description='" . $description . "'  where serviceID='" . $serviceID . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - ServiceID :$serviceID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>ServiceID</td><td>$serviceID</td></tr>";
                        echo"<tr><td>Name</td><td>$serviceName</td></tr>";
                        echo"<tr><td>Code</td><td>$code</td></tr>";
                        echo"<tr><td>Description</td><td>$description</td></tr>";
                        echo"<tr><td>Price</td><td>$price</td></tr>";
                        echo"<tr><td>Url</td><td><img src=\"$serviceUrl\" width=\"100\" height=\"100\" /></td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                    }
                }
                if (isset($_POST["EditService"])) {
                    $serviceID = $_POST["serviceID"];
                    $price = $_POST["price"];
                    $serviceUrl = $_POST["serviceUrl"];
                    $code = $_POST["code"];
                    $serviceName = $_POST["serviceName"];
                    $description = $_POST["description"];
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"serviceID\" value=\"$serviceID\" ></td></tr>";
                    echo "<tr><td>Name</td><td><input type=\"text\" name=\"serviceName\" value=\"$serviceName\" ></td></tr>";
                    echo "<tr><td>Code</td><td><input type=\"text\" name=\"code\" value=\"$code\" ></td></tr>";
                    echo "<tr><td>Url</td><td><input type=\"text\" name=\"serviceUrl\" value=\"$serviceUrl\" ></td></tr>";
                    echo "<tr><td>Description</td><td><input type=\"text\" name=\"description\" value=\"$description\" ></td></tr>";
                    echo "<tr><td>Price</td><td><input type=\"text\" name=\"price\" value=\"$price\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditService\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                }
                if (isset($_POST["createService"])) {
                    $price = $_POST["price"];
                    $serviceUrl = $_POST["serviceUrl"];
                    $code = $_POST["code"];
                    $serviceName = $_POST["serviceName"];
                    $description = $_POST["description"];
                    $sql = "INSERT INTO service VALUES('','$price','$serviceUrl','$code','$serviceName','$description') ";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($rowSE = mysqli_fetch_array($resultSE)) {
                        $serviceID = $rowSE["serviceID"];
                    }
                    $serviceID += 1;
                    if ($sql) {
                        echo" <center>Create Success - ServiceID :$serviceID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>ServiceID</td><td>$serviceID</td></tr>";
                        echo"<tr><td>Name</td><td>$serviceName</td></tr>";
                        echo"<tr><td>Code</td><td>$code</td></tr>";
                        echo"<tr><td>Description</td><td>$description</td></tr>";
                        echo"<tr><td>Url</td><td><img src=\"$serviceUrl\" width=\"100\" height=\"100\" /></td></tr>";
                        echo"<tr><td>Price</td><td>$price</td></tr>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                    }
                }
                if (isset($_POST["searchService"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                    $querySearch = "SELECT * from service WHERE $type LIKE '%" . $keyword . "%'";
                    $resultSearch = mysqli_query($conn, $querySearch);
                    if (!$resultSearch) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"serviceID\">ServiceID</option>";
                        echo "<option value=\"serviceName\">Name</option>";
                        echo "<option value=\"code\">Code</option>";
                        echo "<option value=\"price\">Price</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchService\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ServiceID</td><td>Name</td><td>Code</td><td>Url</td><td>Description</td><td>Price</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["serviceID"] . "</td><td>" . $rowS["serviceName"] . "</td><td>" . $rowS["code"] . "</td><td><img src='" . $rowS["serviceUrl"] . "' width='75' height='75' /></td><td>" . $rowS["description"] . "</td><td>" . $rowS["price"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"serviceID\" value=\"" . $rowS["serviceID"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceName\" value=\"" . $rowS["serviceName"] . "\">";
                            echo "<input type=\"hidden\" name=\"code\" value=\"" . $rowS["code"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceUrl\" value=\"" . $rowS["serviceUrl"] . "\">";
                            echo "<input type=\"hidden\" name=\"description\" value=\"" . $rowS["description"] . "\">";
                            echo "<input type=\"hidden\" name=\"price\" value=\"" . $rowS["price"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditService\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteService\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                    }
                }
                if (isset($_POST["submitService"])) {
                    $service = $_POST["handleservice"];
                    if ($service == "create") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Url</td><td><input type=\"text\" name=\"serviceUrl\" ></td></tr>";
                        echo "<tr><td>Name</td><td><input type=\"text\" name=\"serviceName\" ></td></tr>";
                        echo "<tr><td>Code</td><td><input type=\"text\" name=\"code\" ></td></tr>";
                        echo "<tr><td>Description</td><td><input type=\"text\" name=\"description\" ></td></tr>";
                        echo "<tr><td>Price</td><td><input type=\"text\" name=\"price\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createService\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($service == "view" || $service == "edit" || $service == "delete") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"serviceID\">ServiceID</option>";
                        echo "<option value=\"serviceName\">Name</option>";
                        echo "<option value=\"code\">Code</option>";
                        echo "<option value=\"price\">Price</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchService\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ServiceID</td><td>Name</td><td>Code</td><td>Url</td><td>Description</td><td>Price</td></tr>";
                        while ($rowSE = mysqli_fetch_array($resultSE)) {
                            echo "<tr><td>" . $rowSE["serviceID"] . "</td><td>" . $rowSE["serviceName"] . "</td><td>" . $rowSE["code"] . "</td><td><img src='" . $rowSE["serviceUrl"] . "' width='75' height='75' /></td><td>" . $rowSE["description"] . "</td><td>" . $rowSE["price"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"serviceID\" value=\"" . $rowSE["serviceID"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceName\" value=\"" . $rowSE["serviceName"] . "\">";
                            echo "<input type=\"hidden\" name=\"code\" value=\"" . $rowSE["code"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceUrl\" value=\"" . $rowSE["serviceUrl"] . "\">";
                            echo "<input type=\"hidden\" name=\"description\" value=\"" . $rowSE["description"] . "\">";
                            echo "<input type=\"hidden\" name=\"price\" value=\"" . $rowSE["price"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditService\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteService\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                    }
                }
                if (isset($_POST["service"])) {
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "Service Management <select name=\"handleservice\">";
                    echo "<option value=\"create\">Create Service</option>";
                    echo "<option value=\"view\">View Service</option>";
                    echo "<option value=\"edit\">Edit Service</option>";
                    echo "<option value=\"delete\">Delete Service</option>";
                    echo "</select><br />";
                    echo "<input type=\"submit\" name=\"submitService\" value=\"submit\">";
                    echo "</form></center>";
                }
                $tableNameE = "email";
                $queryE = "SELECT * from $tableNameE ORDER BY emailID ASC";
                $resultE = mysqli_query($conn, $queryE);
                if (!$resultE) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowE = mysqli_num_rows($resultE);
                $numOfRecordE = count($rowE);
                $iE = 0;
                if (isset($_POST["DeleteEmail"])) {
                    $emailID = $_POST["emailID"];
                    $sql = "DELETE FROM email WHERE emailID = '$emailID'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - EmailID:$emailID</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditEmail"])) {
                    $emailID = $_POST["emailID"];
                    $userID = $_POST["userID"];
                    $topic = $_POST["topic"];
                    $content = $_POST["content"];
                    $Edate = $_POST["Edate"];
                    $senderID = $_POST["senderID"];
                    $sql = "update email set emailID='" . $emailID . "',userID='" . $userID .
                            "',topic='" . $topic . "',content='" . $content . "',date='"
                            . $Edate . "',senderID='" . $senderID . "'  where emailID='" . $emailID . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - EmailID :$emailID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>EmailID</td><td>$emailID</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Topic</td><td>$topic</td></tr>";
                        echo"<tr><td>Content</td><td>$content</td></tr>";
                        echo"<tr><td>Date</td><td>$Edate</td></tr>";
                        echo"<tr><td>SenderID</td><td>$senderID</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                    }
                }
                if (isset($_POST["EditEmail"])) {
                    $emailID = $_POST["emailID"];
                    $userID = $_POST["userID"];
                    $topic = $_POST["topic"];
                    $content = $_POST["content"];
                    $Edate = $_POST["Edate"];
                    $senderID = $_POST["senderID"];
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"emailID\" value=\"$emailID\" ></td></tr>";
                    echo "<tr><td>UserID</td><td><input type=\"text\" name=\"userID\" value=\"$userID\" ></td></tr>";
                    echo "<tr><td>Topic</td><td><input type=\"text\" name=\"topic\" value=\"$topic\" ></td></tr>";
                    echo "<tr><td>Content</td><td><input type=\"text\" name=\"content\" value=\"$content\" ></td></tr>";
                    echo "<tr><td>Date</td><td><input type=\"text\" name=\"Edate\" value=\"$Edate\" ></td></tr>";
                    echo "<tr><td>SenderID</td><td><input type=\"text\" name=\"senderID\" value=\"$senderID\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditEmail\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                }
                if (isset($_POST["createEmail"])) {
                    $userID = $_POST["userID"];
                    $topic = $_POST["topic"];
                    $content = $_POST["content"];
                    $Edate = $_POST["Edate"];
                    $senderID = $_POST["senderID"];
                    $sql = "INSERT INTO email VALUES('','$userID','$topic','$content','$Edate','$senderID') ";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($rowE = mysqli_fetch_array($resultE)) {
                        $emailID = $rowE["emailID"];
                    }
                    $emailID += 1;
                    if ($sql) {
                        echo" <center>Create Success - EmailID :$emailID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>EmailID</td><td>$emailID</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Content</td><td>$content</td></tr>";
                        echo"<tr><td>Date</td><td>$Edate</td></tr>";
                        echo"<tr><td>SenderID</td><td>$senderID</td></tr>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                    }
                }
                if (isset($_POST["searchEmail"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                    $querySearch = "SELECT * from email WHERE $type LIKE '%" . $keyword . "%'";
                    $resultSearch = mysqli_query($conn, $querySearch);
                    if (!$resultSearch) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"emailID\">EmailID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"topic\">Topic</option>";
                        echo "<option value=\"content\">Content</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "<option value=\"senderID\">SenderID</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchEmail\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>EmailID</td><td>UserID</td><td>Topic</td><td>Content</td><td>Date</td><td>SenderID</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["emailID"] . "</td><td>" . $rowS["userID"] . "</td><td>" . $rowS["topic"] . "</td><td>" . $rowS["content"] . "</td><td>" . $rowS["date"] . "</td><td>" . $rowS["senderID"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"emailID\" value=\"" . $rowS["emailID"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowS["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"topic\" value=\"" . $rowS["topic"] . "\">";
                            echo "<input type=\"hidden\" name=\"content\" value=\"" . $rowS["content"] . "\">";
                            echo "<input type=\"hidden\" name=\"Edate\" value=\"" . $rowS["date"] . "\">";
                            echo "<input type=\"hidden\" name=\"senderID\" value=\"" . $rowS["senderID"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditEmail\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteEmail\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                    }
                }
                if (isset($_POST["submitEmail"])) {
                    $email = $_POST["handleemail"];
                    if ($email == "create") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>userID</td><td><input type=\"text\" name=\"userID\" ></td></tr>";
                        echo "<tr><td>Topic</td><td><input type=\"text\" name=\"topic\" ></td></tr>";
                        echo "<tr><td>Content</td><td><input type=\"text\" name=\"content\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"Edate\" ></td></tr>";
                        echo "<tr><td>SenderID</td><td><input type=\"text\" name=\"senderID\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createEmail\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($email == "view" || $email == "edit" || $email == "delete") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"emailID\">EmailID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"topic\">Topic</option>";
                        echo "<option value=\"content\">Content</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "<option value=\"senderID\">SenderID</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchEmail\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>EmailID</td><td>UserID</td><td>Topic</td><td>Content</td><td>Date</td><td>SenderID</td></tr>";
                        while ($rowE = mysqli_fetch_array($resultE)) {
                            echo "<tr><td>" . $rowE["emailID"] . "</td><td>" . $rowE["userID"] . "</td><td>" . $rowE["topic"] . "</td><td>" . $rowE["content"] . "</td><td>" . $rowE["date"] . "</td><td>" . $rowE["senderID"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"emailID\" value=\"" . $rowE["emailID"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowE["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"topic\" value=\"" . $rowE["topic"] . "\">";
                            echo "<input type=\"hidden\" name=\"content\" value=\"" . $rowE["content"] . "\">";
                            echo "<input type=\"hidden\" name=\"Edate\" value=\"" . $rowE["date"] . "\">";
                            echo "<input type=\"hidden\" name=\"senderID\" value=\"" . $rowE["senderID"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditEmail\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteEmail\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                    }
                }
                if (isset($_POST["email"])) {
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "Email Management <select name=\"handleemail\">";
                    echo "<option value=\"create\">Create Email</option>";
                    echo "<option value=\"view\">View Email</option>";
                    echo "<option value=\"edit\">Edit Email</option>";
                    echo "<option value=\"delete\">Delete Email</option>";
                    echo "</select><br />";
                    echo "<input type=\"submit\" name=\"submitEmail\" value=\"submit\">";
                    echo "</form></center>";
                }
                $tableNameC = "chattb";
                $queryC = "SELECT * from $tableNameC ORDER BY chatid ASC";
                $resultC = mysqli_query($conn, $queryC);
                if (!$resultC) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowC = mysqli_num_rows($resultC);
                $numOfRecordC = count($rowC);
                $iC = 0;
                if (isset($_POST["DeleteChatroom"])) {
                    $chatid = $_POST["chatid"];
                    $sql = "DELETE FROM chattb WHERE chatid = '$chatid'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - ChatID:$chatid</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditChatroom"])) {
                    $chatid = $_POST["chatid"];
                    $userID = $_POST["userID"];
                    $chatbody = $_POST["chatbody"];
                    $chatdate = $_POST["chatdate"];
                    $Cdate = $_POST["Cdate"];
                    $sql = "update chattb set chatid='" . $chatid . "',userID='" . $userID .
                            "',chatbody='" . $chatbody . "',chatdate='" . $chatdate . "',date='"
                            . $Cdate . "'  where chatid='" . $chatid . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - ChatID :$chatid</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>ChatID</td><td>$chatid</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Content</td><td>$chatbody</td></tr>";
                        echo"<tr><td>Time</td><td>$chatdate</td></tr>";
                        echo"<tr><td>Date</td><td>$Cdate</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                    }
                }
                if (isset($_POST["EditChatroom"])) {
                    $chatid = $_POST["chatid"];
                    $userID = $_POST["userID"];
                    $chatbody = $_POST["chatbody"];
                    $chatdate = $_POST["chatdate"];
                    $Cdate = $_POST["Cdate"];
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"chatid\" value=\"$chatid\" ></td></tr>";
                    echo "<tr><td>UserID</td><td><input type=\"text\" name=\"userID\" value=\"$userID\" ></td></tr>";
                    echo "<tr><td>Content</td><td><input type=\"text\" name=\"chatbody\" value=\"$chatbody\" ></td></tr>";
                    echo "<tr><td>Time</td><td><input type=\"text\" name=\"chatdate\" value=\"$chatdate\" ></td></tr>";
                    echo "<tr><td>Date</td><td><input type=\"text\" name=\"Cdate\" value=\"$Cdate\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditChatroom\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                }
                if (isset($_POST["createChatroom"])) {
                    $userID = $_POST["userID"];
                    $chatbody = $_POST["chatbody"];
                    $chatdate = $_POST["chatdate"];
                    $Cdate = $_POST["Cdate"];
                    $sql = "INSERT INTO chattb VALUES('','$userID','$chatbody','$chatdate','$Cdate') ";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($rowC = mysqli_fetch_array($resultC)) {
                        $chatid = $rowC["chatid"];
                    }
                    $chatid += 1;
                    if ($sql) {
                        echo" <center>Create Success - ChatID :$chatid</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>ChatID</td><td>$chatid</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Content</td><td>$chatbody</td></tr>";
                        echo"<tr><td>Time</td><td>$chatdate</td></tr>";
                        echo"<tr><td>Date</td><td>$Cdate</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                    }
                }
                if (isset($_POST["searchChatroom"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                    $querySearch = "SELECT * from chattb WHERE $type LIKE '%" . $keyword . "%'";
                    $resultSearch = mysqli_query($conn, $querySearch);
                    if (!$resultSearch) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"chatID\">ChatID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"chatbody\">Content</option>";
                        echo "<option value=\"chatdate\">Time</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchChatroom\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ChatID</td><td>UserID</td><td>Content</td><td>Time</td><td>Date</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["chatid"] . "</td><td>" . $rowS["userID"] . "</td><td>" . $rowS["chatbody"] . "</td><td>" . $rowS["chatdate"] . "</td><td>" . $rowS["date"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"chatid\" value=\"" . $rowS["chatid"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowS["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"chatbody\" value=\"" . $rowS["chatbody"] . "\">";
                            echo "<input type=\"hidden\" name=\"chatdate\" value=\"" . $rowS["chatdate"] . "\">";
                            echo "<input type=\"hidden\" name=\"Cdate\" value=\"" . $rowS["date"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditChatroom\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteChatroom\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                    }
                }
                if (isset($_POST["submitChatroom"])) {
                    $chatroom = $_POST["handlechatroom"];
                    if ($chatroom == "create") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>userID</td><td><input type=\"text\" name=\"userID\" ></td></tr>";
                        echo "<tr><td>Content</td><td><input type=\"text\" name=\"chatbody\" ></td></tr>";
                        echo "<tr><td>Time</td><td><input type=\"text\" name=\"chatdate\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"Cdate\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createChatroom\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($chatroom == "view" || $chatroom == "edit" || $chatroom == "delete") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"chatID\">ChatID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"chatbody\">Content</option>";
                        echo "<option value=\"chatdate\">Time</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchChatroom\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ChatID</td><td>UserID</td><td>Content</td><td>Time</td><td>Date</td></tr>";
                        while ($rowC = mysqli_fetch_array($resultC)) {
                            echo "<tr><td>" . $rowC["chatid"] . "</td><td>" . $rowC["userID"] . "</td><td>" . $rowC["chatbody"] . "</td><td>" . $rowC["chatdate"] . "</td><td>" . $rowC["date"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"chatid\" value=\"" . $rowC["chatid"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowC["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"chatbody\" value=\"" . $rowC["chatbody"] . "\">";
                            echo "<input type=\"hidden\" name=\"chatdate\" value=\"" . $rowC["chatdate"] . "\">";
                            echo "<input type=\"hidden\" name=\"Cdate\" value=\"" . $rowC["date"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditChatroom\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteChatroom\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                    }
                }
                if (isset($_POST["chatroom"])) {
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "Chatroom Management <select name=\"handlechatroom\">";
                    echo "<option value=\"create\">Create Chat</option>";
                    echo "<option value=\"view\">View Chat</option>";
                    echo "<option value=\"edit\">Edit Chat</option>";
                    echo "<option value=\"delete\">Delete Chat</option>";
                    echo "</select><br />";
                    echo "<input type=\"submit\" name=\"submitChatroom\" value=\"submit\">";
                    echo "</form></center>";
                }
                $tableNameA = "autism";
                $queryA = "SELECT * from $tableNameA ORDER BY id ASC";
                $resultA = mysqli_query($conn, $queryA);
                if (!$resultA) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowA = mysqli_num_rows($resultA);
                $numOfRecordA = count($rowA);
                $iA = 0;
                if (isset($_POST["DeleteTest"])) {
                    $id = $_POST["id"];
                    $sql = "DELETE FROM autism WHERE id = '$id'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - TestID:$id</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditTest"])) {
                    $id = $_POST["id"];
                    $engq = $_POST["engq"];
                    $mark = $_POST["mark"];
                    $sql = "update autism set id='" . $id . "',engq='" . $engq .
                            "',mark='" . $mark . "'  where id='" . $id . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - TestID :$id</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>TestID</td><td>$id</td></tr>";
                        echo"<tr><td>Question</td><td>$engq</td></tr>";
                        echo"<tr><td>Answer</td><td>$mark</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                    }
                }
                if (isset($_POST["EditTest"])) {
                    $id = $_POST["id"];
                    $engq = $_POST["engq"];
                    $mark = $_POST["mark"];
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"id\" value=\"$id\" ></td></tr>";
                    echo "<tr><td>Question</td><td><input type=\"text\" name=\"engq\" value=\"$engq\" ></td></tr>";
                    echo "<tr><td>Answer</td><td><input type=\"text\" name=\"mark\" value=\"$mark\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditTest\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                }
                if (isset($_POST["createTest"])) {
                    $engq = $_POST["engq"];
                    $mark = $_POST["mark"];
                    $sql = "INSERT INTO autism VALUES('','$engq','$mark') ";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($rowA = mysqli_fetch_array($resultA)) {
                        $id = $rowA["id"];
                    }
                    $id += 1;
                    if ($sql) {
                        echo" <center>Create Success - TestID :$id</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>TestID</td><td>$id</td></tr>";
                        echo"<tr><td>Question</td><td>$engq</td></tr>";
                        echo"<tr><td>Answer</td><td>$mark</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                    }
                }
                if (isset($_POST["searchTest"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                    $querySearch = "SELECT * from autism WHERE $type LIKE '%" . $keyword . "%'";
                    $resultSearch = mysqli_query($conn, $querySearch);
                    if (!$resultSearch) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"id\">TestID</option>";
                        echo "<option value=\"engq\">Question</option>";
                        echo "<option value=\"mark\">Answer</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchTest\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>TestID</td><td>Question</td><td>Answer</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["id"] . "</td><td>" . $rowS["engq"] . "</td><td>" . $rowS["mark"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"id\" value=\"" . $rowS["id"] . "\">";
                            echo "<input type=\"hidden\" name=\"engq\" value=\"" . $rowS["engq"] . "\">";
                            echo "<input type=\"hidden\" name=\"mark\" value=\"" . $rowS["mark"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditTest\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteTest\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                    }
                }
                if (isset($_POST["submitTest"])) {
                    $test = $_POST["handletest"];
                    if ($test == "create") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Question</td><td><input type=\"text\" name=\"engq\" ></td></tr>";
                        echo "<tr><td>Answer</td><td><input type=\"text\" name=\"mark\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createTest\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($test == "view" || $test == "edit" || $test == "delete") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"id\">TestID</option>";
                        echo "<option value=\"engq\">Question</option>";
                        echo "<option value=\"mark\">Answer</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchTest\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>TestID</td><td>Question</td><td>Answer</td></tr>";
                        while ($rowA = mysqli_fetch_array($resultA)) {
                            echo "<tr><td>" . $rowA["id"] . "</td><td>" . $rowA["engq"] . "</td><td>" . $rowA["mark"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"id\" value=\"" . $rowA["id"] . "\">";
                            echo "<input type=\"hidden\" name=\"engq\" value=\"" . $rowA["engq"] . "\">";
                            echo "<input type=\"hidden\" name=\"mark\" value=\"" . $rowA["mark"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditTest\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteTest\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                    }
                }
                if (isset($_POST["test"])) {
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "Test Management <select name=\"handletest\">";
                    echo "<option value=\"create\">Create Test</option>";
                    echo "<option value=\"view\">View Test</option>";
                    echo "<option value=\"edit\">Edit Test</option>";
                    echo "<option value=\"delete\">Delete Test</option>";
                    echo "</select><br />";
                    echo "<input type=\"submit\" name=\"submitTest\" value=\"submit\">";
                    echo "</form></center>";
                }
                $tableNameI = "information";
                $queryI = "SELECT * from $tableNameI ORDER BY infoID ASC";
                $resultI = mysqli_query($conn, $queryI);
                if (!$resultI) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowI = mysqli_num_rows($resultI);
                $numOfRecordI = count($rowI);
                $iI = 0;
                if (isset($_POST["DeleteInfo"])) {
                    $infoID = $_POST["infoID"];
                    $sql = "DELETE FROM information WHERE infoID = '$infoID'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - InformationID:$infoID</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"information\" value=\"Back to Information\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditInfo"])) {
                    $infoID = $_POST["infoID"];
                    $infoName = $_POST["infoName"];
                    $infoDetail = $_POST["infoDetail"];
                    $infoDate = $_POST["infoDate"];
                    $infoUrl = $_POST["infoUrl"];
                    $sql = "update information set infoID='" . $infoID . "',infoName='" . $infoName .
                            "',infoDetail='" . $infoDetail . "',infoDate='" . $infoDate . "',infoUrl='" . $infoUrl . "'  where infoID='" . $infoID . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - InformationID :$infoID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>InformationID</td><td>$infoID</td></tr>";
                        echo"<tr><td>Name</td><td>$infoName</td></tr>";
                        echo"<tr><td>Detail</td><td>$infoDetail</td></tr>";
                        echo"<tr><td>Date</td><td>$infoDate</td></tr>";
                        echo"<tr><td>Photo</td><td><img src=\"$infoUrl\" width=\"100\" height=\"100\" ></td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"information\" value=\"Back to Information\"></form></center>";
                    }
                }
                if (isset($_POST["EditInfo"])) {
                    $infoID = $_POST["infoID"];
                    $infoName = $_POST["infoName"];
                    $infoDetail = $_POST["infoDetail"];
                    $infoDate = $_POST["infoDate"];
                    $infoUrl = $_POST["infoUrl"];
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"infoID\" value=\"$infoID\" ></td></tr>";
                    echo "<tr><td>Name</td><td><input type=\"text\" name=\"infoName\" value=\"$infoName\" ></td></tr>";
                    echo "<tr><td>Detail</td><td><input type=\"text\" name=\"infoDetail\" value=\"$infoDetail\" ></td></tr>";
                    echo "<tr><td>Date</td><td><input type=\"text\" name=\"infoDate\" value=\"$infoDate\" ></td></tr>";
                    echo "<tr><td>PhotoUrl</td><td><input type=\"text\" name=\"infoUrl\" value=\"$infoUrl\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditInfo\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"information\" value=\"Back to Information\"></form></center>";
                }
                if (isset($_POST["createInfo"])) {
                    $infoName = $_POST["infoName"];
                    $infoDetail = $_POST["infoDetail"];
                    $infoDate = $_POST["infoDate"];
                    $infoUrl = $_POST["infoUrl"];
                    $sql = "INSERT INTO information VALUES('','$infoName','$infoDetail','$infoDate','$infoUrl') ";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($rowI = mysqli_fetch_array($resultI)) {
                        $infoID = $rowI["infoID"];
                    }
                    $infoID += 1;
                    if ($sql) {
                        echo" <center>Create Success - InformationID :$infoID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>InformationID</td><td>$infoID</td></tr>";
                        echo"<tr><td>Name</td><td>$infoName</td></tr>";
                        echo"<tr><td>Detail</td><td>$infoDetail</td></tr>";
                        echo"<tr><td>Date</td><td>$infoDate</td></tr>";
                        echo"<tr><td>Photo</td><td><img src=\"$infoUrl\" width=\"100\" height=\"100\" ></td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"information\" value=\"Back to Information\"></form></center>";
                    }
                }
                if (isset($_POST["searchInfo"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                    $querySearch = "SELECT * from information WHERE $type LIKE '%" . $keyword . "%'";
                    $resultSearch = mysqli_query($conn, $querySearch);
                    if (!$resultSearch) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"infoID\">InformationID</option>";
                        echo "<option value=\"infoName\">Name</option>";
                        echo "<option value=\"infoDetail\">Detail</option>";
                        echo "<option value=\"infoDate\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchInfo\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>InformationID</td><td>Name</td><td>Detail</td><td>Date</td><td>Url</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["infoID"] . "</td><td>" . $rowS["infoName"] . "</td><td>" . $rowS["infoDetail"] . "</td><td>" . $rowS["infoDate"] . "</td><td><img src='" . $rowS["infoUrl"] . "' width='75' height='75' /></td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"infoID\" value=\"" . $rowS["infoID"] . "\">";
                            echo "<input type=\"hidden\" name=\"infoName\" value=\"" . $rowS["infoName"] . "\">";
                            echo "<input type=\"hidden\" name=\"infoDetail\" value=\"" . $rowS["infoDetail"] . "\">";
                            echo "<input type=\"hidden\" name=\"infoDate\" value=\"" . $rowS["infoDate"] . "\">";
                            echo "<input type=\"hidden\" name=\"infoUrl\" value=\"" . $rowS["infoUrl"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditInfo\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteInfo\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"information\" value=\"Back to Information\"></form></center>";
                    }
                }
                if (isset($_POST["submitInfo"])) {
                    $information = $_POST["handleinfo"];
                    if ($information == "create") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Name</td><td><input type=\"text\" name=\"infoName\" ></td></tr>";
                        echo "<tr><td>Detail</td><td><input type=\"text\" name=\"infoDetail\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"infoDate\" ></td></tr>";
                        echo "<tr><td>PhotoUrl</td><td><input type=\"text\" name=\"infoUrl\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createInfo\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($information == "view" || $information == "edit" || $information == "delete") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"infoID\">InformationID</option>";
                        echo "<option value=\"infoName\">Name</option>";
                        echo "<option value=\"infoDetail\">Detail</option>";
                        echo "<option value=\"infoDate\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchInfo\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>InformationID</td><td>Name</td><td>Detail</td><td>Date</td><td>Url</td></tr>";
                        while ($rowI = mysqli_fetch_array($resultI)) {
                            echo "<tr><td>" . $rowI["infoID"] . "</td><td>" . $rowI["infoName"] . "</td><td>" . $rowI["infoDetail"] . "</td><td>" . $rowI["infoDate"] . "</td><td><img src='" . $rowI["infoUrl"] . "' width='75' height='75' /></td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"infoID\" value=\"" . $rowI["infoID"] . "\">";
                            echo "<input type=\"hidden\" name=\"infoName\" value=\"" . $rowI["infoName"] . "\">";
                            echo "<input type=\"hidden\" name=\"infoDetail\" value=\"" . $rowI["infoDetail"] . "\">";
                            echo "<input type=\"hidden\" name=\"infoDate\" value=\"" . $rowI["infoDate"] . "\">";
                            ;
                            echo "<input type=\"hidden\" name=\"infoUrl\" value=\"" . $rowI["infoUrl"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditInfo\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteInfo\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"information\" value=\"Back to Information\"></form></center>";
                    }
                }
                if (isset($_POST["information"])) {
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "Information Management <select name=\"handleinfo\">";
                    echo "<option value=\"create\">Create Information</option>";
                    echo "<option value=\"view\">View Information</option>";
                    echo "<option value=\"edit\">Edit Information</option>";
                    echo "<option value=\"delete\">Delete Information</option>";
                    echo "</select><br />";
                    echo "<input type=\"submit\" name=\"submitInfo\" value=\"submit\">";
                    echo "</form></center>";
                }
                $tableNamePO = "product_order";
                $tableNameSO = "service_order";
                $queryPO = "SELECT * from $tableNamePO ORDER BY porderID ASC";
                $querySO = "SELECT * from $tableNameSO ORDER BY pserviceID ASC";
                $resultPO = mysqli_query($conn, $queryPO);
                $resultSO = mysqli_query($conn, $querySO);
                if (!$resultSO || !$resultPO) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowPO = mysqli_num_rows($resultPO);
                $rowSO = mysqli_num_rows($resultSO);
                $numOfRecordPO = count($rowPO);
                $numOfRecordSO = count($rowSO);
                $iPO = 0;
                $iSO = 0;
                if (isset($_POST["DeleteSOrder"])) {
                    $pserviceID = $_POST["pserviceID"];
                    $sql = "DELETE FROM service_order WHERE pserviceID = '$pserviceID'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - Service_Order ID:$pserviceID</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["DeletePOrder"])) {
                    $porderID = $_POST["porderID"];
                    $sql = "DELETE FROM product_order WHERE porderID = '$porderID'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Delete Success - Product_Order ID:$porderID</center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditSOrder"])) {
                    $pserviceID = $_POST["pserviceID"];
                    $serviceCode = $_POST["serviceCode"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $SOdate = $_POST["SOdate"];
                    $sql = "update service_order set pserviceID='" . $pserviceID . "',serviceCode='" . $serviceCode .
                            "',userID='" . $userID . "',total='" . $total . "',date='" . $SOdate . "'  where pserviceID='" . $pserviceID . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - Service_Order ID :$pserviceID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>Service_OrderID</td><td>$pserviceID</td></tr>";
                        echo"<tr><td>ServiceCode</td><td>$serviceCode</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Total</td><td>$total</td></tr>";
                        echo"<tr><td>Date</td><td>$SOdate</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["handleEditPOrder"])) {
                    $porderID = $_POST["porderID"];
                    $productCode = $_POST["productCode"];
                    $quantity = $_POST["quantity"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $POdate = $_POST["POdate"];
                    $sql = "update product_order set porderID='" . $porderID . "',productCode='" . $productCode .
                            "',quantity='" . $quantity . "',userID='" . $userID . "',total='" . $total . "',date='" . $POdate . "'  where porderID='" . $porderID . "'";
                    $result = mysql_query($sql) or die(mysql_error());
                    if ($sql) {
                        echo" <center>Edit Success - Product_Order ID :$porderID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>Product_OrderID</td><td>$porderID</td></tr>";
                        echo"<tr><td>ProductCode</td><td>$productCode</td></tr>";
                        echo"<tr><td>Quantity</td><td>$quantity</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Total</td><td>$total</td></tr>";
                        echo"<tr><td>Date</td><td>$POdate</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["EditSOrder"])) {
                    $pserviceID = $_POST["pserviceID"];
                    $serviceCode = $_POST["serviceCode"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $SOdate = $_POST["SOdate"];
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"pserviceID\" value=\"$pserviceID\" ></td></tr>";
                    echo "<tr><td>ServiceCode</td><td><input type=\"text\" name=\"serviceCode\" value=\"$serviceCode\" ></td></tr>";
                    echo "<tr><td>UserID</td><td><input type=\"text\" name=\"userID\" value=\"$userID\" ></td></tr>";
                    echo "<tr><td>Total</td><td><input type=\"text\" name=\"total\" value=\"$total\" ></td></tr>";
                    echo "<tr><td>Date</td><td><input type=\"text\" name=\"SOdate\" value=\"$SOdate\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditSOrder\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                }
                if (isset($_POST["EditPOrder"])) {
                     $porderID = $_POST["porderID"];
                    $productCode = $_POST["productCode"];
                    $quantity = $_POST["quantity"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $POdate = $_POST["POdate"];
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"porderID\" value=\"$porderID\" ></td></tr>";
                    echo "<tr><td>ProductCode</td><td><input type=\"text\" name=\"productCode\" value=\"$productCode\" ></td></tr>";
                    echo "<tr><td>Quantity</td><td><input type=\"text\" name=\"quantity\" value=\"$quantity\" ></td></tr>";
                    echo "<tr><td>UserID</td><td><input type=\"text\" name=\"userID\" value=\"$userID\" ></td></tr>";
                    echo "<tr><td>Total</td><td><input type=\"text\" name=\"total\" value=\"$total\" ></td></tr>";
                    echo "<tr><td>Date</td><td><input type=\"text\" name=\"POdate\" value=\"$POdate\" ></td></tr>";
                    echo "<tr><td></td><td><input type=\"submit\" name=\"handleEditPOrder\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                }
                if (isset($_POST["createSOrder"])) {
                    $serviceCode = $_POST["serviceCode"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $SOdate = $_POST["SOdate"];
                    $sql = "INSERT INTO service_order VALUES('','$serviceCode','$userID','$total','$SOdate') ";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($rowSO = mysqli_fetch_array($resultSO)) {
                        $pserviceID = $rowSO["pserviceID"];
                    }
                    $pserviceID += 1;
                    if ($sql) {
                        echo" <center>Create Success - Service_OrderID :$pserviceID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>Service_OrderID</td><td>$pserviceID</td></tr>";
                        echo"<tr><td>ServiceCode</td><td>$serviceCode</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Total</td><td>$total</td></tr>";
                        echo"<tr><td>Date</td><td>$SOdate</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["createPOrder"])) {
                     $productCode = $_POST["productCode"];
                    $quantity = $_POST["quantity"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $POdate = $_POST["POdate"];
                    $sql = "INSERT INTO product_order VALUES('','$productCode','$quantity','$userID','$total','$POdate') ";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($rowPO = mysqli_fetch_array($resultPO)) {
                        $porderID = $rowPO["porderID"];
                    }
                    $porderID += 1;
                    if ($sql) {
                        echo" <center>Create Success - Product_OrderID :$porderID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>Product_OrderID</td><td>$porderID</td></tr>";
                        echo"<tr><td>ProductCode</td><td>$productCode</td></tr>";
                        echo"<tr><td>Quantity</td><td>$quantity</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Total</td><td>$total</td></tr>";
                        echo"<tr><td>Date</td><td>$POdate</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["searchOrder"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                        $querySearch = "SELECT * from service_order WHERE $type LIKE '%" . $keyword . "%'";
                        $querySearchP = "SELECT * from product_order WHERE $type LIKE '%" . $keyword . "%'";
                    
                    $resultSearch = mysqli_query($conn, $querySearch);
                    $resultSearchP = mysqli_query($conn, $querySearchP);
                    if (!$resultSearch || !$resultSearchP) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"total\">Total</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchOrder\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>Service_OrderID</td><td>ServiceCode</td><td>UserID</td><td>Total</td><td>Date</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["pserviceID"] . "</td><td>" . $rowS["serviceCode"] . "</td><td>" . $rowS["userID"] . "</td><td>" . $rowS["total"] . "</td><td>" . $rowS["date"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"pserviceID\" value=\"" . $rowS["pserviceID"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceCode\" value=\"" . $rowS["serviceCode"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowS["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"total\" value=\"" . $rowS["total"] . "\">";
                            echo "<input type=\"hidden\" name=\"SOdate\" value=\"" . $rowS["date"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditSOrder\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteSOrder\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>Product_OrderID</td><td>ProductCode</td><td>Quantity</td><td>UserID</td><td>Total</td><td>Date</td></tr>";
                        while ($rowSP = mysqli_fetch_array($resultSearchP)) {
                            echo "<tr><td>" . $rowSP["porderID"] . "</td><td>" . $rowSP["productCode"] . "</td><td>" . $rowSP["quantity"] . "</td><td>" . $rowSP["userID"] . "</td><td>" . $rowSP["total"] . "</td><td>" . $rowSP["date"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"porderID\" value=\"" . $rowSP["porderID"] . "\">";
                            echo "<input type=\"hidden\" name=\"productCode\" value=\"" . $rowSP["productCode"] . "\">";
                            echo "<input type=\"hidden\" name=\"quantity\" value=\"" . $rowSP["quantity"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowSP["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"total\" value=\"" . $rowSP["total"] . "\">";
                            echo "<input type=\"hidden\" name=\"POdate\" value=\"" . $rowSP["date"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditPOrder\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeletePOrder\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["submitOrder"])) {
                    $order = $_POST["handleorder"];
                    if ($order == "create") {
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Service_Code</td><td><input type=\"text\" name=\"serviceCode\" ></td></tr>";
                        echo "<tr><td>userID</td><td><input type=\"text\" name=\"userID\" ></td></tr>";
                        echo "<tr><td>Total</td><td><input type=\"text\" name=\"total\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"SOdate\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createSOrder\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "<br><br>";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Product_Code</td><td><input type=\"text\" name=\"productCode\" ></td></tr>";
                        echo "<tr><td>Quantity</td><td><input type=\"text\" name=\"quantity\" ></td></tr>";
                        echo "<tr><td>userID</td><td><input type=\"text\" name=\"userID\" ></td></tr>";
                        echo "<tr><td>Total</td><td><input type=\"text\" name=\"total\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"POdate\" ></td></tr>";
                        echo "<tr><td></td><td><input type=\"submit\" name=\"createPOrder\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center><br><br>";
                    }
                    if ($order == "view" || $order == "edit" || $order == "delete") {
                         echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"total\">Total</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input type=\"submit\" name=\"searchOrder\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>Service_OrderID</td><td>ServiceCode</td><td>UserID</td><td>Total</td><td>Date</td></tr>";
                        while ($rowSO = mysqli_fetch_array($resultSO)) {
                            echo "<tr><td>" . $rowSO["pserviceID"] . "</td><td>" . $rowSO["serviceCode"] . "</td><td>" . $rowSO["userID"] . "</td><td>" . $rowSO["total"] . "</td><td>" . $rowSO["date"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"pserviceID\" value=\"" . $rowSO["pserviceID"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceCode\" value=\"" . $rowSO["serviceCode"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowSO["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"total\" value=\"" . $rowSO["total"] . "\">";
                            echo "<input type=\"hidden\" name=\"SOdate\" value=\"" . $rowSO["date"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditSOrder\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeleteSOrder\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>Product_OrderID</td><td>ProductCode</td><td>Quantity</td><td>UserID</td><td>Total</td><td>Date</td></tr>";
                        while ($rowPO = mysqli_fetch_array($resultPO)) {
                            echo "<tr><td>" . $rowPO["porderID"] . "</td><td>" . $rowPO["productCode"] . "</td><td>" . $rowPO["quantity"] . "</td><td>" . $rowPO["userID"] . "</td><td>" . $rowPO["total"] . "</td><td>" . $rowPO["date"] . "</td>";
                            echo "<form action=\"admin.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"porderID\" value=\"" . $rowPO["porderID"] . "\">";
                            echo "<input type=\"hidden\" name=\"productCode\" value=\"" . $rowPO["productCode"] . "\">";
                            echo "<input type=\"hidden\" name=\"quantity\" value=\"" . $rowPO["quantity"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowPO["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"total\" value=\"" . $rowPO["total"] . "\">";
                            echo "<input type=\"hidden\" name=\"SOdate\" value=\"" . $rowPO["date"] . "\">";
                            echo "<td><input type=\"submit\" name=\"EditPOrder\" value=\"Edit\"></td>";
                            echo "<td><input type=\"submit\" name=\"DeletePOrder\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"admin.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["order"])) {
                    echo "<center><form action=\"admin.php\" method=\"post\">";
                    echo "Order Management <select name=\"handleorder\">";
                    echo "<option value=\"create\">Create Order</option>";
                    echo "<option value=\"view\">View Order</option>";
                    echo "<option value=\"edit\">Edit Order</option>";
                    echo "<option value=\"delete\">Delete Order</option>";
                    echo "</select><br />";
                    echo "<input type=\"submit\" name=\"submitOrder\" value=\"submit\">";
                    echo "</form></center>";
                }
                echo "<center><form action=\"members.php\" method=\"post\">";
                        echo "<input type=\"submit\" name=\"Admin\" value=\"Back\"></form></center>";
            } else {
                echo "<center>You cannot view admin page without permission!<br>";
                echo "<a href='members.php'>Back</a></center>";
            }
        } else {
            echo "<center>You cannot view admin page without permission!<br>";
            echo "<a href='members.php'>Back</a></center>";
        }
        ?>
    </center>




    <!-- START FOOTER -->
    <?php include_once 'footer.php'; ?>
    <!-- ENDFOOTER -->

    <!-- START COPYRIGHT -->
    <?php include_once 'copyright.php'; ?>
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
