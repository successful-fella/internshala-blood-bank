<div class="tab-pane active" id="add">
	<div class="container card">
		<div class="card-header mt-4">
			<h3>Add New Blood Sample</h3>
		</div>
		<div class="alert" role="alert" id="alert" style="display: none"></div>
		<div class="card-body">
			<div class="form-group">
				<label for="form-name">Blood Sample Title</label>
				<input type="text" class="form-control" id="form-name" placeholder="Ex. Diabetic Type A Person Blood for Research Purpose">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="form-type">Blood Type</label>
						<select class="form-control" id="form-type">
							<option>A</option>
							<option>B</option>
							<option>AB</option>
							<option>O</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="form-rhd">Blood RhD</label>
						<select class="form-control" id="form-rhd">
							<option>+</option>
							<option>-</option>
						</select>
					</div>
				</div>
			</div>
			<button class="btn btn-primary btn-round btn-lg" onclick="addSample()" id="add-btn">Add Blood Sample</button>
		</div>
	</div>
</div>