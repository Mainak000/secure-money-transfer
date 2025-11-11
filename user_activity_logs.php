<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">User Activity Logs</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="40%">
					<col width="15%">
					<col width="25%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th>Webpage</th>
						<th>IP Address</th>
						<th>Timestamp</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					$qry = $conn->query("SELECT * FROM `user_activity_logs` ORDER BY `timestamp` DESC LIMIT 1000");
					while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['username'] ?></td>
							<td><?php echo $row['webpage'] ?></td>
							<td><?php echo $row['ip_address'] ?></td>
							<td><?php echo date("Y-m-d H:i:s", strtotime($row['timestamp'])) ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.table').dataTable();
	})
</script> 