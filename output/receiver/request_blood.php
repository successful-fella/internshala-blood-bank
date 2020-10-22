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
						<div class="col-md-4" style="width: 50%">
							<div class="card card-no-margin">
								<div class="img-area">
									<img class="card-img-top img-square" src="assets/img/bghospital.webp">
								</div>
								<div class="card-body">
									<p class="card-title">KP ka Blood</p>
									<p class="text-muted">KP Hospital, Address</p>
								</div>
								<div class="card-footer">
									<button class="btn btn-primary btn-full">Request Sample</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<?php $this->load->view('components/footer') ?>

		</div>

		<?php $this->load->view('components/scripts') ?>

	</body>
</html>