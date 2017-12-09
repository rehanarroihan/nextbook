<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h3 class="title">Setting Interface<hr></h3>
            </div>
            <div class="content">
                <form method="post" id="edit_profile" action="<?php echo base_url();?>Profile/executeedit" enctype='multipart/form-data'>
                    <div class="input-group col-lg-12 col-md-12">
                        <div class="col-md-4">
                            <img style="margin-bottom: 3%;margin-left: 10%"
                            <?php
                                if ($this->session->userdata('oauth_provider') == "facebook") {
                                ?>
                                     src="https://graph.facebook.com/<?php echo $this->session->userdata('oauth_id');?>/picture?type=large"
                                    <?php
                                }else{
                                    if ($detail->profilepict == NULL) {
                                    ?>
                                        src="<?php echo base_url();?>assets/2.0/img/user/user.png" width="200px" height="200px"
                                    <?php
                                    }else{
                                    ?>
                                        src="<?php echo base_url();?>assets/2.0/img/user/<?php echo $detail->profilepict;?>" width="200px" height="200px"
                                <?php
                                        
                                    }
                                }
                            ?>
                            >
                            <?php
                            if ($this->session->userdata('oauth_provider') != "facebook") {
                                ?>
                                    <input type="file" name="profilepict" style="margin-left: 10%">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group" style="margin-bottom: 5%">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $detail->email;?>" <?php if($this->session->userdata('oauth_provider') == "facebook"){echo 'disabled';}?>>
                            </div>
                            <div class="input-group" style="margin-bottom: 5%">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="uname" type="text" class="form-control" name="uname" placeholder="Username" value="<?php if($detail->username == ''){ echo 'N/A';}else{ echo $detail->username;}?>" <?php if($this->session->userdata('oauth_provider') == "facebook"){echo 'disabled';}?>>
                            </div>
                            <div class="input-group" style="margin-bottom: 5%">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="pass" type="text" class="form-control" name="pass" placeholder="Password" value="<?php if($detail->password == ''){ echo 'N/A';}else{ echo $detail->password;}?>" <?php if($this->session->userdata('oauth_provider') == "facebook"){echo 'disabled';}?>>
                            </div>
                            <div class="input-group" style="margin-bottom: 5%">
                                <span class="input-group-addon"><i class="fa fa-header"></i></span>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" value="<?php echo $detail->dspname;?>">
                            </div>
                            <div class="input-group" style="margin-bottom: 5%">
                                <span class="input-group-addon"><i class="fa <?php if($detail->gender == 'male'){echo 'fa-male';}else{ echo 'fa-female';}?>"></i></span>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="male" <?php if($detail->gender == 'male'){ echo 'selected';}?>>Male</option>
                                    <option value="female" <?php if($detail->gender == 'female'){ echo 'selected';}?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd pull-right" value="Save Change">
                        </div>
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