<div class="modal fade" id="register-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4><span class="glyphicon glyphicon-plus"></span> Register</h4>
      </div>
      <div class="modal-body">
		<form role="form" id="registerForm">
			<div class="form-group">
				<label for="reg-form-comp">Company</label>
				<input type="text" class="form-control" id="reg-form-comp" placeholder="Company" name="company">
			</div>
			<div class="form-group">
				<label for="reg-form-first-name">Name</label><select class="form-control" name="name_title">
					<option>Mr.</option>
					<option>Mrs.</option>
					<option>Ms.</option>
					<option>Dr.</option>
					<option>Prof. Dr.</option>
				</select>
				<br>
				<input type="text" class="form-control" id="reg-form-first-name" placeholder="First" name="first_name"><br>
				<input type="text" class="form-control" id="reg-form-last-name" placeholder="Last" name="last_name">
			</div>
			<div class="form-group">
				<label for="reg-form-addr">Address</label>
				<input type="text" class="form-control" id="reg-form-addr" placeholder="Address Line" name="address"><br>
				<input type="text" class="form-control" id="reg-form-postal" placeholder="Zip Code" name="zip_code"><br>
				<input type="text" class="form-control" id="reg-form-addr" placeholder="City" name="city"><br>
				<input type="text" class="form-control" id="reg-form-addr" placeholder="Country" name="country">
			</div>
			<div class="form-group">
				<label for="reg-form-user">E-Mail</label>
				<input type="email" class="form-control" id="reg-form-user" name="email">
				<label for="reg-form-pass">Password</label>
				<input type="password" class="form-control" id="reg-form-pass" name="pass">
				<label for="reg-form-pass-conf">Confirm</label>
				<input type="password" class="form-control" id="reg-form-pass-conf" name="pass_conf">
			</div>	
			<button type="submit" class="btn btn-success pull-left" id="registerSubmitButton">Register</button>
			<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove"></span> Cancel
			</button>
		</form>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="login-modal" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4><span class="glyphicon glyphicon-user"></span> Login</h4>
      </div>
      <div class="modal-body">
        
				<form role="form" id="loginForm">
					<div class="form-group">
						<label for="reg-form-user">E-Mail</label>
						<input type="email" class="form-control" id="reg-form-user" name="email">
						<label for="reg-form-pass">Password</label>
						<input type="password" class="form-control" id="reg-form-pass" name="pass">
					</div>
					
					<button type="submit" class="btn btn-success pull-left" id="loginSubmitButton">Login</button>
					<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal">
          	<span class="glyphicon glyphicon-remove"></span> Cancel
					</button>
				</form>
        <br>
      </div>
    </div>
  </div>
</div>