<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!doctype html>
<html lang="en">
	<head>
		<title>Lebanon Libraries</title>
		<script type="text/javascript" language="Javascript" 
				src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js">
		</script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href='<?php echo site_url(array("assets","style.css"));?>'>
		
	</head>
	<body>
	<nav class='navbar'>
		<div class='container'>
			<ul class="nav nav-tabs">
				<li role='presentation'><a href='<?php echo base_url(); ?>'> Home </a> </li>
				<li role='presentation'><a href='<?php echo base_url(); ?>hours/add_data/'> Add New Data</a></li>
				<li class="dropdown">
					<a class='dropdown-toggle' data-toggle='dropdown' role='button' href='#' aria-expanded="false"> View Older <span class='caret'></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href='#'>1</a></li>
						<li><a href='#'>1</a></li>
						<li><a href='#'>1</a></li>
					</ul>
				</li>
			</ul>
		</div> 
	</nav>
