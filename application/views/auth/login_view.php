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
        <div class="row" style="margin-top:40px;text-align:center;">
            <div class="col s12 m7 l6 offset-l3  offset-m3">
                <div class="row">
                    <img src="<?php echo base_url() ?>assets/img/logo1.png" style="height:80px">
                </div>
                <!-- FOR NOTIF -->
                <?php //$announce = $this->session->userdata('announce') ?>
                <?php //if(!empty($announce)): ?>
                <!-- <div class="alert alert-danger lighten-4"> -->
                    <?php //echo $announce; ?>
                <!-- </div> -->
                <?php //endif; ?>
                <div class="alert alert-info lighten-4" id="alert">
                    Please login with registered email and password
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:-30px">
            <div class="col s12 m7 l6 offset-l3 offset-m3">
                <div class="card blue darken-1">

                    <div id="pg" class="progress" style="margin:0px;visibility:hidden;margin-top:-15px">
                        <div class="indeterminate"></div>
                    </div>
                    
                    <div class="card-content white">
                        <div id="test1">
                            <form method="post" id="formLogin" action="#">
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

                    <div class="" style="height:10px">
                         <!--<h5 class="center">No Time to Game</h5>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:-19px;padding-left:20px;padding-right:20px">
            <div class="col s12 m7 l6 offset-l3 offset-m3">
                <div class="row">
                    <a href="<?php echo $loginURL; ?>" class="btn waves-effect col s12 m12 l12 waves-light right red" type="button" name="action">Login with google account
                        <i class="material-icons left">send</i>
                    </a>
                </div>
                <div class="row" style="margin-top:-14px">
                    <a href="<?php echo $authUrl?>" class="btn waves-effect col s12 m12 l12 waves-light right blue darken-3" name="action">Login with facebook account
                        <i class="material-icons left">send</i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center;margin-top:-20px">
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
            $('#pg').css('display','block');
            $('#alert').removeClass("alert-info");
            $('#alert').addClass("alert-success");
            document.getElementById("alert").innerHTML='Processing ..';
            //ajax
        }

        var form = document.getElementById('formLogin');
        form.onsubmit = function(event) {

            $('#pg').css('visibility','visible');
            $('#alert').removeClass("alert-danger");
            $('#alert').removeClass("alert-info");
            $('#alert').addClass("alert-success");
            document.getElementById("alert").innerHTML='Processing ..';

            var urls = "<?php echo base_url() ?>auth/loging";
            var params = $('#formLogin').serialize();

            $.ajax({
                url : urls,
                data : params,
                method: 'post',
                success : function(html) {
                    if(html == '2'){
                        $('#pg').css('visibility','hidden');
                        $('#alert').removeClass("alert-success");
                        $('#alert').addClass("alert-info");
                        document.getElementById("alert").innerHTML='Login successfull';
                        setTimeout(function(){
                            $('#alert').removeClass("alert-danger");
                            $('#alert').removeClass("alert-info");
                            $('#alert').addClass("alert-success");
                            $('#pg').css('visibility','visible');
                            document.getElementById("alert").innerHTML='Redirecting, please wait ..';
                            window.location = "<?php echo base_url() ?>home";
                        }, 500); 
                    }else if(html == '1'){
                        $('#pg').css('visibility','hidden');
                        $('#alert').removeClass("alert-success");
                        $('#alert').addClass("alert-danger");
                        document.getElementById('password').value = "";
                        document.getElementById("alert").innerHTML='Please check your email for verification';
                    }else if(html == '0'){
                        $('#pg').css('visibility','hidden');
                        $('#alert').removeClass("alert-success");
                        $('#alert').addClass("alert-danger");
                        document.getElementById('password').value = "";
                        document.getElementById("alert").innerHTML='Invalid username or password';
                        document.getElementById("username").focus();
                    }else{
                        $('#pg').css('visibility','hidden');
                        $('#alert').removeClass("alert-success");
                        $('#alert').addClass("alert-danger");
                        document.getElementById('password').value = "";
                        document.getElementById("alert").innerHTML='Something went wrong, please try again';
                    }
                },
                error : function (argument) {
                    $('#pg').css('visibility','hidden');
                    $('#alert').removeClass("alert-success");
                    $('#alert').addClass("alert-danger");
                    document.getElementById('password').value = "";
                    document.getElementById("alert").innerHTML='Something went wrong, please try again';
                }
            });
            event.preventDefault();
        }
    </script>
</body>

</html>