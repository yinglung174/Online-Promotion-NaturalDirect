<?php
session_start();
if (!isset($_SESSION['user_id'])) {
header('Location: login.php');
exit();
}
include_once '../includes/db_connection.php';
include_once '../includes/connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Natural Direct Co. Ltd</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jQuery UI -->
        <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="css/styles.css" rel="stylesheet">

        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
        <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
        <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

        <link href="css/forms.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <div class="col-md-10">
            <?php
            $tableNameC = "file";
            $queryC = "SELECT * from $tableNameC ORDER BY fileNo ASC";
            $resultC = mysqli_query($conn, $queryC);
            if (!$resultC) {
            die("Database access failed: " . mysqli_error($conn));
            }
            $rowC = mysqli_num_rows($resultC);
            $numOfRecordC = count($rowC);
            $iC = 0;
            if (isset($_POST["DeleteFile"])) {
            $fileNo = $_POST["fileNo"];
             $fileName = $_POST["fileName"];
            $sql = "DELETE FROM file WHERE fileNo = '$fileNo'";
            $result = mysql_query($sql) or die(mysql_error());
            if ($sql) {
            echo" <center>Delete Success - FileNo:$fileNo</center>";
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"file\" value=\"Back to File\"></form></center>";
           //delete file
            unlink("../".$fileName.".php");
            }
            }
            if (isset($_POST["handleEditFile"])) {
            $fileNo = $_POST["fileNo"];
            $fileTitle = $_POST["fileTitle"];
            $fileName = $_POST["fileName"];
            $fileContent = $_POST["fileContent"];
            $sql = "update file set fileNo='" . $fileNo . "',fileName='" . $fileName .
            "',fileTitle='" . $fileTitle . "',fileContent='" . $fileContent . "'  where fileNo='" . $fileNo . "'";
            $result = mysql_query($sql) or die(mysql_error());
            if ($sql) {
            echo" <center>Edit Success - FileNo :$fileNo</center>";
            echo"<center><table border=\"1\">";
            echo"<tr><td>FileNo</td><td>$fileNo</td></tr>";
            echo"<tr><td>Name</td><td>$fileName</td></tr>";
            echo"<tr><td>Title</td><td>$fileTitle</td></tr>";
            echo"<tr><td>Content</td><td>$fileContent</td></tr>";
            echo"</table></center>";
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"file\" value=\"Back to File\"></form></center>";
            //edit file
            //create file
            $fp = fopen("../".$fileName.".php", "w");
            $string = '<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
session_start();

include_once "includes/db_connection.php";
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



        <title>  <?php echo"'.$fileName.' - $rowtitle[1]"?></title>

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

        <link rel="stylesheet" id="thickbox-css" href="js/thickbox/thickbox.css" type="text/css" media="all" />
        <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1" type="text/css" media="all" />
        <link rel="stylesheet" id="fontawesome-css" href="css/font-awesome.css" type="text/css" media="all" />
        <link rel="stylesheet" id="responsive-css" href="css/responsive.css" type="text/css" media="all" />
        <link rel="stylesheet" id="polaroid-slider-css" href="sliders/polaroid/css/polaroid.css" type="text/css"" media="all" />
        <link rel="stylesheet" id="ahortcodes-css" href="css/shortcodes.css" type="text/css"" media="all" />
        <link rel="stylesheet" id="contact-form-css" href="css/contact_form.css" type="text/css" media="all" />
        <link rel="stylesheet" id="blog-libra-big-css" href="blog/libra-big/css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" id="custom-css" href="css/custom.css" type="text/css" media="all" />

        <style type="text/css">
            body {
                background-color: #ffffff;
                background-image: url("images/bg-pattern.png");
                background-repeat: repeat;
                background-position: top left;
                background-attachment: scroll;
            }
        </style>

        <script type="text/javascript" src="js/jquery/jquery.js"></script>


    </head>
    <body class="page no_js responsive stretched">
        
        <?php include_once "shadow.php"; ?>
    </div>
         <div class="slogan">
            <h2><?php echo "'.$fileTitle.'" ?></h2>
        </div>
          <!-- START PRIMARY -->
       
                        <center>     <?php
   
       echo "'.$fileContent.'";
        
        ?></center>
                     


      
        
        <!-- START FOOTER -->
        <?php include_once "footer.php"; ?>
            <!-- ENDFOOTER -->

            <!-- START COPYRIGHT -->
            <?php include_once "copyright.php"; ?>
                <!-- END COPYRIGHT -->

                <div class="wrapper-border"></div>

                </div>
                <!-- END WRAPPER -->

                </div>
                <!-- END BG SHADOW -->
          <!-- END BG SHADOW -->

                <script type="text/javascript" src="js/comment-reply.min.js"></script>
                <script type="text/javascript" src=""js/underscore.min.js"></script>
                <script type="text/javascript" src="js/jquery/jquery.masonry.min.js"></script>
                <script type="text/javascript" src="js/jquery.easing.js"></script>
                <script type="text/javascript" src="js/hoverIntent.min.js"></script>
                <script type="text/javascript" src="js/media-upload.min.js"></script>
                <script type="text/javascript" src="js/jquery.clickout.min.js"></script>
                <script type="text/javascript" src="js/responsive.js"></script>
                <script type="text/javascript" src="js/mobilemenu.js"></script>
                <script type=""text/javascript" src="js/jquery.superfish.js"></script>
                <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
                <script type="text/javascript" src="js/jquery.placeholder.js"></script>
                <script type="text/javascript" src="js/contact.js"></script>
                <script type="text/javascript" src="js/jquery.tweetable.js"></script>
                <script type="text/javascript" src="js/jquery.tipsy.js"></script>
                <script type="text/javascript" src="js/jquery.cycle.min.js"></script>
                <script type="text/javascript" src="js/shortcodes.js"></script>
                <script type="text/javascript" src="js/jquery.custom.js"></script>
    </body>
</html>
';

            fwrite($fp, $string);

            fclose($fp);
            }
            
            
            }
            if (isset($_POST["EditFile"])) {
            $fileNo = $_POST["fileNo"];
            $fileTitle = $_POST["fileTitle"];
            $fileName = $_POST["fileName"];
            $fileContent = $_POST["fileContent"];
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "<table border=\"1\">";
            echo "<input type=\"hidden\" name=\"fileNo\" value=\"$fileNo\" ></td></tr>";
            echo "<tr><td>Name</td><td><input type=\"text\" name=\"fileName\" value=\"$fileName\" ></td></tr>";
            echo "<tr><td>Title</td><td><input type=\"text\" name=\"fileTitle\" value=\"$fileTitle\" ></td></tr>";
            echo "<tr><td>Content</td><td><textarea class=\"form-control\" id=\"tinymce_basic\" rows=\"25\" name=\"fileContent\" >$fileContent</textarea></td></tr>";
            echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"handleEditFile\" value=\"Edit\"></td></tr>";
            echo "</table>";
            echo "</form></center>";
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"file\" value=\"Back to File\"></form></center>";
            }
            if (isset($_POST["createFile"])) {
            $fileTitle = $_POST["fileTitle"];
            $fileName = $_POST["fileName"];
            $fileContent = $_POST["fileContent"];
            $sql = "INSERT INTO file VALUES('','$fileName','$fileTitle','$fileContent') ";
            $result = mysql_query($sql) or die(mysql_error());
            while ($rowC = mysqli_fetch_array($resultC)) {
            $fileNo = $rowC["fileNo"];
            }
            $fileNo += 1;
            if ($sql) {
            echo" <center>Create Success - FileNo :$fileNo</center>";
            echo"<center><table border=\"1\">";
            echo"<tr><td>FileNo</td><td>$fileNo</td></tr>";
            echo"<tr><td>Name</td><td>$fileName</td></tr>";
            echo"<tr><td>Title</td><td>$fileTitle</td></tr>";
            echo"<tr><td>Content</td><td>$fileContent</td></tr>";
            echo"</table></center>";
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"file\" value=\"Back to File\"></form></center>";
            //create file
            $fp = fopen("../".$fileName.".php", "w");
            $string = '<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
session_start();

include_once "includes/db_connection.php";
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



        <title>  <?php echo"'.$fileName.' - $rowtitle[1]"?></title>

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

        <link rel="stylesheet" id="thickbox-css" href="js/thickbox/thickbox.css" type="text/css" media="all" />
        <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1" type="text/css" media="all" />
        <link rel="stylesheet" id="fontawesome-css" href="css/font-awesome.css" type="text/css" media="all" />
        <link rel="stylesheet" id="responsive-css" href="css/responsive.css" type="text/css" media="all" />
        <link rel="stylesheet" id="polaroid-slider-css" href="sliders/polaroid/css/polaroid.css" type="text/css"" media="all" />
        <link rel="stylesheet" id="ahortcodes-css" href="css/shortcodes.css" type="text/css"" media="all" />
        <link rel="stylesheet" id="contact-form-css" href="css/contact_form.css" type="text/css" media="all" />
        <link rel="stylesheet" id="blog-libra-big-css" href="blog/libra-big/css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" id="custom-css" href="css/custom.css" type="text/css" media="all" />

        <style type="text/css">
            body {
                background-color: #ffffff;
                background-image: url("images/bg-pattern.png");
                background-repeat: repeat;
                background-position: top left;
                background-attachment: scroll;
            }
        </style>

        <script type="text/javascript" src="js/jquery/jquery.js"></script>


    </head>
    <body class="page no_js responsive stretched">
        
        <?php include_once "shadow.php"; ?>
    </div>
         <div class="slogan">
            <h2><?php echo "'.$fileTitle.'" ?></h2>
        </div>
          <!-- START PRIMARY -->
       
                        <center>     <?php
   
       echo "'.$fileContent.'";
        
        ?></center>
                     


      
        
        <!-- START FOOTER -->
        <?php include_once "footer.php"; ?>
            <!-- ENDFOOTER -->

            <!-- START COPYRIGHT -->
            <?php include_once "copyright.php"; ?>
                <!-- END COPYRIGHT -->

                <div class="wrapper-border"></div>

                </div>
                <!-- END WRAPPER -->

                </div>
                <!-- END BG SHADOW -->
          <!-- END BG SHADOW -->

                <script type="text/javascript" src="js/comment-reply.min.js"></script>
                <script type="text/javascript" src=""js/underscore.min.js"></script>
                <script type="text/javascript" src="js/jquery/jquery.masonry.min.js"></script>
                <script type="text/javascript" src="js/jquery.easing.js"></script>
                <script type="text/javascript" src="js/hoverIntent.min.js"></script>
                <script type="text/javascript" src="js/media-upload.min.js"></script>
                <script type="text/javascript" src="js/jquery.clickout.min.js"></script>
                <script type="text/javascript" src="js/responsive.js"></script>
                <script type="text/javascript" src="js/mobilemenu.js"></script>
                <script type=""text/javascript" src="js/jquery.superfish.js"></script>
                <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
                <script type="text/javascript" src="js/jquery.placeholder.js"></script>
                <script type="text/javascript" src="js/contact.js"></script>
                <script type="text/javascript" src="js/jquery.tweetable.js"></script>
                <script type="text/javascript" src="js/jquery.tipsy.js"></script>
                <script type="text/javascript" src="js/jquery.cycle.min.js"></script>
                <script type="text/javascript" src="js/shortcodes.js"></script>
                <script type="text/javascript" src="js/jquery.custom.js"></script>
    </body>
</html>
';

            fwrite($fp, $string);

            fclose($fp);
            }
            }
            
            if (isset($_POST["searchFile"])) {
            $type = $_POST["type"];
            $keyword = $_POST["keyword"];
            $querySearch = "SELECT * from file WHERE $type LIKE '%" . $keyword . "%'";
            $resultSearch = mysqli_query($conn, $querySearch);
            if (!$resultSearch) {
            die("Database access failed: " . mysqli_error($conn));
            } else {
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "Search: <select name=\"type\">";
            echo "<option value=\"fileNo\">FileID</option>";
            echo "<option value=\"fileName\">Name</option>";
            echo "<option value=\"fileTitle\">Title</option>";
            echo "<option value=\"fileContent\">Content</option>";
            echo "</select>";
            echo "<input type=\"text\" name=\"keyword\" >";
            echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchFile\" value=\"Search\">";
            echo "</form></center><br><br>";
            echo "<center><table border=\"1\"><tr><td>FileNo</td><td>Name</td><td>Title</td><td>Content</td></tr>";
            while ($rowS = mysqli_fetch_array($resultSearch)) {
            echo "<tr><td>" . $rowS["fileNo"] . "</td><td>" . $rowS["fileName"] . "</td><td>" . $rowS["fileTitle"] . "</td><td>" . $rowS["fileContent"] . "</td>";
            echo "<form action=\"file.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"fileNo\" value=\"" . $rowS["fileNo"] . "\">";
            echo "<input type=\"hidden\" name=\"fileName\" value=\"" . $rowS["fileName"] . "\">";
            echo "<input type=\"hidden\" name=\"fileTitle\" value=\"" . $rowS["fileTitle"] . "\">";
            echo "<input type=\"hidden\" name=\"fileContent\" value=\"" . $rowS["fileContent"] . "\">";
            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditFile\" value=\"Edit\"></td>";
            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteFile\" value=\"Delete\"></td>";
            echo "</form></tr>";
            }
            echo "</table></center>";
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"file\" value=\"Back to File\"></form></center>";
            }
            }
            if (isset($_POST["submitFile"])) {
            $file = $_POST["handleFile"];
            if ($file == "create") {
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "<table border=\"1\">";
            echo "<tr><td>Name</td><td><input type=\"text\" name=\"fileName\" ></td></tr>";
            echo "<tr><td>Title</td><td><input type=\"text\" name=\"fileTitle\" ></td></tr>";
            echo "<tr><td>Content</td><td><textarea class=\"form-control\" id=\"tinymce_basic\" rows=\"25\" name=\"fileContent\" ></textarea></td></tr>";
            echo "<tr><td></td><td><input class=\"btn btn-primary\" type=\"submit\" name=\"createFile\" value=\"Create\"></td></tr>";
            echo "</table>";
            echo "</form></center>";
            }
            if ($file == "view" || $file == "edit" || $file == "delete") {
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "Search: <select name=\"type\">";
            echo "<option value=\"fileNo\">FileNo</option>";
            echo "<option value=\"fileName\">Name</option>";
            echo "<option value=\"fileTitle\">Title</option>";
            echo "<option value=\"fileContent\">Content</option>";
            echo "</select>";
            echo "<input type=\"text\" name=\"keyword\" >";
            echo "<input class=\"btn btn-info\" type=\"submit\" name=\"searchFile\" value=\"Search\">";
            echo "</form></center><br><br>";
            echo "<center><table border=\"1\"><tr><td>FileNo</td><td>Name</td><td>Title</td><td>Content</td></tr>";
            while ($rowC = mysqli_fetch_array($resultC)) {
            echo "<tr><td>" . $rowC["fileNo"] . "</td><td>" . $rowC["fileName"] . "</td><td>" . $rowC["fileTitle"] . "</td><td>" . $rowC["fileContent"] . "</td>";
            echo "<form action=\"file.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"fileNo\" value=\"" . $rowC["fileNo"] . "\">";
            echo "<input type=\"hidden\" name=\"fileName\" value=\"" . $rowC["fileName"] . "\">";
            echo "<input type=\"hidden\" name=\"fileTitle\" value=\"" . $rowC["fileTitle"] . "\">";
            echo "<input type=\"hidden\" name=\"fileContent\" value=\"" . $rowC["fileContent"] . "\">";
            echo "<td><input class=\"btn btn-success\" type=\"submit\" name=\"EditFile\" value=\"Edit\"></td>";
            echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"DeleteFile\" value=\"Delete\"></td>";
            echo "</form></tr>";
            }
            echo "</table></center>";
            echo "<center><form action=\"file.php\" method=\"post\">";
            echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"file\" value=\"Back to File\"></form></center>";
            }
            }
            if (isset($_POST["file"])||isset($_GET["file"])) {
            echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\"><center><form action=\"file.php\" method=\"post\">";
            echo "<h4>File Management</h4> <select class=\"form-control\" id=\"select-1\"  name=\"handleFile\">";
            echo "<option value=\"create\">Create File</option>";
            echo "<option value=\"view\">View File</option>";
            echo "<option value=\"edit\">Edit File</option>";
            echo "<option value=\"delete\">Delete File</option>";
            echo "</select><br />";
            echo "<input class=\"btn btn-primary\" type=\"submit\" name=\"submitFile\" value=\"submit\">";
            echo "</form></center></div></div></div>";
            }
       
            ?>
        </div>
    </table>
</div>
</div>
</div>
</div>
</div>


<?php include_once 'footer.php'; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

<script src="vendors/select/bootstrap-select.min.js"></script>

<script src="vendors/tags/js/bootstrap-tags.min.js"></script>

<script src="vendors/mask/jquery.maskedinput.min.js"></script>

<script src="vendors/moment/moment.min.js"></script>

<script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<!-- bootstrap-datetimepicker -->
<link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
<script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script src="js/custom.js"></script>
<script src="js/forms.js"></script>
<script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

<script src="vendors/ckeditor/ckeditor.js"></script>
<script src="vendors/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

<script src="js/custom.js"></script>
<script src="js/editors.js"></script>

</body>
</html>
