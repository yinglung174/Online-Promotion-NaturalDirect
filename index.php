<!DOCTYPE html>
<!-- START HEAD -->
<?php
session_start();
include_once 'includes/db_connection.php';
$query_title = "select * from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);
//get record of database
$record_count = $conn->query("SELECT * FROM posts");

//get background color
$query = "select *from bg_color where id =1";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$color = mysqli_fetch_assoc($result);

//GET THE SLIDE INFORMATION
$squery = "select * from slide_img";
$sresult = mysqli_query($conn, $squery);


//LEFT(body,100) AS body to show only 100 words in the body 
$query = ("SELECT post_id, title, description, extract(month from posted), extract(DAY from posted), coverImage, views, extract(YEAR from posted) FROM posts order by post_id DESC limit 5");
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>    
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
    <link rel='stylesheet' id='thickbox-css' href='js/thickbox/thickbox.css' type='text/css' media='all' />
    <link rel='stylesheet' id='usquare-css-css' href='sliders/usquare/css/frontend/usquare_style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-css' href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='polaroid-slider-css' href='sliders/polaroid/css/polaroid.css' type='text/css' media='all' />
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
    </style>

    <script type='text/javascript' src='js/jquery/jquery.js'></script>


</head>
<!-- END HEAD -->
<!-- START BODY -->

<body class="home page no_js responsive stretched">

    <?php
    include_once 'shadow.php';
    include_once 'slider.php';
    ?>

    <!-- START PRIMARY -->
    <div id="primary" class="sidebar-no">
        <div class="container group">
            <div class="row">
                <!-- START CONTENT -->
                <div id="content-home" class="span12 content group">
                    <div class="page type-page status-publish hentry group">

                        <div class="clear"></div>
                        <!-- START SECTION News -->
                        <div class="section blog margin-bottom span12">
                            <h2 class="title">
                                <span class="title-highlight">News</span>
                            </h2>
                            <div class="row">
                                <!--whileloop for article-->
                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($i == 0) {
                                        ?>  
                                        <div class="post type-post status-publish format-video category-design span6 sticky">
                                            <div class="row">
                                                <div class="thumbnail span3">
                                                    <?php
                                                    if ($row[5] == "") {
                                                        echo"<a href=\"news-detail.php?id=" . $row[0] . "\"><img width=\"263\" height=\"243\" src=\"images/wepaint_small.jpg\" class=\"attachment-blog_libra_big\" alt=\"3\"></a>
                                    ";
                                                    } else {
                                                        $coverImage = str_replace("../", "", $row[5]);
                                                        echo"<a href=\"news-detail.php?id=" . $row[0] . "\"><img style=\"width:550px; height:250px;\" src=\"" . $coverImage . "\" class=\"attachment-blog_libra_big\" alt=\"3\"></a>
                                    ";
                                                    }
                                                    ?><div class="date span1">
                                                        <p>
                                                            <span class="month"><?php echo"$row[3]" ?></span>
                                                            <span class="day"><?php echo"$row[4]" ?></span>
                                                            <span class="year"><?php echo"$row[7]" ?></span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="the-content span3">
                                                    <h4>
                                                        <?php echo"<a href=\"news-detail.php?id=$row[0]\">" . htmlspecialchars_decode($row[1]) . "</a>" ?>
                                                    </h4>

                                                    <p>
                                                        <?php echo htmlspecialchars_decode($row[2]) . "<a href=\"news-detail.php?id=$row[0]\">...</a>" ?>
                                                    </p>

                                                    <p>
                                                        <a href="<?php echo "news-detail.php?id=$row[0]" ?>" class="more-link">read the article</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    } else {
                                        ?>
                                        <div class="post type-post status-publish format-standard category-design category-themes tag-cleam tag-corporate tag-minimal span3">
                                            <div class="row">
                                                <div class="date span1">
                                                    <p>
                                                        <span class="month"><?php echo"$row[3]" ?></span>
                                                        <span class="day"><?php echo"$row[4]" ?></span>
                                                        <span class="year"><?php echo"$row[7]" ?></span>
                                                    </p>
                                                </div>

                                                <div class="meta span2">
                                                    <h4>
                                                        <?php echo"<a href=\"news-detail.php?id=$row[0]\">" . htmlspecialchars_decode($row[1]) . "</a>" ?>
                                                    </h4>
                                                    
                                                    <p class="author">by <strong>admin</strong></p>
                                                    <p class="comments">
                                                        <a href="<?php echo "news-detail.php?id=$row[0]"?>" title="Comment on Nice &amp; Clean. The best for your blog!">
                                                            <strong>Views:</strong> <?php echo $row[6] ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                                ?>


                            </div>
                        </div>

                        <!-- END SECTION BLOG -->

                        <div class="clear"></div>


                        <div class="row">


                            <div class="clear"></div>
                        </div>

                        <div class="clear"></div>





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
<script type='text/javascript' src='sliders/polaroid/js/jquery.polaroid.js'></script>
<script type='text/javascript' src='js/jquery.colorbox-min.js'></script>
<script type='text/javascript' src='js/jquery.easing.js'></script>
<script type='text/javascript' src='js/jquery.carouFredSel-6.1.0-packed.js'></script>
<script type='text/javascript' src='js/jQuery.BlackAndWhite.js'></script>
<script type='text/javascript' src='js/jquery.touchSwipe.min.js'></script>
<script type='text/javascript' src='sliders/polaroid/js/jquery.transform-0.8.0.min.js'></script>
<script type='text/javascript' src='sliders/polaroid/js/jquery.preloader.js'></script>
<script type='text/javascript' src='js/responsive.js'></script>
<script type='text/javascript' src='js/mobilemenu.js'></script>
<script type='text/javascript' src='js/jquery.clickout.min.js'></script>
<script type='text/javascript' src='js/jquery.flexslider-min.js'></script>
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