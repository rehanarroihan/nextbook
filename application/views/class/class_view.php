<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="content text-center">
                <button type="button" id="navhome" class="btn btn-info btn-wd classnav">
                    <span class="btn-label">
                        <i class="fa fa-home"></i>
                    </span>Home
                </button>
                <button type="button" id="navsche" class="btn btn-info btn-wd classnav">
                    <span class="btn-label">
                        <i class="fa fa-list-ul"></i>
                    </span>Schedule
                </button>
                <button type="button" id="navmember" class="btn btn-info btn-wd classnav">
                    <span class="btn-label">
                        <i class="fa fa-users"></i>
                    </span>Member
                </button>
                <?php if($classdata->created_by == $this->session->userdata('uid')): ?>
                <button type="button" id="navadmin" class="btn btn-info btn-wd classnav">
                    <span class="btn-label">
                        <i class="fa fa-cog"></i>
                    </span>Group Setting
                </button>
                <?php endif; ?>
            </div>
        </div>

        <div id="masok"></div>

        <?php if(!empty($third_view)): ?>
            <div id="uem">
            <?php $this->load->view($third_view)?>
            </div>
        <?php endif; ?>

        <img src="<?php echo base_url() ?>assets/2.0/img/load2.gif" id="load" style="height:200px;opacity: 0.2;display:none" class="center-block">
    </div>
    
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
                    window.history.pushState("", "", "<?php echo base_url(); ?>aclass/home");
                }                
            })
        }else if(now == 'navsche'){
            $('#' + now).addClass("btn-fill");
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
                    window.history.pushState("", "", "<?php echo base_url(); ?>aclass/schedule");
                }                
            })
        }else if(now == 'navmember'){
            $('#' + now).addClass("btn-fill");
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
                    window.history.pushState("", "", "<?php echo base_url(); ?>aclass/member");
                }   
            })
        }else if(now == 'navadmin'){
            $('#' + now).addClass("btn-fill");
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
                    window.history.pushState("", "", "<?php echo base_url(); ?>aclass/setting");
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