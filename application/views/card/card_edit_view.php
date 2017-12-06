<h4>Edit Card</h4>
<p style="margin-top:-15px">Edit card</p>
<div class="row">
    <div class="col m5">
        <img src="<?php echo base_url() ?>assets/img/astro.png" class="hide-on-small-only" style="height:300px">
    </div>
    <div class="col m7">
        <form class="col s12" method="post" action="<?php echo base_url() ?>home/savecard">
            <div class="row">
                <input type="hidden" name="cid" value="<?php echo $detVal->card_id ?>">
                <div class="input-field col s12">
                    <i class="material-icons prefix">color_lens</i>
                    <select class="icons" name="color" required>
                        <option value="" disabled selected>Choose card color</option>
                        <option value="green" <?php $clr = $detVal->color;if($clr=='green'){echo 'selected="selected"';}?> data-icon="<?php echo base_url() ?>assets/img/green.jpg" class="left circle">Green</option>
                        <option value="blue" <?php if($clr=='blue'){echo 'selected="selected"';}?> data-icon="<?php echo base_url() ?>assets/img/blue.jpg" class="left circle">Blue</option>
                        <option value="red" <?php if($clr=='red'){echo 'selected="selected"';}?> data-icon="<?php echo base_url() ?>assets/img/red.jpg" class="left circle">Red</option>
                        <option value="blue-grey" <?php if($clr=='blue-grey'){echo 'selected="selected"';}?> data-icon="<?php echo base_url() ?>assets/img/grey.jpg" class="left circle">Grey</option>
                        <option value="purple" <?php if($clr=='purple'){echo 'selected="selected"';}?> data-icon="<?php echo base_url() ?>assets/img/purple.jpg" class="left circle">Purple</option>
                    </select>
                    <label>Card Color</label>
                </div>
            </div>
            <div class="row" style="margin-top:-45px">
                <div class="input-field col s12">
                    <i class="material-icons prefix">folder_open</i>
                    <input name="cardname" placeholder="Card Name" value="<?php echo $detVal->card_name ?>" type="text" class="validate" required maxlenght="17">
                    <label>Card Name</label>
                </div>
            </div>
            <div class="row" style="margin-top:-50px">
                <div class="input-field col s12">
                    <i class="material-icons prefix">format_align_right</i>
                    <input placeholder="Card desc" type="text" name="carddesc" value="<?php echo $detVal->card_desc ?>" class="validate" required maxlength="31">
                    <label>Description</label>
                </div>
            </div>
            <div class="row" style="margin-top:-45px">
                <div class="col m7"></div>
                <div class="col m5">
                    <input type="submit" name="savecard" class="waves-effect waves-light btn pull-m2" value="Save Change">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('select').material_select();
    Materialize.updateTextFields();
</script>