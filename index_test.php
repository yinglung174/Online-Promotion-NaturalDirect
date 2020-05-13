<?php
session_start();
include_once 'includes/db_connection.php';
$query_title = "select * from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);
//get record of database
$record_count = $conn->query("SELECT * FROM posts");
//amount displayed per page
$per_page = 9;
//number of pages
$pages = ceil($record_count->num_rows / $per_page);
//get page number
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 1;
}
if ($page <= 0) {
    $start = 0;
} else {
    $start = $page * $per_page - $per_page;
}
$prev = $page - 1;
$next = $page + 1;
//LEFT(body,100) AS body to show only 100 words in the body 
$query = $conn->prepare("SELECT post_id, title, LEFT(body,150) AS body, category, posted, extract(month from posted), extract(DAY from posted) FROM posts INNER JOIN category ON category.category_id=posts.category_id order by post_id DESC limit $start, $per_page");
$query->execute();
$query->bind_result($post_id, $title, $body, $category, $posted, $date[0], $date[1]);
?>
<!DOCTYPE html>
<!-- START HEAD -->
<head>
    <meta charset="UTF-8" />

    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



    <!-- website title -->
    <title><?php echo"$rowtitle[1]"; ?></title>

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


    <link rel='stylesheet' id='thickbox-css'  href='js/thickbox/thickbox.css' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-css'  href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css'  href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='flexslider-css' href='sliders/flexslider/css/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='flex-slider-css' href='sliders/flexslider/css/slider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='flexslider-elegant-css' href='sliders/flexslider-elegant/css/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='flex-slider-elegant-css' href='sliders/flexslider-elegant/css/slider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='ahortcodes-css'  href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css'  href='css/contact_form.css' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css'  href='css/custom.css' type='text/css' media='all' />

    <style type="text/css">
        body { background-color: #ffffff; background-image: url('images/bg-pattern.png'); background-repeat: repeat; background-position: top left; background-attachment: scroll; }
        #slider-flexslider-elegant-0{
            height: 400px;
            
        }
        
    </style>

    <script type='text/javascript' src='js/jquery/jquery.js'></script>


</head>
<!-- END HEAD -->
<!-- START BODY -->
<body class="home page no_js responsive stretched">

    <!-- START BG SHADOW -->
    <?php include_once 'shadow.php'; ?>

    <!-- BEGIN NIVO SLIDER -->
    <?php include_once 'slider_test.php'; ?>
</div>
<!-- END HEADER -->
<div class="slider-space"></div>
<!-- START PRIMARY -->
<div id="primary" class="sidebar-no">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-home" class="span12 content group">
                <div class="page type-page status-publish hentry group">
                    <div class="box-sections numbers-sections margin-bottom ">
                        <div class="number number-left number-zero"></div>
                        <div class="number number-right number-1"></div>
                        <h4>
                            Marketing <span class="title-highlight">solutions</span>
                        </h4>
                        <p>
                            Quisque nec mi eu nibh aliquam elementum. Ut cursus nisl sit amet sapien dignissim at adipiscing lectus ornare lorem lorem dieus.
                        </p>
                    </div>

                    <div class="box-sections numbers-sections margin-bottom ">
                        <div class="number number-left number-zero"></div>
                        <div class="number number-right number-2"></div>
                        <h4>
                            Brand <span class="title-highlight">identity</span>
                        </h4>
                        <p>
                            Quisque nec mi eu nibh aliquam elementum. Ut cursus nisl sit amet sapien dignissim at adipiscing lectus ornare lorem lorem dieus.
                        </p>
                    </div>

                    <div class="box-sections numbers-sections margin-bottom ">
                        <div class="number number-left number-zero"></div>
                        <div class="number number-right number-3"></div>
                        <h4>
                            Web <span class="title-highlight">design</span>
                        </h4>
                        <p>
                            Quisque nec mi eu nibh aliquam elementum. Ut cursus nisl sit amet sapien dignissim at adipiscing lectus ornare lorem lorem dieus.
                        </p>
                    </div>

                    <div class="box-sections numbers-sections margin-bottom  last">
                        <div class="number number-left number-zero"></div>
                        <div class="number number-right number-4"></div>
                        <h4>
                            Another <span class="title-highlight">service!</span>
                        </h4>
                        <p>
                            Quisque nec mi eu nibh aliquam elementum. Ut cursus nisl sit amet sapien dignissim at adipiscing lectus ornare lorem lorem dieus.
                        </p>
                    </div>
                    <div class="clear"></div>
                    <div class="row">
                        <!-- START SECTION BLOG -->
                        <div class="section blog margin-bottom span12">
                            <h2 class="title">
                                From the <span class="title-highlight">blog</span>
                            </h2>
                            <div class="row">
                                <div class="post type-post status-publish format-video category-design span6 sticky">
                                    <div class="row">
                                        <div class="thumbnail span3">
                                            <img width="263" height="243" src="images/3-263x243.jpg" class="attachment-section_blog wp-post-image" alt="3" />
                                            <div class="date span1">
                                                <p>
                                                    <span class="month">Oct</span>
                                                    <span class="day">17</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="the-content span3">
                                            <h4>
                                                <a href="blog-detail.html" title="Section shortcodes &amp; sticky posts!">
                                                    Section shortcodes &amp; sticky posts!
                                                </a>
                                            </h4>

                                            <p>
                                                Fusce nec accumsan eros. Aenean ac orci a magna vestibulum posuere quis nec nisi.
                                                Maecenas rutrum vehicula condimentum. Donec volutpat nisl ac mauris consectetur gravida.
                                            </p>

                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel vulputate nibh.
                                                Pellentesque habitant <strong>morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas.
                                            </p>

                                            <p>
                                                <a href="blog-detail.html" class="more-link">|| read the article</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="post type-post status-publish format-standard category-design category-themes tag-cleam tag-corporate tag-minimal span3">
                                    <div class="row">
                                        <div class="date span1">
                                            <p>
                                                <span class="month">Nov</span>
                                                <span class="day">20</span>
                                            </p>
                                        </div>

                                        <div class="meta span2">
                                            <h4>
                                                <a href="blog-detail.html" title="Nice &amp; Clean. The best for your blog!">
                                                    Nice &amp; Clean. The best for your blog!
                                                </a>
                                            </h4>
                                            <p class="author">by <strong>Nicola Mustone</strong></p>
                                            <p class="comments">
                                                <a href="blog-detail.html#respond" title="Comment on Nice &amp; Clean. The best for your blog!">
                                                    <strong>Comments:</strong> 0
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="post type-post status-publish format-audio category-themes span3">
                                    <div class="row">
                                        <div class="date span1">
                                            <p>
                                                <span class="month">Oct</span>
                                                <span class="day">29</span>
                                            </p>
                                        </div>

                                        <div class="meta span2">
                                            <h4>
                                                <a href="blog-detail.html" title="Another theme by YIThemes!">
                                                    Another theme by YIThemes!
                                                </a>
                                            </h4>
                                            <p class="author">by <strong>Nicola Mustone</strong></p>
                                            <p class="comments">
                                                <a href="##respond" title="Comment on Another theme by YIThemes!">
                                                    <strong>Comments:</strong> 0
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="post type-post status-publish format-quote category-uncategorized span3">
                                    <div class="row">
                                        <div class="date span1">
                                            <p>
                                                <span class="month">Jun</span>
                                                <span class="day">18</span>
                                            </p>
                                        </div>

                                        <div class="meta span2">
                                            <h4>
                                                <a href="blog-detail.html" title="Oscar Wilde">
                                                    Oscar Wilde
                                                </a>
                                            </h4>
                                            <p class="author">by <strong>Nicola Mustone</strong></p>
                                            <p class="comments">
                                                <a href="#respond" title="Comment on Oscar Wilde">
                                                    <strong>Comments:</strong> 0
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="post type-post status-publish format-gallery category-design category-themes tag-css tag-html tag-php span3">
                                    <div class="row">
                                        <div class="date span1">
                                            <p>
                                                <span class="month">Apr</span>
                                                <span class="day">09</span>
                                            </p>
                                        </div>

                                        <div class="meta span2">
                                            <h4>
                                                <a href="blog-detail.html" title="This is the title of the first article. Enjoy it.">
                                                    This is the title of the first article. Enjoy it.
                                                </a>
                                            </h4>
                                            <p class="author">by <strong>Nicola Mustone</strong></p>
                                            <p class="comments">
                                                <a href="##comments" title="Comment on This is the title of the first article. Enjoy it.">
                                                    <strong>Comments:</strong> 1
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SECTION BLOG -->

                        <div class="clear"></div>
                    </div>

                    <div class="clear"></div>

                    <div class="margin-bottom">
                        <div class="logos-slider wrapper">
                            <h2>
                                Our <span class="title-highlight">partners</span>
                            </h2>
                            <div class="list_carousel">
                                <ul class="logos-slides">

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/ugodno1.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/Tutti_1_01.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/tiecafe-011.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/Senza-titolo-1.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/nolt_400x4001.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/muffinstudio-011.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/logo-mix-1.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/ken.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/icecreammedia-011.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/garnise_011.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/capitan-cook1.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/bread1.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>

                                    <li style="height: 70px;">
                                        <a href="#" class="bwWrapper" >
                                            <img src="images/slider/Apuragreen2.png" style="max-height: 70px;" class="logo" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                            <div class="nav">
                                <a class="prev" href="#"></a>
                                <a class="next" href="#"></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>

                    <script type="text/javascript">
                        jQuery(function ($) {

                            $('.logos-slides').imagesLoaded(function () {
                                $('.logos-slides').carouFredSel({
                                    auto: true,
                                    width: '100%',
                                    prev: '.logos-slider .prev',
                                    next: '.logos-slider .next',
                                    swipe: {
                                        onTouch: true
                                    },
                                    scroll: {
                                        items: 1,
                                        duration: 500}
                                });
                            });

                            $('.bwWrapper').BlackAndWhite({
                                hoverEffect: true, // default true
                                // set the path to BnWWorker.js for a superfast implementation
                                webworkerPath: false,
                                // for the images with a fluid width and height
                                responsive: true,
                                speed: {//this property could also be just speed: value for both fadeIn and fadeOut
                                    fadeIn: 200, // 200ms for fadeIn animations
                                    fadeOut: 300 // 800ms for fadeOut animations
                                }
                            });

                            $("a.bwWrapper[href='#']").click(function () {
                                return false
                            })

                        });
                    </script>


                </div>
                <!-- START COMMENTS -->
                <div id="comments"></div>
                <!-- END COMMENTS -->
            </div>
            <!-- END CONTENT -->

            <!-- START EXTRA CONTENT -->
            <!-- END EXTRA CONTENT -->

        </div>
    </div>
</div>
<!-- END PRIMARY -->

<!-- START FOOTER -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-widgets-area with-sidebar-right">
                <div class="widget-first widget span2 widget_text"><h3>About us</h3>
                    <div class="textwidget">
                        Aliquam pellentesque pellentesque turpis, ut <a href="#">bibendum sapien</a> sollicitudin nec
                        plasiren.
                        Pellentesque posuere ornare placerat. Suspendisse potenti.
                    </div>
                </div>

                <div class="widget span2 widget_nav_menu">
                    <h3>A menu widget</h3>

                    <div class="menu-widget-footer-container">
                        <ul id="menu-widget-footer" class="menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="accordion-style.html">About</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="testimonials.html">Testimonials</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="portfolio-3-columns.html">Portfolio</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="get-in-touch.html">Get in touch</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="#">Policy</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="#">Utilities</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="widget-last widget span2 widget_nav_menu">
                    <h3>Socialize</h3>

                    <div class="menu-socialize-container">
                        <ul id="menu-socialize" class="menu">

                            <li class="menu-item menu-item-type-custom">
                                <a href="#">Facebook</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="#">Twitter</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="#">LinkedIn</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="#">Google+</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="#">Pinterest</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="#">Flickr</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-widgets-sidebar with-sidebar-right">
                <div  class="widget-first widget span6 yit_quick_contact">
                    <h3>Get in touch</h3>

                    <form class="contact-form row" method="post" action="" enctype="multipart/form-data">

                        <div class="usermessagea"></div>
                        <fieldset>
                            <ul>
                                <li class="text-field with-icon span3">
                                    <label>
                                        <span class="mainlabel">Name</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/footer/author-footer.png" alt="" title=""/></span>
                                        <input type="text" name="yit_contact[name]" class="with-icon required" value=""/>
                                    </div>
                                    <div class="msg-error"></div>
                                    <div class="clear"></div>
                                </li>

                                <li class="text-field with-icon span3">
                                    <label>
                                        <span class="mainlabel">Email</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/footer/envelope-footer.png" alt="" title=""/>
                                        </span>
                                        <input type="text" name="yit_contact[email]" class="with-icon required email-validate" value=""/>
                                    </div>
                                    <div class="msg-error"></div>
                                    <div class="clear"></div>
                                </li>

                                <li class="textarea-field with-icon span6">
                                    <label>
                                        <span class="mainlabel">Message</span>
                                    </label>

                                    <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="images/footer/pencil-footer.png" alt="" title=""/>
                                        </span>
                                        <textarea name="yit_contact[message]" rows="8" cols="30" class="with-icon required"></textarea>
                                    </div>
                                    <div class="msg-error"></div>
                                    <div class="clear"></div>
                                </li>

                                <li class="submit-button span6">
                                    <div style="position:absolute;left:-9999px;">
                                        <input type="text" name="email_check_2" id="email_check_2" value=""/>
                                    </div>
                                    <input type="hidden" name="yit_action" value="sendemail" id="yit_action"/>
                                    <input type="hidden" name="yit_referer" value="index.html"/>
                                    <input type="hidden" name="id_form" value="228"/>
                                    <input type="submit" name="yit_sendemail" value="SEND" class="sendmail alignright"/>
                                    <div class="clear"></div>
                                </li>
                            </ul>
                        </fieldset>
                    </form>

                    <script type="text/javascript">
                        var messages_form_228 = {
                            name: "Insert the name",
                            email: "Insert a valid email",
                            message: "Insert a message"
                        };
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END FOOTER -->

<!-- START COPYRIGHT -->
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="left span6">
                <p>
                    <a href="http://yithemes.com/"><img src="http://yithemes.com/cdn/images/various/footer_yith_grey.png" alt="Your Inspiration Themes" style="position:relative; top:9px; margin: -22px 5px 0 0;"></a>&nbsp;Copyright 2012 - <strong>Libra theme</strong> by
                    Your Inspiration Themes
                </p>
            </div>
            <div class="right span6">
                <p>
                    <a href="http://yithemes.com/themes/wordpress/libra-corporate-portfolio-wp-theme/?ap_id=libra-html"><strong>Download the free version for Wordpress</strong></a>
                </p>
            </div>
        </div>
    </div>
</div>
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
<script type='text/javascript' src='js/jquery.flexslider-min.js'></script>
<script type='text/javascript' src='js/jquery.carouFredSel-6.1.0-packed.js'></script>
<script type='text/javascript' src='js/jQuery.BlackAndWhite.js'></script>
<script type='text/javascript' src='js/jquery.touchSwipe.min.js'></script>
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