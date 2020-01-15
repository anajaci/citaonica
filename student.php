<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		$url = 'http://localhost/citanje.php';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, false);
		$curl_odgovor = curl_exec($curl);
		curl_close($curl);
		$json_objekat=json_decode($curl_odgovor);
	?>
<table>
<tr>
<td>Id</td>
<td>Vreme</td>
</tr>
	<?php 
		foreach($json_objekat->studenti as $vrednost){
	?>
<tr>
<td><?php echo $vrednost->id;?></td>
<td><?php echo $vrednost->vreme;?></td>
</tr>
<?php
}
?>
</table>
</body>
</html>