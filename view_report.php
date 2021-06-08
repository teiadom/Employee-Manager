	<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
echo '<h3 style: align="center">MARKETING REPORT</h3>';
require_once ('mysql_connect.php');

$emp = $_SESSION['user_id'];
		
// Make the query:
/*$q = "SELECT * FROM employee WHERE employee.user_id = '$emp';";*/	
$q = "SELECT m.employee_id, m.client, m.contact_person, m.contact_mail, m.contact_phone, m.mkt_strategy, m.challenges, m.date, m.amt_spent, e.esname, e.eoname FROM `marketing` m INNER JOIN `employee` e ON m.employee_id = e.employee_id";	
$r = mysql_query ($q,$dbc);

// Count the number of returned rows:
$num = mysql_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Table header.
	echo '<table align="center" cellspacing="3" cellpadding="3" width="100%" class="delTable">
	<thead class="label3">
	<tr>
		<td align="left">Surname</td>
		<td align="left">Other name(s)</td>
		<td align="left"><b>Client</b></td>
		<td align="left"><b>Marketing Strategy</b></td>
		<td align="left"><b>Challenges</b></td>
		<td align="left"><b>Contact Person</b></td>
		<td align="left"><b>Contact Mail</b></td>
		<td align="left"><b>Contact Phone</b></td>
		<td align="left"><b>Date</b></td>
		<td align="left"><b>Amount Spent</b></td>
	</tr>
	<thead>
';

	// Fetch and print all the records:
	while ($row = mysql_fetch_array($r)) {
		echo ' <tbody><tr>
			<td align="left">' . $row['esname'] . '</td>
			<td align="left">' . $row['eoname'] . '</td>
			<td align="left">' . $row['client'] . '</td>
			<td align="left">' . $row['mkt_strategy'] . '</td>
			<td align="left">' . $row['challenges'] . '</td>
			<td align="left">' . $row['contact_person'] . '</td>
			<td align="left">' . $row['contact_mail'] . '</td>
			<td align="left">' . $row['contact_phone'] . '</td>
			<td align="left">' . $row['date'] . '</td>
			<td align="left">' . $row['amt_spent'] . '</td>
						
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

