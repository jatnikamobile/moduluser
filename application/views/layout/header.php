
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.6">
	<title><?php if(isset($page)):?>
			<?php echo $page;?> |
		<?php endif;?>
		<?php echo APP_NAME;?></title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

	<!-- Bootstrap core CSS -->
	<link href="<?php echo  base_url('assets/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo  base_url('assets/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables.net/css/jquery.dataTables.css');?>">

	<link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="image/gif" sizes="16x16">
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
</head>
<body>
<div class="navbar-top">
	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand " href="<?php echo base_url('dashboard');?>">
			<img src="<?php echo base_url('assets/images/thumb/logo.png');?>" width="30" height="30" class="d-inline-block align-top" alt="">
			Modul Master</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Admin
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="<?php echo base_url('login/logout');?>">Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>
<div class="navbar-bottom">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light">
			<ul class="nav">
				<li class="nav-item">
					<div class="nav-link active"><i class="fa fa-tachometer"></i>
						<a href="<?php echo base_url('dashboard');?>">Dashboard</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-list"></i> Master
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url('doctors');?>">Dokter</a>
						<a class="dropdown-item" href="<?php echo base_url('bangsal');?>">Bangsal</a>
						<a class="dropdown-item" href="<?php echo base_url('kelas');?>">Kelas</a>
						<a class="dropdown-item" href="<?php echo base_url('kodekelas');?>">Kode Kelas</a>
						<a class="dropdown-item" href="<?php echo base_url('poliklinik');?>">Poliklinik</a>
						<a class="dropdown-item" href="<?php echo base_url('unit');?>">Unit/Lainnya</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user"></i> Users
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url('otoritas/user');?>">Otoritas User</a>
						<a class="dropdown-item" href="<?php echo base_url('otoritas/depo');?>">Otoritas Depo</a>
						<a class="dropdown-item" href="<?php echo base_url('otoritas/rawat');?>">Otoritas Rawat Inap</a>
				</div>
				</li>
			</ul>
		</nav>
	</div>
</div>
