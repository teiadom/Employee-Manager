<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
require_once ('mysql_connect.php');

$usd = $_SESSION['user_id'];

if (isset($_POST['sub_mit'])) { 

if (empty($_POST['clnt']) || empty($_POST['mmthd']) || empty($_POST['chllng']) || empty($_POST['conpersn']) || empty($_POST['cmail']) || empty($_POST['cphone']) ||  empty($_POST['mktdt']) || empty($_POST['amt']))
	{
		$clent = FALSE;
		$method = FALSE;
		$chall = FALSE;
		$cperson = FALSE;
		$conmail = FALSE;
		$confone = FALSE;
		$mdate = FALSE;
		$expen = FALSE;
				
		echo '<p class="error">You forgot to enter all ur details!</p>';
		$url = 'report.php';
		header("Location: $url");
		} 
	else {
			$clent = mysql_real_escape_string ($_POST['clnt'], $dbc);
			$method = mysql_real_escape_string ($_POST['mmthd'], $dbc);
			$chall = mysql_real_escape_string ($_POST['chllng'], $dbc);
			$cperson = mysql_real_escape_string ($_POST['conpersn'], $dbc);
			$conmail = mysql_real_escape_string ($_POST['cmail'], $dbc);
			$confone = mysql_real_escape_string ($_POST['cphone'], $dbc);
			$mdate = mysql_real_escape_string ($_POST['mktdt'], $dbc);
			$expen = mysql_real_escape_string ($_POST['amt'], $dbc);
			
		}
	
	if ($clent && $method && $chall && $cperson && $conmail && $confone &&  $mdate && $expen) { // If everything's OK...

	
					//$usid = "SELECT e.user_id, e.employee_id, u.user_id FROM employee e inner join user u on e.user_id = u.user_id WHERE u.user_id='$usd'";
					/*$usid = "SELECT e.user_id, e.employee_id, u.user_id, m.employee_id, m.client, m.mkt_strategy, m.challenges, m.contact_person, m.contact_mail, m.contact_phone, m.date, m.amt_spent FROM employee e inner join user u on e.user_id = u.user_id inner join marketing m on e.employee_id = m.employee_id WHERE e.employee_id='$usd'";	
					$id = mysql_query($usid,$dbc) or die(mysql_error()." Error...");
					$rw = mysql_fetch_array($id);*/
					
					$usid = "SELECT employee_id FROM employee WHERE user_id='$usd'";
					$id = mysql_query($usid,$dbc) or die(mysql_error()." Error...");
					$rw = mysql_fetch_array($id);
	
					/*$usid = "SELECT employee_id FROM employee WHERE user_id='$usd'";
					$id = mysql_query($usid,$dbc) or die(mysql_error()." Error...");
					$rw = mysql_fetch_array($id);*/
					
					// Add the user to the database:
					$q = "INSERT INTO `marketing`(employee_id, client, mkt_strategy, challenges, contact_person, contact_mail, contact_phone, date, amt_spent) 
					VALUES (". $rw['employee_id']. ", '$clent', '$method', '$chall', '$cperson', '$conmail', '$confone', '$mdate', '$expen')";
					$r = mysql_query($q,$dbc) or die(mysql_error()." Error...");

									if ($r) {
					// If it ran OK.
					
		header("Location:report_actres.php?id=".$rw['employee_id']."");
}
					
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
		