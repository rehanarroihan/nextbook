
<div style="text-align: center;margin-top:25px;margin-bottom:25px;pointer-events: none;">
	<img src="<?php echo base_url() ?>assets/img/noclass_web.png" class="visible-lg visible-md hidden-sm hidden-xs center-block" style="height:550px;pointer-events: none;">
	<img src="<?php echo base_url() ?>assets/img/noclass_mobile.png" class="hidden-lg hidden-md visible-sm visible-xs center-block" style="height:550px;pointer-events: none;">
</div>

<!-- Floating Action Button like Google Material -->
<button class="btn btn-default btn-fill btn-wd" data-toggle="modal" data-target="#modal-join-class">Join Class</button>
<button class="btn btn-primary btn-fill btn-wd">Primary</button>

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
    <div class="modal fade" id="modal-join-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Join Class</h5>
          </div>
          <div class="modal-body">
            <div class="alert alert-info" id="al">
              <span data-notify="message" id="alerts">Enter 7 digit class code to join</span>
            </div>
            <form method="post" action="#" id="formjoin">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Class Code</label>
                <input type="text" name="code" class="form-control" placeholder="Class code" required maxlength="7">
              </div>
              <input type="submit" class="btn btn-fill btn-success pull-right" value="Join" name="join">
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/init.js"></script>
<script type="text/javascript">
$("#formjoin").submit(function(event) {
    $("#alerts").html("Checking code ..");
    $('#al').removeClass("alert-danger");
    $('#al').removeClass("alert-info");
    $('#al').addClass("alert-success");
    var params = $('#formjoin').serialize();
    $.ajax({
        url: '<?php echo base_url() ?>aclass/checkcode',
        data: params,
        method: 'post',
        success: function(html) {
            if (html == '2') {
                $("#alerts").html("Invalid code");
                $('#al').removeClass("alert-success");
                $('#al').removeClass("alert-info");
                $('#al').addClass("alert-danger");
            } else if (html == '1') {
                $("#alerts").html("Joining class ...");
                $('#al').removeClass("alert-success");
                $('#al').removeClass("alert-info");
                $('#al').addClass("alert-success");
                location.reload()
            }
        },
        error: function(argument) {
            $("#alerts").html("Something went wrong");
            $('#al').removeClass("alert-success");
            $('#al').removeClass("alert-info");
            $('#al').addClass("alert-danger");
        }
    });
    event.preventDefault();
});
</script>