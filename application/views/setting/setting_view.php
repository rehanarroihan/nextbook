<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h3 class="title">Setting Interface</h3>
            </div>
            <div class="content">
                <form method="post" id="edit_setting" action="<?php echo base_url();?>Setting/edit_setting">
                    <div class="input-group col-lg-12 col-md-12">
                        <div class="header">
                            <h4 class="title">Sidebar Color</h4>
                        </div>
                        <div class="content">
                            <input type="radio" name="color" value="blue" <?php if($iface->color == 'blue'){ ?> checked="checked" <?php }; ?>>
                            <span style="margin-right: 13%"> <b>Blue</b></span>

                            <input type="radio" name="color" value="red" <?php if($iface->color == 'red'){ ?> checked="checked" <?php }; ?>>
                            <span style="margin-right: 13%"> <b>Red</b></span>

                            <input type="radio" name="color" value="azure" <?php if($iface->color == 'azure'){ ?> checked="checked" <?php }; ?>>
                            <span style="margin-right: 13%"> <b>Azure</b></span>

                            <input type="radio" name="color" value="orange" <?php if($iface->color == 'orange'){ ?> checked="checked" <?php }; ?>>
                            <span style="margin-right: 13%"> <b>Orange</b></span>

                            <input type="radio" name="color" value="grey" <?php if($iface->color == 'grey'){ ?> checked="checked" <?php }; ?>>
                            <span style="margin-right: 13%"> <b>Grey</b></span>
                        </div>

                        <div class="header">
                            <h4 class="title">sidebar image</h4>
                        </div>
                        <div class="content" style="margin-bottom: 5%">
                            <input type="radio" name="image" value="sidebar-1.jpg" style="margin-right: 1%" <?php if($iface->image == 'sidebar-1.jpg'){ ?> checked="checked" <?php }; ?>>
                            <img style="margin-right: 5%" height="150px" width="10%" src="<?php echo base_url();?>assets/2.0/img/sidebar-1.jpg">

                            <input type="radio" name="image" value="sidebar-2.jpg" style="margin-right: 1%" <?php if($iface->image == 'sidebar-2.jpg'){ ?> checked="checked" <?php }; ?>>
                            <img style="margin-right: 5%" height="150x" width="10%" src="<?php echo base_url();?>assets/2.0/img/sidebar-2.jpg">

                            <input type="radio" name="image" value="sidebar-3.jpg" style="margin-right: 1%"<?php if($iface->image == 'sidebar-3.jpg'){ ?> checked="checked" <?php }; ?>>
                            <img style="margin-right: 5%" height="150px" width="10%" src="<?php echo base_url();?>assets/2.0/img/sidebar-3.jpg">

                            <input type="radio" name="image" value="sidebar-4.jpg" style="margin-right: 1%" <?php if($iface->image == 'sidebar-4.jpg'){ ?> checked="checked" <?php }; ?>>
                            <img style="margin-right: 5%" height="150px" width="10%" src="<?php echo base_url();?>assets/2.0/img/sidebar-4.jpg">

                            <input type="radio" name="image" value="sidebar-5.jpg" style="margin-right: 1%" <?php if($iface->image == 'sidebar-5.jpg'){ ?> checked="checked" <?php }; ?>>
                            <img style="margin-right: 5%" height="150px" width="10%" src="<?php echo base_url();?>assets/2.0/img/sidebar-5.jpg">
                        </div>

                        <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd pull-right" value="Save Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery-ui.js"></script>