<?php foreach($getList as $card):  $cid = $card->card_id; ?>
<div class="col s12 m6 l4">
    <div class="card <?php echo $card->color ?> lighten-1">
        <div class="card-content white-text" style="cursor:pointer;" onclick="location.href='<?php echo base_url() ?>card/index/<?php echo $cid ?>/<?php echo md5($card->card_id)?>/';">
            <span class="card-title"><?php echo $card->card_name; ?></span>
            <p><?php echo $card->card_desc; ?></p>
        </div>
        <div class="card-action <?php echo $card->color ?> darken-2">
            <a href="#" class="grey-text text-lighten-2"><?php echo $this->db->where('card_id', $cid)->count_all_results('file'); ?> File(s)</a>
            <a id="<?php echo $card->card_id ?>" style="margin-top:-24px;margin-left:4px" class="waves-effect btn-floating <?php echo $card->color ?> darken-1 right hais"><i class="material-icons">delete</i></a>
            <a style="margin-top:-24px" id="<?php echo $card->card_id ?>" class="waves-effect btn-floating <?php echo $card->color ?> darken-1 right modal-trigger edits"><i class="material-icons">edit</i></a>
        </div>
    </div>
</div>
<?php endforeach; ?>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red modal-trigger" data-target="modal-add">
        <i class="large material-icons">add</i>
    </a>
</div>

<!-- Modal Structure -->
<div id="modal-edit" class="modal">
    <div class="modal-content" id="edit-content"></div>
</div>

<!-- Modal : Create new card -->
<div id="modal-add" class="modal">
    <div class="modal-content">
        <h4>Add Card</h4>
        <p style="margin-top:-15px">Create new card</p>
        <div class="row">
            <div class="col m5">
                <img src="<?php echo base_url() ?>assets/img/astro.png" class="hide-on-small-only" style="height:300px">
            </div>
            <div class="col m7">
                <form class="col s12" method="post" action="<?php echo base_url() ?>home/createcard">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">color_lens</i>
                            <select class="icons" name="color" required>
                                  <option value="" disabled selected>Choose card color</option>
                                  <option value="green" data-icon="<?php echo base_url() ?>assets/img/green.jpg" class="left circle">Green</option>
                                  <option value="blue" data-icon="<?php echo base_url() ?>assets/img/blue.jpg" class="left circle">Blue</option>
                                  <option value="red" data-icon="<?php echo base_url() ?>assets/img/red.jpg" class="left circle">Red</option>
                                  <option value="blue-grey" data-icon="<?php echo base_url() ?>assets/img/grey.jpg" class="left circle">Grey</option>
                                  <option value="purple" data-icon="<?php echo base_url() ?>assets/img/purple.jpg" class="left circle">Purple</option>
                                </select>
                            <label>Card Color</label>
                        </div>
                    </div>
                    <div class="row" style="margin-top:-45px">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">folder_open</i>
                            <input type="text" class="validate" name="cardname" required maxlength="17">
                            <label>Card Name</label>
                        </div>
                    </div>
                    <div class="row" style="margin-top:-50px">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">format_align_right</i>
                            <input type="text" name="carddesc" class="validate" required maxlength="31">
                            <label>Description</label>
                        </div>
                    </div>
                    <div class="row" style="margin-top:-45px">
                        <div class="col m7"></div>
                        <div class="col m5">
                            <input type="submit" name="card" class="waves-effect waves-light btn pull-m2" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    $(".hais").click(function(){
        var card_id = $(this).attr("id");
        swal({
            title: "Are you sure want to delete this card ?",
            text: "This action can't be undone",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            closeOnConfirm: false
        },
        function() {
            window.location.href = "<?php echo base_url() ?>home/trash?cid=" + card_id;
        });
    });

    $(".edits").click(function(){
        var cid = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url() ?>card/edit",
            type: "POST",
            data: "cid="+cid,
            cache: false,
            success: function(data){
                $('#edit-content').html(data);
                $('#modal-edit').modal('open');
            }
        })
    });
});
</script>