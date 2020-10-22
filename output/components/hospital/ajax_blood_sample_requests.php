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
			<tr>
				<td>1.</td>
				<td>Kawalpreet</td>
				<td>KP Ka blood sample</td>
				<td>B+</td>
				<td>20/02/19</td>
				<td>
					<i class="text-info fa fa-check"></i> &nbsp;
					<i class="text-danger fa fa-trash"></i>
				</td>
			</tr>
			<tr>
				<td>1.</td>
				<td>Kawalpreet</td>
				<td>KP Ka blood sample</td>
				<td>B+</td>
				<td>20/02/19</td>
				<td>
					<i class="text-info fa fa-check" onclick="confirmRequest(1)" style="cursor: pointer;"></i> &nbsp;
					<i class="text-danger fa fa-trash" onclick="deleteRequest(1)" style="cursor: pointer;"></i>
				</td>
			</tr>
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