<div style="text-align: center;margin-top:25px;margin-bottom:25px;pointer-events: none;">
    <img src="<?php echo base_url() ?>assets/img/noclass_web.png" class="visible-lg visible-md hidden-sm hidden-xs center-block" style="height:550px;pointer-events: none;">
    <img src="<?php echo base_url() ?>assets/img/noclass_mobile.png" class="hidden-lg hidden-md visible-sm visible-xs center-block" style="height:550px;pointer-events: none;">
</div>

<!-- Floating Action Button like Google Material -->
<button class="btn btn-default btn-fill btn-wd" data-toggle="modal" data-target="#modal-join-class">Join Class</button>
<button class="btn btn-primary btn-fill btn-wd" data-toggle="modal" data-target="#modal-create-class">Create Class</button>

<!-- Modal : Create class -->
<div class="modal fade" id="modal-create-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Class</h5>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-6">
                <img src="<?php echo base_url() ?>assets/img/astro.png" class="hide-on-small-only" style="height:300px">
            </div>
            <div class="col-md-6">
                <form method="post" action="<?php echo base_url() ?>aclass/createclass">
                  <div class="form-group">
                    <label class="form-control-label">Class Name</label>
                    <input type="text" name="name" class="form-control" placeholder="ex: Epic Class" required maxlength="17">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Class Description</label>
                    <textarea rows="5" type="text" name="descript" class="form-control" placeholder="ex: XII RPL 4 SMK Telkom Malang 2017/2018" required></textarea>
                  </div>
                  <input type="submit" name="class" class="btn btn-fill btn-success pull-right" value="Create Class">
                </form>
            </div>
            </div>
          </div>
          <div class="modal-footer">
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