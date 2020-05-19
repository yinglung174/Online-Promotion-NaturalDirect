<?php
session_start();
include_once '../../includes/db_connection.php';
//get title from database
$query_title = "select title from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chatroom - <?php echo"$rowtitle[0]"; ?></title>
    </head>
    <body>
    <center>
        <?php
        if (isset($_SESSION["fb_id"])) {
                $name = $_SESSION["fb_name"];
                $No =  $_SESSION["fb_id"];
            }elseif (isset($_SESSION["No"])) {
                $username = $_SESSION["user"];
                $password = $_SESSION["pw"];

                $queryUser = "SELECT * from user";
                $resultUser = mysqli_query($conn, $queryUser);
                if (!$resultUser) {
                    die("Database access failed: " . mysqli_error($conn));
                }
                $rowUser = mysqli_num_rows($resultUser);
                $numOfRecordUser = count((is_countable($rowUser)?$rowUser:[]));
                $u = 0;
                while ($rowUser = mysqli_fetch_array($resultUser)) {
                    if ($rowUser["username"] == $username && $rowUser["password"] == $password) {
                        $No = $rowUser["userID"];
                        $user = $rowUser["username"];
                        $pw = $rowUser["password"];
                        $name = $rowUser["name"];
                        $gender = $rowUser["gender"];
                        $address = $rowUser["address"];
                        $tel = $rowUser["tel"];
                        $email = $rowUser["email"];
                        $icon = $rowUser["icon"];
                        $login = "user";
                        break;
                    } elseif ($username == "admin" && $password == "admin") {
                        $No = $rowUser["userID"];
                        $user = $rowUser["username"];
                        $pw = $rowUser["password"];
                        $name = $rowUser["name"];
                        $gender = $rowUser["gender"];
                        $address = $rowUser["address"];
                        $tel = $rowUser["tel"];
                        $email = $rowUser["email"];
                        $icon = $rowUser["icon"];
                        $login = "admin";
                        break;
                    } else {
                        $No = "fail";
                        $user = "fail";
                        $pw = "fail";
                        $login = "fail";
                        $name = "UNKNOWN USER";
                    }
                    $u++;
                }
            }
        
        ?>
        <div id="main">
            <h1>
                <font style="color:red; font-family:Calibri;">e</font>Chat Room<hr>
            </h1>
            <table width="100%" style="background:">
                <tr>
                    <td >
                        <h3 style="color:yellow; font-family:Comic Sans Ms">Welcome <?php echo $name; ?> </h3>
                        <p><a href="choose-color.php" style="text-decoration:none; color:skyblue; margin-left:10px; padding-top:-40px; font-family:tahoma;">(Customize)</a></p>
                    </td>
                </tr>
            </table>
            <?php include'home-auto.php'; ?>

            <br/>
            <form action="send.php" method="POST">
                <input type="hidden" name="No" value="<?php $No ?>"/>
                <input type="hidden" name="name" value="<?php echo $name; ?>" />
                <table width="80%" align="center">
                    <tr>
                        <td align="right"><textarea id="txtarea" name="txtarea" required <?php  if (isset($_SESSION["fb_id"])) { echo "disabled "."placeholder=\"For members only\" "; } ?>></textarea></td><td width="auto"><input type="<?php  if (isset($_SESSION["fb_id"])) { echo "hidden"; }else{ echo "submit"; } ?>" value=">>" id="send" ></div></td>
                    </tr>
                </table>
            </form>
            <form action="../index.php" method="post">
                <center> <input type="submit" name="Submit" value="Back"></center> </form>

        </div>
    </center>
</body>

</html>

<style>
    .names
    {
        padding-top:5px;
    }
    a
    {
        text-decoration:none;
    }
    #lo-but
    {
        color:red;
        height:auto;
        width:80px;
        background:none;
        padding:1px;
        border-radius:2px;
        text-align:center;
        display:block;
        margin-top:-39px;
        margin-right:-3px;

    }

    #send
    {
        width:50px;
        height:50px;
        border-radius:5px;
        border:0px;
        color:white;
        background:skyblue;
        font-size:18px;
    }

    #txtarea
    {
        height:50px;
        width:85%;
        border-radius:5px;
    }

    .item
    {
        color:white;
        text-align:left;
        background:gray;
        width:95%;
        min-height:25px;
        margin-top:17px;
        padding:5px;
        padding-top:-10px;
        border-radius:5px;
    }

    .item2
    {
        color:white;
        text-align:left;
        background:purple;
        width:95%;
        min-height:25px;
        margin-top:17px;
        padding:5px;
        border-radius:5px;
    }

    #chatbox
    {
        max-width:80%;
        min-width:80%;
        height:400px;
        border-radius:5px;
        background:black;
        overflow:scroll;
    }

    #a
    {
        text-decoration:none;
    }

    #reg,#login
    {
        width:110px;
        height:30px;
        border-radius:5px;
    }

    #reg
    {
        background:orange;
    }

    #login
    {
        background:skyblue;
    }


    #main
    {
        height:auto;
        max-width:800px;
        border:2px white solid;
        float:center;
        margin-top:40px;
        border-radius:10px;
    }
    body
    {
        background:black;
        background-repeat:none;
        color:white;
    }
</style>