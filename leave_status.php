<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
echo '<h2 style: align="center">Applied Leave</h2>';
require_once ('mysql_connect.php');

$emp = $_SESSION['user_id'];
		
// Make the query:
/*$q = "SELECT * FROM employee WHERE employee.user_id = '$emp';";*/	

					$usid = "SELECT employee_id, esname, eoname FROM employee WHERE user_id='$emp'";
					$idd = mysql_query($usid,$dbc) or die(mysql_error()." Error...");
					$roww = mysql_fetch_array($idd);

$q = "SELECT * FROM `leave` WHERE employee_id= " . $roww['employee_id']."";	
$r = mysql_query ($q,$dbc);

// Count the number of returned rows:
$num = mysql_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Table header.
	echo '<table align="center" cellspacing="3" cellpadding="3" width="100%" class="delTable">
	<thead class="label3">
	<tr>
		<td align="left"><b>Surname</b></td>
		<td align="left"><b>Other(s)</b></td>
		<td align="left"><b>Leave Type</b></td>
		<td align="left"><b>Comment</b></td>
		<td align="left"><b>Start</b></td>
		<td align="left"><b>End</b></td>
		<td align="left"><b>Status</b></td>
	</tr>
	<thead>
';

	// Fetch and print all the records:
	while ($row = mysql_fetch_array($r)) {
		echo ' <tbody><tr>
			<td align="left">' . $roww['esname'] . '</td>
			<td align="left">' . $roww['eoname'] . '</td>
			<td align="left">' . $row['leave_type'] . '</td>
			<td align="left">' . $row['comment'] . '</td>
			<td align="left">' . $row['l_start'] . '</td>
			<td align="left">' . $row['l_end'] . '</td>
			<td align="left">' . $row['status'] . '</td>
		</tr>
		</tbody>
		';
	}

	echo '</table>';
	
	mysql_free_result ($r);	

} else { // If no records were returned.
	echo '<p class="error">There is no leave application for this employee</p>';
}


mysql_close($dbc);


?>

