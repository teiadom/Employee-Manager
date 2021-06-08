<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
echo '<h3 style: align="center">Registered Record</h3>';
require_once ('mysql_connect.php');

$emp = $_SESSION['user_id'];
		
// Make the query:
/*$q = "SELECT * FROM employee WHERE employee.user_id = '$emp';";*/	
$q = "SELECT e.user_id, e.employee_id, u.user_id, e.esname, e.eoname, e.position, e.edob, e.sex, e.emstatus, e.phone1, e.phone2, e.mail1, e.mail2, e.highest_quali, e.school, e.address FROM employee e inner join user u on e.user_id = u.user_id WHERE e.user_id='$emp'";	
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
		<td align="left"><b>Position</b></td>
		<td align="left"><b>DOB</b></td>
		<td align="left"><b>Sex</b></td>
		<td align="left"><b>Phone1</b></td>
		<td align="left"><b>Mail1</b></td>
		<td align="left"><b>School</b></td>
		<td align="left"><b>Qualification</b></td>
		<td align="left"><b>Edit</b></td>
	</tr>
	<thead>
';

	// Fetch and print all the records:
	while ($row = mysql_fetch_array($r)) {
		echo ' <tbody><tr>
			<td align="left">' . $row['esname'] . '</td>
			<td align="left">' . $row['eoname'] . '</td>
			<td align="left">' . $row['position'] . '</td>
			<td align="left">' . $row['edob'] . '</td>
			<td align="left">' . $row['sex'] . '</td>
			<td align="left">' . $row['phone1'] . '</td>
			<td align="left">' . $row['mail1'] . '</td>
			<td align="left">' . $row['school'] . '</td>
			<td align="left">' . $row['highest_quali'] . '</td>
			
			<td align="left"><a href="edit_rec.php?id=' . $row['user_id'] . '">Edit</a></td>
			
		</tr>
		</tbody>
		';
	}

	echo '</table>';
	
	mysql_free_result ($r);	

} else { // If no records were returned.
	echo '<p class="error">There are currently no registered employees.</p>';
}


mysql_close($dbc);


?>

