<div class="form-group">
	<fieldset>
		<label class="control-label" for="readOnlyInput">From:</label>
		<p><?php echo($message['sender']); ?></p>
<div class="form-group">
	<fieldset>
		<label class="control-label" for="readOnlyInput">To:</label>
		<p><?php echo($message['receiver']); ?></p>
	</fieldset>
</div>
<div class="form-group">
	<fieldset>
		<label class="control-label" for="readOnlyInput">Title:</label>
		<p><?php echo($message['title']); ?></p>
	</fieldset>
</div>
<div class="form-group">
	<label for="exampleTextarea">Content:</label>
	<p><?php echo($message['message']); ?></p>
</div>
<?php if ($this->session->userdata('is_admin')):?>
	<div class="col-xs-1 col-xs-offset-1 ">
	<?php echo form_open(base_url().'message/Delete/'.$message['message_id'],'onsubmit="return confirm(\'Bạn có muốn xóa message này không?\')"'); ?>
		<?php echo form_button(array('name'=> 'delete','type'=> 'submit','content'=> 'Delete','class'=>'btn btn-danger'));?>
		<?php echo form_close(); ?></div>
<?php endif ?>
