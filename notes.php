<?php
include 'header.php';
include 'format.css';

$taskid = $_GET['taskid'];

$sql = "SELECT * FROM $taskstable WHERE taskid = '$taskid'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


echo "<tr><td colspan=\"2\" bgcolor=\"#E6F0FF\"><b>Is Takibi:</b> Görevlere Yazilmis Notlar</td></tr>";

echo "<table align =\"center\" width=\40%\" class=\"black\">";
echo "<tr><td><br><u><b>$row[personnel]'nin</b>  $row[title] daki notlari</u></td></tr>";

$sqln = "SELECT notes FROM $historytable WHERE taskid = '$taskid' ORDER BY time_stamp DESC";
$resultn = mysql_query($sqln);
$rown = mysql_fetch_array($resultn);
if ($rown[notes] == ""){
echo "<tr><td><b>Bu görev için yazilmis yazi veya not bulunmuyor.</td></tr>";
} else {
$sqlno = "SELECT date_format(time_stamp, '%m-%d-%Y') as date,notes FROM $historytable WHERE taskid = '$taskid' ORDER BY time_stamp ASC";
$resultno = mysql_query($sqlno);
while($rowno = mysql_fetch_array($resultno)) {
echo "<tr><td><b>$rowno[date]:</b> $rowno[notes]</td></tr>";
}
}
echo "<tr><td><br><br> <b>Bu görevin yöneticisi: <font color=\"blue\">$row[manager]</font></b></td></tr>";
echo "<form name=\"form1\" method=\"post\"><tr><td align =\"center\"><br><br><input type=\"button\" value=\"Geri \" onClick=\"javascript:history.go(-1)\"/><br><br></td></form></tr></table>";

echo "</table>";

include 'footer.php';
?> 