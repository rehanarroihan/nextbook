<div class="col s12 m12 l12">
    <div class="card">
        <div class="card-content" style="padding-left:40px">
            <h4>Profile</h4>
            <p style="margin-top:-15px">Edit your profile info</p>
            <form method="post" action="#">
                <div class="row" style="margin-top:20px">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input placeholder="Display Name" name="dspname" value="<?php echo $detail->dspname ?>" type="text" class="validate" required>
                        <label>Display Name (*)</label>
                    </div>
                </div>
                <div class="row" style="margin-top:-45px">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="username" placeholder="Username" value="<?php echo $detail->username ?>" type="text" class="validate" required>
                        <label>Username (*)</label>
                    </div>
                </div>
                <div class="row" style="margin-top:-45px">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input name="email" placeholder="email" value="<?php echo $detail->email ?>" type="email" class="validate" required>
                        <label>Email (*)</label>
                    </div>
                </div>
                <div class="row" style="margin-top:-45px">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">school</i>
                        <input name="school" placeholder="School" value="<?php //echo $detail->username ?>" type="text" class="validate">
                        <label>School</label>
                    </div>
                </div>
                <div class="row">
                	<div class="input-field col s12 m12 l12" style="margin-top:-5px">
                		<i class="material-icons prefix">control_point_duplicate</i>
						<select name="gender">
							<option value="" disabled selected>Select your gender</option>
							<option value="l">Male</option>
							<option value="p">Female</option>
						</select>
						<label>Gender</label>
					</div>
                </div>
                <div class="row" style="margin-top:-30px;"><a style="cursor: pointer" onclick="showPassForm()">Change Password</a></div>
                <script type="text/javascript">
                    function showPassForm() {
                    	$('.cpas').css('display','block'); 
                    }
                </script>
                <div class="row cpas" style="margin-top:-3px;display: none">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input name= "password" placeholder="Password" type="password" class="validate" required>
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row cpas" style="margin-top:-45px; display: none">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input name="cpassword" placeholder="Confirm password" type="password" class="validate" required>
                        <label for="password">Confirm Password</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-action">
            <a href="#" class="">Save</a>
        </div>
    </div>
</div>