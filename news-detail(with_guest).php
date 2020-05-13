<?php
session_start();
?>
<?php
//check for the Post ID
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
} else {
    $id = $_GET['id'];
}
include_once 'includes/db_connection.php';

//get website title from database
$query_title = "select * from title where title_id = 1";
$title_result = mysqli_query($conn, $query_title) or die(mysqli_error($conn));
$rowtitle = mysqli_fetch_row($title_result);

//get background color
$bgquery = "select *from bg_color where id =1";
$bgresult = mysqli_query($conn, $bgquery) or die(mysqli_error($conn));
$color = mysqli_fetch_assoc($bgresult);

//Sidebar Popular Readings, select 3 highest views article
$popquery = "select * from posts order by views desc limit 3";
$popResult = mysqli_query($conn, $popquery) or die(mysqli_errno($conn));


//Sidebar Recommend articles, select 10 lowest views article
$recomQuery = "select * from posts order by views asc limit 10";
$recomResult = mysqli_query($conn, $recomQuery) or die(mysqli_errno($conn));

//sidlebar recent comments, select 3 latest comments
$lquery = "select * from comments order by date DESC limit 3";
$lresult = mysqli_query($conn, $lquery) or die(mysqli_errno($conn));


//if the Post ID is not a number, redirect to index.php ( For security )
if (!is_numeric($id)) {
    header('Location: index.php');
}
//get the Post details
$query = "select title, body, keywords, description, posted, views from posts where post_id = '$id'";
$result = mysqli_query($conn, $query);
if ($result->num_rows != 1) {
    header('Location: index.php');
    exit();
}
$row = mysqli_fetch_object($result);
//Count views
$views = $row->views + 1;
$updateview = "update posts set views = $views where post_id = $id";
$updateresult = mysqli_query($conn, $updateview) or die(mysqli_errno($conn));

//handle comment form
if (isset($_POST['submit'])) {
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //your site secret key
        $secret = '6LdIARMUAAAAAIsIGO4vV6abYKXGaE3QtJq8aq6s';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            //get ip
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $myip = $_SERVER['HTTP_CLIENT_IP'];
            } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $myip = $_SERVER['REMOTE_ADDR'];
            }
            //escape for security
            $postid = mysqli_real_escape_string($conn, $_POST['id']);
            if ($postid != $id) {
                echo "<script>alert('Publish fail!')</script>";
                echo "<script>window.open('news-detail.php')</script>";
            }
            @$userid = $_POST['userid'];
            @$Uid = $_POST['Uid'];
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $comment = mysqli_real_escape_string($conn, $_POST['comment']);
            $comment = htmlspecialchars($comment);
            if (@$uerid != "") {
                $query = "insert into comments(post_id, fbId, name, comment, date, ip) values ('$postid','$userid','$name','$comment',now(),'$myip')";
                $result = mysqli_query($conn, $query) or die(mysqli_errno($conn));
                echo "<script>alert('Publish success!')</script>";
                echo "<script>window.open('news-detail.php')</script>";
            }
            if (@$Uid != "") {
                $query = "insert into comments(post_id, userid, name, comment, date, ip) values ('$postid','$Uid','$name','$comment',now(),'$myip')";
                $result = mysqli_query($conn, $query) or die(mysqli_errno($conn));
                echo "<script>alert('Publish success!')</script>";
                echo "<script>window.open('news-detail.php')</script>";
            }
            if(@$Uid =="" && @$userid ==""){
                $query = "insert into comments(post_id, userid, name, comment, date, ip) values ('$postid','$Uid','$name','$comment',now(),'$myip')";
                $result = mysqli_query($conn, $query) or die(mysqli_errno($conn));
                echo "<script>alert('Publish success!')</script>";
                echo "<script>window.open('news-detail.php')</script>";
            }
        }
    } else {
        echo "<script>alert('Please click on the reCAPTCHA box. Please try again.')</script>";
        echo "<script>window.open('news-detail.php')</script>";
    }
}
?>
<!DOCTYPE html>
<!-- START HEAD -->
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlspecialchars_decode($row->title); ?> - wePaint | Natural Direct Co. Ltd</title>
    <meta name="keywords" content="<?php echo htmlspecialchars_decode($row->keywords); ?>">
    <meta name="description" content="<?php echo htmlspecialchars_decode($row->description); ?>">

    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />




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
    <link rel='stylesheet' id='fontawesome-css'  href='css/font-awesome.css' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css'  href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='polaroid-slider-css'  href='sliders/polaroid/css/polaroid.css' type='text/css' media='all' />
    <link rel='stylesheet' id='ahortcodes-css'  href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css'  href='css/contact_form.css' type='text/css' media='all' />
    <link rel='stylesheet' id='blog-libra-big-css'  href='blog/libra-big/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='comments-css'  href='css/comments.css' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css'  href='css/custom.css' type='text/css' media='all' />

    <style type="text/css">
        body { background-color: #ffffff; background-image: url('images/bg-pattern.png'); background-repeat: repeat; background-position: top left; background-attachment: scroll; }
        @media all and (max-width: 600px) and (orientation:landscape) {
            #f-submit{
                margin-top: 10%;
            }
            #recaptcha{
                height: 40px; margin-top: 5%; margin-bottom: 5%;
            }
        }

    </style>

    <script type='text/javascript' src='js/jquery/jquery.js'></script>


</head>
<!-- END HEAD -->
<!-- START BODY -->
<body class="page no_js responsive stretched">


    <!-- START BG SHADOW -->
    <?php include_once 'shadow.php'; ?>
</div>

<!-- SLOGAN 
<div class="slogan">
    <a href="news.php"><h2>NEWS</h2></a>&nbsp;
</div>-->
<!-- START PRIMARY -->
<div id="primary" class="sidebar-right">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-blog" class="span9 content group">
                <div class="post type-post status-publish format-standard hentry hentry-post group blog-libra-big row">
                    <!-- post featured & title -->
                    <div class="date-comments span1">
                        <?php
                        //get details of coments
                        $Cquery = "select comment_id, name, comment, date from comments where post_id = $id";
                        $Cresult = mysqli_query($conn, $Cquery) or die(mysqli_errno($conn));
                        $Numrow = mysqli_num_rows($Cresult);
                        if ($Numrow != 0) {
                            $numOfcomments = $Numrow;
                        } else {
                            $numOfcomments = 0;
                        }
                        //get date from post
                        $dateq = "select extract(month from posted), extract(DAY from posted), extract(YEAR from posted) from posts where post_id = $id";
                        $dateresult = mysqli_query($conn, $dateq);
                        $date = mysqli_fetch_array($dateresult);
                        ?>
                        <!-- get the posted date from database-->
                        <p class="date">
                            <span class="month"><?php echo"$date[0]" ?></span>
                            <span class="day"><?php echo"$date[1]" ?></span>
                            <span class="year"><?php echo"$date[2]" ?></span>
                        </p>

                        <p class="comments">
                            <i class="icon-comment"></i>
                            <span>
                                <?php echo "$numOfcomments"; ?>
                            </span>
                        </p>
                    </div>

                    <!-- post title -->
                    <div class="thumbnail-wrapper span8">
                        <h1 class="post-title center" style="font-size:22px; line-height: 24px;"><b>
                                <?php echo htmlspecialchars_decode($row->title); ?>
                            </b> </h1>
                    </div>


                    <!-- post content -->
                    <div class="thumbnail the-post single span8">                        
                        <!-- htmlspecialchars_decode used to decode the htmlspecialchars-->
                        <?php echo htmlspecialchars_decode($row->body); ?>
                        <div><?php echo "Posted Date: $row->posted" ?></div>
                    </div>

                    <div class="clear"></div>


                </div>

                <!-- START COMMENTS -->
                <div class="section blog span6">
                    <h2 class="title">Related comments</h2>

                    <?php
                    if ($Numrow != 0) {
                        while ($Crow = mysqli_fetch_assoc($Cresult)) {
                            ?>
                            <div class="row" style="margin-top:0.5%;">
                                <div class="thumbnail span6" style="background:white">
                                    <div class="row">
                                        <div class="meta span6">
                                            <h4>
                                                <?php echo $Crow['comment'] ?>
                                            </h4>
                                            <p class="author">by <strong><?php echo $Crow['name'] ?></strong></p>
                                            <p class="comments">
                                                <?php echo $Crow['date']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<div class\"clear\"></div>";
                    }
                    ?>

                </div>
                <div class="clear"></div>


                <!-- Leave a comment-->
                <div id="comments">
                    <div id="respond">
                        <h3 id="reply-title">Leave a <span>Reply</span>
                            <small>
                                <a rel="nofollow" id="cancel-comment-reply-link" href="/libra/2012/11/20/nice-clean-the-best-for-your-blog/#respond" style="display:none;">Cancel
                                    reply</a></small>
                        </h3>

                        <form action="" method="post" id="commentform">
                            <input type="hidden" name="id" value="<?php echo$id ?>" />
                            <div class="row"><p class="comment-form-author span3">
                                    <i class="icon-user"></i><input readonly id="author" name="name" type="text" value="<?php
                                    if (isset($_SESSION['fb_name'])) {
                                        echo$_SESSION['fb_name'];
                                        $query = "select id from users where first_name = '" . $_SESSION['fb_name'] . "'";
                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                        $fbID = mysqli_fetch_array($result);
                                    } elseif (isset($_SESSION["name"])) {
                                        echo $_SESSION["name"];
                                        $query = "select userId from user where username = '" . $_SESSION['name'] . "'";
                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                        $userID = mysqli_fetch_array($result);
                                    } else {
                                        echo"Guest";
                                    }
                                    ?>" size="30" aria-required='true'/>
                                </p>
                                <?php if (@$fbID != "") { ?>
                                    <input type="hidden" name="userid" value="<?php echo$fbID[0] ?>" />
                                <?php } ?>
                                <?php if (@$userID != "") { ?>
                                    <input type="hidden" name="Uid" value="<?php echo$userID[0] ?>" />
                                <?php } ?>

                                <p class="comment-form-comment span9"><label class="hide-label" for="comment">Your
                                        comment</label><i class="icon-pencil"></i><textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
                                                            </p>
                                                            <div class="clear"></div>
                                                            <div class="span9">
                                                                <div id="recaptcha" style="margin-top:1%; float: left;" class="g-recaptcha" data-sitekey="6LdIARMUAAAAADJ9-iCEYxGdhr7ReqVNT_kpdWdT"></div>
                                                                <p id="f-submit" class="form-submit" style="margin-top:6%" >
                                                                <input name="submit" type="submit" id="commentsubmit" value="Post Comment"/>
                                                                <input type='hidden' name='comment_post_ID' value='147' id='comment_post_ID'/>
                                                                <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- #respond -->
                                            </div>
                                            <!-- END COMMENTS -->

                                        </div>
                                        <!-- END CONTENT -->

                                        <!-- START SIDEBAR  -->
            <!-- Popular Readings -->
            <div id="sidebar-blog-sidebar" class="span3 sidebar group" style="margin-top:1.5%;">
                <div class="widget-first widget recent-posts">
                    <h3>Popular <span class="title-highlight">readings</span></h3>
                    <?php
                    //while loop for popular readings
                    while ($pop = mysqli_fetch_assoc($popResult)) {
                        $coverImage = str_replace("../", "", $pop['coverImage']);
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
                
                <!-- Recommend articles -->
                <div class="widget-first widget recent-posts">
                    <h3>Reccommend <span class="title-highlight">articles</span></h3>
                    <?php
                    //while loop for recommend article (8 lowest views)
                    while ($recom = mysqli_fetch_assoc($recomResult)) {
                        ?>
                                        <div class="thumbnail recent-post group" style="background:white;">
                                                    <div class="hentry-post group">
                                                        <div class="thumb-img">
                                    <?php
                                    if ($pop['coverImage'] == "") {
                                        echo "<img width=\"75\" height=\"75\" src=\"images/wepaint_small.jpg\" class=\"attachment-blog_thumb\" alt=\"23\" />";
                                    } else {
                                        echo "<img width=\"75\" height=\"75\" src=\"" . $recom['coverImage'] . "\" class=\"attachment-blog_thumb\" alt=\"23\" />";
                                    }
                                    ?>
                                                        </div>
                                                        <div class="text">
                                    <?php echo "<a href=\"news-detail.php?id=" . $recom['post_id'] . "\" <p>" . $recom['title'] ?></p></a>
                                                            <p class="post-date"><?php echo $recom['posted']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                        <?php
                        //end of s=while loop
                    }
                    ?>
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