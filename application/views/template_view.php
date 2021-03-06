<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/2.0/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php if(!empty($title)){echo $title.' | ';} ?>Nextbook</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- File Upload -->
    <link href="<?php echo base_url() ?>assets/2.0/font-awesome/css/fileupload.css" rel="stylesheet"/>

    <!-- Font Awesome-->
    <link href="<?php echo base_url() ?>assets/2.0/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>assets/2.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet" /> 

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() ?>assets/2.0/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url() ?>assets/2.0/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url() ?>assets/2.0/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/2.0/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <!-- Sweet Alert -->
    <script src="<?php echo base_url() ?>assets/vendors/swal/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/swal/sweetalert.css">

    <!-- Time Picker -->
    <link href="<?php echo base_url() ?>assets/2.0/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body>

<!--   Core JS Files   -->
<script src="<?php echo base_url() ?>assets/2.0/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/2.0/js/bootstrap.min.js" type="text/javascript"></script>

<div class="wrapper">
    <div class="sidebar" data-color="<?php echo $interface->color;?>" data-image="<?php echo base_url() ?>assets/2.0/img/<?php echo $interface->image;?>">
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="logo">
            <a href="#" class="simple-text logo-mini">

            </a>

            <a href="<?php echo base_url();?>" class="simple-text logo-normal">
                <img src="<?php echo base_url() ?>assets/img/logo1.png" style="width:120px">
            </a>
        </div>
        
        <div class="sidebar-wrapper">
            <div class="user"> 
                <div class="info">
                    <div class="photo">
                        <?php if ($this->session->userdata('oauth_provider') == 'facebook'): ?>
                            <img src="https://graph.facebook.com/<?php echo $this->session->userdata('oauth_id');?>/picture">
                            <?php else: ?>
                            <?php if ($detail->profilepict == ''): ?>
                                <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" />
                                <?php else: ?>
                                <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $detail->profilepict;?>" />
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span>
                            <?php echo $this->session->userdata('dspname'); ?>
                            <!-- <b class="caret"></b> -->
                        </span>
                    </a>

                    <div class="" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#pablo">
                                    <span class="sidebar-mini"><i class="pe-7s-mail"></i></span>
                                    <span class="sidebar-normal"><?php echo $this->session->userdata('email'); ?></span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url() ?>auth/logout">
                                    <span class="sidebar-mini"><i class="pe-7s-prev"></i></span>
                                    <span class="sidebar-normal">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            

            <ul class="nav">
                <li>
                    <a href="<?php echo base_url() ?>aclass">
                        <i class="pe-7s-graph"></i>
                        <p>Class</p>
                    </a>
                </li>
               <!--  <li class="">
                    <a href="<?php echo base_url() ?>card">
                        <i class="pe-7s-user"></i>
                        <p>Card</p>
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo base_url() ?>profile/edit">
                        <i class="pe-7s-note2"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>setting">
                        <i class="pe-7s-news-paper"></i>
                        <p>Setting</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#">User</a> -->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Notification 5</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
                        <?php if (isset($allowsearch)): ?>
                            <li>
                            <?php if($allowsearch == 'class'): ?>
                                <form class="navbar-form navbar-left navbar-search-form" role="search" action="<?php echo base_url();?>aclass/home" method="get">
                            <?php elseif($allowsearch == 'lesson'): ?>
                                <form class="navbar-form navbar-left navbar-search-form" role="search" action="<?php echo base_url();?>aclass/lesson/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4); ?>" method="get">
                            <?php endif;?>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input type="text" value="<?php if(isset($bsearch)): echo $bsearch; endif;?>" class="form-control" placeholder="Search Post/Img/File Name" name="search">
                                    </div>
                                </form>
                            </li>
                        <?php endif;?>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                           <a href="">
                               <p>...</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li> -->
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                <?php $this->load->view($primary_view);?>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.nextbook.cf">Nextbook</a>, made to easier for you to manage your lessons
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    

    <script type="text/javascript" src="<?php echo base_url() ?>assets/2.0/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/2.0/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>

    <!-- File Upload -->
    <script src="<?php echo base_url() ?>assets/2.0/js/fileupload.js"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo base_url() ?>assets/2.0/js/chartist.min.js"></script>

    <!--  Notifications Plugin  -->
    <script src="<?php echo base_url() ?>assets/2.0/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo base_url() ?>assets/2.0/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url() ?>assets/2.0/js/demo.js"></script>
    <script type="text/javascript">
        <?php $announce = $this->session->flashdata('announce'); ?>
        <?php if(!empty($announce)): ?>
            $.notify({
                icon: 'pe-7s-bell',
                message: "<b>Notification</b><br><?php echo $announce; ?>"
            },{
                type: 'info',
                timer: 2000
            });            
        <?php endif; ?>

        window.fbAsyncInit = function() {
            FB.init({
              appId      : '124182608227692',
              xfbml      : true,
              version    : 'v2.10'
            });
          
            FB.AppEvents.logPageView();
          
        };

        (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "https://connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</html>