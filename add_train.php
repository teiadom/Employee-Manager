<?php 
include ('includes/header.php');
require_once ('mysql_connect.php');

?>
<div class="cont">
<div class="alert alert-error" style="text-align: center;">
                <p id="err"></p>
</div>
<form method="post" action="train_act.php" id="asset_form">
<div align="center">

<h3>Enter Trainee Information</h3>
</div>
<fieldset>
<legend> Data Registration</legend>
<table class="Record">
 <tr class="Controls">
  
<td style="border:0px;text-align:left">
Surname<br/><br/>
<input type="text"  title="Surname of Trainee" id="tsname" maxlength="250" size="27" name="tsname" >
</td> 
<td style="border:0px;text-align:left">
Other Name(s)<br/><br/>
<input type="text"  title="First Name of trainee" id="toname" name="toname" maxlength="250" size="27" />
</td>
</tr>
 <tr class="Controls">
 <td style="border:0px;text-align:left">
Course<br/><br/>
<input type="text"  title="Course" id="crse" name="crse" maxlength="250" size="27" />
</td>
<td style="border:0px;text-align:left">
Month/Year<br/><br/>
<input type="text"  title="MY" id="my" name="my" maxlength="250" size="27" />
</td>
</tr>
 <tr class="Controls">
 <td style="border:0px;text-align:left">
Phone<br/><br/>
<input type="text"  title="Phone of trainee" id="fone" name="fone" maxlength="250" size="27" />
</td>
 <td style="border:0px;text-align:left">
Email<br/><br/>
<input type="text"  title="Email of trainee" id="mail" maxlength="250" size="27" name="mail" >
</td> 
</tr>

<tr class="Controls">
<td style="border:0px;text-align:left">
Place of Work<br/><br/>
<input type="text"  title="Place of Work" id="wrkp" name="wrkp" maxlength="250" size="27" />
</td>
<td style="border:0px;text-align:left">
Training City<br/><br/>
<input type="text"  title="Training City" id="tcity" name="tcity" maxlength="250" size="27" />
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
