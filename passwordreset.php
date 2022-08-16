<?php
include 'config.php';
include 'format.css';
$step = $_GET['step'];
$headers .= "MIME-Version: 1.0 \n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
$headers .= "from:SifreResetleme@$domain\r\nCc:\r\nBcc:";

if(strlen($step) < 1){
header ("Location: passwordreset.php?step=1");
die;
}

echo "<br><br><br><br><br><br><br><br><br><br><br>";
echo "<table cellpadding=\"3\" class=\"boldb\" width=\"70%\" align=\"center\"><tr><td align=\"right\" width=\"80%\"><img align=\"absmiddle\" src=\"images/login_logo.png\" width=\"80%\"><br> </td><td width=\"42%\" ></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr></tr></table>";

if($step == 1){
echo "<table align=\"center\" class=\"black\" width=\"35%\"><tr><td align=\"right\">";
echo "<br>Sisteme kayıtlı e-mail adresini girin.";
echo "<br><br></td></tr>";
echo "<tr><td align=\"right\"><form method=\"POST\" action=\"passwordreset.php?step=2\">";
echo "<b>E-Mail:</b> <input type=\"text\" name=\"email\" size=\"25\"></td></tr>";
echo "<tr><td align=\"right\"><br><input type=\"submit\" value=\"Onay Kodu Gönder\" name=\"B1\"></form></td></tr></table>";
}

if($step == 2){
$ticket = md5(uniqid(rand(), true));
$email = $_POST['mail'];

$conn = new mysqli($hostname, $user, $pass,$database) or die("Connect failed: %s\n". $conn -> error);
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$sql = "SELECT email FROM $userstable WHERE email = '$_POST[email]'";
$result = mysqli_query($conn,$sql);

$sql2 = "SELECT vcode FROM $userstable WHERE email = '$_POST[email]'";
$result2 = mysqli_query($conn,$sql2);


$num = mysqli_num_rows($result);
 
$row1 = mysqli_fetch_assoc($result);
$num1 = $row1['count'];

$row2 = mysqli_fetch_assoc($result2);
$num2 = $row2['count'];


        if ($num == 1) {
            $tmpcode = $num2;
                       if(strlen($tmpcode) < 1){
                       $query = "UPDATE $userstable SET vcode = '$ticket' WHERE email = '$_POST[email]'";
                       $resultB = mysqli_query($conn,$query) or die ("Sistem Hatası - Uygulama Başarısız.");
					   $msg = "<font face=\"arial\">Sifre resetleme icin yaptiginiz basvuru sonucu onay kodunuz gonderilmistir. Eger bu islemi siz yapmadiysaniz dikkate almayin ve asagidaki islemleri uygulamayin.<br>";
                       mail($_POST['email'],"Performans Karne: Sifre Onaylama.","<font face=\"arial\"><b>Bu mail sistem tarafindan otomatik olarak gonderilmistir</b></font><br><br>$msg<br><br><b>Onay Kodunuz:</b> " . "\n" . $ticket,$headers);
					   
					   echo "<table class=\"black\" align=\"center\"><tr><td>";
                       echo "<br><br></td></tr>";
                       echo "<tr><td align=\"center\"><font color=\"red\"><b>Bu Pencereyi Kapatmayiniz</b></font></td></tr>";
                       echo "<tr><td align=\"center\">Onay Kodunuz Mail Adresinize Gonderilmistir.<br></td></tr></table>";
					   
					   } else {
					  $msg = "<font face=\"arial\">Sifre resetleme icin yaptiginiz basvuru sonucu onay kodunuz gonderilmistir. Eger bu islemi siz yapmadiysaniz dikkate almayin ve asagidaki islemleri uygulamayin.<br>";
                       mail($_POST['email'],"Performans Karne: Sifre Onaylama","<font face=\"arial\"><b>Bu mail sistem tarafindan otomatik gonderilmistir</b></font><br><br>$msg<br><br><b>Onay Kodunuz:</b> " . "\n" . $tmpcode,$headers);
					   echo "<table class=\"black\" align=\"center\"><tr><td>";
                       echo "<br><br></td></tr>";
                       echo "<tr><td align=\"center\">Onay kodu mail adresinize gonderilmistir.</td></tr>";
                       echo "<tr><td align=\"center\"><br><font color=\"red\"><b>BU PENCEREYI KAPATMAYINIZ!</b></font></td></tr></table>";
                       }
					   echo "<table class=\"black\" align=\"center\"><tr><td>";
                       echo "<br>Mail adresinize Gelen Onay Kodunu buraya yapıştırın.";
                       echo "<tr><td align=\"center\"><form method=\"POST\" action=\"passwordreset.php?step=3\"></td></tr>";
                       echo "<tr><td align=\"center\"><input type=\"text\" name=\"vcode\" size=\"30\"></td></tr>";
                       echo "<tr><td align=\"center\"><input type=\"submit\" value=\"ONAYLA\" name=\"B1\">";
                       echo "</form></td></tr>";
        } else {
echo "<table class=\"black\" align=\"center\"><tr><td>";
echo "<br>Sisteme kayıtlı olan e-mail adresinizi girin.";
echo "<br><br><br></td></tr>";
echo "<tr><td align=\"center\"><form method=\"POST\" action=\"passwordreset.php?step=2\">";
echo "<b>Your email:</b> <input type=\"text\" name=\"email\" size=\"20\"><br><br></td></tr>";
echo "<tr><td align=\"center\"><b>Error: <font color=\"red\">Yazdığınız mail adresi sistemde bulunamadı.</b></font></td></tr>";
echo "<tr><td align=\"center\"><br><br><input type=\"submit\" value=\"Onay Kodumu Gönder\" name=\"B1\"></form></td></tr></table>";

               }
}

if($step == 3){
$vcode = $_POST['vcode'];

$conn = new mysqli($hostname, $user, $pass,$database) or die("Connect failed: %s\n". $conn -> error);
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$sql = "SELECT vcode FROM $userstable WHERE vcode = '$vcode'";

$result = mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);
       if($num == 1){
	           echo "<table class=\"black\" align=\"center\">";
	           echo "<form method=\"POST\" action=\"passwordreset.php?step=4\">";
		       echo "<tr><td colspan=\"2\" align=\"center\"><br>Yeni Şifrenizi Girin<br><br></td></tr>";
			   echo "<tr><td align=\"right\"><b>Yeni Şifrenizi Girin:</b></td><td><input type=\"password\" name=\"pword\" size=\"20\"></td></tr>";
			   echo "<tr><td align=\"right\"><b>Şifreyi Onayla:</b></td><td><input type=\"password\" name=\"cpword\" size=\"20\"><input type=\"hidden\" name=\"vcode\" size=\"20\" value=\"$vcode\"></td></tr>";
               echo "<tr><td colspan=\"2\" align=\"center\"><br><br><input type=\"submit\" value=\"Şifre Resetleme\" name=\"B1\"></form></td></tr></table>";

       } else {
	           echo "<table class=\"black\" align=\"center\">";
	           echo "<tr><td align=\"center\"><br><br><form action=\"javascript:history.go(-1)\" method=\"POST\"></td></tr>";
               echo "<tr><td align=\"center\"><b>HATA: <font color=red>Şifreleriniz Uyumsuz.</font><br><br><input type=\"submit\" value=\"<< Geri\"></form></td></tr></table>";
               }
}

if($step == 4){
$vcode = $_POST['vcode'];
$pword = $_POST['pword'];
$cpword = $_POST['cpword'];


$conn = new mysqli($hostname, $user, $pass,$database) or die("Connect failed: %s\n". $conn -> error);
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$sql = "SELECT password FROM $userstable WHERE vcode = '$vcode'";
$result = mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);
       if($num == 1){
          $tmpcode = $num1;
                  
if($pword == $cpword){
$query = "UPDATE $userstable SET password = md5('$pword') WHERE vcode = '$vcode'";
$result2 = mysqli_query($conn,$query) or die ("Sistem Hatası - Uygulama Başarısız.");
} else {
echo "<table class=\"black\" align=\"center\">";
echo "<tr><td align=\"center\"><br><br></td></tr>";
echo "<tr><td align=\"center\"><b>HATA: <font color=red> Şifreler Uyumsuz Yeniden Deneyin.</font><br></td></tr></table>";
die;
}
$query3 = "UPDATE $userstable SET vcode = '' WHERE vcode = '$vcode'";
$result3 = mysqli_query($conn,$query3) or die ("Sistem Hatası - Uygulama Başarısız.");

	           echo "<table class=\"black\" align=\"center\">";
	           echo "<form method=\"POST\" action=\"index.php\">";
		       echo "<tr><td colspan=\"2\" align=\"center\"><br><br></td></tr>";
			   echo "<tr><td align=\"right\"><b>Şifreniz Başari ile değiştirilmiştir.</b></td></tr>";
			   echo "<tr><td align=\"right\">Yeni Şifreniz ile Giriş Yapabilirsiniz</td></tr>";
               echo "<tr><td colspan=\"2\" align=\"center\"><br><br><input type=\"submit\" value=\"Giriş Sayfasına Git\" name=\"B1\"></form></td></tr></table>";


        } else {
		
		header ('Location: passwordreset.php?step=1');
       }
}
?>