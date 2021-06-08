<?php
include ('includes/header.php');
require_once ('mysql_connect.php');

$usid = $_SESSION['user_id'];
$page_title = 'EMPLOYEE MANAGER';
if (isset($_POST['submit'])) { 

if (empty($_POST['ltype']) || empty($_POST['cmnt']) || empty($_POST['start_dt']) || empty($_POST['end_dt']) )
	{
		$typ = FALSE;
		$commnt = FALSE;
		$start = FALSE;
		$end = FALSE;
		
		
		echo '<p class="error">You forgot to enter all ur details!</p>';
		$url = 'leave.php';
		header("Location: $url");
		} 
	else {
			$typ = mysql_real_escape_string ($_POST['ltype'], $dbc);
			$commnt = mysql_real_escape_string ($_POST['cmnt'], $dbc);
			$start = mysql_real_escape_string ($_POST['start_dt'], $dbc);
			$end = mysql_real_escape_string ($_POST['end_dt'], $dbc);
			
		}
	
	if ($typ && $commnt && $start && $end) { // If everything's OK...

					
					//$usid = "SELECT u.user_id, e.user_id, e.employee_id FROM employee e INNER JOIN user u ON u.user_id = e.employee_id WHERE u.user_id='$employ'";
					$usid = "SELECT employee_id FROM employee WHERE user_id='$usid'";
					$idd = mysql_query($usid,$dbc) or die(mysql_error()." Error...");
					$roww = mysql_fetch_array($idd);
					
					//print_r($typ);". $roww['user_id']. "
								
					
					/*$tq = "UPDATE user SET status=0 WHERE user_id='". $roww['user_id']. "'";
					$re = mysql_query ($tq,$dbc);*/
				   		
					// Add the user to the database:
					/*$q = "INSERT INTO leave(leave_type, comment, l_start, l_end, user_id)values 
					('$typ', '$commnt', '$start', '$end', '". $roww['user_id']. "')";
					$r = mysql_query($q,$dbc) or die(mysql_error()." Error...");*/
					
					$q = "INSERT INTO `leave`(employee_id, leave_type, comment, l_start, l_end)values
			               (". $roww['employee_id']. ", '$typ', '$commnt', '$start', '$end')";
			        $r = mysql_query ($q,$dbc);

					if ($r) {
					// If it ran OK.
					
					$id2 = base64_encode($roww['employee_id']);
										
					header("Location:leave_actres.php?id=".$id2."");
					}
					// If it ran OK.
				/*echo '<h4>Leave Applied!</h4>';
						// Retrieve the asset's information:
$qu = "SELECT * leave WHERE user_id ='". $roww['user_id']. "'";		
$res = mysql_query ($qu,$dbc);

	// Get the employee's information:
	$row = mysql_fetch_array ($res);
						
echo ' 	<table class="divast">
		 <tr><th class="label2">DETAILS</th></tr>
		 <tr><td class="label">Leave Type:</td>
			<td class="info">' . $row["leave_type"]  .'</td>
		<td class="label">Description:</td>
			<td class="info">' . $row["comment"]  .'</td>
		 </tr><br/>
		 
		 <tr><td class="label">Start Date:</td>
			<td class="info">' . $row["l_start"]  .'</td>
			<td class="label">End Date:</td>
			<td class="info">' . $row["l_end"]  .'</td>
		 </tr><br/>
			
		</table>
		</div>
		';
		
		}*/
		else { // If one of the data tests failed.
		echo '<p class="error">Please re-enter your details and try again.</p>';
				}
		
		} 
		else { 
			echo '<p class="error">Try again. </p> ';
		}
		
		}
		
		
	// End of the main Submit conditional.

	mysql_close($dbc);
			
?>
</div>
		