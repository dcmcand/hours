
	<div class="container">
	<div class="left">
<?php

echo "<h1>";
switch($wages['0']['type']){
	case "pt":
		echo "Part Time Hours: <br/>";
		break;
	case "circ":
		echo "Circulation Substitute Hours: <br/>";
		break;
	case "ref":
		echo "Reference Substitute Hours: <br/>";
		break;
	}
echo "</h1>";
echo "<h2>Summary</h2>"	;
echo "Total ";
switch($wages['0']['type']){
	case "pt":
		echo "Part Time";
		break;
	case "circ":
		echo "Circulation Substitute";
		break;
	case "ref":
		echo "Reference Substitute";
		break;
	}
echo " wages paid this year: $" . $totals['0']['total_wages'] . "<br/>";

echo "Total ";
switch($wages['0']['type']){
	case "pt":
		echo "Part Time";
		break;
	case "circ":
		echo "Circulation Substitute";
		break;
	case "ref":
		echo "Reference Substitute";
		break;
	}
echo " hours worked this year: " . $totals['0']['total_hours'] . "<br/>";
echo "Average ";
switch($wages['0']['type']){
	case "pt":
		echo "Part Time";
		break;
	case "circ":
		echo "Circulation Substitute";
		break;
	case "ref":
		echo "Reference Substitute";
		break;
	}
echo" hours per pay period worked this year: " . $totals['0']['avg_hours'];
?>
<br/>
<br/>
<button id="details">Details</button><br/>

</div>
<div id="details_table" class="center">
<table border=1>
	<tr>
		<th>Employee</th>
		<th>Hours</th>
		<th>Wages</th>
		<th>Type of Hours</th>
		<th></th>
		<th></th>
	</tr>

<?php
$edit = array('hours','edit_data',$year);
$delete = array('hours','delete_data',$year);
	foreach($wages as $w):
		echo "<tr>
		<td>" . $w['first_name'] . " " . $w['last_name'] . "</td>
		<td> " . $w['hours'] . "</td>
		<td> $" . $w['wages'] . "</td>
		<td> ";
		switch($w['type']){
							case "pt":
								echo "Part Time";
								break;
							case "circ":
								echo "Circulation Substitute";
								break;
							case "ref":
								echo "Reference Substitute";
								break;
							};
		echo "</td>"; 
		echo "<td>
			<form method='post' action='" . site_url($edit) ."'>
			<input type='hidden' name='idShift' value='".$w['idShift']."'/>
			<input type='hidden' name='type_of_search' value='type'/>
			<input type='hidden' name='type' value='".$w['type'] . "'/>
			<input type='submit' value='Edit'/>
			</form>
			</td>";
		echo "<td>
			<form method='post' id='delete_data' action='" . site_url($delete)."'>
			<input type='hidden' name='type_of_search' value='type'/>
			<input type='hidden' name='type' value='".$w['type'] . "'/>
			<input type='hidden' name='idShift' value='".$w['idShift']."'/>
			<input type='button' class='delete' value='Delete'/>
			</form>
			</td>";
	endforeach;
?>
</table>


</div>
</div>
</body>
</html>
<script type='text/javascript'>
	$(document).ready(function () {
<?php echo $script; ?>
		$("#details").click(
		function(){
				$("#details_table").toggle();
			});
		$('.delete').click(
			function(){
				var conf = confirm("Are you sure?"); 
				if(conf){
					$(this).parent().submit();
				}
			});
	});
</script>

