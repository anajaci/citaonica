<?php
require 'flight/Flight.php';
require 'jsonindent.php';
Flight::register('db', 'PDO', array("mysql:host=localhost;port=3306;dbname=citaonica;",'root',''),function($db)
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
);
$json_podaci = file_get_contents("php://input");
Flight::set('json_podaci', $json_podaci );

Flight::route('/', function(){
    echo 'hello world!';
});


Flight::route('POST /register', function(){
	$obj = json_decode(file_get_contents("php://input"));
	if(isset($obj)) {
		if(!empty($obj->idstudenta)&&!empty($obj->ime)&&!empty($obj->prezime)&&!empty($obj->brojindeksa)&&!empty($obj->vreme)) {
			$db=Flight::db();

			$result = $db->prepare("INSERT INTO studenti(idstudenta,ime,prezime,brojindeksa,vreme) VALUES 
				(	'" .$obj->idstudenta . "',
					'" .$obj->ime . "',
					'" .$obj->prezime . "',
					'" .$obj->brojindeksa . "',
					'" .$obj->vreme . "')");
			$result->execute();

			// $result1 = $db->query("SELECT * FROM studenti");
			// if($result1->rowCount() >= 1) {
			// 	header ("Content-Type: application/json; charset=utf-8");
			// 	echo "";
			// }
		}
	}
}

Flight::start();
