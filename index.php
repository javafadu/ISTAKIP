<?php


include 'header.php';
include 'format.css';

$today = date ("Y-m-d", mktime (0,0,0,date("m"),date("d"),date("Y")));

$sqluc = "SELECT COUNT(*) FROM $userstable WHERE userlevel = '2'";
$resultuc = mysql_query($sqluc);
$rowuc = mysql_fetch_assoc($resultuc);


$sqlmc = "SELECT COUNT(*) FROM $userstable WHERE userlevel = '3'";
$resultmc = mysql_query($sqlmc);
$rowmc = mysql_fetch_assoc($resultmc);

$sql = "SELECT COUNT(*) FROM $taskstable WHERE (statusname != 'Complete' AND statusname != 'Cancelled') ";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

$sql1 = "SELECT COUNT(*) FROM $taskstable WHERE statusname = 'Complete'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_assoc($result1);

$sql2 = "SELECT COUNT(*) FROM $taskstable WHERE statusname = 'Cancelled'";
$result2 = mysql_query($sql2);
$row2 = mysql_fetch_assoc($result2);

$sql3 = "SELECT COUNT(*) FROM $taskstable";
$result3 = mysql_query($sql3);
$row3 = mysql_fetch_assoc($result3);


echo "<tr><td colspan=\"2\" bgcolor=\"#E6F0FF\"><b>Bugün: $today</b> Görev Durumları	</td></tr>";
if ($row['COUNT(*)'] == '0') {
echo "<tr><td class=\"black\">Bugün için sistemde kayitli bir görev bulunmamaktadir</td></tr>";
}else{
echo "<tr><td><br></td></tr>";
echo "<tr><td>Tüm Görevler:  " .$row3['COUNT(*)']. " </td></tr>";
echo "<tr><td>Aktif Görevler:  " .$row['COUNT(*)']. " </td></tr>";
echo "<tr><td>Tamamlanan Görevler:  " .$row1['COUNT(*)']. " </td></tr>";
echo "<tr><td>İptal Edilen Görevler:  " .$row2['COUNT(*)']. " </td></tr>";
echo "<tr><td>Görev Yöneticisi:  " .$rowmc['COUNT(*)']. " </td></tr>";
echo "<tr><td><br><br> </td></tr>";
}


echo "<tr><td colspan=\"2\" bgcolor=\"#E6F0FF\"><b>Bugün: $today</b> Kişi Durumları	</td></tr>";
if ($row['COUNT(*)'] == '0') {
echo "<tr><td class=\"black\">Bugün için sistemde kayitli işi olan kişi bulunmamaktadir</td></tr>";
}else
{
echo "<tr><td><br></td></tr>";
echo "<tr><td><b>Görevli&emsp;:</b> Yeni &nbsp;|&nbsp; Devam  &nbsp;|&nbsp; İptal &nbsp;|&nbsp; Tamamalanan </td></tr>";
$qrkisiler= "SELECT * FROM $taskstable WHERE (statusname != 'Complete' AND statusname != 'Cancelled') group by personnel ";
$resultkisiler = mysql_query($qrkisiler) or die ("Couldn't execute query - OFISCON.PHP"); 
while($rowkisiler = mysql_fetch_array($resultkisiler)) 
{
$kisilerlist = $rowkisiler['personnel'];
echo "<tr><td>$kisilerlist";

//devam eden iş sayısı
$sqlkisi1 = "SELECT COUNT(*) FROM $taskstable WHERE (statusname != 'Complete' AND statusname != 'Cancelled' AND statusname != 'Received' AND personnel='$kisilerlist') ";
$resultkisi1 = mysql_query($sqlkisi1);
$rowkisi1 = mysql_fetch_assoc($resultkisi1);

//yeni iş sayısı
$sqlkisi2 = "SELECT COUNT(*) FROM $taskstable WHERE (statusname = 'Received' AND personnel='$kisilerlist') ";
$resultkisi2 = mysql_query($sqlkisi2);
$rowkisi2 = mysql_fetch_assoc($resultkisi2);

//iptal iş sayısı
$sqlkisi3 = "SELECT COUNT(*) FROM $taskstable WHERE (statusname =  'Cancelled' AND personnel='$kisilerlist') ";
$resultkisi3 = mysql_query($sqlkisi3);
$rowkisi3 = mysql_fetch_assoc($resultkisi3);

//tamamlanan iş sayısı
$sqlkisi4 = "SELECT COUNT(*) FROM $taskstable WHERE (statusname = 'Complete'  AND personnel='$kisilerlist') ";
$resultkisi4 = mysql_query($sqlkisi4);
$rowkisi4 = mysql_fetch_assoc($resultkisi4);

echo "&emsp;: ".$rowkisi2['COUNT(*)']."";
echo "&nbsp;|&nbsp;";
echo "  ".$rowkisi1['COUNT(*)']."";
echo "&nbsp;|&nbsp;";
echo "  ".$rowkisi3['COUNT(*)']."";
echo "&nbsp;|&nbsp;";
echo " ".$rowkisi4['COUNT(*)']."";
echo "</td></tr>";

}





}

echo "</table>";
echo "</td>";


$queryu = "SELECT * FROM $userstable WHERE (userlevel = '2' OR userlevel = '3' OR userlevel = 'A') AND username = '$tmpname'";
$resultu = mysql_query($queryu); 
$rowu= mysql_fetch_array($resultu);
$userlevel = $rowu['userlevel'];

if($userlevel == '2'){

}else{


include 'includes/inputcheck.php';
echo "<td>";
echo "<table bgcolor=\"#ECECEC\" cellpadding=\"3\" cellspacing=\"0\" align=\"right\" class=\"black\">";





//burada form başlıyor
echo "<tr><form name=\"form1\" method=\"post\" onSubmit=\"return (formCheck(this))\" action=\"complete.php?getid=1\">";
//burada görevin adı kutusu
echo "<tr><td align=\"right\"><b>Görevin Adı:</b><td><textarea name=\"gorevad\" cols=\"32\" rows=\"1\"></textarea><br></td></tr>";
//burada görevin konusu (dropdown list)
echo "<td align=\"right\"><b>Konu:</b></td> ";
echo "<td><select name=\"catname\">";
echo "<option value=\"\"></option>";
include 'includes/catecon.php';
echo"</tr>";

//burada ülkeler

echo "<tr>";
echo "<td align=\"right\"><b>Ülke:</b></td> ";
echo "<td><select name=\"ofiskod\">";
echo "<option value=\"\"></option> ";
include 'includes/ofiscon.php';

echo"</tr>";



//burada öncelik


echo "</select></td></tr>";
for($m = 0;$m <= 0; $m++)
{
$now = date ("Y-m-d", mktime (0,0,0,date("m"),date("d")+$m,date("Y")));
echo "<input type=\"hidden\" name=\"open_date\" value=\"" . $now . "\">";
}
echo "<tr><td align=\"right\"><b>Öncelik:</b></td><td><select name=\"priority\">";
echo "<option value=\"\"></option>";
include 'includes/priorcon.php';
echo "</select> <font size=\"1\">En yüksek öncelik seviyesi 1</font></td></tr>";



//burada görevin içeriği

echo "<tr><td align=\"right\"><b>Görevin Içerigi:</b><td><textarea name=\"description\" cols=\"32\" rows=\"5\"></textarea><br></td></tr>";


//burada görevi kim yapacak, kişi listesi dropdown
echo "<tr><td align=\"right\"><b>Kim Yapacak:</b></td><td><select name=\"personnel\" size=\"9\" multiple>";
include 'includes/personnel.php';
echo "</select></td></tr>";

//burada deadline (bugun itibari ile)
echo "<tr><td align=\"right\"><b>Bitis Zamani:</b><td><select name=\"deadline\">";
for($m = 0;$m <= 365; $m++)
{
$to_date = date ("Y-m-d", mktime (0,0,0,date("m"),date("d")+$m,date("Y")));
echo "<option value=\"" . $to_date . "\">" . $to_date . "</option>\n";
}
echo "</select></td></tr>";
echo "<tr><td colspan=\"2\"><input type=\"submit\" value=\"Görev Ekle\">";
echo "</form></td></tr>";


$sql = "SELECT * FROM $taskstable WHERE taskid = '$taskid' GROUP BY open_date";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
echo "<form name=\"form2\" method=\"post\" onSubmit=\"return (formCheck(this))\" action=\"complete.php?getid=112\"><tr><td bgcolor=\"#ffffff\" align=\"right\" colspan=\"2\"><b>Konu Ayarlari</b></td></tr>";
echo "<tr><td align=\"right\" bgcolor=\"#F2F2F2\" colspan=\"2\"><input type=\"text\" name=\"catname\" value=\"\" size=\"20\"> <input type=\"submit\" value=\"Konu Ekle\"></td></tr></form>";

echo "<form name=\"form2\" method=\"post\" action=\"complete.php?getid=56\"><tr><td align=\"right\" bgcolor=\"#F2F2F2\" colspan=\"2\">
<select name=\"catnamedel\"><option value=\"\"></option>";
include 'includes/catecon.php';
echo "</select> <input type=\"submit\" value=\"Konu Sil\"></td>";
echo "</tr></form>";

echo "</table><br>";
echo "</td>";
}
//Burada sorgulama alani var
echo "<br>";
$cat = $_POST['catname'];
echo "<table valign=\"middle\ class=\"black\" width=\"100%\" cellspacing=\"0\" align=\"center\" bgcolor=#d1d1e0>";
echo "<tr><td align=\"left\"><form name=\"datasort\" method=\"post\" action=\"index.php\"><select name=\"catname\">";
echo "<option value=\"\">::Konulara Göre::</option>";
echo "<option value=\"1\">Bütün Konulari Göster</option>";
include 'includes/catecon2.php';
echo "</select> <input type=\"submit\" value=\"Göster\"></form></td>";

//Buraya ikinci sorgu alanini ekleyelim

echo "<td><form name=\"datasort5\" method=\"post\" action=\"ulkeler.php\"><select name=\"ofiskod\">";
echo "<option value=\"\">::Ülkeler::</option>";
echo "<option value=\"1\">Bütün Ülkeleri Göster</option>";
include 'includes/ofiscon2.php';
echo "</select> <input type=\"submit\" value=\"Göster\"></form></td>";


//burada üçüncü sorgu alani olusturalim

echo "<td><form name=\"datasort4\" method=\"post\" action=\"durumlar.php\"><select name=\"status\">";
echo "<option value=\"\">::Bulunulan Asama::</option>";
echo "<option value=\"1\">Bütün Durumlari Göster</option>";
include 'includes/percentcon2.php';
echo "</select> <input type=\"submit\" value=\"Göster\"></form></td>";

//Burada dördüncü sorgu alanini olusturalim

echo "<td><form name=\"datasort3\" method=\"post\" action=\"kisiler.php\"><select name=\"personnel\">";
echo "<option value=\"\">::Kisilere Göre::</option>";
echo "<option value=\"1\">Bütün Kisileri Göster</option>";
include 'includes/kisicon2.php';
echo "</select> <input type=\"submit\" value=\"Göster\"></form></td>";


//Burada arama sorgu alanini olusturalim

echo "<td><form name=\"datasort3\" method=\"post\" action=\"arama.php\">";
echo "<input type=\"text\" name=\"arama\" value=\"\" size=\"20\"> <input type=\"submit\" value=\"Ara\">";
echo " </form></td>";



echo"</tr></table>";
echo "<table>";

echo "<tr><td bgcolor=\"#ECECEC\" colspan=\"2\">";
include 'includes/hover.js';
echo "</table>";
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

if ($cat == '1' || $cat == '') {
$sql = "SELECT date_format(last_change, '%Y-%m-%d') as last_change,deadline,open_date,taskid,priority,title,description,statusname,catname,status,display,personnel,ofiskod FROM $taskstable WHERE display = 'Y' AND (statusname != 'Cancelled' AND statusname != 'Complete') ORDER BY deadline ASC";
$result = mysql_query($sql);
}else{
$sql = "SELECT date_format(last_change, '%Y-%m-%d') as last_change,deadline,open_date,taskid,priority,title,description,statusname,catname,status,display,personnel,ofiskod FROM $taskstable WHERE display = 'Y' AND catname = '$cat' AND (statusname != 'Cancelled' AND statusname != 'Complete') ORDER BY deadline ASC";
$result = mysql_query($sql);
}

while($row11 = mysql_fetch_array($result)) {
echo "<tr><td>$row11[catname]</td>";
echo "<td>$row11[ofiskod]</td>";
echo "<td>$row11[title]</td>";

echo "<td align=\"center\">$row11[priority]</td>";
echo "<td align=\"center\">$row11[statusname]</td>";
echo "<td align=\"center\">$row11[personnel]</td>";
echo "<td align=\"center\">$row11[open_date]</td>";
if ($today >= $row11[deadline]) {
echo "<td bgcolor=\"#FF8181\" align=\"center\"><b>$row11[deadline]</b></td>";
}else{
echo "<td align=\"center\">$row11[deadline]</td>";
}

echo "<td align=\"center\">$row11[last_change]</td>";

echo "<td align=\"center\"><a href=\"edit.php?taskid=$row11[taskid]\">Detay / Düzenle</a></tr>";
}






echo "</table>";

echo "</td></tr></table>";
include 'footer.php';

?>