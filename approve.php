	<?php 
include ('includes/header.php');
?>

<?php
include('mysql_connect.php');


<?php
$page_title = 'EMPLOYEE MANAGER';
include ('includes/header.php');
echo '<h2 style: align="center">LEAVE PENDING APPROVAL</h2>';
require_once ('mysql_connect.php');
	
// Make the query:
/*$q = "SELECT * FROM employee WHERE employee.user_id = '$emp';";*/	
$q = "SELECT * FROM trainee";	
$r = mysql_query ($q,$dbc);

// Count the number of returned rows:
$num = mysql_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many assets are there:
	/*echo"<br/>";
echo"<br/>";
	echo "<p>There are currently $num registered assets.</p>\n";*/
	echo"<br/>";
	
	echo '<div class="table-wrapper"> 
		<div class="wrapper-panel">  ';
		
	// Table header.
	echo '<table align="center" cellspacing="3" cellpadding="3" width="100%" id="tabular">
	<thead class="label3">
	<tr>
		<td align="left">Asset Code</td>
		<td align="left">Asset Name</td>
		<td align="left">Asset Manufacturer</td>
		<td align="left">Asset Purchase Value</td>
		<td align="left">Asset Location</td>
		<td align="left">Asset Purchase Date</td>
		<td align="left">Dispose</td>
	</tr>
	</thead>
<tbody>';
	
	// Fetch and print all the records:
	while ($row = mysql_fetch_array($query)) {
		echo ' <tr>
			
			<td align="left">' . $row['assetIDnumber'] . '</td>
			<td align="left">' . $row['asset_name'] . '</td>
			<td align="left">' . $row['assetmanufacturer'] . '</td>
			<td align="left">' . $row['assetpurchasevalue'] . '</td>
			<td align="left">' . $row['assetlocation'] . '</td>
			<td align="left">' . $row['assetpurchasedate'] . '</td>
			<td align="left"><a href="dispose_asset.php?id=' . $row['asset_id'] . '">Dispose</a></td>
			
		</tr>
		
		';
	}
	echo '</tbody> </table>';
	echo '</div> <div class="wrapper-paging">
          <ul>
            <li><a class="paging-back">&lt;</a></li>
            <li><a class="paging-this"><strong>0</strong> of <span>x</span></a></li>
            <li><a class="paging-next">&gt;</a></li>
          </ul>
        </div></div>'; 	// end table_wrapper and wrapper_panel
mysql_free_result ($query);	

} else { // If no records were returned.
	echo '<p class="error">There is problem with the search system .</p>';
}
}
mysql_close($dbc);


// Include the HTML footer.

include ('includes/footer.php');
	?> 
