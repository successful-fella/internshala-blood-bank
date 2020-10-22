<style type="text/css">
	select option {
		color: black !important;
	}
</style>

<h5>Create a New Account for kp@kp.com</h5>
<div class="input-group no-border input-lg">
	<div class="input-group-prepend">
		<span class="input-group-text">
			<i class="fa fa-user"></i>
		</span>
	</div>
	<input type="text" id="form-name" class="form-control" placeholder="Name" required="">
</div>
<div class="row">
	<div class="col-md-6">
		<div class="input-group no-border input-lg">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fa fa-syringe"></i>
				</span>
			</div>
			<select id="form-blood-group" class="form-control" required="">
				<option>A</option>
				<option>B</option>
				<option>AB</option>
				<option>O</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="input-group no-border input-lg">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fa fa-syringe"></i>
				</span>
			</div>
			<select id="form-blood-rhd" class="form-control" required="">
				<option>+</option>
				<option>-</option>
			</select>
		</div>
	</div>
</div>
<div class="input-group no-border input-lg">
	<div class="input-group-prepend">
		<span class="input-group-text">
			<i class="fa fa-home"></i>
		</span>
	</div>
	<input type="text" id="form-address" class="form-control" placeholder="Address" required="">
</div>
<div class="input-group no-border input-lg">
	<div class="input-group-prepend">
		<span class="input-group-text">
			<i class="fa fa-envelope"></i>
		</span>
	</div>
	<input type="email" id="form-email" class="form-control" placeholder="Email" readonly="">
</div>
<div class="input-group no-border input-lg">
	<div class="input-group-prepend">
		<span class="input-group-text">
			<i class="fa fa-lock"></i>
		</span>
	</div>
	<input type="password" id="form-password" class="form-control" placeholder="Password" required="">
</div>
<button onclick="signup()" class="btn btn-primary btn-round btn-lg btn-block">Sign Up</button>

<script type="text/javascript">
	$('#form-email').val(email)
</script>