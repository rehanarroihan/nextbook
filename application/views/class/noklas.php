<div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="Creative Code Inc.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="michael23">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="Company" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img style="" src="<?php echo base_url() ?>assets/2.0/img/<?php echo $classdata->photo ?>" alt="..."/>
                            </div>
                            <div class="content" style="margin-top:70px">
                                <div class="author">
                                      <h4 class="title"><?php echo $classdata->name ?><br />
                                         <small><?php echo $classdata->descript ?></small>
                                      </h4>
                                </div>
                                <p class="text-center" style="margin-bottom:18px">34 Member</p>
                                <hr>
	                            <div class="text-center">
	                            	<p style="font-size:12px;color:#CFD8DC;margin-bottom:-5px"><i>Created at <?php date_create($classdata->dt_created);echo $classdata->dt_created ?> by <?php echo $classdata->dspname ?></i></p>
	                            </div>
                            </div>
                        </div>

                        <div class="card card-user" style="margin-top:-10px">
                            <div class="text-center">
                            	<p style="font-size:12px;color:grey;padding-top:10px"><i>Scan qr code / copy class code to join</i></p>
                            </div>
                            <hr>
                            <div class="content">
                                <table style="border-collapse: collapse;border:none;">
								  <tr>
								    <td rowspan="2">
								    	<img src="<?php echo base_url() ?>aclass/genqr/<?php echo $classdata->classid ?>/75">
								    </td>
								    <td style="padding-top:10px">Class Code :</td>
								  </tr>
								  <tr>
								    <td><p style="font-size:50px;margin-top:-10px"><?php echo $classdata->classid ?></p></td>
								  </tr>
								</table>
                            </div>
                            <div class="text-center">
                            	<button class="btn btn-danger btn-fill form-control btn-wd">Unenroll Class</button>
                            </div>
                        </div>
                    </div>

                </div>