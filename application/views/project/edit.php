
<h1>Project: <?php echo $project['name'];?></h1>


<form class="form-inline" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
	<?php echo validation_errors(); ?>
	<input type="text" class="form-control" placeholder="Project name" required="required" name="name" value='<?php echo set_value('name') ?: $project['name']; ?>'>
	<button class="btn btn-success" type="submit">Save project</button>
</form>
