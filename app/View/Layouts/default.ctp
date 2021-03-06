<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Anthony Inman Projects</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

<?php
	$develop = true;
	if($develop):
?>
	<link rel="stylesheet/less" type="text/css" href="<?php echo $this->webroot ?>css/styles.less"  />
	<script type="text/javascript">
		less = {
			env: "development", // or "production"
			poll: 1000,         // when in watch mode, time in ms between polls - add '#!watch' to url to enable or less.watch(); in console
			dumpLineNumbers: "mediaQuery", // or "mediaQuery" or "all"
		};
	</script>
	<script src="<?php echo $this->webroot ?>js/less-1.4.1.min.js"></script>
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>css/styles.min.css" />
<?php endif ?>
	
	
	<!-- Le Scripts -->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="<?php echo $this->webroot ?>js/bootstrap.min.js"></script>
	<script src="<?php echo $this->webroot ?>js/custom.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
	
	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->webroot ?>ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->webroot ?>ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->webroot ?>ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo $this->webroot ?>ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="<?php echo $this->webroot ?>ico/favicon.png">
	
	<!-- Google Analytics -->
	<!-- /Google Analytics -->
</head>

<body>
	<div id="header" class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- Mobile Menu Button -->
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- /Mobile Menu Button -->

				<?php echo $this->Html->link($this->Html->image('logo.png'),'/',array('escape'=>false,'class'=>'brand')) ?>

				<div class="hidden-print nav-collapse collapse pull-right">
					<ul id="menu" class="nav">
						<li class=""><?php echo $this->Html->link('Home','/') ?></li>
						<li><?php echo $this->Html->link('Subcontractors','/subcontractors') ?></li>
						<?php if(Authsome::get('Role.name') == 'Admin'): ?>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="admin_dropdown">Admin <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link('Users','/admin/users') ?></li>
								<li><?php echo $this->Html->link('Projects','/admin/projects') ?></li>
								<li><?php echo $this->Html->link('Subcontractors','/admin/subcontractors') ?></li>
								<li><?php echo $this->Html->link('Daily Reports','/admin/dailies') ?></li>
								<li><?php echo $this->Html->link('Inspections','/admin/inspections') ?></li>
								<li><?php echo $this->Html->link('SWPPPs','/admin/swpps') ?></li>
							</ul>
						</li>
						<?php endif ?>
						<?php if(Authsome::get('email') == 'guest@greyback.net'): ?>
							<li class=""><?php echo $this->Html->link('Login','/users/login') ?></li>
							<li class=""><?php echo $this->Html->link('Register','/users/register') ?></li>
						<?php else: ?>
							<li class=""><?php echo $this->Html->link('Change Password','/users/password') ?></li>
							<li class=""><?php echo $this->Html->link('Logout','/users/logout') ?></li>
						<?php endif ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<div class="row-fluid">
			<?php echo $content_for_layout ?>
		</div>
	</div>

	<div id="footer">
		<div class="container">
			<div class="row-fluid">
				<div class="span12 text-center">
					<p>&copy;<?php echo date('Y') ?> GreyBack Labs, LLC</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
