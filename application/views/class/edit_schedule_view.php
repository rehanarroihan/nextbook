<form method="post" action="<?php echo base_url() ?>aclass/goeditsche">
	<div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Pelajaran</th>
                </thead>
                <tbody>
                    <input type="hidden" name="scheid" value="<?php echo $row->scheduleid ?>">
                    <tr>
                        <td><input type="time" name="start" value="<?php echo $row->start ?>" class="form-control timepicker" id="ml1" placeholder="Mulai" required></td>
                        <td><input type="time" name="end" value="<?php echo $row->end ?>" class="form-control timepicker" id="sl1" placeholder="Selesai" required></td>
                        <td><select class="form-control" name="lessonid">
                            <?php foreach($lessonList as $list): ?>
                                <option <?php if($list->lesson == $row->lesson){echo 'selected';} ?> value="<?php echo $list->lessonid ?>"><?php echo $list->lesson ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    </tr>
                </tbody>
            </table>
        </div>
	<input type="submit" name="goedit" class="btn btn-fill btn-success pull-right" value="Simpan">
</form>

