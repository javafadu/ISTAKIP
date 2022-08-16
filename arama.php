<?php


include 'config.php';
include 'header.php';
include 'format.css';

$today = date ("Y-m-d", mktime (0,0,0,date("m"),date("d"),date("Y")));
$arama = $_POST['arama'];


//Buraya ikinci sorgu alanini ekleyelim




echo "<table width='100%'>";
echo "<tr><td colspan=\"2\" width=\"100%\">";
echo "<table class=\"black\" width=\"100%\" cellspacing=\"0\" align=\"center\" >";

echo "<td align=\"center\"><form name=\"datasort3\" method=\"post\" action=\"arama.php\">";
echo "<input type=\"text\" name=\"arama\" value=\"\" size=\"20\"> <input type=\"submit\" value=\"Ara\">";
echo " </form></td>";

echo "</table>";
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

echo "<td align=\"center\" class=\"bgcolorblu\"><font color=\"#ffffff\"><b>Ayrintilar</b></font></td></tr>";

if ($arama == '1' || $arama == '') {
$sql = "SELECT date_format(last_change, '%Y-%m-%d') as last_change,deadline,open_date,taskid,priority,title,description,statusname,catname,status,display,personnel,ofiskod FROM $taskstable WHERE display = 'Y' AND (statusname != 'Cancelled' AND statusname != 'Complete') ORDER BY deadline ASC";
$result = mysql_query($sql);
}else{
$sql = "SELECT date_format(last_change, '%Y-%m-%d') as last_change,deadline,open_date,taskid,priority,title,description,statusname,catname,status,display,personnel,ofiskod FROM $taskstable WHERE (title LIKE '%$arama%' OR description like '%$arama%') AND display = 'Y' AND (statusname != 'Cancelled' AND statusname != 'Complete') ORDER BY deadline ASC";
$result = mysql_query($sql);
}

while($row = mysql_fetch_array($result)) {
echo "<tr><td>$row[catname]</td>";
echo "<td>$row[ofiskod]</td>";
echo "<td>$row[title]</td>";
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