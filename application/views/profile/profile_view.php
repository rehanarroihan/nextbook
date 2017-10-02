<div class="col s12 m12 l12">
    <div class="card">
        <div class="card-content">
            <div class="row">
              <div class="col s1">
                <img src="<?php echo base_url() ?>assets/img/blue.jpg" />
              </div>
              <div class="col s8">
                <h4  style="padding-left:40px"><?php echo $this->session->userdata('dspname'); ?></h4>
                <p style="margin-top:-15px;padding-left:40px">@<?php echo $this->session->userdata('username'); ?></p>
              </div>
              <div class="col s3">
                <h6>0 <small>friend</small></h6>
                <h6>0 <small>card</small></h6>
                <h6>0 <small>file</small></h6>
              </div>
            </div>
            <div>
              <div class="row">
               <div class="col s12" style="padding-left:-10px">
                 <ul class="tabs">
                   <li class="tab col s6"><a class="active" href="#test1">Profile Info</a></li>
                   <li class="tab col s6"><a href="#test2">Friend</a></li>
                 </ul>
               </div>
               <div id="test1" class="col s12">
                 <ul class="collection">
                  <li class="collection-item"><i class="material-icons prefix">person</i>Display Name</li>
                  <li class="collection-item">Username</li>
                  <li class="collection-item">Email</li>
                  <li class="collection-item">School</li>
                  <li class="collection-item">Gender</li>
                </ul>
               </div>
               <div id="test2" class="col s12">Test 2</div>
             </div>
            </div>
        </div>
        <div class="card-action">
            <!-- <a href="#" class="">Save</a> -->
        </div>
    </div>
</div>
