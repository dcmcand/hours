
	<div class="container">
	
<?php
#print_r($wages);
echo "<div class='head'><h1> Pay Period " . $wages['0']['pay_period'] . "</h1></div><hr/>";
?>
<div>
<div class='col-md-6'>
<h2>Summary</h2>
<?php
echo "Total Wages paid during this pay period: $" . $totals['0']['total_wages'] . "<br/>";
echo "Total Hours worked during this pay period: " . $totals['0']['total_hours'] . "<br/>";
echo "Average hours worked per employee during this pay period: " . $totals['0']['avg_hours'];
?>
<?php
					foreach($summary_by_type as $s):
						echo "<h2>";
						switch($s['type']){
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
						echo "</h2>
					Total wages paid in this pay period: $" . $s['total_wages'] . "<br/>
					Total hours worked in this pay period: " . $s['total_hours']. " <br/>
					Avg hours worked in this pay period: ".$s['avg_hours']." <br/>";
					endforeach;	
				?>
<br/>
<br/>
<button id="details">Details</button>
</div>
<div class="col-md-6" id="details_table">
<table class='table table-striped' border=1>

	<tr>
		<th>Employee</th>
		<th>Hours</th>
		<th>Wages</th>
		<th>Type</th>
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
			<form method='post' action='" . site_url($edit)."'>
			<input type='hidden' name='idShift' value='".$w['idShift']."'/>
			<input type='hidden' name='pay_period' value='".$w['pay_period'] . "'/>
			<input type='hidden' name='type_of_search' value='pay'/>
			<input class='btn btn-warning' type='submit' value='Edit'/>
			</form>
			</td>";
		echo "<td>
			<form method='post' id='delete_data' action='" . site_url($delete)."'>
			<input type='hidden' name='pay_period' value='".$w['pay_period'] . "'/>
			<input type='hidden' name='type_of_search' value='pay'/>
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
