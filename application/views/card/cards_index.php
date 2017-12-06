<?php foreach($value as $data): $type = $data->filetype; ?>
<div class="col s12 m6 l3">
    <div class="card">
        <div class="card-content grey-text">
            <div class="" style="padding:0px; height:105px; width: 75px; margin:0px"></div>
        </div>
        <div class="card-action">
            <?php if($type == 'link'): ?>
                <span><i class="material-icons">link</i><a target="_blank" href="<?php echo $data->file_name ?>">Open link</a></span>
            <?php elseif($type == 'pdf'): ?>
                <span><i class="material-icons">picture_as_pdf</i><a target="_blank" href="<?php echo $data->file_name ?>">Open link</a></span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endforeach; ?>