<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Profile</h4>
            </div>
            <div class="content">
                <form >
                    <div class="col-md-4">
                        <img url="<?php echo $detail->picture_url;?>">
                        <input type="file" name="">
                    </div>
                    <div class="col-md-8">
                        <label>Name</label>
                        <input type="text" name="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery-ui.js"></script>
<script type="text/javascript">
    $(".unrl").click(function(){
        var classid = $(this).attr("id");
        swal({
            title: "Are you sure want to unenroll this class ?",
            text: "This action can't be undone",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Unenroll",
            closeOnConfirm: false
        },
        function() {
            window.location.href = "<?php echo base_url() ?>aclass/unenroll";
        });
    });
</script>