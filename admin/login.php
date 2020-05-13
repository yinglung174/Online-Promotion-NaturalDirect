<?php
$echonulluser = '**';
$echonullpwd = '**';
$echoincorrect = '';
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $password = md5($_POST['password']);
    //connect to database
    include_once ('../includes/db_connection.php');
    $query = "select * from user where username = '$user' and password='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_num_rows($result);
    //get ip
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $myip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $myip = $_SERVER['REMOTE_ADDR'];
    }
    //chk user
    if ($user == null || $password == null) {
        $echonulluser = '**Required**';
        $echonullpwd = '**Required**';
    }
    //success
    if ($row == 1 && $user == 'admin') {
        session_start();
        $_SESSION['user_id'] = $user;
        $_SESSION['user_ip'] = $myip;
        //insert login success record
        $query = "insert into login_info(username, date, ip, success) values('$user',now(),'$myip','YES')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        header('Location: index.php');
        exit();
    } if ($row == 0) {
        $_SESSION['user_id'] = $user;
        $_SESSION['user_ip'] = $myip;
        //insert login fail record
        $query1 = "insert into login_info(username, date, ip, success) values('$user',now(),'$myip','NO')";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
        $echoincorrect = 'Incorrect username or password!';
        //check login record, find out the unsuccess record
        $query = "select * from login_info where date('Y-m-d') = date('Y-m-d') and ip='127.0.0.1'and success='NO'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        //count the rows
        $rows = mysqli_num_rows($result);
        //20 chance
        if ($rows > 19) {
            echo "<script>alert('Your ip have been blocked. Please try again later.');</script>";
            exit();
        }
        if ($rows != NULL) {
            $chance = (20 - $rows);
            echo "<script>alert('You still have $chance chance.');</script>";
        }
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login | Natural Direct Co. Ltd</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="css/styles.css" rel="stylesheet">


    </head>
    <body class="login-bg">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Logo -->
                        <div class="logo">
                            <h1><a href="../index.php">Natural Direct Co. Ltd</a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-wrapper">
                        <div class="box">
                            <div class="content-wrap">
                                <h6>Sign In</h6>
                                <form action="login.php" method="post">
                                    <?php echo "$echoincorrect" ?><br>
                                    <input class="form-control" required type="text" name="username" placeholder="Username <?php echo "$echonulluser" ?>">
                                    <input class="form-control" required type="password" name="password" placeholder="Password <?php echo "$echonullpwd" ?>">
                                    <input class="btn btn-primary signup" type="submit" name="submit" value="Login">


                                </form>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>