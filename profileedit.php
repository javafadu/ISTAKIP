<?php
include 'header.php';
include 'format.css';
$realname = strip_tags($_POST[realname]);
$workphone = strip_tags($_POST[workphone]);
$email = strip_tags($_POST[email]);
$location = strip_tags($_POST[location]);
$department = strip_tags($_POST[department]);
$password = strip_tags($_POST[password]);



if($_POST['realname'] == ""){
        } else {
$query = "UPDATE $userstable SET realname = '$realname'
           WHERE username = '$tmpname'";
$result = mysql_query($query) or die ("Couldn't execute query realname.");
}

if($_POST['workphone'] == ""){
        } else {
$query2 = "UPDATE $userstable SET workphone = '$workphone'
           WHERE username = '$tmpname'";
$result2 = mysql_query($query2) or die ("Couldn't execute query workphone.");
}

if($_POST['email'] == ""){
        } else {
$query2 = "UPDATE $userstable SET email = '$email'
           WHERE username = '$tmpname'";
$result2 = mysql_query($query2) or die ("Couldn't execute query email.");
}

if($_POST['department'] == ""){
        } else {
$query4 = "UPDATE $userstable SET department = '$department'
           WHERE username = '$tmpname'";
$result4 = mysql_query($query4) or die ("Couldn't execute query department.");
}

if($_POST['location'] == ""){
        } else {
$query4 = "UPDATE $userstable SET location = '$location'
           WHERE username = '$tmpname'";
$result4 = mysql_query($query4) or die ("Couldn't execute query location.");
}

if($_POST['password'] == ""){
        } else {
$query4 = "UPDATE $userstable SET password = md5('$password')
           WHERE username = '$tmpname'";
$result4 = mysql_query($query4) or die ("Couldn't execute query password.");
}



echo "<tr><td bgcolor=\"#E6F0FF\"><b>Profiliniz Güncellendi</b></td></tr>";

echo "<table class=\"black\" align=\"center\" border=\"0\" cellspacing=\"1\" width=\"30%\">";
echo "<tr><td align=\"center\"><b>Güncellenmis Bilgileriniz.</b><br><br></td></tr>";
echo "<tr><td valign=\"top\">Isim: <b>$realname</b></td></tr>";
echo "<tr><td valign=\"top\">Telefon: <b>$workphone</b></td></tr>";
echo "<tr><td valign=\"top\">Görev: <b>$location</b></td></tr>";
echo "<tr><td valign=\"top\">Çalistiginiz Bölüm: <b>$department</b></td></tr>";
echo "<tr><td valign=\"top\">Email: <b>$email</b></td></tr></table>";


echo "<br><br><br></td></tr></table>";

echo "</td>";
echo "</tr>";
echo "</table></td></tr></table>";		
include 'footer.php';
?>