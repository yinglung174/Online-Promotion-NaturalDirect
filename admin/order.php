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
      <?php   $tableNamePO = "product_order";
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
                $numOfRecordPO = count((is_countable($rowPO)?$rowPO:[]));
                $numOfRecordSO = count((is_countable($rowSO)?$rowSO:[]));
                $iPO = 0;
                $iSO = 0;
                if (isset($_POST["DeleteSOrder"])) {
                    $pserviceID = $_POST["pserviceID"];
                    $sql = "DELETE FROM service_order WHERE pserviceID = '$pserviceID'";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if ($sql) {
                        echo" <center>Delete Success - Service_Order ID:$pserviceID</center>";
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["DeletePOrder"])) {
                    $porderID = $_POST["porderID"];
                    $sql = "DELETE FROM product_order WHERE porderID = '$porderID'";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if ($sql) {
                        echo" <center>Delete Success - Product_Order ID:$porderID</center>";
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
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
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if ($sql) {
                        echo" <center>Edit Success - Service_Order ID :$pserviceID</center>";
                        echo"<center><table border=\"1\">";
                        echo"<tr><td>Service_OrderID</td><td>$pserviceID</td></tr>";
                        echo"<tr><td>ServiceCode</td><td>$serviceCode</td></tr>";
                        echo"<tr><td>UserID</td><td>$userID</td></tr>";
                        echo"<tr><td>Total</td><td>$total</td></tr>";
                        echo"<tr><td>Date</td><td>$SOdate</td></tr>";
                        echo"</table></center>";
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
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
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
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
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["EditSOrder"])) {
                    $pserviceID = $_POST["pserviceID"];
                    $serviceCode = $_POST["serviceCode"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $SOdate = $_POST["SOdate"];
                    echo "<center><form action=\"order.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"pserviceID\" value=\"$pserviceID\" ></td></tr>";
                    echo "<tr><td>ServiceCode</td><td><input type=\"text\" name=\"serviceCode\" value=\"$serviceCode\" ></td></tr>";
                    echo "<tr><td>UserID</td><td><input type=\"text\" name=\"userID\" value=\"$userID\" ></td></tr>";
                    echo "<tr><td>Total</td><td><input type=\"text\" name=\"total\" value=\"$total\" ></td></tr>";
                    echo "<tr><td>Date</td><td><input type=\"text\" name=\"SOdate\" value=\"$SOdate\" ></td></tr>";
                    echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"handleEditSOrder\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"order.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                }
                if (isset($_POST["EditPOrder"])) {
                     $porderID = $_POST["porderID"];
                    $productCode = $_POST["productCode"];
                    $quantity = $_POST["quantity"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $POdate = $_POST["POdate"];
                    echo "<center><form action=\"order.php\" method=\"post\">";
                    echo "<table border=\"1\">";
                    echo "<input type=\"hidden\" name=\"porderID\" value=\"$porderID\" ></td></tr>";
                    echo "<tr><td>ProductCode</td><td><input type=\"text\" name=\"productCode\" value=\"$productCode\" ></td></tr>";
                    echo "<tr><td>Quantity</td><td><input type=\"text\" name=\"quantity\" value=\"$quantity\" ></td></tr>";
                    echo "<tr><td>UserID</td><td><input type=\"text\" name=\"userID\" value=\"$userID\" ></td></tr>";
                    echo "<tr><td>Total</td><td><input type=\"text\" name=\"total\" value=\"$total\" ></td></tr>";
                    echo "<tr><td>Date</td><td><input type=\"text\" name=\"POdate\" value=\"$POdate\" ></td></tr>";
                    echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"handleEditPOrder\" value=\"Edit\"></td></tr>";
                    echo "</table>";
                    echo "</form></center>";
                    echo "<center><form action=\"order.php\" method=\"post\">";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                }
                if (isset($_POST["createSOrder"])) {
                    $serviceCode = $_POST["serviceCode"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $SOdate = $_POST["SOdate"];
                    $sql = "INSERT INTO service_order VALUES('','$serviceCode','$userID','$total','$SOdate') ";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
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
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["createPOrder"])) {
                     $productCode = $_POST["productCode"];
                    $quantity = $_POST["quantity"];
                    $userID = $_POST["userID"];
                    $total = $_POST["total"];
                    $POdate = $_POST["POdate"];
                    $sql = "INSERT INTO product_order VALUES('','$productCode','$quantity','$userID','$total','$POdate') ";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
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
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["searchOrder"])) {
                    $type = $_POST["type"];
                    $keyword = $_POST["keyword"];
                    if($type=='orderID'){
                        $querySearch = "SELECT * from service_order WHERE pserviceID LIKE '%" . $keyword . "%'";
                        $querySearchP = "SELECT * from product_order WHERE porderID LIKE '%" . $keyword . "%'";
                    }else{
                        $querySearch = "SELECT * from service_order WHERE $type LIKE '%" . $keyword . "%'";
                        $querySearchP = "SELECT * from product_order WHERE $type LIKE '%" . $keyword . "%'";
                    }
                    $resultSearch = mysqli_query($conn, $querySearch);
                    $resultSearchP = mysqli_query($conn, $querySearchP);
                    if (!$resultSearch || !$resultSearchP) {
                        die("Database access failed: " . mysqli_error($conn));
                    } else {
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"orderID\">OrderID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"total\">Total</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchOrder\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>Service_OrderID</td><td>ServiceCode</td><td>UserID</td><td>Total</td><td>Date</td></tr>";
                        while ($rowS = mysqli_fetch_array($resultSearch)) {
                            echo "<tr><td>" . $rowS["pserviceID"] . "</td><td>" . $rowS["serviceCode"] . "</td><td>" . $rowS["userID"] . "</td><td>" . $rowS["total"] . "</td><td>" . $rowS["date"] . "</td>";
                            echo "<form action=\"order.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"pserviceID\" value=\"" . $rowS["pserviceID"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceCode\" value=\"" . $rowS["serviceCode"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowS["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"total\" value=\"" . $rowS["total"] . "\">";
                            echo "<input type=\"hidden\" name=\"SOdate\" value=\"" . $rowS["date"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditSOrder\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteSOrder\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>Product_OrderID</td><td>ProductCode</td><td>Quantity</td><td>UserID</td><td>Total</td><td>Date</td></tr>";
                        while ($rowSP = mysqli_fetch_array($resultSearchP)) {
                            echo "<tr><td>" . $rowSP["porderID"] . "</td><td>" . $rowSP["productCode"] . "</td><td>" . $rowSP["quantity"] . "</td><td>" . $rowSP["userID"] . "</td><td>" . $rowSP["total"] . "</td><td>" . $rowSP["date"] . "</td>";
                            echo "<form action=\"order.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"porderID\" value=\"" . $rowSP["porderID"] . "\">";
                            echo "<input type=\"hidden\" name=\"productCode\" value=\"" . $rowSP["productCode"] . "\">";
                            echo "<input type=\"hidden\" name=\"quantity\" value=\"" . $rowSP["quantity"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowSP["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"total\" value=\"" . $rowSP["total"] . "\">";
                            echo "<input type=\"hidden\" name=\"POdate\" value=\"" . $rowSP["date"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditPOrder\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeletePOrder\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["submitOrder"])) {
                    $order = $_POST["handleorder"];
                    if ($order == "create") {
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Service_Code</td><td><input type=\"text\" name=\"serviceCode\" ></td></tr>";
                        echo "<tr><td>userID</td><td><input type=\"text\" name=\"userID\" ></td></tr>";
                        echo "<tr><td>Total</td><td><input type=\"text\" name=\"total\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"SOdate\" ></td></tr>";
                        echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createSOrder\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "<br><br>";
                        echo "<table border=\"1\">";
                        echo "<tr><td>Product_Code</td><td><input type=\"text\" name=\"productCode\" ></td></tr>";
                        echo "<tr><td>Quantity</td><td><input type=\"text\" name=\"quantity\" ></td></tr>";
                        echo "<tr><td>userID</td><td><input type=\"text\" name=\"userID\" ></td></tr>";
                        echo "<tr><td>Total</td><td><input type=\"text\" name=\"total\" ></td></tr>";
                        echo "<tr><td>Date</td><td><input type=\"text\" name=\"POdate\" ></td></tr>";
                        echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createPOrder\" value=\"Create\"></td></tr>";
                        echo "</table>";
                        echo "</form></center><br><br>";
                    }
                    if ($order == "view" || $order == "edit" || $order == "delete") {
                         echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "Search: <select name=\"type\">";
                        echo "<option value=\"orderID\">OrderID</option>";
                        echo "<option value=\"userID\">UserID</option>";
                        echo "<option value=\"total\">Total</option>";
                        echo "<option value=\"date\">Date</option>";
                        echo "</select>";
                        echo "<input type=\"text\" name=\"keyword\" >";
                        echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchOrder\" value=\"Search\">";
                        echo "</form></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>Service_OrderID</td><td>ServiceCode</td><td>UserID</td><td>Total</td><td>Date</td></tr>";
                        while ($rowSO = mysqli_fetch_array($resultSO)) {
                            echo "<tr><td>" . $rowSO["pserviceID"] . "</td><td>" . $rowSO["serviceCode"] . "</td><td>" . $rowSO["userID"] . "</td><td>" . $rowSO["total"] . "</td><td>" . $rowSO["date"] . "</td>";
                            echo "<form action=\"order.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"pserviceID\" value=\"" . $rowSO["pserviceID"] . "\">";
                            echo "<input type=\"hidden\" name=\"serviceCode\" value=\"" . $rowSO["serviceCode"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowSO["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"total\" value=\"" . $rowSO["total"] . "\">";
                            echo "<input type=\"hidden\" name=\"SOdate\" value=\"" . $rowSO["date"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditSOrder\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteSOrder\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center><br><br>";
                        echo "<center><table border=\"1\"><tr><td>Product_OrderID</td><td>ProductCode</td><td>Quantity</td><td>UserID</td><td>Total</td><td>Date</td></tr>";
                        while ($rowPO = mysqli_fetch_array($resultPO)) {
                            echo "<tr><td>" . $rowPO["porderID"] . "</td><td>" . $rowPO["productCode"] . "</td><td>" . $rowPO["quantity"] . "</td><td>" . $rowPO["userID"] . "</td><td>" . $rowPO["total"] . "</td><td>" . $rowPO["date"] . "</td>";
                            echo "<form action=\"order.php\" method=\"post\">";
                            echo "<input type=\"hidden\" name=\"porderID\" value=\"" . $rowPO["porderID"] . "\">";
                            echo "<input type=\"hidden\" name=\"productCode\" value=\"" . $rowPO["productCode"] . "\">";
                            echo "<input type=\"hidden\" name=\"quantity\" value=\"" . $rowPO["quantity"] . "\">";
                            echo "<input type=\"hidden\" name=\"userID\" value=\"" . $rowPO["userID"] . "\">";
                            echo "<input type=\"hidden\" name=\"total\" value=\"" . $rowPO["total"] . "\">";
                            echo "<input type=\"hidden\" name=\"SOdate\" value=\"" . $rowPO["date"] . "\">";
                            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditPOrder\" value=\"Edit\"></td>";
                            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeletePOrder\" value=\"Delete\"></td>";
                            echo "</form></tr>";
                        }
                        echo "</table></center>";
                        echo "<center><form action=\"order.php\" method=\"post\">";
                        echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"order\" value=\"Back to Order\"></form></center>";
                    }
                }
                if (isset($_POST["order"])||isset($_GET["order"])) {
                    echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"order.php\" method=\"post\">";
                    echo "<h4>Order Management</h4> <select  class=\"form-control\" id=\"select-1\"   name=\"handleorder\">";
                    echo "<option value=\"create\">Create Order</option>";
                    echo "<option value=\"view\">View Order</option>";
                    echo "<option value=\"edit\">Edit Order</option>";
                    echo "<option value=\"delete\">Delete Order</option>";
                    echo "</select><br />";
                    echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"submitOrder\" value=\"submit\">";
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

