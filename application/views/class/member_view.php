 <div class="card" style="margin-top:-10px">
    <div class="header">
    	<?php  echo $this->db->where('classid', $classdata->classid)->count_all_results('user'); ?> Member(s)
    </div>
    <div class="content" id="page">
        <div class="list-group">
            <?php foreach($memberlist as $member): ?>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $member->dspname ?></h5>
                    <?php if($classdata->created_by == $member->uid): ?>
                    <small class="text-muted pull-right" style="color:green">Class Admin</small>
                    <?php endif; ?>
                </div>
                <small class="text-muted" style="margin-top:-10px"><?php echo $member->email ?></small>
            </a>
            <?php endforeach; ?>
        </div>
	</div>
</div>

