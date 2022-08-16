<?php

include 'config.php';


$tmp = $_GET['action'];
if($tmp == "signout"){
$cookie_name = "auth";
$cookie_value = "";
$cookie_expire = "0";
$cookie_domain = $domain;
setcookie($cookie_name, $cookie_value, $cookie_expire, "/", $cookie_domain, 0);
header ("Location: http://" . $domain . $directory . "login.php");
}

$connection = @mysql_connect($hostname, $user, $pass) or die(mysql_error());
$db = mysql_select_db($database, $connection) or die(mysql_error());

list($cookie, $tmpname) =
   explode("!", $_COOKIE[auth], 2);





if($cookie == "fook"){
        $sqlcheckaccount = "SELECT username FROM $userstable WHERE username = '$tmpname'";

        $resultcheckaccount = mysql_query($sqlcheckaccount)
        or die ("Couldn't execute query.");
        $numcheckaccount = mysql_num_rows($resultcheckaccount);
        if($numcheckaccount == 0){
                                  echo "Üzgünüm, Sistemde böyle bir kullanici yok.";
                                  die;
                                  }
}else{
header ("Location: http://" . $domain . $directory . "login.php");
exit;
}
echo "<table cellspacing=\"0\" class=\"black\" width=\"100%\" border=\"3\" bordercolor=\"#ECECEC\">";
echo "<tr><td colspan=\"2\"><table class=\"black\" width=\"100%\"><tr><td bgcolor=#EFEFEF><img src=\"images/taskdriverlogo.jpg\"></td><td align=\"center\" bgcolor=#EFEFEF><font color='blue' size=\"5\">ASWA Group - KRK Follow-Up</font></td><td align=\"right\" bgcolor=#EFEFEF> Hosgeldin <b>$tmpname</b></td></tr></table></td></tr>";
echo "<tr>";

echo "<td width=\"100%\" valign=\"top\">";

echo "<table width=\"100%\" cellspacing=\"0\" class=\"black\">";
echo "<tr><td><a href=\"index.php?action=signout\"><font color='#brown'>Güvenli Çıkış</a></font> | <a href=\"members.php\">Kisiler</a> | <a href=\"register.php\">Yeni Kullanici</a> | <a href=\"profile.php\"><font color='#brown'>Bilgilerim</a></font> | <a href=\"index.php\">Is Takip Anasayfa</a> |  <a href=\"..\dokumanlar\index.php\" target='blank'><font color='#brown'><u>Dökümanlar</u></a></font> | </td></tr><tr><td><br></td></tr>";
?>