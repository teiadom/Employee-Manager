<?php 
include ('includes/header.php');
require_once ('mysql_connect.php');
?>
<div class="cont">
<div class="alert alert-error" style="text-align: center;">
                <p id="err"></p>
</div>
<form method="post" action="leave_act.php" id="asset_form">
<div align="center">

<h3>Enter Leave Information</h3>
</div>
<fieldset>
<legend> Leave Application</legend>
<table class="Record">
<tr class="Controls">
<td style="border:0px;text-align:left">
Leave Type<br/><br/>
<select name="ltype">
<option selected="selected">-Leave Type-</option>
<option value="Sick">Sick</option>
<option value="Maternity">Maternity</option>
<option value="Paternity">Paternity</option>
<option value="Compassionate">Compassionate</option>
</select>
</td>
<td style="border:0px;text-align:left">
Description<br/><br/>
<textarea rows="7" cols="28" name="cmnt" id="cmnt"></textarea>
</td>
</tr>

<tr class="Controls">
<td style="border:0px;text-align:left">
Start date<br/><br/>
<input type="text" class="datepicker" title="Start Date" id="start_dt" name="start_dt" maxlength="250" size="27" />
</td>
<td style="border:0px;text-align:left">
End date<br/><br/>
<input type="text" class="datepicker" title="End Date" id="end_dt" name="end_dt" maxlength="250" size="27" />
</td> 
</tr>
</table>

 <table>
 <tr class="Bottom">
<td style="border:0px;text-align:left">
 <input class="register" border="0" value="Submit" name="submit" type="submit" id="submit">
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
