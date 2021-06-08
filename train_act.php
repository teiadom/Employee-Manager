<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
require_once ('mysql_connect.php');

if (isset($_POST['sub_mit'])) { 

if (empty($_POST['tsname']) || empty($_POST['toname']) || empty($_POST['crse']) || empty($_POST['my']) || empty($_POST['fone']) || empty($_POST['mail']) || empty($_POST['wrkp']) || empty($_POST['tcity']))
	{
		$tsnm = FALSE;
		$tonm = FALSE;
		$tcrse = FALSE;
		$tmyr = FALSE;
		$tfone = FALSE;
		$tmail = FALSE;
		$twrkplc = FALSE;
		$city = FALSE;
		
		
		echo '<p class="error">You forgot to enter all ur details!</p>';
		$url = 'add_train.php';
		header("Location: $url");
		} 
	else {
			$tsnm = mysql_real_escape_string ($_POST['tsname'], $dbc);
			$tonm = mysql_real_escape_string ($_POST['toname'], $dbc);
			$tcrse = mysql_real_escape_string ($_POST['crse'], $dbc);
			$tmyr = mysql_real_escape_string ($_POST['my'], $dbc);
			$tfone = mysql_real_escape_string ($_POST['fone'], $dbc);
			$tmail = mysql_real_escape_string ($_POST['mail'], $dbc);
			$twrkplc = mysql_real_escape_string ($_POST['wrkp'], $dbc);
			$city = mysql_real_escape_string ($_POST['tcity'], $dbc);
		}
	
	if ($tsnm && $tonm && $tcrse && $tmyr && $tfone && $tmail && $twrkplc && $city) { // If everything's OK...
	
					// Add the user to the database:
					$q = "INSERT INTO trainee (tsurname, tonames, course, moyr, phone, mail, work, tcity) 
					VALUES ('$tsnm', '$tonm', '$tcrse', '$tmyr', '$tfone', '$tmail', '$twrkplc', '$city')";
					$r = mysql_query($q,$dbc) or die(mysql_error()." Error...");

					if ($r) { // If it ran OK.
				echo '<h4>Trainee Added!</h4>';
						// Retrieve the asset's information:
$qu = "SELECT * from trainee WHERE tsurname ='$tsnm'";		
$res = mysql_query ($qu,$dbc);

	// Get the employee's information:
	$row = mysql_fetch_array ($res);
						
echo ' 	<table class="divast">
		 <tr><th class="label2">DETAILS</th></tr>
		 <tr><td class="label">Surname:</td>
			<td class="info">' . $row["tsurname"]  .'</td>
		<td class="label">Other Name(s):</td>
			<td class="info">' . $row["tonames"]  .'</td>
		 </tr><br/>
		 
		 <tr><td class="label">Course:</td>
			<td class="info">' . $row["course"]  .'</td>
			<td class="label">Month/Year:</td>
			<td class="info">' . $row["moyr"]  .'</td>
		 </tr><br/>
		  
		 <tr><td class="label">Phone:</td>
			<td class="info">' . $row["phone"]  .'</td>
			<td class="label">Email:</td>
			<td class="info">' . $row["mail"]  .'</td>
		 </tr><br/>
		 
		 <tr><td class="label">Place of Work:</td>
			<td class="info">' . $row["work"]  .'</td>
			<td class="label">Training City:</td>
			<td class="info">' . $row["tcity"]  .'</td>
		 </tr><br/>			 
        
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
		