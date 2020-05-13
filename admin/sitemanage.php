<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
include_once '../includes/db_connection.php';
if (isset($_POST['submit'])) {
    $submit_value = $_POST["submit"];
    //handle title update
    if ($submit_value == 'Update') { {
            $title = htmlspecialchars($_POST["title"]);
            $phone = $_POST['phone'];
            $query = "update title set title = '$title', phone = '$phone' where title_id = 1";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            echo "<script>alert('Web title  Modified');window.location.href='sitemanage.php';</script>";
        }
    }
}
if (isset($_POST['color'])) {
    $header = $_POST['head'];
    $top = $_POST['top'];
    $nav = $_POST['nav'];
    $slidebar = $_POST['slide'];
    $login = $_POST['login'];
    $query = "update bg_color set header = '$header', topbar = '$top', nav = '$nav', slidebar = '$slidebar', login = '$login' where id = 1";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "<script>alert('Color  Modified');window.location.href='sitemanage.php';</script>";
}
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
        <h1>Preview</h1>
        <iframe  src="../index.php" frameborder="0" scrolling="no" width="1050" height="550" ></iframe>

        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title"></div>
                        </div>
                        <div class="panel-body">
                            <!-- Form - update title -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Website Title: </label>
                                    <?php
                                    $query = "select * from title where title_id = 1";
                                    $result = mysqli_query($conn, $query);
                                    $count_row = mysqli_num_rows($result);
                                    if ($count_row == 0) {
                                        echo"No title data in database... ";
                                    } else {
                                        $row = mysqli_fetch_row($result);
                                    }
                                    ?>
                                    <input class="form-control"  type="text" name="title" value="<?php echo"$row[1]"; ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Phone number: </label>
                                    <input class="form-control"  type="tel" name="phone" maxlength="8" value="<?php echo"$row[2]"; ?>" >
                                </div>
                                <input style="float: right;" class="btn btn-primary" type="submit" name="submit" value="Update">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title"></div>
                        </div>
                        <div class="panel-body">
                            <!-- color -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <?php
                                    $bgquery = "select * from bg_color";
                                    $bgresult = mysqli_query($conn, $bgquery);
                                    $bgcount_row = mysqli_num_rows($result);
                                    if ($bgcount_row == 0) {
                                        echo"No title data in database... ";
                                    } else {
                                        $row = mysqli_fetch_assoc($bgresult);
                                    }
                                    ?>
                                    <label>topbar: </label><input class="form-control"  type="color" name="top" value="<?php echo"$row[topbar]"; ?>" ><br>
                                    <label>Hover: </label><input class="form-control"  type="color" name="nav" value="<?php echo"$row[nav]"; ?>" ><br>
                                    <label>Login button: </label><input class="form-control"  type="color" name="login" value="<?php echo"$row[login]"; ?>" ><br>
                                    <label>Header: </label><input class="form-control"  type="color" name="head" value="<?php echo"$row[header]"; ?>" ><br>
                                    <label>Backgorund color of social media icon: </label><input class="form-control"  type="color" name="slide" value="<?php echo"$row[slidebar]"; ?>" >
                                </div>
                                <input style="float: right;" class="btn btn-primary" type="submit" name="color" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <!--  Page content -->
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
</body>
</html>