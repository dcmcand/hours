

<div class="center">
<?php
//print_r($test);
//echo "<br/>";

echo $message . "<br/>";
$this->load->model('hours_model');
	echo "<table>
		<tr>
		<th>Name</th>
		<th>Pay Period</th>
		<th>Wages</th>
		<th>Hours</th>
		<th>Type</th>
		</tr>";
	foreach($test as $t):
		$data['idEmployee']=$t['emp'];
		$name=$this->hours_model->get_one_name($data);
		//print_r($name);
		echo "
			<tr>
			<td>". $name[0]['first_name'] . " " . $name[0]['last_name'] ."</td>
			<td> ". $t['pay_period'] ."</td>
			<td> ". $t['wages'] ."</td>
			<td>". $t['hours'] . "</td>
			<td> ". $t['type'] . " </td>
			</tr>";
	endforeach;
	echo "</table>";
?>

<a href='<?php echo base_url();?>hours/add_data'> Add More Data </a>
</div>
</body>
</html>
