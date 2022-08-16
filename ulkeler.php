<?php


include 'config.php';
include 'header.php';
include 'format.css';

$today = date ("Y-m-d", mktime (0,0,0,date("m"),date("d"),date("Y")));
$ulke = $_POST['ofiskod'];


//Buraya ikinci sorgu alanini ekleyelim

echo "<table width='100%'>";
echo "<tr><td colspan=\"2\" width=\"100%\">";
echo "<table class=\"black\" width=\"100%\" cellspacing=\"0\" align=\"center\" >";
echo "<td align=\"center\"><form name=\"datasort3\" method=\"post\" action=\"ulkeler.php\"><select name=\"ofiskod\">";
echo "<option value=\"\"></option>";
echo "<option value=\"1\">Bütün Ülkeleri Göster</option>";
include 'includes/ofiscon2.php';
echo "</select> <input type=\"submit\" value=\"Göster\"><form></td></tr></table>";
echo "</td></tr>";

echo "<tr><td bgcolor=\"#ECECEC\" colspan=\"2\">";
include 'includes/hover.js';
echo "<table class=\"tbl\" width=\"100%\" border=\"1\" cellspacing=\"0\" bordercolor=\"#ECECEC\" align=\"center\" >";
echo "<tr><td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Konu</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Ülke</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Görevin Adı</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Öncelik</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Durum</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Kisi</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Baslangiç</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Bitis</b></font></td>";
echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Son Güncelleme</b></font></td>";

echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Düzenle</b></font></td></tr>";

if ($ulke == '1' || $ulke == '') {

$sql = "SELECT date_format(last_change, '%Y-%m-%d') as last_change,deadline,open_date,taskid,priority,title,description,statusname,catname,status,display,personnel,ofiskod FROM $taskstable WHERE display = 'Y' AND (statusname != 'Cancelled' AND statusname != 'Complete') ORDER BY deadline ASC";
$result = mysql_query($sql);
}else{
$sql = "SELECT date_format(last_change, '%Y-%m-%d') as last_change,deadline,open_date,taskid,priority,title,description,statusname,catname,status,display,personnel,ofiskod FROM $taskstable WHERE display = 'Y' AND ofiskod = '$ulke' AND (statusname != 'Cancelled' AND statusname != 'Complete') ORDER BY deadline ASC";
$result = mysql_query($sql);
}

while($row = mysql_fetch_array($result)) {
echo "<tr><td>$row[catname]</td>";
echo "<td>$row[ofiskod]</td>";
echo "<td>$row[description]</td>";
echo "<td align=\"center\">$row[priority]</td>";
echo "<td align=\"center\">$row[statusname]</td>";
echo "<td align=\"center\">$row[personnel]</td>";
echo "<td align=\"center\">$row[open_date]</td>";
if ($today >= $row[deadline]) {
echo "<td bgcolor=\"#FF8181\" align=\"center\"><b>$row[deadline]</b></td>";
}else{
echo "<td align=\"center\">$row[deadline]</td>";
}

echo "<td align=\"center\">$row[last_change]</td>";

echo "<td align=\"center\"><a href=\"edit.php?taskid=$row[taskid]\">Detay / Düzenle</a></tr>";
}


include 'footer.php';
?>