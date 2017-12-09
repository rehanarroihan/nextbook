    //Class view main
    var url = "http://localhost/nextbook/";
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

    $(".classnav").click(function(){
        var now = $(this).attr("id");
        noblu();
        $("#masok").empty();
        $("#load").css('display','block');
        if(now == 'navhome'){
            $('#' + now).addClass("btn-fill");
            $("#title").html("Home");
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
                    $('#masok').html("An error occured, try again later");
                },
                success: function(data){
                    $("#load").css('display','none');
                    $('#masok').html(data);
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
                }   
            })
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