<!DOCTYPE html>
<html lang="en">

	<?php $this->load->view('components/head', array('title' => 'Signin | Internshala Blood Bank')) ?>

	<body class="login-page sidebar-collapse">

		<?php $this->load->view('components/nav') ?>

		<div class="wrapper">

			<div class="page-header clear-filter" filter-color="orange">
				<div class="page-header-image" style="background-image:url(assets/img/bglogin.jpg)"></div>
				<div class="content">
					<div class="container">
						<div class="col-md-4 ml-auto mr-auto">
							<div class="card card-login card-plain">
								<div class="card-header text-center">
									<h3 id="head-text">Sign in/Sign up as Receiver</h3>
								</div>
								<div class="alert" role="alert" id="alert" style="display: none"></div>
								<div class="card-body" id="form-interface">
									<div class="input-group no-border input-lg">
										<div class="input-group-prepend">
											<span class="input-group-text">
											<i class="now-ui-icons users_circle-08"></i>
											</span>
										</div>
										<input type="email" id="form-email" class="form-control" placeholder="Email ID" required="">
									</div>
									<button onclick="signin()" id="form-btn" class="btn btn-primary btn-round btn-lg btn-block">Next</button>
								</div>
								<div class="card-footer text-center">
									<div class="pull-left">
										<h6>
											<a href="sign-in/hospital" class="link">Sign in as Hospital</a>
										</h6>
									</div>
									<div class="pull-right">
										<h6>
											<a href="javascript:alert('Not made for demo purpose')" class="link">Forgot Password?</a>
										</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<?php $this->load->view('components/scripts') ?>

		<script type="text/javascript">
			var email = ''

			const signin = () => {
				email = $('#form-email').val()
				if(!/\S+@\S+\.\S+/.test(email)) {
					$('#alert').toggleClass('alert-danger').html('Please enter an Email ID').slideDown()
					$('#form-email').focus()
					setTimeout(() => $('#alert').toggleClass('alert-danger').slideUp(), 3000)
					return;
				}
				$('#form-btn').prop('disabled', true).html('Please wait...')
				$.ajax({
					url: window.location.href,
					type: "POST",
					data: {
						email: email,
						action: 'next'
					},
					success: (resp) => {
						$('#form-interface').html(resp)
					},
					error: () => {
						alert('There was some error processing request, try again')
						window.location.reload()
					}
				})
			}

			const actual_signin = () => {
				var password = $('#form-password').val()
				if(password == '') {
					$('#alert').toggleClass('alert-danger').html('Please enter a Password').slideDown()
					$('#form-password').focus()
					setTimeout(() => $('#alert').toggleClass('alert-danger').slideUp(), 3000)
					return;
				}
				$('#form-btn').prop('disabled', true).html('Please wait...')
				$.ajax({
					url: window.location.href,
					type: "POST",
					data: {
						email: email,
						password: password,
						action: 'signin'
					},
					success: (resp) => {
						if(resp == 1) {
							$('#alert').toggleClass('alert-success').html('Taking you in...').slideDown()
							window.location.reload()
						} else {
							$('#alert').toggleClass('alert-danger').html('Invalid Password').slideDown()
							setTimeout(() => $('#alert').toggleClass('alert-danger').slideUp(), 3000)
							$('#form-btn').prop('disabled', false).html('Try again...')
						}
					},
					error: () => {
						alert('There was some error processing request, try again')
						window.location.reload()
					}
				})
			}

			const signup = () => {
				const name = $('#form-name').val()
				const address = $('#form-address').val()
				const password = $('#form-password').val()
				const blood_group = $('#form-blood-group').val()
				const blood_rhd = $('#form-blood-rhd').val()
				if(password == '' || name == '' || address == '') {
					$('#alert').toggleClass('alert-danger').html('Please fill in the form').slideDown()
					setTimeout(() => $('#alert').toggleClass('alert-danger').slideUp(), 3000)
					return;
				}
				$('#form-btn').prop('disabled', true).html('Please wait...')
				$.ajax({
					url: window.location.href,
					type: "POST",
					data: {
						name: name,
						email: email,
						address: address,
						password: password,
						blood_group: blood_group,
						blood_rhd: blood_rhd,
						action: 'signup'
					},
					success: (resp) => {
						$('#alert').toggleClass('alert-success').html('Taking you in...').slideDown()
						window.location.reload()
					},
					error: () => {
						alert('There was some error processing request, try again')
						window.location.reload()
					}
				})
			}
		</script>

	</body>
</html>