<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
include_once '../includes/db_connection.php';
$query = "select * from login_info ";
$result = mysqli_query($conn, $query);
$numOfrow = mysqli_num_rows($result); //number of row 
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
                    <form action=\"\" method=\"post\">
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
                echo"
                                    <input class=\"btn btn-primary\" type=\"file\" id=\"fileToUpload\" name=\"fileToUpload\" />
                                ";
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
                //get the post data
                $keywords = mysqli_real_escape_string($conn, $_POST['keywords']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $body = mysqli_real_escape_string($conn, $_POST['body']);
                $category = mysqli_real_escape_string($conn, $_POST['category']);
                $date = date('Y-m-d G:i:s');
                $file = $_POST['fileToUpload'];
                // escape variables for security prevent attacks
                $keywords = htmlspecialchars("$keywords");
                $description = htmlspecialchars("$description");
                $title = htmlspecialchars("$title");
                $body = htmlspecialchars("$body");

                $target_dir = "../coverimage/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($file == null) {
                    $query = "update posts set title = '$title', body = '$body', category_id = '$category', date_modified = '$date', keywords='$keywords', description='$description' where post_id = $post_id";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    echo "<script>alert('Post Modified');window.location.href='manage.php';</script>";
                } else {


                    $query = "update posts set title = '$title', body = '$body', category_id = '$category', date_modified = '$date', keywords='$keywords', description='$description', coverImage='$target_file' where post_id = $post_id";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    echo "<script>alert('Post Modified');window.location.href='manage.php';</script>";
                }
            }
            ?>

            <?php
            //handle delete post
            if ($submit_value == "delete") {
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
        ?>



<?php
                //select articles from database
                $query = "select post_id, title, posted, date_modified from posts";
                $result_post = mysqli_query($conn, $query) or die(mysqli_error($conn));
                //get the number of row in the post table
                $numOfRecord = mysqli_num_rows($result_post);
                ?>
                <!--post modify-->
                <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Login information</div>
                </div>
                <div class="panel-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Post Date</th>
                                <th>Date Modified</th>
                                <th>Edit Post</th>
                                <th>Delete Post</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                
                
                
                
        
        
        
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Login information</div>
                </div>
                <div class="panel-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>Username</th>
                                <th>Date</th>
                                <th>IP address</th>
                                <th>States</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['ip'] ?></td>
                                    <td><?php
                                        if ($row['success'] == "yes") {
                                            echo "Success";
                                        } else {
                                            echo "fail";
                                        }
                                        ?></td>
                                </tr>
                                <!-- end of while -->
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

<link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

<script src="vendors/datatables/dataTables.bootstrap.js"></script>

<script src="js/custom.js"></script>
<script src="js/tables.js"></script>
</body>
</html>