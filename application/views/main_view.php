<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title><?php if(!empty($title)){echo $title.' | ';} ?>Nextbook</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="<?php echo base_url() ?>assets/css/mat.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!-- Sweet Alert -->
    <script src="<?php echo base_url() ?>assets/vendors/swal/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/swal/sweetalert.css">
</head>

<body>
    <div class="navbar-fixed">
        <?php //$hiji = $this->uri->segment(1);if(!empty($hiji) && $hiji == 'card'){echo $card->color;}else{echo 'grey';}?>
        <nav class="grey darken-1" role="navigation">
            <div class="nav-wrapper" style="padding-left:30px">
                <!-- <img src="<?php //echo base_url() ?>assets/img/nextbook.png" class="brand-logo"> -->
                <a id="logo-container" href="#" class="brand-logo"><i class="material-icons">cloud</i>nextbook</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#"><i class="material-icons">notifications</i></a></li>
                    <li onclick="location.reload()"><a><i class="material-icons">refresh</i></a></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $this->session->userdata('email'); ?><i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <ul id="dropdown1" class="dropdown-content">
                  <li><a>Logged in as <b><?php echo $this->session->userdata('username'); ?></b></a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url() ?>profile"><i class="material-icons">account_box</i> Profile</a></li>
                  <li><a href="#"><i class="material-icons">settings</i> Setting</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url() ?>auth/logout"><i class="material-icons">lock</i> Logout</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><div class="user-view">
                      <div class="background">
                        <img src="https://i.pinimg.com/736x/18/3b/cc/183bcc6e7f413dae1c510cbf322fa52b--office-ideas-office-setup.jpg">
                      </div> 
                      <a href="#!user"><img class="circle" src="<?php echo base_url() ?>assets/img/red.jpg"></a>
                      <a href="#!name"><span class="white-text name"><?php echo $this->session->userdata('username'); ?></span></a>
                      <a href="#!email"><span class="white-text email"><?php echo $this->session->userdata('email');?></span></a>
                    </div></li>
                    <li><a class="waves-effect" href="<?php echo base_url() ?>home"><i class="material-icons">dashboard</i>Home</a></li>
                    <li><a class="waves-effect" href="#!"><i class="material-icons">schedule</i>Schedule</a></li>
                    <li><a class="waves-effect" href="#!"><i class="material-icons">archive</i>Archive</a></li>
                    <li><a class="waves-effect" href="#!"><i class="material-icons">share</i>Share</a></li>
                    <li><a class="waves-effect" href="#!"><i class="material-icons">settings</i>Setting</a></li>
                    <li><div class="divider"></div></li>
                    <!-- <li><a class="subheader">Subheader</a></li> -->
                    <li><a class="waves-effect" href="#!"><i class="material-icons">exit_to_app</i>Logout</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>
    <div class="section  grey lighten-3" id="index-banner">
        <div class="row">
            <div class="col s3 hide-on-med-and-down" style="margin-bottom:69px">
            <!-- SIDEBAR SECTION -->
                <ul class="collapsible" data-collapsible="accordion">
                    <?php if($this->uri->segment(1) != 'profile'): ?>
                    <li>
                        <div class="collapsible-header waves-effect">
                            <img src="<?php echo base_url() ?>assets/img/blue.jpg" style="height:70px;width:70px;border-radius:50px">
                            <p><?php echo $this->session->userdata('dspname'); ?></p><br>
                            <p><?php echo '@'.$this->session->userdata('username'); ?></p>
                        </div>
                    </li>
                    <?php endif; ?>
                    <li>
                        <div onclick="location.href='<?php echo base_url() ?>home';" class="collapsible-header waves-effect"><i class="material-icons">home</i>Home</div>
                    </li>
                    <li>
                        <div onclick="location.href='<?php echo base_url() ?>home';" class="collapsible-header waves-effect"><i class="material-icons">dashboard</i>Card</div>
                    </li>
                    <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">schedule</i>Schedule</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">archive</i>Archive</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">share</i>Share</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div onclick="location.href='<?php echo base_url() ?>profile';" class="collapsible-header waves-effect"><i class="material-icons">person_outline</i>Profile</div>
                    </li>
                    <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">settings</i>Setting</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div onclick="location.href='<?php echo base_url() ?>auth/logout';" class="collapsible-header waves-effect"><i class="material-icons">exit_to_app</i>Logout</div>
                    </li>
                </ul>
            </div>
            <!-- MAIN SECTION -->
            <div class="col s12 m12 l9">
                <?php $this->load->view($primary_view); ?>
            </div>
        </div>
    </div>

    <!-- Modal : Create new card -->
    <div id="modal-add" class="modal">
        <div class="modal-content">
            <h4>Add Card</h4>
            <p style="margin-top:-15px">Create new card</p>
            <div class="row">
                <div class="col m5">
                    <img src="<?php echo base_url() ?>assets/img/astro.png" class="hide-on-small-only" style="height:300px">
                </div>
                <div class="col m7">
                    <form class="col s12" method="post" action="<?php echo base_url() ?>home/createcard">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">color_lens</i>
                                <select class="icons" name="color" required>
                                  <option value="" disabled selected>Choose card color</option>
                                  <option value="green" data-icon="<?php echo base_url() ?>assets/img/green.jpg" class="left circle">Green</option>
                                  <option value="blue" data-icon="<?php echo base_url() ?>assets/img/blue.jpg" class="left circle">Blue</option>
                                  <option value="red" data-icon="<?php echo base_url() ?>assets/img/red.jpg" class="left circle">Red</option>
                                  <option value="blue-grey" data-icon="<?php echo base_url() ?>assets/img/grey.jpg" class="left circle">Grey</option>
                                  <option value="purple" data-icon="<?php echo base_url() ?>assets/img/purple.jpg" class="left circle">Purple</option>
                                </select>
                                <label>Card Color</label>
                            </div>
                        </div>
                        <div class="row"  style="margin-top:-45px">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">folder_open</i>
                                <input type="text" class="validate" name="cardname" required maxlength="17">
                                <label>Card Name</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top:-50px">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">format_align_right</i>
                                <input type="text" name="carddesc" class="validate" required maxlength="31">
                                <label>Description</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top:-45px">
                            <div class="col m7"></div>
                            <div class="col m5">
                              <input type="submit" name="card" class="waves-effect waves-light btn pull-m2" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer style="width:100%;bottom:0;" class="page-footer grey darken-1">
        <div class="footer-copyright">
            <div class="container">
                Made byebye fifer
            </div>
        </div>
    </footer>
    <!--  Scripts-->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>assets/js/materialize.js"></script>
    <script src="<?php echo base_url() ?>assets/js/init.js"></script>
    <script src="<?php echo base_url() ?>assets/js/serialize-0.2.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('select').material_select();
            <?php $announce = $this->session->userdata('announce') ?>
                <?php if(!empty($announce)): echo'Materialize.toast("'.$announce.'", 3500)';?>
            <?php endif; ?>
          });
    </script>
</body>

</html>
