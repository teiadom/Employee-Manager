<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
require_once ('mysql_connect.php');
if (isset($_GET['id'])) { // From edit_asset.php
	$id2 = $_GET['id'];
} elseif (isset($_POST['id'])) { // Form submission.
	$id2 = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	
	exit();
}
//decoding base64_encode
$id = base64_decode($id2);
		echo '<h4>Leave Applied!</h4>';
						// Retrieve the asset's information:
$qu = "SELECT * from `leave` WHERE employee_id =$id";		
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
		';
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
		
}

}//end of main submit		
		
			
	/*mysql_close($dbc);*/
			

?>