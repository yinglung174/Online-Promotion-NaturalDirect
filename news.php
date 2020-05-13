<?php
session_start();
?>
<?php
include_once 'includes/db_connection.php';
//get title from database
$query_title = "select * from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);

//Sidebar Popular Readings, select 6 highest views article
$popquery = "select * from posts order by views desc limit 6";
$popResult = mysqli_query($conn, $popquery) or die(mysqli_errno($conn));

//get background color
$query = "select *from bg_color where id =1";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$color = mysqli_fetch_assoc($result);

//sidlebar recent comments, select 6 latest comments
$lquery = "select * from comments order by date desc limit 6";
$lresult = mysqli_query($conn, $lquery) or die(mysqli_errno($conn));


//get record of database
$record_count = $conn->query("SELECT * FROM posts");
//amount displayed per page
$per_page = 5;
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
$query = $conn->prepare("SELECT post_id, title, description, category, posted, views, coverImage FROM posts INNER JOIN category ON category.category_id=posts.category_id order by post_id DESC limit $start, $per_page");
$query->execute();
$query->bind_result($post_id, $title, $description, $category, $posted, $views, $coverImage);
$query->store_result();
?>    
<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />

    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



    <title>News - <?php echo"$rowtitle[1]"; ?></title>

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
    <link rel='stylesheet' id='polaroid-slider-css'  href='sliders/polaroid/css/polaroid.css' type='text/css' media='all' />
    <link rel='stylesheet' id='ahortcodes-css'  href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css'  href='css/contact_form.css' type='text/css' media='all' />
    <link rel='stylesheet' id='blog-libra-big-css'  href='blog/pinterest/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css'  href='css/custom.css' type='text/css' media='all' />

    <style type="text/css">
        body { background-color: #ffffff; background-image: url('images/bg-pattern.png'); background-repeat: repeat; background-position: top left; background-attachment: scroll; }
    </style>

    <script type='text/javascript' src='js/jquery/jquery.js'></script>


</head>
<!-- END HEAD -->
<!-- START BODY -->
<body class="page no_js responsive stretched">

    <?php include_once 'shadow.php'; ?>
</div>
<!-- SLOGAN -->
<div class="slogan">
    <h2>NEWS</h2>
    <h3></h3>
</div>
<!-- START PRIMARY -->
<div id="primary" class="sidebar-right">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-blog" class="span9 content group">
                <div class="row">
                    <div id="pinterest-container" style="position: relative; height: 797px;" class="masonry">
                        <!--whileloop for article-->
                        <?php
                        while ($query->fetch()):
                            $coverImage = str_replace("../", "", $coverImage);
                            ?>  

                            <div class="post type-post status-publish format-video sticky hentry hentry-post group span9 blog-pinterest masonry-brick" style="position: absolute; top: 0px; left: 0px;">
                                <div class="blog-item">
                                    <!--   <div class="picture_overlay">
                                                                         <a href="blog-detail.html"><img width="260" height="99" src="images/blog/3-260x99.jpg" class="attachment-thumb_portfolio_pinterest" alt="3"></a>
                                                                         </div>-->
                                    <?php
                                    if ($coverImage == "") {
                                        echo"<a href=\"news-detail.php?id=" . $post_id . "\"><img width=\"760\" height=\"290\" src=\"images/wepaint_small.jpg\" class=\"attachment-blog_libra_big\" alt=\"3\"></a>
                                    ";
                                    } else {
                                        echo"<a href=\"news-detail.php?id=" . $post_id . "\"><img style=\"width:760 !important;height:290 !important; display:block; margin:0 auto;\" src=\"" . $coverImage . "\" class=\"attachment-blog_libra_big\" alt=\"3\"></a>
                                    ";
                                    }
                                    ?>
    <!--                                <a href="news-detail.php?id=<?php echo$post_id ?>"><img width="760" height="290" src="http://127.0.0.1/libra/images/blog/3-760x290.jpg" class="attachment-blog_libra_big" alt="3"></a>-->

                                    <h2 class="post-title">
                                        <?php echo"<a href=\"news-detail.php?id=$post_id\">" . htmlspecialchars_decode($title) . "</a>" ?>
                                    </h2>
                                    <p><?php
                                        echo htmlspecialchars_decode($description) . "...</p>"
                                        . "<p><a href=\"news-detail.php?id=$post_id\" class=\"not-btn more-link\">Read more</a>"
                                        ?></p>
                                    <div class="clear"></div>

                                    <!-- post meta -->
                                    <div class="meta group">
                                        <div>
                                            <p class="author">
                                                <img src="images/icons/author.png" alt="icon-user">
                                                <span>Author:</span>
                                                <a href="" title="Posts by Admin" rel="author">
                                                    Admin
                                                </a>
                                            </p>

                                            <p class="date">
                                                <img src="images/icons/date.png" alt="icon-calendar">
                                                <span>Date:</span> <?php echo"$posted" ?>
                                            </p>

                                            <p class="comment">
                                                <span>
                                                    <img src="images/icons/search.png" alt="icon-calendar">
                                                    <span>Views:</span><?php echo"$views" ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <?php endwhile; ?>
                        <div class="general-pagination group center">
                            <?php
                            if ($prev > 0) {
                                echo "<a href=\"news.php?p=$prev\"><</a>$page ";
                            }
                            if ($page == 1) {
                                echo"1&nbsp&nbsp";
                            }
                            if ($page < $pages) {
                                echo "<a href=\"news.php?p=$next\">></a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- END CONTENT -->

            <!-- START SIDEBAR  -->
            <!-- Popular Readings -->
            <div id="sidebar-blog-sidebar" class="span3 sidebar group">
                <div class="widget-first widget recent-posts">
                    <h3>Popular <span class="title-highlight">readings</span></h3>
                    <?php
                    //while loop for popular readings
                    while ($pop = mysqli_fetch_assoc($popResult)) {
                        $coverImage = str_replace("../", "", $pop['coverImage'] );
                        ?>
                        <div class="thumbnail recent-post group" style="background:white">
                            <div class="hentry-post group">
                                <div class="thumb-img">
                                    <?php
                                    if ($pop['coverImage'] == "") {
                                        echo "<img width=\"75\" height=\"75\" src=\"images/wepaint_small.jpg\" class=\"attachment-blog_thumb\" alt=\"23\" />";
                                    } else {
                                        echo "<img width=\"75\" height=\"75\" src=\"" . $coverImage . "\" class=\"attachment-blog_thumb\" alt=\"23\" />";
                                    }
                                    ?>
    <!--                                <img width="75" height="75" src="images/icons/set_icons/NUMBER-ONE.jpg" class="attachment-blog_thumb" alt="23" />-->
                                </div>
                                <div class="text">
    <?php echo "<a href=\"news-detail.php?id=" . $pop['post_id'] . "\" <p>" . $pop['title'] ?></p></a>
                                    <p class="post-date"><?php echo $pop['posted']; ?></p>
    <!--                                <span>
                                        <img src="images/icons/search.png" alt="icon-calendar">
                                        <span>Views:</span><?php echo $pop['views'] ?>
                                    </span>-->
                                </div>

                            </div>

                        </div>
                        <?php
                        //end of while loop
                    }
                    ?>
                </div>
                <div id="last-tweets-3" class="widget-2 widget last-tweets">
                    <h3></h3>
                    <div class="list-tweets-3"></div>
                    <p id="follow-twitter">
                        <a href="https://www.facebook.com/WePaint-950298961684277/" target="_blank">
                            Follow us on Facebook &rarr;
                        </a>

                        <script type="text/javascript">
                            jQuery(function ($) {
                                $('#last-tweets-3 .list-tweets-3').tweetable({
                                    listClass: 'tweets-widget-3',
                                    username: 'YIW',
                                    time: false,
                                    limit: 1,
                                    replies: true
                                });
                            });
                        </script>
                </div>


                <!-- Recent Comments -->
                <div class="widget recent-comments">
                    <h3>Recent <span class="title-highlight">comments</span></h3>
                    <div class="recent-comments group">
                        <?php
                        //while loop for  latest comments
                        while ($recent = mysqli_fetch_assoc($lresult)) {
                            ?>
                                                                            <div class="thumbnail the-post group" style="background:white;">
                                                                              <div class="avatar"> 
                                    <?php
                                    if ($recent['name'] != 'Guest') {
                                        if($recent['fbId']!=null){
                                        $query = "select picture from users where id = " . $recent['fbId'] ."";
                                        $result = mysqli_query($conn, $query);
                                        if ($result != "") {
                                            $fbimg = mysqli_fetch_assoc($result);
                                            ?>
                                                   <img alt='' src='<?php echo $fbimg['picture'] ?>' class='avatar photo' height='33' width='33'/>
                                                                             
                                            <?php
                                        }
                                        }
                                        ?>
                                        <?php
                                        if($recent['userid']!= null){
                                        $query = "select icon from user where userID = '" . $recent['userid'] ."'";
                                        $uresult = mysqli_query($conn, $query);
                                        if ($uresult != "") {
                                            $icon = mysqli_fetch_assoc($uresult);
                                            ?>
                                                   <img alt='' src='<?php echo $icon['icon'] ?>' class='avatar photo' height='33' width='33'/>
                                                                             
                                            <?php
                                        }
                                        }
                                        ?>
                                    <?php } else { ?>
                                                                                          <img alt='' src='images/gavatar.png' class='avatar photo' height='33' width='33'/>
                                    <?php } ?>
                                                                              </div>
                                                                                  <span class="author">
                                                                                    <strong><a href="news-detail.php?id=<?php echo $recent['post_id']; ?>"<p class="comment"><?php echo $recent['comment']; ?></p></a></strong> 
                                                                                  </span>from
                                                                               <a href="news-detail.php?id=<?php echo $recent['post_id']; ?>"<p class="comment"><?php echo $recent['name']; ?></p></a>
                                                                               <p style="font-size:10px;"><?php echo $recent['date'] ?></p>
                                                                            </div>
                                <?php
                            //end of while loop
                        }
                        ?>
                    </div>
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
<!-- END BODY -->
</html>