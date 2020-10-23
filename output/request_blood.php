<!DOCTYPE html>
<html lang="en">

	<?php $this->load->view('components/head', array('title' => 'Hospital')) ?>

	<style type="text/css">
		.tab-pane {
			color: black !important;
		}

		.form-group {
			text-align: left !important;
		}
	</style>

	<body class="profile-page sidebar-collapse color-section">

		<?php $this->load->view('components/nav') ?>

		<div class="wrapper">
			
			<div class="section color-section">
				<div class="container">
					<h3 class="title">Request Blood From Various Hospitals</h3>
					
					<div class="row">

						<?php if(empty($samples)): ?>
							No samples available as of now, please check again! 😉
						<?php endif; ?>

						<?php foreach($samples as $sample): ?>
							<div class="col-md-4" style="width: 50%">
								<div class="card card-no-margin">
									<div class="img-area">
										<span class="sample-type"><?= $sample->sample_type . $sample->sample_rhd ?></span>
										<img class="card-img-top img-square" src="<?= $sample->hospital_feature_image ?>" onerror="this.src = 'assets/img/bghospital.webp'">
									</div>
									<div class="card-body" style="height: 200px">
										<p class="card-title"><?= $sample->sample_name ?></p>
										<p class="text-muted"><?= $sample->hospital_name . ', ' . $sample->hospital_address ?></p>
									</div>
									<div class="card-footer">
										<?php if($sample->status): ?>
											<button class="btn btn-success btn-full">Already Requested</button>
										<?php else: ?>
											<button class="btn btn-primary btn-full" onclick="requestSample(<?= $sample->sample_id ?>, this)">Request Sample</button>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>

				</div>
			</div>

			<div class="section">
				<div class="container">
					<h3 class="title" style="color: black">Eligibility Chart</h3>
					
					<div class="row">
						<div class="table-responsive">
							<table class="table table-hover text-center">
								<thead>
									<tr>
										<th>If You Are</th>
										<th>You Can Request</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>A+</td>
										<td>A+, A-, O+, O-</td>
									</tr>
									<tr>
										<td>A-</td>
										<td>A-, O-</td>
									</tr>
									<tr>
										<td>B+</td>
										<td>B+, B-, O+, O-</td>
									</tr>
									<tr>
										<td>B-</td>
										<td>B-, O-</td>
									</tr>
									<tr>
										<td>AB+</td>
										<td>AB+, AB-, B+, B-, A+, A-, O+, O-</td>
									</tr>
									<tr>
										<td>AB-</td>
										<td>AB-, B-, A-, O-</td>
									</tr>
									<tr>
										<td>O+</td>
										<td>O+, O-</td>
									</tr>
									<tr>
										<td>O-</td>
										<td>O-</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>

			</div>

			<?php $this->load->view('components/footer') ?>

		</div>

		<?php $this->load->view('components/scripts') ?>

		<script type="text/javascript">
			const requestSample = (sample_id, element) => {
				$('.btn-full').prop('disabled', true)
				$(element).prop('disabled', true).html('Please wait...')
				$.ajax({
					url: window.location.href,
					type: "POST",
					data: {
						sample_id: sample_id
					},
					success: (resp) => {
						if(resp == '0') {
							// Not logged in
							$(element).toggleClass('btn-warning').html("Please login to proceed")
							window.location.href = "sign-in/receiver?next=request-blood"
						} else if(resp == '1') {
							// Issa hospital
							$(element).toggleClass('btn-danger').html("Hospitals can't request for sample")
						} else if(resp == '2') {
							// Okay
							$('.btn-full').prop('disabled', false)
							$(element).toggleClass('btn-success').prop('disabled', true).html('Sample requested!')
						} else if(resp == '3') {
							// Okay but can't take
							$('.btn-full').prop('disabled', false)
							$(element).toggleClass('btn-warning').prop('disabled', true).html("You're not eligible to request this one.")
						} else {
							$('.btn-full').prop('disabled', false)
							$(element).toggleClass('btn-danger').html('Error, try again')
						}
					},
					error: () => {
						alert('Something went wrong... Please try again.')
						// window.location.reload()
					}
				})
			}
		</script>

	</body>
</html>