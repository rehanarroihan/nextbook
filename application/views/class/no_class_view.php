<div style="text-align: center;margin-top:25px;margin-bottom:25px;pointer-events: none;">
	<img src="<?php echo base_url() ?>assets/img/noclass_web.png" class="hide-on-small-and-down" style="height:550px;pointer-events: none;">
	<img src="<?php echo base_url() ?>assets/img/noclass_mobile.png" class="hide-on-med-and-up show-on-medium-and-down" style="height:550px;pointer-events: none;">
</div>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
 		<i class="large material-icons">add</i>
    </a>
    <ul>
        <li><a class="btn-floating green darken-1 tooltipped modal-trigger" data-target="modal-add-link" data-position="left" data-delay="50" data-tooltip="Join Class"><i class="material-icons">swap_horiz</i></a></li>
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

<script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>