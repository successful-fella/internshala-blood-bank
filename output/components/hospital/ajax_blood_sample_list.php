<div class="table-responsive">
	<table class="table table-hover">
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
			<tr>
				<td>1.</td>
				<td>KP Ka blood sample</td>
				<td>B+</td>
				<td>20/02/19</td>
				<td>
					<i class="text-info fa fa-pen"></i> &nbsp;
					<i class="text-danger fa fa-trash"></i>
				</td>
			</tr>
			<tr>
				<td>1.</td>
				<td>KP KP Ka blood sample KP Ka blood sample Ka blood sample</td>
				<td>B+</td>
				<td>20/02/19</td>
				<td>
					<i class="text-info fa fa-pen" onclick="editSample(1)" style="cursor: pointer;"></i> &nbsp;
					<i class="text-danger fa fa-trash" onclick="deleteSample(1)" style="cursor: pointer;"></i>
				</td>
			</tr>
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