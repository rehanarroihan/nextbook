<!-- <h4><?php //echo $this->input->post('day') ?></h4> -->
<form method="post" action="<?php echo base_url() ?>aclass/createclass">
	<div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Pelajaran</th>
                    <th>Pengajar</th>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="name" class="form-control timepicker" id="ml1" placeholder="Mulai" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="sl1" placeholder="Selesai" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="mp1" placeholder="Mapel" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="pn1" placeholder="Pengajar" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" class="form-control timepicker" id="ml1" placeholder="Mulai" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="sl1" placeholder="Selesai" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="mp1" placeholder="Mapel" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="pn1" placeholder="Pengajar" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" class="form-control timepicker" id="ml1" placeholder="Mulai" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="sl1" placeholder="Selesai" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="mp1" placeholder="Mapel" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="pn1" placeholder="Pengajar" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" class="form-control timepicker" id="ml1" placeholder="Mulai" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="sl1" placeholder="Selesai" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="mp1" placeholder="Mapel" required></td>
                        <td><input type="text" name="name" class="form-control timepicker" id="pn1" placeholder="Pengajar" required></td>
                    </tr>
                </tbody>
            </table>
        </div>
	<button type="button" class="btn btn-info btn-fill pull-right" id="plus">
		<span class="fa fa-plus"></span>
	</button>
	<input type="submit" name="class" class="btn btn-fill btn-success pull-right" value="Save">
</form>
<script src="<?php echo base_url() ?>assets/2.0/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/2.0/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/2.0/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
 	$("#plus").click(function(){
 		var pel = 1;
        console.log(pel);
        if (pel == 1) {
        	$('#pel2').css('visibility','visible');
        	pel + 1;  
        }
    });
</script>
