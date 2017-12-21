  <div class="card" style="margin-top:-10px">
    <div class="header">
        <span id="title">Daftar Pelajaran</span>
    </div>
    <div class="content" id="page">
        <!-- iki pelAJARAN -->
        <?php if($lessonCount > 0): ?>
            <?php foreach($lessonList as $list): ?>
            <button class="btn btn-info btn-fill yha" style="margin-bottom:3px" type="button" data-toggle="tooltip" title="<?php echo $list->teacher ?>">
                <?php echo $list->lesson ?> <span class="badge">0</span>
            </button>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada pelajaran</p>
        <?php endif; ?>        
        <?php if($classdata->created_by == $this->session->userdata('uid')): ?>
        <button class="btn btn-success btn-fill" type="button" id="addl"><i class="glyphicon glyphicon-plus"></i></button>
        <?php endif; ?>
    </div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Senin</span><button id="senin" class="edits btn btn-sm btn-fill btn-info pull-right"><i class="fa fa-plus"></i></button>
    </div>
    <div class="content" id="page">
        <?php if($seninCount > 0): ?>
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
                    <?php $no=1;foreach($seninList as $data): ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->start ?></td>
                        <td><?php echo $data->end ?></td>
                        <td><?php echo $data->lesson ?></td>
                        <td><?php echo $data->teacher ?></td>
                    </tr>
                    <?php $no++;endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-warning"><i class="glyphicon glyphicon-check"></i> Tidak ada jadwal untuk hari ini</div>
	    <?php endif; ?>
    </div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Selasa</span><button id="selasa" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	<?php if($selasaCount > 0): ?>
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
                    <?php $no=1;foreach($selasaList as $data): ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->start ?></td>
                        <td><?php echo $data->end ?></td>
                        <td><?php echo $data->lesson ?></td>
                        <td><?php echo $data->teacher ?></td>
                    </tr>
                    <?php $no++;endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-warning"><i class="glyphicon glyphicon-check"></i> Tidak ada jadwal untuk hari ini</div>
        <?php endif; ?>
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Rabu</span><button id="rabu" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	<?php if($rabuCount > 0): ?>
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
                    <?php $no=1;foreach($rabuList as $data): ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->start ?></td>
                        <td><?php echo $data->end ?></td>
                        <td><?php echo $data->lesson ?></td>
                        <td><?php echo $data->teacher ?></td>
                    </tr>
                    <?php $no++;endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-warning"><i class="glyphicon glyphicon-check"></i> Tidak ada jadwal untuk hari ini</div>
        <?php endif; ?>
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Kamis</span><button id="kamis" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	<?php if($kamisCount > 0): ?>
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
                    <?php $no=1;foreach($kamisList as $data): ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->start ?></td>
                        <td><?php echo $data->end ?></td>
                        <td><?php echo $data->lesson ?></td>
                        <td><?php echo $data->teacher ?></td>
                    </tr>
                    <?php $no++;endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-warning"><i class="glyphicon glyphicon-check"></i> Tidak ada jadwal untuk hari ini</div>
        <?php endif; ?>
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Jumat</span><button id="jumat" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	<?php if($jumatCount > 0): ?>
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
                    <?php $no=1;foreach($jumatList as $data): ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->start ?></td>
                        <td><?php echo $data->end ?></td>
                        <td><?php echo $data->lesson ?></td>
                        <td><?php echo $data->teacher ?></td>
                    </tr>
                    <?php $no++;endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-warning"><i class="glyphicon glyphicon-check"></i> Tidak ada jadwal untuk hari ini</div>
        <?php endif; ?>
	</div>
</div>

 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<span id="title">Sabtu</span><button id="sabtu" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
    	<?php if($sabtuCount > 0): ?>
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
                    <?php $no=1;foreach($sabtuList as $data): ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->start ?></td>
                        <td><?php echo $data->end ?></td>
                        <td><?php echo $data->lesson ?></td>
                        <td><?php echo $data->teacher ?></td>
                    </tr>
                    <?php $no++;endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-warning"><i class="glyphicon glyphicon-check"></i> Tidak ada jadwal untuk hari ini</div>
        <?php endif; ?>
	</div>
</div>

<div class="card" style="margin-top:-10px">
    <div class="header">
        <span id="title">Ahad</span><button id="minggu" class="edits btn btn-sm btn-fill btn-success pull-right"><i class="fa fa-edit"></i></button>
    </div>
    <div class="content" id="page">
        <?php if($mingguCount > 0): ?>
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
                    <?php $no=1;foreach($mingguList as $data): ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->start ?></td>
                        <td><?php echo $data->end ?></td>
                        <td><?php echo $data->lesson ?></td>
                        <td><?php echo $data->teacher ?></td>
                    </tr>
                    <?php $no++;endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-warning"><i class="glyphicon glyphicon-check"></i> Tidak ada jadwal untuk hari ini</div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal : Edit schedule -->
    <div class="modal fade" id="modal-edit-schedule" tabindex="-1" data-dismiss="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ttltmbjdwl">Edit Jadwal</h5>
          </div>
          <div class="modal-body" id="editc">

          </div><br><br>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal : Add lesson -->
    <div class="modal fade" id="modal-add-lesson" tabindex="-1" data-dismiss="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" id="edittitle">Tambah Pelajaran</h5>
          </div>
          <div class="modal-body" id="editc">
            <form method="post" action="<?php echo base_url() ?>aclass/savelesson" id="formjoin">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nama Pelajaran</label>
                <input type="text" name="lesson" class="form-control" placeholder="Class code" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Pengajar</label>
                <input type="text" name="teacher" class="form-control" placeholder="Class code" required>
              </div>
              <input type="submit" class="btn btn-fill btn-success pull-right" value="Save" name="save">
            </form>
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
            $("#ttltmbjdwl").html("Tambah Jadwal (" + day + ")");
            $('#modal-edit-schedule').modal();
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

        $("#addl").click(function(){
            $('#modal-add-lesson').modal();
        });
    </script>