<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Profile</h4>
            </div>
            <div class="content">
                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image <?php if($classdata->created_by == $this->session->userdata('uid')){echo '';} ?>">
                <img class="img-overlay" src="<?php echo base_url() ?>assets/2.0/img/<?php echo $classdata->photo ?>" alt="..."/>
                <div class="overlay">
                   <h2>Hover effect 3</h2>
                   <a class="info" href="#">Change Photo</a>
                </div>
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