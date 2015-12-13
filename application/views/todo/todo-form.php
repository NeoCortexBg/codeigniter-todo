<?php

if(isset($todo)) {
	$todo_sid = $todo['todo_sid'];
	$priority = $todo['priority'];
	$project_sid = $todo['project_sid'];
	$todo_status_sid = $todo['todo_status_sid'];
	$text = $todo['text'];
	$submitText = "Save";
	$submitButtonClass = "primary";
	$dateCreated = dateSql(strtotime($todo['date_created']));
	$status = "status-" . $todo_statuses[$todo_status_sid];
} else {
	$todo_sid = null;
	$priority = null;
	$project_sid = null;
	$todo_status_sid = null;
	$text = null;
	$submitText = "Add";
	$submitButtonClass = "success";
	$dateCreated = null;
	$status = "";
}
?>

<div class="todo <?php echo $status;?>">
	<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" name="todo">
		<div class="left col-lg-1">
	        <?php echo form_hidden('todo_sid', $todo_sid);?>

			<div class="date-created">
				<label>
					<span class="date"><?php echo $dateCreated;?></span>
				</label>
			</div>
			<div class="priority">
				<label>
					<span class="label-name">Priority</span>
					<?php echo form_input('priority', $priority);?>
				</label>
			</div>
			<div class="project">
				<label>
					<span class="label-name">Project</span>
					<?php echo form_dropdown('project_sid', $projects, $project_sid);?>
				</label>
			</div>
			<div class="status">
				<label>
					<span class="label-name">Status</span>
					<?php echo form_dropdown('todo_status_sid', $todo_statuses, $todo_status_sid);?>
				</label>
			</div>
			<div class="submit">
				<button class="btn btn-sm btn-block btn-<?php echo $submitButtonClass;?>" type="submit"><?php echo $submitText;?></button>
			</div>
		</div>
		<div class="right col-lg-11">
			<textarea rows="5" cols="50"  name="text" ><?php echo html_escape($text);?></textarea>
		</div>
	</form>
	<div class="cleared"></div>
</div>
