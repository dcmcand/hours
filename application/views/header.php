<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!doctype html>
<html lang="en">
	<head>
		<title>Lebanon Libraries</title>
		<script type="text/javascript" language="Javascript" 
				src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href='<?php echo site_url(array("assets","style.css"));?>'>
		
	</head>
	<body>
	<nav class='navbar'>
		<div class='container'>
			<ul class="nav nav-pills">
				<li role='presentation'><a href='<?php echo base_url(); ?>'> Home </a> </li>
				<li role='presentation'><a href='<?php echo base_url(); ?>hours/add_data/'> Add New Data</a></li>
				<li class='dropdown'>
					<a href='#' data-toggle="dropdown" > View Other Years <span class='caret'></span></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<?php
							foreach ($years as $year ) {
								echo "<li role='presentation'><a href='" . site_url(array('hours','index',$year['Year'])) . "'>" . $year['Year'] . "</a></li>";
							}
						?>
					</ul>
				</li>
			</ul>
		</div> 
	</nav>

<div class='container-fluid'>
