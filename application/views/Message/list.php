<table class="table table-striped table-hover table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>Sender</th>
			<th>Receiver</th>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($messages as $message):?>
			<tr>
				<td><?php echo $message['sender']; ?></td>
				<td><?php echo $message['receiver']; ?></td>
				<td><?php echo $message['title']; ?></td>
				<td>
					<a href="<?php echo base_url(); ?>Message/view/<?php echo $message['message_id']; ?>" class=" btn btn-primary btn-xs">view</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
