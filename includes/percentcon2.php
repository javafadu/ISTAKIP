<?php
$querykisi = "SELECT DISTINCT statusname FROM $taskstable  ORDER BY statusname";
$resultkisi = mysql_query($querykisi) or die ("Couldn't execute query."); 
while($row = mysql_fetch_array($resultkisi)) {
$statusname = $row['statusname'];
echo "<OPTION value=\"$statusname\">$statusname</OPTION>";
}
?>