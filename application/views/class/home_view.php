<link rel="stylesheet" href="<?php echo base_url() ?>assets/2.0/js/dropify/css/dropify.min.css">
<div class="card" style="margin-top:-10px;padding:10px;background:#B3E5FC">
    <div class="row" style="margin-bottom:-13px;margin-top:-5px ">
        <div class="col-md-6 text-center">
            <p>Lesson Now <br> <?php echo $lesson;?></p>
        </div>
        <div class="col-md-6 text-center">
            <p>Next Lesson <br> <?php echo $nextlesson;?> <?php echo $nextlessonTime ?><small class="pull-right"><?php //echo $nextlessonTime ?></small></p>   
        </div> 
    </div>
</div>

<div class="card" style="margin-top:-10px">
    <div class="content" id="page">
        <div style="">
            <?php if ($this->session->userdata('oauth_provider') == 'facebook'): ?>
                <img src="https://graph.facebook.com/<?php echo $this->session->userdata('oauth_id');?>/picture" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle">
                <?php else: ?>
                <?php if($detail->profilepict == ''): ?>
                    <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                    <?php else:?>
                    <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $detail->profilepict;?>" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                <?php endif; ?>
            <?php endif; ?>
                <span><b><?php echo $this->session->userdata('dspname'); ?></b></span>
            <form style="margin: 1.5%" method="post" id="post" action="<?php echo base_url();?>aclass/saveposting" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea class="form-control" rows="4" name="content" style="border: none" placeholder="Write a post..."></textarea>
                </div>
                <div class="row" id="aso" style="display: none">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Foto</label>
                            <input type="file" class="dropify" name="postpict" data-allowed-file-extensions="png jpg gif jpeg"  data-max-file-size="200K" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select File</label>
                            <input type="file" class="dropify" name="postfile" data-allowed-file-extensions="png jpg gif jpeg"  data-max-file-size="200K"/>
                        </div>
                    </div>
                </div><hr>
                <div class="form-group" style="margin-bottom:-15px;margin-top: -15px">
                    <div class="btn btn-success btn-fill btn-sm" id="show"><i class="fa fa-plus"></i> Add Photo/File</div>
                    <input type="submit" value="Post" name="posting" class="btn btn-primary btn-fill pull-right btn-sm">
                </div>
            </form>
        </div>
    </div>
</div>
<?php if(isset($upost)): foreach ($upost as $posting): ?>
    <div class="card" style="margin-top:-10px">
        <div style="margin: 2%;padding-top: 2%;padding-bottom: 2%">
            <?php if ($posting->oauth_provider == 'facebook'): ?>
                <img src="https://graph.facebook.com/<?php echo $posting->oauth_id;?>/picture" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle">
                <?php else: ?>
                    <?php if ($posting->profilepict == ''): ?>
                        <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                        <?php else: ?>
                        <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $posting->profilepict;?>" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                    <?php endif; ?>
            <?php endif; ?>

            <?php if (isset($posting->lesson)): ?>
                    <span><b><?php echo $posting->dspname; ?> <i class="fa fa-chevron-circle-right fa-sm"></i></b> <?php echo $posting->lesson;?></span>
                <?php else: ?>
                    <span><b><?php echo $posting->dspname; ?> <i class="fa fa-chevron-circle-right fa-sm"></i></b> <?php echo 'Other';?></span>
            <?php endif; ?>
            <span class="pull-right" style="color:#BDBDBD;margin-top:7px;font-size:12px">Dikirim pada 7 Dec 2017, 17.00</span>
            <hr style="margin-top:10px" width="100%">
            <div style="margin-left: 3%;min-height:1px;">
                <div class="row">
                    <?php if ($posting->content != ''): ?>
                        <div class="col-md-12" style="margin-bottom: 8%">
                            <?php echo $posting->content; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <?php if ($posting->img != 'N'): 
                        if ($posting->content != ''): ?>
                        <hr>
                        <?php endif; ?>
                        <div class="col-md-6">
                            <img src="<?php echo base_url() ?>assets/2.0/file/img/<?php echo $posting->img;?>" style="width: 50%;height: 50%"/>
                        </div>
                    <?php endif; ?>

                    <?php if ($posting->doc != 'N'): ?>
                        <div class="col-md-6">
                            <a href="blank"><i class="fa fa-download fa-sm"></i> <?php echo $posting->doc;?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div style="background:#E1F5FE;padding:9px;color:#0277BD">
            <i class="fa fa-comment"></i> 7 Komentar
        </div>
        <div style="background:#F5F5F5;padding:9px">
            <table width="100%">
                <tr>
                    <td width="5%">
                        <?php if ($this->session->userdata('oauth_provider') == 'facebook'): ?>
                            <img src="https://graph.facebook.com/<?php echo $this->session->userdata('oauth_id');?>/picture" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle">
                            <?php else: ?>
                            <?php if($detail->profilepict == ''): ?>
                                <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                                <?php else:?>
                                <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $detail->profilepict;?>" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td width="65%" style="padding-top:4px">
                        <p style="font-size:15px;"><b>Rehan Arroihan</b> iki komenku lur</p>
                        <p style="margin-top:-11px;font-size:11px;color:#BDBDBD">17 Mei 2017, 14.30</p>
                    </td>
                </tr>
            </table>
        </div>   
        <div style="background:#F5F5F5;padding:9px">
            <table width="100%">
                <tr>
                    <td width="5%">
                        <?php if ($this->session->userdata('oauth_provider') == 'facebook'): ?>
                            <img src="https://graph.facebook.com/<?php echo $this->session->userdata('oauth_id');?>/picture" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle">
                            <?php else: ?>
                            <?php if($detail->profilepict == ''): ?>
                                <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                                <?php else:?>
                                <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $detail->profilepict;?>" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td width="60%">
                        <input style="border-top-left-radius:20px;border-bottom-left-radius:20px;border-top-right-radius:20px;border-bottom-right-radius:20px;" type="text" name="gocomment" placeholder="Post comment as <?php echo $this->session->userdata('dspname'); ?>" class="form-control col-md-3">
                    </td>
                    <td width="4%" class="text-center">
                        <a href="" class="btn btn-primary btn-fill btn-md btn-round"><i class="fa fa-arrow-circle-right"></i></a>
                    </td>
                </tr>
            </table>
        </div>    
    </div>
    <?php endforeach;endif; ?>
<script src="<?php echo base_url() ?>assets/2.0/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>assets/2.0/js/dropify/js/dropify.min.js"></script>
<script type="text/javascript">
    $('.dropify').dropify();
    $("#show").click(function(){
        $('#aso').css('display','block');
    });
</script>