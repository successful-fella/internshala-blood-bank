<!DOCTYPE html>
<html lang="en">

	<?php $this->load->view('components/head', array('title' => 'Internshala Blood Bank')) ?>

	<body class="profile-page sidebar-collapse">

		<?php $this->load->view('components/nav') ?>

		<div class="wrapper">

			<div class="page-header clear-filter page-header-small" filter-color="orange">
				<div class="page-header-image" data-parallax="true" style="background-image:url('assets/img/bg5.webp');">
				</div>
				<div class="container">
					<h1 class="title">Welcome to Internshala Blood Bank</h1>
					<p class="category">Internshala Blood Bank allows you to request a blood sample from trusted hospitals.</p>
					<div class="content">
						<div class="social-description">
							<h2><?= $samples_count ?></h2>
							<p>Blood Samples</p>
						</div>
						<div class="social-description">
							<h2><?= $hospitals_count ?></h2>
							<p>Hospital</p>
						</div>
						<div class="social-description">
							<h2><?= $delivered ?></h2>
							<p>Samples Delivered</p>
						</div>
						<a href="request-blood">
							<button class="btn btn-primary btn-round btn-lg">Request Blood Sample</button>
						</a>
					</div>
				</div>
			</div>


			<div class="section">
				<div class="container">
					<h3 class="title">How it Goes?</h3>
					<div class="card card-nav-tabs card-plain">
						<div class="card-header card-header-primary">
							<div class="nav-tabs-navigation">
								<div class="nav-tabs-wrapper">
									<ul class="nav nav-tabs justify-content-center" data-tabs="tabs">
										<li class="nav-item">
											<a class="nav-link active" href="#step1" data-toggle="tab">Step 1</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#step2" data-toggle="tab">Step 2</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#step3" data-toggle="tab">Step 3</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-body ">
							<div class="tab-content text-center">
								<div class="tab-pane active" id="step1">
									<p>See all blood sample available on website using Request Blood button on navigation or click <a href="request-blood">here</a></p>
								</div>
								<div class="tab-pane" id="step2">
									<p>See details such as blood type, hospital and make a request by tapping request button. If you're not signed in, we will take you to signin/signup page, please do that first and then make request.</p>
								</div>
								<div class="tab-pane" id="step3">
									<p>That's it! Your request will be received by Hospital! If you're an hospital staff, you can have yourself listed on our platform using signin/sigup available on navbar or click <a href="sign-in/hospital">here</a>.</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>


			<div class="section color-section">
				<div class="container">
					<h3 class="title">Hospitals With Us</h3>
					<div class="row text-center">

						<?php foreach($hospitals as $hospital): ?>
							<div class="col-md-4 col-lg-4">
								<div class="card">
									<img class="card-img-top" src="<?= $hospital->hospital_feature_image ?>" onerror="this.src = 'assets/img/bghospital.webp'">
									<div class="card-body">
										<p class="card-title"><?= $hospital->hospital_name ?></p>
										<p class="text-muted"><?= $hospital->hospital_address ?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
					<div class="row justify-content-center">
						<a href="sign-in/hospital">
							<button class="btn btn-primary btn-lg btn-round">Sign Up as an Hospital</button>
						</a>
					</div>
				</div>
			</div>

			<div class="section">
				<div class="container">
					<h3 class="title">Internshala Blood Bank Goal</h3>
					<h5 class="description">
						<code>Internshala is a dot com business with the 💖 of dot org</code>
						<br><br>
						We are helping everyone in need of blood samples to connect with various hospitals. The hospitals will act on your request as quick as possible and deliver you the blood sample. 🙂 
					</h5>
				</div>
			</div>
			
			<?php $this->load->view('components/footer') ?>

		</div>

		<?php $this->load->view('components/scripts') ?>

	</body>
</html>