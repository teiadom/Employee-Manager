	<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
echo '<h2 style: align="center">REGISTERED TRAINEES</h2>';
require_once ('mysql_connect.php');
	
// Make the query:
/*$q = "SELECT * FROM employee WHERE employee.user_id = '$emp';";*/	
$q = "SELECT * FROM trainee";	
$r = mysql_query ($q,$dbc);

// Count the number of returned rows:
$num = mysql_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Table header.
	echo '<table align="center" cellspacing="3" cellpadding="3" width="100%" class="delTable">
	<thead class="label3">
	<tr>
		<td align="left">S/N</td>
		<td align="left"><b>Surname</b></td>
		<td align="left"><b>Other(s)</b></td>
		<td align="left"><b>Course</b></td>
		<td align="left"><b>Month/Yr</b></td>
		<td align="left"><b>Phone</b></td>
		<td align="left"><b>Mail</b></td>
		<td align="left"><b>Place of Work</b></td>
		<td align="left"><b>City</b></td>
	</tr>
	<thead>
';

	// Fetch and print all the records:
	$c = 1;
	while ($row = mysql_fetch_array($r)) {
		echo ' <tbody><tr>
			<td align="left">' . $c . '</td>
			<td align="left">' . $row['tsurname'] . '</td>
			<td align="left">' . $row['tonames'] . '</td>
			<td align="left">' . $row['course'] . '</td>
			<td align="left">' . $row['moyr'] . '</td>
			<td align="left">' . $row['phone'] . '</td>
			<td align="left">' . $row['mail'] . '</td>
			<td align="left">' . $row['work'] . '</td>
			<td align="left">' . $row['tcity'] . '</td>
			
		</tr>
		</tbody>
		
		';
	$c++;
	}
	echo '<a style="font-size="30px"; font-color="blue"; href="excel_trainee.php" target="_blank">Export to Excel</a>';
	echo '&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="trainee_print.php" target="_blank"> Print Report</a> &nbsp;&nbsp;&nbsp;';
	echo '</table>';
	
	mysql_free_result ($r);	

} else { // If no records were returned.
	echo '<p class="error">There are currently no registered trainees.</p>';
}


mysql_close($dbc);


?>

