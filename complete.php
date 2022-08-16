<?php
include 'header.php';
include 'format.css';
$getid = $_GET['getid'];
$taskid = $_GET['taskid'];
$subject = "ASWA Is Takip Sistemi";
switch ($getid) {
case 1:
// INITIAL TASK SUBMISSIONS
$query = "INSERT INTO $taskstable (title,open_date,personnel,catname,deadline,priority,description,manager,ofiskod) VALUES ('$_POST[gorevad]','$_POST[open_date]','$_POST[personnel]','$_POST[catname]','$_POST[deadline]','$_POST[priority]','$_POST[description]','$tmpname','$_POST[ofiskod]')";
$result = mysql_query($query)or die("Unable to select database - complete.php");
$rowin2 = mysql_insert_id();
echo "<tr><td bgcolor=\"#E6F0FF\"><b>Görev Güncellendi</b></td></tr>";

echo "<tr><td align=\"center\"><br><br><br><b>Görevi Güncellediniz!</b><br><form name=\"form1\" method=\"post\" action=\"index.php\">
<input type=\"submit\" value=\"Anasayfa\"></form></td></tr>";

echo "</table></td></tr></table>";

$queryu = "SELECT * FROM $userstable WHERE (userlevel = '3' OR userlevel = 'A') AND username = '$tmpname'";
$resultu = mysql_query($queryu); 
$rowu= mysql_fetch_array($resultu);
$userlevel = $rowu['userlevel'];

// EMAIL TO ASSIGNEE
$emailsql = "SELECT email FROM users WHERE username = '$_POST[personnel]'";
$resultsql = mysql_query($emailsql); 
$alicirow= mysql_fetch_array($resultsql);
$alicimail = $alicirow['email'];



$alert = "<font face=arial><b><i>ASWA Is Takip - Yeni Görev Ataması</i></b><br><br>";


$break = '<br>';


$headers  = "MIME-Version: 1.0\r\n";
$headers .= 'Content-Language: tr' . "rn";
$headers .= 'From: '.$AdminEmail.' <'.$AdminEmail.'>'. "rn";
$headers .= "\nContent-Type: text/html; charset=utf-8";	
 
 
$body1=  "
<!-- Start Styles. Move the 'style' tags and everything between them to between the 'head' tags -->
<style type=\"text/css\">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:18px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:50%; }
.myOtherTable td, .myOtherTable th { padding:5px;border:0; }
.myOtherTable td { border-bottom:1px dotted #BDB76B; }
</style>
<!-- End Styles -->


<table class=\"myOtherTable\">".
"<tr><td colspan=2 ><center><b>Yeni Gorev Atamasi</b></center></td></tr>" .
"<tr><td><b>Gorevi veren:</td><td>  <b>$tmpname</b> </td></tr>" .
"<tr><td><br><b>Bu gorevle ilgili kisi:  </b> </td><td><i>" . $_POST[personnel] . " </i></td></tr>". 
"<tr><td><br><b>Gorevin Basligi:  </b> </td><td><i> " . $_POST[gorevad] . " </i></td></tr>".
"<tr><td><br><b>Gorevin Icerigi:  </b> </td><td><i> " . $_POST[description] . " </i></td></tr>" .
"<tr><td><br><b>Gorevin Bitis Zamani:  </b>  </td><td><i>" . $_POST[deadline] . " </i></td></tr>" .
"<tr><td><br><b>Guncel gorev durumunuz: </td><td><i><font color=\"red\">Yeni Görev</font>  </b></i></td></tr></table> " . $break .  

"<br><br>IsTakip Sistemine giris yapmak için http://" . $domain . $directory ." </font>" . " " . $break . 
"<br><br><br><font size=1>";


$headerdecode = iconv("UTF-8", "ISO-8859-9", $headers);



$body1decode = iconv("UTF-8", "ISO-8859-9", $body1);

$subject2 = "ASWA Is Takip : Yeni Gorev";


include 'config_mail.php';
$mail->SetFrom("info@aswagroup.com", "ASWA Group Istakip"); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
$mail->AddAddress("$alicimail"); // Mailin gönderileceği alıcı adres
$mail->Subject = $subject2;
$mail->Body = $body1decode;


if(!$mail->Send()){
	echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
} else {
	echo "Email Gonderildi";
}



// EMAIL TO MANAGER
$emailauth = "SELECT email FROM users WHERE username = '$tmpname' AND userlevel = '$userlevel'";
$resultauth = mysql_query($emailauth);

$alert = "<font face=arial><b><i>Is Takip Mail Uyari Sistemi</i></b><br><br>";
$break = '<br>';
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-9\r\n";
$footer = "Bu mail otomatik olarak size gonderilmistir";
while($rowauth = mysql_fetch_array( $resultauth )) {
/*
mail("" .$rowauth['email'] . "",$subject,$alert . " " . $break .
"<b>Yeni görev bildirimi yapilmistir,<br>Yapan kisi:  <b>$tmpname</b> " . $break . 
"<br><b>Yeni Görevin Basligi:  </b> " . $_POST[title] . " " . $break . 
"<br><b>Güncel görev durumu: <font color=\"red\">Yeni Görev</font>  </b> " . $break . 
"<br><b>Bu Görevin Yetkili Kisisi:  </b> " . $_POST[personnel] . " " . $break . 
"<br><br><br><font size=1>" . $footer,$headers);
*/

}

break;


case 17:
// UPDATED BY MANAGER
$query = "UPDATE $taskstable SET personnel ='$_POST[personnel]',catname ='$_POST[catname]',title ='$_POST[gorevad]',statusname ='$_POST[statusname]', status ='$_POST[status]', priority ='$_POST[priority]', description = '$_POST[description]', ofiskod = '$_POST[ofiskod]',deadline = '$_POST[deadline]' WHERE taskid = '$taskid'";
$result = mysql_query($query)or die("Unable to select database - completeedit.php");

$query = "INSERT INTO $historytable (notes,taskid,notekleyen) VALUES ('$_POST[notes]','$taskid','$tmpname')";
$result = mysql_query($query)or die("Unable to select database - completeedit_lev2.php - HISTORY");

echo "<tr><td bgcolor=\"#E6F0FF\"><b>Görev Güncellendi</b></td></tr>";

echo "<tr><td align=\"center\"><br><br><br><b>Görev basari ile güncellenmistir!</b><br><form name=\"form1\" method=\"post\" action=\"index.php\">
<input type=\"submit\" value=\"Anasayfa\"></form></td></tr>";

echo "</table></td></tr></table>";
break;


case 23:
// UPDATED BY ASSIGNEE
$query = "UPDATE $taskstable SET statusname ='$_POST[statusname]', status ='$_POST[status]' WHERE taskid = '$taskid'";
$result = mysql_query($query)or die("Unable to select database - completeedit_lev2.php");

$query = "INSERT INTO $historytable (notes,taskid,notekleyen) VALUES ('$_POST[notes]','$taskid','$tmpname')";
$result = mysql_query($query)or die("Unable to select database - completeedit_lev2.php - HISTORY");

echo "<tr><td bgcolor=\"#E6F0FF\"><b>Task Updated</b></td></tr>";

echo "<tr><td align=\"center\"><br><br><br><b>Görev basari ile güncellenmistir!</b><br><form name=\"form1\" method=\"post\" action=\"index.php\">
<input type=\"submit\" value=\"Anasayfa\"></form></td></tr>";

echo "</table></td></tr></table>";
break;


case 112:
// ADDITION OF NEW CATEGORIES
$query = "INSERT INTO $cattable (catname) VALUES ('$_POST[catname]')";
$result = mysql_query($query)or die("Unable to select database - addcat.php");
$rowin2 = mysql_insert_id();

echo "<tr><td bgcolor=\"#E6F0FF\"><b>Kategori Yönetimi</b></td></tr>";

echo "<tr><td align=\"center\"><br><br><br><b>Kategoriniz Eklenmistir</b><br><form name=\"form1\" method=\"post\" action=\"index.php\">
<input type=\"submit\" value=\"Anasayfa\"></form></td></tr>";

echo "</table></td></tr></table>";
break;


case 56:
// DELETION OF EXSITING CATEGORIES
$query = "DELETE FROM $cattable WHERE catname ='$_POST[catnamedel]'";
$result = mysql_query($query)or die("Unable to select database - addcat.php");
$rowin2 = mysql_insert_id();

echo "<tr><td bgcolor=\"#E6F0FF\"><b>Kategori Silme</b></td></tr>";

echo "<tr><td align=\"center\"><br><br><br><b>Kategoriniz sistemden silinmistir</b><br><form name=\"form1\" method=\"post\" action=\"index.php\">
<input type=\"submit\" value=\"Anasayfa\"></form></td></tr>";

echo "</table></td></tr></table>";
break;


case 86:
// DELETION OF EXSITING TASKS
$query = "DELETE FROM $taskstable WHERE taskid = '$taskid'";
$result = mysql_query($query)or die("Unable to select database - delete.php");

$query2 = "DELETE FROM $historytable WHERE taskid = '$taskid'";
$result2 = mysql_query($query2)or die("Unable to select database - delete.php");


echo "<tr><td bgcolor=\"#E6F0FF\"><b>Görev Silme</b></td></tr>";

echo "<tr><td align=\"center\"><br><br><br><b>Görev ve notlar, sistemden silinmistir</b><br><form name=\"form1\" method=\"post\" action=\"index.php\">
<input type=\"submit\" value=\"Anasayfa\"></form></td></tr>";

echo "</table></td></tr></table>";
break;




case 87:
// DELETION OF SELECTED USER

$kisisil=$_GET['kisisil'];
$query = "DELETE FROM users WHERE username = '$kisisil'";
$result = mysql_query($query)or die("Unable to select database - delete.php");




echo "<tr><td bgcolor=\"#E6F0FF\"><b>Kişi Silme</b></td></tr>";

echo "<tr><td align=\"center\"><br><br><br><b>Seçilen kişi sistemden silinmiştir.</b><br><form name=\"form1\" method=\"post\" action=\"index.php\">
<input type=\"submit\" value=\"Anasayfa\"></form></td></tr>";

echo "</table></td></tr></table>";
break;


}


include 'footer.php';
?>