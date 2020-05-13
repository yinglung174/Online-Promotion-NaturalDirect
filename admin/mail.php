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
      <?php  $tableNameE = "email";
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
                        echo "<center><form action=\"mail.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
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
                        echo "<center><form action=\"mail.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                    }
                }
                if (isset($_POST["EditEmail"])) {
                    $emailID = $_POST["emailID"];
                    $userID = $_POST["userID"];
                    $topic = $_POST["topic"];
                    $content = $_POST["content"];
                    $Edate = $_POST["Edate"];
                    $senderID = $_POST["senderID"];
                    echo "<center><form action=\"mail.php\" method=\"post\">";
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
                    echo "<center><form action=\"mail.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
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
                        echo "<center><form action=\"mail.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
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
                        echo "<center><form action=\"mail.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"emailID\">EmailID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"topic\">Topic</option>";
                        echo "<option value=\"content\">Content</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "<option value=\"senderID\">SenderID</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchEmail\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>EmailID</td><td>UserID</td><td>Topic</td><td>Content</td><td>Date</td><td>SenderID</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["emailID"] . "</td><td>" . $rowS["userID"] . "</td><td>" . $rowS["topic"] . "</td><td>" . $rowS["content"] . "</td><td>" . $rowS["date"] . "</td><td>" . $rowS["senderID"] . "</td>";
                            echo "<form action=\"mail.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"emailID\" value=\"" . $rowS["emailID"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowS["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"topic\" value=\"" . $rowS["topic"] . "\">";
                            echo "<input type=\"hidden\" name=\"content\" value=\"" . $rowS["content"] . "\">";
                            echo "<input type=\"hidden\" name=\"Edate\" value=\"" . $rowS["date"] . "\">";
                            echo "<input type=\"hidden\" name=\"senderID\" value=\"" . $rowS["senderID"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditEmail\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteEmail\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"mail.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                    }
                }
                if (isset($_POST["submitEmail"])) {
                    $email = $_POST["handleemail"];
                    if ($email == "create") {
                        echo "<center><form action=\"mail.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>userID</td><td><input type=\"text\" name=\"userID\" ></td></tr>";
                        echo "<tr><td>Topic</td><td><input type=\"text\" name=\"topic\" ></td></tr>";
                        echo "<tr><td>Content</td><td><input type=\"text\" name=\"content\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"Edate\" ></td></tr>";
                        echo "<tr><td>SenderID</td><td><input type=\"text\" name=\"senderID\" ></td></tr>";
                        echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createEmail\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($email == "view" || $email == "edit" || $email == "delete") {
                        echo "<center><form action=\"mail.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"emailID\">EmailID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"topic\">Topic</option>";
                        echo "<option value=\"content\">Content</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "<option value=\"senderID\">SenderID</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchEmail\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>EmailID</td><td>UserID</td><td>Topic</td><td>Content</td><td>Date</td><td>SenderID</td></tr>";
                        while ($rowE = mysqli_fetch_array($resultE)) {
                            echo "<tr><td>" . $rowE["emailID"] . "</td><td>" . $rowE["userID"] . "</td><td>" . $rowE["topic"] . "</td><td>" . $rowE["content"] . "</td><td>" . $rowE["date"] . "</td><td>" . $rowE["senderID"] . "</td>";
                            echo "<form action=\"mail.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"emailID\" value=\"" . $rowE["emailID"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowE["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"topic\" value=\"" . $rowE["topic"] . "\">";
                            echo "<input type=\"hidden\" name=\"content\" value=\"" . $rowE["content"] . "\">";
                            echo "<input type=\"hidden\" name=\"Edate\" value=\"" . $rowE["date"] . "\">";
                            echo "<input type=\"hidden\" name=\"senderID\" value=\"" . $rowE["senderID"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditEmail\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteEmail\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"mail.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"email\" value=\"Back to Email\"></form></center>";
                    }
                }
                if (isset($_POST["email"])||isset($_GET["email"])) {
                    echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"mail.php\" method=\"post\">";
                    echo "<h4>Email Management</h4> <select class=\"form-control\" id=\"select-1\" name=\"handleemail\">";
                    echo "<option value=\"create\">Create Email</option>";
                    echo "<option value=\"view\">View Email</option>";
                    echo "<option value=\"edit\">Edit Email</option>";
                    echo "<option value=\"delete\">Delete Email</option>";
                    echo "</select><br />";
                    echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"submitEmail\" value=\"submit\">";
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

