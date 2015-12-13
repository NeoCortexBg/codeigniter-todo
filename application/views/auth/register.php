

<form class="form-signin" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
	<h1 class="form-signin-heading">Register</h1>
	<?php echo validation_errors(); ?>
	<input type="text" class="form-control" placeholder="Email address" required="required" name="email" value='<?php echo set_value('email'); ?>'>
	<input type="password" class="form-control" placeholder="Password" required="required" name="password">
	<input type="password" class="form-control" placeholder="Confirm password" required="required" name="confirm_password">
	<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
	<p></p>
	<p class="text-center">or</p>
	<a class="btn btn-lg btn-default btn-block" href="/login">Login</a>
</form>