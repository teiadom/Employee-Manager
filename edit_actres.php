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
	
	exit();
}

					
		echo '<h3 class="headr">The record has been edited!</h3>';
						// Retrieve the asset's information:
//$qu = "SELECT * FROM employee WHERE employee.user_id =$id";
$qu = "SELECT e.user_id, e.employee_id, u.user_id, e.esname, e.eoname, e.position, e.edob, e.sex, e.emstatus, e.phone1, e.phone2, e.mail1, e.mail2, e.highest_quali, e.school, e.address FROM employee e inner join user u on e.user_id = u.user_id WHERE e.user_id='$id'";
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
		/*
		else { // If one of the data tests failed.
		echo '<p class="error">Please re-enter your details and try again.</p>';
				}	
		} 
		else { 
			echo '<p class="error">Try again. </p> ';
		}
//} 
				/*	}
					else { // If one of the data tests failed.
		echo '<p class="error">Please re-enter your deatils and try again.</p>';
				}	
		
		}
		else { 
		
			$errors['insurediff'] = 'The dispose date must be greater than asset purchase date';?>
			<div class="alert alert-error" style="margin:50px;text-align: center;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Warning!</h4>
        <?php
                foreach ($errors as $err)
                    echo $err."<br/>";
        ?>
    </div>
	<?php
			
			}
		
}*/

////end of main submit		
		
			
	/*mysql_close($dbc);*/
			

?>