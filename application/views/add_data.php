<script type="text/javascript" language="Javascript" 
		src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js">
</script>
		<div id="search" class='center'>
			
		<form class='form-inline' name="myform" method="post" action='<?php echo site_url("hours/add_data_success")?>'>
			<table class='table table-striped' id='mytable'>
				<tr>
				<td>Name</td> 
				<td>Pay Period</td>
				<td>Hours</td>
				<td>Wages</td>
				<td>Type</td>
				</tr>
				<tbody>
				<tr>
				<td>
					<select class="name form-control" name="shift[0][emp]">
						<?php foreach ($name as $n):
						echo "<option value=" . $n['idEmployee'] . ">" . $n['first_name'] . " " .$n['last_name'] . '</option>'; 
						endforeach;?>
					</select>
				</td>			
				<td>
					<input class="pay_period form-control" max="53" min="1" type="number" name="shift[0][pay_period]" required/>
				</td>
				<td>
					<input class="hours form-control" type="number" max="99" step=".25" name="shift[0][hours]" required/>
				</td>
				<td>
					<input class="wages form-control" type="number" max="9999.99" step=".01" name="shift[0][wages]" required/>
				</td>
				<td>
					<select class="type form-control" name="shift[0][type]">
						<option value="pt">Part Time</option>
						<option value="circ" selected>Circulation Substitute</option>
						<option value="ref">Reference Substitute</option>
					</select>
				</td>
				</tr>
				</tbody>
			</table>	
			<span id='add' class='glyphicon glyphicon-plus'></span><br/>
			
			<input type="submit" class='btn btn-default' value='Submit'/>
			</form>
			
			
			
		</div>
	</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
		var globalNewIndex = 0;
		$("#add").click(function() {
			$('#mytable tbody>tr:last').clone(true).insertAfter('#mytable tbody>tr:last');
			$('#mytable tbody>tr:last input').val('');
		var newIndex = globalNewIndex+1;
                var changeIds = function(i, val) {
                    return val.replace(globalNewIndex,newIndex);
                }
                $('#mytable tbody>tr:last input').attr('name', changeIds ).attr('id', changeIds );
                $('#mytable tbody>tr:last select').attr('name', changeIds ).attr('id', changeIds );
                $('#mytable tbody>tr:last select:first').focus();
                globalNewIndex++;
				
        });
		
		$("#myform").validate();
    });
</script>
