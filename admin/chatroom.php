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
      <?php  $tableNameC = "chattb";
                $queryC = "SELECT * from $tableNameC ORDER BY chatid ASC";
                $resultC = mysqli_query($conn, $queryC);
                if (!$resultC) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowC = mysqli_num_rows($resultC);
                $numOfRecordC = count((is_countable($rowC)?$rowC:[]));
                $iC = 0;
                if (isset($_POST["DeleteChatroom"])) {
                    $chatid = $_POST["chatid"];
                    $sql = "DELETE FROM chattb WHERE chatid = '$chatid'";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if ($sql) {
                        echo" <center>Delete Success - ChatID:$chatid</center>";
                        echo "<center><form action=\"chatroom.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
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
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if ($sql) {
                        echo" <center>Edit Success - ChatID :$chatid</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>ChatID</td><td>$chatid</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Content</td><td>$chatbody</td></tr>";
                        echo"<tr><td>Time</td><td>$chatdate</td></tr>";
                        echo"<tr><td>Date</td><td>$Cdate</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"chatroom.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                    }
                }
                if (isset($_POST["EditChatroom"])) {
                    $chatid = $_POST["chatid"];
                    $userID = $_POST["userID"];
                    $chatbody = $_POST["chatbody"];
                    $chatdate = $_POST["chatdate"];
                    $Cdate = $_POST["Cdate"];
                    echo "<center><form action=\"chatroom.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"chatid\" value=\"$chatid\" ></td></tr>";
                    echo "<tr><td>UserID</td><td><input type=\"text\" name=\"userID\" value=\"$userID\" ></td></tr>";
                    echo "<tr><td>Content</td><td><input type=\"text\" name=\"chatbody\" value=\"$chatbody\" ></td></tr>";
                    echo "<tr><td>Time</td><td><input type=\"text\" name=\"chatdate\" value=\"$chatdate\" ></td></tr>";
                    echo "<tr><td>Date</td><td><input type=\"text\" name=\"Cdate\" value=\"$Cdate\" ></td></tr>";
                    echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"handleEditChatroom\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"chatroom.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                }
                if (isset($_POST["createChatroom"])) {
                    $userID = $_POST["userID"];
                    $chatbody = $_POST["chatbody"];
                    $chatdate = $_POST["chatdate"];
                    $Cdate = $_POST["Cdate"];
                    $sql = "INSERT INTO chattb VALUES('','$userID','$chatbody','$chatdate','$Cdate') ";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
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
                        echo "<center><form action=\"chatroom.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
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
                        echo "<center><form action=\"chatroom.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"chatID\">ChatID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"chatbody\">Content</option>";
                        echo "<option value=\"chatdate\">Time</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchChatroom\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ChatID</td><td>UserID</td><td>Content</td><td>Time</td><td>Date</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["chatid"] . "</td><td>" . $rowS["userID"] . "</td><td>" . $rowS["chatbody"] . "</td><td>" . $rowS["chatdate"] . "</td><td>" . $rowS["date"] . "</td>";
                            echo "<form action=\"chatroom.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"chatid\" value=\"" . $rowS["chatid"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowS["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"chatbody\" value=\"" . $rowS["chatbody"] . "\">";
                            echo "<input type=\"hidden\" name=\"chatdate\" value=\"" . $rowS["chatdate"] . "\">";
                            echo "<input type=\"hidden\" name=\"Cdate\" value=\"" . $rowS["date"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditChatroom\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteChatroom\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"chatroom.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                    }
                }
                if (isset($_POST["submitChatroom"])) {
                    $chatroom = $_POST["handlechatroom"];
                    if ($chatroom == "create") {
                        echo "<center><form action=\"chatroom.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>userID</td><td><input type=\"text\" name=\"userID\" ></td></tr>";
                        echo "<tr><td>Content</td><td><input type=\"text\" name=\"chatbody\" ></td></tr>";
                        echo "<tr><td>Time</td><td><input type=\"text\" name=\"chatdate\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"Cdate\" ></td></tr>";
                        echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createChatroom\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($chatroom == "view" || $chatroom == "edit" || $chatroom == "delete") {
                        echo "<center><form action=\"chatroom.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"chatID\">ChatID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"chatbody\">Content</option>";
                        echo "<option value=\"chatdate\">Time</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchChatroom\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ChatID</td><td>UserID</td><td>Content</td><td>Time</td><td>Date</td></tr>";
                        while ($rowC = mysqli_fetch_array($resultC)) {
                            echo "<tr><td>" . $rowC["chatid"] . "</td><td>" . $rowC["userID"] . "</td><td>" . $rowC["chatbody"] . "</td><td>" . $rowC["chatdate"] . "</td><td>" . $rowC["date"] . "</td>";
                            echo "<form action=\"chatroom.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"chatid\" value=\"" . $rowC["chatid"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowC["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"chatbody\" value=\"" . $rowC["chatbody"] . "\">";
                            echo "<input type=\"hidden\" name=\"chatdate\" value=\"" . $rowC["chatdate"] . "\">";
                            echo "<input type=\"hidden\" name=\"Cdate\" value=\"" . $rowC["date"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditChatroom\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteChatroom\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"chatroom.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"chatroom\" value=\"Back to Chatroom\"></form></center>";
                    }
                }
                if (isset($_POST["chatroom"])||isset($_GET["chatroom"])) {
                    echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"chatroom.php\" method=\"post\">";
                    echo "<h4>Chatroom Management</h4> <select class=\"form-control\" id=\"select-1\"  name=\"handlechatroom\">";
                    echo "<option value=\"create\">Create Chat</option>";
                    echo "<option value=\"view\">View Chat</option>";
                    echo "<option value=\"edit\">Edit Chat</option>";
                    echo "<option value=\"delete\">Delete Chat</option>";
                    echo "</select><br />";
                    echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"submitChatroom\" value=\"submit\">";
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

