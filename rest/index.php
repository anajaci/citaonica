<?php
require 'rest/flight/Flight.php';
require 'jsonindent.php';
Flight::register('db', 'Database', array('citaonica'));
$json_podaci = file_get_contents("php://input");
Flight::set('json_podaci', $json_podaci );

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /studenti.json', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->selectM();
	$niz=array();
	while ($red=$db->getResult()->fetch_object()){
		$niz[] = $red;
	}

	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	echo indent($json_niz);
	return false;
});


	
Flight::route('POST /citaonica.json', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci_json = Flight::get("json_podaci");
	$podaci = json_decode ($podaci_json);
	
	if ($podaci == null){
		$odgovor["poruka"] = "Niste prosledili podatke";
		$json_odgovor = json_encode ($odgovor);
		echo $json_odgovor;
		}
	
	else {

		$podaci_query = array();
		foreach ($podaci as $k=>$v){
			$v = "'".$v."'";
			$podaci_query[$k] = $v;
		}
	if ($db->insert("studenti", "idstudenta, ime, prezime, brojindeksa", array($podaci_query["idstudenta"],$podaci_query["ime"],$podaci_query["prezime"],$podaci_query["brojindeksa"]))){				
				$odgovor["poruka"] = "Student je ucitan";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			} 
		
		else {
				$odgovor["poruka"] = "Došlo je do greške pri ubacivanju merenja";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
		
	}	


	});
	
	

Flight::start();
?>
