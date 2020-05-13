<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
session_start();
include_once 'includes/db_connection.php';
require_once 'inc/fbConfig.php';
require_once 'inc/User.php';
//get title from database
$query_title = "select title from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);
?>

<?php
    //Get user profile data from facebook
    $fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');

    //Initialize User class
    $user = new User();

    //Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider' => 'facebook',
        'oauth_uid' => $fbUserProfile['id'],
        'first_name' => $fbUserProfile['first_name'],
        'last_name' => $fbUserProfile['last_name'],
        'email' => $fbUserProfile['email'],
        'gender' => $fbUserProfile['gender'],
        'locale' => $fbUserProfile['locale'],
        'picture' => $fbUserProfile['picture']['data']['url'],
        'link' => $fbUserProfile['link']
    );
    $userData = $user->checkUser($fbUserData);

    //Put user data into session
    $_SESSION["userData"] = $userData;
    $_SESSION["fb_id"] = $fbUserProfile['id'];
    $_SESSION["fb_name"] = $fbUserProfile['first_name'];
    $_SESSION["fb_img"] = '<img height="40px" width="40px" src="' . $userData['picture'] . '">';
    $_SESSION["fb_email"] = $fbUserProfile['email'];

    //Render facebook profile data
    if (!empty($userData)) {
        $output = '<h1>Facebook Profile Details </h1>';
        $output .= '<img src="' . $userData['picture'] . '">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'] . ' ' . $userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Facebook';
        $output .= '<br/><a href="' . $userData['link'] . '" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="fb_logout.php">Facebook</a>';
    } else {
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
    ?>

<html>
    <head>
        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



        <title>Profile - <?php echo"$rowtitle[0]" ?></title>

        <!-- RESET STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
        <!-- BOOTSTRAP STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css" />
        <!-- MAIN THEME STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="style.css" />

        <!-- [favicon] begin -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- [favicon] end -->

        <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
        <!-- For iPad3 with retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x.png">
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57x.png" />
        <link rel="stylesheet" type="text/css" href="css/button.css">

        <link rel='stylesheet' id='thickbox-css' href='js/thickbox/thickbox.css' type='text/css' media='all' />
        <link rel='stylesheet' id='google-fonts-css' href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
        <link rel='stylesheet' id='fontawesome-css' href='css/font-awesome.css' type='text/css' media='all' />
        <link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all' />
        <link rel='stylesheet' id='polaroid-slider-css' href='sliders/polaroid/css/polaroid.css' type='text/css' media='all' />
        <link rel='stylesheet' id='ahortcodes-css' href='css/shortcodes.css' type='text/css' media='all' />
        <link rel='stylesheet' id='contact-form-css' href='css/contact_form.css' type='text/css' media='all' />
        <link rel='stylesheet' id='blog-libra-big-css' href='blog/libra-big/css/style.css' type='text/css' media='all' />
        <link rel='stylesheet' id='custom-css' href='css/custom.css' type='text/css' media='all' />

        <style type="text/css">
            body {
                background-color: #ffffff;
                background-image: url('images/bg-pattern.png');
                background-repeat: repeat;
                background-position: top left;
                background-attachment: scroll;
            }
        </style>

        <script type='text/javascript' src='js/jquery/jquery.js'></script>


    </head>
    <body class="page no_js responsive stretched">
        <?php include_once 'shadow.php'; ?>
    </div>
    <div class="slogan">
        <h2>Profile</h2>
    </div>
    <!-- START PRIMARY -->

    

    <div class="center"><?php echo $output; ?></div>




    <!-- START FOOTER -->
    <?php include_once '../footer.php'; ?>
    <!-- ENDFOOTER -->

    <!-- START COPYRIGHT -->
    <?php include_once '../copyright.php'; ?>
    <!-- END COPYRIGHT -->

    <div class="wrapper-border"></div>

</div>
<!-- END WRAPPER -->

</div>
<!-- END BG SHADOW -->
<!-- END BG SHADOW -->

<script type='text/javascript' src='js/comment-reply.min.js'></script>
<script type='text/javascript' src='js/underscore.min.js'></script>
<script type='text/javascript' src='js/jquery/jquery.masonry.min.js'></script>
<script type='text/javascript' src='js/jquery.easing.js'></script>
<script type='text/javascript' src='js/hoverIntent.min.js'></script>
<script type='text/javascript' src='js/media-upload.min.js'></script>
<script type='text/javascript' src='js/jquery.clickout.min.js'></script>
<script type='text/javascript' src='js/responsive.js'></script>
<script type='text/javascript' src='js/mobilemenu.js'></script>
<script type='text/javascript' src='js/jquery.superfish.js'></script>
<script type='text/javascript' src='js/jquery.colorbox-min.js'></script>
<script type='text/javascript' src='js/jquery.placeholder.js'></script>
<script type='text/javascript' src='js/contact.js'></script>
<script type='text/javascript' src='js/jquery.tweetable.js'></script>
<script type='text/javascript' src='js/jquery.tipsy.js'></script>
<script type='text/javascript' src='js/jquery.cycle.min.js'></script>
<script type='text/javascript' src='js/shortcodes.js'></script>
<script type='text/javascript' src='js/jquery.custom.js'></script>
</body>
</html>
