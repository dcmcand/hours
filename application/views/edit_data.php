<!doctype html>
<html>
<head>

<script type="text/javascript" language="Javascript" 
		src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js">
</script>
<title>Edit Data</title>
</head>

<?php $url = array('hours', 'edit_data_success',$year); ?>
	<body>
		<h4>Edit Data</h4>
		<Form method="Post" action="<?php echo site_url($url)?>">
			<?php foreach ($shift as $s):
				echo '<input type="hidden" name="idShift" value="' . $s["idShift"] . '" >';
				endforeach;
				?>
			Employee:<select name="idEmployee" >
				<?php 
					foreach ($name as $n):
						foreach($shift as $s):
							if ($n['idEmployee']===$s['idEmployee']){
								echo "<option value='".$n['idEmployee']. "' selected> " . $n['first_name'] . " " . $n['last_name'] . "</option>";
							} else {

								echo "<option value='".$n['idEmployee']. "' > " . $n['first_name'] . " " . $n['last_name'] . "</option>";
							};
						endforeach;
					endforeach;
					

				?>

		</select>
				Pay Period: <input class="pay_period" max="53" min="1" type="number" name="pay_period"  value=<?php echo $shift[0]['pay_period'] ?> required/>
				Hours:<input class="hours" type="number" max="99" step=".25" name="hours" value=<?php echo $shift[0]['hours'] ?> required/>
				Wages:<input class="wages" type="number" max="9999.99" step=".01" name="wages" value=<?php echo $shift[0]['wages'] ?> required/>
				Type:<select class="type" name="type">
					<option value='pt' <?php if ($shift[0]['type']==='pt'){echo "selected";}; ?> >Part Time</option>
					<option value="circ" <?php if ($shift[0]['type']==='circ'){echo "selected";}; ?>> Circulation Substitute</option>
					<option value="ref" <?php if ($shift[0]['type']==='ref'){echo "selected";}; ?>>Reference Substitute</option>
				</select>
				<input type='hidden' name='type_of_search' value='<?php echo $type_of_search; ?>'/>
				<input type='hidden' name='<?php 
					switch($type_of_search){ 
						case 'employee': 
							echo 'idEmployee'; 
							break; 
						case 'pay': 
							echo 'pay_period'; 
							break; 
						case 'type': 
							echo'type'; 
							break;
					};
					?>' value = '<?php 
					switch($type_of_search) { 
						case 'employee': 
							echo $idEmployee; 
							break; 
						case 'pay': 
								echo $pay_period; 
							break; 
						case 'type': 
							echo $type; 
							break;
					};
				?>'/>
			<input type='submit' value='Edit'/>
		</form>
	
		
	
	</body>
	</div>
</html>				

<script type="text/javascript">
    $(document).ready(function() {
		
		$("#myform").validate();
    });
</script>
