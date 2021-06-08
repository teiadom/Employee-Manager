 <?php 
include ('includes/header.php');
require_once ('mysql_connect.php');

?>
<div class="cont">
<div class="alert alert-error" style="text-align: center;">
                <p id="err"></p>
</div>
<form method="post" action="report_act.php" id="asset_form">
<div align="center">

<h2>Marketing Information</h2>
</div>
<fieldset>
<legend>Enter Marketing Report</legend>
<table class="Record">
 <tr class="Controls">
  
<td style="border:0px;text-align:left">
Client<br/><br/>
<input type="text"  title="Client" id="clnt" maxlength="250" size="27" name="clnt" >
</td> 
<td style="border:0px;text-align:left">
Contact Person<br/><br/>
<input type="text"  title="Contact Person" id="conpersn" name="conpersn" maxlength="250" size="27" />
</td>
</tr>
 <tr class="Controls">
 <td style="border:0px;text-align:left">
Contact Email<br/><br/>
<input type="text"  title="Email of contact" id="cmail" name="cmail" maxlength="250" size="27" />
</td>
<td style="border:0px;text-align:left">
Contact Number<br/><br/>
<input type="text"  title="Contact number" id="cphone" name="cphone" maxlength="250" size="27" />
</td>
</tr>

<tr class="Controls">
<td style="border:0px;text-align:left">
Marketing Method<br/><br/>
<textarea rows="9" cols="35" name="mmthd" id="mmthd"></textarea>
</td>
 <td style="border:0px;text-align:left">
Challenges<br/><br/>
<textarea rows="9" cols="35" name="chllng" id="chllng"></textarea>
</td>
</tr>
<tr class="Controls">
<td style="border:0px;text-align:left">
Date<br/><br/>
<input type="text" class="datepicker" title="Date of Marketing" id="mktdt" name="mktdt" maxlength="250" size="20" />
</td>
<td style="border:0px;text-align:left">
Amount Spent<br/><br/>
<input type="text" title="Amount Spent on Marketing" id="amt" name="amt"  maxlength="250" size="20">
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
