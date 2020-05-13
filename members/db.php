<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //db connection
        $db_hostname = "localhost";
        $db_username = "root";
        $db_password = "21800000";

        $db_database = "wepaintphp";
        $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
        if (!$conn) {
            die("Unable to connect to MySQL: " . mysqli_connect_error($conn));
        }
        ?>
    </body>
</html>
