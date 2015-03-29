<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>CarFuel - <?= $page_title; ?></title>

	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/style_mike_backend.css')?>">
	
</head>
<body>

	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand brand" href="<?= site_url() ?>/dashboard"><i class="fa fa-car"></i>  CarFuel</a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-right">
				    <li><p class="navbar-text header-text">Olá <?php echo ucfirst($user_email); ?>.</p></li>
				    <li><p class="navbar-text header-text-logout"><a href="<?= site_url() ?>/logout" class="navbar-link logout-button"><i class="fa fa-sign-out"></i> Sair</a></p></li>
				 </ul>
			</div>
		</div>
	</nav>
	

	<div class="container">