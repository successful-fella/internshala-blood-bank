<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
	<div class="container">
		<div class="navbar-translate">
			<a class="navbar-brand" href="./">Internshala Blood Bank</a>
			<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-bar top-bar"></span>
				<span class="navbar-toggler-bar middle-bar"></span>
				<span class="navbar-toggler-bar bottom-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="assets/img/blurred-image-1.jpg">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="./">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="request-blood">Request Blood</a>
				</li>
				<?php if($this->session->kp_receiver): ?>
					<li class="nav-item">
						<div class="nav-link dropdown">
							<span id="welcome-button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <?= $this->session->kp_receiver_name ?></span>
							<div class="dropdown-menu" aria-labelledby="welcome-button">
								<a class="dropdown-item" href="sign-out">Sign Out</a>
							</div>
						</div>
					</li>
				<?php elseif($this->session->kp_hospital): ?>
					<li class="nav-item">
						<div class="nav-link dropdown">
							<span id="welcome-button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <?= $this->session->kp_hospital_name ?></span>
							<div class="dropdown-menu" aria-labelledby="welcome-button">
								<a class="dropdown-item" href="hospital/dashboard">Dashboard</a>
								<a class="dropdown-item" href="sign-out">Sign Out</a>
							</div>
						</div>
					</li>
				<?php else: ?>
					<li class="nav-item">
						<div class="nav-link dropdown">
							<span id="signin-button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign In/Sign Up</span>
							<div class="dropdown-menu" aria-labelledby="signin-button">
								<a class="dropdown-item" href="sign-in/receiver">As a Receiver</a>
								<a class="dropdown-item" href="sign-in/hospital">As an Hospital</a>
							</div>
						</div>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>