<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
require_once ('mysql_connect.php');
if (isset($_GET['id'])) { // From edit_asset.php
	$id = $_GET['id'];
} elseif (isset($_POST['id'])) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.php'); 
	exit();
}

if (isset($_POST['submit'])) { 

if (empty($_POST['sname']) || empty($_POST['oname']) || empty($_POST['post']) || empty($_POST['status']) || empty($_POST['phone1']) || empty($_POST['phone2']) || empty($_POST['mail1']) || empty($_POST['mail2']) || empty($_POST['gender']) || empty($_POST['mstatus']) || empty($_POST['dob']) || empty($_POST['quali']) || empty($_POST['school']) || empty($_POST['address']))
	{
		$snm = FALSE;
		$onm = FALSE;
		$pst = FALSE;
		$stat = FALSE;
		$tele1 = FALSE;
		$tele2 = FALSE;
		$ml1 = FALSE;
		$ml2 = FALSE;
		$sex = FALSE;
		$mstat = FALSE;
		$bday = FALSE;
		$educ = FALSE;
		$sch = FALSE;
		$addrs = FALSE;
		
		echo '<p class="error">You forgot to enter all ur details!</p>';
		$url = 'edit_rec.php';
		header("Location: $url");
		} 
	else {
			$snm = mysql_real_escape_string ($_POST['sname'], $dbc);
			$onm = mysql_real_escape_string ($_POST['oname'], $dbc);
			$pst = mysql_real_escape_string ($_POST['post'], $dbc);
			$bday = mysql_real_escape_string ($_POST['dob'], $dbc);
			$sex = mysql_real_escape_string ($_POST['gender'], $dbc);
			$tele1 = mysql_real_escape_string ($_POST['phone1'], $dbc);
			$tele2 = mysql_real_escape_string ($_POST['phone2'], $dbc);
			$ml1 = mysql_real_escape_string ($_POST['mail1'], $dbc);
			$ml2 = mysql_real_escape_string ($_POST['mail2'], $dbc);
			$stat = mysql_real_escape_string ($_POST['status'], $dbc);
			$mstat = mysql_real_escape_string ($_POST['mstatus'], $dbc);
			$sch = mysql_real_escape_string ($_POST['school'], $dbc);	
			$educ = mysql_real_escape_string ($_POST['quali'], $dbc);
			$addrs = mysql_real_escape_string ($_POST['address'], $dbc);
		}
	if ($snm && $onm && $pst && $bday && $sex && $tele1 && $tele2 && $ml1 && $ml2 && $stat && $mstat && $sch && $educ && $addrs) { // If everything's OK.
	
			// Make the query:
			
			$q = "UPDATE `employee` SET esname='$snm', eoname='$onm', position='$pst', edob='$bday', sex='$sex', phone1='$tele1', phone2='$tele2', mail1='$ml1', mail2='$ml2', emstatus='$stat', marital_status='mstat', school='$sch', highest_quali='$educ', address='$addrs' WHERE user_id='$id' LIMIT 1";
			$r = mysql_query ($q,$dbc);
				
		if ($r) {
					// If it ran OK.
					
		//header("Location:edit_actres.php?id=".$rw['user_id']."");

	
					
		echo '<h3 class="headr">The record has been edited!</h3>';
						// Retrieve the asset's information:
//$qu = "SELECT * FROM employee WHERE employee.user_id =$id";
 $qu =  "SELECT e.user_id, e.employee_id, u.user_id, e.esname, e.eoname, e.position, e.edob, e.sex, e.emstatus, e.marital_status, e.phone1, e.phone2, e.mail1, e.mail2, e.highest_quali, e.school, e.address FROM employee e inner join user u on e.user_id = u.user_id WHERE e.user_id='$id'";
$res = mysql_query ($qu,$dbc);

//if (mysql_num_rows($res) == 1) { // Valid asset ID.

	// Get the asset's information:
	$row = mysql_fetch_array ($res);		
						
echo ' <table class="divast">
		 <tr><th class="label2">DETAILS</th></tr>
		 <tr><td class="label">Surname:</td>
			<td class="info">' . $row["esname"]  .'</td>
		<td class="label">Other Name(s):</td>
			<td class="info">' . $row["eoname"]  .'</td>
		 </tr><br/>
		 
		 <tr><td class="label">Position:</td>
			<td class="info">' . $row["position"]  .'</td>
			<td class="label">Employment Status:</td>
			<td class="info">' . $row["emstatus"]  .'</td>
		 </tr><br/>
		  
		 <tr><td class="label">Phone 1:</td>
			<td class="info">' . $row["phone1"]  .'</td>
			<td class="label">Phone 2:</td>
			<td class="info">' . $row["phone2"]  .'</td>
		 </tr><br/>
		 
		 <tr><td class="label">Email1:</td>
			<td class="info">' . $row["mail1"]  .'</td>
			<td class="label">Email2:</td>
			<td class="info">' . $row["mail2"]  .'</td>
		 </tr><br/>	
		 
		 <tr><td class="label">Sex:</td>
				<td class="info">' . $row["sex"]  .'</td>
				<td class="label">Marital Status:</td>
				<td class="info">' . $row["marital_status"]  .'</td>
		</tr>
			
         <tr><td class="label">Date of Birth:</td>
			<td class="info">' . $row["edob"]  .'</td>
			<td class="label">Highest Qualification:</td>
			<td class="info">' . $row["highest_quali"]  .'</td>
		 </tr>
		 		 
		 <tr><td class="label">School:</td>
			<td class="info">' . $row["school"]  .'</td>
			<td class="label">Home Address:</td>
			<td class="info">' . $row["address"]  .'</td>
		 </tr>
		 		 
		</table>';
//} 
				}
					else { // If one of the data tests failed.
		echo '<p class="error">Please re-enter your details and try again.</p>';
				}	
		} 
		else { 
			echo '<p class="error">Try again... </p> ';
		}
		}
	
	
	// End of the main Submit conditional.

	mysql_close($dbc);
		
?>