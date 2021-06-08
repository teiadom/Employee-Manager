<?php 
$page_title = 'FIXED ASSETS';
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

    //$yt = "SELECT * FROM asset WHERE asset_id = $id";
	  $yt = "SELECT l.leave_id, l.employee_id, l.leave_type, l.comment, l.l_start, l.l_end, e.employee_id, e.eoname, e.esname, e.mail1 FROM `leave` l INNER JOIN `employee` e ON l.employee_id = e.employee_id WHERE e.employee_id='$id' AND l.leave_id='$leave_id'";
	$idd = mysql_query($yt,$dbc) or die(mysql_error()." Error...");
	$run = mysql_fetch_array($idd);
		
	// Create the form:
	echo '<div class="alert alert-error" style="text-align: center;">
        <p id="disp"></p>
</div>';
		$id = base64_encode($id_decode);
	echo '<form action="approve_leaveact.php?id=' . $id . '" method="post" id="form_cont">
		<input type="hidden" name="emlx" value="'.$run["mail1"].'"/>	
		<div align="center">
		<h2>LEAVE APPROVAL</h2>
		</div>
		<fieldset>
		<legend>Approve Leave</legend>
		<table class="Record">
		<tr class="Controls">
<td style="border:0px;text-align:left">
Surname<br/><br/>
<input type="text"  title="Surname" maxlength="250" size="50" name="snmz" value="'.$run["esname"].'"/>
</td>
<td style="border:0px;text-align:left">
Other Name(s)<br/><br/>
<input type="text"  title="Other Names" maxlength="250" size="20" name="onmz" value="'.$run["eoname"].'"/>
</td>
</tr>
	<tr class="Controls">
<td style="border:0px;text-align:left">
Leave Start<br/><br/>
<input type="text" class="datepicker" title="Leave Start" maxlength="250" size="20" name="slv" value="' . $run["l_start"] . '"/>
</td> 
<td style="border:0px;text-align:left">
Leave End<br/><br/>
<input type="text" class="datepicker" title="Leave End" maxlength="250" size="20" name="elv" value="' . $run["l_end"] . '"/>
</td>
</tr>
<tr class="Controls">
<td style="border:0px;text-align:left">
Approval Date<br/><br/>
<input type="text" class="datepicker" title="Date Leave is Approved" maxlength="150" size="20" name="appdt"/>
</td>
<td style="border:0px;text-align:left">
Remark<br/><br/>
<textarea rows="10" cols="30" name="rmark"></textarea>
</td>
</tr>

<table>
 <tr class="Bottom">
<td style="border:0px;text-align:left">
 <input type="submit" value="Approve" class="register" name="sbmt" id="sbmt"/>
			<input type="hidden" name="edit" id="edit" value="TRUE" />
			<input type="hidden" name="id" value="' . $id . '" />
 </td>
 </tr>
 </table>
 </fieldset></form>';
  
 
// else { // Not a valid user ID.
	//echo '<p class="error">Asset Name and Asset Code Mismatch, Please Try Again.</p>';
//}

mysql_close($dbc);
		
include ('includes/footer.php');
	?>
