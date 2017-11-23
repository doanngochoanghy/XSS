<h1><?php echo "Send Message"; ?></h1>
<?php //echo validation_errors(); ?>
<?php echo form_open('Message/send_message'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<label>To</label>
			<input type="text" class="form-control" name="receiver_username" value="" required="">
		</div>
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" name="title" placeholder="Write title here" value="" required="">
		</div>
		<div class="form-group">
			<label>Content</label>
			<input type="text" class="form-control" name="content" placeholder="Write message here" value="" required="">
		</div>
		<div class="form-group">
			<div class="col-md-12 col-md-offset-0">
				<button type="submit" class="btn btn-warning">Send</button>
				<button type="reset" class="btn btn-danger disable">Cancel</button>
			</div>
		</div>
	</div>
</div>
<?php form_close(); ?>
