<?php
$queryper = "SELECT * FROM $taskstable WHERE taskid = '$taskid' ORDER BY status";
$resultper = mysql_query($queryper) or die ("Couldn't execute query."); 
while($rowper = mysql_fetch_array($resultper)) {
$status = $rowper['status'];
echo "<OPTION value=\"$status\">$status</OPTION>";
}
echo "<option value=\"Destek Müdürlügünde\">Destek Müdürlügünde</option>";
echo "<option value=\"Paz. Sat. Bsk. da\">Paz. Sat. Bsk. da</option>";
echo "<option value=\"Gn. Mdr. Tic. Yrd. da\">Gn. Mdr. Tic. Yrd. da</option>";
echo "<option value=\"Genel Müdürde\">Genel Müdürde</option>";
echo "<option value=\"Sos. ve Id. Isl. Bsk.da\">Sos. ve Id. Isl. Bsk.da</option>";
echo "<option value=\"Bilgi Tek. Bsk.da\">Bilgi Tek. Bsk.da</option>";
echo "<option value=\"Hukuk Müs.de\">Hukuk Müs.de</option>";

?>