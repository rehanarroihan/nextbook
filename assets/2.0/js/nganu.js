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

    $(".classnav").click(function(){
        var now = $(this).attr("id");
        noblu();
        $("#load").css('display','block');
        if(now == 'navhome'){
            $('#' + now).addClass("btn-fill");
            $("#title").html("Home");
        }else if(now == 'navsche'){
            $('#' + now).addClass("btn-fill");
            $("#title").html("Schedule");
        }else if(now == 'navmember'){
            $('#' + now).addClass("btn-fill");
            $("#title").html("Member");
        }else if(now == 'navadmin'){
            $('#' + now).addClass("btn-fill");
            $("#title").html("Group Setting");
        }
    });

    function noblu(){
        $("#navhome").removeClass("btn-fill");
        $("#navsche").removeClass("btn-fill");
        $("#navmember").removeClass("btn-fill");
        $("#navadmin").removeClass("btn-fill");
    }

    function showload(){
    	$("#load").css('visibility','visible');
    }