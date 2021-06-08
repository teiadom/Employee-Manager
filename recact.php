	<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
require_once ('mysql_connect.php');

$usd = $_SESSION['user_id'];

if (isset($_POST['sub_mit'])) { 

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
		$url = 'create_emp.php';
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
	
	if ($snm && $onm && $pst && $bday && $sex && $tele1 && $tele2 && $ml1 && $ml2 && $stat && $mstat && $sch && $educ && $addrs) { // If everything's OK...

	
					$usid = "SELECT user_id FROM user WHERE user_id='$usd'";
					$id = mysql_query($usid,$dbc) or die(mysql_error()." Error...");
					$rw = mysql_fetch_array($id);
					
					// Add the user to the database:
					$q = "INSERT INTO employee (user_id, esname, eoname, position, edob, sex, phone1, phone2, mail1, mail2, emstatus, marital_status, school, highest_quali, address) 
					VALUES ('". $rw['user_id']. "', '$snm', '$onm', '$pst', '$bday', '$sex', '$tele1', '$tele2', '$ml1', '$ml2', '$stat', '$mstat', '$sch', '$educ', '$addrs' )";
					$r = mysql_query($q,$dbc) or die(mysql_error()." Error...");

					if ($r) { // If it ran OK.
				echo '<h4>Employee Created!</h4>';
						// Retrieve the asset's information:
$qu = "SELECT esname, eoname, position, edob, sex, phone1, phone2, mail1, mail2, emstatus, marital_status, school, highest_quali, address from employee WHERE user_id ='$usd'";		
$res = mysql_query ($qu,$dbc);

	// Get the employee's information:
	$row = mysql_fetch_array ($res);
						
echo ' 	<table class="divast">
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
		 		 
        
		</table>
		</div>
		';
		
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
		