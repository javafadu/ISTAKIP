<?php
$queryper = "SELECT * FROM $taskstable WHERE taskid = '$taskid' ORDER BY status";
$resultper = mysql_query($queryper) or die ("Couldn't execute query."); 
while($rowper = mysql_fetch_array($resultper)) {
$status = $rowper['status'];
echo "<OPTION value=\"$status\">$status</OPTION>";
}
echo "<option value=\"Destek M�d�rl�g�nde\">Destek M�d�rl�g�nde</option>";
echo "<option value=\"Paz. Sat. Bsk. da\">Paz. Sat. Bsk. da</option>";
echo "<option value=\"Gn. Mdr. Tic. Yrd. da\">Gn. Mdr. Tic. Yrd. da</option>";
echo "<option value=\"Genel M�d�rde\">Genel M�d�rde</option>";
echo "<option value=\"Sos. ve Id. Isl. Bsk.da\">Sos. ve Id. Isl. Bsk.da</option>";
echo "<option value=\"Bilgi Tek. Bsk.da\">Bilgi Tek. Bsk.da</option>";
echo "<option value=\"Hukuk M�s.de\">Hukuk M�s.de</option>";

?>