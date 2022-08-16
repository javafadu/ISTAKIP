<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
include "baglanti.php"
?>
<table width="200" border="1">
  <tr>
    <th scope="col">Y&#305;l</th>
    <th scope="col">Hafta</th>
    <th scope="col">konu</th>
    <th scope="col">icerik</th>
    <th scope="col">parkur</th>
  </tr>
  <?
  
  $sikayet=mysql_query("select * from sikayetler where icerik like '%$t%' and yil='$y' and hafta='$h' ");
  while($dok=mysql_fetch_array($sikayet))
  {
  
  
  ?>
  
  <tr>
    <td><? echo"$y"; ?></td>
    <td><? echo"$h"; ?></td>
    <td><? echo"$t"; ?></td>
    <td><? echo"$dok[icerik]"; ?></td>
    <td><? echo"$dok[parkur]"; ?></td>
  </tr>
  <?
  }
  ?>
</table>
</body>
</html>
