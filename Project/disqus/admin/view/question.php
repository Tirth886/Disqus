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
						<th>Question</th>
						<th>Catagory</th>
						<th>Date</th>
						<th>Code</th>
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
						<td><?php echo @$data->question; ?></td>
						<td><?php echo @$data->catagory; ?></td>
						<td><?php $date = date_create(@$data->date); echo @date_format($date, 'd/m/Y g:ia'); ?></td>
						<td><?php echo @$data->code; ?></td>
						<td>
							<a class="btn btn-danger btn-sm pl-4 pr-4" href="?id=<?php echo @$data->id; ?>&page=<?php echo(@$_GET['page']) ?>&limit=<?php echo(@$_GET['limit']) ?>&offset=<?php echo(@$_GET['offset']) ?>">Delete</a>
							<a href="?vid=<?php echo @$data->code; ?>&page=replies&limit=<?php echo @$_GET['limit']; ?>&offset=<?php echo @$_GET['offset'] == "" ? 0 : $_GET['offset']; ?>" class="btn btn-primary btn-sm">View</a>
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