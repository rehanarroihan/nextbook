<div class="col s12 m12 l12">
<div class="col s12 m9 l9">
    <div class="card white">
        <ul id="ul.tabs" class="tabs">
            <li class="tab col s3"><a href="#test-swipe-1">Test 1</a>
            </li>
            <li class="tab col s3"><a href="#test-swipe-2">Test 2</a>
            </li>
            <li class="tab col s3"><a href="#test-swipe-3">Test 3</a>
            </li>
        </ul>
        <div id="test-swipe-1" class="col s12 blue">Test 1</div>
        <div id="test-swipe-2" class="col s12 red">Test 2</div>
        <div id="test-swipe-3" class="col s12 green">Test 3</div>
    </div>
</div>
<div class="col s12 m3 l3">
    <div class="card white scrollspy">
        <?php $qr->setSize(300); echo $qr->render();  ?>
    </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });
</script>