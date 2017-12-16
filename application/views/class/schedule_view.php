 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Senin</span><button id="senin" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
        <div class="alert alert-danger"><i class="glyphicon glyphicon-calendar"></i> Rasah di pikir, mbok mikiro liane</div>
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Selasa</span><button id="selasa" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	<div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>Jam ke-</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Pelajaran</th>
                    <th>Pengajar</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>06.30</td>
                        <td>08.00</td>
                        <td>Matematika</td>
                        <td>Muchsin</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>08.00</td>
                        <td>09.30</td>
                        <td>Bhs. Enggres</td>
                        <td>Paimin</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>10.00</td>
                        <td>11.30</td>
                        <td>Agama</td>
                        <td>Mustaqim</td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Rabu</span><button id="rabu" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Kamis</span><button id="kamis" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Jumat</span><button id="jumat" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Sabtu</span><button id="sabtu" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	
	</div>
</div>

<!-- Modal : Edit schedule -->
    <div class="modal fade" id="modal-edit-schedule" tabindex="-1" data-dismiss="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" id="edittitle">Edit Jadwal</h5>
          </div>
          <div class="modal-body" id="editc">

          </div><br><br>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url() ?>assets/2.0/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery-ui.js"></script>
    <script type="text/javascript">
        $(".edits").click(function(){
            var day = $(this).attr("id");
            console.log(day);
            $('#modal-edit-schedule').modal('show');
            $.ajax({
                url: url + "aclass/editschedule",
                type: "POST",
                cache: false,
                data: "day="+day,
                timeout: 9000,
                error: function(jqXHR, textStatus, errorThrown){

                },
                success: function(data){
                    $('#editc').html(data);
                }   
            })
        });
    </script>