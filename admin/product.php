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
      <?php $tableNameP = "product";
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
                        echo "<center><form action=\"product.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
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
                        echo "<center><form action=\"product.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                    }
                }
                if (isset($_POST["EditProduct"])) {
                    $productID = $_POST["productID"];
                    $price = $_POST["price"];
                    $productUrl = $_POST["productUrl"];
                    $code = $_POST["code"];
                    $productName = $_POST["productName"];
                    $description = $_POST["description"];
                    echo "<center><form action=\"product.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"productID\" value=\"$productID\" ></td></tr>";
                    echo "<tr><td>Name</td><td><input type=\"text\" name=\"productName\" value=\"$productName\" ></td></tr>";
                    echo "<tr><td>Code</td><td><input type=\"text\" name=\"code\" value=\"$code\" ></td></tr>";
                    echo "<tr><td>Url</td><td><input type=\"text\" name=\"productUrl\" value=\"$productUrl\" ></td></tr>";
                    echo "<tr><td>Description</td><td><input type=\"text\" name=\"description\" value=\"$description\" ></td></tr>";
                    echo "<tr><td>Price</td><td><input type=\"text\" name=\"price\" value=\"$price\" ></td></tr>";
                    echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"handleEditProduct\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"product.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
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
                        echo "<center><form action=\"product.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
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
                        echo "<center><form action=\"product.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"productID\">ProductID</option>";
                        echo "<option value=\"productName\">Name</option>";
                        echo "<option value=\"code\">Code</option>";
                        echo "<option value=\"price\">Price</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchProduct\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ProductID</td><td>Name</td><td>Code</td><td>Url</td><td>Description</td><td>Price</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["productID"] . "</td><td>" . $rowS["productName"] . "</td><td>" . $rowS["code"] . "</td><td><img src='" . $rowS["productUrl"] . "' width='75' height='75' /></td><td>" . $rowS["description"] . "</td><td>" . $rowS["price"] . "</td>";
                            echo "<form action=\"product.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"productID\" value=\"" . $rowS["productID"] . "\">";
                            echo "<input type=\"hidden\" name=\"productName\" value=\"" . $rowS["productName"] . "\">";
                            echo "<input type=\"hidden\" name=\"code\" value=\"" . $rowS["code"] . "\">";
                            echo "<input type=\"hidden\" name=\"productUrl\" value=\"" . $rowS["productUrl"] . "\">";
                            echo "<input type=\"hidden\" name=\"description\" value=\"" . $rowS["description"] . "\">";
                            echo "<input type=\"hidden\" name=\"price\" value=\"" . $rowS["price"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditProduct\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteProduct\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"product.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                    }
                }
                if (isset($_POST["submitProduct"])) {
                    $product = $_POST["handleproduct"];
                    if ($product == "create") {
                        echo "<center><form action=\"product.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Url</td><td><input type=\"text\" name=\"productUrl\" ></td></tr>";
                        echo "<tr><td>Name</td><td><input type=\"text\" name=\"productName\" ></td></tr>";
                        echo "<tr><td>Code</td><td><input type=\"text\" name=\"code\" ></td></tr>";
                        echo "<tr><td>Description</td><td><input type=\"text\" name=\"description\" ></td></tr>";
                        echo "<tr><td>Price</td><td><input type=\"text\" name=\"price\" ></td></tr>";
                        echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createProduct\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center>";
                    }
                    if ($product == "view" || $product == "edit" || $product == "delete") {
                        echo "<center><form action=\"product.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"productID\">ProductID</option>";
                        echo "<option value=\"productName\">Name</option>";
                        echo "<option value=\"code\">Code</option>";
                        echo "<option value=\"price\">Price</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchProduct\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>ProductID</td><td>Name</td><td>Code</td><td>Url</td><td>Description</td><td>Price</td></tr>";
                        while ($rowP = mysqli_fetch_array($resultP)) {
                            echo "<tr><td>" . $rowP["productID"] . "</td><td>" . $rowP["productName"] . "</td><td>" . $rowP["code"] . "</td><td><img src='" . $rowP["productUrl"] . "' width='75' height='75' /></td><td>" . $rowP["description"] . "</td><td>" . $rowP["price"] . "</td>";
                            echo "<form action=\"product.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"productID\" value=\"" . $rowP["productID"] . "\">";
                            echo "<input type=\"hidden\" name=\"productName\" value=\"" . $rowP["productName"] . "\">";
                            echo "<input type=\"hidden\" name=\"code\" value=\"" . $rowP["code"] . "\">";
                            echo "<input type=\"hidden\" name=\"productUrl\" value=\"" . $rowP["productUrl"] . "\">";
                            echo "<input type=\"hidden\" name=\"description\" value=\"" . $rowP["description"] . "\">";
                            echo "<input type=\"hidden\" name=\"price\" value=\"" . $rowP["price"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditProduct\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteProduct\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"product.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"product\" value=\"Back to Product\"></form></center>";
                    }
                }
                if (isset($_POST["product"])||isset($_GET["product"])) {
                    echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"product.php\" method=\"post\">";
                    echo "<h4>Product Management </h4><select class=\"form-control\" id=\"select-1\" name=\"handleproduct\">";
                    echo "<option value=\"create\">Create Product</option>";
                    echo "<option value=\"view\">View Product</option>";
                    echo "<option value=\"edit\">Edit Product</option>";
                    echo "<option value=\"delete\">Delete Product</option>";
                    echo "</select><br />";
                    echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"submitProduct\" value=\"submit\">";
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
