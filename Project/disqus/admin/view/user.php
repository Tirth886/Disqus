<div class="container mt-5">
	<div class="row mt-5">
		<div class="col-md-12 col-sm-12 mt-5 justify-content-center cstm_card_home">
			
			<table class="table" cellpadding="10">
				<thead>
					<tr align="center">
						<th>ID#</th>
						<th>Name</th>
						<th>email</th>
						<th>Contact</th>
						<th>Password</th>
						<th>Profile</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						while($data = $rawData->fetch_object()){
					?>
					<tr align="center">
						<td><?php echo @$i; ?></td>
						<td><?php echo @$data->username; ?></td>
						<td><?php echo @$data->useremail; ?></td>
						<td><?php echo @$data->usercontact; ?></td>
						<td><?php echo @$data->userpassword; ?></td>
						<td><img src="../../server/utilites/profile/<?php echo @$data->picture; ?>" height="50" width="50"></td>
						<td>
							<a class="btn btn-danger btn-sm" href="?id=<?php echo @$data->id; ?>&page=<?php echo(@$_GET['page']) ?>&limit=<?php echo(@$_GET['limit']) ?>&offset=<?php echo(@$_GET['offset']) ?>">Delete</a>
						</td>
					</tr>
					<?php 
						$i++;
						}
					?>
				</tbody>
			</table>
			<div class="" style="display: flex;justify-content: flex-end;">
				<?php include_once __DIR__.'/pagenation.php'; ?>
			</div>
		</div>
	</div>
</div>