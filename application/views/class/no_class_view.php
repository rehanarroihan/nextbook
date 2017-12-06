<div style="text-align: center;margin-top:25px;margin-bottom:25px;pointer-events: none;">
	<img src="<?php echo base_url() ?>assets/img/noclass_web.png" class="hide-on-small-and-down" style="height:550px;pointer-events: none;">
	<img src="<?php echo base_url() ?>assets/img/noclass_mobile.png" class="hide-on-med-and-up show-on-medium-and-down" style="height:550px;pointer-events: none;">
</div>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
 		<i class="large material-icons">add</i>
    </a>
    <ul>
        <li><a class="btn-floating green darken-1 modal-trigger tooltipped" data-target="modal-join-class" id="join" data-position="left" data-delay="50" data-tooltip="Join Class"><i class="material-icons">swap_horiz</i></a></li>
        <li><a class="btn-floating blue tooltipped modal-trigger" data-target="modal-create-class" data-position="left" data-delay="50" data-tooltip="Create Class"><i class="material-icons">create_new_folder</i></a></li>
    </ul>
</div>

<!-- Modal : Create class -->
  <div id="modal-create-class" class="modal">
        <div class="modal-content">
            <h4>Create Class</h4>
            <p style="margin-top:-15px">Create new class</p>
            <div class="row">
                <div class="col m5">
                    <img src="<?php echo base_url() ?>assets/img/astro.png" class="hide-on-small-only" style="height:300px">
                </div>
                <div class="col m7">
                    <form class="col s12" method="post" action="<?php echo base_url() ?>aclass/createclass" style="margin-top:60px">
                        <div class="row"  style="margin-top:-45px">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">folder_open</i>
                                <input placeholder="ex: Epic Class" type="text" class="validate" name="name" required maxlength="17">
                                <label>Class Name</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top:-50px">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">format_align_right</i>
                                <textarea placeholder="ex: XII RPL 4 SMK Telkom Malang 2017/2018" id="descript" name="descript" class="materialize-textarea"></textarea>
                                <label>Description</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top:-45px">
                            <div class="col m7"></div>
                            <div class="col m5">
                              <input type="submit" name="class" class="waves-effect waves-light btn pull-m2" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal : Join class -->
  <div id="modal-join-class" class="modal">
      <div class="modal-content" class="col l3 m6 s12">
          <h4>Join Class</h4>
          <p style="margin-top:-15px">Enter class code</p><br><br>
          <div class="row" style="margin-top:-50px;margin-bottom:38px">
            <div class="alert alert-info" id="alerts">Enter 7-digit class code to join</div>
          </div>
          <!-- <div class="row" style="margin-top:-50px;margin-bottom:38px">
            <div class="alert alert-info">
                <p id="cname">Class Name</p>
                <p id="cdesc">Class Descript</p>
                <p id="cmemb">34 Member</p>
            </div>
          </div> -->
          <div class="row">
              <form method="post" action="#" id="formjoin">                <!-- FORM E RUET -->
                  <div class="row" style="margin-top:-45px">
                      <div class="input-field col s12">
                          <i class="material-icons prefix">code</i>
                          <input type="text" class="validate" name="code" required maxlength="7">
                          <label>Class Code</label>
                      </div>
                  </div>
                  <input value="Join" style="margin-top:-20px" class="btn waves-effect waves-light right blue darken-1 col s12 m4 l4" type="submit" name="join">
              </form>
          </div>
      </div>
  </div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/init.js"></script>
<script type="text/javascript">
$("#formjoin").submit(function(event) {
    $("#alerts").html("Checking code ..");
    $('#alerts').removeClass("alert-danger");
    $('#alerts').removeClass("alert-info");
    $('#alerts').addClass("alert-success");
    var params = $('#formjoin').serialize();
    $.ajax({
        url: '<?php echo base_url() ?>aclass/checkcode',
        data: params,
        method: 'post',
        success: function(html) {
            if (html == '2') {
                $("#alerts").html("Invalid code");
                $('#alerts').removeClass("alert-success");
                $('#alerts').removeClass("alert-info");
                $('#alerts').addClass("alert-danger");
            } else if (html == '1') {
                $("#alerts").html("Joining class ...");
                $('#alerts').removeClass("alert-success");
                $('#alerts').removeClass("alert-info");
                $('#alerts').addClass("alert-success");
                location.reload()
            }
        },
        error: function(argument) {
            $("#alerts").html("Something went wrong");
            $('#alerts').removeClass("alert-success");
            $('#alerts').removeClass("alert-info");
            $('#alerts').addClass("alert-danger");
        }
    });
    event.preventDefault();
});
</script>