
	<div class="container">
	
<?php
echo "<div class='head'><h1 >".$wages['0']['first_name'] . " " . $wages['0']['last_name'] . "</h1></div><hr/>";
?>
<div>
<div class="col-md-6">
<h2>Summary</h2>
<?php
echo "Total wages paid this year: $" . $totals['0']['total_wages'] . "<br/>";
echo "Total hours worked this year: " . $totals['0']['total_hours'] . "<br/>";
echo "Average hours per pay period worked this year: " . $totals['0']['avg_hours'];
?>
<br/>
<br/>
<button id="details">Details</button><br/>
</div>
<div class="col-md-6" id="details_table">
<table class='table table-striped' border=1>
	<tr>
		<th>Pay Period</th>
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
		<td>" . $w['pay_period'] . "</td>
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
			<input type='hidden' name='type_of_search' value='employee'/>
			<input type='hidden' name='idEmployee' value='".$w['idEmployee'] . "'/>
			<input class='btn btn-warning' type='submit' value='Edit'/>
			</form>
			</td>";
		echo "<td>
			<form method='post' id='delete_data' action='" . site_url($delete) ."'>
			<input type='hidden' name='type_of_search' value='employee'/>
			<input type='hidden' name='idEmployee' value='".$w['idEmployee'] . "'/>
			<input type='hidden' name='idShift' value='".$w['idShift']."'/>
			<input type='button' class='delete btn btn-danger' value='Delete'/>
			</form>
			</td>";
	endforeach;
?>
</table>

</div>
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
