	<?php 
include ('includes/header.php');
require_once ('mysql_connect.php');

?>
<div class="cont">
<div class="alert alert-error" style="text-align: center;">
                <p id="err"></p>
</div>
<form method="post" action="recact.php" id="asset_form">
<div align="center">

<h3>Enter Personal Information</h3>
</div>
<fieldset>
<legend> Data Registration</legend>
<table class="Record">
 <tr class="Controls">
  
<td style="border:0px;text-align:left">
Surname<br/><br/>
<input type="text"  title="Surname of Employee" id="sname" maxlength="250" size="27" name="sname" >
</td> 
<td style="border:0px;text-align:left">
Other Name(s)<br/><br/>
<input type="text"  title="First Name of employee" id="oname" name="oname" maxlength="250" size="27" />
</td>
</tr>
 <tr class="Controls">
 <td style="border:0px;text-align:left">
Position<br/><br/>
<input type="text"  title="Position of employee" id="post" name="post" maxlength="250" size="27" />
</td>
<td style="border:0px;text-align:left">
Employment Status<br/><br/>
<select name="status">
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
<input type="text"  title="Phone1 of employee" id="phone1" name="phone1" maxlength="250" size="27" />
</td>
 <td style="border:0px;text-align:left">
Phone 2<br/><br/>
<input type="text"  title="Phone2 of Employee" id="phone2" maxlength="250" size="27" name="phone2" >
</td> 
</tr>

<tr class="Controls">
<td style="border:0px;text-align:left">
Email 1<br/><br/>
<input type="text"  title="mail1" id="post" name="mail1" maxlength="250" size="27" />
</td>
<td style="border:0px;text-align:left">
Email 2<br/><br/>
<input type="text"  title="Mail2 of Employee" id="mail2" maxlength="250" size="27" name="mail2" >
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
<input type="text" class="datepicker" title="DOB" id="dob" name="dob" maxlength="250" size="27" />
</td>
<td style="border:0px;text-align:left">
Highest Qualification<br/><br/>
<input type="text" title="Highest qualification" id="quali" name="quali"  maxlength="250" size="35">
</td> 
</tr>
<tr class="Controls">
<td style="border:0px;text-align:left">
Name of School<br/><br/>
<input type="text"  title="Name of School" id="school" maxlength="250" size="35" name="school">
</td>
<td style="border:0px;text-align:left">
Home Address<br/><br/>
<textarea rows="7" cols="28" name="address" id="address"></textarea>
</td>
</tr>

</table>
 
 <table>
 <tr class="Bottom">
<td style="border:0px;text-align:left">
 <input class="register" border="0" value="Submit" name="sub_mit" type="submit" id="sub_mit">
 </td>
 </tr>
 
 </table>
  </fieldset>						
 </form>

 </div>
 <br/><br/><br/><br/>
<?php 
include ('includes/footer.php');
?> 
