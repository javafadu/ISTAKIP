<?php
$querykisi = "SELECT username FROM $users ORDER BY username";
$resultkisi = mysql_query($queryofis) or die ("Couldn't execute query - OFISCON.PHP"); 
while($rowkisi = mysql_fetch_array($resultkisi)) {
$username = $rowkisi['username'];
echo "<OPTION value=\"$username\">$username</OPTION>";
}
?>
