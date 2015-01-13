<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!doctype html>
<html>
	<head>
		<title>Lebanon Libraries</title>
		<script type="text/javascript" language="Javascript" 
				src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js">
		</script>
		
		<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/style.css'>
		
	</head>
	<body>
	<div class="nav">
	<a href='<?php echo base_url(); ?>'> Home </a> | <a href='<?php echo base_url(); ?>hours/add_data/'> Add New Data</a> | <a href='<?php echo site_url(array('hours','older')) ?>'> View Older </a>
	</div> 
