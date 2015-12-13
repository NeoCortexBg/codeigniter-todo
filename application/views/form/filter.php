
<form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="get" name="filter">
	<div id='filter'>
	<div>
		<label>Order by
			<?php echo form_dropdown('filter[order_by]', array(
				'date_created' => "Date Created",
				'priority' => "Priority",
				'todo_status_sid' => "Status",
				'project_sid' => "Project",
			), isset($filter['order_by']) ? $filter['order_by'] : null );?>
		</label>
	</div>
	<div>
		<label>Order dir
		<?php echo form_dropdown('filter[order_dir]', array(
				'desc' => "Desc",
				'asc' => "Asc",
			), isset($filter['order_dir']) ? $filter['order_dir'] : null );?>
			</label>
	</div>
	<div>
		<label>Project
		<?php echo form_dropdown('filter[project_sid]', $projects, isset($filter['project_sid']) ? $filter['project_sid'] : null);?>
		</label>
	</div>
	<div>
		<label>Todo status
		<?php echo form_dropdown('filter[todo_status_sid]', array_replace(array('' => '--- Status ---'), $todo_statuses), isset($filter['todo_status_sid']) ? $filter['todo_status_sid'] : null);?>
		</label>
	</div>
	<div>
		<button type="submit">Filter</button>
	</div>
	</div>
</form>
