<script src="<?php echo base_url() ?>assets/2.0/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">

</script>
<form method="post" action="<?php echo base_url() ?>aclass/saveschedule">
	<div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Pelajaran</th>
                </thead>
                <tbody>
                    <input type="hidden" name="day" value="<?php echo $this->input->post('day') ?>">
                    <tr>
                        <td><input type="time" name="start" class="form-control timepicker" id="ml1" placeholder="Mulai" required></td>
                        <td><input type="time" name="end" class="form-control timepicker" id="sl1" placeholder="Selesai" required></td>
                        <td><select class="form-control" name="lessonid">
                            <?php foreach($lessonList as $list): ?>
                                <option value="<?php echo $list->lessonid ?>"><?php echo $list->lesson ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    </tr>
                </tbody>
            </table>
        </div>
	<input type="submit" name="lesson" class="btn btn-fill btn-success pull-right" value="Simpan">
</form>

