<?php

include 'config.php';

function is_alphachar($text) {

    for ($i = 0; $i < strlen($text); $i++) {

           if (!preg_match('/^[A-Za-z0-9]+$/', $text[$i])) {
                    return 1;
    }
    }
    }
function  checkEmail($email) {
 if (!preg_match("/^( [a-zA-Z0-9] )+( [a-zA-Z0-9\._-] )*@( [a-zA-Z0-9_-] )+( [a-zA-Z0-9\._-] +)+$/" , $email)) {
  return false;
 }
 return true;
}
?>
<script language="JavaScript">
function validate(form) {
  var elem = form.elements;
  if(elem.password.value != elem.confirm.value) {
    alert("Please confirm passwords, They do not match");
    return false;
  }
  return true;
}
</script>
<?php
include 'format.css';
$form .= "<br><br><br><br><br><br><br><br>";
$form .= "<table cellpadding=\"3\" class=\"boldb\" width=\"100%\" align=\"center\"><tr><td align=\"right\"><img align=\"absmiddle\" src=\"images/taskdriverlogo.jpg\"> </td><td width=\"42%\" bgcolor=\"#E6F0FF\"><b><i>Hesap Açma</i></b></td><td bgcolor=\"#EBF3FE\"></td><td bgcolor=\"#F1F6FD\"></td><td bgcolor=\"#F4F8FD\"></td><td bgcolor=\"#F6F9FD\"></td><td bgcolor=\"#F9FBFD\"></td><td bgcolor=\"#FDFDFD\"></td></tr></table>";
$form .= "<table align=\"center\" class=\"black\" width=\"100%\">";
$form .= "<tr><td align=\"center\" colspan=\"3\">Sifreniz unuttugunuz zaman yeni sifreniz buradaki mail adresine gelecektir.<br></td></tr>";
$form .= "<tr><td><br></td></tr>";
$form .= "<form action=\"./register.php\" method=\"POST\" onsubmit=\"return validate(this);\">";
$form .= "<tr><td width=\"40%\" align=\"right\"><b>* Kullanici Adi:</b></td><td width=\"10%\"><input type=\"text\" name=\"username\" value=\"$_POST[username]\"></td><td><font size=\"1\">Kullanilmayan seçin</font></td></tr>";
$form .= "<tr><td width=\"40%\" align=\"right\"><b>* Gerçek Isim:</b></td><td width=\"10%\"><input type=\"text\" name=\"realname\" value=\"$_POST[realname]\"></td><td><font size=\"1\">Isim ve Soyisim</font></td></tr>";
$form .= "<tr><td width=\"40%\" align=\"right\"><b>* Görev:</b></td><td width=\"10%\"><input type=\"text\" name=\"location\" value=\"$_POST[location]\"></td><td><font size=\"1\">ör: uzman, uzman yardimcisi, müdür vs.</font></td></tr>";

$form .= "<tr><td align=\"right\" valign=\"absbottom\"> <b>Çalstigi Bölüm:</b></td>";
$form .= "<td><select name=\"department\"><option value=\"$tmpdepartment\">$tmpdepartment</option>";
include './includes/cateconfront.php';
$form .= "</select></td><td><font size=\"1\"></font></td></tr>";


$form .= "<tr><td width=\"40%\" align=\"right\"><b>* Telefon:</b></td><td width=\"10%\"><input type=\"text\" name=\"workphone\" value=\"$_POST[workphone]\"></td><td><font size=\"1\">ör: 05554443322</font></td></tr>";
$form .= "<tr><td width=\"40%\" align=\"right\"><b>* Email:</b></td><td><input type=\"text\" name=\"email\" value=\"$_POST[email]\"></td><td><font size=\"1\"></font></td></tr>";
$form .= "<tr><td width=\"40%\" align=\"right\"><b>* Sifre:</b></td><td><input type=\"password\" name=\"password\" value=\"$_POST[password]\"></td><td><font size=\"1\">Sifreniz en az 6 karakter uzunlugunda olmalidir</font></td></tr>";
$form .= "<tr><td width=\"40%\" align=\"right\"><b>* Yeniden Sifre:</b></td><td><input type=\"password\" name=\"confirm\" value=\"$_POST[password]\"></td><td></td></tr>";
$form .= "<tr><td width=\"40%\"></td><td><br><input type=\"submit\" value=\"Üye Olustur\"></td><td></td></tr>";
$form .= "</form>";
$form .= "</table>";


if($_POST[username] == ""){
echo $form;
} elseif(strlen($_POST[password]) < 6){
echo $form;
echo "<table class=\"black\" align=\"center\"><tr><td align=\"center\"><br><b>HATA: <font color=red>Sifreniz en az 6 karakter olmalidir</b></font></td></tr></table>";


} else {


$connection = @mysql_connect($hostname, $user, $pass)
or die(mysql_error());
$db = mysql_select_db($database, $connection)
        or die(mysql_error());


$sql = "SELECT username FROM $userstable
        WHERE username = '$_POST[username]'";

$sql2 = "SELECT email FROM $userstable
        WHERE email = '$_POST[email]'";

$result = mysql_query($sql)
        or die ("Couldn't execute query.");

$result2 = mysql_query($sql2)
        or die ("Couldn't execute query.");

$num = mysql_num_rows($result);
$num2 = mysql_num_rows($result2);

if (is_alphachar($_POST[username]) == 1) {
echo $form;
echo "<table class=\"black\" align=\"center\"><tr><td align=\"center\"><b>HATA: <font color=red>Hatali kullanici adi, sadece harf ve sayilar yazilabilir</b></font></td></tr></table>";
die;
}
if ($num == 1) {

echo "<br><br><br><br><br><br><br><br>";
echo "<table cellpadding=\"3\" class=\"boldb\" width=\"100%\" align=\"center\"><tr><td align=\"right\"><img align=\"absmiddle\" src=\"images/taskdriverlogo.jpg\"> </td><td width=\"42%\" bgcolor=\"#E6F0FF\"><b><i>Hesap Açma</i></b></td><td bgcolor=\"#EBF3FE\"></td><td bgcolor=\"#F1F6FD\"></td><td bgcolor=\"#F4F8FD\"></td><td bgcolor=\"#F6F9FD\"></td><td bgcolor=\"#F9FBFD\"></td><td bgcolor=\"#FDFDFD\"></td></tr></table>";
echo "<table class=\"black\" align=\"center\"><tr><td align=\"center\"><br><br><br><b>HATA: <font color=red>Bu kullanici adi daha önce kaydedilmis. Baska bir tane yazin.</b></font></td></tr></table>";
echo "<table align=\"center\" class=\"black\" width=\"100%\">";
echo "<tr><td align=\"center\" colspan=\"3\"></td></tr>";
echo "<form action=\"javascript:history.go(-1)\" method=\"POST\">";
echo "<table class=\"black\" align=\"center\"><tr><td width=\"40%\"></td><td><br><input type=\"submit\" value=\"<< Geri\"></td></tr>";
echo "</form>";
echo "</table>";

} elseif ($num2 == 1) {

echo "<br><br><br><br><br><br><br><br>";
echo "<table cellpadding=\"3\" class=\"boldb\" width=\"100%\" align=\"center\"><tr><td align=\"right\"><img align=\"absmiddle\" src=\"images/taskdriverlogo.jpg\"> </td><td width=\"42%\" bgcolor=\"#E6F0FF\"><b><i>Hesap Açma</i></b></td><td bgcolor=\"#EBF3FE\"></td><td bgcolor=\"#F1F6FD\"></td><td bgcolor=\"#F4F8FD\"></td><td bgcolor=\"#F6F9FD\"></td><td bgcolor=\"#F9FBFD\"></td><td bgcolor=\"#FDFDFD\"></td></tr></table>";

echo "<table class=\"black\" align=\"center\"><tr><td align=\"center\"><br><br><br><b>HATA: <font color=red>Bu e-mail adresi ile daha önce kayit edilmis, baska bir e-mail adresi yazin.</b></font></td></tr></table>";

echo "<table align=\"center\" class=\"black\" width=\"100%\">";
echo "<tr><td align=\"center\" colspan=\"3\"></td></tr>";
echo "<form action=\"javascript:history.go(-1)\" method=\"POST\">";
echo "<table class=\"black\" align=\"center\"><tr><td width=\"40%\"></td><td><br><input type=\"submit\" value=\"<< Geri\"></td></tr>";
echo "</form>";
echo "</table>";
} else {

$query = "INSERT INTO $userstable (realname,username,password,email,vcode,workphone,location,department)
VALUES ('$_POST[realname]','$_POST[username]',md5('$_POST[password]'),'$_POST[email]','','$_POST[workphone]','$_POST[location]','$_POST[department]')";
$resultB = mysql_query($query,$connection) or die ("Couldn't execute query.");

//$cookie_name = "auth";
//$cookie_value = "fook!$_POST[username]";
//$cookie_expire = "0";
//$cookie_domain = $domain;
//setcookie($cookie_name, $cookie_value, $cookie_expire, "/", $cookie_domain, 0);

echo "<br><br><br><br><br><br><br><br>";
echo "<table cellpadding=\"3\" class=\"boldb\" width=\"100%\" align=\"center\"><tr><td align=\"right\"><img align=\"absmiddle\" src=\"images/taskdriverlogo.jpg\"> </td><td width=\"42%\" bgcolor=\"#E6F0FF\"><b><i>Hesap Açma</i></b></td><td bgcolor=\"#EBF3FE\"></td><td bgcolor=\"#F1F6FD\"></td><td bgcolor=\"#F4F8FD\"></td><td bgcolor=\"#F6F9FD\"></td><td bgcolor=\"#F9FBFD\"></td><td bgcolor=\"#FDFDFD\"></td></tr></table>";
echo "<table class=\"black\" width=\"40%\" align=\"center\"><tr><td><br><br><br><b>Tebrikler $_POST[realname]. hesap basari ile açildi.<br><br> is takip sistemine giris yapmak için Buraya <a href=\"index.php\">TIKLA</a></td></tr></table>";

$new = $_POST[email];
$emailsql = "SELECT email FROM $userstable WHERE userlevel = 'A'";
$resultsql = mysql_query($emailsql); 




$break = '<br>';



$footer = "Bu mail sistem tarafindan otomatik gönderilmiştir";
$footerdecode = iconv("UTF-8", "ISO-8859-9", $footer);

$subject = "ASWA Is Takip: Yeni Hesap";



$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-9\r\n";
$headers .= 'Content-Language: tr' . "rn";
$headers .= 'From: '.$AdminEmail.' <'.$AdminEmail.'>'. "rn";
$headerdecode = iconv("UTF-8", "ISO-8859-9", $headers);

$body2 = "<b>Is Takip sistemi icin yeni hesap açılmıştır:  </b>" .$_POST['realname'] . " " . $break . 
"<br><b>Kullanici adiniz:  </b> " . $_POST['username'] . " " . $break . 
"<br><b>Şifreniz        :  </b> " . $_POST['password'] . " " . $break . 
"<br><br>IsTakip Sistemine giris yapmak için http://" . $domain . $directory ." </font>" . " " . $break . 
"<br><br><br><font size=1>";

$body2decode = iconv("UTF-8", "ISO-8859-9", $body2);


include 'config_mail.php';

$mail->SetFrom("info@aswagroup.com", "ASWA Group Istakip"); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
$mail->AddAddress("$new"); // Mailin gönderileceği alıcı adres
$mail->Subject = $subject;
$mail->Body = $body2decode;
$mail->Headers = $headerdecode;

if(!$mail->Send()){
	echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
} else {
	echo "Email Gonderildi";
}







}
}
include 'footer.php';
?>