 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<?php  echo $this->db->where('classid', $classdata->classid)->count_all_results('user'); ?> Member(s)
    </div>
    <div class="content" id="page">
        <div class="list-group">
            <?php foreach($memberlist as $member): ?>
            <a class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $member->dspname ?>
                        <?php if($member->uid == $this->session->userdata('uid')): ?>
                            <small class="btn btn-success btn-xs">Anda</small>
                        <?php endif; ?>
                    </h5>
                    <?php if($classdata->created_by == $member->uid): ?>
                        <small class="text-muted pull-right" style="color:green">Class Admin</small>
                    <?php else: ?>
                        <?php if($classdata->created_by == $this->session->userdata('uid')): ?>
                        <div class="btn-group pull-right">
                          <button type="button" dsp="<?php echo $member->dspname ?>" userid="<?php echo $member->uid ?>" class="btn btn-danger btn-fill btn-xs kckm">Kick</button>
                          <button type="button" dsp="<?php echo $member->dspname ?>" userid="<?php echo $member->uid ?>" class="btn btn-success btn-fill btn-xs mkadmin">Make Admin</button>
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <small class="text-muted" style="margin-top:-10px"><?php echo $member->email ?></small>
            </a>
            <?php endforeach; ?>
        </div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/2.0/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(".kckm").click(function(){
        var dspname = $(this).attr("dsp");
        var uid = $(this).attr("userid");
        swal({
            title: "Keluarkan " + dspname + " dari kelas ini ?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Keluarkan",
            closeOnConfirm: false
        },
        function() {
            window.location.href = "<?php echo base_url() ?>aclass/kickmember?uid=" + uid;
        });
    });

    $(".mkadmin").click(function(){
        var dspname = $(this).attr("dsp");
        var uid = $(this).attr("userid");
        swal({
            title: "Jadikan " + dspname + " admin kelas ?",
            text: "Jabatan admin anda akan di gantikan",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, saya ikhlas",
            closeOnConfirm: false
        },
        function() {
            window.location.href = "<?php echo base_url() ?>aclass/makeadmin?uid=" + uid + "&classid=<?php echo $classdata->classid ?>";
        });
    });
</script>
