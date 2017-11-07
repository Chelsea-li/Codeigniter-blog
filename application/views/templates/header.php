<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/united/bootstrap.min.css" rel="stylesheet" integrity="sha384-pVJelSCJ58Og1XDc2E95RVYHZDPb9AVyXsI8NoVpB2xmtxoZKJePbMfE4mlXw7BJ" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-static-top">
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
					<li><a href="<?php echo site_url(); ?>users/register">Sign Up</a></li>
				<!-- 	<li><a href="<?php echo site_url(); ?>categories/create">Create Category</a></li> -->
					<li><a href="<?php echo site_url(); ?>posts/create">Create New Post</a></li>
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
