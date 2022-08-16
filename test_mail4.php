<?php
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
$mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
$mail->SMTPSecure = 'tls'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın
$mail->Host = "sub4.mail.dreamhost.com"; // Mail sunucusunun adresi (IP de olabilir)
$mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@aswagroup.com"; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)
$mail->Password = "Fethiye48"; // Mail adresimizin sifresi


$break = '<br>';



$footer = "Bu mail sistem tarafindan otomatik gönderilmiştir";
$footerdecode = iconv("UTF-8", "ISO-8859-9", $footer);

$subject = "ASWA Is Takip: Yeni Hesap";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-9\r\n";
$headers .= 'Content-Language: tr' . "rn";
$headerdecode = iconv("UTF-8", "ISO-8859-9", $headers);

$body2 = "<b>Is Takip sistemi icin yeni hesap acilmistir:  </b> Sayin Kerem DUNDAR " . $break . 
"<br><b>Kullanici adiniz:  </b> Kerem 
<br><b>Sifreniz        :  </b> Kerem1234 " . $break . 
"<br><br>IsTakip Sistemine giris yapmak icin http://www.aswagroup.com/krk/" . $break .  $break .
"<br><br><br><font size=1>Bu mail sistem tarafindan otomatik gonderilmistir";

$body2decode = iconv("UTF-8", "ISO-8859-9", $body2);




$mail->SetFrom("info@aswagroup.com", "ASWA Group Istakip"); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
$mail->AddAddress("feridun@aswagroup.com"); // Mailin gönderileceği alıcı adres
$mail->Subject = $subject;
$mail->Body = $body2decode;
$mail->Headers = $headerdecode;


if(!$mail->Send()){
	echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
} else {
	echo "Email Gonderildi";
}
?>