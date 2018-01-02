<div class="alert alert-info col-lg-12 col-md-12">
    <p style="font-size: 15pt">Lesson Now : <?php echo $lesson;?></p>
    <p>Next Lesson : <?php echo $nextlesson;?><small class="pull-right"><?php //echo $nextlessonTime ?></small></p>
    <?php
        // $now = date("H:i");
        // $min = (strtotime($nextlessonTime)-strtotime($now)) / 60;
        // echo $min;
    ?>
</div>
<div class="card" style="margin-top:-10px">
    <div class="header">
        <span id="title">New Post</span>
    </div>
    <div class="content" id="page">
        <div style="border-style: solid;border-color: #BDBDBD;background-color: #E0E0E0">
            <div style="margin: 1.5%">
                <?php
                    if ($this->session->userdata('oauth_provider') == 'facebook') {
                        ?>
                        <img src="https://graph.facebook.com/<?php echo $this->session->userdata('oauth_id');?>/picture" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle">
                        <?php
                    }else{
                        if ($detail->profilepict == '') {
                            ?>
                            <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                            <?php
                        }else{
                        ?>
                            <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $detail->profilepict;?>" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                        <?php
                        }
                    }
                ?>
                <span><b><?php echo $this->session->userdata('dspname'); ?></b></span><hr>
            </div>
            <form style="margin: 1.5%" method="post" id="post" action="<?php echo base_url();?>aclass/saveposting" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea class="form-control" rows="5" name="content"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Foto</label>
                            <input type="file" id="file" name="postpict"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select File</label>
                            <input type="file" id="file" name="postfile"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="posting">
                </div>
            </form>
        </div>
    </div>
</div>

