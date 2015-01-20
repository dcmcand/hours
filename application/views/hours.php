
<div class='container'>
	<div id="search" class='col-md-6'>
	
			<h1>Search Database</h1>
			<h2>Search By Employee</h2>
<?php $url = array('hours', 'search_by_employee', $year); ?>
			<form method="post" action="<?php echo site_url($url)?>">
					<select name="idEmployee">
						<?php foreach ($name as $n):
						echo "<option value=" . $n['idEmployee'] . ">" . $n['first_name'] . " " .$n['last_name'] . '</option>
						'; 
						
						endforeach;?>
					</select> 
					
					<input name="submit"type="submit">
				</form>
			
			<h2>Search by Type of Hours</h2>
<?php $url1 = array('hours', 'search_by_type', $year); ?>
			<form method="post" action=" <?php echo site_url($url1)?>">
					<select name="type">
						<option value="pt">Part Time</option>
						<option value="circ">Circulation Substitute</option>
						<option value="ref">Reference Substitute</option>
					</select>
					<input name="submit" type="submit">
				</form>
			
			<h2>Search by Pay Period</h2>
<?php $url2 = array('hours', 'search_by_pay_period', $year); ?>
			<form method="post" action="<?php echo site_url($url2)?>">
					Please enter a pay period: 
					<select name="pay_period">
					<?php 
						foreach ($period as $p):
							echo "<option>" . $p['pay_period'] . "</option>
							"; 
						endforeach;
					?>
					</select>
					<input type="submit" name="submit">
				</form>
				
				</div>
				
				<div id="summary" class="col-md-6">
				<h1>Summary</h1>
				<h2>Totals for <?php echo $year ?></h2>
					Total wages paid to date: <?php echo "$" . $totals['0']['total_wages'];?> <br/>
					Total hours worked to date: <?php echo $totals['0']['total_hours'];?> <br/>
					Avg hours worked to date: <?php echo $totals['0']['avg_hours'];?> <br/>
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
					Total wages paid to date: $" . $s['total_wages'] . "<br/>
					Total hours worked to date: " . $s['total_hours']. " <br/>
					Avg hours worked to date: ".$s['avg_hours']." <br/>";
					endforeach;	
				?>
				
				
				</div>	
		</div>	
	</body>
	
</html>

<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>






