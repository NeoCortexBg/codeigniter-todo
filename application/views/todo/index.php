

<?php $this->view('form/filter', array('filter' => $filter, 'projects' => $projects, 'todo_statuses' => $todo_statuses));?>

<?php $this->view('todo/todo-form', array('projects' => $projects, 'todo_statuses' => $todo_statuses));?>

<?php
if(!empty($todos)) {
	foreach($todos as $t) {
		$this->view('todo/todo-form', array('todo' => $t, 'projects' => $projects, 'todo_statuses' => $todo_statuses));
	}
}

