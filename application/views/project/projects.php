
<h1>Projects</h1>


<form class="form-inline" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
	<?php echo validation_errors(); ?>
	<input type="text" class="form-control" placeholder="Project name" required="required" name="name" value='<?php echo set_value('name'); ?>'>
	<button class="btn btn-success" type="submit">Add project</button>
</form>

<p></p>

<?php if(!empty($projects)) { ?>
<table class="table table-hover table-condensed table-striped">
			<tr>
				<th>#</th>
				<th>Id</th>
				<th>Name</th>
				<th></th>
			</tr>
			<?php
			$i = 0;
			foreach($projects as $p) { ?>
			<tr>
				<td><?php echo ++$i;?></td>
				<td><?php echo $p['project_sid'];?></td>
				<td><?php echo $p['name'];?></td>
				<td>
					<a href="/project/edit/<?php echo $p['project_sid'];?>">Edit</a>
					<form method="post" action="/project/delete/<?php echo $p['project_sid'];?>" class="form-inline form-delete">
						<button class="btn btn-danger btn-xs">Delete</button>
					</form>
				</td>
			</tr>
			<?php } ?>
</table>
<?php } ?>

<script type='text/javascript'>
	$(document).ready(function(){
		$('form.form-delete').submit(function(e){
			if(!confirm("Delete project ?")) {
				e.preventDefault();
			}
		});
	});
</script>
