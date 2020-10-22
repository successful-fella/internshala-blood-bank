<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Sr. No.</th>
				<th>Receiver Name</th>
				<th>Sample Requested</th>
				<th>Sample Type</th>
				<th>Date Requested</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if(empty($requests)): ?>
				<tr>
					<td colspan="6">Nothing to show :(</td>
				</tr>
			<?php endif; ?>
			<?php $sr=1; foreach($requests as $request): ?>
				<tr>
					<td><?= $sr ?>.</td>
					<td><?= $request->receiver_name ?></td>
					<td><?= $request->sample_name ?></td>
					<td><?= $request->sample_type . $request->sample_rhd ?></td>
					<td><?= date_format(date_create($request->date_added), 'd/m/Y') ?></td>
					<td>
						<i class="text-info fa fa-check" onclick="notIncluded()" style="cursor: pointer;"></i> &nbsp;
						<i class="text-danger fa fa-trash" onclick="notIncluded()" style="cursor: pointer;"></i>
					</td>
				</tr>
			<?php $sr++; endforeach; ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	const confirmRequest = () => {
		alert('This action is not completed for demo')
	}

	const deleteRequest = () => {
		alert('This action is not completed for demo')
	}
</script>