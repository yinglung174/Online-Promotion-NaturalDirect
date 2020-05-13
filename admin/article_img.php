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
        $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
        $max_file_size = 2048 * 1000000; //20mb
        $path = "../uploads/article/"; // Upload directory
        $count = 0;
        $uploadOk = 1;
        //handle upload image
        if (isset($_POST["upload"]) and $_SERVER['REQUEST_METHOD'] == "POST") {
            // Loop $_FILES to exeicute all files
            foreach ($_FILES['files']['name'] as $f => $name) {
                if ($_FILES['files']['error'][$f] == 4) {
                    continue; // Skip file if any error found
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
                    } else { // No error found! Move uploaded files and insert into database
                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $name) && $uploadOk != 0) {
                            $total_img = count($name);
                            $query = "insert into article_img (path) values ('$path$name')";
                            $result = mysqli_query($conn, $query)or die(mysqli_error($conn));
                            $count++; // Number of successfully uploaded file
                        }
                        if ($count == $total_img) {
                            echo "<script>alert('Upload Success!');window.location.href='article_img.php';</script>";
                        }
                    }
                }
            }
        }



        //delete selected img

        if (isset($_POST['img']) && is_array($_POST['img'])) {
            foreach ($_POST['img'] as $img) {
                $getPath = "select path from article_img where id = $img";
                $pathresult = mysqli_query($conn, $getPath) or die(mysqli_error($conn));
                $path = mysqli_fetch_row($pathresult);
                unlink(urldecode($path[0]));
                $query = "delete from article_img where id = $img";
                $result = mysqli_query($conn, $query) or dir(mysqli_error($conn));
            }

            //            $imgList = implode(', ', $_POST['img']);
//            $query = "delete from images where id = $imgList";
//            $result = mysqli_query($conn, $query) or dir(mysqli_error($conn));
//            echo "<script>alert('Images deleted');window.location.href='image.php';</script>";
        }
        ?>

        <!-- upload image-->
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="content-box-large">
                        <div class="panel-body">
                            <h2>Upload images</h2>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input class="btn btn-primary" type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
                                </div>
                                <input class="btn btn-primary" type="submit" name="upload" value="Upload!" />
                            </form><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- view image -->
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">             
                    <div class="content-box-large">
                        <div class="panel-body">
                            <form method="post" action="">
                                <?php
                                $query = "select * from article_img ";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                $count_row = mysqli_fetch_row($result);
                                if ($count_row == 0) {
                                    echo "<img style=\"width:400px; height:400px;\" src=\"../image/no-image.png\" >";
                                } else {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<div class=\"col-md-2\"><div style=\"margin-left:25%; margin-top:30%;\"></div><label for=\"" . $row["id"] . "\"><img style=\"width:125px; height:125px;\" class=\"img-responsive\"  src=\"" . $row["path"] . "\"></label>"
                                        . "<div class=\"checkbox-mark\" style=\"margin-left:45%;\"><input type=\"checkbox\" name=\"img[]\" id=\"" . $row["id"] . "\" value=\"" . $row["id"] . "\"/></div></div> ";
                                    }
                                    ?>
                                    <div style="float:right; margin-top: 200px;"><input class="" type="checkbox" name="all" onclick="check_all(this, 'img[]')" />Select all</div>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="content-box-large">
                        <!-- Delete image -->
                        <div class="panel-body">
                            <input class="btn btn-warning col-lg-3" style="margin-left: 10px;" onclick="clicked(event)" type="submit" name="delete" value="Delete selected images">
                        </div>





                    </div>
                    </form>

                </div>
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