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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript">
            function checkPasswordMatch() {
                var password = $("#txtNewPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();

                if (password !== confirmPassword) {
                    $("#acivateAccountButton").attr("disabled", "disabled");
                    $("#divCheckPasswordMatch").html("Passwords do not match!").css('color', 'red');
                } else {
                    $("#acivateAccountButton").removeAttr("disabled");
                    $("#divCheckPasswordMatch").html("Passwords match.").css('color', 'green');
                }
            }

        </script>
    </head>
    <body>
        <table>
            <tr style="margin-left: 50%"></tr>
        </table>
        <?php include_once 'db.php' ?>   
        <?php
        echo "<center><form action=\"profile.php\" method=\"post\">";
        echo"<br /><table class=\"center-table\" >";
        echo"<tr><td>Icon</td><td><input type=\"hidden\" readonly  name=\"icon\" value=\"$icon\" /></td></tr>";
        echo"<tr><td>User No.</td><td> $No <input type=\"hidden\" readonly  name=\"No\" value=\"$No\" /></td></tr>";
        echo"<tr><td>Name</td><td><input type=\"text\" name=\"name\" readonly  value=\"$name\" /></td></tr>";
        echo"<tr><td>Gender</td><td><input type=\"text\" name=\"gender\" readonly  value=\"$gender\" /></td></tr>";
        echo"<tr><td>Address</td><td><input type=\"text\" name=\"address\" readonly  value=\"$address\" /></td></tr>";
        echo"<tr><td>Tel.No</td><td><input type=\"text\" name=\"tel\" value=\"$tel\" readonly  /></td></tr>";
        echo"<tr><td>Email</td><td><input type=\"text\" name=\"email\" value=\"$email\" readonly /></td></tr>";
        echo"<tr><td>Username</td><td><input type=\"text\" name=\"username\" value=\"$user\" readonly /></td></tr>";
        echo"<tr><td>New Passowrd</td><td><input type=\"password\" id=\"txtNewPassword\" name=\"n_password\"  value=\"\" /></td></tr>";
        echo"<tr><td>Confirm Passowrd</td><td><input type=\"password\" id=\"txtConfirmPassword\" onkeyup=\"checkPasswordMatch();\" name=\"c_password\" value=\"\" /></td></tr>";
        echo"</table>";
        echo"<div class=\"registrationFormAlert\" id=\"divCheckPasswordMatch\"></div>";
        echo "<input id=\"acivateAccountButton\" disabled class=\"btn btn-primary\" type=\"submit\" name=\"Update_pwd\" value=\"Submit\" />";
        echo"</form></center>";
        echo "  <form action=\"profile.php\" method=\"post\">";
        echo " <input type=\"hidden\" name=\"No\" value=\"$No\"/>";
        echo "<input type=\"hidden\" name=\"login\" value=\"$login\"/>";
        echo "<input type=\"hidden\" name=\"name\" value=\"$name\" />";
        echo "<input type=\"hidden\" name=\"username\" value=\"$user\" />";
        echo "<input type=\"hidden\" name=\"password\" value=\"$pw\" />";
        echo "<input type=\"hidden\" name=\"gender\" value=\"$gender\" />";
        echo "<input type=\"hidden\" name=\"address\" value=\"$address\" />";
        echo "<input type=\"hidden\" name=\"tel\" value=\"$tel\" />";
        echo "<input type=\"hidden\" name=\"email\" value=\"$email\" />";
        echo "<input type=\"hidden\" name=\"icon\" value=\"$icon\" />";
        echo "<center> <input class=\"btn btn-warning\" type=\"submit\" name=\"Submit\" value=\"Back\"></center> </form>";
        ?>
    </body>
</html>
