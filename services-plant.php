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
    <title>About us - <?php echo"$rowtitle[1]"; ?></title>
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
    <link rel='stylesheet' id='featurestab-css' href='css/featurestab.css' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-css' href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='ahortcodes-css' href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css' href='css/contact_form.css' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css' href='css/custom.css' type='text/css' media='all' />

    <style type="text/css">
        body {
            background-color: #ffffff;
            background-image: url('images/bg-pattern.png');
            background-repeat: repeat;
            background-position: top left;
            background-attachment: scroll;
        }
        .features-tab-container ul.features-tab-labels li.current-feature{
            background-color: <?php echo $color['header'] ?>;
            color: white;
        }
        #wepaint li{
            font-size:13px;
        }
        @media screen and (min-width: 765px) {
                #span3 {
                    margin-left:32%;
                }
                #button{
                    margin-left:38%;
                }
            }
            
    </style>

    <script type='text/javascript' src='js/jquery/jquery.js'></script>


</head>
<!-- END HEAD -->
<!-- START BODY -->

<body class="home page no_js responsive stretched">

    <?php include_once 'shadow.php'; ?>
</div>
<!-- SLOGAN -->
<div class="slogan">
    <h2>About <b><font color="#009933">wePlant</font></b></h2>
    <h3><b><font color="#009933">wePlant</font></b> is a project from <b><font color="#006622">Natural Direct</font></b></h3>
</div>
<!-- START PRIMARY -->
<div id="primary" class="sidebar-right">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-home" class="span9 content group">
                <div class="page type-page status-publish group">
                    <div class="row">
                        <div id="features-tab-libra" class="features-tab-container  group span9 margin-bottom">
                            <div class="row">
                                <ul class="features-tab-labels span3">

                                    <li class="features-tab-1 current-feature  withicon">
                                        <img src="images/111.png" title="wePaint's Mission" alt="wePaint's Mission" /> What is wePlant?
                                    </li>
                                </ul>
                                <div class="features-tab-wrapper span6">
                                    <div class="features-tab-content features-tab-1 ">
                                        <center><u><h2><font color="#1f7a1f">What is wePlant?</font></h2></u></center>
                                        <ul id="wepaint">
                                        <li>Originated from the upcycling idea by using the empty cans of Mythic Paint as the flower pots</li>
                                        <li>Offers both horticultural therapy and vocational skill training for rehabilitants by hiring them to produce and maintain the plants</li>
                                        <li>A label of drawing could be stuck on the baskets as decoration, which is drawn by the rehabilitants or children with autism. </li>
                                        <li>Plants selected are particularly good at purifying the air in office or interior premises  </li>
                                    </ul><br>
                                    <button id="button" class="btn   btn-indian-night-3 " onclick="location.href = './contact.php'">Contact us now!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- START COMMENTS -->
                <div id="comments"></div>
                <!-- END COMMENTS -->
            </div>
            <!-- END CONTENT -->

            <!-- START SIDEBAR -->
            <div id="sidebar-features" class="span3 sidebar group">
                <div class="widget-1 widget-first widget widget-icon-text group">
                    <img class="imgicon" src="images/icons/set_icons/heart.png" alt="" />
                    <h3><font color="green">Green</font>, <font color="red">Healthy</font> and <font color="orange">Wellness</font> is for Everyone
                    </h3>

                </div>

                <div class="widget-2 widget widget-icon-text group">

                    <img class="imgicon" src="images/icons/set_icons/brush-black.png" alt="" />
                    <h3>To create a <font color="green">green</font> and <font color="brown">safe</font> home for every family
                    </h3>


                </div>
                <div class="widget-3 widget widget-icon-text group">

                    <img class="imgicon" src="images/icons/set_icons/bag-grey.png" alt="" />
                    <h3>To provides job opportunities for persons challenged by <font color="#00bfff">Autism Spectrum Disorder</font>
                    </h3>


                </div>
            </div>
            <!-- END SIDEBAR -->
            <div class="clear"></div>

            <div class="clear"></div>


            <!-- START EXTRA CONTENT -->
            <!-- END EXTRA CONTENT -->
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
<script type='text/javascript' src='js/jquery.colorbox-min.js'></script>
<script type='text/javascript' src='js/jquery.easing.js'></script>
<script type='text/javascript' src='js/jquery.masonry.js'></script>
<script type='text/javascript' src='js/responsive.js'></script>
<script type='text/javascript' src='js/mobilemenu.js'></script>
<script type='text/javascript' src='js/jquery.superfish.js'></script>
<script type='text/javascript' src='js/jquery.placeholder.js'></script>
<script type='text/javascript' src='js/contact.js'></script>
<script type='text/javascript' src='js/jquery.tipsy.js'></script>
<script type='text/javascript' src='js/jquery.cycle.min.js'></script>
<script type='text/javascript' src='js/shortcodes.js'></script>
<script type='text/javascript' src='js/hoverIntent.min.js'></script>
<script type='text/javascript' src='js/media-upload.min.js'></script>
<script type='text/javascript' src='js/jquery.custom.js'></script>

</body>
<!-- END BODY -->

</html>