 <div class="card" style="margin-top:-10px">
    <div class="header">
    	Group Setting
    </div>
    <div class="content" id="page">
        <form method="post" id="edit_pofile" action="<?php echo base_url();?>aclass/executesetting" enctype="multipart/form-data">
            <div class="input-group col-lg-12 col-md-12">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img style="margin-bottom: 3%;margin-left: 10%" src="<?php echo base_url();?>assets/2.0/img/group/<?php echo $classdata->photo;?>" width="100%" height="100%">

                    <input type="file" name="classpict" style="margin-left: 10%">
                </div>

                <div class="col-lg-1 col-md-1 col-sm-12"></div>

                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="input-group" style="margin-bottom: 5%">
                        <span class="input-group-addon"><i class="fa fa-header"></i></span>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $classdata->name;?>">
                    </div>

                    <div class="input-group" style="margin-bottom: 5%">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <textarea id="descript" name="descript" class="form-control" placeholder="Descript" rows="5"><?php echo $classdata->descript;?></textarea>
                    </div>
                    <input type="hidden" name="classid" value="<?php echo $classdata->classid;?>">
                </div>
                <div class="col-md-12">
                    <!-- <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd pull-right" id="submit" value="Save Change"> -->
                    <button type="button" class="btn btn-info btn-fill btn-wd pull-right" id="submit" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing Order">Submit Order</button>
                </div>
            </div>
        </form>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/2.0/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$('#submit').load(function(){
		var $btn = $(this);
	    $btn.button('loading');
	    setTimeout(function () {
	        $btn.button('reset');
	    }, 1000);

	});
</script>

