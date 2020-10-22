<h5>Create a New Account for kp@kp.com</h5>
<img src="" id="preview-img" style="display: none; margin-bottom: 12px">
<div class="input-group no-border input-lg">
	<div class="input-group-prepend">
		<span class="input-group-text">
			<i class="fa fa-user"></i>
		</span>
	</div>
	<input type="text" id="form-name" class="form-control" placeholder="Hospital Name" required="">
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
<span>Upload Hospital Front (Optional)</span>
<div class="no-border input-lg">
	<input type="file" id="form-file" class="form-control" accept="image/*" onchange="previewImage(this)">
</div>
<button onclick="signup()" class="btn btn-primary btn-round btn-lg btn-block">Sign Up</button>

<script type="text/javascript">
	$('#form-email').val(email)
	const previewImage = (element) => {
		$("#preview-img").attr("src", URL.createObjectURL(element.files[0])).show()
	} 
</script>