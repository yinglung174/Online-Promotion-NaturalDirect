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
    <h2>About <b><font color="#009933">Natural Direct</font></b></h2>
    <h3><b><font color="#009933">Natural Direct</font></b> is a <b>Social Enterprise</b></h3>
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
                                <ul class="features-tab-labels span3" id="features">
                                    <li class="features-tab-0 current-feature withicon">
                                        <img src="images/hi.png" title="Welcome to wePaint" alt="Welcome to wePaint" /> What is Natural Direct?
                                    </li>

                                    <li class="features-tab-1  withicon">
                                        <img src="images/111.png" title="wePaint's Mission" alt="wePaint's Mission" /> Social Enterprise Endorsement Mark
                                    </li>
                                    <li class="features-tab-2  withicon">
                                                                            <img src="images/layouts.png" title="our partners" alt="our partners" /> Our Partners
                                                                        </li>
                                    <!--                                    <li class="features-tab-2  withicon">
                                                                            <img src="images/layouts.png" title="wePaint operate" alt="wePaint operate" /> wePaint operated
                                                                        </li>
                                    
                                                                        <li class="features-tab-3  withicon">
                                                                            <img src="images/shortcodes.png" title="win-win venture" alt="win-win venture" /> win-win venture
                                                                        </li>
                                    
                                                                        <li class="features-tab-4  withicon">
                                                                            <img src="images/seo.png" title="wePaint Professional Team" alt="wePaint Professional Team" /> wePaint Professional Team
                                                                        </li>-->
                                </ul>
                                <div class="features-tab-wrapper span6">
                                    <div class="features-tab-content features-tab-0 current-feature">
                                        <center><u><b><h2><font color="#29a329">Natural Direct</font></h2></b></u></center>
                                        <p style="font-size:18px; margin-top: 5%">
                                            A Social Enterprise that believes 
                                        </p>
                                        <ul>
                                            <li style="font-size:16px;">
                                                <font color="#29a329">“Green, Healthy and Wellness is for Everyone”</font>
                                            </li>
                                            <li style="font-size:16px;">
                                                Everyone deserves the right to use safe and healthy products
                                            </li>
                                            <li style="font-size:16px;">
                                                People challenged by <font color="red">Autism Spectrum Order</font> can be trained and better integrated into the community
                                            </li>
                                        </ul>
                                        <div class="border-line"></div>
                                    </div>

                                    <div class="features-tab-content features-tab-1 ">
                                        <center><u><h2><font color="#1f7a1f">Social Enterprise Endorsement Mark</font></h2></u></center>
                                        <img class="alignleft size-full wp-image-1020" title="003" src="images/certify.png" alt="" width="380" height="400" />
                                        <ul>
                                            <li>
                                                SE set up in APR 2015 
                                            </li>
                                            <li>
                                                SEE Mark granted in May 2016
                                            </li>
                                            Company structure : 
                                            <li>
                                                2 Directors – FSES director & Psycho-therapist
                                            </li>
                                            <li>
                                                2 Contractors & autism painters
                                            </li>
                                            <li>
                                                Freelance artists and volunteers (Students & Parents)
                                            </li>
                                        </ul>


                                    </div>
                                    <div class="features-tab-content features-tab-2 ">
                                        <center><u><h2><font color="#1f7a1f">Our Partners</font></h2></u></center>
                                        <p style="font-size:18px; margin-top: 5%">
                                            Ms. Gigi Morales MBA, CFP
                                        </p>
                                        <ul>
                                            <li>
                                                Gigi has over 15 years of personal banking experience in an international bank. She stepped down in 2005 to take care of her 2 daughters and family. She then obtained a Diploma in Child Psychology from the Open University of Hong Kong. She also served as volunteer in Mother's choice and acted as a mentor in the Children Development Fund Mentorship scheme for 3 years.
                                            </li>
                                            <li>
                                                Always with a passion to serve the community especially the youth, she joined Fullness Social Enterprises Society Limited in 2014 as a Director/Knowledge volunteer and supported SENSE school project to promote social entrepreneurship and social innovation to secondary school students.
                                            </li>
                                            <li>
                                            In Oct 2014, she started Natural Direct Co. Ltd – a social enterprise with another 2 partners and initiated the wePaint project in Oct 2015 with the social mission to train autistic youth wall-painting, provide job opportunities and on-the-job coaching to them, as well as to give support

to their families.
                                            </li>
                                        </ul>
                                         <p style="font-size:18px; margin-top: 5%">
                                           Mr. Li Wing Ho Adair
                                        </p>
 <ul>
                                            <li>
Mr. Adair Li, a veteran psychotherapist, former Manager of ASD services in New Life Psychiatric Rehabilitation Association, acts as the Consultant for our social enterprise. Proposed support will encompass training for trainee, offering advice in the service development and delivery as well as consultation to front line staff and service evaluation.                                            </li>
                                            <li>
Having worked with this special population for almost 10 years, Mr. Li is seasoned in providing treatment, training and consultation in rendering effective services to this clientele and their families. He has once been a psychotherapist for training professionals in working with people challenged by ASD and has been teaching related training course in different associations in the past few years. It is believed that with his professional training as well as continuous consultation, the service would benefit the group of people facing the challenges of ASD engaged in our project.                                            </li>
                                           
                                        </ul>

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
            <div class="margin-bottom">
                <div class="logos-slider wrapper" style="margin-left:5%;">
                    <h2>Our <span class="title-highlight">partners</span></h2>
                    <div class="list_carousel" style="margin-left:5%;">
                        <ul class="logos-slides">
                           

                            <li style="height: 70px;">
                                <a target="_blank" href="http://www.aman01.com/" class="bwWrapper">
                                    <img src="images/slider/aman.gif" style="max-height: 70px;" class="logo" alt="aman" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="https://www.facebook.com/3Hhandicraft/" class="bwWrapper">
                                    <img src="images/slider/3hhandicraft.png" style="max-height: 70px;" class="logo" alt="3hhandicraft" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="https://www.facebook.com/hkvetgroomers" class="bwWrapper">
                                    <img src="images/slider/hkvetgroomer.jpg" style="max-height: 70px;" class="logo" alt="hkvetgroomer" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="http://island.edu.hk/" class="bwWrapper">
                                    <img src="images/slider/esf.png" style="max-height: 70px;" class="logo" alt="esf" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="http://www.hkbu.edu.hk/eng/main/index.jsp" class="bwWrapper">
                                    <img src="images/slider/bu.jpg" style="max-height: 70px;" class="logo" alt="bu" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="http://www.themirahotel.com/zh-hant/" class="bwWrapper">
                                    <img src="images/slider/themira.jpg" style="max-height: 70px;" class="logo" alt="thmira" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="http://www.cisco.com/" class="bwWrapper">
                                    <img src="images/slider/cisco.gif" style="max-height: 70px;" class="logo" alt="cisco" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="http://www.heephong.org/" class="bwWrapper">
                                    <img src="images/slider/heephonsociety.png" style="max-height: 70px;" class="logo" alt="heephonsociety" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="http://www.tungwahcsd.org/" class="bwWrapper">
                                    <img src="images/slider/Tung_Wah_Group_of_Hospitals_logo.svg.png" style="max-height: 70px;" class="logo" alt="Tung_Wah_Group" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="https://www.facebook.com/Hong-Kong-Green-Designers-Association-1582364435381172/" class="bwWrapper">
                                    <img src="images/slider/hongkonggreendesignassociation.jpg" style="max-height: 70px;" class="logo" alt="hongkonggreendesignassociation" />
                                </a>
                            </li>
                            <li style="height: 70px;">
                                <a target="_blank" href="https://www.fses.hk/" class="bwWrapper">
                                    <img src="images/slider/fses.gif" style="max-height: 70px;" class="logo" alt="fses" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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