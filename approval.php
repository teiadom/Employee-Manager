<?php 
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
echo '<h2 style: align="center">LEAVE PENDING APPROVAL</h2>';
require_once ('mysql_connect.php');
	
// Make the query:
/*$q = "SELECT * FROM employee WHERE employee.user_id = '$emp';";*/	
$qu = "SELECT l.leave_id, l.employee_id, l.leave_type, l.comment, l.l_start, l.l_end, l.status, e.employee_id, e.eoname, e.esname FROM `leave` l INNER JOIN `employee` e ON l.employee_id = e.employee_id";	
$ru = mysql_query ($qu,$dbc);

// Count the number of returned rows:
$num = mysql_num_rows($ru);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many assets are there:
	/*echo"<br/>";
echo"<br/>";
	echo "<p>There are currently $num registered assets.</p>\n";*/
	echo"<br/>";
	
	echo '<div class="table-wrapper"> 
		<div class="wrapper-panel">  ';
		
	// Table header.
	echo '<table align="center" cellspacing="3" cellpadding="3" width="100%" id="tabular">
	<thead class="label3">
	<tr>
		<td align="left">Surname</td>
		<td align="left">Other name(s)</td>
		<td align="left">Leave Type</td>
		<td align="left">Description</td>
		<td align="left">Start</td>
		<td align="left">End</td>
		<td align="left">Status</td>
		<td align="left">Approve</td>
	</tr>
	</thead>
<tbody>';
	
	// Fetch and print all the records:
	while ($row = mysql_fetch_array($ru)) {
		$iddd = $row['employee_id'] .'-'.$row['leave_id']; 
		$id = base64_encode($iddd);
		echo ' <tr>
			
			<td align="left">' . $row['esname'] . '</td>
			<td align="left">' . $row['eoname'] . '</td>
			<td align="left">' . $row['leave_type'] . '</td>
			<td align="left">' . $row['comment'] . '</td>
			<td align="left">' . $row['l_start'] . '</td>
			<td align="left">' . $row['l_end'] . '</td>
			<td align="left">' . $row['status'] . '</td>
			<td align="left"><a href="approve_leave.php?id=' . $id . '">Approve</a></td>
			
		</tr>
		
		';
	}
	echo '</tbody> </table>';
		// end table_wrapper and wrapper_panel
mysql_free_result ($ru);	

}
 else { // If no records were returned.
	echo '<p class="error">There is no leave record in the system .</p>';
}

mysql_close($dbc);


// Include the HTML footer.

	?> 
