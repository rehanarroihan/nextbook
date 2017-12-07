<div class="col s12 m12 l12">
<div class="col s12 m9 l9">
    <div class="card white">
        <ul id="ul.tabs" class="tabs" style="padding-left:150px">
            <li class="tab col s3"><a href="#test-swipe-1">Stream</a>
            </li>
            <li class="tab col s3"><a href="#test-swipe-2">Schedule</a>
            </li>
            <li class="tab col s3"><a href="#test-swipe-3">Member</a>
            </li>
        </ul>
        <div id="test-swipe-1" class="col s12 blue" style="height:1000px">Test 1</div>
        <div id="test-swipe-2" class="col s12 red">Test 2</div>
        <div id="test-swipe-3" class="col s12 green">Test 3</div>
    </div>
</div>
<div class="col s12 m3 l3" id="classinfo" style="">
    <div class="card white">
        <h4><?php echo $classdata->name ?></h4>
        <p><?php echo $classdata->descript ?></p>
        <img src="<?php echo base_url() ?>aclass/genqr/<?php echo $classdata->classid ?>/200">
    </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#index-banner').scroll(function() { 
        $('#classinfo').animate({top:$(this).scrollTop()});
    });
  });
</script>