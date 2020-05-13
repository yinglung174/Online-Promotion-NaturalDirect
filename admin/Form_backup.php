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

            <div class="row">

                <div class="col-md-6">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title">Vertical Form</div>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Text field</label>
                                        <input class="form-control" placeholder="Text field" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Password field</label>
                                        <input class="form-control" placeholder="Password" type="password" value="mypassword">
                                    </div>
                                    <div class="form-group">
                                        <label>Textarea</label>
                                        <textarea class="form-control" placeholder="Textarea" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Readonly</label>
                                        <span class="form-control">Read only text</span>
                                    </div>
                                </fieldset>
                                <div>
                                    <div class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Submit
                                    </div>
                                </div>
                            </form>
                        </div>
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