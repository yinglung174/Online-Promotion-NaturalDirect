<?php

session_start();
?>
<?php

include 'db.php';
include("connect.php");
date_default_timezone_set("Asia/Hong_Kong");
$date = date("d/m/Y");
?> 
<?php

if (isset($_POST['register'])) {
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //your site secret key
        $secret = '6LdIARMUAAAAAIsIGO4vV6abYKXGaE3QtJq8aq6s';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            //contact form submission code goes here

            $succMsg = 'Your contact request have submitted successfully.';
            $tableNameU = "user";
            $queryU = "SELECT * from $tableNameU ORDER BY userID ASC";
            $resultU = mysqli_query($conn, $queryU);
            if (!$resultU) {
                die("Database access failed: " . mysqli_error($conn));
            }
            $rowU = mysqli_num_rows($resultU);
            $numOfRecordU = count($rowU);
            $iU = 0;
            while ($rowU = mysqli_fetch_array($resultU)) {
                if ($_POST["username"] != $rowU["username"] && $_POST["username"] != NULL) {
                    $usernameU = $_POST["username"];
                } else {
                    echo "<script>alert('Username is already exist, Please try another one!')</script>";
                    echo"<script>window.open('members.php','_self')</script>";
                    exit();
                    $usernameU = NULL;
                    break;
                }
                $iU += 2;
            }
        } else {
            echo "<script>alert('Robot verification failed, please try again.')</script>";
            echo "<script>window.open('members.php')</script>";
        }
    } else {
        echo "<script>alert('Please click on the reCAPTCHA box. Please try again.')</script>";
        echo "<script>window.open('members.php')</script>";
    }
    if ($usernameU != NULL) {
                $userIDUtemp = $iU + 1;
                $userIDU = "U" . $userIDUtemp;
                $name = $_POST["name"];
                $gender = $_POST["gender"];
                $birth = $_POST["birth"];
                $address = $_POST["address"];
                $tel = $_POST["tel"];
                $mail = $_POST["email"];
                $password = md5($_POST["password"]);
                $sql = "INSERT INTO user VALUES('$userIDU','','$usernameU','$password','$name','$gender','$address','$tel','$mail','0','$birth','$date') ";
                $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                if ($sql) {
                    echo "<script>alert('Data successfully saved, You may now login!')</script>";
                    echo "<script>window.open('members.php','_self')</script>";
                }
            }
}
?>
