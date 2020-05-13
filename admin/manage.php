<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
include_once '../includes/db_connection.php';
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
        <!-- show display none <div> -->
        <script>
            function myFunction() {
                var x = document.getElementById('myDIV');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                } else {
                    x.style.display = 'none';
                }
            }
            //alert for submiting a form
            function submitResult() {
                if (confirm("Are you sure ?") == false) {
                    return false;
                } else {
                    return true;
                }
            }
        </script>
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <?php
        //handle edit and delete posts
        if (isset($_POST['submit'])) {
            $submit_value = $_POST["submit"];
            @$post_id = $_POST["post_id"];
            @$category_id = $_POST["category_id"];
            //handle edit post 
            if ($submit_value == "edit") {
                $editquery = "select title, body, category_id, keywords, description from posts where post_id = $post_id";
                $editresult = mysqli_query($conn, $editquery)or die(mysqli_error($conn));
                $row = mysqli_fetch_object($editresult);
                //print the edit form 
                echo "<div class=\"col-md-10\">
            <div class=\"content-box-large\">
                <div class=\"panel-body\">
                    <form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                            <label>Keywords: </label>
                            <input class=\"form-control\" type=\"text\" name=\"keywords\"  style=\"width:80%;\" value=\"" . htmlspecialchars_decode($row->keywords) . "\" required />
                        </div>
                        <div class=\"form-group\">
                            <label>Description: </label>
                            <input class=\"form-control\" type=\"text\" name=\"description\"  style=\"width:80%;\" value=\"" . htmlspecialchars_decode($row->description) . "\" required />
                        </div>
                        <div class=\"form-group\">
                            <label>Title: </label>
                            <input class=\"form-control\" type=\"text\" name=\"title\" value=\"" . htmlspecialchars_decode($row->title) . "\"  style=\"width:80%;\" required />
                        </div>
                        <div>
                            <label>Content: </label>
                            <textarea id=\"tinymce_basic\" name=\"body\" rows=\"25\">" . htmlspecialchars_decode($row->body) . "</textarea>
                        </div>
                        <br>
                            <label>Category: </label>
                            
                            <select class=\"form-group btn-lg\" name=\"category\">";
                //get category from database
                $query = "SELECT * FROM category";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                while ($carray = mysqli_fetch_array($result)) {
                    echo"<option value=\"$carray[0]\"";
                    //found out the selected category
                    $catquery = "select category from category where category_id = $row->category_id";
                    $catresult = mysqli_query($conn, $catquery);
                    $catvalue = mysqli_fetch_row($catresult);
                    if ($catvalue[0] == $carray[1]) {
                        echo 'selected';
                    }
                    echo ">$carray[1]</option>";
                }
                echo"<input class=\"btn btn-primary\" type=\"file\" id=\"file\" name=\"file\" />";
                echo"<p>Upload a image (JPG, JPEG, PNG , GIF) if you want to change the article cover picture.</p><br>";
                echo"</select><input type = \"hidden\" name=\"post_id\" value=\"" . $post_id . "\"/>
                        <div style=\"float: right; \">                  
                            <input class=\"btn btn-primary\"  type=\"submit\" name=\"submit\" value=\"Update\">
                        </div>
                    </form>
                </div>
            </div>
        </div>";
            }
            ?>
            <?php
            //hanle update post
            if ($submit_value == "Update") {
                $target_dir = "../uploads/article/";
                @$target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                //get the post data
                $keywords = mysqli_real_escape_string($conn, $_POST['keywords']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $body = mysqli_real_escape_string($conn, $_POST['body']);
                $category = mysqli_real_escape_string($conn, $_POST['category']);
                $date = date('Y-m-d G:i:s');
                // escape variables for security prevent attacks
                $keywords = htmlspecialchars("$keywords");
                $description = htmlspecialchars("$description");
                $title = htmlspecialchars("$title");
                $body = htmlspecialchars("$body");
                //if no file upload
                if ($_FILES["file"]["name"] == null) {
                    $query = "update posts set title = '$title', body = '$body', category_id = '$category', date_modified = '$date', keywords='$keywords', description='$description' where post_id = $post_id";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    echo "<script>alert('Post Modified');window.location.href='manage.php';</script>";
                }
                //file upload
                if ($_FILES["file"]["name"] !== "") {
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
                    //if no error found, upload the file
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) && $uploadOk != 0) {
                        $query = "update posts set title = '$title', body = '$body', category_id = '$category', date_modified = '$date', keywords='$keywords', description='$description', coverImage='$target_file' where post_id = $post_id";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        $query = "INSERT INTO article_img (path) VALUES('$target_file')";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        echo "<script>alert('Post Modified');window.location.href='manage.php';</script>";
                    }
                }
            }
            ?>

            <?php
            //handle delete post
            if ($submit_value == "delete") {
                $delcquery = "delete  from comments where post_id = $post_id";
                $delcresult = mysqli_query($conn, $delcquery)or die(mysqli_error($conn));
                $delquery = "delete  from posts where post_id = $post_id";
                $delresult = mysqli_query($conn, $delquery)or die(mysqli_error($conn));
                echo "<script>alert('Post deleted');window.location.href='manage.php';</script>";
            }
            ?>

            <!--handle edit category -->
            <?php
            if ($submit_value == "Edit") {
                $newquery = "select category from category where category_id = $category_id";
                $newresult = mysqli_query($conn, $newquery)or die(mysqli_error($conn));
                $row = mysqli_fetch_object($newresult);
                //edit category form
                echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-heading\">
                    <div class=\"panel-title\">Edit Category</div>
                </div>
                <div class=\"panel-body\">
                    <form class=\"form-horizontal\" method=\"post\" action=\"\" id=\"editcategory\">
                        <div class=\"form-group\">
                            <label  class=\"col-sm-3 control-label\">Category ID</label>
                            <div class=\"col-sm-2\">
                                <input type=\"text\" class=\"form-control\" name=\"category_id\" value=\"" . $category_id . "\" disabled >
                                    <input type=\"hidden\" class=\"form-control\" name=\"category_id\" value=\"" . $category_id . "\"  >
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Category</label>
                            <div class=\"col-sm-8\">
                                <input type=\"text\" class=\"form-control\" name=\"category\" value=\"" . htmlspecialchars_decode($row->category) . "\" required>
                            </div>
                        </div>                                                             
                        
                        </div>
                    </form>
                    <div class=\"form-group\">
                            <div class=\"col-sm-offset-8 col-sm-10\">
                                <button class=\"btn btn-primary\" type=\"submit\" name=\"submit\" value=\"catupdate\" form=\"editcategory\">Update</button>
                            </div>
                </div>
            </div>
        </div>";
            }
            ?>
            <!--handle update category-->
            <?php
            if ($submit_value == "catupdate") {
                $category = $_POST["category"];
                $upcate = "update category set category = '$category' where category_id = $category_id";
                $upcateresult = mysqli_query($conn, $upcate)or die(mysqli_error($conn));
                echo "<script>alert('Category Modified');window.location.href='manage.php';</script>";
            }
            ?>
            <?php
            //handle delete category
            if ($submit_value == "Delete") {
                $delquery = "delete  from category where category_id = $category_id";
                $delresult = mysqli_query($conn, $delquery)or die(mysqli_error($conn));
                echo "<script>alert('Category deleted');window.location.href='manage.php';</script>";
            }
            ?>
            <!--handle Create category -->
            <?php
            if ($submit_value == "New-Category") {
                //New category form
                echo "<div class=\"col-md-5\">
            <div class=\"content-box-large\">
                <div class=\"panel-heading\">
                    <div class=\"panel-title\">New Category</div>
                </div>
                <div class=\"panel-body\">
                    <form class=\"form-horizontal\" method=\"post\" action=\"\" id=\"newcategory\">
                            <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Category</label>
                            <div class=\"col-sm-8\">
                                <input type=\"text\" class=\"form-control\" name=\"category\" value=\"\" required>
                            </div>
                        </div>                                                             
                        
                        </div>
                    </form>
                    <div class=\"form-group\">
                            <div class=\"col-sm-offset-8 col-sm-10\">
                                <button class=\"btn btn-primary\" type=\"submit\" name=\"submit\" value=\"catCreate\" form=\"newcategory\">Create</button>
                            </div>
                </div>
            </div>
        </div>";
            }
            ?>
            <?php
            //handle Create Category
            if ($submit_value == "catCreate") {
                $category = $_POST["category"];
                //check whether category exit or not
                $checkquery = "select * from category where category = '$category'";
                $chkresult = mysqli_query($conn, $checkquery)or die(mysqli_error($conn));
                $row = mysqli_fetch_row($chkresult);
                if ($row != 0) {
                    echo "<script>alert('Category already existed. Please try again.');window.location.href='manage.php';</script>";
                }
                //Create New Category
                else {
                    $query = "insert into category (category) values ('$category')";
                    $result = mysqli_query($conn, $query)or die(mysqli_error($conn));
                    echo "<script>alert('Category Created');window.location.href='manage.php';</script>";
                }
            }
            ?>

            <!--end of isset submit-->
            <?php
        }

        //handle delete comment
        if (isset($_POST['comment'])) {
            $id = $_POST['comment_id'];
            $query = "delete from comments where comment_id = $id";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            echo "<script>alert('Comment deleted');window.location.href='manage.php';</script>";
        }
        ?>





        <div class="col-lg-10">
            <div class="row">
                <?php
                //select articles from database
                $query = "select post_id, title, posted, date_modified from posts order by post_id desc";
                $result_post = mysqli_query($conn, $query) or die(mysqli_error($conn));
                //get the number of row in the post table
                $numOfRecord = mysqli_num_rows($result_post);
                ?>
                <!--post modify-->
                <div class="col-md-6">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title">Articles</div>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Post Date</th>
                                <th>Date Modified</th>
                                <th>Edit Post</th>
                                <th>Delete Post</th>
                            </tr>
                            <?php
                            if ($numOfRecord <= 0) {
                                echo "<tr><td>No article found.</td> </tr>";
                            } else {
                                // output data of each row 
                                $count = 0;
                                while ($row = mysqli_fetch_array($result_post)) {
                                    echo "<tr>" .
                                    "<td> " . $row["post_id"] . "</td>" .
                                    "<td>" . $row["title"] . "</td>" .
                                    "<td>" . $row["posted"] . "</td>" .
                                    "<td>" . $row["date_modified"] . "</td>" .
                                    "<td>" . "<form action=\"\" method = \"post\">" .
                                    "<input type=\"hidden\" name=\"post_id\" value=\"" . $row["post_id"] . "\"/>" .
                                    "<input class=\"btn btn-success\" type=\"submit\" name =\"submit\" value=\"edit\"/></form>" .
                                    "</td>" .
                                    "<td>" . "<form action=\"\" method = \"post\" onsubmit=\"return submitResult();\">" .
                                    "<input type=\"hidden\" name=\"post_id\" value=\"" . $row["post_id"] . "\"/>" .
                                    "<input class=\"btn btn-danger\" type=\"submit\" name =\"submit\" value=\"delete\"/></form>" .
                                    "</td>" .
                                    "<tr>";
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <?php
                //select category from database
                $catquery = "select category_id, category from category";
                $result_category = mysqli_query($conn, $catquery) or die(mysqli_error($conn));
                //get the number of row in the post table
                $numOfcategory = mysqli_num_rows($result_category);
                ?>
                <!--category modify-->
                <div class="col-md-6">
                    <div class="content-box-large">
                        <table class="table table-striped">
                            <tr>
                                <th>Category ID</th>
                                <th>Category</th>
                                <th>Edit Category</th>
                                <th>Delete Category</th>
                            </tr>
                            <?php
                            if ($numOfcategory <= 0) {
                                echo "<tr><td>No Category Found.</td> </tr>";
                            } else {
                                // output data of each row 
                                $count = 0;
                                while ($row = mysqli_fetch_array($result_category)) {
                                    echo "<tr>" .
                                    "<td> " . $row["category_id"] . "</td>" .
                                    "<td>" . $row["category"] . "</td>" .
                                    "<td>" . "<form action=\"\" method = \"post\">" .
                                    "<input type=\"hidden\" name=\"category_id\" value=\"" . $row["category_id"] . "\"/>" .
                                    "<input class=\"btn btn-success\" type=\"submit\" name =\"submit\" value=\"Edit\"/></form>" .
                                    "</td>" .
                                    "<td>" . "<form action=\"\" method = \"post\" onsubmit=\"return submitResult();\">" .
                                    "<input type=\"hidden\" name=\"category_id\" value=\"" . $row["category_id"] . "\"/>" .
                                    "<input class=\"btn btn-danger\" type=\"submit\" name =\"submit\" value=\"Delete\"/></form>" .
                                    "</td>" .
                                    "<tr>";
                                }
                                echo "<form action=\"\" method = \"post\">" .
                                "<input type=\"hidden\" name=\"category_id\" value=\"" . $row["category_id"] . "\"/>" .
                                "<input class=\"btn btn-info\" type=\"submit\" name =\"submit\" value=\"New-Category\"/></form>";
                            }
                            ?>

                        </table>
                    </div>
                </div>
                <?php
                //select Comments from database
                $comment = "select comment_id, name, comment, date, ip from comments order by comment_id desc";
                $result_comment = mysqli_query($conn, $comment) or die(mysqli_error($conn));
                //get the number of row in the post table
                $numOFcomment = mysqli_num_rows($result_comment);
                ?>
                <!--Comments modify-->
                <div class="col-md-6">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title">Comments</div>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th>IP address</th>
                                <th>Delete Comment</th>
                            </tr>
                            <?php
                            if ($numOFcomment <= 0) {
                                echo "<tr><td>No Comment Found.</td> </tr>";
                            } else {
                                // output data of each row 
                                $count = 0;
                                while ($row = mysqli_fetch_array($result_comment)) {
                                    echo "<tr>" .
                                    "<td>" . $row["name"] . "</td>" .
                                    "<td>" . $row["comment"] . "</td>" .
                                    "<td>" . $row["date"] . "</td>" .
                                    "<td>" . $row["ip"] . "</td>" .
                                    "<td>" . "<form action=\"\" method = \"post\" onsubmit=\"return submitResult();\">" .
                                    "<input type=\"hidden\" name=\"comment_id\" value=\"" . $row["comment_id"] . "\"/>" .
                                    "<input class=\"btn btn-danger\" type=\"submit\" name =\"comment\" value=\"Delete\"/></form>" .
                                    "</td>" .
                                    "<tr>";
                                }
                            }
                            ?>

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