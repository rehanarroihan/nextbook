<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>Confirmation Successful | Nextbook</title>

    <!-- Icons -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                <div class="card text-white bg-primary col-md-1">
                        <div class="card-body text-center">
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="card-body">
                            <h1><i class="fa fa-check"></i> Your account activated successfully</h1>
                            <p>Thank you <?php echo $this->uri->segment(3) ?> for confirm your account. Now you can login to your account</p>
                            <br>
                            <a href="<?php echo base_url(); ?>auth/login"><<  Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>