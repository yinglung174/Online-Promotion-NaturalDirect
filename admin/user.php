<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
include_once '../includes/db_connection.php';
include_once '../includes/connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Natural Direct Co. Ltd</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jQuery UI -->
        <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="css/styles.css" rel="stylesheet">

        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
        <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
        <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

        <link href="css/forms.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <div class="col-md-10">
            <?php
            $tableNameU = "user";
            $queryU = "SELECT * from $tableNameU ORDER BY userID ASC";
            $resultU = mysqli_query($conn, $queryU);
            if (!$resultU) {
                die("Database access failed: " . mysqli_error($conn));
            }
            $rowU = mysqli_num_rows($resultU);
            $numOfRecordU = count((is_countable($rowU)?$rowU:[]));
            $iU = 0;
            if (isset($_POST["DeleteUser"])) {
                $userID = $_POST["userID"];
                $sql = "DELETE FROM user WHERE userID = '$userID'";
                $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                if ($sql) {
                    echo" <center>Delete Success - UserID:$userID</center>";
                    echo "<center><form action=\"user.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
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
                $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                if ($sql) {
                    echo" <center>Edit Success - UserID :$userID</center>";
                    echo"<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><table border=\"1\">";
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
                    echo "<center><form action=\"user.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"user\" value=\"Back to User\"></form></center></div></div><div>";
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
                echo "<center><form action=\"user.php\" method=\"post\">";
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
                echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"handleEditUser\" value=\"Edit\"></td></tr>";
                echo "</table>";
                echo "</form></center>";
                echo "<center><form action=\"user.php\" method=\"post\">";
                echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
            }
            if (isset($_POST["createUser"])) {
                while ($rowU = mysqli_fetch_array($resultU)) {
                    if ($_POST["username"] != $rowU["username"] && $_POST["username"] != NULL) {
                        $usernameU = $_POST["username"];
                    } else {
                        echo "<center>username is repeated or null! Please create again!";
                        echo "<a href='user.php?user=yes'>Back</a></center>";
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
                    $result = mysql_query($conn,$sql) or die(mysql_error($conn));
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
                        echo "<center><form action=\"user.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
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
                    echo "<center><form action=\"user.php\" method=\"post\">";
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
                    echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchUser\" value=\"Search\">";
                    echo "</form></center><br><br>";
                    echo "<center><table border=\"1\"><tr><td>UserID</td><td>Icon</td><td>Name</td><td>Gender</td><td>Birth Date</td><td>Tel.No</td><td>Address</td><td>Email</td><td>Username</td><td>Password</td><td>Mark</td><td>Register Date</td></tr>";
                    while ($rowS = mysqli_fetch_array($resultSearch)) {
                        echo "<tr><td>" . $rowS["userID"] . "</td><td><img src='" . $rowS["icon"] . "' width='75' height='75' /></td><td>" . $rowS["name"] . "</td><td>" . $rowS["gender"] . "</td><td>" . $rowS["brithday"] . "</td><td>" . $rowS["address"] . "</td><td>" . $rowS["tel"] . "</td><td>" . $rowS["email"] . "</td><td>" . $rowS["username"] . "</td><td>" . $rowS["password"] . "</td><td>" . $rowS["mark"] . "</td><td>" . $rowS["registerDate"] . "</td>";
                        echo "<form action=\"../members/message.php\" method=\"post\">";
                        echo "<input type=\"hidden\" name=\"senderID\" value=\"" . $rowS["userID"] . "\">";
                        echo "<td><input class=\"btn btn-inverse\" type=\"submit\" name=\"send\" value=\"Mail\"></form></td>";
                        echo "<form action=\"user.php\" method=\"post\">";
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
                        echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditUser\" value=\"Edit\"></td>";
                        echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteUser\" value=\"Delete\"></td>";
                        echo "</form></tr>";
                    }
                    echo "</table></center>";
                    echo "<center><form action=\"user.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
                }
            }
            if (isset($_POST["submitUser"])) {
                $user = $_POST["handleuser"];
                if ($user == "create") {
                    echo "<center><form action=\"user.php\" method=\"post\">";
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
                    echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createUser\" value=\"Create\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                }
                if ($user == "view" || $user == "edit" || $user == "delete") {
                    echo "<div class=\"col-md-4\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"user.php\" method=\"post\">";
                    echo "<h5>Search:</h5> <select class=\"form-control\" id=\"select-1\" name=\"type\">";
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
                    echo "<input class=\"form-control\" type=\"text\" name=\"keyword\" required >";
                    echo "<br><input class=\"btn btn-info\" type=\"submit\" name=\"searchUser\" value=\"Search\">";
                    echo "</form></center><br><br>";
                    echo "<center></div></div></div><table border=\"1\"><tr><td>UserID</td><td>Icon</td><td>Name</td><td>Gender</td><td>Birth Date</td><td>Tel.No</td><td>Address</td><td>Email</td><td>Username</td><td>Password</td><td>Mark</td><td>Register Date</td></tr>";
                    while ($rowU = mysqli_fetch_array($resultU)) {
                        echo "<tr><td>" . $rowU["userID"] . "</td><td><img src='" . $rowU["icon"] . "' width='75' height='75' /></td><td>" . $rowU["name"] . "</td><td>" . $rowU["gender"] . "</td><td>" . $rowU["brithday"] . "</td><td>" . $rowU["address"] . "</td><td>" . $rowU["tel"] . "</td><td>" . $rowU["email"] . "</td><td>" . $rowU["username"] . "</td><td>" . $rowU["password"] . "</td><td>" . $rowU["mark"] . "</td><td>" . $rowU["registerDate"] . "</td>";
                        echo "<form action=\"../members/message.php\" method=\"post\">";
                        echo "<input type=\"hidden\" name=\"senderID\" value=\"" . $rowU["userID"] . "\">";
                        echo "<td><input class=\"btn btn-inverse\" type=\"submit\" name=\"send\" value=\"Mail\"></form></td>";
                        echo "<form action=\"user.php\" method=\"post\">";
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
                        echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditUser\" value=\"Edit\"></td>";
                        echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteUser\" value=\"Delete\"></td>";
                        echo "</form></tr>";
                    }
                    echo "</table></center>";
                    echo "<center><form action=\"user.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"user\" value=\"Back to User\"></form></center>";
                }
            }
            if (isset($_GET["user"]) || isset($_POST["user"])) {
                echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"user.php\" method=\"post\">";
                echo "<h4>User Management</h4> <select class=\"form-control\" id=\"select-1\" name=\"handleuser\">";
                echo "<option value=\"create\">Create User</option>";
                echo "<option value=\"view\">View User</option>";
                echo "<option value=\"edit\">Edit User</option>";
                echo "<option value=\"delete\">Delete User</option>";
                echo "</select><br />";
                echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"submitUser\" value=\"submit\">";
                echo "</form></center></div></div></div>";
            }
            ?>
        </div>
    </table>
</div>
</div>
</div>
</div>
</div>


<?php include_once 'footer.php'; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

<script src="vendors/select/bootstrap-select.min.js"></script>

<script src="vendors/tags/js/bootstrap-tags.min.js"></script>

<script src="vendors/mask/jquery.maskedinput.min.js"></script>

<script src="vendors/moment/moment.min.js"></script>

<script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<!-- bootstrap-datetimepicker -->
<link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
<script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script src="js/custom.js"></script>
<script src="js/forms.js"></script>
<script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

<script src="vendors/ckeditor/ckeditor.js"></script>
<script src="vendors/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

<script src="js/custom.js"></script>
<script src="js/editors.js"></script>

</body>
</html>
