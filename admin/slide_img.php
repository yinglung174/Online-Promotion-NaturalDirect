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
        <!-- warning of submit buttom -->
        <script>
            function clicked(e)
            {
                if (!confirm('Are you sure?'))
                    e.preventDefault();
            }
        </script>

        <!-- checkbox select all-->
        <script type="text/javascript">
            function check_all(obj, cName)
            {
                var checkboxs = document.getElementsByName(cName);
                for (var i = 0; i < checkboxs.length; i++) {
                    checkboxs[i].checked = obj.checked;
                }
            }
        </script> 
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <?php
        $valid_formats = array("jpg", "png", "gif", "bmp");
        $max_file_size = 2048 * 1000000; //20mb
        $path = "../uploads/cover/"; // Upload directory
        $count = 0;
        $uploadOk = 1;
        //handle upload image
        if (isset($_POST["upload"]) and $_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];
            $title = mysqli_real_escape_string($conn, $_POST['tit_slogan']);
            $body = mysqli_real_escape_string($conn, $_POST['body']);
            $title = htmlspecialchars("$title");
            $body = htmlspecialchars("$body");
            $oldpath = $_POST['path'];

            // Loop $_FILES to exeicute all files
            foreach ($_FILES['files']['name'] as $f => $name) {
                if ($_FILES['files']['error'][$f] == 4) { //  4 means no file uploaded 
                    $query = "update slide_img set slogan_title = '$title', slogan_content = '$body' where id = $id";
                    mysqli_query($conn, $query)or die(mysqli_error($conn));
                    echo "<script>alert('Slogan $id update success!');window.location.href='slide_img.php';</script>";
                }
                if (file_exists($path . $name)) {
                    echo "<script>alert('$name exists... Upload fail!');</script>";
                    $uploadOk = 0;
                    $count++;
                }
                if ($_FILES['files']['error'][$f] == 0 && $uploadOk != 0) {
                    if ($_FILES['files']['size'][$f] > $max_file_size) {
                        $message[] = "$name is too large!.";
                        continue; // Skip large files
                    } elseif (!in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats)) {
                        $message[] = "$name is not a valid format";
                        continue; // Skip invalid file formats
                    } else { // No error found! Move uploaded files and insert into database and remove the old image
                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $name) && $uploadOk != 0) {
                            unlink($oldpath);
                            $total_img = count($name);
                            $query = "update slide_img set path = '$path$name', slogan_title = '$title', slogan_content = '$body' where id = $id";
                            $result = mysqli_query($conn, $query)or die(mysqli_error($conn));
                            $count++; // Number of successfully uploaded file
                        }
                        if ($count == $total_img) {
                            echo "<script>alert('Success!');window.location.href='slide_img.php';</script>";
                        }
                    }
                }
            }
        }

        //GET THE SLIDE INFORMATION
        $query = "select * from slide_img";
        $result = mysqli_query($conn, $query);
        ?>


<!--        <h1>Preview</h1>
        <iframe  src="../index.php" frameborder="0" scrolling="no" width="1050" height="550" ></iframe>-->
        <div class="col-md-10">
            <div class="row">
                <!-- slides editor -->
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-6">
                        <div class="content-box-large">
                            <div class="panel-body">
                                <h2>Slider <?php echo $row['id'] ?></h2>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
                                    <div class="form-group">
                                        <label>Title of slogan: </label>
                                        <input class="form-control"  type="text" name="tit_slogan" value="<?php echo $row['slogan_title'] ?>" style="width:90%;" maxlength="30"  required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Content: </label>
                                        <textarea style="width:100%;" class="form-control" id="tinymce_basic" name="body" rows="5" ><?php echo$row['slogan_content'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Current image:</label><img width="100px"  height="50px" src="<?php echo $row['path'] ?>"/><br>
                                        <input type="hidden" name="path" value="<?php echo$row['path'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <b>***</b>No need to choose a image if you don't want to change
                                        <input class="btn btn-primary" type="file" id="file" name="files[]"  accept="image/*"  />
                                    </div>
                                    <input class="btn btn-primary" type="submit" name="upload" value="Save" />
                                </form><br>
                            </div>
                        </div>
                    </div>
                    <?php
                    //END OF WHILE LOOP
                }
                ?>
            </div>
        </div>







        <!--  Page content -->
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
</body>
</html>