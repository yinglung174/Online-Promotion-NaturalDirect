<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
session_start();
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
<html>
    <head>
        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



        <title>wePaint - <?php echo"$rowtitle[1]"; ?></title>

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
            @media screen and (min-width: 765px) {
                #span3 {
                    margin-left:32%;
                }
                #button{
                    margin-left:38%;
                }
            }
            #wepaint li{
                font-weight: bold;
            }
        </style>

        <script type='text/javascript' src='js/jquery/jquery.js'></script>


    </head>
    <body class="page no_js responsive stretched">

        <?php include_once 'shadow.php'; ?>
    </div>
    <div class="slogan">
        <h2>wePaint</h2>
    </div>

    <!-- START PRIMARY -->
    <div id="primary" class="sidebar-no">
        <div class="container group">
            <div class="row">
                <!-- START CONTENT -->
                <div id="content-page" class="span12 content group">
                    <div class="page type-page status-publish group">
                        <div class="section rounded ch-grid margin-top margin-bottom">
                            <div class="services-row row group">
                                <!-- wepaint service -->
                                <div id="span3" class="span5" style=" ">
                                    <div class="circle-services">
                                        <div class="ch-item " style="background-image: url(images/wepaint_small.jpg);">
                                        </div>
                                    </div>

                                    <h4>we<span class="title-highlight">Paint</span></h4>

                                    <ul id="wepaint">
                                        <li>wePaint for household or organisations painting/ repainting jobs</li>
                                        <li>Inclusive painting activity in community</li>
                                        <li>To enjoy a non toxic and VOCs free environment </li>
                                        <li>Avoid to suffer bad smell and allergy caused by the chemicals from wall construction especially for children and pregnant women</li>
                                        <li>Reasonably prices with high quality and non-toxic materials </li>
                                        <li>50% net profit will be used for supporting PWA </li>
                                        <li>Through wePaint, you can support autistic painters by providing them job opportunities</li>
                                        <li>Giving them a chance to learn social competence and working attitude through on the job training held by psychotherapist</li>
                                        <li>Enhance their well-being</li>
                                    </ul><br>
                                    <button id="button" class="btn   btn-indian-night-3 " onclick="location.href = './contact.php'">Contact us now!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear space"></div>
    <div class="clear space"></div>
    <div class="clear space"></div>
    <div class="clear space"></div>


    <?php
    if (!isset($_GET["sid"])) {
        $sid = 1;
    }
    if (isset($_SESSION['No'])) {
        include 'services.php';
    }
    
    ?>





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
