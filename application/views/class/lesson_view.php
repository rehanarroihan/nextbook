<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div style="padding: 0.1%" class="pull-right">
				<button type="button" class="btn-danger btn-xs btn-fill"><i class="fa fa-trash fa-lg"></i></button>
			</div>
			<div style="padding: 0.1%">
				<h2 style=""><b><?php echo $less->lesson;?></b></h2>
			</div>
		</div>
	</div>
	<?php if(count($postlesson) > 0):?>
	    <div class="col-md-8">
	        <div class="card">
	        	<div class="row" style="padding: 1%">
	        	<?php $array = array('#ef5350', '#EC407A', '#AB47BC', '#7E57C2', '#5C6BC0', '#42A5F5', '#29B6F6', '#26C6DA', '#26A69A', '#66BB6A', '#9CCC65','#D4E157','#FFEE58','#FFCA28','#FFCA28','#FFA726','#FF7043','#8D6E63','#BDBDBD','#78909C');?>
		        	<?php foreach ($postlesson as $post): ?>
		        		<a href="#" data-toggle="modal" data-target="#<?php echo $post->postid;?>" style="color: black">
				        	<div class="col-md-4">
					        	<div class="card" style="background-color: <?php echo $array[rand(0, count($array) - 1)];?>;height: 175px">
					        		<div class="row">
					        			<?php if ($post->content != ''): ?>
						        			<div class="col-md-12" style="text-align: center">
						        				<?php echo substr($post->content, 0, 20)." .....";?>
						        			</div>
						        		<?php endif;?>
					        		</div>
	                    				<?php if ($post->content != ''): ?>
	                    					<hr>
	                    				<?php endif;?>
					        		<div class="row" style="margin: 2%">
					        			<?php if ($post->img != 'N'): ?>
						        			<div class="col-md-6">
						        				<img src="<?php echo base_url() ?>assets/2.0/file/img/<?php echo $post->img;?>" style="width: 100%;height: 100%"/>
						        			</div>
						        		<?php else:?>
						        			<div class="col-md-6" style="margin-top: 10%">
						        				<center><i class="fa fa-file-image-o fa-sm"></i> No Image</center>
						        			</div>
						        		<?php endif;?>
						        		<?php if ($post->doc != 'N'): ?>
						        			<div class="col-md-6" style="margin-top: 7%">
						        				<center><i class="fa fa-file fa-sm"></i> <?php echo substr($post->doc,0,10);?></center>
						        			</div>
						        		<?php else:?>
						        			<div class="col-md-6" style="margin-top: 10%">
						        				<center><i class="fa fa-file-o fa-sm"></i> No File</center>
						        			</div>
					        			<?php endif;?>
					        		</div>
					        	</div>
					        </div>
					    </a>

					    <div class="modal fade" id="<?php echo $post->postid;?>" role="dialog">
					    	<div class="modal-dialog modal-lg">
					    		<div class="modal-content">
					    			<div class="modal-header">
					    				<button type="button" class="close" data-dismiss="modal">&times;</button>
					    				<h4 class="modal-title">
					    					<?php if ($post->oauth_provider == 'facebook'): ?>
								                <img src="https://graph.facebook.com/<?php echo $post->oauth_id;?>/picture" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle">
								                <?php else: ?>
								                <?php if($post->profilepict == ''): ?>
								                    <img src="<?php echo base_url() ?>assets/2.0/img/user/user.png" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
								                    <?php else:?>
								                    <img src="<?php echo base_url() ?>assets/2.0/img/user/<?php echo $post->profilepict;?>" style="width: 35px;height: 35px;margin-right: 2%" class="img-circle"/>
								                <?php endif; ?>
								            <?php endif; ?>
								            <?php echo $post->dspname;?>
					    				</h4>
					    			</div>
					    			<div class="modal-body">
					    				<div class="row">
					    					<div class="col-md-7">
					    						<?php if ($post->content != ''): ?>
								        			<div class="col-md-12" style="text-align: center;font-size: 15pt;margin-bottom: 5%">
								        				<?php echo $post->content;?>
								        			</div>
								        		<?php endif;?>
					    						<?php if ($post->img != 'N'): ?>
					    							<hr>
								        			<div class="col-md-12">
								        				<center>
								        					<a href="<?php echo base_url() ?>assets/2.0/file/img/<?php echo $post->img;?>" download>
								        						<img src="<?php echo base_url() ?>assets/2.0/file/img/<?php echo $post->img;?>" style="width: 70%;height: 70%"/>
								        					</a>
								        				</center>
								        			</div>
								        		<?php endif;?>
								        		<?php if ($post->doc != 'N'): ?>
								        			<hr>
								        			<div class="col-md-12" style="margin-top: 7%;font-size: 15pt">
								        				<center>
								        					<a href="<?php echo base_url() ?>assets/2.0/file/doc/<?php echo $post->doc;?>" download style="color: black">
								        						<i class="fa fa-download fa-md"></i> <?php echo $post->doc;?>
								        					</a>
								        				</center>
								        			</div>
								        		<?php endif;?>
					    					</div>
					    					<div class="col-md-5">
					    						<?php $comment = $this->db->where('comment.classid',$post->classid)
										                                ->where('postid',$post->postid)
										                                ->order_by('createds','ASC')
										                                ->join('user','user.uid = comment.uid')
										                                ->get('comment')
										                                ->result();
										        if (count($comment) > 0):?>
										        	<div style="background:#E1F5FE;padding:9px;color:#0277BD">
											            <i class="fa fa-comment"></i> <?php echo count($comment);?> Komentar
											        </div>
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
										                    </tr>
										                </table>
										            <?php endforeach;
										        else:?>
										        	<center><p style="font-size: 17pt"><i class="fa fa-comment"></i> No Comment</p></center>
										        <?php endif;?>
					    					</div>
					    				</div>
					    			</div>
					    		</div>
					    	</div>
					    </div>
			    	<?php endforeach;?>
		    	</div>
	        </div>
	    </div>
	<?php else:?>
		<div class="col-md-8">
			<div class="alert alert-danger">Tidak Ada Posting Untuk Pelajaran Ini</div>
		</div>
	<?php endif;?>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img class="img-overlay" style="object-fit:cover;" src="<?php echo base_url() ?>assets/2.0/img/group/<?php echo $classdata->photo ?>"/>
            </div>
            <div class="content" style="margin-top:70px">
                <div class="author">
                    <h4 class="title"><?php echo $classdata->name ?><br />
                        <small><?php echo $classdata->descript ?></small>
                    </h4>
                </div>
                <p class="text-center" style="margin-bottom:18px"><?php echo $this->db->where('classid', $classdata->classid)->count_all_results('user'); ?> Member</p>
                <hr>
                <div class="text-center">
                    <?php $date = date_create($classdata->dt_created);$dte = date_format($date, 'd M Y'); ?>
                    <p style="font-size:12px;color:#CFD8DC;margin-bottom:-5px"><i>Created at <?php date_create($classdata->dt_created);echo $dte ?> by <?php echo $classdata->dspname ?></i></p>
                </div>
            </div>
        </div>

        <div class="card card-user" style="margin-top:-10px">
            <div class="text-center">
                <p style="font-size:12px;color:grey;padding-top:10px"><i>Scan qr code / copy class code to join</i></p>
            </div>
            <hr>
            <div class="content">
                <table style="border-collapse: collapse;border:none;">
                    <tr>
                        <td rowspan="2">
                            <img src="<?php echo base_url() ?>aclass/genqr/<?php echo $classdata->classid ?>/75">
                        </td>
                        <td style="padding-top:10px">Class Code :</td>
                    </tr>
                    <tr>
                        <td><p style="font-size:50px;margin-top:-10px"><?php echo $classdata->classid ?></p></td>
                    </tr>
                </table>
            </div>
            <div class="text-center">
                <button class="btn btn-danger btn-fill form-control btn-wd unrl"">Unenroll Class</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery-ui.js"></script>
<script type="text/javascript">
        //Class view main

    //dfinisi url
    var url = "<?php echo base_url() ?>";

    //Fungsi unenroll
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
            window.location.href = url + "aclass/unenroll";
        });
    });

    //onClickListener navigasi kelas
    $(".classnav").click(function(){
        <?php if($this->session->userdata('auth') == true): ?>
        var now = $(this).attr("id");
        noblu();
        $("#masok").empty();
        $("#load").css('display','block');
        if(now == 'navhome'){
            $('#' + now).addClass("btn-fill");
            window.history.pushState("", "", "<?php echo base_url(); ?>aclass/home");
            $.ajax({
                url: url + "aclass/home",
                type: "POST",
                cache: false,
                data: "fckisrael="+"truuu",
                timeout: 9000,
                error: function(jqXHR, textStatus, errorThrown){
                    // if(textStatus==="timeout") {  
                    //     alert("Call has timed out"); 
                    // } else {
                    //     alert("Another error was returned");
                    // }
                    $("#load").css('display','none');
                    $('#masok').html(textStatus);
                },
                success: function(data){
                    $("#load").css('display','none');
                    $('#masok').html(data);
                }                
            })
        }else if(now == 'navsche'){
            $('#' + now).addClass("btn-fill");
            window.history.pushState("", "", "<?php echo base_url(); ?>aclass/schedule");
            $.ajax({
                url: url + "aclass/schedule",
                type: "POST",
                cache: false,
                data: "sempolcrispy="+"truuu",
                timeout: 9000,
                error: function(jqXHR, textStatus, errorThrown){
                    // if(textStatus==="timeout") {  
                    //     alert("Call has timed out"); 
                    // } else {
                    //     alert("Another error was returned");
                    // }
                    $("#load").css('display','none');
                    $('#masok').html(textStatus);
                },
                success: function(data){
                    $("#load").css('display','none');
                    $('#masok').html(data);
                }                
            })
        }else if(now == 'navmember'){
            $('#' + now).addClass("btn-fill");
            window.history.pushState("", "", "<?php echo base_url(); ?>aclass/member");
            $.ajax({
                url: url + "aclass/member",
                type: "POST",
                cache: false,
                data: "estehplastikan="+"truuu",
                timeout: 9000,
                error: function(jqXHR, textStatus, errorThrown){
                    $("#load").css('display','none');
                    $('#masok').html("An error occured, try again later");
                },
                success: function(data){
                    $("#load").css('display','none');
                    $('#masok').html(data);
                }   
            })
        }else if(now == 'navadmin'){
            $('#' + now).addClass("btn-fill");
            window.history.pushState("", "", "<?php echo base_url(); ?>aclass/setting");
            $.ajax({
                url: url + "aclass/setting",
                type: "POST",
                cache: false,
                data: "sempolcrispy="+"truuu",
                timeout: 9000,
                error: function(jqXHR, textStatus, errorThrown){
                    // if(textStatus==="timeout") {  
                    //     alert("Call has timed out"); 
                    // } else {
                    //     alert("Another error was returned");
                    // }
                    $("#load").css('display','none');
                    $('#masok').html("An error occured, try again later");
                },
                success: function(data){
                    $("#load").css('display','none');
                    $('#masok').html(data);
                }                
            })
        }
        <?php else: ?>
        window.location.href = url + "auth/login";
        <?php endif; ?>
    });

    //Ngilangi biru biru
    function noblu(){
        $("#navhome").removeClass("btn-fill");
        $("#navsche").removeClass("btn-fill");
        $("#navmember").removeClass("btn-fill");
        $("#navadmin").removeClass("btn-fill");
        $("#uem").css('display','none');
    }

    function showload(){
        $("#load").css('visibility','visible');
    }
</script>