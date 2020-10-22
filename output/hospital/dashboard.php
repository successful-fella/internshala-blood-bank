<!DOCTYPE html>
<html lang="en">

	<?php $this->load->view('components/head', array('title' => 'Hospital Dashboard')) ?>

	<style type="text/css">
		html, body, .wrapper, .section {
			height: 100%;
		}

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

			<div class="bottom-nav">
				<div class="container">
					<div class="card card-nav-tabs card-plain">
						<div class="card-header card-header-primary">
							<div class="nav-tabs-navigation">
								<div class="nav-tabs-wrapper">
									<ul class="nav" data-tabs="tabs">
										<li class="nav-item" style="width: 33.33%">
											<a class="nav-link active" href="#add" data-toggle="tab">Add Blood Info</a>
										</li>
										<li class="nav-item" style="width: 33.33%" onclick="loadSamplesList()">
											<a class="nav-link" href="#list" data-toggle="tab">All Blood Samples</a>
										</li>
										<li class="nav-item" style="width: 33.33%" onclick="loadRequestsList()">
											<a class="nav-link" href="#request" data-toggle="tab">Receiver's Requests</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>


			<div class="section color-section">
				<div class="tab-content text-center">


					<?php $this->load->view('components/hospital/add_blood_sample.php') ?>

					<?php $this->load->view('components/hospital/list_blood_sample.php') ?>

					<?php $this->load->view('components/hospital/receiver_request.php') ?>

				</div>
			</div>

		</div>

		<?php $this->load->view('components/scripts') ?>

		<script type="text/javascript">
			const loadSamplesList = () => {
				$.ajax({
					url: window.location.href,
					type: "POST",
					data: {
						action: 'list'
					},
					success: (resp) => {
						$('#list-blood-sample').html(resp)
					},
					error: () => {
						alert('There was some problem fetching list. Please try again')
						window.location.reload()
					}
				})
			}

			const loadRequestsList = () => {
				$.ajax({
					url: window.location.href,
					type: "POST",
					data: {
						action: 'requests'
					},
					success: (resp) => {
						$('#list-requests').html(resp)
					},
					error: () => {
						alert('There was some problem fetching list. Please try again')
						// window.location.reload()
					}
				})
			}

			const addSample = () => {
				const title = $('#form-name').val()
				if(title == '') {
					$('#alert').toggleClass('alert-danger').html('Please enter a blood sample title').slideDown()
					setTimeout(() => $('#alert').toggleClass('alert-danger').slideUp(), 3000)
					$('#form-name').focus()
					return
				}
				$('#add-btn').prop('disabled', true).html('Adding...')
				$.ajax({
					url: window.location.href,
					type: "POST",
					data: {
						title: title,
						type: $('#form-type').val(),
						rhd: $('#form-rhd').val(),
						action: 'add'
					},
					success: (resp) => {
						if(resp == 1) {
							$('#form-name').val('')
							$('#alert').toggleClass('alert-success').html('Sample Added!').slideDown()
							setTimeout(() => $('#alert').toggleClass('alert-success').slideUp(), 3000)
							$('#add-btn').prop('disabled', false).html('Add Another')
						} else {
							$('#alert').toggleClass('alert-danger').html('Something went wrong...').slideDown()
							setTimeout(() => $('#alert').toggleClass('alert-danger').slideUp(), 3000)
							$('#add-btn').prop('disabled', false).html('Try Again')
						}
					},
					error: (resp) => {
						alert('Something went wrong... try again')
						window.location.reload()
					}
				})
			}
		</script>

	</body>
</html>