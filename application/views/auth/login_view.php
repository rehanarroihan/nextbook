<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Login to your account | Nextbook</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="<?php echo base_url() ?>assets/css/mat.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body class="grey lighten-3">
    <div class="container">
        <div class="row" style="margin-top:35px;text-align:center;">
            <div class="col s12 m7 l6 offset-l3  offset-m3">
                <div class="row">
                    <img src="<?php echo base_url() ?>assets/img/logo1.png" style="height:80px;margin-bottom:-10px">
                </div>
                <!-- FOR NOTIF -->
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
                            <form method="post" action="<?php echo base_url() ?>auth/logins">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <?php $usr = $this->input->get('usr'); ?>
                                    <input id="username" value="<?php if(!empty($usr)){echo $usr;} ?>" placeholder="Username" type="text" name="login" class="validate" required>
                                    <label for="password">Username</label>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-45px">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" placeholder="Password" name="password" type="password" class="validate" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-20px;margin-bottom:-8px">
                                <input value="Login" class="btn waves-effect waves-light right blue darken-1 col s12 m4 l4" type="submit" name="logins">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m7 l6 offset-l3 offset-m3">
                <div class="row">
                    <button class="btn waves-effect col s12 m6 l6 waves-light right red" type="button" name="action">Login with google account
                        <i class="material-icons left">send</i>
                    </button>
                    <button type="button" class="btn waves-effect col s12 m6 l6 waves-light right blue darken-3" name="action">Login with facebook account
                        <i class="material-icons left">send</i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center">
        <p style="" class="center">Forget password ? <a class="grey-text darken-1" href="<?php echo base_url() ?>auth/forgot">Reset Password</a>.</p>
        <p style="margin-top:-14px;" class="center">Don't Have Account ? <a class="grey-text darken-1" href="<?php echo base_url() ?>auth/register">Register</a>.</p>
    </div>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/slush.js" type="text/javascript"></script>
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