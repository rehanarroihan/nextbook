<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Nextbook</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="<?php echo base_url() ?>assets/css/mat.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <nav class="grey darken-1" role="navigation">
        <div class="nav-wrapper" style="padding-left:10px">
            <a id="logo-container" href="#" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="sass.html"><i class="material-icons">search</i></a></li>
                <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
                <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $this->session->userdata('email'); ?><i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
            <ul id="dropdown1" class="dropdown-content">
              <li><a>Logged in as <b><?php echo $this->session->userdata('username'); ?></b></a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url() ?>auth/logout"><i class="material-icons">account_box</i> Profile</a></li>
              <li><a href="<?php echo base_url() ?>auth/logout"><i class="material-icons">settings</i> Setting</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url() ?>auth/logout"><i class="material-icons">lock</i> Logout</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div class="section  grey lighten-3" id="index-banner">
        <div class="row">
            <div class="col s3" style="margin:-11px;margin-top:-23px">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Home</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">delete</i>Trash</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">share</i>Share</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                </ul>
            </div>
            <div class="col s9">
                <div class="col s6 m4">
                    <div class="card">
                        <div class="card-image">
                          <img src="http://www.cianellistudios.com/images/abstract-art/abstract-art-mother-earth.jpg">
                          <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                          <p>I am a very simple card. I am good at containing small bits of information.
                          I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                      </div>
                </div>
                <div class="col s6 m4">
                    <div class="card">
                        <div class="card-image">
                          <img src="https://images.icanvas.com/list-hero/abstract.jpg">
                          <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                          <p>I am a very simple card. I am good at containing small bits of information.
                          I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                      </div>
                </div>
                <div class="col s6 m4">
                    <div class="card">
                        <div class="card-image">
                          <img src="https://www.w3schools.com/css/img_forest.jpg">
                          <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                          <p>I am a very simple card. I am good at containing small bits of information.
                          I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                      </div>
                </div>
                <div class="col s6 m4">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4">
                    <div class="card">
                        <div class="card-content grey-text text-darken-4">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4">
                    <div class="card">
                        <div class="card-content grey-text text-darken-4">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red modal-trigger" data-target="modal1">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </div>

    <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Add Folder</h4>
      <p>Create new folder</p>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>

          <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
        </div>
      </div>
      <div class="row">
        
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
    </form>
  </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>

    <footer class="page-footer grey darken-">
        <div class="footer-copyright">
            <div class="container">
                Made by Arek Bonek
            </div>
        </div>
    </footer>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/materialize.js"></script>
    <script src="<?php echo base_url() ?>assets/js/init.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
          });
    </script>
</body>

</html>