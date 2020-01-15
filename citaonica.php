<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="pronadji.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pametna čitaonica</title>
	
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/style.css">
	
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

  <link rel="icon" href="https://www.clipartwiki.com/clipimg/detail/12-127325_books-clipart-png-transparent-background-books-clip-art.png">

<style>
  body {
    background-image: url('http://www.lshtm.ac.uk/sites/default/files/library-keppel-street.jpg'); 
    background-size: cover;
    background-repeat: no-repeat;
  }
table, th, td {
   border: 1px solid black;
}

table {
    width: 50%;
}

th {
    height: 50px;
    background-color: #8B0000;
    color: white;
}

th, td {
    padding: 15px;
    text-align: left;
}

tr {
    
    background-color: white;
    color: black;
}

#link {
  color: white ;

}
#popuni {
    color: white ;

}
.tekst1:hover {background-color: black}
.tekst2:hover {background-color: black}
#st {background-color: white}

</style>



	
</head>

<body>

<?php
   	include("konekcija.php");


?>




<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
	<h1><span class="em-text">Pametna čitaonica</span></h1>
</nav>



    <br><br><br><br>

    <a href="https://twitter.com/smart_citaonica" target="_blank" id="link"><b><h1>Twitter nalog</h1></b></a>
 
<?php
   
?>


<?php
  include "konekcija.php";
  $sql="SELECT * FROM studenti";
  $rezultat = $mysqli->query($sql);
  
?>

<?php

$link = mysqli_connect("localhost:3308", "root", "");
mysqli_select_db($link,"citaonica");

$result = mysqli_query($link,"SELECT * FROM studenti");
$num_rows = mysqli_num_rows($result);

echo "<center><b><h1 style=color:white>Broj studenata u čitaonici: $num_rows </h1></b><center>";

?>


<form> 
<b id="st">Studenti u citaonici:</b>


<select name="student" onchange="PrikaziStudenta(this.value)">
<option value="0"></option>
<?php
while($red = $rezultat->fetch_object()){
?>
<option value="<?php echo $red->idstudenta;?>"><?php echo $red->brojindeksa;?></option>
<?php
}
?>
</select>
</form>
<p><div id="popuni"><b>Podaci o selektovanom studentu će biti prikazani.</b></div></p>
<?php
$mysqli->close();
?>



</body>

</html>