<div style="text-align: center;margin-top:25px;margin-bottom:25px;pointer-events: none;">
<img src="<?php echo base_url() ?>assets/img/nofolder.png" style="height:550px;pointer-events: none;">
</div>
<div class="fixed-action-btn">
	<a class="btn-floating btn-large red modal-trigger" data-target="modal-add">
    	<i class="large material-icons">add</i>
    </a>
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
                        <div class="row"  style="margin-top:-45px">
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