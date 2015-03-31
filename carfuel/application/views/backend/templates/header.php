<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>CarFuel - <?= $page_title; ?></title>
	
	<!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('public/images/favicon')?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('public/images/favicon')?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('public/images/favicon')?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('public/images/favicon')?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('public/images/favicon')?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('public/images/favicon')?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('public/images/favicon')?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('public/images/favicon')?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public/images/favicon')?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('public/images/favicon')?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('public/images/favicon')?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('public/images/favicon')?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/images/favicon')?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url('public/images/favicon')?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- FAVICON end -->

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