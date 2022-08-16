<?php
include 'header.php';
include 'format.css';


$queryu = "SELECT * FROM $userstable WHERE (userlevel = '2' OR userlevel = '3' OR userlevel = 'A') AND username = '$tmpname'";
$resultu = mysql_query($queryu); 
$rowu= mysql_fetch_array($resultu);
$userlevel = $rowu['userlevel'];



$sql =  "SELECT * FROM $userstable  ORDER BY username";

$result = mysql_query($sql)
        or die ("Couldn't execute query.");

$num_rows = mysql_num_rows($result);

echo "<tr><td bgcolor=\"#E6F0FF\"><b>Takim Üyeleri</b></td></tr>";
echo "<tr><td align=\"center\"><font face=\"Arial\" size=\"2\">Sistemde Kayitli Kisiler<br><br>";
echo "<br> Toplam Kisi Sayisi: $num_rows";
echo "<br><table class=\"black\" border=\"1\" bordercolor=\"#ECECEC\" cellspacing=\"1\" cellpadding=\"3\">";
echo "<tr> <td align=\"center\"><b>Kullanici Adi</b></td> <td align=\"center\"><b>E-Mail Adresi</b></td><td align=\"center\"><b>Telefonu</b></td><td> Yetki Seviyesi </td> <td align=\"center\"><b>Profil</b></td><td align=\"center\"><b>Sil</b></td></tr>";
while($row = mysql_fetch_array( $result )) {

echo "<tr><td>$row[username]</td>";
echo "<td>$row[workphone]</td>";
echo "<td align=\"center\">$row[email]</td>";
echo "<td align=\"center\">$row[userlevel]</td>";
echo "<td align=\"center\"><a href=\"viewprofile.php?name=$row[username]\">Incele</a></font></td>";

if($userlevel == 'A' )
{
echo "<td align=\"right\"><form name=\"form5\" method=\"post\" action=\"complete.php?getid=87&kisisil=$row[username]\"> <input type=\"submit\" value=\"Sil\"></form></td>";
}
{
echo "Yetkiniz Yok";
}


echo "</tr>";
}
echo "</table>";

echo "<br><br><br></td></tr></table>";

echo "</td>";
echo "</tr>";
echo "</table></td></tr></table>";
include 'footer.php';
?>