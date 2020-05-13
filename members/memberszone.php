<!DOCTYPE html>
<?php
$No = $_SESSION["No"];
$login = $_SESSION["login"];
$name = $_SESSION["name"];
$user = $_SESSION["user"];
$pw = $_SESSION["pw"];
$gender = $_SESSION["gender"];
$address = $_SESSION["address"];
$tel = $_SESSION["tel"];
$email = $_SESSION["email"];
$icon = $_SESSION["icon"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/button.css">
        <title></title>
        <style>
            body {margin:0;}

            .icon-bar {
                width: 100%;
                text-align: center;
                background-color: #555;
                overflow: auto;
            }

            .icon-bar a {
                width: 20%;
                padding: 12px 0;
                float: left;
                transition: all 0.3s ease;
                color: white;
                font-size: 36px;
            }

            .icon-bar a:hover {
                background-color: #000;
            }

            .active {
                background-color: #4CAF50 !important;
            }
        </style>
    </head>
    <body>
        <button type="submit"  name="screen" style="background-color:#BADA55;">
        <?php
        if($_SESSION["No"]=="U00000"){
        echo "<center><form action=\"members.php\" method=\"post\">";
        echo "<input class=\"button\" type=\"submit\"  name=\"Admin\" value=\"Admin Management\" ></form></center>";
        }
        ?>
        <h2 align="center">Welcome, <?php echo $name; ?></h2>
        <div class="icon-bar">
            <a class="active" href="members.php"><i class="fa fa-home"></i></a>
            <a href="vieworder.php"><i class="fa fa-search"></i></a>
            <a href="message.php"><i class="fa fa-envelope"></i></a>
            <a href="information.php"><i class="fa fa-globe"></i></a>
            <a href="logout.php"><i class="fa fa-trash"></i></a>
        </div>
        <br /><br /><table><tr><td>
                    <form action="profile.php" method="post">
                        <input type="hidden" name="No" value="<?php $No ?>"/>
                        <input type="hidden" name="login" value="<?php $login ?>"/>
                        <input type="hidden" name="name" value="<?php echo $name; ?>" />
                        <input type="hidden" name="username" value="<?php echo $user; ?>" />
                        <input type="hidden" name="password" value="<?php echo $pw; ?>" />
                        <input type="hidden" name="gender" value="<?php echo $gender; ?>" />
                        <input type="hidden" name="address" value="<?php echo $address; ?>" />
                        <input type="hidden" name="tel" value="<?php echo $tel; ?>" />
                        <input type="hidden" name="email" value="<?php echo $email; ?>" />
                        <input type="hidden" name="icon" value="<?php echo $icon; ?>" />
                        <button type="submit"  name="Submit" class="button"><img src="image/profile.png" width="300" height="100" /></button> </form></td><td>
                    <form action="autism.php" method="post">
                        <input type="hidden" name="No" value="<?php $No ?>"/>
                        <input type="hidden" name="login" value="<?php $login ?>"/>
                        <input type="hidden" name="name" value="<?php echo $name; ?>" />
                        <input type="hidden" name="username" value="<?php echo $user; ?>" />
                        <input type="hidden" name="password" value="<?php echo $pw; ?>" />
                        <input type="hidden" name="gender" value="<?php echo $gender; ?>" />
                        <input type="hidden" name="address" value="<?php echo $address; ?>" />
                        <input type="hidden" name="tel" value="<?php echo $tel; ?>" />
                        <input type="hidden" name="email" value="<?php echo $email; ?>" />
                        <input type="hidden" name="icon" value="<?php echo $icon; ?>" />
                        <button type="submit"  name="Submit" class="button"><img src="image/test.jpg" width="300" height="100" /></button> </form></td></tr><tr><td>
                    <form action="echat/home.php" method="post">
                        <input type="hidden" name="No" value="<?php $No ?>"/>
                        <input type="hidden" name="login" value="<?php $login ?>"/>
                        <input type="hidden" name="name" value="<?php echo $name; ?>" />
                        <input type="hidden" name="username" value="<?php echo $user; ?>" />
                        <input type="hidden" name="password" value="<?php echo $pw; ?>" />
                        <input type="hidden" name="gender" value="<?php echo $gender; ?>" />
                        <input type="hidden" name="address" value="<?php echo $address; ?>" />
                        <input type="hidden" name="tel" value="<?php echo $tel; ?>" />
                        <input type="hidden" name="email" value="<?php echo $email; ?>" />
                        <input type="hidden" name="icon" value="<?php echo $icon; ?>" />
                        <button type="submit"  name="Submit" class="button"><img src="image/chatroom.png" width="300" height="100" /></button> </form></td><td>
                    <form action="memberorder.php" method="post">
                        <input type="hidden" name="No" value="<?php $No ?>"/>
                        <input type="hidden" name="login" value="<?php $login ?>"/>
                        <input type="hidden" name="name" value="<?php echo $name; ?>" />
                        <input type="hidden" name="username" value="<?php echo $user; ?>" />
                        <input type="hidden" name="password" value="<?php echo $pw; ?>" />
                        <input type="hidden" name="gender" value="<?php echo $gender; ?>" />
                        <input type="hidden" name="address" value="<?php echo $address; ?>" />
                        <input type="hidden" name="tel" value="<?php echo $tel; ?>" />
                        <input type="hidden" name="email" value="<?php echo $email; ?>" />
                        <input type="hidden" name="icon" value="<?php echo $icon; ?>" />
                        <button type="submit"  name="Submit" class="button"><img src="image/cart.png" width="300" height="100" /></button> </form></td></tr></table>
            </button>

          </body>
</html>
