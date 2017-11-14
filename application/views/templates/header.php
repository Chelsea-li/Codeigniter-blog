<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<link href="https://bootswatch.com/3/superhero/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover-min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
	<script src="http://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="<?php echo base_url(); ?>">CI Blog</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="<?php echo site_url(); ?>about">About</a></li>
					<li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
					<li><a href="<?php echo base_url(); ?>categories">Category</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if($this->session->userdata('logged_in')): ?>
						<li><a href="<?php echo site_url(); ?>posts/create">Create New Post</a></li>
						<li><a href="<?php echo site_url(); ?>users/logout">Log Out</a></li>
					<?php endif; ?>	
					<?php if(!$this->session->userdata('logged_in')): ?>		
						<li><a href="<?php echo site_url(); ?>users/register">Sign Up</a></li>
						<li><a href="<?php echo site_url(); ?>users/login">Log In</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
    </nav>
    <div class="container">
		<?php if($this->session->flashdata('user_registered')): ?>
			<?php echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('user_registered').'</div>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_created')): ?>
			<?php echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('post_created').'</div>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_updated')): ?>
			<?php echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('post_updated').'</div>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_deleted')): ?>
		<?php echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('post_deleted').'</div>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_succeed')): ?>
		<?php echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('login_succeed')." <strong>".$this->session->userdata('username').'</strong></div>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_failure')): ?>
		<?php echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('login_failure').'</div>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('log_out')): ?>
			<?php echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('log_out').'</div>'; ?>
		<?php endif; ?>
