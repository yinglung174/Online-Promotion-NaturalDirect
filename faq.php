<?php
session_start();
?>
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
<!DOCTYPE html>
<!-- START HEAD -->

<head>
    <meta charset="UTF-8" />

    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



    <title>Frequently asked questions (FAQ) - <?php echo"$rowtitle[1]";?></title>

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
    <link rel='stylesheet' id='filterable-css' href='portfolios/filterable/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css' href='css/contact_form.css' type='text/css' media='all' />
    <link rel='stylesheet' id='colorbox-css' href='css/colorbox.css' type='text/css' media='all' />
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
                        <img src="images/pages/faq1.png" alt="title" />
                    </div>
                    <div class="title-with-icon">
                        <h1>FAQ</h1>
                    </div>
                </div>

                <!-- BREDCRUMB -->
                <div class="breadcrumbs">
                    <span class="before-text">You are here:</span>

                    <p id="yit-breadcrumb" itemprop="breadcrumb">
                        <a class="home" href="index.html">Home Page</a> |
                        FAQ
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE META -->

<!-- START PRIMARY -->
<div id="primary" class="sidebar-right">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-page" class="span9 content group">
                <div class="page type-page status-publish group">
                    <div class="row">
                        <ul class="filters faq">

                            <li>Filter by:</li>

                            <li>
                                <a href="#all" data-option-value="*" class="active">All</a>
                            </li>

                            <li>
                                || <a href="#aboutwePaint" data-option-value=".about-wePaint">About wePaint</a>
                            </li>

                            <li>
                                || <a href="#ASD" data-option-value=".ASD">About Autism Spectrum Disorders (ASD)</a>
                            </li>
                        </ul>
                    </div>

                    <div id="faqs-container">

                        <div class="faq-wrapper all ASD ">
                            <div class="faq-title 9">
                                <div class="plus"></div>
                                <h4>What is Autism Spectrum Disorders (ASD)?</h4>
                            </div>
                            <div class="faq-item 9">
                                <div class="faq-item-content">
                                    <p>The prevalence of ASD is 1% in developed countries , meaning they suffer one of a series of complex brain disorders causing difficulty in social interaction and communication.</p>
                                    There are over 10,000 autistic youth aged 15 to 24 identified in Hong Kong now, but support provided are limited and not targeted to their real needs.<p>
                                        Educators commented that autistic pupils in Hong Kong often struggle in an education system that lacks support and flexibity and affects their developement.
                                        Most services for autistic  individuals are target to children aged 6 or below while support and job opportunity to autistic youth are scarce in Hong Kong.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="faq-wrapper all ASD ">
                            <div class="faq-title 9">
                                <div class="plus"></div>
                                <h4>How many people have ASD(Autism Spectrum Disorder)?</h4>
                            </div>
                            <div class="faq-item 9">
                                <div class="faq-item-content">
                                    <img src="image/asdpercent.JPG" >
    
                                </div>
                            </div>
                        </div>
                        
                        <div class="faq-wrapper all ASD ">
                            <div class="faq-title 9">
                                <div class="plus"></div>
                                <h4>Estimates of People with ASD in Hong Kong</h4>
                            </div>
                            <div class="faq-item 9">
                                <div class="faq-item-content">
                                    <img src="image/asdhk.JPG" >
    
                                </div>
                            </div>
                        </div>

                        <div class="faq-wrapper all ASD ">
                            <div class="faq-title 9">
                                <div class="plus"></div>
                                <h4>What is the cause of autism?</h4>
                            </div>
                            <div class="faq-item 9">
                                <div class="faq-item-content">
                                    <p>In recent years, the world's autism rate is on a rapid increasing trend; from 1: 10,000  in the 80s rising 1:166 in the  20th century.</p>
                                    Causes of autism remain unknown, but  medical research has indicated that genetics play a significant role in the occurrence of autism.<p>
                                        Further research reports also pointed out that the causes may be related to diet, vaccines, environmental toxins.</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-wrapper all about-wePaint ">
                            <div class="faq-title 9">
                                <div class="plus"></div>
                                <h4>What is wePaint</h4>
                            </div>
                            <div class="faq-item 9">
                                <div class="faq-item-content">
                                    <p>wePaint is a social project that provides vocational training on wall painting service and job opportunities to autism people in order to equip them with job skills and enable them to have earning power and better integration into the community.</p>
                                    <p>The project is a joint collaboration of Natural Direct – a social enterprise and New Life Psychiatric Rehabilitation Association iSPARK. </p></div>
                            </div>
                        </div>

                        <div class="faq-wrapper all about-wePaint ">
                            <div class="faq-title 9">
                                <div class="plus"></div>
                                <h4>Why use wePaint service?</h4>
                            </div>
                            <div class="faq-item 9">
                                <div class="faq-item-content">
                                    win-win venture.
                                    Through this project, participating persons / customer s can help autistic painters to  be trained and employed so that they can realise their potential and become self-reliant, while at the same time, make contribution to the community and achieve corporate social responsibility.
                                    We use non-toxic and VOC free paint which promotes a safe , healthy and green.
                                    .Our project trains and employs autistic individuals to perform interior wall painting services which  is charged  at a reasonable price and it is a win-win venture to consumers and autistic painters. </div>
                            </div>
                        </div>

                        <div class="faq-wrapper all about-wePaint ">
                            <div class="faq-title 9">
                                <div class="plus"></div>
                                <h4>What is the reason to choose wePaint?</h4>
                            </div>
                            <div class="faq-item 9">
                                <div class="faq-item-content">
                                    This project is run by Natural Direct – comprising of experienced and professional green home design consultant and is familiar with  home design, selection of materials and related arrangements.
                                    Natural Direct will arrange experienced wall painters to share their expertise , develop nd teach the potential autistic trainees.
                                    ​
                                    If you have any other questions, please feel free to contact us through comments or  messages.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    jQuery(document).ready(function ($) {
                        $('#faqs-container').yit_faq();
                    });
                </script>


                <!-- START COMMENTS -->
                <div id="comments">
                </div>
                <!-- END COMMENTS -->
            </div>
            <!-- END CONTENT -->

            <!-- START SIDEBAR -->
            <div id="sidebar-homeiv" class="span3 sidebar group">
                <div class="widget-first widget widget-icon-text group">
                    <img class="imgicon" src="images/emotion_smile.png" alt="" />

                    <h3>We will make you happy</h3>
                </div>
                <div class="widget widget-icon-text group">
                    <img class="imgicon" src="images/phone5.png" alt="" />

                    <h3>Contact us</h3>

                    <p>Call us +852 81068068</p>
                </div>
                <div class="widget-last widget widget-icon-text group">
                    <img class="imgicon" src="images/flower.png" alt="" />

                    <h3>We&#8217;re kind!</h3>

                    <p>..and do you love us?</p>

                </div>
            </div>
            <!-- END SIDEBAR -->

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
<script type='text/javascript' src='js/jquery/jquery.masonry.min.js'></script>
<script type='text/javascript' src='js/jquery.easing.js'></script>
<script type='text/javascript' src='js/jquery.yit_faq.js'></script>
<script type='text/javascript' src='js/responsive.js'></script>
<script type='text/javascript' src='js/mobilemenu.js'></script>
<script type='text/javascript' src='js/jquery.colorbox-min.js'></script>
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