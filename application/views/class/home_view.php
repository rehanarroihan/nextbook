<link rel="stylesheet" href="<?php echo base_url() ?>assets/2.0/js/dropify/css/dropify.min.css">
<div class="card" style="margin-top:-10px;padding:10px;background:#B3E5FC">
    <div class="row" style="margin-bottom:-13px;margin-top:-5px ">
        <div class="col-md-6 text-center">
            <p><b>Lesson Now</b> <br> <?php echo $lesson;?></p>
        </div>
        <div class="col-md-6 text-center">
            <p><b>Next Lesson</b> <br> <?php echo $nextlesson;?> <?php echo $nextlessonTime ?><small class="pull-right"><?php //echo $nextlessonTime ?></small></p>   
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
                            <label>Select Document</label>
                            <input type="file" class="dropify" name="postfile" data-allowed-file-extensions="txt ppt pptx doc docx xlsx xls pdf zip rar"  data-max-file-size="500m"/>
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
                        <span>
                            <b><?php echo $posting->dspname; ?> <i class="fa fa-chevron-circle-right fa-sm"></i></b>
                            <a href="<?php echo base_url();?>aclass/lesson/<?php echo $posting->lessonid;?>/l-<?php echo rand(0,9).".".rand(11,99).".".chr(64+rand(0,26));?>" style="color: black;outline: none">
                                <?php echo $posting->lesson;?>
                            </a>
                        </span>
                    <?php else: ?>
                        <span>
                            <b><?php echo $posting->dspname; ?> <i class="fa fa-chevron-circle-right fa-sm"></i></b>
                            <?php echo 'Other';?>
                        </span>
                <?php endif; ?>
                <?php if($posting->userid == $this->session->userdata('uid')):?>
                    <span class="pull-right" style="padding-top: 0.4%"><a style="cursor: pointer;color: red;outline: none" class="delete" postid="<?php echo $posting->postid ?>"><i class="fa fa-trash"></i></a></span>
                <?php endif;?>
                <span class="pull-right" style="color:#BDBDBD;margin-top:7px;font-size:12px">Dikirim pada <?php echo date('d M Y H:i',strtotime($posting->creat));?></span>
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
                            <?php if ($posting->doc != 'N'): ?>
                                <div class="col-md-6">
                            <?php else:?>
                                <div class="col-md-12">
                            <?php endif;?>
                                    <a style="outline: none" href="<?php echo base_url() ?>assets/2.0/file/img/<?php echo $posting->img;?>" download>
                                        <img src="<?php echo base_url() ?>assets/2.0/file/img/<?php echo $posting->img;?>" style="width: 50%;height: 50%"/>
                                    </a>
                                </div>
                        <?php endif; ?>

                        <?php if ($posting->doc != 'N'): ?>
                            <?php if ($posting->img != 'N'): ?>
                                <div class="col-md-6">
                            <?php else:?>
                                <div class="col-md-12">
                            <?php endif;?>
                                    <a href="<?php echo base_url() ?>assets/2.0/file/doc/<?php echo $posting->doc;?>" download style="color: black;outline: none">
                                        <i class="fa fa-download fa-sm"></i> <?php echo $posting->doc;?>
                                    </a>
                                </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
                $comment = $this->db->where('comment.classid',$classdata->classid)
                                    ->where('postid',$posting->postid)
                                    ->order_by('createds','ASC')
                                    ->join('user','user.uid = comment.uid')
                                    ->get('comment')
                                    ->result();
            ?>
            <a onclick="hideFunction(<?php echo $posting->postid;?>)" style="cursor: pointer;outline: none">
                <div style="background:#E1F5FE;padding:9px;color:#0277BD">
                    <i class="fa fa-comment"></i> <?php echo count($comment);?> Komentar
                </div>
            </a>
            <div style="background:#F5F5F5;padding:9px" id="<?php echo $posting->postid;?>">
                <?php foreach ($comment as $comm): ?>
                    <table width="100%">
                        <tr>
                            <td width="5%">
                                <?php if ($comm->oauth_provider == 'facebook'): ?>
                                    <img src="https://graph.facebook.com/<?php echo $comm->oauth_id;?>/picture" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle">
                                    <?php else: ?>
                                    <?php if($comm->profilepict == ''): ?>
                                        <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                                        <?php else:?>
                                        <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $comm->profilepict;?>" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td width="65%" style="padding-top:4px">
                                <p style="font-size:15px;"><b><?php echo $comm->dspname;?></b> <?php echo $comm->comment;?></p>
                                <p style="margin-top:-11px;font-size:11px;color:#BDBDBD"><?php echo date('d M Y, H:i', strtotime($comm->createds));?></p>
                            </td>
                            <td width="4%">
                            <?php if($comm->uid == $this->session->userdata('uid')): ?>
                                <a commid="<?php echo $comm->commentid;?>" class="commdel" style="cursor: pointer;color: red;outline: none"><i class="fa fa-trash pull-right fa-lg"></i></a>
                            <?php endif;?>
                            </td>
                        </tr>
                    </table>
                <?php endforeach;?>
            </div>   
            <div style="background:#F5F5F5;padding:9px">
                <table width="100%">
                    <form method="post" action="<?php echo base_url();?>aclass/comment">
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
                            <input type="hidden" name="postid" value="<?php echo $posting->postid;?>">
                            <input style="border-top-left-radius:20px;border-bottom-left-radius:20px;border-top-right-radius:20px;border-bottom-right-radius:20px;" type="text" name="gocomment" placeholder="Post comment as <?php echo $this->session->userdata('dspname'); ?>" class="form-control col-md-3" required>
                        </td>
                        <td width="4%" class="text-center">
                            <button type="submit" class="btn btn-primary btn-fill btn-md btn-round"><i class="fa fa-arrow-circle-right"></i></button>
                        </td>
                    </tr>
                    </form>
                </table>
            </div>    
        </div>
        <script type="text/javascript">
            function hideFunction(id) {
                var x = document.getElementById(id);
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
<?php endforeach;endif; ?>
<script src="<?php echo base_url() ?>assets/2.0/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>assets/2.0/js/dropify/js/dropify.min.js"></script>
<script type="text/javascript">
    $('.dropify').dropify();
    $("#show").click(function(){
        $('#aso').css('display','block');
    });

    //Fungsi unenroll
    $(".delete").click(function(){
        var postid = $(this).attr("postid");
        swal({
            title: "Are you sure want to delete your posting ?",
            text: "This action can't be undone",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            closeOnConfirm: false
        },
        function() {
            window.location.href = url + "aclass/deletepost/" + postid;
        });
    });

    $(".commdel").click(function(){
        var commid = $(this).attr("commid");
        swal({
            title: "Are you sure want to delete your Comment ?",
            text: "This action can't be undone",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            closeOnConfirm: false
        },
        function() {
            window.location.href = url + "aclass/deletecomm/" + commid;
        });
    });
</script>