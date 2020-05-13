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
      <?php   $tableNameA = "autism";
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
                        echo "<center><form action=\"test.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
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
                        echo "<center><form action=\"test.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                    }
                }
                if (isset($_POST["EditTest"])) {
                    $id = $_POST["id"];
                    $engq = $_POST["engq"];
                    $mark = $_POST["mark"];
                    echo "<center><form action=\"test.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"id\" value=\"$id\" ></td></tr>";
                    echo "<tr><td>Question</td><td><input type=\"text\" name=\"engq\" value=\"$engq\" ></td></tr>";
                    echo "<tr><td>Answer</td><td><input type=\"text\" name=\"mark\" value=\"$mark\" ></td></tr>";
                    echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"handleEditTest\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"test.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
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
                        echo "<center><form action=\"test.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
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
                        echo "<center><form action=\"test.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"id\">TestID</option>";
                        echo "<option value=\"engq\">Question</option>";
                        echo "<option value=\"mark\">Answer</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchTest\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>TestID</td><td>Question</td><td>Answer</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["id"] . "</td><td>" . $rowS["engq"] . "</td><td>" . $rowS["mark"] . "</td>";
                            echo "<form action=\"test.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"id\" value=\"" . $rowS["id"] . "\">";
                            echo "<input type=\"hidden\" name=\"engq\" value=\"" . $rowS["engq"] . "\">";
                            echo "<input type=\"hidden\" name=\"mark\" value=\"" . $rowS["mark"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditTest\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteTest\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"test.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                    }
                }
                if (isset($_POST["submitTest"])) {
                    $test = $_POST["handletest"];
                    if ($test == "create") {
                        echo "<center><form action=\"test.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Question</td><td><input type=\"text\" name=\"engq\" ></td></tr>";
                        echo "<tr><td>Answer</td><td><input type=\"text\" name=\"mark\" ></td></tr>";
                        echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createTest\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($test == "view" || $test == "edit" || $test == "delete") {
                        echo "<center><form action=\"test.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"id\">TestID</option>";
                        echo "<option value=\"engq\">Question</option>";
                        echo "<option value=\"mark\">Answer</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchTest\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>TestID</td><td>Question</td><td>Answer</td></tr>";
                        while ($rowA = mysqli_fetch_array($resultA)) {
                            echo "<tr><td>" . $rowA["id"] . "</td><td>" . $rowA["engq"] . "</td><td>" . $rowA["mark"] . "</td>";
                            echo "<form action=\"test.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"id\" value=\"" . $rowA["id"] . "\">";
                            echo "<input type=\"hidden\" name=\"engq\" value=\"" . $rowA["engq"] . "\">";
                            echo "<input type=\"hidden\" name=\"mark\" value=\"" . $rowA["mark"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditTest\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteTest\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"test.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"test\" value=\"Back to Test\"></form></center>";
                    }
                }
                if (isset($_POST["test"])||isset($_GET["test"])) {
                    echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"test.php\" method=\"post\">";
                    echo "<h4>Test Management</h4> <select class=\"form-control\" id=\"select-1\"   name=\"handletest\">";
                    echo "<option value=\"create\">Create Test</option>";
                    echo "<option value=\"view\">View Test</option>";
                    echo "<option value=\"edit\">Edit Test</option>";
                    echo "<option value=\"delete\">Delete Test</option>";
                    echo "</select><br />";
                    echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"submitTest\" value=\"submit\">";
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

