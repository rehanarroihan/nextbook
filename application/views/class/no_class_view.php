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
        <li><a class="btn-floating blue tooltipped modal-trigger" data-target="modal-add-file" data-position="left" data-delay="50" data-tooltip="Create Class"><i class="material-icons">create_new_folder</i></a></li>
    </ul>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>