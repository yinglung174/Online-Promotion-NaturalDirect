
<?php
        //db connection
        $db_hostname = "localhost";
        $db_username = "root";
        $db_password = "21800000";
        $db_database = "wepaintphp";
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if (!$conn) {
            die("Unable to connect to MySQL: " . mysqli_connect_error($conn));
        }
        ?>