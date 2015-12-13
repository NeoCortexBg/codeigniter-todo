
<form class="form-signin" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
	<h1 class="form-signin-heading">Login</h1>
	<?php echo validation_errors(); ?>
	<input type="text" class="form-control" placeholder="Email address" required="required" name="email" value='<?php echo set_value('email'); ?>'>
	<input type="password" name="password" required="required" placeholder="Password" class="form-control">
	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	<p></p>
	<p class="text-center">or</p>
	<a class="btn btn-lg btn-default btn-block" href="/register">Register</a>
</form>
