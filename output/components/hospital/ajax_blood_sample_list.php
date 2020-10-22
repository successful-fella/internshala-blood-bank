<div class="table-responsive">
	<table class="table table-hover text-left">
		<thead>
			<tr>
				<th>Sr. No.</th>
				<th>Blood Sample Title</th>
				<th>Blood Type</th>
				<th>Date Added</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if(empty($samples)): ?>
				<tr>
					<td colspan="5">Nothing to show :(</td>
				</tr>
			<?php endif; ?>
			<?php $sr = 1; foreach($samples as $sample): ?>
				<tr>
					<td><?= $sr ?>.</td>
					<td><?= $sample->sample_name ?></td>
					<td><?= $sample->sample_type . $sample->sample_rhd ?></td>
					<td><?= date_format(date_create($sample->date_added), 'd/m/Y') ?></td>
					<td>
						<i class="text-info fa fa-pen" onclick="notIncluded()" style="cursor: pointer;"></i> &nbsp;
						<i class="text-danger fa fa-trash" onclick="notIncluded()" style="cursor: pointer;"></i>
					</td>
				</tr>
			<?php $sr++; endforeach; ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	const editSample = () => {
		alert('This action is not completed for demo')
	}

	const deleteSample = () => {
		alert('This action is not completed for demo')
	}
</script>