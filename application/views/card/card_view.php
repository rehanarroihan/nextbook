<div class="col s12 m12 l12">
    <div class="card <?php echo $card->color ?> lighten-1">
        <div class="card-content white-text" style="padding-left:30px">
            <h4><?php echo $card->card_name; ?></h4>
            <?php if($valCount > 0){$item = 'Items';}else{$item = 'Item';}?>
            <p style="margin-top:-15px"><?php echo $card->card_desc; ?> | <?php echo $valCount.' '.$item ?></p>
            <div class="row" style="margin-bottom:-40px">
                <a id="<?php echo $card->card_id ?>" style="margin-left:4px" class="waves-effect btn-floating <?php echo $card->color ?> darken-1 right hais"><i class="material-icons">archive</i></a>
                <a id="<?php echo $card->card_id ?>" style="margin-left:4px" class="waves-effect btn-floating <?php echo $card->color ?> darken-1 right hais"><i class="material-icons">share</i></a>
                <a id="<?php echo $card->card_id ?>" style="margin-left:4px" class="waves-effect btn-floating <?php echo $card->color ?> darken-1 right hais"><i class="material-icons">delete</i></a>
                <a style="" class="waves-effect btn-floating <?php echo $card->color ?> darken-1 right"><i class="material-icons">edit</i></a>
            </div>
        </div>
        <div class="card-action <?php echo $card->color ?> darken-2">
            <?php if($valCount > 0): ?>
              <div class="row" style="margin-top:10px">
                <?php $this->load->view('card/cards_index'); ?>
              </div>
            <?php else: ?>
              <img src="<?php echo base_url()?>assets/img/cardempty.png" alt="Card is empty" style="opacity: 0.3;">
            <?php endif; ?>
        </div>
    </div>

  <!-- INI FAB -->
  <!-- <div class="fixed-action-btn">
    <a href="<?php //echo base_url() ?>card/upload/<?php //echo $card->card_id ?>/<?php //echo md5($card->card_id)?>/" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
  </div> -->
  <div class="fixed-action-btn">
      <a class="btn-floating btn-large <?php echo $card->color ?> lighten-1">
        <i class="large material-icons">add</i>
      </a>
      <ul>
          <li><a class="btn-floating red tooltipped modal-trigger" data-target="modal-add-link" data-position="left" data-delay="50" data-tooltip="Add link"><i class="material-icons">link</i></a></li>
          <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Upload file"><i class="material-icons">file_upload</i></a></li>
      </ul>
  </div>

   <!-- Modal : Add link into card -->
  <div id="modal-add-link" class="modal">
      <div class="modal-content">
          <h4>Add Link</h4>
          <p style="margin-top:-15px">Add link into card</p><br><br>
          <div class="row" style="margin-bottom:12px">
              <form method="post" action="<?php echo base_url() ?>card/addlink">
                  <input type="hidden" name="card_id" value="<?php echo $this->uri->segment(3) ?>">
                  <div class="row" style="margin-top:-45px">
                      <div class="input-field col s12">
                          <i class="material-icons prefix">link</i>
                          <input type="text" class="validate" name="link" required>
                          <label>Link</label>
                      </div>
                  </div>
                  <div class="row" style="margin-top:-45px">
                      <div class="col m7"></div>
                      <div class="col m5">
                          <input type="submit" name="savelink" class="waves-effect waves-light btn pull-m2" value="Save">
                      </div>
                    </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal : Uplaod file -->
  <div id="modal-add-file" class="modal">
      <div class="modal-content">
          <h4>Upload File</h4>
          <p style="margin-top:-15px">Upload file into card</p><br><br>
          <div class="row" style="margin-bottom:12px">
              <form method="post" action="<?php echo base_url() ?>card/uploads">
                  <div class="row" style="margin-top:-45px">
                      <div class="input-field col s12">
                          <i class="material-icons prefix">link</i>
                          <input type="text" class="validate" name="link" required>
                          <label>Link</label>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <div class="modal-footer" style="margin-top:-14px">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Save</a>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>