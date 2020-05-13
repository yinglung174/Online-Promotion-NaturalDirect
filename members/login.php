<?php
//Include FB config file && User class
require_once 'inc/fbConfig.php';
require_once 'inc/User.php';
$fbUser = NULL;
$loginURL = $facebook->getLoginUrl(array('redirect_uri' => $redirectURL, 'scope' => $fbPermissions));
$output = '<a href="' . $loginURL . '"><img src="images/fblogin-btn.png"></a>';
?>
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
        <link rel="stylesheet" type="text/css" href="css/button.css">
        <link href="css/bootstrap.css" rel="stylesheet" />
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
    </head>
    <body><center>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '1384493418236629',
                    xfbml: true,
                    version: 'v2.9'
                });
                FB.AppEvents.logPageView();
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <br> <form action="members.php" method="post">
            <center><h2>Sign In</h2></center><br>
            <div> <table align="center">
                    <?php echo $output; ?><br>
                    OR

                    <!--login system-->
                    <tr><td><span>Username:</span></td><td><input type="text" name="username"></td></tr>
                    <tr><td><span>Password:</span></td><td><input type="password" name="password"></td></tr>
                    <tr><td></td><td><input class="button" type="submit" name="Submit" value="Login"><input class="button" type="reset" name="Reset" value="Reset"></td></tr>
                </table></div>
        </form>
        <br />
        <!--register button-->
        <center> <a  href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#su">
                Register
            </a></center>
        <br />
        <ul>
            <li><a href="faq.php">F&Qs</a></li>
            <li><a href="guide.php">User Guide</a></li>
            <li><a href="password.php">Forgot Your Password?</a></li>
            <li><a href="password.php">Find Out Your User ID</a></li>
        </ul>
        <br>
<!--        <center><a href="donation.php"><img src="image/donation.png" height="100" width="300"/></a></center>-->
        <div class="modal fade" id="su" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
            <div class="modal-dialog modal-sm">
                <div style="color:white;background-color:#008CBA" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Registration Form</h4>
                    </div>
                    <div class="modal-body">


                        <form role="form" method="post" action="register.php">
                            <fieldset>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" type="text" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" placeholder="Gender" name="gender">
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Address" name="address" type="text" required>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email" required>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Tel.No" name="tel" type="number" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Birth of Date" name="birth" type="date" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <div style="height: 40px" class="g-recaptcha" data-sitekey="6LdIARMUAAAAADJ9-iCEYxGdhr7ReqVNT_kpdWdT"></div>
                            </fieldset>


                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-md btn-warning btn-block" name="register">Sign Up</button>

                        <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--  Jquery Core Script -->
        <script src="js/jquery-1.10.2.js"></script>
        <!--  Core Bootstrap Script -->
        <script src="js/bootstrap.js"></script>
        <!--  Flexslider Scripts --> </center>
</body>
</html>
