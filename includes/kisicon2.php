<?php
$queryper = "SELECT DISTINCT personnel FROM $taskstable WHERE (statusname != 'Cancelled' AND statusname != 'Complete') ORDER BY personnel";
$resultper = mysql_query($queryper) or die ("Couldn't execute query."); 
while($rowper = mysql_fetch_array($resultper)) {
$personnel = $rowper['personnel'];
echo "<OPTION value=\"$personnel\">$personnel</OPTION>";
}
?>