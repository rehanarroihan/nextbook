<h5>You can only upload image, pdf, docx, pptx and txt only</h5>
<form method="post" action="<?php echo base_url() ?>card/uploads" enctype="multipart/form-data">
	<input type="file" name="file" required>
	<input type="submit" name="file" class="btn" value="upload">
</form>