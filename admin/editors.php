<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$target_dir = "../uploads/article/";
@$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
include_once '../includes/db_connection.php';
if (isset($_POST['submit'])and $_SERVER['REQUEST_METHOD'] == "POST") {
    //get the post data
    date_default_timezone_set('hongkong');
    $keywords = mysqli_real_escape_string($conn, $_POST['keywords']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    @$img = $_POST['img'];
    $user_id = $_SESSION['user_id'];
    $date = date('Y-m-d G:i:s');
    // escape variables for security prevent attacks
    $keywords = htmlspecialchars("$keywords");
    $description = htmlspecialchars("$description");
    $title = htmlspecialchars("$title");
    $body = htmlspecialchars("$body");
//    if ($img == "") {
//        $query = "INSERT INTO posts (user_id, title, body, category_id, posted, keywords, description) VALUES('$user_id','$title','$body','$category','$date','$keywords','$description')";
//        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
//        echo "<script>alert('Post added');window.location.href='manage.php';</script>";
//    } else {
//        //insert post into database
//        $query = "INSERT INTO posts (user_id, title, body, category_id, posted, keywords, description, coverImage) VALUES('$user_id','$title','$body','$category','$date','$keywords','$description','$img')";
//        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
//        echo "<script>alert('Post added');window.location.href='manage.php';</script>";
//    }
    //if no image upload and select
    if ($_FILES["file"]["name"] == "" && $img == "") {
        $query = "INSERT INTO posts (user_id, title, body, category_id, posted, keywords, description) VALUES('$user_id','$title','$body','$category','$date','$keywords','$description')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo "<script>alert('Post added');window.location.href='manage.php';</script>";
    }
    //if no image upload and image has been selected
    if ($_FILES["file"]["name"] == "" && $img != "") {
        //insert selected image into database
        $query = "INSERT INTO posts (user_id, title, body, category_id, posted, keywords, description, coverImage) VALUES('$user_id','$title','$body','$category','$date','$keywords','$description','$img')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo "<script>alert('Post added');window.location.href='manage.php';</script>";
    }


    //if detected file upload and image has not been selected
    if ($_FILES["file"]["name"] !== "" && $img == "") {
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>alert('Sorry, file already exists.');window.location.href='manage.php';</script>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["file"]["size"] > 2048 * 1000000) { //20mb
            echo "<script>alert('Sorry, your file is too large.');window.location.href='manage.php';</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');window.location.href='manage.php';</script>";
            $uploadOk = 0;
        }
        //check file exists or not
        if (file_exists($target_file)) {
            echo "<script>alert('File exists... Upload fail!');</script>";
            $uploadOk = 0;
        }
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) && $uploadOk != 0) {
            $query = "INSERT INTO posts (user_id, title, body, category_id, posted, keywords, description, coverImage) VALUES('$user_id','$title','$body','$category','$date','$keywords','$description','$target_file')";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $query = "INSERT INTO article_img (path) VALUES('$target_file')";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            echo "<script>alert('Post added');window.location.href='manage.php';</script>";
        }
    }
}
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


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- leaving alert!  -->
        <script type='text/javascript'>
            //            function submitResult() {
            //                if (confirm("Are you sure you wish to submit?") == false) {
            //                    return false;
            //                } else {
            //                    return true;
            //                }
            //            }
            //            window.onbeforeunload = goodbye;

            //            function goodbye(e) {
            //                if (!e)
            //                    e = window.event;
            //                //e.cancelBubble is supported by IE - this will kill the bubbling process.
            //                e.cancelBubble = true;
            //                e.returnValue = 'Are you sure?'; //This is displayed on the dialog
            //
            //                //e.stopPropagation works in Firefox.
            //                if (e.stopPropagation) {
            //                    e.stopPropagation();
            //                    e.preventDefault();
            //                }
            //            }
            //
            //            window.onbeforeunload = goodbye;

            //perfect run for a page including a form
            var formSubmitting = false;
            var setFormSubmitting = function () {
                formSubmitting = true;
            };

            window.onload = function () {
                window.addEventListener("beforeunload", function (e) {
                    if (formSubmitting) {
                        return undefined;
                    }

                    var confirmationMessage = 'It looks like you have been editing something. '
                            + 'If you leave before saving, your changes will be lost.';

                    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
                    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
                });
            };
        </script>
        <!-- show display none <div> -->
<!--        <script>
            function myFunction() {
                var x = document.getElementById('myDIV');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                } else {
                    x.style.display = 'none';
                }
            }
        </script>-->
        <!--        <script>
                    function new_disp() {
                        document.getElementById('myform').style.display = 'block';
                    }
                </script>-->




    </head>
    <body>
        <?php include_once 'header.php'; ?>


        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-body">
                    <form  action="" method="post"onsubmit="setFormSubmitting()" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Keywords: </label>
                            <input class="form-control" type="text" name="keywords" placeholder="Use comma to seperate keywords. E.g.: wepaint, natdir, paint"  style="width:80%;" required />
                        </div>
                        <div class="form-group">
                            <label>Description: </label>
                            <input class="form-control" type="text" name="description" placeholder="Description."  style="width:80%;" required />
                        </div>

                        <div class="form-group">
                            <label>Title: </label>
                            <input class="form-control" type="text" name="title" placeholder="Title."  style="width:80%;" required />
                        </div>
                        <div class="form-group">
                            <label>Category: </label>
                            <select class="form-control" id="select-1" name="category">
                                <?php
                                $query = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                while ($carray = mysqli_fetch_array($result)) {
                                    echo"<option value=\"$carray[0]\">$carray[1]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Content: </label>
                            <textarea class="form-control" id="tinymce_basic" name="body" rows="25"></textarea>
                        </div>
                        <!-- show the images -->
                        <h4 style="text-align: center"><u>Select</u> <b style="color: #dc322f;">or</b> <u>upload</u> a image (JPG, JPEG, PNG , GIF) for the cover of article. </button><br>
                            **If there is no image selected, wePaint logo will be use by default.</h4>
                        <!-- upload image -->
                        <input style="margin-top: 0.5%; margin-left: 30%" class="btn btn-primary" type="file" id="file" name="file" /> 

                        <div id="myDIV"  >
                            <?php
                            $iquery = "select * from article_img";
                            $iresult = mysqli_query($conn, $iquery) or die(mysqli_error($conn));
                            $count_row = mysqli_fetch_row($iresult);
                            if ($count_row == 0) {
                                echo "<img style=\"width:400px; height:400px;\" src=\"../image/no-image.png\" >";
                            } else {
                                while ($row = mysqli_fetch_assoc($iresult)) {
                                    echo "<div class=\"col-md-2\"><div style=\"margin-left:25%; margin-top:30%;\"></div><label for=\"" . $row["id"] . "\"><img style=\"width:125px; height:125px;\" class=\"img-responsive\"  src=\"" . $row["path"] . "\"></label>"
                                    . "<div class=\"checkbox-mark\" style=\"margin-left:45%;\"><input  type=\"radio\" name=\"img\" id=\"" . $row["id"] . "\" value=\"" . $row["path"] . "\"/></div></div> ";
                                }
                            }
                            ?>
                        </div>
                </div>
            </div>
            <br>
            <div style="float: right;">    
                <input onclick="return confirm('Are you sure?')" class="btn btn-primary" style="margin-bottom: 3%" type="submit" name="submit" value="Post" >
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>

<?php include_once 'footer.php'; ?>

<link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

<script src="vendors/ckeditor/ckeditor.js"></script>
<script src="vendors/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

<script src="js/custom.js"></script>
<script src="js/editors.js"></script>
</body>
</html>