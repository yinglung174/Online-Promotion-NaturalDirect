<?php
session_start();
?>
<!DOCTYPE html>
<?php
include_once 'includes/db_connection.php';
//get title from database
$query_title = "select * from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);
//get background color
$query = "select *from bg_color where id =1";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$color = mysqli_fetch_assoc($result);
?>
<!-- START HEAD -->

<head>
    <meta charset="UTF-8" />

    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



    <title>Contact us - <?php echo"$rowtitle[1]"; ?></title>

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


    <link rel='stylesheet' id='thickbox-css' href='js/thickbox/thickbox.css' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-css' href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='polaroid-slider-css' href='sliders/polaroid/css/polaroid.css' type='text/css' media='all' />
    <link rel='stylesheet' id='ahortcodes-css' href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css' href='css/contact_form.css' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css' href='css/font-awesome.css' type='text/css' media='all' />
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
<!-- END HEAD -->
<!-- START BODY -->

<body class="home page no_js responsive stretched">

    <?php include_once 'shadow.php'; ?>
</div>
<!-- START PAGE META -->
<div id="page-meta" class="group">
    <div class="container">
        <div class="row">
            <div class="span12">
                <!-- TITLE -->
                <div class="title">
                    <div class="icontitle">
                        <img src="images/contact-form/contact_icon.png" alt="title" />
                    </div>
                    <div class="title-with-icon">
                        <h1>Contact us</h1>
                    </div>
                </div>

                <!-- BREDCRUMB -->
                <div class="breadcrumbs">
                    <span class="before-text">You are here:</span>

                    <p id="yit-breadcrumb" itemprop="breadcrumb">
                        <a class="home" href="index.html">Home Page</a> |
                        <a class="no-link current" href="#">Contact us</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE META -->

<!-- START MAP -->
<div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236153.23802689865!2d113.98093086626095!3d22.357617953549735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3403e2eda332980f%3A0xf08ab3badbeac97c!2z6aaZ5riv!5e0!3m2!1szh-TW!2shk!4v1479728620760" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

    <div class="map-overlay-top"></div>
    <div class="map-overlay-bottom"></div>

</div>
<!-- END MAP -->

<!-- START SLOGAN -->
<div class="slogan">
    <h2>SAY HELLO. WE'D LOVE TO MEET YOU.</h2>

    <h3>seriously.</h3>
</div>
<!-- END SLOGAN -->

<!-- START PRIMARY -->
<div id="primary" class="sidebar-right">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-page" class="span9 content group">
                <div class="page type-page status-publish hentry group">
                    <form class="contact-form row" method="post" enctype="multipart/form-data" action="">

                        <div class="usermessagea"></div>
                        <fieldset>

                            <ul>

                                <li class="text-field with-icon span3">

                                    <label for="name-contact-form">
                                        <span class="mainlabel">Name</span>
                                    </label>

                                    <div class="input-prepend"><span class="add-on">
                                            <img src="images/contact-form/user.png" alt="" title="" /></span>
                                        <input type="text" name="name" id="name-contact-form" class="with-icon required" value="" maxlength="20" required />
                                    </div>

                                    <div class="msg-error"></div>

                                    <div class="clear"></div>
                                </li>

                                <li class="text-field with-icon span3">

                                    <label for="email-contact-form">
                                        <span class="mainlabel">Email</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/contact-form/envelope.png" alt="" title="" />
                                        </span>
                                        <input type="text" name="email" maxlength="50"  id="email-contact-form" class="with-icon required email-validate" value="" required/>
                                    </div>

                                    
                                </li>

                                <li class="text-field with-icon span3">

                                    <label for="phone-contact-form">
                                        <span class="mainlabel">Phone</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/contact-form/phone.png" alt="" title="" />
                                        </span>
                                        <input type="text" name="phone" maxlength="8"  onkeypress='validate(event)'  id="phone-contact-form" class="with-icon" value=""required />
                                    </div>

                                </li>

                                <li class="textarea-field with-icon span9">

                                    <label for="message-contact-form">
                                        <span class="mainlabel">Message</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/contact-form/pencil.png" alt="" title="" />
                                        </span>
                                        <textarea name="message" id="message-contact-form" rows="8" cols="30" class="with-icon required" required></textarea>
                                    </div>


                                </li>

                                <li class="submit-button span9">
                                    <input type="submit" name="contact" value="Send Message" class="sendmail alignright" />
                                    <div class="clear"></div>
                                </li>
                            </ul>
                        </fieldset>
                    </form>

                    
                </div>
            </div>
            <!-- END CONTENT -->

            <!-- START SIDEBAR -->
            <div id="sidebar-contact" class="span3 sidebar group">
                <div class="widget-first widget contact-info">
                    <h3>Contacts</h3>

                    <div class="sidebar-nav">
                        <ul>

                            <li>
                                <i class="icon-map-marker" style="color:#000;font-size:12px;width:12px;height:12px"></i>
                                <span>Address:</span> Hong Kong
                            </li>

                            <li>
                                <i class="icon-phone" style="color:#000;font-size:12px;width:12px;height:12px"></i>
                                <span>Mobile:</span> +85281068068
                            </li>



                            <li>
                                <i class="icon-envelope" style="color:#000;font-size:12px;width:12px;height:12px"></i>
                                <span>Email:</span> adair@naturaldirect.org

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="widget-last widget last-tweets">

                    <div class="list-tweets-2"></div>
                    <p id="follow-twitter">
                        <a href="https://www.facebook.com/WePaint-950298961684277/" target="_blank">
                            Follow us on Facebook &rarr;
                        </a>
                    </p>
                </div>
            </div>
            <!-- END SIDEBAR -->
        </div>
    </div>
</div>
<!-- END PRIMARY -->


<!-- START FOOTER -->
<?php include_once 'footer.php'; ?>
<!-- ENDFOOTER -->

<!-- START COPYRIGHT -->
<?php include_once 'copyright.php'; ?>
<!-- END COPYRIGHT -->

<div class="wrapper-border"></div>

</div>
<!-- END WRAPPER -->

</div>
<!-- END BG SHADOW -->

<script type='text/javascript' src='js/comment-reply.min.js'></script>
<script type='text/javascript' src='js/underscore.min.js'></script>
<script type='text/javascript' src='js/jquery/jquery.masonry.min.js'></script>
<script type='text/javascript' src='js/jquery.colorbox-min.js'></script>
<script type='text/javascript' src='js/jquery.easing.js'></script>
<script type='text/javascript' src='js/hoverIntent.min.js'></script>
<script type='text/javascript' src='js/media-upload.min.js'></script>
<script type='text/javascript' src='js/jquery.clickout.min.js'></script>
<script type='text/javascript' src='js/responsive.js'></script>
<script type='text/javascript' src='js/mobilemenu.js'></script>
<script type='text/javascript' src='js/jquery.superfish.js'></script>
<script type='text/javascript' src='js/jquery.placeholder.js'></script>
<script type='text/javascript' src='js/contact.js'></script>
<script type='text/javascript' src='js/jquery.tipsy.js'></script>
<script type='text/javascript' src='js/jquery.cycle.min.js'></script>
<script type='text/javascript' src='js/shortcodes.js'></script>
<script type='text/javascript' src='js/jquery.custom.js'></script>

</body>
<!-- END BODY -->

</html>