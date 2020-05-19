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
      <?php $tableNameSE = "service";
                $querySE = "SELECT * from $tableNameSE ORDER BY serviceID ASC";
                $resultSE = mysqli_query($conn, $querySE);
                if (!$resultSE) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowSE = mysqli_num_rows($resultSE);
                $numOfRecordSE = count((is_countable($rowSE)?$rowSE:[]));
                $iSE = 0;
                if (isset($_POST["DeleteService"])) {
                    $serviceID = $_POST["serviceID"];
                    $sql = "DELETE FROM service WHERE serviceID = '$serviceID'";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if ($sql) {
                        echo" <center>Delete Success - ServiceID:$serviceID</center>";
                        echo "<center><form action=\"service.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
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
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
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
                        echo "<center><form action=\"service.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                    }
                }
                if (isset($_POST["EditService"])) {
                    $serviceID = $_POST["serviceID"];
                    $price = $_POST["price"];
                    $serviceUrl = $_POST["serviceUrl"];
                    $code = $_POST["code"];
                    $serviceName = $_POST["serviceName"];
                    $description = $_POST["description"];
                    echo "<center><form action=\"service.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"serviceID\" value=\"$serviceID\" ></td></tr>";
                    echo "<tr><td>Name</td><td><input type=\"text\" name=\"serviceName\" value=\"$serviceName\" ></td></tr>";
                    echo "<tr><td>Code</td><td><input type=\"text\" name=\"code\" value=\"$code\" ></td></tr>";
                    echo "<tr><td>Url</td><td><input type=\"text\" name=\"serviceUrl\" value=\"$serviceUrl\" ></td></tr>";
                    echo "<tr><td>Description</td><td><input type=\"text\" name=\"description\" value=\"$description\" ></td></tr>";
                    echo "<tr><td>Price</td><td><input type=\"text\" name=\"price\" value=\"$price\" ></td></tr>";
                    echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"handleEditService\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"service.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                }
                if (isset($_POST["createService"])) {
                    $price = $_POST["price"];
                    $serviceUrl = $_POST["serviceUrl"];
                    $code = $_POST["code"];
                    $serviceName = $_POST["serviceName"];
                    $description = $_POST["description"];
                    $sql = "INSERT INTO service VALUES('','$price','$serviceUrl','$code','$serviceName','$description') ";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
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
                        echo "<center><form action=\"service.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
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
                        echo "<center><form action=\"service.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"serviceID\">ServiceID</option>";
                        echo "<option value=\"serviceName\">Name</option>";
                        echo "<option value=\"code\">Code</option>";
                        echo "<option value=\"price\">Price</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchService\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ServiceID</td><td>Name</td><td>Code</td><td>Url</td><td>Description</td><td>Price</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["serviceID"] . "</td><td>" . $rowS["serviceName"] . "</td><td>" . $rowS["code"] . "</td><td><img src='" . $rowS["serviceUrl"] . "' width='75' height='75' /></td><td>" . $rowS["description"] . "</td><td>" . $rowS["price"] . "</td>";
                            echo "<form action=\"service.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"serviceID\" value=\"" . $rowS["serviceID"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceName\" value=\"" . $rowS["serviceName"] . "\">";
                            echo "<input type=\"hidden\" name=\"code\" value=\"" . $rowS["code"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceUrl\" value=\"" . $rowS["serviceUrl"] . "\">";
                            echo "<input type=\"hidden\" name=\"description\" value=\"" . $rowS["description"] . "\">";
                            echo "<input type=\"hidden\" name=\"price\" value=\"" . $rowS["price"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditService\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteService\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"service.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                    }
                }
                if (isset($_POST["submitService"])) {
                    $service = $_POST["handleservice"];
                    if ($service == "create") {
                        echo "<center><form action=\"service.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Url</td><td><input type=\"text\" name=\"serviceUrl\" ></td></tr>";
                        echo "<tr><td>Name</td><td><input type=\"text\" name=\"serviceName\" ></td></tr>";
                        echo "<tr><td>Code</td><td><input type=\"text\" name=\"code\" ></td></tr>";
                        echo "<tr><td>Description</td><td><input type=\"text\" name=\"description\" ></td></tr>";
                        echo "<tr><td>Price</td><td><input type=\"text\" name=\"price\" ></td></tr>";
                        echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createService\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($service == "view" || $service == "edit" || $service == "delete") {
                        echo "<center><form action=\"service.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"serviceID\">ServiceID</option>";
                        echo "<option value=\"serviceName\">Name</option>";
                        echo "<option value=\"code\">Code</option>";
                        echo "<option value=\"price\">Price</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchService\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ServiceID</td><td>Name</td><td>Code</td><td>Url</td><td>Description</td><td>Price</td></tr>";
                        while ($rowSE = mysqli_fetch_array($resultSE)) {
                            echo "<tr><td>" . $rowSE["serviceID"] . "</td><td>" . $rowSE["serviceName"] . "</td><td>" . $rowSE["code"] . "</td><td><img src='" . $rowSE["serviceUrl"] . "' width='75' height='75' /></td><td>" . $rowSE["description"] . "</td><td>" . $rowSE["price"] . "</td>";
                            echo "<form action=\"service.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"serviceID\" value=\"" . $rowSE["serviceID"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceName\" value=\"" . $rowSE["serviceName"] . "\">";
                            echo "<input type=\"hidden\" name=\"code\" value=\"" . $rowSE["code"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceUrl\" value=\"" . $rowSE["serviceUrl"] . "\">";
                            echo "<input type=\"hidden\" name=\"description\" value=\"" . $rowSE["description"] . "\">";
                            echo "<input type=\"hidden\" name=\"price\" value=\"" . $rowSE["price"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditService\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteService\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"service.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"service\" value=\"Back to Service\"></form></center>";
                    }
                }
                if (isset($_POST["service"])||isset($_GET["service"])) {
                    echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"service.php\" method=\"post\">";
                    echo "<h4>Service Management</h4> <select class=\"form-control\" id=\"select-1\"  name=\"handleservice\">";
                    echo "<option value=\"create\">Create Service</option>";
                    echo "<option value=\"view\">View Service</option>";
                    echo "<option value=\"edit\">Edit Service</option>";
                    echo "<option value=\"delete\">Delete Service</option>";
                    echo "</select><br />";
                    echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"submitService\" value=\"submit\">";
                    echo "</form></center></div></div></div>";
                } ?>
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
