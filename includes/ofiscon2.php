<?php
$query = "SELECT DISTINCT ofiskod FROM $taskstable WHERE (statusname != 'Cancelled' AND statusname != 'Complete') ORDER BY ofiskod";
$result = mysql_query($query) or die ("Couldn't execute query."); 
while($row = mysql_fetch_array($result)) {
$ofiskod = $row['ofiskod'];
echo "<OPTION value=\"$ofiskod\">$ofiskod</OPTION>";
}
?>