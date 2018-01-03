<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Starter Template - Materialize</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="<?php echo base_url() ?>assets/css/mat.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body class="grey lighten-3">
    <div class="container">
        <div class="row" style="margin-top:40px;text-align:center;margin-bottom:0px">
            <div class="col s12 m7 l6 offset-l3 offset-m3">
                <div class="row">
                    <img src="<?php echo base_url() ?>assets/img/logo1.png" style="height:80px;margin-bottom:-10px">
                </div>
                <?php $announce = $this->session->userdata('announce') ?>
                <?php if(!empty($announce)): ?>
                <div class="alert alert-danger lighten-4">
                    <?php echo $announce; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m7 l6 offset-l3 offset-m3">
                <div class="card blue darken-1">
                    <div class="" style="height:10px">
                         <!--<h5 class="center">No Time to Game</h5>-->
                    </div>

                    <div id="pg" class="progress" style="margin:0px;display: none;margin-top:-5px">
                        <div class="indeterminate"></div>
                    </div>
                    
                    <div class="card-content white">
                        <div id="test1">
                            <form method="post" action="<?php echo base_url() ?>auth/registers">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">person_pin</i>
                                    <input id="fullname" placeholder="Fullname" type="text" name="fullname" class="validate" required>
                                    <label for="password">Fullname</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12" style="margin-top:-9px">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="username" placeholder="Username" type="text" name="username" class="validate" required>
                                    <label for="password">Username</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12" style="margin-top:-9px">
                                    <i class="material-icons prefix">email</i>
                                    <input id="fullname" placeholder="Email" type="email" name="email" class="validate" required>
                                    <label for="password">Email</label>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-45px">
                            	<div class="input-field col s6">
						        	<i class="material-icons prefix">lock</i>
                                    <input id="password" placeholder="Password" name="password" type="password" class="validate" required>
                                    <label for="password">Password</label>
						        </div>
                                <div class="input-field col s6">
                                    <input id="password" placeholder="Password" name="cpassword" type="password" class="validate" required>
                                    <label for="password">Repeat</label>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-20px;margin-bottom:-8px">
                                <input value="Register" class="btn waves-effect waves-light right blue darken-1 col s12 m4 l4" type="submit" name="registers">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center">
        <p style="" class="center">Forget password ? <a class="grey-text darken-1" href="<?php echo base_url() ?>auth/forgot">Reset Password</a>.</p>
        <p style="margin-top:-14px;" class="center">Already have account ? <a class="grey-text darken-1" href="<?php echo base_url() ?>auth/login">Login</a>.</p>
    </div>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/materialize.js"></script>
    <script src="<?php echo base_url() ?>assets/js/init.js"></script>
    <script type="text/javascript">
        function showpg(){
            var username = document.getElementById('#username');
            var pass = document.getElementById('#password');
            $('#pg').css('display','block');
            if(username == ''){
                $('#texts').text('asyu kososng cok');
            }
        }
    </script>
</body>

</html>