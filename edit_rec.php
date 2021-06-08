	<?php 
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');

require_once ('mysql_connect.php');

// Check for a valid user ID, through GET or POST:
if (isset($_GET['id'])) { 
	$id = $_GET['id'];
} elseif (isset($_POST['id'])) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>'; 
	exit();
}

		
/*$q = "SELECT * FROM employee WHERE employee.user_id='$id'";*/
$q = "SELECT e.user_id, e.employee_id, u.user_id, e.esname, e.eoname, e.position, e.edob, e.sex, e.emstatus, e.phone1, e.phone2, e.mail1, e.mail2, e.highest_quali, e.school, e.address FROM employee e inner join user u on e.user_id = u.user_id WHERE e.user_id='$id'";

$r = mysql_query ($q,$dbc);


//if(mysql_num_rows($r) == 1) { // Valid asset ID, show the form.

	// Get the asset's information:
	$row = mysql_fetch_array ($r);?>
	
	
	<div class="alert alert-error" style="text-align: center;">
            <p id="err"></p>
	</div>
	<?php
	// Create the form:
	echo '<form method="post" action="edit_act.php?id=' . $row['user_id'] . '" id="asset_form">
<div align="center">

<h3>Enter Personal Information</h3>
</div>
<fieldset>
<legend> Data Registration</legend>
<table class="Record">
 <tr class="Controls">
  
<td style="border:0px;text-align:left">
Surname<br/><br/>
<input type="text"  title="Surname of Employee" id="sname" maxlength="250" size="27" name="sname" value="' . $row["esname"] . '" />
</td> 
<td style="border:0px;text-align:left">
Other Name(s)<br/><br/>
<input type="text"  title="First Name of employee" id="oname" name="oname" maxlength="250" size="27" value="' . $row["eoname"] . '" />
</td>
</tr>
 <tr class="Controls">
 <td style="border:0px;text-align:left">
Position<br/><br/>
<input type="text"  title="Position of employee" id="post" name="post" maxlength="250" size="27" value="' . $row["position"] . '" />
</td>
<td style="border:0px;text-align:left">
Employment Status<br/><br/>
<select name="status" value="' . $row["emstatus"] . '">
<option selected="selected">--Select Status--</option>
<option value="male">Permanent</option>
<option value="female">Probation</option>
<option value="male">Contract</option>
<option value="female">Transfer</option>
</select>
</td>
</tr>
 <tr class="Controls">
 <td style="border:0px;text-align:left">
Phone 1<br/><br/>
<input type="text"  title="Phone1 of employee" id="phone1" name="phone1" maxlength="250" size="27" value="' . $row["phone1"] . '" />
</td>
 <td style="border:0px;text-align:left">
Phone 2<br/><br/>
<input type="text"  title="Phone2 of Employee" id="phone2" maxlength="250" size="27" name="phone2" value="' . $row["phone2"] . '"/>
</td> 
</tr>

<tr class="Controls">
<td style="border:0px;text-align:left">
Email 1<br/><br/>
<input type="text"  title="mail1" id="post" name="mail1" maxlength="250" size="27" value="' . $row["mail1"] . '"/>
</td>
<td style="border:0px;text-align:left">
Email 2<br/><br/>
<input type="text"  title="Mail2 of Employee" id="mail2" maxlength="250" size="27" name="mail2" value="' . $row["mail2"] . '"/>
</td> 
</tr>
<tr class="Controls">
<td style="border:0px;text-align:left">
Sex<br/><br/>
<select name="gender">
<option selected="selected">--Select Sex--</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</td>
 <td style="border:0px;text-align:left">
Marital Status<br/><br/>
<select name="mstatus">
<option selected="selected">--Select Marital Status--</option>
<option value="male">Single</option>
<option value="female">Married</option>
<option value="female">Divorced</option>
</select>
</td> 
</tr>
<tr class="Controls">
<td style="border:0px;text-align:left">
Date of Birth<br/><br/>
<input type="text" class="datepicker" title="DOB" id="dob" name="dob" maxlength="250" size="27"/>
</td>
<td style="border:0px;text-align:left">
Highest Qualification<br/><br/>
<input type="text" title="Highest qualification" id="quali" name="quali"  maxlength="250" size="35" value="' . $row["highest_quali"] . '"/>
</td> 
</tr>
<tr class="Controls">
<td style="border:0px;text-align:left">
Name of School<br/><br/>
<input type="text"  title="Name of School" id="school" maxlength="250" size="35" name="school" value="' . $row["school"] . '"/>
</td>
<td style="border:0px;text-align:left">
Home Address<br/><br/>
<textarea rows="7" cols="28" name="address" id="address" value="' . $row["address"] . '"></textarea>
</td>
</tr>

</table>
 
 <table>
 <tr class="Bottom">
<td style="border:0px;text-align:left">
 <input class="register" border="0" value="Submit" name="submit" type="submit" id="submit">
 <input type="hidden" name="edit" id="edit" value="TRUE" />
			<input type="hidden" name="id" value="' . $id . '" />
 </td>
 </tr>
 
 </table>
  </fieldset>						
 </form>';
 ?>
 
<?php
 

mysql_close($dbc);

include ('includes/footer.php');
	?>
