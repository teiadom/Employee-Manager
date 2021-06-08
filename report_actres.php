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

		echo '<h3>Marketing Report Posted!</h3>';
						// Retrieve the asset's information:
//$qu = "SELECT client, mkt_strategy, challenges, contact_person, contact_mail, contact_phone, date, amt_spent from marketing WHERE user_id ='$id'";
//$qu = "SELECT e.user_id, e.employee_id, u.user_id, m.employee_id, m.client, m.mkt_strategy, m.challenges, m.contact_person, m.contact_mail, m.contact_phone, m.date, m.amt_spent FROM employee e inner join user u on e.user_id = u.user_id inner join marketing m on e.employee_id = m.employee_id WHERE e.user_id='$id'";			
$qu = "SELECT * from `marketing` WHERE employee_id =$id";

$res = mysql_query ($qu,$dbc);

	// Get the employee's information:
	$row = mysql_fetch_array ($res);
						
echo ' 	<table class="divast">
		 <tr><th class="label2">REPORT</th></tr>
		 <tr><td class="label">Client:</td>
			<td class="info">' . $row["client"]  .'</td>
		<td class="label">Marketing Method:</td>
			<td class="info">' . $row["mkt_strategy"]  .'</td>
		 </tr><br/>
		 
		 <tr><td class="label">Challenges:</td>
			<td class="info">' . $row["challenges"]  .'</td>
			<td class="label">Contact Person:</td>
			<td class="info">' . $row["contact_person"]  .'</td>
		 </tr><br/>
		  
		 <tr><td class="label">Contact Mail:</td>
			<td class="info">' . $row["contact_mail"]  .'</td>
			<td class="label">Contact Phone:</td>
			<td class="info">' . $row["contact_phone"]  .'</td>
		 </tr><br/>
		 
		 <tr><td class="label">Amount Spent:</td>
			<td class="info">' . $row["amt_spent"]  .'</td>
			<td class="label">Date:</td>
			<td class="info">' . $row["date"]  .'</td>
		 </tr><br/>	 
        
		</table>
		</div>
		';
		
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