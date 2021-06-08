<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
require_once ('mysql_connect.php');
if (isset($_GET['id'])) { // From edit_asset.php
	$id_decode = base64_decode($_GET['id']);
	$id_split = explode("-",$id_decode);
	$id = $id_split[0];
	$leave_id = $id_split[1];
} elseif (isset($_POST['id'])) { // Form submission.
	$id_decode = base64_decode($_GET['id']);
	$id_split = explode("-",$id_decode);
	$id = $id_split[0];
	$leave_id = $id_split[1];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	
	exit();
}
$errors = array();
if (isset($_POST['sbmt'])) { 

if (empty($_POST['snmz']) || empty($_POST['onmz']) || empty($_POST['slv']) || empty($_POST['elv']) || empty($_POST['appdt']) || empty($_POST['rmark']) || empty($_POST['emlx']))
	{
		$snn = FALSE;
		$onn = FALSE;
		$lsst = FALSE;
		$lend = FALSE;
		$addt = FALSE;
		$rrmk = FALSE;
		$ml = FALSE;
		
		echo '<p class="error">You forgot to enter all ur details!</p>';
		$url = 'approval.php';
		header("Location: $url");
	
		} 
	else {
			$snn = mysql_real_escape_string ($_POST['snmz'], $dbc);
			$onn = mysql_real_escape_string ($_POST['onmz'], $dbc);
			$lsst = mysql_real_escape_string ($_POST['slv'], $dbc);
			$lend = mysql_real_escape_string ($_POST['elv'], $dbc);
			$addt =  mysql_real_escape_string ($_POST['appdt'], $dbc);
			$rrmk =  mysql_real_escape_string ($_POST['rmark'], $dbc);
			$ml =  mysql_real_escape_string ($_POST['emlx'], $dbc);
			}
	if ($snn && $onn && $lsst && $lend && $addt && $rrmk && $ml) { // If everything's OK.
	
			// Make the query:
						
			      $tq = "UPDATE `leave` SET status = 'Approved' WHERE leave_id = '$leave_id'";
				   $re = mysql_query ($tq,$dbc);
				   
				   
			
			      // $asstid = "SELECT e.employee_id, e.user_id, u.user_id FROM `employee` e INNER JOIN `user` u ON e.user_id = u.user_id WHERE e.employee_id='$id'";
			
					//$asstid = "SELECT e.employee_id l.employee_id FROM `employee` e INNER JOIN `leave` l ON e.employee_id = l.employee_id WHERE l.employee_id= '$id'";
					//$idd = mysql_query($asstid,$dbc) or die(mysql_error()." Error...");
					//$roww = mysql_fetch_array($idd)
					
					/*$asstid = "SELECT employee_id FROM `employee` WHERE employee_id='$id'";
					$idd = mysql_query($asstid,$dbc) or die(mysql_error()." Error...");
					$roww = mysql_fetch_array($idd);*/
					
					$qt = "INSERT INTO `leave_approved`(leave_id,employee_id, asnm, aon, astrt, aend, adt, armk, leave_mail) values
			               (".$leave_id.",". $id. ", '$snn', '$onn', '$lsst', '$lend', '$addt', '$rrmk', '$ml')";
			         $r = mysql_query ($qt,$dbc);
			
						$from = "info@osconcepts.com OS CONCEPTS EMPLOYEE MANAGER"; //Site name
						$to = "$ml, teiadom@yahoo.com"; //to  test lets use ur email
  						$subject = "Leave Approval for $snn . $onn";
        				$message = "Kindly note that your leave has been approved!";
		        		//mail($to,$subject,$message,$from);
						
		
		      if ($r) { // If it ran OK.
		
		echo '<h2>Leave Approval Completed!</h2>';
						// Retrieve the asset's information:
//$qu = "SELECT * FROM leave_approved WHERE employee_id =$id";
$qu = "SELECT * FROM leave_approved WHERE leave_id =$leave_id";		
$res = mysql_query ($qu,$dbc);

//if (mysql_num_rows($res) == 1) { // Valid asset ID.

	// Get the asset's information:
	$row = mysql_fetch_array ($res);		
						
echo ' <table class="divast">
		 <tr><th class="label2">APPROVAL DETAILS</th></tr>
		 <tr><td class="label">Surname:</td>
			<td class="info">' . $row["asnm"]  .'</td>
		 </tr><br/>
		 <tr><td class="label">Other Name(s):</td>
				<td class="info">' . $row["aon"]  .'</td>
		</tr>
         <tr><td class="label">Approval Date:</td>
			<td class="info">' . $row["adt"]  .'</td>
		 </tr>
		 <tr><td class="label">Approval Remark:</td>
			<td class="info">' . $row["armk"]  .'</td>
		 </tr>

		</table>';
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