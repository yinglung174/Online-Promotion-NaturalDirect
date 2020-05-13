<?php
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
?><!DOCTYPE html>
<!-- START HEAD -->

<head>
    <meta charset="UTF-8" />

    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



    <title>Portfolio - <?php echo"$rowtitle[1]"; ?></title>

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
    <link rel='stylesheet' id='colorbox-css' href='css/colorbox.css' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-css' href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='slide-detail-css' href='portfolios/slide-detail/css/style.css' type='text/css' media='all' />
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

    <?php include_once 'shadow.php'; ?>
</div>

<!-- SLOGAN -->
<div class="slogan">
    <h2>Portfolio</h2>
</div>

<!-- START PRIMARY -->
<div id="primary" class="sidebar-no">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-page" class="span12 content group">
                <div class="page type-page status-publish group">

                    <script>
                        jQuery(document).ready(function ($) {
                            $('.sidebar').remove();

                            if (!$('#primary').hasClass('sidebar-no')) {
                                $('#primary').removeClass().addClass('sidebar-no');
                                $('.content').removeClass('span9').addClass('span12');
                            }
                        });
                    </script>
                    <!--Add filter here -->
                    <div class="row">
                        <div class="span12">
                            <ul class="filters">
                                <li>
                                    <a class="active" href="/wepaintphp/portfolio/filterable/?cat" data-option-value="*">
                                        All
                                    </a>
                                </li>
                                <li>||
                                    <a href="/wepaintphp/portfolio/filterable/?cat=activity" data-option-value=".activity">
                                        Activities
                                    </a>
                                </li>

                                <li>||
                                    <a href="/wepaintphp/portfolio/filterable/?cat=project" data-option-value=".project">
                                        Projects
                                    </a>
                                </li>                           
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <ul id="portfolio" class="slide-detail detail thumbnails">
                            <?php
                            //get activity image
                            $a_query = "select path from images where category = 'activity' ";
                            $a_result = mysqli_query($conn, $a_query);

                            //get project img
                            $p_query = "select path from images where category = 'project' ";
                            $p_result = mysqli_query($conn, $p_query);

                            //images name with ''art' = filter activities
                            while ($a_img = mysqli_fetch_row($a_result)) {
                                $img = str_replace("../", "", $a_img[0]);
                                echo "<li class=\"first slide-1 filterable_item span3 activity\">
                                    <div class = \"ch-item ch-item-hover\" style=\"background: url('$img') no-repeat center;\">
                                    <div class=\"ch-info\">
                                        <div class=\"ch-info-icons\">
                                            <a href=\"$img\" rel=\"lightbox\" class=\"ch-info-lightbox\">
                                                <img src=\"images/icons/zoom.png\" alt=\"Open Lightbox\" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>";
                            }
                            //image name with 'pro'  = filter projects 
                            while ($p_img = mysqli_fetch_row($p_result)) {
                                $img = str_replace("../", "", $p_img[0]);
                                echo "<li class=\"first slide-1 filterable_item span3 project\">
                                    <div class = \"ch-item ch-item-hover\" style=\"background: url('$img') no-repeat center;\">
                                    <div class=\"ch-info\">
                                        <div class=\"ch-info-icons\">
                                            <a href=\"$img\" rel=\"lightbox\" class=\"ch-info-lightbox\">
                                                <img src=\"images/icons/zoom.png\" alt=\"Open Lightbox\" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>

                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        //filterable
                        var container = $('#portfolio');

                        container.find('hr').remove();
                        container.imagesLoaded(function () {
                            container.isotope({
                                itemSelector: 'li.filterable_item',
                                itemPositionDataEnabled: true
                            });
                        });

                        $('.filters li a').click(function () {
                            $('.filters li a').removeClass('active');
                            $(this).addClass('active');

                            $('.ch-item').removeClass('ch-item-opened');
                            $('.slide_detail').slideUp('slow');
                            $('ul#portfolio hr').slideUp('slow');

                            var selector = $(this).attr('data-option-value');

                            container.isotope({
                                filter: selector
                            });

                            return false;
                        }).filter(':first').click();

                        $(window).resize(function () {
                            $('.filters li a.active').click();
                        });
                    });
                </script>

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

<script type='text/javascript' src='js/underscore.min.js'></script>
<script type='text/javascript' src='js/jquery.carouFredSel-6.1.0-packed.js'></script>
<script type='text/javascript' src='js/jQuery.BlackAndWhite.js'></script>
<script type='text/javascript' src='js/jquery/jquery.masonry.min.js'></script>
<script type='text/javascript' src='js/jquery.colorbox-min.js'></script>
<script type='text/javascript' src='js/jquery.easing.js'></script>
<script type='text/javascript' src='portfolios/slide-detail/js/jquery.filterable.js'></script>
<script type='text/javascript' src='js/hoverIntent.min.js'></script>
<script type='text/javascript' src='js/media-upload.min.js'></script>
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