<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Todo on Codeigniter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<link href="/css/style.css" media="screen" rel="stylesheet" type="text/css">

		<link href="/img/todo.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">

		<!-- Scripts -->
		<!--[if lt IE 9]><script type="text/javascript" src="/js/html5shiv.min.js"></script><![endif]-->
		<!--[if lt IE 9]><script type="text/javascript" src="/js/respond.min.js"></script><![endif]-->
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	</head>
	<body class='<?php echo (isset($bodyClass)) ? $bodyClass : '' ;?>'>
		<nav class="navbar-top navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Todo</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="/projects">Projects</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/login">Login</a></li>
						<li><a href="/logout">Logout</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		<div class="container-fluid">

		<?php $this->view('partial/session');?>

		<?php echo $content;?>

		</div> <!-- /container -->
		<footer class='footer'>
			<div class="container-fluid">
				<p>&copy; <?php echo date('Y');?> by Martin Marinov</p>
			</div>
		</footer>
	</body>
</html>
