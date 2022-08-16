<?php
include 'header.php';
include 'format.css';

$taskid = $_GET['taskid'];


$today = date ("Y-m-d", mktime (0,0,0,date("m"),date("d"),date("Y")));

$sqlm = "SELECT * FROM $taskstable WHERE taskid = '$taskid' GROUP BY open_date";
$resultm = mysql_query($sqlm);
$rowm = mysql_fetch_array($resultm);
$userchk = $rowm['personnel'];

echo "<tr><td colspan=\"2\" bgcolor=\"#E6F0FF\"><b>Görev Yöneticisi:</b> Güncellenen Görevleri Izle</td></tr>";
echo "<tr><td><br><u><b>Notlar</b></u></td></tr>";



$sqln = "SELECT notes FROM $historytable WHERE taskid = '$taskid' ORDER BY time_stamp DESC";
$resultn = mysql_query($sqln);
$rown = mysql_fetch_array($resultn);
if ($rown[notes] == ""){
echo "<tr><td><b>Güncel herhangi bir yazi bulunmamaktadir.</td></tr>";
} else {

$sqlno = "SELECT date_format(time_stamp, '%m-%d-%Y') as date,notes,notekleyen FROM $historytable WHERE taskid = '$taskid' ORDER BY time_stamp DESC";
$resultno = mysql_query($sqlno);
while($rowno = mysql_fetch_array($resultno)) {
echo "<tr><td><b>$rowno[date] ($rowno[notekleyen]) :</b> $rowno[notes]</td></tr>";
}
}

echo "</table>";

echo "<br></td>";

$queryu = "SELECT * FROM $userstable WHERE (userlevel = '2' OR userlevel = '3' OR userlevel = 'A') AND username = '$tmpname'";
$resultu = mysql_query($queryu); 
$rowu= mysql_fetch_array($resultu);
$userlevel = $rowu['userlevel'];


if($userchk == $tmpname && $userlevel == '2'){
echo "<td>";
include 'includes/asinputcheck.php';
echo "<table bgcolor=\"#ECECEC\" cellpadding=\"3\" cellspacing=\"0\" align=\"right\" class=\"black\">";
echo "<tr><form onSubmit=\"return (formCheck(this))\" name=\"form1\" method=\"post\" action=\"complete.php?getid=23&taskid=$rowm[taskid]\">";

echo "<tr><td align=\"right\"><b>Notlar:</b><td><textarea name=\"notes\" cols=\"38\" rows=\"5\"></textarea><br></td><td bgcolor=\"#E4E4E4\"></td></tr>";


echo "<tr><td align=\"right\"><b>Görev Durumu:</b><td> <select name=\"statusname\">";
include 'includes/statuscon.php';
echo "</select><br></td><td bgcolor=\"#E4E4E4\"></td></tr>";

echo "</select></td><td bgcolor=\"#E4E4E4\"></td></tr>
<tr><td><input type=\"button\" value=\"Degisikligi Iptal Et\" onClick=\"javascript:history.go(-1)\"/></td><td><input type=\"submit\" value=\"Görevi Güncelle\"></td></form></tr></table>";

echo "</td>";

}

if($userlevel == '3' || $userlevel == 'A' ){
echo "<td>";
echo "<table bgcolor=\"#ECECEC\" cellpadding=\"5\" cellspacing=\"0\" align=\"right\" class=\"black\">";
echo "<tr><form name=\"form1\" method=\"post\" action=\"complete.php?getid=17&taskid=$rowm[taskid]\">";
echo "<td colspan=\"2\"><b>Yönetici: <font color=\"blue\">$rowm[manager]</font></b></td> ";

echo "<tr><td align=\"right\"><b>Görevin Adı:</b><td><textarea name=\"gorevad\" cols=\"32\" rows=\"1\">$rowm[title]</textarea><br></td></tr>";
echo "<tr><td bgcolor=\"#E4E4E4\" align=\"right\"><b>Konu:</b></td> ";
echo "<td bgcolor=\"#E4E4E4\"><select name=\"catname\">";
echo "<option value=\"$rowm[catname]\">$rowm[catname]</option>";
include 'includes/catecon.php';
echo "</select></td></tr>";


echo "<tr><td bgcolor=\"#E4E4E4\" align=\"right\"><b>Ülke:</b></td> ";
echo "<td bgcolor=\"#E4E4E4\"><select name=\"ofiskod\">";
echo "<option value=\"$rowm[ofiskod]\">$rowm[ofiskod]</option>";
include 'includes/ofiscon.php';
echo "</select></td></tr>";


echo "<tr><td align=\"right\"><b>Öncelik:</b></td><td><select name=\"priority\">";
include 'includes/priorcon.php';
echo "</select> <font size=\"1\">önceligi en üst seviye 1 dir</font></td></tr>";






echo"<tr><td align=\"right\"><b>Görev Içerigi:</b><td><textarea name=\"description\" cols=\"32\" rows=\"5\">$rowm[description]</textarea><br></td></tr>";

echo "<tr><td align=\"right\"><b>Kim Yapacak:</b><td><select name=\"personnel\">";
echo "<option value=\"$rowm[personnel]\">$rowm[personnel]</option>";
include 'includes/personnel.php';
echo "</select></td></tr>";

echo "<tr><td bgcolor=\"#E4E4E4\" align=\"right\"><b>Bitis Tarihi:</b><td bgcolor=\"#E4E4E4\"><select name=\"deadline\">";
echo "<option value=\"$rowm[deadline] \">$rowm[deadline]</option>\n";
for($m = 0;$m <= 90; $m++)
{
$to_date = date ("Y-m-d", mktime (0,0,0,date("m"),date("d")+$m,date("Y")));
echo "<option value=\"" . $to_date . "\">" . $to_date . "</option>\n";
}
echo "</select><br></td></tr>

<tr><td align=\"right\"><b>Görev Durumu:</b><td> <select name=\"statusname\">";
include 'includes/statuscon.php';
echo "</select><br></td></tr>";


echo"<tr><td align=\"right\" bgcolor=#fcf5b8><b><font color=brown>Yeni Görev Notu</font></b><td bgcolor=#fcf5b8><textarea name=\"notes\" cols=\"32\" rows=\"5\"></textarea><br></td></tr>";




echo "</select></td></tr>
<tr><td><input type=\"submit\" value=\"Görevi Güncelle\"></td></form></tr>";

echo "<tr><td align=\"right\" colspan=\"2\"><br><br><form name=\"form2\" method=\"post\" action=\"complete.php?getid=86&taskid=$rowm[taskid]\"><input type=\"button\" value=\"Degisiklik Iptal\" onClick=\"javascript:history.go(-1)\"/> <input type=\"submit\" value=\"Görevi Sil\"></form>Dikkat!: Silerseniz tüm görev ve notlar da silinecektir.</td></tr></table>";

}
echo "</td>";
echo "</tr>";

echo "<tr><td bgcolor=\"#ECECEC\" colspan=\"2\">";
echo "<table class=\"tbl\" width=\"100%\" border=\"1\" cellspacing=\"0\" bordercolor=\"#ECECEC\" align=\"center\" >";
echo "<tr><td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Konu</b></font></td>";

echo "<td width=\"30%\" align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Görev Içerigi</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Öncelik</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Durum</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Kisi</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Baslangiç</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Bitis</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Son Güncelleme</b></font></td>";

$sqldis = "SELECT date_format(last_change, '%Y-%m-%d') as last_change,date_format(deadline, '%Y-%m-%d') as deadline,open_date,taskid,priority,title,description,statusname,catname,status,display,personnel FROM $taskstable WHERE taskid = '$taskid' ORDER BY open_date DESC";
$resultdis = mysql_query($sqldis);
while($rowdis = mysql_fetch_array($resultdis)) {
echo "<tr class=\"bgcolor5\" ><td>$rowdis[catname]</td>";

echo "<td class=\"bgcolor5\" >$rowdis[description]</td>";
echo "<td class=\"bgcolor5\"  align=\"center\">$rowdis[priority]</td>";
echo "<td class=\"bgcolor5\"  align=\"center\">$rowdis[statusname]</td>";
echo "<td class=\"bgcolor5\"  align=\"center\">$rowdis[personnel]</td>";
echo "<td class=\"bgcolor5\"  align=\"center\">$rowdis[open_date]</td>";
if ($today >= $rowdis[deadline]) {
echo "<td bgcolor=\"#FF8181\" align=\"center\"><b>$rowdis[deadline]</b></td>";
}else{
echo "<td align=\"center\">$rowdis[deadline]</td>";
}
echo "<td class=\"bgcolor5\"  align=\"center\">$rowdis[last_change]</td>";

}


echo "</table></td></tr></table>";
echo "<table width=\"100%\" align=\"center\"><tr><td align=\"center\"><form name=\"form1\" method=\"post\"><tr><td align =\"center\"><br><br><input type=\"button\" value=\"Görevlere Geri Dön\" onClick=\"javascript:history.go(-1)\"/><br><br></td></form></tr></table>";
include 'footer.php';
?>