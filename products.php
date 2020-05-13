<?php
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 
        <?php
        Include 'includes/db_connection.php';
        include("includes/connect.php");
        $start = 0;
        $limit = 8;
          if (isset($_GET["detail"])) {
            echo "<center><br><font size='5'><b>".$_GET["name"]."</b></font><br><br>";
            echo "<font size='3'>".$_GET["detail"]."</font><br><br>";
            echo "<a href='product.php'>Back</a></center>";
        } else {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $start = ($id - 1) * $limit;
            }
            $query = "SELECT * FROM product ORDER BY productID ASC LIMIT $start,$limit";
            // execute the query 
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $code = $row["code"];
                // created an associative array.
                // the key is the $code and value is detail of details row
                $product_array [$code] = $row;
            }
            if (!empty($product_array)) {
                // use foreach loop 
                // to display the product detail
                $count = 1;
                echo "<table border='3'>";
                foreach ($product_array as $key => $value) {
                    if ($count % 4 == 1) {
                        echo "<tr>";
                    }
                    echo "<td width='300'><center>";
                    ?>
                    <div>
                        <form method="GET" action="members/memberorder.php">
                            <input type="hidden" name="action" value="add"/>
                            <input type="hidden" name="code" value="<?php echo $product_array[$key]["code"]; ?>"/>
                            <a href="<?php echo 'product.php?detail=' . $product_array[$key]["description"].'&name='.$product_array[$key]["productName"]; ?>"><img src="<?php echo $product_array[$key]["productUrl"]; ?>" width="200" height="200"></a><br>
                            <b><?php echo $product_array[$key]["productName"]; ?></b><br>
                            <?php echo "$" . $product_array[$key]["price"]; ?>
                            <input type="text" name="quantity" value="1" size="2" />
                            <input class="cart" type="submit" value="Add to cart" />
                        </form>
                    </div>
                    <?php
                    echo "</center></td>";
                    if ($count % 4 == 0) {
                        echo "</tr>";
                    }
                    $count++;
                }
                echo "</table>";
            }
            ?>
            <?php
            $roww = mysql_num_rows(mysql_query("select * from product"));
            $totall = ceil($roww / $limit);
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
        }
        ?>




    </body>
</html>
