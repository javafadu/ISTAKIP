<?php
$queryofis = "SELECT ofisulke FROM $ofistable ORDER BY ofisulke";
$resultofis = mysql_query($queryofis) or die ("Couldn't execute query - OFISCON.PHP"); 
while($rowofis = mysql_fetch_array($resultofis)) {
$ofiskod = $rowofis['ofisulke'];
echo "<OPTION value=\"$ofiskod\">$ofiskod</OPTION>";
}
?>
