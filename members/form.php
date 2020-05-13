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
        <?php include_once 'db.php' ?>   
        <?php
        echo"<br /><center><table class=\"center-table-bordered\">";
        echo"<tr><td>Profile: </td><td><img src=\"$icon\" width=\"100\" height=\"100\" /></td></tr>";
        echo"<tr><td>User No.: </td><td> $No</td></tr>";
        echo"<tr><td>Name: </td><td>$name</td></tr>";
        echo"<tr><td>Gender: </td><td>$gender</td></tr>";
        echo"<tr><td>Address: </td><td>$address</td></tr>";
        echo"<tr><td>Tel.No: </td><td>$tel</td></tr>";
        echo"<tr><td>Email: </td><td>$email</td></tr>";
        echo"<tr><td>Username: </td><td>$user</td></tr>";
        echo"</table></center>";
        ?>
        <br /><br />
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
            <center> <input class="btn btn-primary" type="submit" name="Edit" value="Edit"></center><br>
            <center> <input class="btn btn-danger" type="submit" name="Edit_pwd" value="Change password"></center>
        </form>
        <form action="../index.php" method="post">
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
            <center> <input class="btn btn-warning" type="submit" name="Submit" value="Back"></center> </form>

    </body>
</html>
