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
    <h2>About <b><font color="#009933">wePaint</font></b></h2>
    <h3><b><font color="#009933">wePaint</font></b> is a project from <b><font color="#006622">Natural Direct</font></b></h3>
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
                                        <img src="images/111.png" title="wePaint's Mission" alt="wePaint's Mission" /> wePaint's Mission
                                    </li>

                                    <li class="features-tab-2  withicon">
                                        <img src="images/layouts.png" title="wePaint operate" alt="wePaint operate" /> wePaint operated
                                    </li>

                                    <li class="features-tab-3  withicon">
                                        <img src="images/shortcodes.png" title="win-win venture" alt="win-win venture" /> win-win venture
                                    </li>

                                    <li class="features-tab-4  withicon">
                                        <img src="images/seo.png" title="wePaint Professional Team" alt="wePaint Professional Team" /> wePaint Professional Team
                                    </li>
                                </ul>
                                <div class="features-tab-wrapper span6">
                                    <div class="features-tab-content features-tab-1 ">
                                        <center><u><h2><font color="#1f7a1f">wePaint's Mission</font></h2></u></center>
                                        <p style="font-size:14px;"  >wePaint is a social project that provides vocational training on wall painting service and job opportunities to the persons challenged by Autism Spectrum Disorders (ASD), in order to equip them with job and social skills, and enable them to have earning power and better integration into the community 
                                            Inclusive painting activity in community.</p>
                                        <b style="font-size:16px;">we = <font color="#00ccff">we</font></b>
                                        <ul>
                                            <li style="font-size:13px;">To enhance the understanding of the community on </li>
                                        </ul>
                                        <ol><li style="font-size:13px;">the importance of health life. </li>
                                            <li style="font-size:13px;">the persons challenged by ASD, and advocate them to provide mutual support to others to build an inclusive society
                                                .</li>
                                        </ol>
                                        <b style="font-size:16px;">we = <font color="#00ccff">we</font>b</b>
                                        <ul>
                                            <li style="font-size:13px;">
                                                Through job provision, the individuals can regain their self-confidence and ultimately better integrate into the community and build their social networks.
                                            </li>
                                        </ul>
                                        <b style="font-size:16px;">we = <font color="#00ccff">we</font>ll-being</b>
                                        <ul>
                                            <li style="font-size:13px;">
                                                Aim to provide a healthy living environment for people and supporting PWA to help people to be happy, healthy and prosperous.
                                            </li>
                                        </ul>


                                    </div>
                                    <div class="features-tab-content features-tab-2 ">
                                        <center><u><h2><font color="#1f7a1f">How does wePaint operate?</font></h2></u></center>

                                        <ul>
                                            <li style="font-size:13px;">Our therapist will screen suitable PWA to join the project.</li>
                                            <li style="font-size:13px;">Natural Direct will arrange professional painters as trainers and provide both in-house and on-the-job trainings to trainees.</li>
                                            <li style="font-size:13px;">Therapist will be a coach to provide social skills training  and vocational training.</li>
                                            <li style="font-size:13px;">Provides wall painting services to varies types of commercial offices/institutions/service organizations/residential decorations, etc..</li>
                                            <li style="font-size:13px;">efficient and quality job by adding beauty and value to your projects.</li>
                                        </ul>
                                        <div class="border-line"></div>
                                        <p style="font-size:18px;">Use of non-toxic <font color="#00b300">eco-friendly materials</font></p>
                                        <ul>
                                            <li style="font-size:13px;">Imported from oversea , Zero VOCs, Zero carcinogens</li>
                                            <li style="font-size:13px;"><font color="red">1,000</font> colors</li>
                                            <li style="font-size:13px;">Non Toxic and VOC free plasters</li>
                                        </ul>
                                        <img class="aligncenter size-full wp-image-1020" title="003" src="images/materials.jpg" alt="" width="180" height="380" />
                                    </div>
                                    <div class="features-tab-content features-tab-3 ">
                                        <center><u><h2><font color="#1f7a1f">Why use wePaint service – </font><font color="#0099ff">win-win venture</font></h2></u></center>
                                        <b style="font-size:16px;"><u><font color="#0099ff">Customer</font></b></u>
                                        <ul>
                                            <li style="font-size:13px;">
                                                To enjoy a non toxic and VOCs free environment 
                                            </li>
                                            <li style="font-size:13px;">
                                                To enjoy a non toxic and VOCs free environment 
                                                Avoid to suffer bad smell and allergy caused by the chemicals from wall construction especially for children and pregnant woman
                                            </li>
                                        </ul>
                                        <b style="font-size:16px;"><u><font color="#0099ff">Pricing</font></b></u>
                                        <ul>
                                            <li style="font-size:13px;">
                                                Reasonably prices with high quality and non-toxic materials 
                                            </li>
                                            <li style="font-size:13px;">
                                                <b><font color="#00cc44">50% net profit</font> will be used for supporting PWA </b>
                                            </li>
                                            <ul>
                                                <li style="font-size:13px;">
                                                    Providing social skills and job skills training 
                                                </li>
                                                <li style="font-size:13px;">
                                                    Organizing inclusive activities
                                                </li>
                                                <li style="font-size:13px;">
                                                    Small funding for potential development 
                                                </li>
                                                <li style="font-size:13px;">
                                                    To establish an integrated centre for A-persons  
                                                </li>
                                            </ul>
                                        </ul>
                                        <b style="font-size:16px;"><u><font color="#0099ff">PWA</font></b></u>
                                        <ul>
                                            <li style="font-size:13px;">
                                                Through wePaint, you can support autistic painters by providing them job opportunity
                                            </li>
                                            <li style="font-size:13px;">
                                                Giving them a chance to learn social competence and working attitude through on the job training held by psychological therapist
                                            </li>
                                            <li style="font-size:13px;">
                                                Enhance their well-being
                                            </li>
                                        </ul>
                                        <center><b style="font-size:18px;"><font color="#ffcc00">WIN-WIN venture to consumers and the painters</font></b></center>
                                        <img class="aligncenter size-full wp-image-1020" title="003" src="images/people_ban.jpg" alt="" width="500" height="380" />
                                    </div>
                                    <div class="features-tab-content features-tab-4 ">
                                        <center><u><h2><font color="#1f7a1f">Reason to choose wePaint – your professional team </font></h2></u></center>
                                        <p>
                                        <ul>
                                            <li style="font-size:13px;">
                                                This project is operated by Natural Direct – comprising of professional green building consultants is familiar with  project management, knowledge & selection of green materials; psychological therapist who professional in ASD training 
                                            </li>
                                            <li style="font-size:13px;">
                                                Natural Direct’s experienced painters will supervise, manage and develop the best on-site arrangements for your projects
                                            </li>
                                        </ul>
                                        <a href="images/seo1.png">
                                            <img class="aligncenter size-full wp-image-1029" title="seo" src="images/proteam.jpg" alt="" width="500" height="433" />
                                        </a>
                                        </p>
                                    </div>
                                    <button id="button" class="btn   btn-indian-night-3 " onclick="location.href = './contact.php'">Contact us now!</button>


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