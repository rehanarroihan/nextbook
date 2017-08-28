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

    <title>Register | Nextbook</title>

    <!-- Icons -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <form method="post" action="<?php echo base_url() ?>auth/registers">
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-muted">Create your account</p>
                            <?php $announce = $this->session->userdata('announce') ?>
                            <?php if(!empty($announce)): ?>
                                <?php if($announce == 'Berhasil menyimpan data'): ?>
                                <div class="alert alert-danger"><?php echo $announce; ?></div>
                                <?php else: ?>
                                <div class="alert alert-danger"><?php echo $announce; ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="fa fa-angellist"></i>
                                </span>
                                <input type="text" name="fullname" class="form-control" placeholder="Fullname">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">@</span>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" name="cpassword" class="form-control" placeholder="Repeat password">
                            </div>
                            <input type="submit" name="registers" value="Create Account" class="btn btn-block btn-success">
                        </div>
                    </form>
                    <div class="card-footer p-4">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-facebook" type="button">
                                    <span>facebook</span>
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-twitter" type="button">
                                    <span>twitter</span>
                                </button>
                            </div>
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
