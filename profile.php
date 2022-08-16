<?php
include 'header.php';
include 'format.css';

$email = strip_tags($_POST[email]);
$realname = strip_tags($_POST[realname]);
$workphone = strip_tags($_POST[workphone]);
$department = strip_tags($_POST[department]);
$location = strip_tags($_POST[location]);

$tmpsql = "SELECT realname FROM $userstable WHERE username = '$tmpname'";
$tmpresult = mysql_query($tmpsql) or die ("Couldn't execute query.");
$tmprealname = strip_tags(mysql_result($tmpresult,0));

$tmpsql2 = "SELECT workphone FROM $userstable WHERE username = '$tmpname'";
$tmpresult2 = mysql_query($tmpsql2) or die ("Couldn't execute query.");
$tmpworkphone = strip_tags(mysql_result($tmpresult2,0));

$tmpsql3 = "SELECT email FROM $userstable WHERE username = '$tmpname'";
$tmpresult3 = mysql_query($tmpsql3) or die ("Couldn't execute query.");
$tmpemail = strip_tags(mysql_result($tmpresult3,0));

$tmpsql4 = "SELECT location FROM $userstable WHERE username = '$tmpname'";
$tmpresult4 = mysql_query($tmpsql4) or die ("Couldn't execute query.");
$tmplocation = strip_tags(mysql_result($tmpresult4,0));

$tmpsql5 = "SELECT department FROM $userstable WHERE username = '$tmpname'";
$tmpresult5 = mysql_query($tmpsql5) or die ("Couldn't execute query.");
$tmpdepartment = strip_tags(mysql_result($tmpresult5,0));

if($_POST['realname'] == ""){
        } else {
$query = "UPDATE $userstable SET realname = '$realname'
           WHERE username = '$tmpname'";
$result = mysql_query($query)
           or die ("Couldn't execute query.");
}

if($_POST['workphone'] == ""){
        } else {
$query2 = "UPDATE $userstable SET workphone = '$workphone'
           WHERE username = '$tmpname'";
$result2 = mysql_query($query2)
           or die ("Couldn't execute query.");
}

if($_POST['location'] == ""){
        } else {
$query4 = "UPDATE $userstable SET location = '$location'
           WHERE username = '$tmpname'";
$result4 = mysql_query($query4)
           or die ("Couldn't execute query.");
}

if($_POST['department'] == ""){
        } else {
$query5 = "UPDATE $userstable SET department = '$department'
           WHERE username = '$tmpname'";
$result5 = mysql_query($query5)
           or die ("Couldn't execute query.");
}

// START PROFILE PAGE

$sql =  "SELECT * FROM $userstable ORDER BY username";
$result = mysql_query($sql) or die ("Couldn't execute query - profile.php");
$num_rows = mysql_num_rows($result);

echo "<tr><td bgcolor=\"#E6F0FF\"><b>Bilgilerini Güncelle</b></td></tr>";

echo "<table class=\"black\" align=\"center\" border=\"0\" cellspacing=\"1\" width=\"100%\">";
echo "<tr><td align=\"center\"><br><br><b>$tmpname</b>: Bilgilerini Güncelle. Bütün alanlar doldurulmalidir.</b><br><br><br><br></td></tr><table>";
echo "<form method=\"POST\" action=\"profileedit.php\">";
echo "<table class=\"black\" align=\"center\" border=\"0\" cellspacing=\"0\" width=\"45%\">";
echo "<tr><td align=\"right\" valign=\"absbottom\"> <b>Gerçek Isminiz:</b></td><td><input type=\"text\" name=\"realname\" size=\"20\" value=\"$tmprealname\"><br><font size=\"1\">(Isim ve Soyisim)</font><br><br></td></td></tr>";
echo "<tr><td align=\"right\" valign=\"absbottom\"> <b>Telefon Numaraniz:</b></td><td><input type=\"text\" name=\"workphone\" size=\"20\" value=\"$tmpworkphone\"><br><font size=\"1\">(ör: 05554443322)</font><br><br></td></tr>";

echo "<tr><td align=\"right\" valign=\"absbottom\"> <b>Görevi:</b></td><td><input type=\"text\" name=\"location\" size=\"20\" value=\"$tmplocation\"><br><font size=\"1\">(uzman, uzman yardimcisi, müdür ...)</font><br><br></td></tr>";

echo "<tr><td align=\"right\" valign=\"absbottom\"> <b>Bölümü:</b></td>";
echo "<td><select name=\"department\"><option value=\"$tmpdepartment\">$tmpdepartment</option>";
include './includes/catecon.php';
echo "</select><br><font size=\"1\">(Çalistiginiz Bölüm)</font><br><br></td></tr>";

echo "<tr><td align=\"right\" valign=\"absbottom\"> <b>Email Adresiniz:</b></td><td><input type=\"text\" name=\"email\" size=\"20\" value=\"$tmpemail\"><br><font size=\"1\">(asd@asa.com)</font><br><br></td></tr>";
echo "<tr><td align=\"right\" valign=\"absbottom\"> <b>Sifreniz:</b></td><td><input type=\"password\" name=\"password\" size=\"20\" value=\"\"><br><font size=\"1\">(en az 6 karakter olmali)</font><br><br></td></tr>";
echo "<tr><td colspan=\"2\" align=\"center\"><br><br><input type=\"submit\" value=\"Degisiklikleri Kaydet\" name=\"B1\"></td></tr></table>";
echo "</form>";

echo "<br><br><br></td></tr></table>";

echo "</td>";
echo "</tr>";
echo "</table></td></tr></table>";		
include 'footer.php';
?>