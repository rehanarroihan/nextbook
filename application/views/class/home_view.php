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
<?php
    if (isset($upost)) {
        foreach ($upost as $posting) {
        ?>
    <div class="card" style="margin-top:-10px">
        <div style="margin: 2%;padding-top: 2%;padding-bottom: 2%">
            <?php
                if ($posting->oauth_provider == 'facebook') {
                    ?>
                    <img src="https://graph.facebook.com/<?php echo $posting->oauth_id;?>/picture" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle">
                    <?php
                }else{
                    if ($posting->profilepict == '') {
                        ?>
                        <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                        <?php
                    }else{
                    ?>
                        <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $posting->profilepict;?>" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                    <?php
                    }
                }

                if (isset($posting->lesson)) {
                ?>
                    <span><b><?php echo $posting->dspname; ?> <i class="fa fa-hand-o-right fa-sm"></i></b> <?php echo $posting->lesson;?></span>
                <?php
                }else{
                ?>
                    <span><b><?php echo $posting->dspname; ?> <i class="fa fa-hand-o-right fa-sm"></i></b> <?php echo 'Other';?></span>
                <?php
                }
            ?>
            <hr>
            <div style="margin-left: 3%">
                <div class="row">
                    <?php
                    if ($posting->content != '') {
                        ?>
                        <div class="col-md-12" style="margin-bottom: 8%">
                            <?php echo $posting->content; ?>
                        </div>
                    <?php
                        }
                        ?>
                </div>
                <div class="row">
                    <?php
                    if ($posting->img != 'N') {
                        
                        if ($posting->content != '') {
                        ?>
                            <hr>
                        <?php
                        }
                        ?>
                        <div class="col-md-6">
                            <img src="<?php echo base_url() ?>assets/2.0/file/img/<?php echo $posting->img;?>" style="width: 50%;height: 50%"/>
                        </div>
                        <?php
                    }

                    if ($posting->doc != 'N') {
                    ?>
                        <div class="col-md-6">
                            <a href="blank"><i class="fa fa-download fa-sm"></i> <?php echo $posting->doc;?></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
        <?php
        }
    }
?>