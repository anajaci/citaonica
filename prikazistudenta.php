<?php
if (!isset ($_GET["idstudenta"])){
echo "Parametar ID nije prosleđen!";
} else {
$pomocna=$_GET["idstudenta"];
//uspostavljanje konekcije
include "konekcija.php";
//citanje podataka o studentu
$sql="SELECT * FROM studenti WHERE idstudenta='".$pomocna."'";


$rezultat = $mysqli->query($sql);
//ispis naziva kolona u tabeli
echo "<table border='2' >
<tr>

<th>Ime</th>
<th>Prezime</th>
<th>Broj indeksa</th>
<th>Vreme posete</th>

</tr>";
//ispis podataka o studentu
while($red = $rezultat->fetch_object()){
 echo "<tr>";
 //echo "<td>" . $red->idstudenta . "</td>";
 echo "<td>" . $red->ime . "</td>";
 echo "<td>" . $red->prezime . "</td>";
 echo "<td>" . $red->brojindeksa . "</td>";
 echo "<td>" . $red->vreme . "</td>";
 echo "</tr>";
 }
echo "</table>";


$mysqli->close();
}
?>
