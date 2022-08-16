<?php
include 'header.php';
include 'format.css';
$access = $_POST['access'];
$name = $_GET['name'];

$sql = "UPDATE $userstable SET userlevel ='$access' WHERE username = '$name'";
$result = mysql_query($sql);

echo "<tr><td bgcolor=\"#E6F0FF\"><b>Degisiklik Durumu</b></td></tr>";

echo "<tr><td align=\"center\"><br><br><br><b>$name'nin yetki durumu degistirilmistir!</b><br><form name=\"form1\" method=\"post\" action=\"members.php\">
<input type=\"submit\" value=\"Kisiler Sayfasina Dön\"></form></td></tr>";

echo "</table></td></tr></table>";

include 'footer.php';
?>